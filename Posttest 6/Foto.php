<?php
// Database connection
$host = 'localhost';
$dbname = 'file_upload_db';
$username = 'root'; // Adjust based on your setup
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle file upload
if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = strtolower(end(explode('.', $fileName)));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // Limit 5MB
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'uploads/' . $fileNewName;

                if (!is_dir('uploads')) {
                    mkdir('uploads');
                }

                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO files (file_name, file_path) VALUES (:file_name, :file_path)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['file_name' => $fileName, 'file_path' => $fileDestination]);

                header("Location: index.php?uploadsuccess");
            } else {
                echo "File size too large!";
            }
        } else {
            echo "Error uploading your file!";
        }
    } else {
        echo "Invalid file type!";
    }
}

// Handle file deletion
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $file = $_POST['file_path'];

    if (file_exists($file)) {
        unlink($file);
    }

    $sql = "DELETE FROM files WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: index.php?deletesuccess");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload & CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin: 20px 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        button {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Message styling */
        .message {
            padding: 10px;
            margin-bottom: 20px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>

    <h1>File Upload & CRUD</h1>

    <!-- File Upload Form -->
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <
