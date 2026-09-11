<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - RentSriLanka</title>
  
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

  <?php $activePage = ''; $prefix = ''; include 'components/navbar.php'; ?>

  <!-- SPLIT SCREEN LOGIN MAIN CONTENT -->
  <main class="py-4 py-lg-5">
    <div class="container">
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
        <div class="row g-0">
          
          <!-- LEFT SIDE: SRI LANKAN HOME IMAGE & BRAND OVERLAY -->
          <div class="col-lg-6 d-none d-lg-block position-relative auth-split-bg">
            <div class="auth-overlay position-absolute inset-0 d-flex flex-column justify-content-between p-5 text-white">
              <div>
                <a class="navbar-brand fw-bold fs-3 text-white" href="index.php">
                  <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span class="text-success">SriLanka</span>
                </a>
              </div>
              <div class="my-auto py-5">
                <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill small mb-3 border border-white border-opacity-25">
                  <i class="bi bi-shield-check me-1"></i> Verified Rental Marketplace
                </span>
                <h1 class="display-6 fw-bold text-white mb-3">Find a place you'll love to call home.</h1>
                <p class="lead opacity-90 fs-6">Access thousands of verified Houses, Boarding Rooms, and Annexes across Sri Lanka directly from trusted owners.</p>
              </div>
              <div class="pt-3 border-top border-white border-opacity-25 small opacity-75">
                &copy; 2026 RentSriLanka. Dedicated property platform.
              </div>
            </div>
          </div>

          <!-- RIGHT SIDE: LOGIN FORM CARD -->
          <div class="col-lg-6 p-4 p-sm-5 d-flex flex-column justify-content-center">
            <div class="auth-form-container mx-auto w-100" style="max-width: 420px;">
              
              <div class="mb-4 text-center text-lg-start">
                <h2 class="h3 fw-bold text-navy mb-1">Welcome Back</h2>
                <p class="text-muted small">Please enter your details to sign in to your account.</p>
              </div>

              <!-- DEMO SUCCESS/ERROR ALERT -->
              <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 small d-none" id="loginErrorAlert" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <span id="loginErrorText">Invalid email or password. Please try again.</span>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <!-- LOGIN FORM -->
              <form id="loginForm" class="needs-validation" novalidate>
                
                <!-- Email Field -->
                <div class="mb-3">
                  <label for="loginEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 border-light-custom shadow-none" id="loginEmail" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                      Please enter a valid email address.
                    </div>
                  </div>
                </div>

                <!-- Password Field with Show/Hide Toggle -->
                <div class="mb-3">
                  <label for="loginPassword" class="form-label small fw-semibold text-navy">Password</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control border-start-0 border-end-0 border-light-custom shadow-none" id="loginPassword" placeholder="Enter your password" required>
                    <button class="btn btn-outline-secondary border-start-0 border-light-custom text-muted" type="button" id="btnTogglePassword" aria-label="Toggle password visibility">
                      <i class="bi bi-eye" id="passwordToggleIcon"></i>
                    </button>
                    <div class="invalid-feedback">
                      Password is required.
                    </div>
                  </div>
                </div>

                <!-- Remember Me & Forgot Password Options -->
                <div class="d-flex justify-content-between align-items-center mb-4 small">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-muted" for="rememberMe">
                      Remember me
                    </label>
                  </div>
                  <a href="#" class="text-primary-custom text-decoration-none fw-medium" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2-5 mb-3" id="btnLoginSubmit">
                  <span id="btnSubmitText">Log In</span>
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSubmitSpinner" role="status" aria-hidden="true"></span>
                </button>

                <!-- OR Divider -->
                <div class="position-relative text-center my-4">
                  <hr class="border-light-custom">
                  <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 small text-muted">OR</span>
                </div>

                <!-- Continue with Google Button -->
                <button type="button" class="btn btn-outline-secondary border-light-custom w-100 fw-medium py-2 d-flex align-items-center justify-content-center gap-2 mb-4 text-navy">
                  <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.259h2.908c1.702-1.567 2.684-3.874 2.684-6.617z" fill="#4285F4"/>
                    <path d="M9 18c2.43 0 4.467-.806 5.956-2.18l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 009 18z" fill="#34A853"/>
                    <path d="M3.964 10.71A5.41 5.41 0 013.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 000 9c0 1.452.348 2.827.957 4.042l3.007-2.332z" fill="#FBBC05"/>
                    <path d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 00.957 4.958L3.964 7.29C4.672 5.163 6.656 3.58 9 3.58z" fill="#EA4335"/>
                  </svg>
                  <span>Continue with Google</span>
                </button>

                <!-- Footer Create Account Link -->
                <div class="text-center small">
                  <span class="text-muted">Don't have an account?</span>
                  <a href="register.php" class="text-primary-custom text-decoration-none fw-semibold ms-1">Create Account</a>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- FORGOT PASSWORD MODAL -->
  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="forgotPasswordModalLabel"><i class="bi bi-key me-2 text-primary-custom"></i>Reset Password</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <p class="small text-muted mb-3">Enter the email address associated with your account and we'll send you instructions to reset your password.</p>
          <form id="forgotPasswordForm">
            <div class="mb-3">
              <label for="resetEmail" class="form-label small fw-semibold text-navy">Email Address</label>
              <input type="email" class="form-control border-light-custom shadow-none" id="resetEmail" placeholder="name@example.com" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-medium py-2">Send Reset Link</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/validation.js"></script>
</body>
</html>