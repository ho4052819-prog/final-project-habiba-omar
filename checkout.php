<?php 
session_start();
require './includes/connection.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f4; font-family: 'Segoe UI', Tahoma, sans-serif; }
        form { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 15px 25px rgba(0,0,0,0.2); margin-top: 50px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <form method="POST" action="./Confirm.php">
        <input type="text" name="name" placeholder="Name" class="form-control mb-3" required>
        
        <!-- أضفت خانة الإيميل عشان تتفق مع قاعدة البيانات -->
        <input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
        
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-3" required>
        <input type="text" name="address" placeholder="Address" class="form-control mb-3" required>
        
        <button class="btn btn-success w-100 btn-lg">Confirm Order</button>
    </form>
</div>

</body>
</html>