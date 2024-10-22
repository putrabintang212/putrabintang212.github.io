<?php
include 'koneksi.php';
session_start();         



if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    $sql = "INSERT INTO payments (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

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
    <title>Checkout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Playfair Display', serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .product-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-info img {
            width: 150px;
            height: auto;
            border-radius: 10px;
        }

        .product-info p {
            margin-top: 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .purchase-details {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .purchase-details p {
            margin-bottom: 10px;
        }

        .back-btn {
            width: 100%;
            padding: 15px;
            background-color: #6c757d;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        .view-payments {
            text-align: center;
            margin-top: 20px;
        }

        .view-payments a {
            padding: 12px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .view-payments a:hover {
            background-color: #3e8e41;
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
            <textarea id="address" name="address" rows="3" required></textarea>

            <div class="product-info">
                <img src="<?php echo isset($_POST['product_image']) && !empty($_POST['product_image']) ? htmlspecialchars($_POST['product_image']) : 'img/default-image.png'; ?>" alt="Product Image">
                <p><?php echo isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : 'Model Komputer'; ?></p>
            </div>

            <button type="submit" name="submit">Beli Sekarang</button>
        </form>

        <a href="user_dash.php" class="back-btn">Kembali</a>

        <?php
        if (isset($_POST['submit'])) {
            echo "<div class='purchase-details'>";
            echo "<h2>Barang berhasil dibeli!</h2>";
            echo "<p><strong>Nama:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
            echo "<p><strong>Nomor Telepon:</strong> " . htmlspecialchars($_POST['phone']) . "</p>";
            echo "<p><strong>Alamat:</strong> " . htmlspecialchars($_POST['address']) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
