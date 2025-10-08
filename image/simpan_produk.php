<?php
include '../koneksi.php'; // sesuaikan path koneksi.php

$kategori_id = $_POST['kategori_id'];
$nama        = $_POST['nama'];
$harga       = $_POST['harga'];
$detail      = $_POST['detail'];
$stok        = $_POST['ketersediaan_stok'];

// upload foto
$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];

// folder tujuan simpan gambar
$target = "../assets/img/" . basename($foto);

// simpan file ke folder
if(move_uploaded_file($tmp, $target)){
    // simpan data ke database
    $query = "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) 
              VALUES ('$kategori_id', '$nama', '$harga', '$foto', '$detail', '$stok')";
    
    if(mysqli_query($koneksi, $query)){
        echo "Produk berhasil disimpan! <a href='tambah_produk.php'>Tambah lagi</a>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Upload foto gagal!";
}
?>
