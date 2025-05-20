<?php
session_start();

include 'connect.php';

$product_id = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];
}

$product_data = null;
$error_message = '';

if ($product_id) {
    $sql = "SELECT * FROM product WHERE id_product = ?";
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $product_id); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product_data = $result->fetch_assoc();
        } else {
            $error_message = "Produk dengan ID " . htmlspecialchars($product_id) . " tidak ditemukan.";
        }

        $stmt->close();
    } else {
        $error_message = "Gagal menyiapkan query database.";
    }
} else {
    $error_message = "ID Produk tidak spesifik atau tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_data ? htmlspecialchars($product_data['nama_product']) : 'Detail Produk'; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">Nama <span>Brand</span>.</a>
        <div class="navbar-menu">
            <a href="daftar_produk.php?kategori=serum">Serum</a>
            <a href="daftar_produk.php?kategori=moisturizer">Moisturizer</a>
            <a href="daftar_produk.php?kategori=toner">Toner</a>
            <a href="daftar_produk.php?kategori=sunscreen">Sunscreen</a>
            <a href="daftar_produk.php?kategori=masker">Masker</a>
            <a href="daftar_produk.php?kategori=cleanser">Cleanser</a>
            <a href="daftar_produk.php?kategori=lip-care">Lip Care</a>
        </div>
        <div class="navbar-ekstra">
            <a href="index.php" id="home"> <i data-feather="home"></i></a>
            <a href="dataCustomer.php" id="user"> <i data-feather="user"></i></a>
            <a href="cart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        </div>
    </nav>
    <section class="product-detail-section">
        <div class="product-detail-container">

            <?php if ($product_data) : ?>
                <div class="product-image-area">
                    <img src="<?php echo htmlspecialchars($product_data['file_path']); ?>" alt="<?php echo htmlspecialchars($product_data['nama_product']); ?>">
                </div>
                <div class="product-info-area">
                    <h2><?php echo htmlspecialchars($product_data['nama_product']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($product_data['description'])); ?></p> <?php if (!empty($product_data['size'])) : ?>
                        <p><strong>Ukuran:</strong> <?php echo htmlspecialchars($product_data['size']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($product_data['manfaat'])) : ?>
                        <h3>Manfaat:</h3>
                        <p><?php echo nl2br(htmlspecialchars($product_data['manfaat'])); ?></p>
                        <?php endif; ?>

                    <?php if (!empty($product_data['hero_ingredients'])) : ?>
                        <h3>Hero Ingredients:</h3>
                        <p><?php echo nl2br(htmlspecialchars($product_data['hero_ingredients'])); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($product_data['cara_penggunaan'])) : ?>
                        <h3>Cara penggunaan:</h3>
                        <p><?php echo nl2br(htmlspecialchars($product_data['cara_penggunaan'])); ?></p>
                    <?php endif; ?>

                    <?php if (isset($product_data['harga'])) : ?>
                        <span class="product-price">IDR <?php echo number_format($product_data['harga'], 0, ',', '.'); ?>,00</span>
                    <?php endif; ?>

                    <style>
                        .jumlah-popup {
                            margin-top: 20px;
                            background-color: #fff0f5;
                            padding: 20px;
                            border-radius: 12px;
                            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                            text-align: center;
                        }
                    </style>

                    <button class="add-to-cart-btn" onclick="showForm()">Add to Cart</button>
                    <div id="form-jumlah" class="jumlah-popup" style="display: none;">
                        <form method="post" action="addcart.php">
                            <input type="hidden" name="id_product" value="<?= htmlspecialchars($product_data['id_product']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($product_data['nama_product']); ?>">
                            <input type="hidden" name="harga" value="<?= htmlspecialchars($product_data['harga']); ?>">
                            <label for="jumlah">Quantity: </label>
                            <input type="number" name="jumlah" value="1" min="1" required style="width: 25px;">
                            <br><br>
                        <button type="submit">Add to Cart</button>
                        <button type="button" onclick="hideForm()">Cancel</button>
                        </form>
                    </div>

                </div>
            <?php else : ?>
                <div class="error-message">
                    <p><?php echo $error_message; ?></p>
                    <p><a href="index.php">Kembali ke Halaman Utama</a></p>
                </div>
            <?php endif; ?>

        </div>
    </section>
    <?php
     ?>
     <footer>
        <p>&copy; 2025 Nama Brand. All rights reserved.</p>
        <p>Follow us on Instagram @blabla</p>
        <div class="social-icons">
            <i data-feather="instagram"></i>
             <i data-feather="facebook"></i>
             <i data-feather="twitter"></i>
         </div>
     </footer>
    <script>
      feather.replace();
    </script>
    <script>
    function showForm() {
        document.getElementById('form-jumlah').style.display = 'block';
    }
    function hideForm() {
        document.getElementById('form-jumlah').style.display = 'none';
    }
    </script>
     </body>
</html>