<?php
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokokitadatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
//START KATEGORI MAKANAN 
$id_kategori_makanan = 1; // Gantilah dengan ID kategori makanan yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori makanan
$query = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_makanan";

$result = $conn->query($query);
if ($result) {
    // Ambil hasil query
    $row = $result->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI MAKANAN

// START KATEGORI MINUMAN
$id_kategori_minuman = 2; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query1 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_minuman";

$result1 = $conn->query($query1);
if ($result1) {
    // Ambil hasil query
    $row1 = $result1->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI MINUMAN

// START KATEGORI ROKOK
$id_kategori_rokok = 3; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query2 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_rokok";

$result2 = $conn->query($query2);
if ($result2) {
    // Ambil hasil query
    $row2 = $result2->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI ROKOK

// START KATEGORI BODYCARE
$id_kategori_bodyCare = 4; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query3 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_bodyCare";

$result3 = $conn->query($query3);
if ($result3) {
    // Ambil hasil query
    $row3 = $result3->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI BODYCARE

// START KATEGORI HOMECARE
$id_kategori_homeCare = 5; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query4 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_homeCare";

$result4 = $conn->query($query4);
if ($result4) {
    // Ambil hasil query
    $row4 = $result4->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI HOMECARE

// START KATEGORI PERABOTAN
$id_kategori_perabotan = 6; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query5 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_perabotan";

$result5 = $conn->query($query5);
if ($result5) {
    // Ambil hasil query
    $row5 = $result5->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI PERABOTAN

// START KATEGORI STATIONERY
$id_kategori_stationery = 7; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query6 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_stationery";

$result6 = $conn->query($query6);
if ($result6) {
    // Ambil hasil query
    $row6 = $result6->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI STATIONERY

// START KATEGORI MAINAN
$id_kategori_mainan = 8; // Gantilah dengan ID kategori minuman yang sesuai
// Query SQL untuk menghitung jumlah produk dalam kategori minuman
$query7 = "SELECT COUNT(*) AS jumlah_produk FROM produk WHERE kategori_id = $id_kategori_mainan";

$result7 = $conn->query($query7);
if ($result7) {
    // Ambil hasil query
    $row7 = $result7->fetch_assoc();

    // Tampilkan jumlah produk
    // echo "Jumlah produk dalam kategori makanan: " . $row['jumlah_produk'];
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . $conn->error;
}
// END KATEGORI STATIONERY
// $queryProdukAll = mysqli_query($con, "SELECT id, nama, harga, stok, foto, ketersediaan_stok FROM produk");
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

$file = 'visitor_count.txt';

// Membaca jumlah pengunjung dari file
$count = file_exists($file) ? (int)file_get_contents($file) : 0;

// Menambah satu pada jumlah pengunjung
$count++;

// Menulis jumlah pengunjung yang baru ke file
file_put_contents($file, $count);

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
                <div class="loading-overlay" id="loadingOverlay">
                    <div class="loading-spinner"></div>
                </div>
            </form>
        </div>
        <div class="header-2">
            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="#category">Category</a>
                <a href="#product">Product</a>
                <a href="#deal">About</a>
                <a href="#contact">Message</a>
            </nav>
            <div class="icons">
                <a href="login.php"><i class="fa-solid fa-power-off"></i></a>
                <a href="#subs"><i class="fa-solid fa-bell"></i></a>
                <a href="#hub"><i class="fa-solid fa-address-book"></i></a>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- start home -->
    <section class="home" id="home">

        <div class="image">
            <img src="img/logoToko.png" alt="">
        </div>
        <div class="content">
            <span>Lengkap dan murah</span>
            <h3>Your daily need <br>products 🛒</h3>
            <a href="produk.php" class="btn">Lihat Produk</a>
        </div>
    </section>
    <!-- end home -->

    <!-- Start banner -->
    <section class="banner-container">
        <div class="banner">
            <img src="img/top-view-coffee-with-copy-space.jpg" alt="">
            <div class="content">
                <h3>All Category</h3>
                <p>8 Category</p>
            </div>
        </div>
        <div class="banner">
            <img src="img/potato-chips-isolated-white-background.jpg" alt="">
            <div class="content">
                <h3>All Product</h3>
                <p>
                    <?php echo $jumlahProduk; ?> Product
                </p>
            </div>
        </div>
    </section>
    <!-- End banner -->
    <!-- Start Kategori -->
    <section class="category" id="category">
        <h1 class="heading">Latest <span>Category</span></h1>
        <div class="box-container">
            <div class="box">
                <h3>Makanan</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/unhealthy-fatty-heap-crispy-diet (1).jpg" alt="">
                <a href="produk.php?kategori=Makanan" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Minuman</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row1['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/fresh-cola-drink-glass (1).jpg" alt="">
                <a href="produk.php?kategori=Minuman" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Rokok</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row2['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/5150572_6981 (3).jpg" alt="">
                <a href="produk.php?kategori=Rokok" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Bodycare</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row3['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/scrub-squeezed-out-from-tube (1).jpg" alt="">
                <a href="produk.php?kategori=Bodycare" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Homecare</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row4['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/9454401.png" alt="">
                <a href="produk.php?kategori=Homecare" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Perabotan</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row5['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/cleaning-sponges-silver-pail.jpg" alt="">
                <a href="produk.php?kategori=Perabotan" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Stationery</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row6['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/rings-notebook-stacked (1).jpg" alt="">
                <a href="produk.php?kategori=Stationery" class="btn">See product</a>
            </div>
            <div class="box">
                <h3>Mainan</h3>
                <p>
                    <span style="color:tomato;font-weight:bolder;">
                        <?php echo $row7['jumlah_produk']; ?>
                    </span> Produk
                </p>
                <img src="img/robot-adjustable-wrench (2).jpg" alt="">
                <a href="produk.php?kategori=Mainan" class="btn">See product</a>
            </div>
        </div>
    </section>
    <!-- End Kategori -->
    <!-- Start Produk -->
    <section class="product" id="product">
        <h1 class="heading">Latest <span>Product</span></h1>
        <div class="box-container">

            <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                <div class="box">

                    <!-- <span class="discount">New</span> -->
                    <div class="icons">
                        <a href="whatsapp://send?text=Selamat datang di toko kita, tempat di mana kepuasan Anda adalah prioritas utama! Kami ingin mengajak Anda untuk menjelajahi berbagai pilihan produk berkualitas yang telah kami pilih dengan cermat untuk memenuhi kebutuhan sehari-hari Anda. Di sini, belanja bukan hanya sekadar aktivitas, tetapi pengalaman yang memuaskan dan berarti.
                        Ayo belanja di toko kita, karena kami menawarkan lebih dari sekadar barang. Kami menyajikan atmosfer yang ramah dan layanan pelanggan yang siap membantu setiap langkah perjalanan belanja Anda. Dengan staf yang berpengalaman dan antusias, kami bertekad memberikan pengalaman belanja yang tak terlupakan.
                        Kami bangga dengan koleksi produk berkualitas tinggi dari berbagai kategori, mulai dari fashion, elektronik, hingga perlengkapan rumah tangga. Setiap produk dijamin memiliki standar kualitas yang tinggi dan dipilih dengan teliti untuk memenuhi harapan Anda."
                            data-action="share/whatsapp/share" class="fas fa-share"></a>
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
                            <span>Stok :
                                <?php echo $produk['stok']; ?> pcs
                            </span>
                            <span>
                                <?php echo $produk['ketersediaan_stok']; ?>
                            </span>
                        </div>
                        <a href="readMoreProduct.php?id=<?php echo $produk['id']; ?>" class="btn">Read more</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="btn-test">
            <button class="btn-load" id="load-more">See more</button>
        </div>

    </section>

    <!-- End Produk -->

    <!-- Open Mart -->
    <section class="deal" id="deal">

        <div class="content">
            <h3 class="tittle" id="status"></h3>
            <p>Selamat datang di toko kita! Kami buka setiap hari mulai pukul 06.00 pagi hingga 00.00 malam. Temukan
                produk terbaik dan nikmati pengalaman berbelanja yang menyenangkan bersama kami. Ayo kunjungi sekarang!
            </p>

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
    if (isset($_POST['simpan'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $queryMessage = mysqli_query($con, "INSERT INTO message (nama, number, email, subjek, pesan) VALUES ('$nama', '$number', '$email', '$subject', '$message')");
        if ($queryMessage) {
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
        } else {
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
        <h3><span style="color:tomato;">Subscribe</span> us for latest updates</h3>
        <form action="subscribe.php" method="post" id="subscribeForm" id="form">
            <input name="yourEmail" class="box" type="email" placeholder="Enter your email" id="email" required>
            <button type="submit" value="Subscribe" class="btn" name="simpan"  id="submit-btn">Subscribe</button>
        </form>
    </section>
    <!-- end newsletter -->
    <!-- footer section -->
    <section class="footer" id="hub">
        <div class="box-container">
            <div class="box">
            <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Toko Kita</a>
                <p>Toko kita menyediakan berbagai produk, mulai dari makanan, minuman, rokok, hingga homecare, bodycare,
                    perabotan, dan mainan. Nikmati pengalaman belanja lengkap dengan pilihan bervariasi di toko kami.🎉
                </p>
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
                    <a href="#home">home</a>
                    <a href="#category">category</a>
                    <a href="#product">product</a>
                    <a href="#deal">deal</a>
                    <a href="#hub">contact</a>
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
        <h1 class="credit"> created by <span> Putu Rifki Dirkayuda </span>| all right reserved! </h1>
    </section>
    <!-- end footer section -->
    <!-- link javascript -->
    <script src="main.js"></script>
    <script>
        // Fungsi untuk merefresh halaman
        function refreshPage() {
            // Pilihan 2: Menggunakan location.href
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
            showAlert('Terima kasih! Anda akan mendapatkan update melalui email.', 'success');
        }
    </script>
</body>
</html>