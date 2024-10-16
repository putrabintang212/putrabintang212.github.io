<?php
$host = 'localhost';  
$db = 'starcomp';      
$user = 'root';        
$pass = '';            

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $model = $conn->real_escape_string($_POST['model']);

    $sql = "INSERT INTO payments (name, email, phone, address, model) VALUES ('$name', '$email', '$phone', '$address', '$model')";

    if ($conn->query($sql) === TRUE) {
        echo " ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 500px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    </style>
</head>


<body>
    <div class="container">
        <h1>CHECK OUT</h1>

        <form action="payment.php" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]+" title="Hanya masukkan angka" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" rows="2" required></textarea>

            <label for="model">Model Komputer:</label>
            <input type="text" id="model" name="model" value="<?php echo isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : ''; ?>" readonly>
            <div style="text-align: center;">
                <img src="<?php echo isset($_POST['product_image']) && !empty($_POST['product_image']) ? htmlspecialchars($_POST['product_image']) : 'img/default-image.png'; ?>" alt="Product Image" onerror="this.src='img/default-image.png';" style="width: 200px; height: auto;">
            </div>
            <button type="submit" name="submit">Beli Sekarang</button>
        </form>

          <?php
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $model = htmlspecialchars($_POST['model']);
            

            echo "<h2>Barang berhasil dibeli!</h2>";
            echo "<p><strong>Nama:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Nomor Telepon:</strong> $phone</p>";
            echo "<p><strong>Alamat:</strong> $address</p>";
            echo "<p><strong>Model Komputer:</strong> $model</p>";
            
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<a href="view_payments.php" class="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Lihat Pembelian</a>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
