<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    

    
    $servername = "localhost:4306";
    $username = "root";
    $password = "";
    $dbname = "petcare";

    
    $connection = new mysqli($servername, $username, $password, $dbname);

    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    
    $sql = "INSERT INTO inquiries (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    if ($stmt->execute()) {
        echo '<script>alert("Your message has been submitted. We will get back to you soon."); window.location.href="../html/contact.html";</script>';
    } else {
        echo '<script>alert("There was an error submitting your message. Please try again later."); window.location.href="../html/contact.html";</script>';
    }

    
    $stmt->close();
    $connection->close();
} else {
    
    header('Location: ../html/contact.html');
    exit();
}
?>

