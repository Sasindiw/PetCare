<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['inquiry_id']) && isset($_POST['admin_reply'])) {
        
        $inquiry_id = $_POST['inquiry_id'];
        $admin_reply = $_POST['admin_reply'];

        
        $servername = "localhost:4306";
        $username = "root";
        $password = "";
        $dbname = "petcare";

        
        $connection = new mysqli($servername, $username, $password, $dbname);

        
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        
        $sql = "UPDATE inquiries SET admin_reply = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("si", $admin_reply, $inquiry_id);

        if ($stmt->execute()) {
            
            header("Location: inquiries.php"); 
            exit();
        } else {
            
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

    
        $stmt->close();
        $connection->close();
    } else {
        
        echo "Error: Inquiry ID or admin reply not set.";
    }
} else {
    
    echo "Error: Form data not submitted.";
}
?>
