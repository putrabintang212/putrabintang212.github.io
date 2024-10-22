<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
      * {
        font-family: 'Playfair Display', serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        background: linear-gradient(135deg, #74ebd5, #ACB6E5); 
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      
      h1 {
        text-transform: uppercase;
        color: #007bff; 
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 20px;
      }

      .base {
        width: 400px;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      }

      label {
        font-weight: bold;
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 10px;
        display: block;
      }

      input[type="text"],
      input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 2px solid #ccc;
        border-radius: 8px;
        font-size: 1.1rem;
        background: #f8f8f8;
        transition: all 0.3s ease;
      }

      input[type="text"]:focus,
      input[type="file"]:focus {
        border-color: #007bff; 
        outline: none;
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
    </style>
  </head>
  <body>
    <div class="base">
      <h1>Tambah Produk</h1>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" required>
        
        <label>Deskripsi</label>
        <input type="text" name="deskripsi">

        <label>Harga Beli</label>
        <input type="text" name="harga_beli" required>

        <label>Harga Jual</label>
        <input type="text" name="harga_jual" required>

        <label>Gambar Produk</label>
        <input type="file" name="gambar_produk" required>

        <button type="submit">Simpan Produk</button>
      </form>
    </div>
  </body>
</html>
