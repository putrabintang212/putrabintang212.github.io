<?php
$host = 'localhost';  
$db = 'starcomp';      
$user = 'root';        
$pass = '';            

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM payments WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";

        $resetAutoIncrement = "ALTER TABLE payments AUTO_INCREMENT = 1";
        if ($conn->query($resetAutoIncrement) === TRUE) {
            echo "Auto-increment reset successfully.";
        } else {
            echo "Error resetting auto-increment: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    header("Location: view_payments.php");
    exit();
}

$conn->close();
?>
