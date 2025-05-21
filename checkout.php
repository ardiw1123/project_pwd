<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['is_login'])) {
    echo "<script>
        alert('⚠️ Login dulu ya!');
        window.location.href = 'login.php';
    </script>";
    exit;
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>
        alert('Keranjang kosong beb!');
        window.location.href = 'cart.php';
    </script>";
    exit;
}

$user = $_SESSION['email'];
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css" />

    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>

<h2>Halaman Checkout</h2>

<h3>👤 Data Pembeli</h3>
<p><strong>Username:</strong> <?= htmlspecialchars($user) ?></p>

<h3>🛒 Barang yang Dibeli</h3>
<table>
    <tr>
        <th>ID Barang</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php
    $total = 0;
    // foreach ($cart as $item) {
    //     $id_prod = $item[0];
    //     $nama = $item[1];
    //     $harga = $item[2];
    //     $jumlah = $item[3];
    //     $subtotal = $harga * $jumlah;
    //     $total += $subtotal;
    if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $id = $item['id_product'];
        $nama = $item['nama'];
        $harga = $item['harga'];
        $jumlah = $item['jumlah'];
        $subtotal = $harga * $jumlah;
        $total += $subtotal;

    //     echo "
    //     <tr>
    //         <td>{$id_prod}</td>
    //         <td>{$nama}</td>
    //         <td>Rp " . number_format($harga, 0, ',', '.') . "</td>
    //         <td>{$jumlah}</td>
    //         <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
    //     </tr>";
    // }

    ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $nama ?></td>
            <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
            <td><?= $jumlah ?></td>
            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='5'>Keranjang masih kosong</td></tr>";
}

?>
<tr>
    <td colspan="4" align="right"><strong>Total</strong></td>
    <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
</tr>

<form action="proses_checkout.php" method="post">
    <input type="submit" value="Konfirmasi & Bayar" style="margin-top: 20px; padding: 10px;">
</form>


</body>
</html>
