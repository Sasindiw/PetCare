<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzz n' Feathers - Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
     
     body {
            background-color: rgb(238, 170, 34);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 80px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            margin-top: 10%;
        }

        h2 {
            color: rgb(8, 26, 71);
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
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
   
        
        .header {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 9%;
            box-shadow: rgb(102, 101, 101);
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 2rem;
            color: rgb(8, 26, 71);
            font-weight: bold;
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


    </style>
</head>
<body>
<header class="header">
    <a href="#" class="logo"> 
        <i class="fas fa-dog"> </i>
        Fuzz n' Feathers
    </a>
    <nav class="navbar">
        <a href="../html/index.html"><i class="fas fa-home"></i> HOME</a>
        <a href="../html/about.html"><i class="fas fa-info-circle"></i> ABOUT</a>
        <a href="../html/client.php"> <i class="fas fa-user"></i> PROFILE</a>
    </nav>
</header>

<div class="container">
    <h2>MESSAGES</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date & Time</th>
                <th>Admin Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost:4306";
            $username = "root";
            $password = "";
            $dbname = "petcare";

            $connection = new mysqli($servername, $username, $password, $dbname);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM inquiries ORDER BY id DESC";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "<td>" . $row["admin_reply"] . "</td>"; 
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No messages found</td></tr>";
            }
            $connection->close();
            ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h2>MY APPOINTMENTS</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Symptoms</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost:4306";
            $username = "root";
            $password = "";
            $dbname = "petcare";

            $connection = new mysqli($servername, $username, $password, $dbname);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM appointments ORDER BY id DESC";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fullName"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["contactNo"] . "</td>";
                    echo "<td>" . $row["doctor"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td>" . $row["symptoms"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No appointments found</td></tr>";
            }
            $connection->close();
            ?>
        </tbody>
    </table>
</div>


</body>
</html>
