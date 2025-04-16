<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('images/bg-customer.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .login-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      margin-top: 80px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 login-box">
        <h3 class="text-primary text-center mb-4">Customer Login</h3>
        <form method="POST" action="register.php">
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <button type="submit" name="customer_login" class="btn btn-primary w-100">Login</button>
          <a href="index.php" class="btn btn-link w-100 mt-3">← Back to Home</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
