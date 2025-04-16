<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'farmer') {
  echo "<script>alert('Unauthorized access! Please login.'); window.location='farmer_login.php';</script>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('images/bg-farm.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .dashboard-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      margin-top: 100px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 dashboard-box text-center">
        <h2 class="text-success mb-4">Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <p>You are logged in as a <strong>Farmer</strong>.</p>
        <p>Use this dashboard to manage your produce, view orders, and more.</p>
        <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
      </div>
    </div>
  </div>
</body>
</html>
<hr>
<div class="card shadow-sm border-0 my-5">
  <div class="card-body">
    <h4 class="mb-4 text-success">Add a New Product</h4>
    <form method="POST" enctype="multipart/form-data" action="upload_product.php" class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Price (₹/kg)</label>
        <input type="text" class="form-control" name="price" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Quantity</label>
        <input type="text" class="form-control" name="quantity" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Product Image</label>
        <input type="file" class="form-control" name="image" accept="image/*" required>
      </div>
      <div class="col-12 text-end">
        <button type="submit" class="btn btn-success">Add Product</button>
      </div>
    </form>
  </div>
</div>

<hr>
<h4 class="mt-5">Your Products</h4>
<div class="row g-4">
<?php
include 'connect.php';
$email = $_SESSION['email'];

$query = $conn->prepare("SELECT * FROM products WHERE farmer_email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
  echo '
  <div class="col-md-4">
    <div class="card shadow-sm border-0 h-100">
      <img src="'.$row['image'].'" class="card-img-top" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title">'.$row['name'].'</h5>
        <p class="card-text"><strong>Price:</strong> ₹'.$row['price'].' /kg</p>
        <p class="text-muted">Available: '.$row['quantity'].'</p>
        <form action="delete_product.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this product?\')">
          <input type="hidden" name="product_id" value="'.$row['id'].'">
          <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
        </form>
      </div>
    </div>
  </div>';
}
?>


