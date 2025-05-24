<?php
include "connect.php";
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {?>
    <script>
        alert('Kamu belum login! Silakan login dulu ya.')
        window.location.href = 'login.php'
    </script><?php
    exit();
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
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

    <div class="customer">
        <h2>Data Kamu Ada Disini!</h2>
        <table border="1" class="data-customer">
            <tr>
                <td><strong>Email</strong></td>
                <td><?=$data['email'];?></td>
            </tr>
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td><?=$data['nama_lengkap'];?></td>
            </tr>
            <tr>
                <td><strong>No Handphone</strong></td>
                <td><?=$data['no_telp'];?></td>
            </tr>
            <tr>
                <td><strong>Provinsi</strong></td>
                <td><?=$data['provinsi'];?></td>
            </tr>
            <tr>
                <td><strong>Kabupaten</strong></td>
                <td><?=$data['kabupaten'];?></td>
            </tr>
            <tr>
                <td><strong>Kecamatan</strong></td>
                <td><?=$data['kecamatan'];?></td>
            </tr>
            <tr>
                <td><strong>Desa</strong></td>
                <td><?=$data['desa'];?></td>
            </tr>
            <tr>
                <td><strong>Alamat Lengkap</strong></td>
                <td><?=$data['alamat'];?></td>
            </tr>
        </table>
        <button class="btn-e" onclick="window.location.href='logout.php'">Logout</button>
        <button class="btn-e" onclick="window.location.href='edit.php'">Edit</button>
    </div>

    <footer>
        <p>&copy; 2025 Clau Dy. All rights reserved.</p>
        <p>Follow us on Instagram @ClauDy</p>
        <div class="social-icons">
            <i data-feather="instagram"></i>
            <i data-feather="facebook"></i>
            <i data-feather="twitter"></i>
        </div>
    </footer>
    <script>feather.replace();</script>
</body>
</html>