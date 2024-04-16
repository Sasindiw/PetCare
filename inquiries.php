<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzz n' Feathers - Inquiries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body{
            background-color: rgb(238, 170, 34);
        }
       
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-top: 8%;
    background-color: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: left;
}

td {
    text-align: left;
}


tr:nth-child(even) {
    background-color: #f9f9f9;
}


tr:hover {
    background-color: #e0e0e0;
}


textarea {
    width: 100%;
    height: 100px;
    padding: 5px;
    margin-top: 5px;
    border: 1px solid #ccc;
    resize: vertical;
}


input[type="submit"] {
    margin-top: 5px;
    padding: 8px 12px;
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
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

footer {
  background-color: #0c0c4b;
  color: #fff;
  padding: 1rem 6rem; 
  text-align: center;
  margin-top: 5%;

}

footer p {
  
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
        <i class="fas fa-dog"> </i>
        Fuzz n' Feathers
    </a>
    <nav class="navbar">
        <a href="../html/index.html"><i class="fas fa-home"></i> HOME</a>
        <a href="../html/about.html"><i class="fas fa-info-circle"></i> ABOUT</a>
        <a href="../html/index.php"> <i class="fas fa-user"></i> PROFILE</a>
    </nav>
</header>

<div class="container">
    <h2>Inquiries</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date & Time</th>
                <th>Reply</th> 
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
                    echo "<td>";
                    echo "<form action='message.php' method='POST'>";
                    echo "<input type='hidden' name='inquiry_id' value='" . $row["id"] . "'>";
                    echo "<textarea name='admin_reply' rows='4' cols='50' placeholder='Write admin reply'></textarea>";
                    echo "<br>";
                    echo "<input type='submit' value='Send Reply'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No inquiries found</td></tr>";
            }
            $connection->close();
            ?>
        </tbody>
    </table>
</div>


<footer>
    <p>&copy; 2024 Fuzz n Feathers. All rights reserved.</p>
    <p>Designed by <a href="#">Group 7, Batch 107 </a></p>
  </footer>

</body>
</html>