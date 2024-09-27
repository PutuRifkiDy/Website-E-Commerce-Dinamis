<?php
require "koneksi.php";
session_start();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css" />
    <title>Login - Page</title>
    <link rel="icon" href="img/logo_toko_kita-fotor-2024011719649-removebg(2).png">
</head>

<body>
    <div id="container" class="container">
        <div id="left" class="left">
            <div class="contain-left">
                <h1>Login</h1>
                <p>Masukkan username dan password</p>
                <!-- <ul>
                    <li>Mainly talk programming, ui/ux, and networking</li>
                    <li>Analyzing with AI, with comprehensive algorithm</li>
                    <li>And many more !!!</li>
                </ul> -->
            </div>

            <form method="post" id="form" action="">
                <div class="form-item">
                    <label for="email">
                        <p>Username</p>
                        <p id="invalid-email" class="invalid-email">Valid email required</p>
                    </label>
                    <input type="text" name="username" id="email" required>
                    <label for="password">
                        <p>Password</p>
                    </label>
                    <input type="password" name="password" id="email" required>
                </div>
                <div class="form-item">
                    <button id="submit-btn" type="submit" name="submit">Login</button>
                </div>
                <div class="signup">Don't have an account? <a href="signup.php">Create one</a></div>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = "SELECT * FROM users WHERE username='$username'";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verifikasi kata sandi dengan password_verify
                if (password_verify($password, $user['pass'])) {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['login'] = true;
                    $_SESSION['nama'] = $user['nama'];

    //                 $user_id = $user['id'];
    // $query_info = "SELECT nama FROM users WHERE id ='$user_id'";
    // $result_info = $con->query($query_info);

    // if ($result_info->num_rows > 0) {
    //     $user_info = $result_info->fetch_assoc();
    //     $_SESSION['nama'] = $user_info['nama'];
    //     // $_SESSION['photo'] = $user_info['photo'];
    // }

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
                        header("Location: dashboard.php");
                        exit;
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
                        exit;
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
                        showAlert('Password Salah', 'error');
                    </script>

                    <?php
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
                    showAlert('Pengguna tidak ditemukan', 'error');
                </script>

                <?php
            }
        }
        ?>

        <div id="right" class="right">
            <img src="img/4957136_Mobile login.svg" alt="..." style="max-width: 768px;">
        </div>

    </div>
    <!-- <script src="main.js"></script> -->
</body>

</html>