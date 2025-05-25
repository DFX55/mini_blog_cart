<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$product_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

//  Check if item already in cart
$stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->execute([$user_id, $product_id]);
$item = $stmt->fetch();

if ($item) {
    //  Already exists - update quantity
    $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id = ?");
    $stmt->execute([$item['id']]);
} else {
    //  Not in cart - insert new
    $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)");
    $stmt->execute([$user_id, $product_id]);
}

header('Location: products.php');
exit;
