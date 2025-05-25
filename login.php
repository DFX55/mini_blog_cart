<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Login</h2>
  <form method="post">
    <input class="form-control mb-2" name="email" placeholder="Email" type="email" required>
    <input class="form-control mb-2" name="password" placeholder="Password" type="password" required>
    <button class="btn btn-success" type="submit">Login</button>
  </form>
</div>
</body>
</html>
<?php
session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid credentials.</div>";
    }
}
?>