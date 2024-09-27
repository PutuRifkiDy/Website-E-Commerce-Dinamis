<?php
require "koneksi.php";

if (isset($_GET['keyword'])) {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
// get produk dengan kategori
else if ($kategori = isset($_GET['kategori'])) {
    $queryToGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama = '$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryToGetKategoriId);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$kategoriId[id]'");
}
// get produk default
else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}


$countdata = mysqli_num_rows($queryProduk);
$queryProdukBanner = mysqli_query($con,"SELECT * FROM produk");
$bannerDataProduk = mysqli_num_rows($queryProdukBanner);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kita</title>
    <!-- link cdn font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="img/logo_toko_kita-fotor-2024011719649-removebg(2).png">

</head>

<body>
    <!-- header section -->
    <header>
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Toko Kita</a>
            <form method="get" action="produk.php" class="search-box-container">
                <input type="search" id="search-box" placeholder="Cari produk..." name="keyword" required>
                <button type="submit"><label for="search-box" class="fas fa-search"></label></button>
            </form>
            <div class="loading-overlay" id="loadingOverlay">
                <div class="loading-spinner"></div>
            </div>
        </div>
        <div class="header-2">
            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">
                <a href="index.php#home">Home</a>
                <a href="index.php#category">Category</a>
                <a href="#product">Product</a>
                <a href="#deal">About</a>
                <a href="#contact">Question</a>
            </nav>
            <div class="icons">
            <a href="login.php"><i class="fa-solid fa-power-off"></i></a>
                <a href="#subs"><i class="fa-solid fa-bell"></i></a>
                <a href="#hub"><i class="fa-solid fa-address-book"></i></a>   
            </div>
        </div>
    </header>
    <!-- end header -->

     <section class="product" id="product">
        <h1 class="heading">Latest <span>Product</span></h1>
        <?php
        if ($countdata < 1) {
            ?>
            <h2 style="text-align:center;margin-top:3rem;font-size:3rem;color:tomato;">Produk Tidak Ditemukan</h2>
            <?php
        }
        ?>
        <div class="box-container">

            <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                <div class="box">

                    <!-- <span class="discount">New</span> -->
                    <div class="icons">
                        <a href="https://web.whatsapp.com/send?text=www.google.com" class="fas fa-share"></a>
                        <a href="imginput/<?php echo $produk['foto']; ?>" class="fas fa-eye"></a>
                    </div>
                    <img src="imginput/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                    <h3>
                        <?php echo $produk['nama']; ?>
                    </h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <div class="price">Rp.
                            <?php echo $produk['harga']; ?>
                        </div>
                        <div class="quantity">
                            <span>Stok : <?php echo $produk['stok'];?> pcs</span>
                            <span>
                                <?php echo $produk['ketersediaan_stok']; ?>
                            </span>
                        </div>
                        <a href="readMoreProduct.php?id=<?php echo $produk['id'];?>" class="btn">Read more</a>
                    </div>
                </div>
                <?php } ?>
        </div>
        <div class="btn-test">
            <button class="btn-load" id="load-more">See more</button>
        </div>
    </section>
    <!-- End banner -->
    <!-- Open Mart -->
    <section class="deal" id="deal">

        <div class="content">
            <h3 class="tittle" id="status"></h3>
            <p>Selamat datang di toko kita! Kami buka setiap hari mulai pukul 06.00 pagi hingga 00.00 malam. Temukan produk terbaik dan nikmati pengalaman berbelanja yang menyenangkan bersama kami. Ayo kunjungi sekarang!</p>

            <div class="count-down">
                <div class="box">
                    <h3 id="day">00</h3>
                    <span>day</span>
                </div>
                <div class="box">
                    <h3 id="hour">00</h3>
                    <span>hour</span>
                </div>
                <div class="box">
                    <h3 id="minute">00</h3>
                    <span>minute</span>
                </div>
                <div class="box">
                    <h3 id="second">00</h3>
                    <span>second</span>
                </div>
            </div>
        </div>

    </section>
    <!-- End Mart -->
    <!-- start contact -->
    <section class="contact" id="contact">
        <h1 class="heading"><span style="color:">Contact</span> us</h1>
        <form action="" method="post">
            <div class="inputBox">
                <input type="text" placeholder="name" name="nama" required>
                <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number" name="number" required>
                <input type="text" placeholder="subject" name="subject" required>
            </div>
            <textarea name="message" id="" cols="30" rows="10" placeholder="message"></textarea>
            <input type="submit" value="send-message" class="btn" name="simpan" required>
        </form>
    </section>
    <!-- end contact -->
    <?php
    if(isset($_POST['simpan'])){
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $queryMessage = mysqli_query($con,"INSERT INTO message (nama, number, email, subjek, pesan) VALUES ('$nama', '$number', '$email', '$subject', '$message')");
        if($queryMessage){
            ?>
            <script>
            function showAlert(message, type) {
                var alertBox = document.createElement('div');
                alertBox.className = 'custom-alert ' + type + ' show';
                alertBox.innerHTML = '<span class="close-btn" onclick="closeAlert()">&times;</span><p>' + message + '</p>';
                document.body.appendChild(alertBox);

                setTimeout(function () {
                    closeAlert();
                }, 3000); // Sembunyikan alert setelah 3 detik
            }

            function closeAlert() {
                var alertBox = document.querySelector('.custom-alert');
                alertBox.className = 'custom-alert';
                document.body.removeChild(alertBox);
            }

            // Menampilkan alert berhasil disimpan
            showAlert('Pesan berhasil dikirim', 'success');
        </script>
            <?php
        }else{
            ?>
            <script>
            function showAlert(message, type) {
                var alertBox = document.createElement('div');
                alertBox.className = 'custom-alert ' + type + ' show';
                alertBox.innerHTML = '<span class="close-btn" onclick="closeAlert()">&times;</span><p>' + message + '</p>';
                document.body.appendChild(alertBox);

                setTimeout(function () {
                    closeAlert();
                }, 3000); // Sembunyikan alert setelah 3 detik
            }

            function closeAlert() {
                var alertBox = document.querySelector('.custom-alert');
                alertBox.className = 'custom-alert';
                document.body.removeChild(alertBox);
            }

            // Menampilkan alert berhasil disimpan
            showAlert('Pesan gagal dikirim', 'error');
        </script>
            <?php
        }
    }
    ?>
    <!-- newsletter -->
    <section class="news-letter" id="subs">
        <h3><span style="color:#f56042;">subscribe</span> us for latest updates</h3>
        <form action="">
            <input class="box" type="email" placeholder="enter your email">
            <input type="submit" value="subscribe" class="btn">
        </form>
    </section>
    <!-- end newsletter -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
            <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Toko Kita</a>
                <p>Toko kita menyediakan berbagai produk, mulai dari makanan, minuman, rokok, hingga homecare, bodycare, perabotan, dan mainan. Nikmati pengalaman belanja lengkap dengan pilihan bervariasi di toko kami.</p>
                <div class="share" id="contact">
                <a href="#" class="btn btn fab fa-facebook-f"></a>
                    <a href="#" class="btn btn fab fa-twitter"></a>
                    <a href="https://www.instagram.com/puturifkidy?igsh=ZTFlY3l5anpudmU4" class="btn btn fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/putu-rifki-dirkayuda-a52a08257?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="btn btn fab fa-linkedin"></a>
                    <a href="https://wa.me/6282144209422." class="btn btn fab fa-whatsapp"></a>
                </div>
            </div>
            <div class="box">
                <h3>our location</h3>
                <div class="links">
                    <a href="https://maps.app.goo.gl/xw6LwLoiM8BbxSGq9">Gunung Mas</a>
                    <a href="https://maps.app.goo.gl/YTjMBdE6QQVFTChM8">Tangkuban Perahu</a>
                    <a href="https://maps.app.goo.gl/YTjMBdE6QQVFTChM8">Gunung Salak</a>
                    <a href="https://maps.app.goo.gl/xzChtYXJor6R2Mhf6">Seminyak</a>
                    <a href="https://maps.app.goo.gl/HknLQib6SmCZfh6C6">Kebo iwa</a>
                    <a href="https://maps.app.goo.gl/zfutdsWwQ5m4XV947">Gunung talang</a>
                    <a href="https://maps.app.goo.gl/uj8zcFoKz3LWjqbr7">Gunung guntur</a>
                </div>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <div class="links">
                    <a href="index.php#home">home</a>
                    <a href="index.php#category">category</a>
                    <a href="index.php#product">product</a>
                    <a href="index.php#deal">deal</a>
                    <a href="index.php#hub">contact</a>
                </div>
            </div>
            <div class="box">
                <h3>Download app</h3>
                <div class="links">
                    <a href="#">google play</a>
                    <a href="#">window xp</a>
                    <a href="#">app store</a>
                </div>
            </div>
        </div>
        <h1 class="credit"> created by  <span> Putu Rifki Dirkayuda </span>| all right reserved! </h1>
    </section>
    <!-- end footer section -->
    <script src="main.js"></script>
</body>

</html>