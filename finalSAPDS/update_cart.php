<?php
session_start();

if (!isset($_POST['product_id']) || !isset($_POST['action'])) {
    header('Location: cart.php');
    exit;
}

$product_id = $_POST['product_id'];
$action = $_POST['action'];

// If cart is empty or item not found
if (!isset($_SESSION['cart'][$product_id])) {
    header('Location: cart.php');
    exit;
}

switch ($action) {
    case 'increase':
        $_SESSION['cart'][$product_id]['quantity'] += 1;
        break;

    case 'decrease':
        $_SESSION['cart'][$product_id]['quantity'] -= 1;
        // If quantity becomes 0, remove the item
        if ($_SESSION['cart'][$product_id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$product_id]);
        }
        break;

    case 'delete':
        unset($_SESSION['cart'][$product_id]);
        break;
}

header('Location: cart.php');
exit;
