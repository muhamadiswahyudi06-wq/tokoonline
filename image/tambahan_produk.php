<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form action="simpan_produk.php" method="post" enctype="multipart/form-data">
        <label>Kategori ID:</label><br>
        <input type="number" name="kategori_id" required><br><br>

        <label>Nama Produk:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Detail:</label><br>
        <textarea name="detail"></textarea><br><br>

        <label>Stok:</label><br>
        <select name="ketersediaan_stok">
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
        </select><br><br>

        <label>Foto Produk:</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
