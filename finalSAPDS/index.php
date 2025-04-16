<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Agricultural Produce Delivery System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">AgroDeliver</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#register">Register</a></li>
        </ul>
        <a href="farmer_login.php" class="btn btn-success btn-sm mx-2">Farmer Login</a>
        <a href="customer_login.php" class="btn btn-primary btn-sm">Customer Login</a>

      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero-section d-flex align-items-center text-white text-center" id="landingPage">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3" data-aos="fade-up">Connecting Farmers to Markets</h1>
      <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">Delivering Fresh Produce with Smart Logistics</p>
      <a href="#register" class="btn btn-success btn-lg" data-aos="zoom-in" data-aos-delay="400">Get Started</a>
    </div>
  </header>

  <!-- Features Section -->
  <section id="features" class="py-5 bg-light">
    <div class="container">
      <div class="row text-center mb-4">
        <div class="col">
          <h2 class="fw-bold" data-aos="fade-right">Why Choose Us?</h2>
          <p data-aos="fade-left">Empowering farmers and ensuring fresh deliveries to customers</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <h5 class="card-title">Smart Logistics</h5>
              <p class="card-text">Efficient delivery system connecting farms directly to doorsteps.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <h5 class="card-title">Farmer Empowerment</h5>
              <p class="card-text">Support farmers to reach markets faster and earn better profits.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <h5 class="card-title">Fresh Produce</h5>
              <p class="card-text">Assuring high quality, farm-fresh products delivered daily.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Section -->
  <section id="register" class="py-5">
    <div class="container">
      <div class="row text-center mb-4">
        <h2 class="fw-bold" data-aos="zoom-in">Join the Movement</h2>
        <p data-aos="zoom-in" data-aos-delay="100">Register now as a Farmer or Customer</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 text-center">
          <a href="farmer_form.php" class="btn btn-outline-success btn-lg mb-3 w-100" data-aos="fade-right">Register as Farmer</a>
        </div>
        <div class="col-md-4 text-center">
          <a href="customer_form.php" class="btn btn-outline-primary btn-lg mb-3 w-100" data-aos="fade-left">Register as Customer</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">&copy; 2025 Smart Agricultural Produce Delivery System</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  </div>
  <div id="cookieConsent" class="cookie-consent shadow-sm" style="display: none;">
  <p class="mb-0">
    We use cookies to ensure you get the best experience on our website.
    <a href="#">Learn more</a>
  </p>
  <button class="btn btn-success btn-sm ms-3" id="acceptCookies">Got it!</button>
</div>

<script>
  // Always show the cookie popup on every refresh for demo purposes
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("cookieConsent").style.display = "flex";

    document.getElementById("acceptCookies").addEventListener("click", function () {
      // Still sets the cookie, but popup will always reappear (for demo)
      document.cookie = "cookiesAccepted=true; path=/";
      document.getElementById("cookieConsent").style.display = "none";
    });
  });
</script>

</body>
</html>
