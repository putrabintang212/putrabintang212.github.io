<?php
$host = 'localhost'; 
$db = 'starcomp';   
$user = 'root';       
$pass = '';            

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payments";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .action-buttons a {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            margin-right: 10px;
            display: inline-block;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover, .edit-btn:hover {
            opacity: 0.8;
        }

        @media screen and (max-width: 768px) {
            table, table th, table td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Pembayaran</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Model Komputer</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'starcomp');

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM payments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td class='action-buttons'>
                            <a href='update.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='delete-btn' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data pembayaran.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>