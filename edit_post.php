<?php
session_start();
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);
    header("Location: blog.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <a href="index.php" class="btn btn-outline-primary mb-3">← Back to Menu</a>
  <h2>Edit Post</h2>
  <form method="post">
    <input class="form-control mb-2" name="title" value="<?= $post['title'] ?>" required>
    <textarea class="form-control mb-2" name="content" rows="5" required><?= $post['content'] ?></textarea>
    <button class="btn btn-primary" type="submit">Save Changes</button>
    <a href="blog.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
