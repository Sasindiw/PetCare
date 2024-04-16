<?php
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
  
    $con = mysqli_connect("localhost:4306", "root", "", "petcare");
    
  
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }


    $sql = "SELECT * FROM login WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
     
        if ($pass === $row['pass']) {
          
            if ($row['usertype'] === 'admin') {
                echo '<script type="text/javascript">  
                        window.alert("Login success as admin");
                        location.replace("../html/index.php");
                        </script>';
            } elseif ($row['usertype'] === 'client') {
                echo '<script type="text/javascript">  
                        window.alert("Login success as client");
                        location.replace("../html/client.php");
                        </script>';
            }
        } else {
            echo '<script type="text/javascript">  
                    window.alert("Incorrect password");
                    location.replace("../html/signin.html");
                    </script>';
        }
    } else {
        echo '<script type="text/javascript">  
                window.alert("User not found");
                location.replace("../html/signin.html");
                </script>';
    }
    

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
