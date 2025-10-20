<?php
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function formatTanggal($tanggal) {
    return date("d M Y", strtotime($tanggal));
}

function redirect($url) {
    header("Location: $url");
    exit;
}
?>
