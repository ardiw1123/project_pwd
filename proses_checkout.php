<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['is_login']) || !isset($_SESSION['cart'])) {
    echo "<script>
        alert('⚠️ Kamu belum login atau cart kosong!');
        window.location.href = 'login.php';
    </script>";
    exit;
}

$username = $_SESSION['is_login'];
$cart = $_SESSION['cart'];
$tanggal = date("Y-m-d H:i:s");
$total = 0;

foreach ($cart as $item) {
    $harga = $item[2];
    $jumlah = $item[3];
    $subtotal = $harga * $jumlah;
    $total += $subtotal;
}

mysqli_query($connect, "INSERT INTO orders (username, tanggal, total) VALUES ('$username', '$tanggal', '$total')");
$order_id = mysqli_insert_id($connect);

foreach ($cart as $item) {
    $id = $item[0];
    $nama = $item[1];
    $harga = $item[2];
    $jumlah = $item[3];
    $subtotal = $harga * $jumlah;

    mysqli_query($connect, "INSERT INTO order_items (order_id, id_produk, nama_produk, harga, jumlah, subtotal) 
        VALUES ('$order_id', '$id_produk', '$nama_produk', '$harga', '$jumlah', '$subtotal')");
}

unset($_SESSION['cart']);

echo "<script>
    alert('Checkout berhasil! Terima kasih sudah belanja 💖');
    window.location.href = 'ordered.php';
</script>";
?>
