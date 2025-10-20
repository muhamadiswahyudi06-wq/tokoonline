<?php
session_start();
include("../config/connection.php"); // koneksi database

if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang masih kosong!'); window.location='keranjang.php';</script>";
    exit;
}

// Jika form checkout dikirim
if (isset($_POST['checkout'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $tanggal = date("Y-m-d");

    // Simpan ke tabel pesanan
    $query_pesanan = "INSERT INTO pesanan (nama_pelanggan, alamat, telepon, tanggal_pesanan, total_harga) VALUES ('$nama', '$alamat', '$telepon', '$tanggal', 0)";
    mysqli_query($koneksi, $query_pesanan);
    $id_pesanan = mysqli_insert_id($koneksi);

    $total_harga = 0;

    // Simpan detail setiap produk ke tabel detail_pesanan
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
        $produk = mysqli_fetch_assoc($result);

        $harga = $produk['harga'];
        $subtotal = $harga * $jumlah;
        $total_harga += $subtotal;

        mysqli_query($koneksi, "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, harga_satuan, subtotal) VALUES ('$id_pesanan', '$id_produk', '$jumlah', '$harga', '$subtotal')");
    }

    // Update total harga di tabel pesanan
    mysqli_query($koneksi, "UPDATE pesanan SET total_harga='$total_harga' WHERE id_pesanan='$id_pesanan'");

    // Kosongkan keranjang
    unset($_SESSION['keranjang']);

    echo "<script>alert('Pesanan berhasil dibuat!'); window.location='detail_pesanan.php?id=$id_pesanan';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout | BataviaChoco</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #3e2723;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 80px;
            background: #5d4037;
            padding: 30px;
            border-radius: 10px;
        }
        h2 {
            color: #ffcc80;
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-checkout {
            background-color: #c69c6d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-checkout:hover {
            background-color: #ffcc80;
            color: #3e2723;
        }
        table {
            width: 100%;
            background: #6d4c41;
            border-collapse: collapse;
            color: #fff;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #8d6e63;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Checkout Pesanan</h2>
    <hr>

    <h5>Data Pemesan</h5>
    <form method="post">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Alamat Lengkap</label>
        <textarea name="alamat" required></textarea>

        <label>Nomor Telepon</label>
        <input type="text" name="telepon" required>

        <hr>
        <h5>Ringkasan Pesanan</h5>
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
                    <th colspan="4">Total</th>
                    <th>Rp <?= number_format($total); ?></th>
                </tr>
            </tfoot>
        </table>

        <div class="text-center mt-4">
            <button type="submit" name="checkout" class="btn-checkout">Proses Pesanan</button>
        </div>
    </form>
</div>

</body>
</html>
