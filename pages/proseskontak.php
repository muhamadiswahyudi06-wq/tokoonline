<?php
include("../config/koneksi.php"); // Sesuaikan path

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

$status = '';
$alert  = '';

if ($nama === '' || $email === '' || $pesan === '') {
  $status = "Semua field wajib diisi.";
  $alert  = "danger";
} else {
  // Simpan ke database
  $stmt = mysqli_prepare($conn, "INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
  $sukses_db = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  // Kirim email ke admin
  $to      = "info@bataviachoco.com"; // Ganti dengan email admin kamu
  $subject = "Pesan Baru dari $nama";
  $message = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";
  $headers = "From: $email";

  $sukses_email = mail($to, $subject, $message, $headers);

  if ($sukses_db && $sukses_email) {
    $status = "Terima kasih, pesan Anda telah dikirim ke BataviaChoco!";
    $alert  = "success";
  } else {
    $status = "Pesan gagal dikirim. Silakan coba lagi nanti.";
    $alert  = "danger";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Proses Kontak | BataviaChoco</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f0;
    }
    .container {
      max-width: 600px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="alert alert-<?= $alert; ?> shadow-sm" role="alert">
    <?= $status; ?>
  </div>
  <a href="kontak.php" class="btn btn-outline-primary">Kembali ke Halaman Kontak</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
