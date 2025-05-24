<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>serum</title>
    <!-- styling -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- navbar start -->
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
    <!-- navbar end -->

    <?php
    include "connect.php";
    if(!isset($connect) || $connect->connect_error) die("Koneksi database gagal.");
    $idKategori = 4;
    $sql = "SELECT * FROM product WHERE idKategori=?";
    $result = $connect->prepare($sql);
    $products = [];
    if($result){
      $result->bind_param("i", $idKategori);
      $result->execute();
      $data=$result->get_result();
      if($data->num_rows > 0){
        while($row=$data->fetch_assoc()){
          $products[] = $row;
        }
      }
      $result->close();
    }
    ?>
    <section class="products">
      <h2>Toner</h2>
      <?php if (!empty($products)) { ?>
        <div class="product-grid">
          <?php foreach ($products as $product) { ?>
            <div class="product-card">
              <a href="product_detail.php?id=<?php echo htmlspecialchars($product['id_product']); ?>">
                <img 
                  src="<?php echo htmlspecialchars($product['file_path']); ?>"
                  alt="<?php echo htmlspecialchars($product['nama_product']); ?>"
                  class="kategori-image" 
                />
                <h3 class="merek-kategori"><?php echo htmlspecialchars($product['nama_product']); ?></h3>
                <p class="price">IDR <?php echo number_format($product['harga'], 0, ',', '.'); ?></p> 
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <p>Produk belum tersedia di kategori ini.</p>
      <?php } ?>
    </section>

    <footer>
      <p>&copy; 2025 Clau Dy. All rights reserved.</p>
      <p>Follow us on Instagram @ClauDy</p>
      <div class="social-icons">
        <i data-feather="instagram"></i>
        <i data-feather="facebook"></i>
        <i data-feather="twitter"></i>
      </div>
    </footer>
    <script>
      feather.replace();
    </script>
  </body>
</html>
