<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarCOMP</title>
    <link rel="stylesheet" href="style/ustyles.css">
</head>
<body class="light-mode">
    <header>
        <nav>
            <div class="logo">StarCOMP</div>
            <div class="hamburger-menu" id="hamburger">&#9776;</div>
            <ul id="navbar">
                <li><a href="foto/index.php">Daftar Produk</a></li>
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="registrasi.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><button id="mode-toggle"> <span class="icon" id="icon-mode">&#9728;</span>Dark Mode</button></li>
            </ul>
        </nav>
    </header>

    <main id="home">
        <section class="landing">
            <h1 class="landing-text1">Welcome to StarCOMP <span><br>Start Shopping <br>Enjoy Shopping</span></h1>
    
            <section id="products">
                <div class="product-card">
                    <img src="img/Acer Orion 900.png" alt="Acer Orion 900">
                    <p>Acer Orion 900</p>
                    <p>Rp95.469.000</p>
                    <button class="buy-button">Buy</button>
                </div>
            
                <div class="product-card">
                    <img src="img/Legion T7.png" alt="Legion T7">
                    <p>Legion T7</p>
                    <p>Rp67.319.000</p>
                    <button class="buy-button">Buy</button>
                </div>
            
                <div class="product-card">
                    <img src="img/MSI DESKTOP MEG TRIDENT X-1.png" alt="MSI Meg Trident X">
                    <p>MSI Meg Trident X</p>
                    <p>Rp56.990.000</p>
                    <button class="buy-button">Buy</button>
                </div>
            
                <div class="product-card">
                    <img src="img/ROG G15CF 2.png" alt="ROG G15CF">
                    <p>ROG G15CF</p>
                    <p> Rp33.699.000</p>
                    <button class="buy-button">Buy</button>
                </div>
            </section>

        <section id="about">
            <h2>About Me</h2>
            <p class="biodata"><br>    
                <p>Halo Saya Bintang!<br>
                Saya Mahasiswa Universitas Mulawarman<br>
                Program Studi Informatika<br> 
                Praktikan Pemrograman Website Kelas A1'23<br>
                </p>
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 StarCOMP. All Rights Reserved.</p>
    </footer>

    <div id="login-popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>You must be logged in to make a purchase</h2>
            <div class="popup-buttons">
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
