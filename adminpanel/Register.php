<?php
include 'config.php';
if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        header('Location: login.php?success=1');
    } else {
        $error = "Registrasi gagal!";
    }
}
include 'header.php';
?>

<div class="login-form">
    <h2 class="text-center mb-4" style="color: #8B4513;">Register</h2>
    <?php if (isset($error)) echo "<p class='alert alert-danger'>$error</p>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
    <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
</div>

<?php include 'footer.php'; ?>