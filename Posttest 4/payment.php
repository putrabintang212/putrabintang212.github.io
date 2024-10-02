<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Komputer</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="container">
        <h1>CHECK OUT</h1>

        <form action="" method="post">
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

            <button type="submit" name="submit">Beli Sekarang</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $model = htmlspecialchars($_POST['model']);

            echo "<h2>Invoice Pembelian</h2>";
            echo "<p><strong>Nama:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Nomor Telepon:</strong> $phone</p>";
            echo "<p><strong>Alamat:</strong> $address</p>";
            echo "<p><strong>Model Komputer:</strong> $model</p>";
        }
        ?>
    </div>
</body>
</html>
