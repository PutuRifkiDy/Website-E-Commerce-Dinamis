<?php
require "koneksi.php";
require "session.php";
$querySubscriber = mysqli_query($con, "SELECT * FROM subscribtion");
$banyakSubs = mysqli_num_rows($querySubscriber);
$queryMessage = mysqli_query($con, "SELECT * FROM message");
$banyakMessage = mysqli_num_rows($queryMessage);
$queryUser = mysqli_query($con, "SELECT * FROM users");
$banyakUser = mysqli_num_rows($queryUser);
$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$banyakProduk = mysqli_num_rows($queryProduk);
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$banyakKategori = mysqli_num_rows($queryKategori);
$banyakKategoriAsli = $banyakKategori - 1;


$file = 'visitor_count.txt';

// Membaca jumlah pengunjung dari file
$count = file_exists($file) ? (int) file_get_contents($file) : 0;
$user = $_SESSION['username'];
$query1 = "SELECT foto FROM users WHERE username = '$user'";
$hasil = $con->query($query1);
if ($hasil && $hasil->num_rows > 0) {
    $row = $hasil->fetch_assoc();
    $foto = $row['foto'];
}
$id = $_GET['p'];

$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id = '$id'");
$dataProduk = mysqli_fetch_array($queryProduk);

function generateRandomString($length = 10)
{
    $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMMNOPQRSTUVWXYZ';
    $characterLength = strlen($character);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $character[rand(0, $characterLength - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="styleDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img/logo_toko_kita-fotor-2024011719649-removebg(2).png">
    <title>Admin - Produk</title>
</head>

<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h2>K<span>ita</span></h2>
        </div>
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(imginput/<?php echo $foto; ?>)"></div>
                <h4>
                    <?php
                    $username = $_SESSION['username'];
                    $query = "SELECT nama FROM users WHERE username = '$username'";
                    $result = $con->query($query);

                    // Periksa apakah query berhasil dan tampilkan nama pengguna jika ada
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nama = $row['nama'];
                        echo $nama;
                    } else {
                        echo "Selamat datang!";
                    }
                    ?>
                </h4>
                <small>
                    <?php if (($_SESSION['role']) == 1) {
                        echo "Admin";
                    }
                    ; ?>
                </small>
            </div>



            <div class="side-menu">
                <ul>
                    <li>
                        <a href="dashboard.php">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminUser.php">
                            <span class="las la-user-alt"></span>
                            <small>User</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminKategori.php">
                            <span class="las la-box"></span>
                            <small>Kategori</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminProduk.php" class="active">
                            <span class="las la-shopping-cart"></span>
                            <small>Product</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminMessage">
                            <span class="las la-envelope"></span>
                            <small>Message</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminSubscriber.php">
                            <span class="las la-bell"></span>
                            <small>Subscriber</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">
                    <label for="">
                        <span class="las la-search" id="search"></span>
                    </label>

                    <div class="notify-icon">
                        <span class=""><a href="adminMessage.php"><i class="fa-regular fa-message"></i></a></span>
                        <span class="notify">
                            <?php echo $banyakMessage; ?>
                        </span>
                    </div>

                    <div class="notify-icon">
                        <span class=""><a href="adminSubscriber.php"><a href="adminMessage.php"><i
                                        class="fa-regular fa-bell"></i></a></span>
                        <span class="notify">
                            <?php echo $banyakSubs; ?>
                        </span>
                    </div>

                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/logoToko.jpeg)"></div>

                        <span class=""><a href="login.php"><i class="fa-solid fa-power-off"></i></a></span>
                        <span><a href="logout.php">Logout</a></span>
                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Produk</small>
            </div>

            <div class="page-content">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>
                                <?php echo $banyakUser; ?>
                            </h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>User activity (Max : 20)</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: <?php echo ($banyakUser / 20) * 100; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>
                                <?php echo $count; ?>
                            </h2>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>Page views (Target : 500)</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: <?php echo ($count / 500) * 100; ?>%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>
                                <?php echo $banyakProduk; ?>
                            </h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>All Product (Target : 1000)</small>
                            <div class="card-indicator">
                                <div class="indicator three"
                                    style="width: <?php echo ($banyakProduk / 1000) * 100; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>
                                <?php echo $banyakSubs; ?>
                            </h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>New E-mails received (Max : 50)</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: <?php echo ($banyakSubs / 50) * 100; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <span>Entries</span>
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                            <button style="color:white;" id="toggleButton"><a href="adminUser.php"
                                    style="color:white">Kembali</a></button>
                        </div>

                        <div id="#search" class="browse">
                            <form action="adminProduk.php" method="get">
                                <input id="#search" type="search" placeholder="Search Product" class="record-search"
                                    name="keyword" required>
                            </form>
                            <select name="" id="">
                                <option value="">Status</option>
                            </select>
                        </div>
                    </div>

                    <section class="contact" id="contact">
                        <h1 class="heading" style="text-align:center;margin-top:10px;"><span>Update</span> Produk</h1>
                        <form action="" method="post" enctype="multipart/form-data"
                            onsubmit="return validateTextarea()">

                            <div class="inputBox">
                                <input type="text" placeholder="Nama produk" name="nama" required
                                    value="<?php echo $dataProduk['nama']; ?> " required>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="<?php echo $dataProduk['kategori_id']; ?>">
                                        Pilih satu
                                    </option>
                                    <?php
                                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                                        ?>
                                        <option value="<?php echo $dataKategori['id']; ?>">
                                            <?php echo $dataKategori['nama']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="inputBox">
                                <input type="number" name="harga" id="stok" required
                                    value="<?php echo $dataProduk['harga']; ?>" placeholder="Harga produk" />
                                <input placeholder="Masukan gambar" type="file" name="foto" id="foto"
                                    value="<?php echo $dataProduk['foto']; ?>">
                            </div>
                            <div class="inputBox">
                                <select name="ketersediaanStok" id="ketersediaanStok" class="form-control">
                                    <option value="<?php echo $dataProduk['ketersediaan_stok']; ?>">
                                        <?php echo $dataProduk['ketersediaan_stok'] ?>
                                    </option>
                                    <?php
                                    if ($data['ketersediaan_stok'] == 'tersedia') {
                                        ?>
                                        <option value="habis">habis</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="tersedia">
                                            tersedia
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    <option value="habis">habis</option>
                                </select>
                                <input placeholder="Modified dated" type="date" name="tanggal" id="tanggal"
                                    value="<?php echo $dataProduk['tanggal']; ?>" required />
                                <input placeholder="Masukan stok" type="number" name="stok" id="stok"
                                    value="<?php echo $dataProduk['stok']; ?>" required />
                            </div>
                            <textarea name="detail" id="" cols="30" rows="10" placeholder="Deskripsi produk"
                                value=""><?php echo $dataProduk['detail']; ?></textarea>

                            <button type="submit" class="btn" name="simpan" onclick="refreshDanPindah()">Update</button>
                            <div class="loading-overlay" id="loadingOverlay">
                                <div class="loading-spinner"></div>
                            </div>
                            <!-- <button type="submit" class="btn" name="hapus" onclick="refreshDanPindah()">Delete</button> -->
                            <div class="loading-overlay" id="loadingOverlay">
                                <div class="loading-spinner"></div>
                            </div>
                        </form>
                    </section>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $namaProduk = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan = htmlspecialchars($_POST['ketersediaanStok']);
                        $tanggal = htmlspecialchars($_POST['tanggal']);
                        $stok = htmlspecialchars($_POST['stok']);
                        // header("location : adminProduk.php");
                    
                        $target_dir = "imginput/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $image_size = $_FILES["foto"]["size"];
                        $random_name = generateRandomString(20);
                        $new_name = $random_name . "." . $imageFileType;

                        if ($namaProduk == '' || $kategori == '' || $harga == '') {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                nama, kategori, dan harga wajib diisi.
                            </div>
                            <?php
                        } else {
                            $queryUpdate = mysqli_query($con, "UPDATE produk SET nama = '$namaProduk', harga = '$harga', detail = '$detail', ketersediaan_stok = '$ketersediaan', tanggal = '$tanggal', stok = '$stok' WHERE id= '$id' ");
                            if ($nama_file != '') {
                                if ($image_size > 3000000) {
                                    ?>
                                    <div class="alert alert-warning mt-3">
                                        File tidak boleh lebih dari 3 mb
                                    </div>
                                    <?php
                                } else {
                                    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                        ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            File wajib bertipe jpg, png atau gif.
                                        </div>
                                        <?php
                                    } else {
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                        $queryUpdate = mysqli_query($con, "UPDATE produk SET foto = '$new_name' WHERE id = '$id'");
                                        if ($queryUpdate) {
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
                                                showAlert('Produk Berhasil diupdate', 'success');
                                                window.location.href = "adminProduk.php";
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
                                                showAlert('Produk gagal di update', 'success');
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>



            </div>

    </div>
    </main>
    </div>
    <script>
        // button untuk menggantikan isi sebelumnya
        document.getElementById('toggleButton').addEventListener('click', function () {
            var tableContainer = document.getElementById('tableContainer');
            var formContainer = document.getElementById('formContainer');
            var toggleButton = document.getElementById('toggleButton');

            if (tableContainer.style.display === 'none') {
                tableContainer.style.display = 'block';
                formContainer.style.display = 'none';
            } else {
                tableContainer.style.display = 'none';
                formContainer.style.display = 'block';
            }

            if (toggleButton.textContent === 'Add User') {
                toggleButton.textContent = 'Kembali';
                tableContainer.style.display = 'none';
                formContainer.style.display = 'block';
            } else {
                toggleButton.textContent = 'Add User';
                tableContainer.style.display = 'block';
                formContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>