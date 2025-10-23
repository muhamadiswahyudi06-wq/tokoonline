<div class="container py-5">
  <div class="card shadow-lg border-0 bg-light rounded">
    <div class="card-body">
      <h2 class="mb-4 text-center fw-bold text-brown">🛒 Keranjang Belanja</h2>

      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-dark text-center">
            <tr>
              <th>Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="../assets/img/world chocho.webp" alt="Coklat Premium" width="60" class="me-3 rounded shadow-sm">
                  <div>
                    <h6 class="mb-0">Coklat Premium</h6>
                    <small class="text-muted">Kategori: Dairy milk</small>
                  </div>
                </div>
              </td>
              <td class="text-center">Rp 25.000</td>
              <td class="text-center">
                <input type="number" class="form-control form-control-sm w-50 mx-auto" value="2" min="1">
              </td>
              <td class="text-center">Rp 50.000</td>
              <td class="text-center">
                <button class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </td>
            </tr>
            <!-- Tambahkan item lain di sini -->
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4 px-2">
        <h4 class="mb-0">Total: <span class="text-success">Rp 150.000</span></h4>
        <a href="checkout.php" class="btn btn-primary btn-lg rounded-pill px-4">
          Lanjut ke Checkout
        </a>
      </div>
    </div>
  </div>
</div>
