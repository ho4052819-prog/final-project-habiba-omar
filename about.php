<?php
$activePage = 'about';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Clothes Store</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar {
    background-color: #111827 !important; 
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
    body{
      background:#f8fafc;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .hero-about{
      background: linear-gradient(135deg, #111827, #1f2937);
      color:#fff;
      border-radius: 28px;
      padding: 70px 30px;
      box-shadow: 0 18px 45px rgba(0,0,0,.12);
    }
    .section-box{
      background:#fff;
      border-radius:22px;
      box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
      padding:28px;
      height:100%;
      transition:.3s;
    }
    .section-box:hover{
      transform: translateY(-6px);
      box-shadow: 0 18px 35px rgba(15, 23, 42, .14);
    }
    .about-badge{
      display:inline-block;
      background: rgba(255,255,255,.12);
      color:#fff;
      padding:8px 14px;
      border-radius:999px;
      font-size:.9rem;
      font-weight:600;
    }
    .stat{
      text-align:center;
      background:#fff;
      border-radius:20px;
      padding:24px;
      box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
    }
    .stat h3{
      font-weight:800;
      color:#111827;
    }
    .stat p{
      margin:0;
      color:#6b7280;
    }
    .btn-main{
      background:#ff6b6b;
      border:none;
      color:#fff;
      font-weight:700;
      border-radius:12px;
      padding:10px 18px;
    }
    .btn-main:hover{
      background:#ff4f4f;
      color:#fff;
    }
  </style>
</head>
<body>

<?php include "./includes/navbar.php"; ?>

<main class="container py-5">

  <div class="hero-about text-center mb-5">
    <span class="about-badge">About Clothes Store</span>
    <h1 class="display-5 fw-bold mt-4">We make fashion simple, stylish, and easy</h1>
    <p class="lead mt-3 mb-0" style="max-width:750px; margin:auto;">
      Clothes Store is a modern e-commerce project for trendy clothes, elegant looks, and a smooth shopping experience.
    </p>
  </div>

  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="section-box">
        <h4 class="fw-bold mb-3">Our Mission</h4>
        <p class="text-muted mb-0">
          To provide a beautiful online shopping experience with stylish products, easy cart handling, and clean design.
        </p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="section-box">
        <h4 class="fw-bold mb-3">Our Vision</h4>
        <p class="text-muted mb-0">
          To become a professional fashion store interface that looks real, responsive, and premium.
        </p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="section-box">
        <h4 class="fw-bold mb-3">Why Choose Us?</h4>
        <p class="text-muted mb-0">
          Because we combine Bootstrap design, clean PHP code, and a polished user experience in one project.
        </p>
      </div>
    </div>
  </div>

  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="stat">
        <h3>100%</h3>
        <p>Responsive Design</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat">
        <h3>Easy</h3>
        <p>Add / Remove Cart</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat">
        <h3>Clean</h3>
        <p>Final Project Style</p>
      </div>
    </div>
  </div>

  <div class="text-center">
    <a href="products.php" class="btn btn-main btn-lg me-2">Shop Products</a>
    <a href="contact.php" class="btn btn-outline-dark btn-lg">Contact Us</a>
  </div>

</main>

<?php include "./includes/footer.php"; ?>


</body>
</html>