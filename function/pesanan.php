<?php
// Panggil koneksi database
include(__DIR__ . '/../config/koneksi.php');

// =============================
// FUNGSI BUAT PESANAN
// =============================
function buatPesanan($id_pelanggan, $keranjang) {
    global $koneksi;

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

    return $id_pesanan;
}
?>
