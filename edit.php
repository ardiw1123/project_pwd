<?php
include "connect.php";
session_start();
$id = $_SESSION['is_login'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Data tidak ditemukan!');</script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])){
$email = $_POST['email'];
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
    <title>Ubah Data Diri</title>
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
      <a href="#" class="logo">Clau<span>Dy</span>.</a>
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
      <h2>Ubah Data Diri</h2>
      <p>
        <?php 
          if (empty($email) || empty($nama) || empty($no_handphone) || empty($provinsi) || empty($kabupaten) || empty($kecamatan) || empty($desa) || empty($alamat)) {
            echo "<div class='alert alert-danger mt-3'>Semua field wajib diisi!</div>";
          } else {
            $sql = "UPDATE users SET email='$email', nama_lengkap='$nama', no_telp='$no_handphone', provinsi='$provinsi', kabupaten='$kabupaten', kecamatan='$kecamatan', desa='$desa', alamat='$alamat' WHERE id='$id'";
            if (mysqli_query($connect, $sql)) {?>
              <script>
                  alert('Ubah Data Berhasil!')
                  window.location.href = 'dataCustomer.php'
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
            placeholder=" " value="<?= isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>"
            required
          />
          <label for="email-input">Email</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="nama-lengkap"
            name="nama"
            placeholder=" " value="<?= isset($data['nama_lengkap']) ? htmlspecialchars($data['nama_lengkap']) : ''; ?>"
            required
          />
          <label for="nama-lengkap">Nama Lengkap</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="no-telp"
            name="no_handphone"
            placeholder=" " value="<?= isset($data['no_telp']) ? htmlspecialchars($data['no_telp']) : ''; ?>"
            required
          />
          <label for="no-telp">No Handphone</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="provinsi"
            name="provinsi"
            placeholder=" " value="<?= isset($data['provinsi']) ? htmlspecialchars($data['provinsi']) : ''; ?>"
            required
          />
          <label for="provinsi">Provinsi</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            id="kabupaten"
            name="kabupaten"
            placeholder=" " value="<?= isset($data['kabupaten']) ? htmlspecialchars($data['kabupaten']) : ''; ?>"
            required
          />
          <label for="kabupaten">Kabupaten/Kota</label>
        </div>
        <div class="input-grup">
          <input
            type="text"
            name="kecamatan"
            placeholder=" "
            id="kecamatan" value="<?= isset($data['kecamatan']) ? htmlspecialchars($data['kecamatan']) : ''; ?>"
            required
          />
          <label for="kecamatan">Kecamatan</label>
        </div>
        <div class="input-grup">
          <input type="text" name="desa" placeholder=" " id="desa" value="<?= isset($data['desa']) ? htmlspecialchars($data['desa']) : ''; ?>"
           required />
          <label for="desa">Desa</label>
        </div>
        <div class="input-grup">
          <textarea
            name="alamat"
            placeholder=" "
            id="alamat"
            rows="5"
            cols="5"
            required><?= isset($data['alamat']) ? htmlspecialchars($data['alamat']) : '';?>
          </textarea>
          <label for="alamat">Alamat Lengkap</label>
        </div>
        <button type="submit" class="daftar" name="edit">Ubah Data Diri</button>
      </form>
    </div>
  </body>
</html>
