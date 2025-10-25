<?php
include("../config/koneksi.php"); // Pastikan path dan koneksi benar

// Ambil data pelanggan
$query = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY tanggal_daftar DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pelanggan | BataviaChoco</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f0;
    }
    h2 {
      color: #6f4e37;
    }
    .table th {
      background-color: #d2691e;
      color: white;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4 text-center">Daftar Pelanggan BataviaChoco 🍫</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Tanggal Daftar</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $row['id_pelanggan']; ?></td>
          <td><?= htmlspecialchars($row['nama']); ?></td>
          <td><?= htmlspecialchars($row['email']); ?></td>
          <td><?= htmlspecialchars($row['alamat']); ?></td>
          <td><?= htmlspecialchars($row['no_hp']); ?></td>
          <td><?= date('d-m-Y H:i', strtotime($row['tanggal_daftar'])); ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
