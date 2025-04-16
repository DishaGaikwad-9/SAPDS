<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'customer') {
    header("Location: customer_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Thank You & Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f2fdf6;
      font-family: 'Segoe UI', sans-serif;
    }
    .feedback-box {
      max-width: 600px;
      margin: auto;
      margin-top: 60px;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .star-rating input[type="radio"] {
      display: none;
    }
    .star-rating label {
      font-size: 2rem;
      color: #ccc;
      cursor: pointer;
    }
    .star-rating input[type="radio"]:checked ~ label {
      color: #f7c600;
    }
  </style>
</head>
<body>
  <div class="feedback-box">
    <h2 class="text-center text-success mb-4">Thank You for Your Purchase! 🛒</h2>
    <p class="text-center text-muted">We would love to hear about your experience.</p>

    <form method="POST" action="thankyou_feedback.php">
      <div class="mb-3 text-center star-rating">
        <input type="radio" name="rating" id="star5" value="5"><label for="star5">★</label>
        <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
        <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
        <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
        <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
      </div>

      <div class="mb-3">
        <textarea name="feedback" class="form-control" rows="4" placeholder="Leave a comment..."></textarea>
      </div>

      <div class="text-center">
        <button type="submit" name="submit_feedback" class="btn btn-success px-4">Submit Feedback</button>
      </div>
    </form>

    <div class="text-center mt-4">
      <a href="customer_dashboard.php" class="btn btn-outline-secondary">← Back to Dashboard</a>
    </div>
  </div>
</body>
</html>

<?php
if (isset($_POST['submit_feedback'])) {
    $rating = $_POST['rating'] ?? 'Not given';
    $feedback = htmlspecialchars($_POST['feedback'] ?? 'No comments');

    echo "
    <script>
      alert('Thank you for your feedback!\\nRating: $rating star(s)\\nComment: $feedback');
      window.location='customer_dashboard.php';
    </script>";
}
?>
