<?php
include 'config.php';

// Tambah ke cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
    
    // Update stock (opsional)
    $stmt = $pdo->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
    $stmt->execute([$quantity, $product_id]);
}

// Hapus dari cart
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    // Restore stock jika perlu
}

include 'header.php';
?>

<h1 class="mb-4" style="color: #8B4513;">Keranjang Belanja</h1>
<div class="cart-item">
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Keranjang kosong. <a href="index.php">Belanja sekarang</a></p>
    <?php else: ?>
        <table class="table">
            <thead><tr><th>Produk</th><th>Harga</th><th>Qty</th><th>Total</th><th>Aksi</th></tr></thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $qty) {
                    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                    $stmt->execute([$id]);
                    $product = $stmt->fetch();
                    if ($product) {
                        $subtotal = $product['price'] * $qty;
                        $total += $subtotal;
                        echo "<tr>
                            <td>{$product['name']}</td>
                            <td>Rp " . number_format($product['price'], 0, ',', '.') . "</td>
                            <td>$qty</td>
                            <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                            <td><a href='?remove=$id' class='btn btn-danger btn-sm'>Hapus</a></td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <h4>Total: Rp <?php echo number_format($total, 0, ',', '.'); ?></h4>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="checkout.php?total=<?php echo $total; ?>" class="btn btn-primary">Checkout</a>
        <?php else: ?>
            <p>Login dulu untuk checkout. <a href="login.php">Login</a></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>