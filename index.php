<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Welcome <?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?>!</h2>

  <div class="row g-3 mt-4">
    <?php if (!isset($_SESSION['user_id'])): ?>
      <div class="col-md-4"><a href="register.php" class="btn btn-primary w-100">Register</a></div>
      <div class="col-md-4"><a href="login.php" class="btn btn-success w-100">Login</a></div>
    <?php else: ?>
      <div class="col-md-4"><a href="add_post.php" class="btn btn-info w-100">📝 Create Blog Post</a></div>
      <div class="col-md-4"><a href="blog.php" class="btn btn-secondary w-100">📖 View Blog</a></div>
      <div class="col-md-4"><a href="products.php" class="btn btn-warning w-100">🛒 View Products</a></div>
      <div class="col-md-4"><a href="cart.php" class="btn btn-dark w-100">🛍️ View Cart</a></div>
      <div class="col-md-4"><a href="logout.php" class="btn btn-danger w-100">🚪 Logout</a></div>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
