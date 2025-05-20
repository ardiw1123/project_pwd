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
    <div class="customer">
        <h2>Data Kamu Ada Disini!</h2>
        <table border="1" class="data-customer">
            <tr>
                <td><strong>Email</strong></td>
                <td><?=$data['email'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td><?=$data['nama_lengkap'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>No Handphone</strong></td>
                <td><?=$data['no_telp'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Provinsi</strong></td>
                <td><?=$data['provinsi'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Kabupaten</strong></td>
                <td><?=$data['kabupaten'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Kecamatan</strong></td>
                <td><?=$data['kecamatan'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Desa</strong></td>
                <td><?=$data['desa'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
            <tr>
                <td><strong>Alamat Lengkap</strong></td>
                <td><?=$data['alamat'];?></td>
                <td><a href="ubah_data.php">Ubah Data</a></td>
            </tr>
        </table>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>