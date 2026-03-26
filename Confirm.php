<?php
session_start();
require './includes/connection.php'; // الاتصال بقاعدة البيانات

// 1. استقبال البيانات
 $name    = $_POST['name'];
 $email   = $_POST['email'];
 $phone   = $_POST['phone'];
 $address = $_POST['address'];

 $total = 0;
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_keys($_SESSION['cart']));
    
    $sql = "SELECT * FROM products WHERE id1 IN ($ids)";
    $result = mysqli_query($conn, $sql);
    
    while($product = mysqli_fetch_assoc($result)){
        $qty = $_SESSION['cart'][$product['id1']];
        $total += $product['price'] * $qty;
    }
}

// 3. تخزين الطلب في قاعدة البيانات
 $stmt = mysqli_prepare($conn, "INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, total_amount, status) VALUES (?, ?, ?, ?, ?, 'pending')");
mysqli_stmt_bind_param($stmt, "ssssd", $name, $email, $phone, $address, $total);
mysqli_stmt_execute($stmt);

// 4. تفريغ السلة
 $_SESSION['cart'] = [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f4; font-family: 'Segoe UI', Tahoma, sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .message-box { background: #fff; padding: 60px 40px; border-radius: 15px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); max-width: 500px; }
        .icon { font-size: 80px; color: #28a745; margin-bottom: 20px; }
        h1 { color: #333; margin-bottom: 15px; }
        p { color: #666; margin-bottom: 30px; }
    </style>
</head>
<body>

<div class="message-box">
    <div class="icon">✓</div>
    <h1>Thank You!</h1>
    <p>
        Dear <strong><?= htmlspecialchars($name) ?></strong>, <br>
        Your order has been placed successfully. <br>
        We will contact you soon.
    </p>
    <a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
</div>

</body>
</html>