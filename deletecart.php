<?php
session_start();

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['nama'] === $nama) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header("Location: cart.php");
exit;
?>
