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
        window.location.href = 'index.php';
    </script>";
    exit;
}

$username = $_SESSION['email'];
$cart = $_SESSION['cart'];

// Ambil data lengkap customer dari database
$query = "SELECT * FROM users WHERE email = ?";
$cust = $connect->prepare($query);
$cust->bind_param("s", $username);
$cust->execute();
$result_customer = $cust->get_result();
$customer_data = $result_customer->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/co.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="checkout-header">
        <a href="cart.php" class="back-arrow">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2>Checkout</h2>
    </div>
    
    <div class="checkout-section">
        <div class="section-title">
            <i class="fas fa-user"></i>
            <h3>Data Pembeli</h3>
        </div>
        <div class="user-info">
            <p><strong>Nama Lengkap: </strong><?= htmlspecialchars($customer_data['nama_lengkap']) ?></p>
            <p><strong>Email: </strong> <?= htmlspecialchars($username) ?></p>
            <p><strong>No. Telepon: </strong> <?= htmlspecialchars($customer_data['no_telp']) ?></p>
            <p><strong>Alamat Lengkap: </strong></p>
            <p>
                <?= htmlspecialchars($customer_data['alamat']) ?>,<br> Desa/Kel. 
                <?= htmlspecialchars($customer_data['desa']) ?>, Kec.
                <?= htmlspecialchars($customer_data['kecamatan']) ?>,<br>
                <?= htmlspecialchars($customer_data['kabupaten']) ?>, Prov. 
                <?= htmlspecialchars($customer_data['provinsi']) ?>
            </p>
        </div>
        
        <div class="section-title">
            <i class="fas fa-shopping-cart"></i>
            <h3>Barang yang Dibeli</h3>
        </div>
        
        <?php
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $id = $item['id_product'];
                $nama = $item['nama'];
                $harga = $item['harga'];
                $jumlah = $item['jumlah'];
                $subtotal = $harga * $jumlah;
                $total += $subtotal;
                
                // Ambil path gambar dari session atau query database
                $gambar = isset($item['file_path']) ? $item['file_path'] : '';
                
                //Cek session, query dari database
                if (empty($gambar)) {
                    $sql = "SELECT file_path FROM product WHERE id_product = ?";
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $product_img = $result->fetch_assoc();
                        $gambar = $product_img['file_path'];
                    }
                } ?>
        <div class="cart-item">
            <div class="item-image">
                <?php if (!empty($gambar)): ?>
                    <img src="<?= htmlspecialchars($gambar) ?>" alt="<?= htmlspecialchars($nama) ?>">
                <?php else: ?>
                    <i class="fas fa-box-open" style="font-size: 24px; color: #ccc;"></i>
                <?php endif; ?>
            </div>
            <div class="item-details">
                <div class="item-name"><?= $nama ?></div>
                <div class="item-price">Rp <?= number_format($harga, 0, ',', '.') ?></div>
                <div class="item-quantity">Jumlah: <?= $jumlah ?></div>
            </div>
            <div class="item-subtotal">Rp <?= number_format($subtotal, 0, ',', '.') ?></div>
        </div>
        <?php
            }
        } else {
            echo '<div class="empty-cart">Keranjang masih kosong</div>';
        }
        ?>
    </div>
    
    <div class="summary">
        <div class="section-title">
            <i class="fas fa-receipt"></i>
            <h3>Ringkasan Belanja</h3>
        </div>
        
        <div class="summary-row">
            <span>Subtotal</span>
            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
        </div>
        <div class="summary-row">
            <span>Ongkos Kirim</span>
            <span>Gratis</span>
        </div>
        <div class="summary-row total">
            <span>Total</span>
            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
        </div>
        
        <form action="proses_checkout.php" method="post">
            <button type="submit" class="checkout-btn">
                <i class="fas fa-credit-card"></i> Konfirmasi & Bayar
            </button>
        </form>
    </div>
</div>
<script>
    feather.replace();
</script>
</body>
</html>