<?php
session_start();
include 'connect.php'; // file ini nyambungin ke database
echo 'Email session: ' . $_SESSION['email'];

//Debugging - check what's in session
echo '<pre>Session contents: ';
print_r($_SESSION);
echo '</pre>';

$order_id = $_SESSION['order_id'];
// $user_id = $_SESSION['user_id'];
// $username = $_SESSION['nama_lengkap'];

if (!isset($_SESSION['order_id'])) {
    die("Order ID tidak ditemukan dalam session");
}

//ambil data order
$order = mysqli_fetch_assoc(mysqli_query($connect, 
    "SELECT o.*, u.nama_lengkap 
    FROM orders o
    JOIN users u ON o.id = u.id
    WHERE o.order_id = '$order_id'"));

if (!$order) {
    die("Pemesanan tidak ditemukan untuk order ID: $order_id");
}

//ambil detail order
$detail = mysqli_query($connect, 
    "SELECT oi.*, p.nama_product
    FROM order_items oi
    JOIN product p ON oi.id_product = p.id_product
    WHERE oi.order_id = '$order_id'");

if (!$detail) {
    die("Detail query error: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <div class="receipt">
        <h1>Invoice</h1>
        <p><strong>Order ID: </strong> <?= $order['order_id'] ?></p>
        <p><strong>Tanggal: </strong> <?= date('d/m/Y H:i', strtotime($order['tanggal'] ?? 'now')) ?></p>
        <p><strong>Pelanggan: </strong> <?= htmlspecialchars($order['nama_lengkap']) ?></p>
        
        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($detail)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_product']) ?></td>
                <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>Rp<?= number_format($row['subtotal'], 0, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td>Rp<?= number_format($order['total'], 0, ',', '.') ?></td>
            </tr>
        </table>
        
        <p style="text-align: center; margin-top: 30px;">
            Terima kasih telah berbelanja!
        </p>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
            <button onclick="window.print()" class="btn">Cetak Struk</button>
        </div>
    </div>
</body>
</html>
