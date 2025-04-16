<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: url('images/bg-customer.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .form-wrapper {
      background: rgba(255, 255, 255, 0.9);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      margin-top: 60px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form-wrapper">
        <h2 class="text-primary text-center mb-4">Customer Registration</h2>
        <form method="POST" action="register.php">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required />
          </div>
          <button type="submit" name="customer_register" class="btn btn-primary w-100">Register</button>
          <a href="index.php" class="btn btn-link w-100 mt-3">← Back to Home</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
