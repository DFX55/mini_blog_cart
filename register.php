<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Register</h2>
  <form method="post">
    <input class="form-control mb-2" name="name" placeholder="Name" required>
    <input class="form-control mb-2" name="email" placeholder="Email" type="email" required>
    <input class="form-control mb-2" name="password" placeholder="Password" type="password" required>
    <button class="btn btn-primary" type="submit">Register</button>
  </form>
</div>
</body>
</html>
<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password]);
    header("Location: login.php");
    exit;
}
?>