<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - RentSriLanka Portal</title>
  
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
                  <i class="bi bi-shield-check me-1"></i> Official Portal Access
                </span>
                <h1 class="display-6 fw-bold text-white mb-3">Manage your properties and administrative tasks effortlessly.</h1>
                <p class="lead opacity-90 fs-6">Access your customized portal for property owners and system administrators across RentSriLanka network.</p>
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
                <p class="text-muted small">Select your portal type and sign in to your account.</p>
              </div>

              <!-- ROLE SELECTOR TABS -->
              <ul class="nav nav-pills nav-justified bg-light-custom p-1 border border-light-custom rounded-3 mb-4 small fw-semibold" id="roleTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active py-2 rounded-2" id="owner-tab" type="button"><i class="bi bi-person-badge me-1"></i>Property Owner</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link py-2 rounded-2 text-navy" id="admin-tab" type="button"><i class="bi bi-shield-lock me-1"></i>Administrator</button>
                </li>
              </ul>

              <!-- ERROR / SUCCESS ALERT -->
              <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 small d-none" id="loginErrorAlert" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <span id="loginErrorText">Invalid email or password. Please try again.</span>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <!-- LOGIN FORM -->
              <form id="loginForm" class="needs-validation" novalidate>
                
                <input type="hidden" id="loginRole" name="role" value="owner">

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
                    <input class="form-check-input shadow-none" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-muted" for="rememberMe">
                      Remember me
                    </label>
                  </div>
                  <a href="#" class="text-primary-custom text-decoration-none fw-medium" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2-5 mb-3" id="btnLoginSubmit">
                  <span id="btnSubmitText">Log In to Portal</span>
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSubmitSpinner" role="status" aria-hidden="true"></span>
                </button>

                <!-- Footer Create Account Link -->
                <div class="text-center small mt-4" id="ownerRegisterLink">
                  <span class="text-muted">Don't have an owner account?</span>
                  <a href="register.php" class="text-primary-custom text-decoration-none fw-semibold ms-1">Register Property Owner</a>
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

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/auth.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const ownerTab = document.getElementById('owner-tab');
      const adminTab = document.getElementById('admin-tab');
      const loginRoleInput = document.getElementById('loginRole');
      const ownerRegisterLink = document.getElementById('ownerRegisterLink');
      const btnTogglePassword = document.getElementById('btnTogglePassword');
      const loginPassword = document.getElementById('loginPassword');
      const passwordToggleIcon = document.getElementById('passwordToggleIcon');

      // Switch Role Tabs
      ownerTab.addEventListener('click', () => {
        ownerTab.classList.add('active');
        adminTab.classList.remove('active');
        loginRoleInput.value = 'owner';
        if (ownerRegisterLink) ownerRegisterLink.classList.remove('d-none');
      });

      adminTab.addEventListener('click', () => {
        adminTab.classList.add('active');
        ownerTab.classList.remove('active');
        loginRoleInput.value = 'admin';
        if (ownerRegisterLink) ownerRegisterLink.classList.add('d-none');
      });

      // Toggle Password Visibility
      if (btnTogglePassword && loginPassword) {
        btnTogglePassword.addEventListener('click', () => {
          const isPassword = loginPassword.type === 'password';
          loginPassword.type = isPassword ? 'text' : 'password';
          passwordToggleIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
      }
    });
  </script>
</body>
</html>