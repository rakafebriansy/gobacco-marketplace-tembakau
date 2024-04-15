<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gobacco</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap">


    <!-- Iconts -->
    


    <!-- CSS -->
    <link rel="stylesheet" href="../dist/style.css">
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">
            <img src="images/logo.png" alt="Logo" class="logo">
            <span>GoBacco</span>
        </a>


        <div class="navbar-nav">
            <a href="#">Home</a>
            <a href="#about">Tentang kami</a>
            <div class="dropdown">
                <a href="">Fitur</a>
                <div class="dropdown-content">
                    <a href="#edukasi">Edukasi</a>
                    <a href="#fitur">Sertifikasi</a>
                </div>
            </div>
            <a href="#">Contact</a>
            <a href="/login"><button class="login">Login</button></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- tengah -->
    <div class="tengah">
        <div class="h1h4">
            <h1>Platform GOBACCO untuk<br> Sertifikasi Mutu Produk<br> Tembakau</h1>
            <h4>Bergabunglah untuk mengoptimalkan proses penjualan<br> tembakau Anda secara efisien dan mengembangkan
                bisnis<br> Anda dengan lebih baik</h4>
        </div>

        <div class="gambarhomepage">
            <img src="images/homepage.png" class="gambar_homepage">
        </div>
    </div>


    <!-- tengah end -->

<!-- bawahnya tengah -->
    <div class="tengah-part2">

    <!-- fitur navbar -->
    <div class="empty-rectangle">

    </div>
        <div id="about" class="About">
            <h2>Tentang Kami</h2>
            <div class="image-container">
                <div class="image-wrapper">
                    <img src="images/images1.jpg" alt="Gambar 1">
                    <p>Pemberdayaan penjualan dan pembelian Anda dengan akses pasar yang lebih luas</p>
                </div>
                <div class="image-wrapper">
                    <img src="images/images2.jpg" alt="Gambar 2">
                    <p>Edukasi prediksi cuaca yang baik untuk penanaman tembakau Anda</p>
                </div>
                <div class="image-wrapper">
                    <img src="images/images3.jpg" alt="Gambar 3">
                    <p>Sertifikasi legalitas produk mutu tembakau Anda dengan mudah</p>
                </div>
        </div>

        <div id="edukasi" class="Edukasi">
            <h2>Edukasi</h2>
            <div class="image2-container">
                <div class="image2-wrapper"> 
                    <img src="images/images4.jpg.png" alt="Gambar 1">
                    <h5>Informasi penanaman</h5>
                    <button class="lihat-detail">Lihat Detail</button>
                </div>
                <div class="image2-wrapper"> 
                    <img src="images/images5.jpg" alt="Gambar 2">
                    <h5>Informasi Ekspor</h5>
                    <button class="lihat-detail">Lihat Detail</button>
                </div>
            </div>
        </div>

        <div id="fitur" class="Fitur">
            <h2>Fitur Kami</h2>
            <div class="image3-container">
                <div>
                    <div class="image3-wrapper"> 
                        <div class="image3-title">
                            <img src="images/images6.jpg" alt="Gambar 1">
                            <h5>Fitur Edukasi</h5>
                        </div>
                        <p>Membantu memberi edukasi untuk anda mengenai informasi cuaca dan informasi syarat melakukan ekspor</p>
                        <button class="lihat2-detail">Lihat Detail</button>
                    </div>
                    <div class="image3-wrapper"> 
                        <div class="image3-title">
                            <img src="images/images7.jpg" alt="Gambar 3">
                            <h5>Fitur Sertifikasi</h5>
                        </div>
                        <p>Membantu anda dalam melakukan sertifikasi mutu produk tembakau dan legalitaas produk anda</p>
                        <button class="lihat2-detail">Lihat Detail</button>
                    </div>
                </div>
            </div>


        </div>


        <!-- fitur navbar end -->
    </div>
<!-- bawahnya tengah end -->



    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <a href="#">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Licensing</a>
            <a href="#">Contact</a>
        </div>
        <hr>
        <p class="footer-bottom">2024 GOBACCO. All rights reserved.</p>
    </footer>
    <!-- Footer end -->
</body>
</html>