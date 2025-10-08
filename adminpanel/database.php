<?php
$host = 'localhost';
$db = 'coklat_db';
$user = 'root';  // Ganti jika perlu
$pass = '';      // Ganti jika perlu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

session_start();  // Mulai session untuk login/cart
?>