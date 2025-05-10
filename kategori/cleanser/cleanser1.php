<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleanser 1</title>
    <!-- styling -->
    <link rel="stylesheet" href="../../style.css" />
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
      <a href="#" class="logo">Nama <span>Brand</span>.</a>
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
        <a href="#popup1"><i data-feather="shopping-cart"></i></a>
        <div id="popup1" class="overlay">
          <div class="popup">
            <a class="close-icon" href="#">&times;</a>
            <h2>Haloo Brandiess!</h2>
            <p>Please do login first before check out yeaa!!</p>
            <a class="login-btn" href="login.php">Lanjut ke Login</a>
          </div>
        </div>
        <a href="#" id="shopping-cart"> </a>

      </div>
    </nav>
    <!-- navbar end -->
     <!-- Main Start -->

    <section class="product-detail-section">
    <div class="product-detail-container">
        <div class="product-image-area">
            <img src="../../assets/cleanser/fw1.jpg" alt="Nama Produk">
        </div>
        <div class="product-info-area">
            <h2>Cleanser 1</h2>
            <h4 class="product-price">Rp 74,000,00</h4>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quia, accusamus laboriosam dignissimos labore sed reiciendis sapiente odio modi expedita fuga, amet eaque minus adipisci. Reprehenderit velit unde voluptas ipsam?</p>
            <button class="add-to-cart-btn">Add to Cart</button>
            </div>
    </div>
</section>
</body>
</html>