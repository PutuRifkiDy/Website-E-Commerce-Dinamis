<!-- <?php
session_start();
require "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = $con->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verifikasi kata sandi dengan password_verify
    if (password_verify($password, $user['pass'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 1) {
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
            showAlert('Berhasil login', 'success');
        </script>
            <?php
            header("Location: adminKategori.php");
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
            showAlert('Berhasil login', 'success');
        </script>
            <?php
            header("Location: index.php");
        }
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
        showAlert('Password tidak valid', 'success');
    </script>
        <?php
    }
}

// if ($result->num_rows > 0) {
//     $user = $result->fetch_assoc();
    
//     // Verifikasi kata sandi dengan password_verify
//     if (password_verify($password, $user['password'])) {
//         $_SESSION['username'] = $user['username'];
//         $_SESSION['role'] = $user['role'];

//         if ($user['role'] == 1) {
//             header("Location: admin.php");
//         } else {
//             header("Location: home.php");
//         }
//     } else {
//         echo "Login gagal. Password tidak valid.";
//     }
// } else {
//     echo "Login gagal. Pengguna tidak ditemukan.";
// }

// $con->close();
?> -->
