<?php
session_start();

// ✅ Updated session check
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Unauthorized access!'); window.location='customer_login.php';</script>";
    exit();
}

include 'connect.php';

// ✅ Count items in cart
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .product-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }
    .product-card:hover {
      transform: scale(1.02);
    }
    .product-image {
      height: 200px;
      object-fit: cover;
    }
    .buy-btn {
      border: 1px solid #28a745;
      color: #28a745;
      font-weight: 500;
    }
    .buy-btn:hover {
      background-color: #28a745;
      color: white;
    }
  </style>
</head>
<body>

<!-- ✅ Cart icon top-right -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 999;">
  <a href="cart.php" class="btn btn-light border shadow-sm position-relative">
    <i class="fas fa-shopping-cart fa-lg"></i>
    <?php if ($cart_count > 0): ?>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?= $cart_count ?>
      </span>
    <?php endif; ?>
  </a>
</div>

<div class="container py-4">
  <h2 class="text-center mb-4">Welcome, <?= htmlspecialchars($_SESSION['name']) ?> 👋</h2>
  <!-- Search & Sort Form -->
  <form method="GET" class="row mb-4">
    <div class="col-md-6 mb-2">
    <input type="text" name="search" class="form-control" placeholder="Search for products..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    </div>
    <div class="col-md-4 mb-2">
      <select name="sort" class="form-select">
        <option value="">Sort By</option>
        <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') ? 'selected' : '' ?>>Price: Low to High</option>
        <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') ? 'selected' : '' ?>>Price: High to Low</option>
        <option value="name_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name_asc') ? 'selected' : '' ?>>Name: A-Z</option>
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <button type="submit" class="btn btn-success w-100">Apply</button>
    </div>
  </form>

  <h4 class="text-center text-muted mb-5">Available Farm Produce</h4>

  <div class="row g-4">
    <?php
    // Build dynamic query
    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

    $query = "SELECT * FROM products WHERE name LIKE '%$search%'";

    switch ($sort) {
      case 'price_asc':
        $query .= " ORDER BY price ASC";
      break;
      case 'price_desc':
        $query .= " ORDER BY price DESC";
      break;
      case 'name_asc':
        $query .= " ORDER BY name ASC";
      break;
      default:
        $query .= " ORDER BY created_at DESC";
    }
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
          <div class="col-md-3">
            <div class="card product-card">
              <img src="'.$row['image'].'" class="card-img-top product-image" alt="'.$row['name'].'">
              <div class="card-body text-center">
                <h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>
                <p class="card-text"><strong>₹' . $row['price'] . ' /kg</strong></p>
                <p class="text-muted">Available: ' . $row['quantity'] . '</p>
                <form action="add_to_cart.php" method="POST">
                  <input type="hidden" name="product_id" value="' . $row['id'] . '">
                  <button type="submit" class="btn buy-btn w-100">Buy</button>
                </form>
              </div>
            </div>
          </div>';
      }
    } else {
      echo "<p class='text-center text-muted'>No products available right now.</p>";
    }
    ?>
  </div>

  <div class="text-center mt-4">
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</div>

</body>
</html>
