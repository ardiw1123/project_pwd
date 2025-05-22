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
$user = $_SESSION['email'];

//$username = $_SESSION['email'];
$username = mysqli_real_escape_string($connect, $_SESSION['email']);
$cart = $_SESSION['cart'];
$tanggal = date("Y-m-d H:i:s");
$total = 0;

foreach ($cart as $item) {
    $harga = $item['harga'];
    $jumlah = $item['jumlah'];
    $subtotal = $harga * $jumlah;
    $total += $subtotal;
}

$insertOrder = mysqli_query($connect, "INSERT INTO orders (username, tanggal, total) VALUES ('$username', '$tanggal', '$total')");
if (!$insertOrder) {
    die("Gagal menyimpan order: " . mysqli_error($connect));
}
$order_id = mysqli_insert_id($connect);
$_SESSION['order_id'] = $order_id;

foreach ($cart as $item) {
    $id = mysqli_real_escape_string($connect, $item['id_product']);
    $nama = mysqli_real_escape_string($connect, $item['nama']);
    $harga = $item['harga'];
    $jumlah = $item['jumlah'];
    $subtotal = $harga * $jumlah;

    mysqli_query($connect, "INSERT INTO order_items (order_id, id_product, nama_produk, harga, jumlah, subtotal) 
        VALUES ('$order_id', '$id', '$nama', '$harga', '$jumlah', '$subtotal')");
}

$_SESSION['order_id'] = $order_id;

unset($_SESSION['cart']);

echo "<script>
    alert('Checkout berhasil! Terima kasih sudah belanja 💖');
    window.location.href = 'ordered.php';
</script>";
?>
