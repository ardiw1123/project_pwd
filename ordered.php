<?php
session_start();
include 'connect.php';

$user = $_SESSION['user_id']; // ID user yang login

// Ambil daftar order-nya
$result_orders = mysqli_query($connect, "SELECT * FROM orders WHERE username = '$user' ORDER BY tanggal DESC");

while ($order = mysqli_fetch_assoc($result_orders)) {
    echo "<h3>Order ID: #" . $order['order_id'] . "</h3>";
    echo "<p>Tanggal: " . $order['tanggal'] . "</p>";
    echo "<p>Total: Rp" . number_format($order['total'], 0, ',', '.') . "</p>";

    $order_id = $order['order_id'];
    $result_items = mysqli_query($connect, "SELECT * FROM order_items WHERE order_id = '$order_id'");

    echo "<ul>";
    while ($item = mysqli_fetch_assoc($result_items)) {
        echo "<li>" . $item['nama_produk'] . " (" . $item['jumlah'] . "x) - Rp" . number_format($item['harga'] * $item['jumlah'], 0, ',', '.') . "</li>";
    }
    echo "</ul><hr>";
}
?>