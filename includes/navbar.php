
<?php
if (!isset($activePage)) {
    $activePage = '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand fs-4" href="index.php">Clothes Store</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item">
          <a class="nav-link <?php echo $activePage == 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $activePage == 'products' ? 'active' : ''; ?>" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $activePage == 'cart' ? 'active' : ''; ?>" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $activePage == 'about' ? 'active' : ''; ?>" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $activePage == 'contact' ? 'active' : ''; ?>" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>