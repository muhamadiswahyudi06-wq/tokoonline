<?php
// Hubungkan ke database
require_once __DIR__ . '/../config/koneksi.php';

// Pastikan session aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// =============================
// FUNGSI REGISTER PELANGGAN
// =============================
function registerPelanggan($nama, $email, $password, $alamat, $no_hp) {
    global $koneksi;

    // Cek apakah email sudah terdaftar
    $cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        return "Email sudah digunakan!";
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO pelanggan (nama, email, password, alamat, no_hp, tanggal_daftar)
              VALUES ('$nama', '$email', '$passwordHash', '$alamat', '$no_hp', NOW())";
    
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return "Gagal mendaftar: " . mysqli_error($koneksi);
    }
}

// =============================
// FUNGSI LOGIN PELANGGAN
// =============================
function loginPelanggan($email, $password) {
    global $koneksi;

    $query = "SELECT * FROM pelanggan WHERE email='$email'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Cek apakah data ditemukan dan password cocok
    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['pelanggan'] = $data;
        return true;
    }

    return false;
}

// =============================
// FUNGSI LOGOUT
// =============================
function logoutPelanggan() {
    session_unset();
    session_destroy();
}

// =============================
// FUNGSI AMBIL DATA PELANGGAN
// =============================
function getPelangganById($id) {
    global $koneksi;
    $query = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
?>
