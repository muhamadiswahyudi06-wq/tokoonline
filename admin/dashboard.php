<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID Produk</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include 'koneksi.php';
      $query = mysqli_query($conn, "SELECT * FROM produk");
      while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>{$row['id_produk']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['kategori']}</td>
                <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>{$row['stok']}</td>
                <td><img src='img/{$row['gambar']}' width='50'></td>
                <td>
                  <a href='edit_produk.php?id={$row['id_produk']}' class='btn btn-warning btn-sm'>Edit</a>
                  <a href='hapus_produk.php?id={$row['id_produk']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
                </td>
              </tr>";
      }
    ?>
  </tbody>
</table>
