<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
  $product_id = $_POST['product_id'];
  $email = $_SESSION['email'];

  // Double check ownership before deleting
  $check = $conn->prepare("SELECT * FROM products WHERE id = ? AND farmer_email = ?");
  $check->bind_param("is", $product_id, $email);
  $check->execute();
  $result = $check->get_result();

  if ($result && $result->num_rows > 0) {
    $conn->query("DELETE FROM products WHERE id = $product_id");
    echo "<script>alert('Product deleted successfully!'); window.location='farmer_dashboard.php';</script>";
  } else {
    echo "<script>alert('You are not authorized to delete this product.'); window.location='farmer_dashboard.php';</script>";
  }
}
$conn->close();
?>
