<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

 
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin-top: 70px; 
            background-color: rgb(252, 173, 17);
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

     
       
        .header {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
    box-shadow: rgb(102, 101, 101);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
}

.logo {
    font-size: 2rem;
    color: rgb(8, 26, 71);
    font-weight: bolder;
    text-decoration: none; 
}

.logo i {
    color: rgb(238, 170, 34);
}


.navbar a {
    margin: 0 1rem;
    font-size: 1.2rem;
    color: rgb(3, 14, 38);
    text-decoration: none; 
}

.navbar a:hover {
    color: rgb(246, 179, 46);
}


        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 2%;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        
        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h2{
            margin-top: 9%;
        }
        footer {
  background-color: #0c0c4b;
  color: #fff;
  padding: 1rem 6rem; 
  text-align: center;
  margin-top: 5%;

}

footer p {
  margin-bottom: 0.8rem; 
  color: #fff;
}

footer a {
  color: #eeaa22;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

    </style>
</head>
<body>
<header class="header">
    <a href="#" class="logo"> 
        <i class="fas fa-dog"></i>
        Fuzz n' Feathers
    </a>

    <nav class="navbar">
        <a href="../html/index.html"><i class="fas fa-home"></i> HOME</a>
        <a href="../html/about.html"><i class="fas fa-info-circle"></i> ABOUT</a>
        <a href="../html/index.php"><i class="fas fa-user"></i> PROFILE</a>
    </nav>
</header>

<div class="container">
    <h2>User Management</h2>

    <table>
        <?php
        
        include '../html/controluser.php';

  
        function displayUsers() {
           
            $result = getUsers();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["fname"]."</td>";
                    echo "<td>".$row["lname"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["usertype"]."</td>";
                    echo "<td>";
                    echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
                    echo "<input type='hidden' name='deleteUserID' value='".$row["id"]."'>";
                    echo "<input type='submit' value='Delete'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found</td></tr>";
            }
        }

        
        displayUsers();
        ?>
    </table>


    <h2><i class="fas fa-trash-alt"></i> Delete User</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="deleteUserID">Enter User ID to delete:</label>
        <input type="text" id="deleteUserID" name="deleteUserID" required>
        <input type="submit" value="Delete User">
    </form>

    
    <h2><i class="fas fa-user-plus"></i> Add New User</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="newFname">First Name:</label><br>
        <input type="text" id="newFname" name="newFname" required><br><br>

        <label for="newLname">Last Name:</label><br>
        <input type="text" id="newLname" name="newLname" required><br><br>
        
        <label for="newEmail">Email:</label><br>
        <input type="email" id="newEmail" name="newEmail" required><br><br>

        <label for="newPassword">Password:</label><br>
        <input type="password" id="newPassword" name="newPassword" required><br><br>

        <label for="newUsertype">User Type:</label><br>
        <select id="newUsertype" name="newUsertype">
            <option value="User">Client</option>
            <option value="Admin">Admin</option>
        </select><br><br>

        <input type="submit" value="Add User">
    </form>
</div>
<footer>
    <p>&copy; 2024 Fuzz n Feathers. All rights reserved.</p>
    <p>Designed by <a href="#">Group 7, Batch 107 </a></p>
  </footer>
</body>
</html>







