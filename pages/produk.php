<!-- Produk Section Start -->
<div class="container py-5" id="produk">
  <h2 class="text-center mb-5">Produk Coklat Kami</h2>
  <div class="row g-4">
    <?php
    // Pastikan path ini benar
    include("../config/koneksi.php");

    // Validasi koneksi
    if (!isset($conn) || !$conn) {
      echo "<p class='text-danger'>Koneksi ke database gagal.</p>";
      exit;
    }

    // Ambil data produk
    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <img src="../assets/img/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama']; ?></h5>
            <p class="card-text"><?= $row['deskripsi']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fw-bold text-success">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></span>
              <a href="beli.php?id=<?= $row['id']; ?>" class="btn btn-warning rounded-pill">Beli</a>
            </div>
          </div>
          </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- Produk Section End -->

