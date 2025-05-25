<?php
session_start();
require 'db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <!-- Back to Menu Button -->
  <a href="index.php" class="btn btn-outline-primary mb-3">← Back to Menu</a>

  <h2>Products</h2>
  <?php foreach ($products as $product): ?>
    <div class="card mb-3" style="max-width: 600px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?= $product['image'] ?>" class="img-fluid rounded-start" alt="<?= $product['name'] ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text">LKR <?= $product['price'] ?></p>
            <a class="btn btn-success" href="add_to_cart.php?id=<?= $product['id'] ?>">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>