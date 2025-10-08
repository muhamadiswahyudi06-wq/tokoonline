<?php
include 'config.php';
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    } else {
        $error = "Login gagal!";
    }
}
include 'header.php';
?>

<div class="login-form">
    <h2 class="text-center mb-4" style="color: #8B4513;">Login</h2>
    <?php if (isset($error)) echo "<p class='alert alert-danger'>$error</p>"; ?>
    <?php if (isset($_GET['success'])) echo "<p class='alert alert-success'>Registrasi sukses! Silakan login.</p>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="text-center mt-3">Belum punya akun? <a href="register.php">Register</a></p>
</div>

<?php include 'footer.php'; ?>