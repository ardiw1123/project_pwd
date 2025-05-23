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
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #f5f5f5;
        }
        .struk-container {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
        }
        .store-name {
            font-size: 20px;
            font-weight: bold;
        }
        .store-address {
            font-size: 12px;
        }
        .struk-title {
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
        }
        .struk-detail {
            margin: 15px 0;
            font-size: 14px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 14px;
        }
        .items-table th {
            text-align: left;
            border-bottom: 1px dashed #000;
            padding: 5px 0;
        }
        .items-table td {
            padding: 5px 0;
            border-bottom: 1px dashed #ddd;
        }
        .total-section {
            margin-top: 15px;
            border-top: 1px dashed #000;
            padding-top: 10px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            border-top: 1px dashed #000;
            padding-top: 10px;
        }
        .print-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #4285f4;
            color: white;
            border: none;
            cursor: pointer;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .struk-container, .struk-container * {
                visibility: visible;
            }
            .struk-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
            }
            .print-btn {
                display: none;
            }
        }
    </style>
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
                <span>#<?= $order['order_id'] ?></span>
            </div>
            <div class="detail-row">
                <span>Tanggal:</span>
                <span><?= date('d/m/Y H:i', strtotime($order['tanggal'])) ?></span>
            </div>
            <div class="detail-row">
                <span>Kasir:</span>
                <span>Online Store</span>
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
                <span>Alamat:</span>
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
        
        <button class="print-btn" onclick="window.print()">Cetak Struk</button>
    </div>
</body>
</html>