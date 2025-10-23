<?php
include("../config/koneksi.php");
session_start();

function login($username, $password)
{
    global $koneksi;

    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama_lengkap'];
            return true;
        }
    }
    return false;
}

function register($nama, $email, $username, $password)
{
    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $nama);
    $email = mysqli_real_escape_string($koneksi, $email);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // cek username sudah ada atau belum
    $cek = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        return "Username sudah digunakan!";
    }

    $query = "INSERT INTO users (nama_lengkap, email, username, password)
              VALUES ('$nama', '$email', '$username', '$password')";
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return "Gagal mendaftar: " . mysqli_error($koneksi);
    }
}

/* ==============================
   LOGIKA LOGIN / REGISTER
============================== */
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // LOGIN
    if ($action == "login") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (login($username, $password)) {
            echo "<script>
                alert('Login berhasil!');
                window.location.href = '../dashboard.php';
            </script>";
        } else {
            echo "<script>
                alert('Username atau password salah!');
                window.history.back();
            </script>";
        }
    }

    // REGISTER
    elseif ($action == "register") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = register($nama, $email, $username, $password);

        if ($result === true) {
            echo "<script>
                alert('Registrasi berhasil, silakan login!');
                window.location.href = '../index.html';
            </script>";
        } else {
            echo "<script>
                alert('$result');
                window.history.back();
            </script>";
        }
    }
}
?>
