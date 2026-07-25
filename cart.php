<?php
session_start();
require './includes/connection.php';

// حذف منتج من السلة
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
            font-family:Arial,sans-serif;
        }

        .container{
            max-width:900px;
            margin-top:40px;
        }

        table{
            background:#fff;
        }

        th{
            background:#343a40;
            color:#fff;
        }

        img{
            width:70px;
            height:70px;
            object-fit:cover;
        }
    </style>
</head>
<body>

<div class="container">

    <h2 class="mb-4">🛒 Shopping Cart</h2>

    <?php
    if(isset($_SESSION['message'])){
        echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }
    ?>

    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0): ?>

        <?php

        $ids = implode(",", array_keys($_SESSION['cart']));

        $sql = "SELECT * FROM products WHERE id1 IN ($ids)";
        $result = mysqli_query($conn,$sql);

        $products = [];

        while($row=mysqli_fetch_assoc($result)){
            $products[$row['id1']] = $row;
        }

        ?>

        <table class="table table-bordered align-middle">

            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            foreach($_SESSION['cart'] as $id=>$qty){

                if(isset($products[$id])){

                    $product = $products[$id];

                    $subtotal = $product['price'] * $qty;

                    $total += $subtotal;
            ?>

                <tr>

                    <td>
                        <img src="images/<?php echo $product['image']; ?>">
                    </td>

                    <td>
                        <?php echo $product['name']; ?>
                    </td>

                    <td>
                        $<?php echo number_format($product['price'],2); ?>
                    </td>

                    <td>
                        <?php echo $qty; ?>
                    </td>

                    <td>
                        $<?php echo number_format($subtotal,2); ?>
                    </td>

                    <td>
                        <a href="cart.php?remove=<?php echo $id; ?>" class="btn btn-danger btn-sm">
                            Remove
                        </a>
                    </td>

                </tr>

            <?php
                }
            }
            ?>

            </tbody>

        </table>

        <h3 class="text-end">
            Total: $<?php echo number_format($total,2); ?>
        </h3>

        <a href="checkout.php" class="btn btn-success w-100 mt-3">
            Checkout
        </a>

    <?php else: ?>

        <div class="alert alert-warning">
            Your cart is empty.
        </div>

    <?php endif; ?>

    <a href="products.php" class="btn btn-secondary mt-3">
        ← Continue Shopping
    </a>

</div>

</body>
</html>
