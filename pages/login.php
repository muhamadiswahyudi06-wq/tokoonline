<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register - Coklat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      background: linear-gradient(120deg, #8B4513, #3E2723); /* Gradasi coklat tua */
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      font-family: 'Poppins', sans-serif;
    }

    .container-box {
      width: 800px;
      height: 500px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
      display: flex;
      overflow: hidden;
      position: relative;
      transition: transform 0.6s ease-in-out;
    }

    .form-box {
      width: 50%;
      padding: 40px;
      transition: all 0.6s ease-in-out;
    }

    .login-box {
      background: #fff;
    }

    .register-box {
      background: #fdf6f0; /* Warna lembut seperti krim coklat */
      transform: translateX(100%);
      position: absolute;
      right: 0;
      top: 0;
      height: 100%;
      width: 50%;
    }

    .container-box.active .register-box {
      transform: translateX(0);
    }

    .container-box.active .login-box {
      transform: translateX(-100%);
    }

    .btn-switch {
      background-color: #6B3E1D; /* Coklat tua */
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      transition: all 0.3s ease;
    }

    .btn-switch:hover {
      background-color: #8B4513; /* Lebih terang */
    }

    h2 {
      margin-bottom: 30px;
      color: #3E2723;
      font-weight: 700;
    }

    .form-control {
      margin-bottom: 15px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }

    .btn-primary {
      background-color: #6B3E1D;
      border: none;
    }

    .btn-primary:hover {
      background-color: #8B4513;
    }

    .btn-success {
      background-color: #A0522D;
      border: none;
    }

    .btn-success:hover {
      background-color: #8B4513;
    }

    p {
      color: #5D4037;
    }
  </style>
</head>
<body>
  <div class="container-box" id="containerBox">

    <!-- LOGIN FORM -->
    <div class="form-box login-box">
      <h2>Login</h2>
      <form action="auth/auth.php" method="POST">
        <input type="hidden" name="action" value="login">

        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>

        <button type="submit" class="btn btn-primary w-100 mt-2">Masuk</button>
      </form>
      <div class="text-center mt-4">
        <p>Belum punya akun?</p>
        <button class="btn-switch" id="toRegister">Daftar Sekarang</button>
      </div>
    </div>

    <!-- REGISTER FORM -->
    <div class="form-box register-box">
      <h2>Register</h2>
      <form action="auth/auth.php" method="POST">
        <input type="hidden" name="action" value="register">

        <input type="text" class="form-control" name="nama" placeholder="haikal ganteng" required>
        <input type="email" class="form-control" name="email" placeholder="haikalganteng@gmail.com" required>
        <input type="text" class="form-control" name="username" placeholder="haikal" required>
        <input type="password" class="form-control" name="password" placeholder="haikal123" required>

        <button type="submit" class="btn btn-success w-100 mt-2">Daftar</button>
      </form>
      <div class="text-center mt-4">
        <p>Sudah punya akun?</p>
        <button class="btn-switch" id="toLogin">Masuk Sekarang</button>
      </div>
    </div>
  </div>

  <script>
    const container = document.getElementById('containerBox');
    const toRegister = document.getElementById('toRegister');
    const toLogin = document.getElementById('toLogin');

    toRegister.addEventListener('click', () => {
      container.classList.add('active');
    });

    toLogin.addEventListener('click', () => {
      container.classList.remove('active');
    });
  </script>
</body>
</html>
