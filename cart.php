<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT cart.*, products.name, products.price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$items = $stmt->fetchAll();

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <!--  Back to Menu Button -->
  <a href="index.php" class="btn btn-outline-primary mb-3">← Back to Menu</a>

  <h2>Your Cart</h2>
  <?php foreach ($items as $item): 
    $sub = $item['price'] * $item['quantity'];
    $total += $sub;
  ?>
    <div class="card mb-3">
      <div class="card-body">
        <h5><?= $item['name'] ?></h5>
        <p>LKR <?= $item['price'] ?> x <?= $item['quantity'] ?> = LKR <?= $sub ?></p>
        <a class="btn btn-danger" href="remove_from_cart.php?id=<?= $item['id'] ?>">Remove</a>
      </div>
    </div>
  <?php endforeach; ?>
  <h4>Total: LKR <?= $total ?></h4>
</div>
</body>
</html>