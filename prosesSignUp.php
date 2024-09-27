<?php
require "koneksi.php";
// prosesSignup.php

// Pastikan ini adalah metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir signup
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["name"];

    // Validasi data (contoh sederhana)
    if (empty($username) || empty($password)) {
        echo "Semua field harus diisi.";
    } else {
        // Lakukan tindakan penyimpanan data ke database (perhatikan: pastikan untuk menggunakan pengamanan yang sesuai)
        
        // Lakukan penyisipan data ke tabel pengguna (gantilah dengan struktur tabel yang sesuai)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, nama, pass) VALUES ('$username','$nama', '$hashedPassword')";

        if ($con->query($sql) === TRUE) {
            // Pendaftaran berhasil, arahkan ke halaman login.php
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Tutup koneksi database
        $conn->close();
    }
} else {
    // Jika bukan metode POST, tampilkan pesan kesalahan
    echo "Metode tidak diizinkan.";
}
?>
