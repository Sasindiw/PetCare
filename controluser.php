<?php

function getUsers() {
   
    $conn = new mysqli("localhost:4306", "root", "", "petcare");

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT id, fname, lname, email, usertype FROM login";
    $result = $conn->query($sql);


    $conn->close();

    return $result;
}


function deleteUser($userID) {

    $conn = new mysqli("localhost:4306", "root", "", "petcare");

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "DELETE FROM login WHERE id = ?";
    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    
    $stmt->close();
    $conn->close();
}


function addUser($fname, $lname, $email, $password, $usertype) {
  
    $conn = new mysqli("localhost:4306", "root", "", "petcare");

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO login (fname, lname, email, pass, usertype) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

  
    $stmt->bind_param("sssss", $fname, $lname, $email, $hashed_password, $usertype);
    $stmt->execute();


    $stmt->close();
    $conn->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteUserID"])) {
    $userID = $_POST["deleteUserID"];
    deleteUser($userID);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newFname"]) && isset($_POST["newLname"]) && isset($_POST["newEmail"]) && isset($_POST["newPassword"]) && isset($_POST["newUsertype"])) {
    $newFname = $_POST["newFname"];
    $newLname = $_POST["newLname"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];
    $newUsertype = $_POST["newUsertype"];
    addUser($newFname, $newLname, $newEmail, $newPassword, $newUsertype);
}


echo "<table border='1'>";
echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>User Type</th><th>Action</th></tr>";



?>
