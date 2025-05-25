<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['is_login']) || !isset($_SESSION['cart'])) {
    echo "<script>
        alert('Kamu belum login atau cart kosong!');
        window.location.href = 'login.php';
    </script>";
    exit;
}

$user_id = $_SESSION['is_login']; 
$username = mysqli_real_escape_string($connect, $_SESSION['email']);
$cart = $_SESSION['cart'];
$tanggal = date("Y-m-d H:i:s");
$total = 0;

// total belanja
foreach ($cart as $item) {
    $total += $item['harga'] * $item['jumlah'];
}

// simpan ke tabel orders
$insertOrder = mysqli_query($connect, 
    "INSERT INTO orders (id, username, tanggal, total) 
        VALUES ('$user_id', '$username', '$tanggal', '$total')");

if (!$insertOrder) {
    die("Gagal menyimpan order: " . mysqli_error($connect));
}

$order_id = mysqli_insert_id($connect);

// simpan item ke order_items
foreach ($cart as $item) {
    $id_product = mysqli_real_escape_string($connect, $item['id_product']);
    $nama = mysqli_real_escape_string($connect, $item['nama']);
    $harga = $item['harga'];
    $jumlah = $item['jumlah'];
    $subtotal = $harga * $jumlah;

    mysqli_query($connect, 
        "INSERT INTO order_items 
        (order_id, id_product, nama_produk, harga, jumlah, subtotal) 
        VALUES ('$order_id', '$id_product', '$nama', '$harga', '$jumlah', '$subtotal')");
}

// update session dan kosongkan cart
$_SESSION['order_id'] = $order_id;
unset($_SESSION['cart']);

echo "<script>
    alert('Checkout berhasil! Terima kasih sudah belanja!');
    window.location.href = 'struk.php';
</script>";
?>