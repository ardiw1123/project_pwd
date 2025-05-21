<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php
  session_start();
  include 'connect.php';
  ?>
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
        <a href="cart.php" id="shopping-cart">><i data-feather="shopping-cart"></i></a>
      </div>
    </nav>
    <!-- navbar end -->
    <div class="login-user">
      <h2>Silahkan Login</h2>
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        header('location:index.php');
        exit();
      }
      if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($connect, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $data['nama_lengkap']; 
            header('location:index.php');
            exit();
          }else {
            header('location:login.php?pesan=gagal'); 
            exit();
          }
        }
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'){
          echo "<div class='alert alert-danger mt-3'>Email atau Password salah!</div>";
        }
            ?>
      <form class="form-login" action="login.php" method="POST">
        <div class="input-grup">
          <input
            type="text"
            name="email"
            id="email-input"
            placeholder=" "
            required
          />
          <label for="email-input">Email</label>
        </div>
        <div class="input-grup">
          <input
            type="password"
            name="password"
            id="password-input"
            placeholder=" "
            required
          />
          <label for="password-input">Password</label>
        </div>
        <button type="submit" class="login" name="login">Login</button>
      </form>
      <p>Belum punya akun?</p>
      <a href="regist.php">Daftar Disini</a>
    </div>
  </body>
</html>
