<!-- ?php
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
?> -->

<?php
session_start();
include 'connect.php'; // file ini nyambungin ke database
echo 'Email session: ' . $_SESSION['email'];
// Cek apakah user udah login
if (!isset($_SESSION['is_login'])) {
    echo "Kamu harus login dulu, bestie!";
    exit;
}

$username = $_SESSION['email'];

// Ambil ID user berdasarkan username
$queryUser = mysqli_query($connect, "SELECT id FROM users WHERE email = '$username'");
$dataUser = mysqli_fetch_assoc($queryUser);
$userId = $dataUser['id'];

// Ambil pesanan berdasarkan ID user
$queryPesanan = mysqli_query($connect, "
    SELECT orders.order_id as order_id, orders.tanggal, product.nama_product, order_items.jumlah, order_items.harga
    FROM orders
    JOIN order_items ON orders.order_id = order_items.order_id
    JOIN product ON order_items.id_produk = product.id_product
    WHERE orders.username = '$userId'
    ORDER BY orders.tanggal DESC
");

echo "<h2>Pesanan Kamu, $username</h2>";

if (mysqli_num_rows($queryPesanan) > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID Pesanan</th><th>Tanggal</th><th>Produk</th><th>Jumlah</th><th>Harga</th></tr>";
    while ($row = mysqli_fetch_assoc($queryPesanan)) {
        echo "<tr>";
        echo "<td>{$row['order_id']}</td>";
        echo "<td>{$row['tanggal']}</td>";
        echo "<td>{$row['nama_product']}</td>";
        echo "<td>{$row['jumlah']}</td>";
        echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada pesanan yang kamu buat, yuk checkout dulu";
}
?>
