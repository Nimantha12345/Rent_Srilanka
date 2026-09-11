<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Settings - RentSriLanka</title>

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

  <main class="py-4 py-lg-5 min-vh-75">
    <div class="container" style="max-width: 860px;">

      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item"><a href="profile.php" class="text-decoration-none text-muted">My Profile</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Settings</li>
        </ol>
      </nav>

      <div class="mb-4">
        <h2 class="h4 fw-bold text-navy mb-1">Account Settings</h2>
        <p class="text-muted small mb-0">Manage your login details, notifications, and privacy preferences.</p>
      </div>

      <div class="alert alert-success border-0 rounded-3 small d-none" id="settingsSavedAlert">
        <i class="bi bi-check-circle-fill me-2"></i>Your settings have been saved.
      </div>

      <!-- Login & Security -->
      <div class="card border-0 shadow-soft rounded-4 p-4 mb-4">
        <h5 class="fw-bold text-navy mb-1"><i class="bi bi-shield-lock text-primary-custom me-2"></i>Login &amp; Security</h5>
        <p class="text-muted small mb-4">Update the email address you sign in with and change your password.</p>

        <form id="securityForm">
          <div class="mb-3">
            <label for="setEmail" class="form-label small fw-semibold text-navy">Email Address</label>
            <input type="email" class="form-control border-light-custom shadow-none" id="setEmail" value="kasun.perera@example.lk">
          </div>

          <hr class="border-light-custom my-4">

          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <label for="setCurrentPassword" class="form-label small fw-semibold text-navy">Current Password</label>
              <input type="password" class="form-control border-light-custom shadow-none" id="setCurrentPassword" placeholder="••••••••">
            </div>
            <div class="col-md-4">
              <label for="setNewPassword" class="form-label small fw-semibold text-navy">New Password</label>
              <input type="password" class="form-control border-light-custom shadow-none" id="setNewPassword" placeholder="Minimum 8 characters" minlength="8">
            </div>
            <div class="col-md-4">
              <label for="setConfirmPassword" class="form-label small fw-semibold text-navy">Confirm New Password</label>
              <input type="password" class="form-control border-light-custom shadow-none" id="setConfirmPassword" placeholder="Re-enter password">
            </div>
          </div>

          <button type="submit" class="btn btn-primary fw-medium px-4" id="btnSaveSecurity">
            <span id="btnSaveSecurityText">Save Changes</span>
            <span class="spinner-border spinner-border-sm ms-2 d-none" id="btnSaveSecuritySpinner" role="status" aria-hidden="true"></span>
          </button>
        </form>
      </div>

      <!-- Notification Preferences -->
      <div class="card border-0 shadow-soft rounded-4 p-4 mb-4">
        <h5 class="fw-bold text-navy mb-1"><i class="bi bi-bell text-primary-custom me-2"></i>Notification Preferences</h5>
        <p class="text-muted small mb-4">Choose how RentSriLanka should keep you updated.</p>

        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light-custom">
          <div>
            <span class="fw-medium text-navy small d-block">New Messages</span>
            <span class="fs-8 text-muted">Get notified when an owner replies to you</span>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="notifMessages" checked>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light-custom">
          <div>
            <span class="fw-medium text-navy small d-block">New Listing Alerts</span>
            <span class="fs-8 text-muted">Properties matching your saved preferences</span>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="notifListings" checked>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light-custom">
          <div>
            <span class="fw-medium text-navy small d-block">Price Drop Alerts</span>
            <span class="fs-8 text-muted">When a favorited property lowers its rent</span>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="notifPriceDrop" checked>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center py-2">
          <div>
            <span class="fw-medium text-navy small d-block">SMS Alerts</span>
            <span class="fs-8 text-muted">Receive important updates via text message</span>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="notifSms">
          </div>
        </div>
      </div>

      <!-- Privacy -->
      <div class="card border-0 shadow-soft rounded-4 p-4 mb-4">
        <h5 class="fw-bold text-navy mb-1"><i class="bi bi-eye text-primary-custom me-2"></i>Privacy</h5>
        <p class="text-muted small mb-4">Control what property owners can see about you.</p>

        <div class="d-flex justify-content-between align-items-center py-2">
          <div>
            <span class="fw-medium text-navy small d-block">Show Phone Number to Owners</span>
            <span class="fs-8 text-muted">Owners can call or WhatsApp you directly</span>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="privacyPhone" checked>
          </div>
        </div>
      </div>

      <!-- Danger Zone -->
      <div class="card border-0 shadow-soft rounded-4 p-4 border-start border-4 border-danger">
        <h5 class="fw-bold text-danger mb-1"><i class="bi bi-exclamation-triangle me-2"></i>Danger Zone</h5>
        <p class="text-muted small mb-3">Deactivating your account will hide your profile and saved favorites. This action can be reversed by contacting support.</p>
        <button type="button" class="btn btn-outline-danger btn-sm fw-medium" data-bs-toggle="modal" data-bs-target="#deactivateModal">
          Deactivate My Account
        </button>
      </div>

    </div>
  </main>

  <!-- DEACTIVATE ACCOUNT MODAL -->
  <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="deactivateModalLabel">Deactivate Account?</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <p class="small text-muted mb-0">Are you sure you want to deactivate your RentSriLanka account? You will no longer receive messages or listing alerts.</p>
        </div>
        <div class="modal-footer border-top border-light-custom">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger fw-medium">Yes, Deactivate</button>
        </div>
      </div>
    </div>
  </div>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/settings.js"></script>
</body>
</html>
