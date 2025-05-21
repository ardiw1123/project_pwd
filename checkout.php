<!-- ?php 
// include "connect.php";
// session_start();
// if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
//     header('location:login.php');
//     exit();
// }

// if (empty($_SESSION["cart"])) {
//     echo "<script>alert('Keranjang kamu kosong, gak bisa checkout nih!');</script>";
//     echo "<script>location='cart.php';</script>";
//     exit;
// }

//data konsumen, nanti tampilannya liat yg datacust
// $id = $_SESSION['user_id'];
// $sql = "SELECT * FROM users WHERE id = '$id'";
// $result = mysqli_query($connect, $sql);
// $data = mysqli_fetch_assoc($result)

// $id_product = $_SESSION['cart'];
// $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
// $result = mysqli_query($connect, $sql);
// $data = mysqli_fetch_assoc($result)

//data produk
// $nama = $_POST['nama'];
// $harga = $_POST['harga'];
// $jumlah = $_POST['jumlah'];

// Format item baru
// $itemBaru = [
//     'nama' => $nama,
//     'harga' => $harga,
//     'jumlah' => $jumlah
// ];

//  $id_user = $_SESSION['is_login']['user_id'];
//$total = 0;

// foreach ($_SESSION["cart"] as $id_product => $jumlah) {
//     $query = mysqli_query($connect, "SELECT * FROM product WHERE id_product='$id_product'");
//     $data = mysqli_fetch_assoc($query);
//     $subtotal = $data["harga"] * $jumlah;
//     $total += $subtotal;
// }

// mysqli_query($connect, "INSERT INTO pembelian (id_user, tglbeli, total_pembelian)
//     VALUES ('$id_user', '$tglbeli', '$total')");

// $id_beli = mysqli_insert_id($connect);

// foreach ($_SESSION["cart"] as $id_product => $jumlah) {
//     $query = mysqli_query($connect, "SELECT * FROM product WHERE id_product='$id_product'");
//     $data = mysqli_fetch_assoc($query);
//     $harga = $data["harga"];
//     $subtotal = $harga * $jumlah;

//     mysqli_query($connect, "INSERT INTO pembelian_product (id_beli, id_product, harga, jumlah, subtotal)
//         VALUES ('$id_beli', '$id_product', '$harga', '$jumlah', '$subtotal')");
// }

// unset($_SESSION["cart"]);

// echo "<script>alert('Checkout sukses! Makasih udah belanja 😍');</script>";
// echo "<script>location='invoice.php?id=$id_pembelian_baru';</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" class="data-customer">
            <tr>
                <td><strong>Email</strong></td>
                <td><$data['email'];?></td>
            </tr>
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td><$data['nama_lengkap'];?></td>
            </tr>
            <tr>
                <td><strong>No Handphone</strong></td>
                <td><$data['no_telp'];?></td>
            </tr>
            <tr>
                <td><strong>Provinsi</strong></td>
                <td><$data['provinsi'];?></td>
            </tr>
            <tr>
                <td><strong>Kabupaten</strong></td>
                <td><$data['kabupaten'];?></td>
            </tr>
            <tr>
                <td><strong>Kecamatan</strong></td>
                <td><$data['kecamatan'];?></td>
            </tr>
            <tr>
                <td><strong>Desa</strong></td>
                <td><$data['desa'];?></td>
            </tr>
            <tr>
                <td><strong>Alamat Lengkap</strong></td>
                <td><$data['alamat'];?></td>
            </tr>
        </table>

</body>
</html> -->

<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['is_login'])) {
    echo "<script>
        alert('⚠️ Login dulu ya!');
        window.location.href = 'login.php';
    </script>";
    exit;
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>
        alert('Keranjang kosong beb!');
        window.location.href = 'cart.php';
    </script>";
    exit;
}

$user = $_SESSION['user_id'];
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>

<h2>Halaman Checkout</h2>

<h3>👤 Data Pembeli</h3>
<p><strong>Username:</strong> <?= htmlspecialchars($user) ?></p>

<h3>🛒 Barang yang Dibeli</h3>
<table>
    <tr>
        <th>ID Barang</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php
    $total = 0;
    // foreach ($cart as $item) {
    //     $id_prod = $item[0];
    //     $nama = $item[1];
    //     $harga = $item[2];
    //     $jumlah = $item[3];
    //     $subtotal = $harga * $jumlah;
    //     $total += $subtotal;
    if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $id = $item['id_product'];
        $nama = $item['nama'];
        $harga = $item['harga'];
        $jumlah = $item['jumlah'];
        $subtotal = $harga * $jumlah;
        $total += $subtotal;

    //     echo "
    //     <tr>
    //         <td>{$id_prod}</td>
    //         <td>{$nama}</td>
    //         <td>Rp " . number_format($harga, 0, ',', '.') . "</td>
    //         <td>{$jumlah}</td>
    //         <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
    //     </tr>";
    // }

    ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $nama ?></td>
            <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
            <td><?= $jumlah ?></td>
            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='5'>Keranjang masih kosong</td></tr>";
}

?>
<tr>
    <td colspan="4" align="right"><strong>Total</strong></td>
    <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
</tr>

<form action="proses_checkout.php" method="post">
    <input type="submit" value="Konfirmasi & Bayar" style="margin-top: 20px; padding: 10px;">
</form>


</body>
</html>
