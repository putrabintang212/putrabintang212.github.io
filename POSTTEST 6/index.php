<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarCOMP</title>
    <link rel="stylesheet" href="style.css">
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
                <li><button id="mode-toggle">Dark Mode</button></li>
            </ul>
        </nav>
    </header>

    <main id="home">
        <section class="landing">
            <h1 class="landing-text1">Welcome to StarCOMP <span> <br>Start Shopping <br>Enjoy Shopping</span></h1>
            <button id="popup-btn">_</button>
    
            <section id="products">
                <div class="product-card">
                    <img src="img/Acer Orion 900.png" alt="Acer Orion 900">
                    <p>Acer Orion 900</p>
                    <p>Rp95.469.000</p>
                    <form action="payment.php" method="post">
                        <input type="hidden" name="product_name" value="Acer Orion 900">
                        <input type="hidden" name="product_image" value="img/Acer Orion 900.png">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            
                <div class="product-card">
                    <img src="img/Legion T7.png" alt="Legion T7">
                    <p>Legion T7</p>
                    <p>Rp67.319.000</p>
                    <form action="payment.php" method="post">
                        <input type="hidden" name="product_name" value="Legion T7">
                        <input type="hidden" name="product_image" value="img/Legion T7.png">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            
                <div class="product-card">
                    <img src="img/MSI DESKTOP MEG TRIDENT X-1.png" alt="MSI Meg Trident X">
                    <p>MSI Meg Trident X</p>
                    <p>Rp56.990.000</p>
                    <form action="payment.php" method="post">
                        <input type="hidden" name="product_name" value="MSI Meg Trident X">
                        <input type="hidden" name="product_image" value="img/MSI DESKTOP MEG TRIDENT X-1.png">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            
                <div class="product-card">
                    <img src="img/ROG G15CF 2.png" alt="ROG G15CF">
                    <p>ROG G15CF</p>
                    <p> Rp33.699.000</p>
                    <form action="payment.php" method="post">
                        <input type="hidden" name="product_name" value="ROG G15CF">
                        <input type="hidden" name="product_image" value="img/ROG G15CF 2.png">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </section>

        <section id="about">
            <h2></h2>
            <p class="biodata">Hello! <br>    
                <h1>Biodata Saya</h1>
                <p>Nama Saya Putra Bintang Pratama</p>

                </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 StarCOMP. All Rights Reserved.</p>
    </footer>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <p>Website ini masih dalam pengembangan!</p>
        </div>
    </div>

    <div id="spec-popup" class="popup">
        <div class="popup-content">
            <span class="close-spec-btn">&times;</span>
            <div id="spec-details">
    <script src="script.js"></script>
</body>
</html>
