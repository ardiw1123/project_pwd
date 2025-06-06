<?php
include "connect.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["daftar"])){
$email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$no_handphone = $_POST['no_handphone'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$desa = $_POST['desa'];
$alamat = $_POST['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Regist</title>
    <!-- styling -->
    <link rel="stylesheet" href="CSS/style.css" />
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
      <a href="#" class="logo">Clau <span>Dy</span>.</a>
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
    <div class="regist-user">
      <h2>Buat Akun</h2>
      <p>
        <?php 
          if (empty($email) || empty($password) || empty($nama) || empty($no_handphone) || empty($provinsi) || empty($kabupaten) || empty($kecamatan) || empty($desa) || empty($alamat)) {
            echo "<div class='alert alert-danger mt-3'>Semua field wajib diisi!</div>";
          } else {
            $sql = "INSERT INTO users (id, email, password, nama_lengkap, no_telp, provinsi, kabupaten, kecamatan, desa, alamat)
                    VALUES ('','$email', '$password', '$nama', '$no_handphone', '$provinsi', '$kabupaten', '$kecamatan', '$desa' , '$alamat')";
            if (mysqli_query($connect, $sql)) {?>
              <script>
                  alert('Registrasi Berhasil!')
                  window.location.href = 'login.php'
              </script><?php
            } else {
              echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data: " . mysqli_error($connect) . "</div>";
            }
          }?>
      </p>
      <form class="form-regist" method="post">
        <div class="input-grup">
          <input
            type="text"
            id="email-input"
            name="email"
            placeholder=" "
            required
          />
          <label for="email-input">Email</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="nama-lengkap"
            name="nama"
            placeholder=" "
            required
          />
          <label for="nama-lengkap">Nama Lengkap</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="no-telp"
            name="no_handphone"
            placeholder=" "
            required
          />
          <label for="no-telp">No Handphone</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="provinsi"
            name="provinsi"
            placeholder=" "
            required
          />
          <label for="provinsi">Provinsi</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="kabupaten"
            name="kabupaten"
            placeholder=" "
            required
          />
          <label for="kabupaten">Kabupaten/Kota</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            name="kecamatan"
            placeholder=" "
            id="kecamatan"
            required
          />
          <label for="kecamatan">Kecamatan</label>
        </div>
        <div class="input-grup">
          <input type="text" name="desa" placeholder=" " id="desa" required />
          <label for="desa">Desa</label>
        </div>
        <div class="input-grup">
          <textarea
            name="alamat"
            placeholder=" "
            id="alamat"
            rows="5"
            cols="5"
          ></textarea>
          <label for="alamat">Alamat Lengkap</label>
        </div>
        <div class="input-grup">
          <input
            type="password"
            name="password"
            placeholder=" "
            id="password"
            required
          />
          <label for="password">Password</label>
        </div>
        <button type="submit" class="daftar" name="daftar">Daftar</button>
      </form>
      <p>Sudah punya akun?</p>
      <a href="login.php">Login Disini</a>
    </div>
  </body>
</html>
