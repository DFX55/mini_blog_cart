<?php
session_start();
require 'db.php';

$posts = $pdo->query("SELECT posts.*, users.name FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <a href="index.php" class="btn btn-outline-primary mb-3">← Back to Menu</a>
  <h2>All Blog Posts</h2>
  <?php foreach ($posts as $post): ?>
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><?= $post['title'] ?></h4>
        <h6 class="card-subtitle mb-2 text-muted">By <?= $post['name'] ?> on <?= $post['created_at'] ?></h6>
        <p class="card-text"><?= $post['content'] ?></p>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
          <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete_post.php?id=<?= $post['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>
