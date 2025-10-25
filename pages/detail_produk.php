<?php
include("../config/koneksi.php"); // Pastikan path ini sesuai struktur folder kamu

// Validasi koneksi
if (!isset($conn) || !$conn) {
  echo "<div class='container py-5'><p class='text-danger'>Koneksi ke database gagal.</p></div>";
  exit;
}

// Ambil ID produk dari URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data produk dari database
$query = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
$product = mysqli_fetch_assoc($query);

// Jika produk tidak ditemukan
if (!$product) {
  echo "<div class='container py-5'><h3 class='text-danger'>Produk tidak ditemukan.</h3></div>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $product['name']; ?> | BataviaChoco</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f0;
    }
    .product-title {
      color: #6f4e37;
    }
    .btn-warning {
      background-color: #d2691e;
      border: none;
    }
    .btn-warning:hover {
      background-color: #a0522d;
    }
  </style>
</head>
<body>

<!-- Detail Produk Start -->
<div class="container py-5">
  <div class="row g-5">
    <!-- Gambar Produk -->
    <div class="col-md-6 text-center">
      <img src="../assets/img/<?= htmlspecialchars($product['image_url']); ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($product['name']); ?>">
    </div>
    <!-- Info Produk -->
    <div class="col-md-6">
      <h2 class="fw-bold product-title"><?= htmlspecialchars($product['name']); ?></h2>
      <p class="text-muted">Kategori: <?= htmlspecialchars($product['category_id']); ?></p>
      <p><?= nl2br(htmlspecialchars($product['description'])); ?></p>
      <h4 class="text-success mb-3">Rp <?= number_format($product['price'], 0, ',', '.'); ?></h4>
      <p>Stok tersedia: <strong><?= $product['stock']; ?></strong></p>
      <a href="beli.php?id=<?= $product['product_id']; ?>" class="btn btn-warning btn-lg rounded-pill px-4">Beli Sekarang</a>
    </div>
  </div>
</div>
<!-- Detail Produk End -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
