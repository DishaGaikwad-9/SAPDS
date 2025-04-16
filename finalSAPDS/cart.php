<?php
session_start();

// Cart items stored in session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f6f8fa;
    }
    .cart-card {
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-bottom: 20px;
    }
    .cart-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
    .quantity-controls button {
      padding: 4px 10px;
    }
    .total-box {
      background: #fff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">🛒 Your Cart</h2>

    <?php if (empty($cart)) : ?>
      <div class="alert alert-info text-center">Your cart is empty.</div>
      <div class="text-center">
        <a href="customer_dashboard.php" class="btn btn-primary mt-3">← Back to Shop</a>
      </div>
    <?php else : ?>
      <?php foreach ($cart as $id => $item) : ?>
        <?php $item_total = $item['price'] * $item['quantity']; ?>
        <?php $total += $item_total; ?>

        <div class="row cart-card p-3 align-items-center">
          <div class="col-md-2">
          <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="img-fluid rounded" style="width: 70px; height: 70px; object-fit: cover;">
          </div>
          <div class="col-md-3">
            <h5><?php echo htmlspecialchars($item['name']); ?></h5>
            <p class="text-muted">₹<?php echo number_format($item['price'], 2); ?> /kg</p>
          </div>
          <div class="col-md-3 quantity-controls">
            <form method="post" action="update_cart.php" class="d-flex align-items-center gap-2">
              <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
              <button name="action" value="decrease" class="btn btn-outline-secondary">−</button>
              <span class="mx-2"><?php echo $item['quantity']; ?> kg</span>
              <button name="action" value="increase" class="btn btn-outline-secondary">+</button>
            </form>
          </div>
          <div class="col-md-2">
            ₹<?php echo number_format($item_total, 2); ?>
          </div>
          <div class="col-md-2 text-end">
            <form method="post" action="update_cart.php">
              <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
              <button name="action" value="delete" class="btn btn-danger">Remove</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="total-box mt-4 text-center">
        <h4>Total: ₹<?php echo number_format($total, 2); ?></h4>
        <a href="customer_dashboard.php" class="btn btn-outline-primary mt-3">← Continue Shopping</a>
        <a href="thankyou_feedback.php" class="btn btn-success mt-3">Proceed to Checkout</a>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
