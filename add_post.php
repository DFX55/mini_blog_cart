<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $title, $content]);
    header("Location: blog.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <a href="index.php" class="btn btn-outline-primary mb-3">← Back to Menu</a>
  <h2>Create Blog Post</h2>
  <form method="post">
    <input class="form-control mb-2" name="title" placeholder="Title" required>
    <textarea class="form-control mb-2" name="content" placeholder="Content" rows="5" required></textarea>
    <button class="btn btn-primary" type="submit">Post</button>
  </form>
</div>
</body>
</html>