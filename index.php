<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzz n' Feathers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <style>
   .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
            height: 100%;
            background-color: #333;
            padding-top: 20px;
            margin-top: 6%;
            background-color: rgb(238, 170, 34) ;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 20%;
            margin-top: 40%;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #061440;
            height: 15%;
        }

.sidebar a i {
    margin-right: 10px; 
    font-size: 20px;
}



        .content {
            margin-left: 200px; 
            padding: 20px;
        }
       
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-top: 8%;
}


th {
  background-color: #f2f2f2;
  font-weight: bold;
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}


td {
  padding: 8px;
  border: 1px solid #ddd;
}


tr:nth-child(even) {
  background-color: #f2f2f2;
}


tr:hover {
  background-color: #ddd;
}


caption {
  font-size: 1.2em;
  margin-bottom: 3%;
  font-weight: bold;
  margin-top: 0.5%;
}


table {
  border-collapse: separate;
  border-spacing: 0 10px;
  margin-top: 4%;
}

.status-pending {
    color:darkgoldenrod;
}



.box-info {
    margin-top: 50px; 
}

.box-info{
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 3%;

}
.box-info li {
	padding: 24px;
	background-color: #ddd;
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;

  i {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
    
  }
}
.box-info li:nth-child(1) i {
    background-color: #cce5ff;
    color: #007bff; 
}



.box-info li:nth-child(2) i {
    background-color: #ffffcc; 
    color: #ffcc00; 
}

.box-info li:nth-child(3) i {
    background-color: #ffe6cc; 
    color: #ff9900; 
}

.box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: var(--dark);
}
.box-info li .text p {
	color: var(--dark);	
}
h1{
    margin-top: 10%;
}

footer {
  background-color: #0c0c4b;
  color: #fff;
  padding: 1rem 6rem; 
  text-align: center;
  margin-top: 5%;
  margin-left: 95px; 
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

<div class="sidebar">
    <a href="../html/mgmt_appointment.php"><i class="fas fa-calendar-alt"></i> Appointments</a>
    <a href="../html/Inquiries.php"><i class="fas fa-envelope"></i> Manage Inquiries</a>
    <a href="../html/usermgmt.php"><i class="fas fa-users"></i> Manage Users</a>
    <a href="../html/signin.html"><i class="fas fa-sign-out-alt"></i> Log Out</a>
</div>

<div class="content">
    <header class="header">
        <a href="#" class="logo">
            <i class="fas fa-dog"></i>
            Fuzz n' Feathers
        </a>
        <nav class="navbar">
            <a href="../html/index.html"><i class="fas fa-home"></i> HOME</a>
            <a href="../html/about.html"><i class="fas fa-info-circle"></i> ABOUT</a>
        </nav>
    </header>

    <h1>Admin Dashboard</h1>

    <ul class="box-info">
        <li>
            <i class="fa-solid fa-calendar-check"></i>
            <span class="text">
                <h3>16</h3>
                <p>Appointments</p>
            </span>
        </li>
        <li>
            <i class="fa-solid fa-users"></i>
            <span class="text">
                <h3>04</h3>
                <p>Users</p>
            </span>
        </li>
        <li>
            <i class="fa-solid fa-message"></i>
            <span class="text">
                <h3>05</h3>
                <p>Inquiries</p>
            </span>
        </li>
    </ul>

    <?php
    
    $connection = mysqli_connect("localhost:4306", "root", "", "petcare");

    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "SELECT * FROM appointments";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1'>
        <caption>APPOINTMENTS</caption>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Pet Type</th>
                    <th>Doctor</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["fullName"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["contactNo"] . "</td>
                    <td>" . $row["petType"] . "</td>
                    <td>" . $row["doctor"] . "</td>
                    <td>" . $row["category"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>" . $row["time"] . "</td>
                    <td class='status-pending'>" . $row["status"] . "</td> <!-- Use status from database -->
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    
    mysqli_close($connection);
    ?>
</div>

<footer>
    <p>&copy; 2024 Fuzz n Feathers. All rights reserved.</p>
    <p>Designed by <a href="#">Group 7, Batch 107</a></p>
</footer>

</body>
</html>
