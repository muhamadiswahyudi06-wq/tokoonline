<?php
include("../config/koneksi.php"); // pastikan path ini benar

// Validasi koneksi
if (!isset($conn) || !$conn) {
  echo "<p class='text-danger'>Koneksi ke database gagal.</p>";
  exit;
}

// Ambil ID dari URL
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

<!-- Detail Produk Start -->
<div class="container py-5">
  <div class="row g-5">
    <!-- Gambar Produk -->
    <div class="col-md-6 text-center">
      <img src="../assets/img/<?= $product['image_url']; ?>" class="img-fluid rounded shadow" alt="<?= $product['name']; ?>">
    </div>
     <!-- Info Produk -->
    <div class="col-md-6">
      <h2 class="fw-bold"><?= $product['name']; ?></h2>
      <p class="text-muted">Kategori ID: <?= $product['category_id']; ?></p>
      <p><?= $product['description']; ?></p>
      <h4 class="text-success mb-3">Rp <?= number_format($product['price'], 0, ',', '.'); ?></h4>
      <p>Stok tersedia: <strong><?= $product['stock']; ?></strong></p>
      <a href="beli.php?id=<?= $product['product_id']; ?>" class="btn btn-warning btn-lg rounded-pill px-4">Beli Sekarang</a>
    </div>
  </div>
</div>
<!-- Detail Produk End -->

