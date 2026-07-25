<?php
session_start();
require './includes/connection.php';

$product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

if ($product_id > 0) {

    $sql = "SELECT * FROM products WHERE id1 = $product_id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $qty;
        } else {
            $_SESSION['cart'][$product_id] = $qty;
        }

        $_SESSION['message'] = "Product added successfully!";
    } else {
        $_SESSION['message'] = "Product not found!";
    }
}

header("Location: cart.php");
exit;
