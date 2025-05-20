<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {?>
    <script>
        alert('Kamu belum login! Silakan login dulu ya.')
        window.location.href = 'login.php'
    </script><?php
    exit();
}

$keranjang = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    
</head>
<body class="cartpage">
    <div class="cart-container">
        <h1>Your Cart🛒</h1>
    <?php if (empty($keranjang)) : ?>
        <p style="text-align: center;">Its Empty!</p>
        <a href="index.php">Go shopping!</a>
    <?php else : ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            <?php foreach ($keranjang as $item) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td>IDR <?php echo number_format($item['harga'], 0, ',', '.'); ?>,00</td>
                    <td><?php echo (int)$item['jumlah']; ?></td>
                    <td>IDR <?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?>,00</td>
                    <td>
                    <a href="deletecart.php?nama=<?= urlencode($item['nama']) ?>" onclick="return confirm('Yakin mau hapus barang ini?')">Delete</a>
                    </td>
                </tr>
                <?php $total += $item['harga'] * $item['jumlah']; ?>
            <?php endforeach; ?>
            <div class="cart-total">
            <tr>
                <td colspan="3"><strong>Total Price</strong></td>
                <td><strong>IDR <?php echo number_format($total, 0, ',', '.'); ?>,00</strong></td>
            </tr>
            </div>
        </table>

        <br>
        <a href="index.php">Back</a> 
        <a href="checkout.php">Checkout</a> 
    <?php endif; ?>
    </div>
<script>feather.replace();</script>
</body>
</html>
