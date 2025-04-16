<?php
session_start();
include("connect.php");

// Redirect to login page if not logged in
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please login first!'); window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - SAPDS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <p style="font-size:50px; font-weight:bold;">
            Hello <?php echo $_SESSION['name']; ?> 
            (<?php echo ucfirst($_SESSION['role']); ?>)
        </p>
        <br>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
