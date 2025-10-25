<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kontak BataviaChoco</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f0;
    }
    .contact-section {
      padding: 60px 0;
    }
    .form-control, .btn {
      border-radius: 8px;
    }
    h2 {
      color: #6f4e37;
    }
  </style>
</head>
<body>

  <section class="contact-section container">
    <h2 class="text-center mb-5">Hubungi BataviaChoco 🍫</h2>
    <div class="row">
      <!-- Form Kontak -->
      <div class="col-md-6">
        <form action="proses_kontak.php" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Anda</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Anda</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
      </div>
      <!-- Info Toko -->
      <div class="col-md-6">
        <div class="bg-light p-4 rounded shadow-sm">
          <h5>📍 Alamat Toko</h5>
          <p>Jl. Coklat Manis No. 88, Jakarta</p>
          <h5>📞 Telepon</h5>
          <p>+62 812-3456-7890</p>
          <h5>📧 Email</h5>
          <p>info@bataviachoco.com</p>
          <h5>🕒 Jam Operasional</h5>
          <p>Senin - Sabtu: 09.00 - 17.00 WIB</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
