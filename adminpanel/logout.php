<?php
session_start(); // mulai session

// hapus semua session
session_unset();
session_destroy();

// arahkan kembali ke halaman login
header("Location: login.php");
exit;
