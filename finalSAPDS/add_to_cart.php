<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'sapds');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch product info
    $query = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $query->bind_param("i", $product_id);
    $query->execute();
    $result = $query->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        die('Product not found.');
    }

    // If cart not set, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If product already in cart, increase quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        // Add new item to cart
        $_SESSION['cart'][$product_id] = [
            'id' => $product_id,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1,
            'image' => $product['image']
        ];
    }

    // Redirect back to dashboard or cart
    header('Location: customer_dashboard.php');
    exit();
} else {
    echo "Invalid request.";
}
?>
