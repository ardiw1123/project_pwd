<?php
session_start();
include "connect.php";
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('location:login.php');
    exit();
}

if (empty($_SESSION["cart"])) {
    echo "<script>alert('Keranjang kamu kosong, gak bisa checkout nih!');</script>";
    echo "<script>location='keranjang.php';</script>";
    exit;
}

$id_user = $_SESSION['is_login']['user_id'];
$total = 0;

foreach ($_SESSION["cart"] as $id_product => $jumlah) {
    $query = mysqli_query($connect, "SELECT * FROM product WHERE id_product='$id_product'");
    $data = mysqli_fetch_assoc($query);
    $subtotal = $data["harga"] * $jumlah;
    $total += $subtotal;
}

mysqli_query($connect, "INSERT INTO pembelian (id_user, tglbeli, total_pembelian)
    VALUES ('$id_user', '$tglbeli', '$total')");

$id_beli = mysqli_insert_id($connect);

foreach ($_SESSION["cart"] as $id_product => $jumlah) {
    $query = mysqli_query($connect, "SELECT * FROM product WHERE id_product='$id_product'");
    $data = mysqli_fetch_assoc($query);
    $harga = $data["harga"];
    $subtotal = $harga * $jumlah;

    mysqli_query($connect, "INSERT INTO pembelian_product (id_beli, id_product, harga, jumlah, subtotal)
        VALUES ('$id_beli', '$id_product', '$harga', '$jumlah', '$subtotal')");
}

unset($_SESSION["cart"]);

echo "<script>alert('Checkout sukses! Makasih udah belanja 😍');</script>";
echo "<script>location='invoice.php?id=$id_pembelian_baru';</script>";
?>
