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

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="cartpage">
    <nav class="navbar">
        <a href="#" class="logo">Clau <span>dy</span>.</a>
        <div class="navbar-menu">
            <a href="serum.php">Serum</a>
            <a href="moisturizer.php">Moisturizer</a>
            <a href="toner.php">Toner</a>
            <a href="sunscreen.php">Sunscreen</a>
            <a href="masker.php">Masker</a>
            <a href="cleanser.php">Cleanser</a>
            <a href="lip-care.php">Lip Care</a>
        </div>
        <div class="navbar-ekstra">
            <a href="index.php" id="home"> <i data-feather="home"></i></a>
            <a href="dataCustomer.php" id="user"> <i data-feather="user"></i></a>
            <a href="cart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        </div>
    </nav>

    <div class="cart-container">
        <h1>Your Cart🛒</h1>
    <?php if (empty($cart)) : ?>
        <br><br><br><p style="text-align: center;">Its Empty!</p><br><br><br>
        <button class="btn-back" onclick="window.location.href='index.php'">Back</button>
    <?php else : ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Option</th>
            </tr>

            <?php foreach ($cart as $item) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td>IDR <?php echo number_format($item['harga'], 0, ',', '.'); ?>,00</td>
                    <td><?php echo (int)$item['jumlah']; ?></td>
                    <td>IDR <?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?>,00</td>
                    <td>
                    <button class="hapus-btn"  
                    onclick="if(confirm('Yakin mau hapus barang ini?')) window.location.href='deletecart.php?nama=<?= urlencode($item['nama']) ?>';">Delete</button>
                    </td>
                </tr>
                <?php $total += $item['harga'] * $item['jumlah']; ?>
            <?php endforeach; ?>
            <div class="cart-total">
            <tr>
                <td colspan="3"><strong>Total Price</strong></td>
                <td colspan="2"><strong>IDR <?php echo number_format($total, 0, ',', '.'); ?>,00</strong></td>
            </tr>
            </div>
        </table>

        <br>
        <button class="btn-back" onclick="window.location.href='index.php'">Back</button>
        <button class="btn-checkout" onclick="window.location.href='checkout.php'">Checkout</button>
    <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2025 Clau Dy. All rights reserved.</p>
        <p>Follow us on Instagram @ClauDy</p>
        <div class="social-icons">
            <i data-feather="instagram"></i>
            <i data-feather="facebook"></i>
            <i data-feather="twitter"></i>
        </div>
    </footer>

<script>feather.replace();</script>
</body>
</html>
