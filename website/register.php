<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account - RentSriLanka</title>
  
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

  <!-- SPLIT SCREEN REGISTER MAIN CONTENT -->
  <main class="py-4 py-lg-5">
    <div class="container">
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
        <div class="row g-0">
          
          <!-- LEFT SIDE: SRI LANKAN HOME IMAGE & BRAND OVERLAY -->
          <div class="col-lg-5 d-none d-lg-block position-relative auth-split-bg">
            <div class="auth-overlay position-absolute inset-0 d-flex flex-column justify-content-between p-5 text-white">
              <div>
                <a class="navbar-brand fw-bold fs-3 text-white" href="index.php">
                  <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span class="text-success">SriLanka</span>
                </a>
              </div>
              <div class="my-auto py-5">
                <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill small mb-3 border border-white border-opacity-25">
                  <i class="bi bi-person-check me-1"></i> Join Sri Lanka's #1 Rental Network
                </span>
                <h1 class="display-6 fw-bold text-white mb-3">Start your seamless rental journey today.</h1>
                <p class="lead opacity-90 fs-6">Connect directly with landlords, save your favorite listings, receive instant alerts, and manage property listings with confidence.</p>
              </div>
              <div class="pt-3 border-top border-white border-opacity-25 small opacity-75">
                &copy; 2026 RentSriLanka. All rights reserved.
              </div>
            </div>
          </div>

          <!-- RIGHT SIDE: REGISTER FORM CARD -->
          <div class="col-lg-7 p-4 p-sm-5 d-flex flex-column justify-content-center">
            <div class="auth-form-container mx-auto w-100" style="max-width: 520px;">
              
              <div class="mb-4 text-center text-lg-start">
                <h2 class="h3 fw-bold text-navy mb-1">Create an Account</h2>
                <p class="text-muted small">Choose your account type and fill in your details to get started.</p>
              </div>

              <!-- DEMO SUCCESS STATE ALERT (SHOWS AFTER SUBMISSION) -->
              <div class="alert alert-success border-0 shadow-sm rounded-3 p-4 d-none mb-4" id="registerSuccessAlert" role="alert">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                    <i class="bi bi-check-lg fs-3"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-1">Account Created Successfully!</h5>
                    <p class="small mb-2" id="registerSuccessText">Welcome to RentSriLanka! Your registration is complete.</p>
                    <a href="profile.php" id="registerSuccessBtn" class="btn btn-sm btn-success fw-medium rounded-pill px-3">Go to My Profile</a>
                  </div>
                </div>
              </div>

              <!-- REGISTER FORM -->
              <form id="registerForm" class="needs-validation" novalidate>
                
                <!-- Account Type Selection Cards -->
                <div class="mb-4">
                  <label class="form-label small fw-semibold text-navy d-block mb-2">Select Account Type</label>
                  <div class="row g-2">
                    <div class="col-6">
                      <div class="account-type-card card border-2 border-primary p-3 rounded-3 cursor-pointer text-center active" id="cardRenter">
                        <input class="form-check-input d-none" type="radio" name="accountType" id="typeRenter" value="renter" checked>
                        <i class="bi bi-search text-primary-custom fs-3 mb-1 d-block"></i>
                        <span class="fw-semibold text-navy small d-block mb-1">Looking for Property</span>
                        <span class="fs-8 text-muted d-block lh-sm">I want to rent a House, Room, or Annex</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="account-type-card card border border-light-custom p-3 rounded-3 cursor-pointer text-center" id="cardOwner">
                        <input class="form-check-input d-none" type="radio" name="accountType" id="typeOwner" value="owner">
                        <i class="bi bi-house-add text-teal fs-3 mb-1 d-block"></i>
                        <span class="fw-semibold text-navy small d-block mb-1">Want to List Property</span>
                        <span class="fs-8 text-muted d-block lh-sm">I am a Landlord or Property Manager</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Full Name Field -->
                <div class="mb-3">
                  <label for="regFullName" class="form-label small fw-semibold text-navy">Full Name</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control border-start-0 border-light-custom shadow-none" id="regFullName" placeholder="e.g. Kasun Kalhara" required>
                    <div class="invalid-feedback">
                      Please enter your full name.
                    </div>
                  </div>
                </div>

                <!-- Email & Phone Number Grid -->
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label for="regEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-envelope"></i></span>
                      <input type="email" class="form-control border-start-0 border-light-custom shadow-none" id="regEmail" placeholder="name@example.com" required>
                      <div class="invalid-feedback">
                        Valid email is required.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="regPhone" class="form-label small fw-semibold text-navy">Phone (Sri Lanka)</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-telephone"></i></span>
                      <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="regPhone" placeholder="0771234567" pattern="^(?:0|94|\+94)?(7[01245678]\d{7})$" required>
                      <div class="invalid-feedback" id="phoneFeedback">
                        Format: 0771234567 or +94771234567.
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Password Field -->
                <div class="mb-2">
                  <label for="regPassword" class="form-label small fw-semibold text-navy">Password</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control border-start-0 border-end-0 border-light-custom shadow-none" id="regPassword" placeholder="Minimum 8 characters" minlength="8" required>
                    <button class="btn btn-outline-secondary border-start-0 border-light-custom text-muted" type="button" id="btnToggleRegPassword" aria-label="Toggle password visibility">
                      <i class="bi bi-eye" id="regPasswordToggleIcon"></i>
                    </button>
                    <div class="invalid-feedback">
                      Password must be at least 8 characters long.
                    </div>
                  </div>
                </div>

                <!-- Password Strength Meter -->
                <div class="mb-3">
                  <div class="progress mt-1 mb-1" style="height: 4px;">
                    <div class="progress-bar bg-danger" id="passwordStrengthBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-8 text-muted" id="passwordStrengthText">Password strength: Too weak</span>
                    <span class="fs-8 text-muted">Caps, numbers &amp; symbols recommended</span>
                  </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                  <label for="regConfirmPassword" class="form-label small fw-semibold text-navy">Confirm Password</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-shield-lock"></i></span>
                    <input type="password" class="form-control border-start-0 border-light-custom shadow-none" id="regConfirmPassword" placeholder="Re-enter password" required>
                    <div class="invalid-feedback" id="confirmPasswordFeedback">
                      Passwords do not match.
                    </div>
                  </div>
                </div>

                <!-- Terms and Conditions Checkbox -->
                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                  <label class="form-check-label small text-muted" for="agreeTerms">
                    I agree to the <a href="pages/terms.php" class="text-primary-custom text-decoration-none fw-medium" target="_blank">Terms &amp; Conditions</a> and <a href="pages/privacy.php" class="text-primary-custom text-decoration-none fw-medium" target="_blank">Privacy Policy</a>.
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2-5 mb-3" id="btnRegisterSubmit">
                  <span id="btnRegSubmitText">Create Account</span>
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="btnRegSubmitSpinner" role="status" aria-hidden="true"></span>
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

                <!-- Footer Already Have Account Link -->
                <div class="text-center small">
                  <span class="text-muted">Already have an account?</span>
                  <a href="login.php" class="text-primary-custom text-decoration-none fw-semibold ms-1">Login</a>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/validation.js"></script>
</body>
</html>