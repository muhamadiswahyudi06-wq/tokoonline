<!-- Banner Coklat Premium Start -->
<style>
  /* ======= Banner Style ======= */
  .banner {
    position: relative;
    background-image: url('assets/img/tampil cokelat.jpg'); /* GANTI gambar di sini */
    background-size: cover;      /* supaya gambar memenuhi area */
    background-position: center; /* posisikan gambar di tengah */
    background-repeat: no-repeat;
    color: #fff;
    padding: 100px 0;            /* jarak atas-bawah konten */
  }

  /* Lapisan gelap agar teks terlihat jelas */
  .banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(207, 117, 7, 0.45); /* ubah kegelapan sesuai selera */
  }

  .banner .container {
    position: relative; /* supaya teks muncul di atas overlay */
    z-index: 2;
  }

  /* Harga bulat */
  .price-tag {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 120px;
    height: 120px;
    background: #fff;
    color: #e7e712ff;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    font-weight: bold;
  }

  /* Responsif mobile */
  @media (max-width: 768px) {
    .banner {
      text-align: center;
      padding: 60px 0;
    }
    .price-tag {
      width: 90px;
      height: 90px;
      top: 15px;
      left: 15px;
    }
  }
</style>

<div class="container-fluid banner text-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold">Coklat Premium Batavia</h1>
        <p class="lead mb-4">
          Nikmati sensasi manis dan lembut dari coklat terbaik kami, dibuat dari biji kakao pilihan dan diracik dengan cinta.
        </p>
        <a href="#produk" class="btn btn-warning btn-lg rounded-pill px-5 py-3">
          Belanja Sekarang
        </a>
      </div>
      <div class="col-lg-6 position-relative">
        <div class="price-tag">
          <span>Harga</span>
          <span class="h5">Rp 49.000</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Coklat Premium End -->
