<?php
include "./includes/connection.php";
include "./includes/navbar.php";
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - Clothes Store</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #ff6f61;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff3b2f;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #1e7e34;
        }
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
        h1, h2 {
            color: #343a40;
        }
    </style>
</head>
<body>


<!-- Page Title -->
<div class="container text-center mt-5 mb-4">
    <h1>Our Latest Products</h1>
    <p class="text-muted">Find the best fashion just for you!</p>
</div>

<!-- Products Grid -->
<div class="container">
    <div class="row">
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold"><?php echo $row['name']; ?></h5>
                    <p class="card-text text-muted"><?php echo substr($row['description'],0,80); ?>...</p>
                    <h6 class="mt-auto mb-2 fw-bold">$<?php echo $row['price']; ?></h6>
                    <div class="d-grid gap-2">
                       <a href="<?php echo 'product.php?id=' . $row['id1']; ?>" class="btn btn-success btn-sm">View Details</a>
 <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['id1']; ?>">
                
                <input type="number" name="qty" value="1" min="1" class="form-control mb-2" style="width:70px;">
                <button type="submit" name="add_to_cart" class="btn btn-secondary btn-sm w-100">Add to Cart</button>
            </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p class='text-center text-muted'>No products found</p>";
        }
        ?>
    </div>
</div>

</body>
</html>