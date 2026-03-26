<?php

include "./includes/connection.php";

if(isset($_POST['add']))
{

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/".$image);

    $sql = "INSERT INTO products(name,price,image,description)
            VALUES('$name','$price','$image','$description')";

    mysqli_query($conn,$sql);
    echo "Product Added";
header("location:products.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Product</title>

<link href="./css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Name" class="form-control mb-2">

<input type="text" name="price" placeholder="Price" class="form-control mb-2">

<input type="text" name="description" placeholder="Description" class="form-control mb-2">

<input type="file" name="image" class="form-control mb-2">

<button name="add" class="btn btn-primary">
Add Product
</button>

</form>

</div>

</body>
</html>