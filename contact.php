<?php
$activePage = 'contact';
$message = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Clothes Store</title>
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
    .contact-wrap{
      background:#fff;
      border-radius:24px;
      box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
      overflow:hidden;
    }
    .contact-side{
      background: linear-gradient(135deg, #111827, #1f2937);
      color:#fff;
      padding:40px;
      height:100%;
    }
    .contact-side h3{
      font-weight:800;
    }
    .contact-item{
      display:flex;
      gap:12px;
      align-items:flex-start;
      margin-bottom:18px;
    }
    .contact-icon{
      width:42px;
      height:42px;
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      background: rgba(255,255,255,.12);
      flex-shrink:0;
      font-weight:700;
    }
    .form-control{
      border-radius:14px;
      padding:12px 14px;
      border:1px solid #dbe2ea;
    }
    .form-control:focus{
      box-shadow:none;
      border-color:#9ca3af;
    }
    .btn-main{
      background:#ff6b6b;
      border:none;
      color:#fff;
      font-weight:700;
      border-radius:12px;
      padding:12px 18px;
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

  <div class="text-center mb-4">
    <h1 class="fw-bold">Contact Us</h1>
    <p class="text-muted">Send us a message and we will reply as soon as possible.</p>
  </div>

  <div class="row g-0 contact-wrap">
    <div class="col-lg-5 contact-side">
      <h3 class="mb-4">Get in touch</h3>

      <div class="contact-item">
        <div class="contact-icon">E</div>
        <div>
          <h6 class="mb-1">Email</h6>
          <p class="mb-0 text-white-50">support@clothestore.com</p>
        </div>
      </div>

      <div class="contact-item">
        <div class="contact-icon">P</div>
        <div>
          <h6 class="mb-1">Phone</h6>
          <p class="mb-0 text-white-50">+20 100 000 0000</p>
        </div>
      </div>

      <div class="contact-item">
        <div class="contact-icon">A</div>
        <div>
          <h6 class="mb-1">Address</h6>
          <p class="mb-0 text-white-50">Egypt</p>
        </div>
      </div>

      <p class="mt-4 mb-0 text-white-50">
        We love hearing from you. Feel free to ask about products, orders, or any project idea.
      </p>
    </div>

    <div class="col-lg-7 p-4 p-md-5">
      <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $name = trim($_POST['name']);
          $email = trim($_POST['email']);
          $subject = trim($_POST['subject']);
          $message = trim($_POST['message']);

          if($name != "" && $email != "" && $subject != "" && $message != ""){
              $message = "<div class='alert alert-success'>Your message has been sent successfully.</div>";
          } else {
              $message = "<div class='alert alert-danger'>Please fill in all fields.</div>";
          }
          echo $message;
      }
      ?>

      <form method="POST">
        <div class="row g-3">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="col-12">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
          <div class="col-12">
            <textarea name="message" rows="6" class="form-control" placeholder="Your Message" required></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-main w-100">Send Message</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</main>

<?php include "./includes/footer.php"; ?>


</body>
</html>