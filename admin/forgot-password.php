<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - RentSriLanka</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="bg-light-custom">

  <!-- SPLIT SCREEN FORGOT PASSWORD MAIN CONTENT -->
  <main class="py-4 py-lg-5">
    <div class="container">
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
        <div class="row g-0">
          
          <!-- LEFT SIDE: BRAND OVERLAY -->
          <div class="col-lg-6 d-none d-lg-block position-relative auth-split-bg">
            <div class="auth-overlay position-absolute inset-0 d-flex flex-column justify-content-between p-5 text-white">
              <div>
                <a class="navbar-brand fw-bold fs-3 text-white" href="index.php">
                  <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span class="text-success">SriLanka</span>
                </a>
              </div>
              <div class="my-auto py-5">
                <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill small mb-3 border border-white border-opacity-25">
                  <i class="bi bi-shield-check me-1"></i> Account Security Desk
                </span>
                <h1 class="display-6 fw-bold text-white mb-3">Need to recover your portal access?</h1>
                <p class="lead opacity-90 fs-6">Enter your email and we'll dispatch a secure password reset link to regain control of your account.</p>
              </div>
              <div class="pt-3 border-top border-white border-opacity-25 small opacity-75">
                &copy; 2026 RentSriLanka. Dedicated property platform.
              </div>
            </div>
          </div>

          <!-- RIGHT SIDE: RESET PASSWORD FORM CARD -->
          <div class="col-lg-6 p-4 p-sm-5 d-flex flex-column justify-content-center">
            <div class="auth-form-container mx-auto w-100" style="max-width: 420px;">
              
              <div class="mb-4 text-center text-lg-start">
                <h2 class="h3 fw-bold text-navy mb-1">Reset Password</h2>
                <p class="text-muted small">Enter the email address associated with your account.</p>
              </div>

              <!-- RESET FORM -->
              <form id="standaloneForgotPasswordForm" class="needs-validation" novalidate>
                
                <!-- Email Field -->
                <div class="mb-4">
                  <label for="resetEmailInput" class="form-label small fw-semibold text-navy">Email Address</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 border-light-custom shadow-none" id="resetEmailInput" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                      Please enter a valid email address.
                    </div>
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2-5 mb-3">
                  <span>Send Reset Link</span>
                </button>

                <!-- Back to Login Link -->
                <div class="text-center small mt-3">
                  <a href="login.php" class="text-navy text-decoration-none fw-semibold">
                    <i class="bi bi-arrow-left me-1"></i>Back to Sign In
                  </a>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/auth.js"></script>
</body>
</html>