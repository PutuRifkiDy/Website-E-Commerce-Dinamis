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

if (isset($_GET['keyword'])) {
    $queryMessage = mysqli_query($con, "SELECT * FROM message WHERE nama LIKE '%$_GET[keyword]%'");
    $banyakMessage = mysqli_num_rows($queryMessage);
} else {
    $queryMessage = mysqli_query($con, "SELECT * FROM message");
    $banyakMessage = mysqli_num_rows($queryMessage);
}

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
    <title>Admin - Message</title>
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
                        <a href="adminProduk.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Product</small>
                        </a>
                    </li>
                    <li>
                        <a href="adminMessage.php" class="active">
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
                <small>Home / Message</small>
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
                            <!-- <button style="color:white;" id="toggleButton">Add User</a></button> -->
                        </div>

                        <div id="#search" class="browse">
                            <form action="adminMessage.php" method="get">
                                <input id="#search" type="search" placeholder="Search User" class="record-search"
                                    name="keyword" required>
                            </form>
                            <select name="" id="">
                                <option value="">Status</option>
                            </select>
                        </div>
                    </div>



                    <div id="tableContainer">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><span class="las la-sort"></span> Nama</th>
                                    <th><span class="las la-sort"></span> Number</th>
                                    <th><span class="las la-sort"></span> Email</th>
                                    <th><span class="las la-sort"></span> Pesan</th>
                                    <th><span class="las la-sort"></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($banyakMessage == 0) {
                                    ?>
                                    <tr>
                                        <td class="text-center" style="text-align: center;">
                                            Data Message tidak tersedia
                                        </td>
                                    </tr>
                                    <?php
                                } else {
                                    $jumlah = 1;
                                    while ($data = mysqli_fetch_array($queryMessage)) {
                                        ?>
                                        <tr>
                                            <td>
                                                #
                                                <?php echo $jumlah; ?>
                                            </td>

                                            <td>
                                                <?php echo $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['number'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['email'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['pesan'] ?>
                                            </td>
                                            <td>
                                                <a href="deleteMessageAdmin.php?id=<?php echo $data['id']; ?>"
                                                    class='btn btn-danger btn-sm'
                                                    style="font-size:1.7rem;border-radius:.5rem;color:red;"><i
                                                        class="fa-solid fa-trash" style="padding:1rem;"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $jumlah++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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