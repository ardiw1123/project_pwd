<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>serum</title>
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

    <section id="kategori" class="kategori">
      <h2>Cleanser</h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis,
        eos.
      </p>
      <div class="row">
        <div class="kategori-card">
          <img
            src="./assets/cleanser/fw1.jpg"
            alt="serum"
            class="kategori-image"
          />
          <h3 class="merek-kategori">Cleanser 1</h3>
          <p class="price">IDR 70k</p>
        </div>
        <div class="kategori-card">
          <img
            src="./assets/cleanser/fw2.jpg"
            alt="serum"
            class="kategori-image"
          />
          <h3 class="merek-kategori">Cleanser 2</h3>
          <p class="price">IDR 70k</p>
        </div>
        <div class="kategori-card">
          <img
            src="./assets/cleanser/fw3.jpg"
            alt="serum"
            class="kategori-image"
          />
          <h3 class="merek-kategori">Cleanser 3</h3>
          <p class="price">IDR 70k</p>
        </div>
        <div class="kategori-card">
          <img src="./assets/cleanser/fw4.jpg" alt="serum" class="kategori-image" />
          <h3 class="merek-kategori">Cleanser 4</h3>
          <p class="price">IDR 70k</p>
        </div>
      </div>
    </section>
    <script>
      feather.replace();
    </script>
  </body>
</html>
