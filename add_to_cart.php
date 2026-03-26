<?php
session_start();
require './includes/connection.php';

// 1. استقبال البيانات
 $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
 $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

// 2. التأكد من صحة البيانات والإضافة
if ($product_id > 0) {
    // نتأكد إن المنتج موجود في الداتا بيز فعلاً (using id1)
    $check_sql = "SELECT id1 FROM products WHERE id1 = $product_id";
    $result = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($result) > 0) {
        // لو المنتج موجود، نضيفه للسلة
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // لو موجود قبل كده نزود الكمية، لو لا نحطه جديد
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $qty;
        } else {
            $_SESSION['cart'][$product_id] = $qty;
        }
        
        // رسالة نجاح (اختياري)
        $_SESSION['success_msg'] = "Product added to cart!";
    }
}

// 3. الرجوع للصفحة اللي جاي منها (مثلاً index.php)
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>