<?php
session_start();

// Ambil data produk dari form
$id_prod = $_POST['id_product'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

// Format item baru
$itemBaru = [
    'id_product' => $id_prod,
    'nama' => $nama,
    'harga' => $harga,
    'jumlah' => $jumlah
];

// Inisialisasi keranjang kalau belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Cek kalau barang udah ada di keranjang, tambahin jumlah
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['nama'] === $nama) {
        $item['jumlah'] += $jumlah;
        $found = true;
        break;
    }
}
unset($item); // good practice

if (!$found) {
    $_SESSION['cart'][] = $itemBaru;
}

// Balikin ke halaman keranjang
header("Location: cart.php");
exit;
