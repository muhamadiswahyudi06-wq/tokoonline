<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Toko CoklatKu</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fffaf6;
    }
    .hero {
      background: url('https://images.unsplash.com/photo-1606312619070-3c61e46c8644?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: white;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.6);
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    .hero p {
      font-size: 1.2rem;
      margin-top: 10px;
    }
    .feature-icon {
      font-size: 45px;
      color: #8B4513;
    }
    footer {
      background-color: #2b2b2b;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.3rem;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">🍫 TokoCoklatKu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Selamat Datang di Toko CoklatKu</h1>
    <p>Rasakan manisnya kebahagiaan dari setiap gigitan coklat kami!</p>
    <a href="produk.php" class="btn btn-light btn-lg mt-3 shadow-sm">Belanja Sekarang</a>
  </section>

  <!-- Keunggulan -->
  <section class="container text-center py-5">
    <h2 class="mb-5">Kenapa Pilih Kami?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 border rounded shadow-sm">
          <div class="feature-icon mb-3">🍫</div>
          <h5>Coklat Premium</h5>
          <p>Dibuat dari biji kakao terbaik dengan cita rasa yang kaya dan lembut.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded shadow-sm">
          <div class="feature-icon mb-3">🚚</div>
          <h5>Pengiriman Cepat</h5>
          <p>Pesanan dikirim dengan cepat dan aman langsung ke alamatmu.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded shadow-sm">
          <div class="feature-icon mb-3">💝</div>
          <h5>Kemasan Eksklusif</h5>
          <p>Desain elegan, cocok sebagai hadiah untuk orang tersayang.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Produk Favorit -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-4">Produk Favorit Kami</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="https://images.unsplash.com/photo-1606312619070-3c61e46c8644?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Coklat Susu">
            <div class="card-body text-center">
              <h5 class="card-title">Coklat Susu</h5>
              <p class="card-text">Rasa lembut dan manis yang disukai semua orang.</p>
              <a href="#" class="btn btn-dark">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="https://images.unsplash.com/photo-1606312618911-d4b3ef19da47?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Dark Chocolate">
            <div class="card-body text-center">
              <h5 class="card-title">Dark Chocolate</h5>
              <p class="card-text">Cita rasa pahit manis khas untuk penikmat sejati.</p>
              <a href="#" class="btn btn-dark">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="https://images.unsplash.com/photo-1616627987935-03c59c4e8da5?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Coklat Kacang">
            <div class="card-body text-center">
              <h5 class="card-title">Coklat Kacang</h5>
              <p class="card-text">Perpaduan renyah kacang dan lembutnya coklat.</p>
              <a href="#" class="btn btn-dark">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 TokoCoklatKu | Semua Hak Dilindungi</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
