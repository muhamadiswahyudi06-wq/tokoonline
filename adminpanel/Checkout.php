<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) header('Location: login.php');

$total = $_GET['total'] ?? 0;
if ($_POST) {
    $address = $_POST['address'];
    
    // Simpan order ke DB
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total, address) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $total, $address]);
    $order_id = $pdo->lastInsertId();
    
    // Simpan items
    foreach ($_SESSION['cart'] as $product_id => $qty) {
        $stmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $price = $stmt->fetchColumn();
        
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $product_id, $qty, $price]);
    }
    
    unset($_SESSION['cart']);  // Kosongkan cart
    header('Location: payment.php?order_id=' . $order_id . '&total=' . $total);
}
include 'header.php';
?>

<h1 class="mb-4" style="color: #8