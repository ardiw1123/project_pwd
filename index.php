<?php
  session_start();
  include 'connect.php';
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Utama</title>
    <!-- styling -->
    <link rel="stylesheet" href="style.css" />
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
        <a href="cart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
            <!-- <div class="icon-cart">
              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
              </svg>
              <span>0</span>
            </div> -->
        <!-- <div id="popup1" class="overlay">
          <div class="popup">
            <a class="close-icon" href="#">&times;</a>
            <h2>Haloo Brandiess!</h2>
            <p>Please do login first before check out yeaa!!</p>
            <a class="login-btn" href="login.php">Lanjut ke Login</a>
          </div>
        </div>
        <a href="" > </a> -->
      </div>
    </nav>
    <!-- navbar end -->

    <!-- main section -->
    <section class="main" id="home">
      <div class="content">
        <h1>Lorem, ipsum dolor.</h1>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam
          veritatis enim amet dolores quod!
        </p>
      </div>
      <div class="image">
        <img src="main-foto.jpg" alt="face-foto" class="image-main" />
      </div>
    </section>

    <section class="products">
      <h2>Our Products</h2>
      <div class="product-grid">
        <a href="moisturizer.php" class="product-card">
          <img src="assets/moist/moist2.jpg" />
          <h3>Moisturizer</h3>
          <p>Moist your skin, and feel healthy.</p>
        </a>
        <a href="serum.php" class="product-card">
          <img src="assets/serum/serum4.jpg" />
          <h3>Serum</h3>
          <p>Long-wear, flawless finish all day.</p>
        </a>
        <a href="toner.php" class="product-card">
          <img src="assets/toner/toner1.jpg" />
          <h3>Toner</h3>
          <p>Long-wear, flawless finish all day.</p>
        </a>
      </div>
    </section>

    <footer>
      <p>&copy; 2025 Nama Brand. All rights reserved.</p>
      <p>Follow us on Instagram @blabla</p>
      <div class="social-icons">
        <i data-feather="instagram"></i>
        <i data-feather="facebook"></i>
        <i data-feather="twitter"></i>
      </div>
    </footer>

    <!-- icons -->
    <script>
      feather.replace();
    </script>
    <script src="app.js"></script>
  </body>
</html>
