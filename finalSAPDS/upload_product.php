<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $farmer_email = $_SESSION['email'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  // Handle image upload
  $imageName = $_FILES['image']['name'];
  $imageTmp = $_FILES['image']['tmp_name'];
  $uploadPath = "uploads/" . basename($imageName);

  if (move_uploaded_file($imageTmp, $uploadPath)) {
    $stmt = $conn->prepare("INSERT INTO products (farmer_email, name, image, price, quantity) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $farmer_email, $name, $uploadPath, $price, $quantity);

    if ($stmt->execute()) {
      echo "<script>alert('Product added successfully!'); window.location='farmer_dashboard.php';</script>";
    } else {
      echo "<script>alert('Error saving product.'); window.location='farmer_dashboard.php';</script>";
    }

    $stmt->close();
  } else {
    echo "<script>alert('Image upload failed.'); window.location='farmer_dashboard.php';</script>";
  }
}
$conn->close();
?>
