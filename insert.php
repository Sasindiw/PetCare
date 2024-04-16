<?php

$conn = mysqli_connect("localhost:4306", "root", "", "petcare");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $contactNo = $_POST["contactNo"];
    $petType = $_POST["petType"];
    $doctor = $_POST["doctor"];
    $category = $_POST["category"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $symptoms = $_POST["symptoms"];

    
    $sql = "INSERT INTO appointments (fullName, email, contactNo, petType, doctor, category, date, time, symptoms, status) 
            VALUES ('$fullName', '$email', '$contactNo', '$petType', '$doctor', '$category', '$date', '$time', '$symptoms', 'Pending')";

    if (mysqli_query($conn, $sql)) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
