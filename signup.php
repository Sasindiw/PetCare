<?php
if(isset($_POST['petcare'])) { 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['cnum'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];

   
    $servername = "localhost:4306";
    $username = "root";
    $password = "";
    $dbname = "petcare";
    $con = mysqli_connect($servername, $username, $password, $dbname);


    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO login (fname, lname, cnum, email, pass, usertype)
            VALUES ('$fname', '$lname', '$number', '$email', '$pass', '$usertype')";

    
    if (mysqli_query($con, $sql)) {
      
        if ($usertype == 'admin') {
            echo '<script type="text/JavaScript">  
                 window.alert("Signed up as admin");
                 location.replace("../html/signin.html");
                 </script>';
        } elseif ($usertype == 'client') {
            echo '<script type="text/JavaScript">  
                 window.alert("Signed up as client");
                 location.replace("../html/signin.html");
                 </script>';
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    
    mysqli_close($con);
}
?>
