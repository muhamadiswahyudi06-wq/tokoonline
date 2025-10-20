<?php

require_once __DIR__ . '/../config/koneksi.php';

function getAllProduk() {
    global $koneksi;
    $query = "SELECT * FROM produk ORDER BY id_produk DESC";
    return mysqli_query($koneksi, $query);
}

function getProdukById($id) {
    global $koneksi;
    $query = "SELECT * FROM produk WHERE id_produk = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahProduk($nama, $deskripsi, $harga, $stok, $gambar, $kategori_id) {
    global $koneksi;
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga, stok, gambar, kategori_id) 
              VALUES ('$nama', '$deskripsi', '$harga', '$stok', '$gambar', '$kategori_id')";
    return mysqli_query($koneksi, $query);
}

function hapusProduk($id) {
    global $koneksi;
    $query = "DELETE FROM produk WHERE id_produk = $id";
    return mysqli_query($koneksi, $query);
}
?>
