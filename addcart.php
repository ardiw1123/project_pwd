<?php
session_start();
include 'connect.php';

// Ambil data produk dari form
$id_prod = $_POST['id_product'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

// Ambil file_path dari database
$file_path = '';
$sql = "SELECT file_path FROM product WHERE id_product = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id_prod);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $product_data = $result->fetch_assoc();
    $file_path = $product_data['file_path'];
}

// Format item baru
$itemBaru = [
    'id_product' => $id_prod,
    'nama' => $nama,
    'harga' => $harga,
    'jumlah' => $jumlah,
    'file_path' => $file_path
];

// Inisialisasi keranjang kalau belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Cek kalau barang udah ada di keranjang, tambahin jumlah
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id_product'] === $id_prod) {
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
