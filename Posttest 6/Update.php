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

    $sql = "SELECT * FROM payments WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (isset($_POST['update'])) {
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $address = $conn->real_escape_string($_POST['address']);
            $model = $conn->real_escape_string($_POST['model']);

            $sql = "UPDATE payments SET name='$name', email='$email', phone='$phone', address='$address', model='$model' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("Location: view_payments.php"); 
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Payment</title>
        </head>
        <body>
            <h1>Edit Pembelian Komputer</h1>
            <form method="post">
                Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
                Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
                Telepon: <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" required><br>
                Alamat: <textarea name="address"><?php echo $row['address']; ?></textarea><br>
                Model Komputer: <input type="text" name="model" value="<?php echo $row['model']; ?>" readonly><br>
                <input type="submit" name="update" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Record not found.";
    }
}
?>
