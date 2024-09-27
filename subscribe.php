<?php
require "koneksi.php";
// prosesSignup.php

// Pastikan ini adalah metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir signup
    $email = $_POST["yourEmail"];
        $sql = "INSERT INTO subscribtion (email) VALUES ('$email')";
        if ($con->query($sql) === TRUE) {
            // Pendaftaran berhasil, arahkan ke halaman login.php
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->close();
    }
 else {
    echo "Metode tidak diizinkan.";
}
?>