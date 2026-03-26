<?php
$activePage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes Store</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "./includes/navbar.php"; ?>

<main>
  <div class="container py-5">
    <div class="hero-section text-center">
      <span class="badge-soft">New Collection 2026</span>
      <h1 class="display-5 mt-4">Fashion that fits your style</h1>
      <p class="lead">
        Discover premium clothes, elegant designs, and a smooth shopping experience in one place.
      </p>
      <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
        <a href="products.php" class="btn btn-main btn-lg">Shop Now</a>
        <a href="about.php" class="btn btn-outline-light btn-lg">About Us</a>
      </div>
    </div>

    <div class="row g-4 mt-5 text-center">
      <div class="col-md-4">
        <div class="section-box h-100">
          <h4 class="fw-bold">Quality Clothes</h4>
          <p class="mb-0">Modern looks with premium feel and stylish designs.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="section-box h-100">
          <h4 class="fw-bold">Easy Shopping</h4>
          <p class="mb-0">Add to cart, remove items, and checkout </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="section-box h-100">
          <h4 class="fw-bold">Responsive Design</h4>
          <p class="mb-0">Looks great on desktop, tablet, and mobile.</p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include "./includes/footer.php"; ?>

</body>
</html>