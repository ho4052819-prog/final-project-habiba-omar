<?php
include "./includes/connection.php";

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM products WHERE id1 = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
} else {
    die("Product not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $row['name']; ?> - Clothes Store</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
        .product-img { max-width: 400px; width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
        .btn-success { background-color: #28a745; border: none; }
        .btn-success:hover { background-color: #1e7e34; }
        .btn-secondary { margin-left: 10px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="images/<?php echo $row['image']; ?>" class="product-img" alt="<?php echo $row['name']; ?>">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold"><?php echo $row['name']; ?></h2>
            <h4 class="text-success">$<?php echo $row['price']; ?></h4>
            <p><?php echo $row['description']; ?></p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['id1']; ?>">
                <input type="number" name="qty" value="1" min="1" class="form-control mb-3" style="max-width:120px;">
                <button class="btn btn-success btn-lg">Add To Cart</button>
                <a href="products.php" class="btn btn-secondary btn-lg">Back</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>