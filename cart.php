<?php
session_start();
require './includes/connection.php';
if (isset($_POST['add_to_cart'])) {
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

    if ($product_id > 0) {
        $check_sql = "SELECT id1 FROM products WHERE id1 = $product_id LIMIT 1";
        $check_res = mysqli_query($conn, $check_sql);
        
        if (mysqli_num_rows($check_res) > 0) {
            // المنتج موجود، نمسكه ونخزنه
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            
            // لو موجود قبل كده نزود الكمية
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $qty;
            } else {
                $_SESSION['cart'][$product_id] = $qty;
            }
            
            // رسالة نجاح
            $_SESSION['message'] = "Product added successfully!";
            
        } else {
            $_SESSION['message'] = "Error: Product not found in database!";
        }
    } else {
        $_SESSION['message'] = "Error: Invalid Product ID (ID is 0 or empty).";
    }
    
    // نعمل تحديث للصفحة عشان نمسح الـ POST
    header("Location: cart.php");
    exit;
}

// =================================================
// 2. معالجة الحذف (لما تدوس Remove)
// =================================================
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}
 $total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#f8f9fa; font-family: Arial;}
        .container{max-width: 800px; margin-top: 50px;}
        .table{background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        .table th{background:#333; color:#fff;}
        .table img{width: 60px; height: 60px; object-fit: cover;}
    </style>
</head>
<body>

<div class="container">
    <h2>🛒 Shopping Cart</h2>
    
    <!-- عرض رسالة النجاح أو الخطأ -->
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-info mt-3">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <?php if(!empty($_SESSION['cart'])): ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ids = implode(',', array_keys($_SESSION['cart']));
                $sql = "SELECT * FROM products WHERE id1 IN ($ids)";
                $res = mysqli_query($conn, $sql);
                $items = [];
                while($r = mysqli_fetch_assoc($res)){ $items[$r['id1']] = $r; }
                
                foreach($_SESSION['cart'] as $id => $qty):
                    if(isset($items[$id])):
                        $item = $items[$id];
                        $total += $item['price'] * $qty;
                ?>
                <tr>
                    <td><img src="images/<?php echo $item['image']; ?>"></td>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><a href="cart.php?remove=<?php echo $id; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>
                <?php endif; endforeach; ?>
            </tbody>
        </table>
        
        <h3 class="text-end">Total: $<?php echo number_format($total, 2); ?></h3>
        <a href="checkout.php" class="btn btn-success btn-lg w-100 mt-3">Checkout</a>
        
    <?php else: ?>
        <div class="alert alert-warning mt-4">Your cart is empty.</div>
    <?php endif; ?>
    
    <a href="index.php" class="btn btn-secondary mt-4">← Back to Shop</a>
</div>

</body>
</html>