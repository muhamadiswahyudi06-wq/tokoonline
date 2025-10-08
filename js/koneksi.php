<?php
$host = "localhost";
$user = "root";
$pass = "";            // default XAMPP/Laragon kosong
$db   = "tokoonline";  // sesuai nama database di phpMyAdmin

$CON = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$CON) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// kalau berhasil, tes dengan pesan
echo "Database connected successfully!";
?>
