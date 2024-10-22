<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarComp Product</title>
    <style type="text/css">
        * {
            box-sizing: border-box;
        }
        
        body {
        font-family: "Playfair Display", serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); /* Gradasi latar belakang */
        color: #333333; /* Teks gelap untuk kontras */
        transition: background-color 0.3s, color 0.3s;
      }


        h1 {
            text-transform: uppercase;
            color: #007bff; /* Warna biru untuk heading */
            text-align: center;
            margin-top: 20px;
        }

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        table thead th {
            background-color: #007bff; /* Warna biru untuk header tabel */
            border: solid 1px #DDEEEE;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Baris dengan warna abu-abu muda */
        }

        table tbody tr:nth-child(odd) {
            background-color: #fff; /* Baris dengan warna putih */
        }

        table tbody tr:hover {
            background-color: #e3f2fd; /* Efek hover pada baris */
        }

        a {
            background-color: #007bff; /* Warna biru untuk link */
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 12px;
            border-radius: 5px;
        }

        .edit-btn {
            background-color: #007bff; /* Warna biru untuk tombol Edit */
            padding: 8px 12px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #dc3545; /* Warna merah untuk tombol Delete */
            padding: 8px 12px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            opacity: 0.8;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            h1 {
                font-size: 20px;
            }

            table tbody td {
                font-size: 12px;
                padding: 8px;
            }

            table thead th {
                font-size: 14px;
                padding: 10px;
            }
        }

    </style>
</head>
<body>
      <div style="position: absolute; top: 20px; left: 20px;">
      <a href="../admin_dash.php" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">← Kembali</a>
      </div>
    <center><h1>Data Produk</h1></center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
    <br/>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            //mengecek apakah ada error ketika menjalankan query
            if(!$result){
                die ("Query Error: ".mysqli_errno($koneksi).
                   " - ".mysqli_error($koneksi));
            }

            //buat perulangan untuk elemen tabel dari data produk
            $no = 1; //variabel untuk membuat nomor urut
            // hasil query akan disimpan dalam variabel $data dalam bentuk array
            // kemudian dicetak dengan perulangan while
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
                <td>Rp <?php echo $row['harga_jual']; ?></td>
                <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                <td>
                    <a class="edit-btn" href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a class="delete-btn" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++; //untuk nomor urut terus bertambah 1
            }
            ?>
        </tbody>
    </table>
</body>
</html>
