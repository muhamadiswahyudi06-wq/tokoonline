<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icon Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f7f3ef;
      font-family: "Poppins", sans-serif;
    }

    .text-brown { color: #5b3a29; }

    .card { border-radius: 15px; }

    .table th {
      background-color: #5b3a29 !important;
      color: #fff;
      vertical-align: middle;
    }

    .table td { vertical-align: middle; }

    .btn-outline-danger:hover {
      background-color: #dc3545;
      color: white;
    }

    .btn-primary {
      background-color: #8b4513;
      border: none;
    }

    .btn-primary:hover { background-color: #5b3a29; }

    img { border-radius: 10px; }

    .total-area {
      background-color: #fff;
      padding: 20px 25px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .btn-add {
      background-color: #6c3f19;
      color: white;
    }

    .btn-add:hover {
      background-color: #5b3a29;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="card shadow-lg border-0 bg-light">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="fw-bold text-brown mb-0">🛒 Keranjang Belanja</h2>
          <div>
            <button class="btn btn-success rounded-pill px-3 me-2" onclick="simpanKeranjang()">
              <i class="bi bi-save"></i> Simpan Keranjang
            </button>
            <button class="btn btn-add rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
              <i class="bi bi-plus-circle"></i> Tambah Produk
            </button>
          </div>
        </div>

        <!-- Tabel Produk -->
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="text-center">
              <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="cart-body"></tbody>
          </table>
        </div>

        <!-- Total -->
        <div class="d-flex justify-content-between align-items-center mt-4 px-2 total-area">
          <h4 class="mb-0 fw-bold">Total:
            <span class="text-success" id="total-harga">Rp 0</span>
          </h4>
          <a href="checkout.php" class="btn btn-primary btn-lg rounded-pill px-4">
            Lanjut ke Checkout <i class="bi bi-arrow-right-circle ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Produk -->
  <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahProdukLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-brown text-white" style="background-color:#5b3a29;">
          <h5 class="modal-title" id="modalTambahProdukLabel">Tambah Produk ke Keranjang</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formTambahProduk">
            <div class="mb-3">
              <label for="namaProduk" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="namaProduk" required>
            </div>
            <div class="mb-3">
              <label for="kategoriProduk" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="kategoriProduk" required>
            </div>
            <div class="mb-3">
              <label for="hargaProduk" class="form-label">Harga (Rp)</label>
              <input type="number" class="form-control" id="hargaProduk" required>
            </div>
            <div class="mb-3">
              <label for="jumlahProduk" class="form-label">Jumlah</label>
              <input type="number" class="form-control" id="jumlahProduk" value="1" min="1" required>
            </div>
            <div class="mb-3">
              <label for="gambarProduk" class="form-label">URL Gambar</label>
              <input type="text" class="form-control" id="gambarProduk" placeholder="../assets/img/nama-gambar.webp">
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Keranjang -->
  <script>
    const form = document.getElementById('formTambahProduk');
    const cartBody = document.getElementById('cart-body');
    const totalHarga = document.getElementById('total-harga');

    // Muat keranjang dari localStorage saat halaman dibuka
    window.onload = function() {
      const savedCart = JSON.parse(localStorage.getItem('keranjang')) || [];
      savedCart.forEach(item => tambahBaris(item));
      updateTotal();
    };

    // Tambah produk baru
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const item = {
        nama: document.getElementById('namaProduk').value,
        kategori: document.getElementById('kategoriProduk').value,
        harga: parseInt(document.getElementById('hargaProduk').value),
        jumlah: parseInt(document.getElementById('jumlahProduk').value),
        gambar: document.getElementById('gambarProduk').value || '../assets/img/default.webp'
      };

      tambahBaris(item);
      updateTotal();
      simpanKeranjang();

      form.reset();
      const modal = bootstrap.Modal.getInstance(document.getElementById('modalTambahProduk'));
      modal.hide();
    });

    // Tambah baris ke tabel
    function tambahBaris(item) {
      const subtotal = item.harga * item.jumlah;
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>
          <div class="d-flex align-items-center">
            <img src="${item.gambar}" alt="${item.nama}" width="70" class="me-3 shadow-sm">
            <div>
              <h6 class="mb-1 fw-semibold">${item.nama}</h6>
              <small class="text-muted">Kategori: ${item.kategori}</small>
            </div>
          </div>
        </td>
        <td class="text-center">Rp ${item.harga.toLocaleString()}</td>
        <td class="text-center">
          <input type="number" class="form-control form-control-sm w-50 mx-auto" value="${item.jumlah}" min="1" onchange="ubahJumlah(this)">
        </td>
        <td class="text-center fw-semibold text-success">Rp ${subtotal.toLocaleString()}</td>
        <td class="text-center">
          <button class="btn btn-outline-danger btn-sm rounded-pill" onclick="hapusProduk(this)">
            <i class="bi bi-trash"></i> Hapus
          </button>
        </td>
      `;
      cartBody.appendChild(row);
    }

    // Hapus produk
    function hapusProduk(btn) {
      btn.closest('tr').remove();
      updateTotal();
      simpanKeranjang();
    }

    // Ubah jumlah produk
    function ubahJumlah(input) {
      const row = input.closest('tr');
      const harga = parseInt(row.children[1].textContent.replace(/[^\d]/g, ''));
      const jumlah = parseInt(input.value);
      const subtotal = harga * jumlah;
      row.children[3].textContent = 'Rp ' + subtotal.toLocaleString();
      updateTotal();
      simpanKeranjang();
    }

    // Update total harga
    function updateTotal() {
      let total = 0;
      const rows = cartBody.querySelectorAll('tr');
      rows.forEach(row => {
        const subtotalText = row.children[3].textContent.replace(/[^\d]/g, '');
        total += parseInt(subtotalText);
      });
      totalHarga.textContent = 'Rp ' + total.toLocaleString();
    }

    // Simpan keranjang ke localStorage
    function simpanKeranjang() {
      const items = [];
      const rows = cartBody.querySelectorAll('tr');
      rows.forEach(row => {
        const nama = row.querySelector('h6').textContent;
        const kategori = row.querySelector('small').textContent.replace('Kategori: ', '');
        const harga = parseInt(row.children[1].textContent.replace(/[^\d]/g, ''));
        const jumlah = parseInt(row.querySelector('input').value);
        const gambar = row.querySelector('img').src;

        items.push({ nama, kategori, harga, jumlah, gambar });
      });
      localStorage.setItem('keranjang', JSON.stringify(items));
    }
  </script>

</body>
</html>
