<?php include 'config.php'; include 'header.php'; ?>

<h1 class="text-center mb-4" style="color: #8B4513;">Produk Cokelat Premium Kami</h1>
<div class="row">
    <?php
    $stmt = $pdo->query("SELECT * FROM products WHERE stock > 0");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
    ?>
    <div class="col-md-4 mb-4">
        <div class="card product-card">
            <img src="<?php echo $row['image']; ?>" class="card-img-top product-img" alt="<?php echo $row['name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo substr($row['description'], 0, 100); ?>...</p>
                <p class="fw-bold text-success">Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                <form method="POST" action="cart.php" style="display: inline;">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>