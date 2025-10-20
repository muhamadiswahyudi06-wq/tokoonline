<?php
session_start();
include("./config/koneksi.php"); // koneksi database

// ------------------------------
// Fungsi membuat pesanan
// ------------------------------
function buatPesanan($koneksi, $id_pelanggan, $keranjang) {
    // Hitung total harga
    $total = 0;
    foreach ($keranjang as $id_produk => $jumlah) {
        $result = mysqli_query($koneksi, "SELECT harga FROM produk WHERE id_produk='$id_produk'");
        $produk = mysqli_fetch_assoc($result);
        $subtotal = $produk['harga'] * $jumlah;
        $total += $subtotal;
    }

    // Simpan ke tabel pesanan
    $query_pesanan = "INSERT INTO pesanan (id_pelanggan, tanggal_pesanan, total, status)
                      VALUES ('$id_pelanggan', NOW(), '$total', 'Menunggu Pembayaran')";
    mysqli_query($koneksi, $query_pesanan);
    $id_pesanan = mysqli_insert_id($koneksi);

    // Simpan detail pesanan
    foreach ($keranjang as $id_produk => $jumlah) {
        $result = mysqli_query($koneksi, "SELECT harga FROM produk WHERE id_produk='$id_produk'");
        $produk = mysqli_fetch_assoc($result);
        $harga = $produk['harga'];
        $subtotal = $harga * $jumlah;

        mysqli_query($koneksi, "INSERT INTO pesanan_detail (id_pesanan, id_produk, jumlah, harga, subtotal)
                                VALUES ('$id_pesanan', '$id_produk', '$jumlah', '$harga', '$subtotal')");
    }

    // Hapus keranjang pelanggan setelah checkout
    mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_pelanggan = '$id_pelanggan'");

    return $id_pesanan;
}

// ------------------------------
// Proses utama halaman checkout
// ------------------------------

// Pastikan pelanggan login
if (!isset($_SESSION['pelanggan'])) {
    header("Location: login.php");
    exit;
}

$pelanggan = $_SESSION['pelanggan'];

// Pastikan keranjang tidak kosong
if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong!'); window.location='keranjang.php';</script>";
    exit;
}

// Jika tombol checkout ditekan
if (isset($_POST['checkout'])) {
    $id_pelanggan = $pelanggan['id_pelanggan'];
    $id_pesanan = buatPesanan($koneksi, $id_pelanggan, $_SESSION['keranjang']);

    unset($_SESSION['keranjang']);
    echo "<script>alert('Pesanan berhasil dibuat! ID Pesanan: $id_pesanan'); window.location='home.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout | BataviaChoco</title>
    <style>
        body {
            background-color: #3e2723;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .checkout-container {
            width: 80%;
            margin: 50px auto;
            background: #5c3a21;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        h2 {
            text-align: center;
            color: #ffcc80;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #6d4c41;
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #8d6e63;
            text-align: center;
        }
        .btn {
            background: #c69c6d;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn:hover {
            background: #ffcc80;
            color: #3e2723;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout Pesanan</h2>

        <p>Halo, <strong><?= htmlspecialchars($pelanggan['nama']); ?></strong>! Silakan periksa pesanan Anda sebelum melanjutkan pembayaran.</p>

        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):
                        $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $produk = mysqli_fetch_assoc($result);
                        $subtotal = $produk['harga'] * $jumlah;
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($produk['nama_produk']); ?></td>
                        <td>Rp <?= number_format($produk['harga']); ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>Rp <?= number_format($subtotal); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align:right;">Total:</th>
                        <th>Rp <?= number_format($total); ?></th>
                    </tr>
                </tfoot>
            </table>

            <center>
                <button type="submit" name="checkout" class="btn">Konfirmasi Pesanan</button>
            </center>
        </form>
    </div>
</body>
</html>
