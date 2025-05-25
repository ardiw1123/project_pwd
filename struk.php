<?php
session_start();
include 'connect.php';

// Redirect jika belum login
if(!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit();
}

// Ambil data user
$user_query = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($connect, $user_query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['is_login']);
mysqli_stmt_execute($stmt);
$user_result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($user_result);

// Ambil data transaksi terakhir user
$order_query = "SELECT * FROM orders WHERE id = ? ORDER BY tanggal DESC LIMIT 1";
$stmt = mysqli_prepare($connect, $order_query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['is_login']);
mysqli_stmt_execute($stmt);
$order_result = mysqli_stmt_get_result($stmt);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    echo "<div class='struk-container' style='text-align: center; padding: 20px;'>";
    echo "<h1>Tidak ada riwayat transaksi ditemukan.</h1>";
    echo "<p>Silakan lakukan pembelian terlebih dahulu.</p>";
    echo "<a href='index.php' class='print-btn'>Kembali ke Beranda</a>";
    echo "</div>";
    exit();
}

// Ambil detail items
$items_query = "SELECT p.nama_product, oi.harga, oi.jumlah, oi.subtotal 
                FROM order_items oi 
                JOIN product p ON oi.id_product = p.id_product 
                WHERE oi.order_id = ?";
$stmt = mysqli_prepare($connect, $items_query);
mysqli_stmt_bind_param($stmt, "i", $order['order_id']);
mysqli_stmt_execute($stmt);
$items_result = mysqli_stmt_get_result($stmt);

$username = $_SESSION['email'];

// Ambil data lengkap customer dari database
$sql_customer = "SELECT * FROM users WHERE email = ?";
$stmt_customer = $connect->prepare($sql_customer);
$stmt_customer->bind_param("s", $username);
$stmt_customer->execute();
$result_customer = $stmt_customer->get_result();
$customer_data = $result_customer->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Struk Pembelian</title>
    <link rel="stylesheet" href="CSS/struk.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="struk-container">
        <div class="header">
            <div class="store-name">ClauDy Beauty</div>
            <div class="store-address">Jl. Contoh No. 123, Jakarta</div>
            <div class="store-address">Telp: 021-1234567</div>
        </div>
        
        <div class="struk-title">STRUK PEMBELIAN</div>
        
        <div class="struk-detail">
            <div class="detail-row">
                <span>No. Transaksi:</span>
                <span><?= $order['order_id'] ?></span>
            </div>
            <div class="detail-row">
                <span>Tanggal:</span>
                <span><?= date('d/m/Y H:i', strtotime($order['tanggal'])) ?></span>
            </div>
        </div>
        
        <div class="struk-detail">
            <div class="detail-row">
                <span>Nama:</span>
                <span><?= htmlspecialchars($customer_data['nama_lengkap']) ?></span>
            </div>
            <div class="detail-row">
                <span>No. HP:</span>
                <span><?= htmlspecialchars($customer_data['no_telp']) ?></span>
            </div>
            <div class="detail-row">
                <span>Alamat: </span>
                <span>
                    <?= htmlspecialchars(
                        $customer_data['alamat'] . ', ' . 
                        $customer_data['desa'] . ', ' . 
                        $customer_data['kecamatan'] . ', ' . 
                        $customer_data['kabupaten'] . ', ' . 
                        $customer_data['provinsi']
                    ) ?>
                </span>
            </div>
        </div>
        
        <table class="items-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php while($item = mysqli_fetch_assoc($items_result)): ?>
                <tr>
                    <td><?= htmlspecialchars($item['nama_product']) ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td>IDR <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <div class="total-section">
            <div class="detail-row">
                <span>TOTAL:</span>
                <span>IDR <?= number_format($order['total'], 0, ',', '.') ?></span>
            </div>
        </div>
        
        <div class="footer">
            Terima kasih telah berbelanja<br>
            Barang yang sudah dibeli tidak dapat ditukar/dikembalikan
        </div>
        
        <button class="back-btn" onclick="window.location.href='cart.php'">Back</button>
        <button class="print-btn" onclick="window.print()">Cetak Struk</button>

    </div>
    <script>
    feather.replace();
</script>
</body>
</html>