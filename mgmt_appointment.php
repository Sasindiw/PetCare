<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Appointment Management</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
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
   margin-bottom: 6%;
   margin-top: 3%;
   background-color: #fff;
}

th, td {
   border: 1px solid #dddddd;
   padding: 8px;
   text-align: left;
}

th {
   background-color: #f2f2f2;
}

tr:nth-child(even) {
   background-color: #f9f9f9;
}

tr:hover {
   background-color: #f2f2f2;
}
h2{
   margin-top: 12%;
   margin-bottom: 3%;
   text-align: center;
}
body{
   background-color: rgb(238, 170, 34);
}


button[type="submit"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    opacity: 0.8;
}

.accept {
    background-color: green;
    color: white;
    margin-right: 8px; 
}

.decline {
    background-color: red;
    color: white;
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

<?php


function sendEmail($to, $subject, $message) {
 
}


$conn = mysqli_connect("localhost:4306", "root", "", "petcare");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accept'])) {
        $appointment_id = $_POST['appointment_id'];
        $update_sql = "UPDATE appointments SET status = 'Accepted' WHERE id = $appointment_id";
        if (mysqli_query($conn, $update_sql)) {
          
            $appointment_query = "SELECT * FROM appointments WHERE id = $appointment_id";
            $appointment_result = mysqli_query($conn, $appointment_query);
            $appointment = mysqli_fetch_assoc($appointment_result);

            
            $client_message = "Your appointment has been accepted. Appointment details: Doctor - " . $appointment['doctor'] . ", Date - " . $appointment['date'] . ", Time - " . $appointment['time'];
            sendEmail($appointment['email'], 'Appointment Accepted', $client_message);
            
            echo "<script>alert('Appointment accepted successfully!');</script>";
        } else {
            echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
        }
    } elseif (isset($_POST['decline'])) {
        $appointment_id = $_POST['appointment_id'];
        $update_sql = "UPDATE appointments SET status = 'Declined' WHERE id = $appointment_id";
        if (mysqli_query($conn, $update_sql)) {
           
            $appointment_query = "SELECT * FROM appointments WHERE id = $appointment_id";
            $appointment_result = mysqli_query($conn, $appointment_query);
            $appointment = mysqli_fetch_assoc($appointment_result);

            
            $client_message = "Your appointment has been declined. Please make another booking.";
            sendEmail($appointment['email'], 'Appointment Declined', $client_message);
            
            echo "<script>alert('Appointment declined successfully!');</script>";
        } else {
            echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
        }
    }
}


$sql_pending = "SELECT * FROM appointments WHERE status = 'Pending'";
$result_pending = mysqli_query($conn, $sql_pending);


echo "<h2><i class='fas fa-hourglass-half'></i> Pending Appointments</h2>";
if (mysqli_num_rows($result_pending) > 0) {
    
    echo "<form method='post' action=''>";
    echo "<table border='1'>";
    echo "<tr><th>Appointment ID</th><th>Name</th><th>Email</th><th>Contact No</th><th>Doctor</th><th>Date</th><th>Time</th><th>Symptoms</th><th>Action</th></tr>";

    
    while ($row = mysqli_fetch_assoc($result_pending)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fullName"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contactNo"] . "</td>";
        echo "<td>" . $row["doctor"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["symptoms"] . "</td>";
        echo "<td>";
        echo "<input type='hidden' name='appointment_id' value='" . $row["id"] . "'>";
        echo "<button type='submit' name='accept' class='accept'>Accept</button>";
        echo "<button type='submit' name='decline' class='decline'>Decline</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "No pending appointments.";
}


$sql_accepted = "SELECT * FROM appointments WHERE status = 'Accepted'";
$result_accepted = mysqli_query($conn, $sql_accepted);


echo "<h2><i class='fas fa-check-circle'></i> Accepted Appointments</h2>";
if (mysqli_num_rows($result_accepted) > 0) {
   
    echo "<table border='1'>";
    echo "<tr><th>Appointment ID</th><th>Name</th><th>Email</th><th>Contact No</th><th>Doctor</th><th>Date</th><th>Time</th><th>Symptoms</th></tr>";

    
    while ($row = mysqli_fetch_assoc($result_accepted)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fullName"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contactNo"] . "</td>";
        echo "<td>" . $row["doctor"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["symptoms"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No accepted appointments.";
}


$sql_declined = "SELECT * FROM appointments WHERE status = 'Declined'";
$result_declined = mysqli_query($conn, $sql_declined);


echo "<h2><i class='fas fa-times-circle'></i> Declined Appointments</h2>";
if (mysqli_num_rows($result_declined) > 0) {
    
    echo "<table border='1'>";
    echo "<tr><th>Appointment ID</th><th>Name</th><th>Email</th><th>Contact No</th><th>Doctor</th><th>Date</th><th>Time</th><th>Symptoms</th></tr>";

    
    while ($row = mysqli_fetch_assoc($result_declined)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fullName"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contactNo"] . "</td>";
        echo "<td>" . $row["doctor"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["symptoms"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No declined appointments.";
}


mysqli_close($conn);
?>

</body>
</html>
