<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - RentSriLanka</title>

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
    <div class="container" style="max-width: 1040px;">

      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">My Profile</li>
        </ol>
      </nav>

      <div class="row g-4">

        <!-- LEFT: PROFILE SUMMARY CARD -->
        <div class="col-lg-4">
          <div class="card border-0 shadow-soft rounded-4 p-4 text-center sticky-top" style="top: 90px;">
            <div class="bg-navy text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-2 mx-auto mb-3" style="width: 88px; height: 88px;">KP</div>
            <h5 class="fw-bold text-navy mb-0">Kasun Perera</h5>
            <span class="small text-muted d-block mb-2">Renter Account</span>
            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-3">
              <i class="bi bi-patch-check-fill me-1"></i>Verified Account
            </span>

            <ul class="list-unstyled text-start small mb-3">
              <li class="d-flex align-items-center gap-2 mb-2 text-muted"><i class="bi bi-envelope text-primary-custom"></i> kasun.perera@example.lk</li>
              <li class="d-flex align-items-center gap-2 mb-2 text-muted"><i class="bi bi-telephone text-primary-custom"></i> +94 77 123 4567</li>
              <li class="d-flex align-items-center gap-2 mb-2 text-muted"><i class="bi bi-geo-alt text-primary-custom"></i> Kandy, Sri Lanka</li>
              <li class="d-flex align-items-center gap-2 text-muted"><i class="bi bi-calendar3 text-primary-custom"></i> Member since Jan 2026</li>
            </ul>

            <hr class="border-light-custom">

            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="fw-bold text-navy fs-5">3</div>
                <div class="fs-8 text-muted">Favorites</div>
              </div>
              <div class="col-4">
                <div class="fw-bold text-navy fs-5">2</div>
                <div class="fs-8 text-muted">Messages</div>
              </div>
              <div class="col-4">
                <div class="fw-bold text-navy fs-5">5</div>
                <div class="fs-8 text-muted">Viewings</div>
              </div>
            </div>

            <hr class="border-light-custom">

            <a href="settings.php" class="btn btn-outline-secondary btn-sm w-100 fw-medium">
              <i class="bi bi-gear me-1"></i>Account Settings
            </a>
          </div>
        </div>

        <!-- RIGHT: EDIT PROFILE FORMS -->
        <div class="col-lg-8">

          <!-- Personal Information -->
          <div class="card border-0 shadow-soft rounded-4 p-4 mb-4">
            <h5 class="fw-bold text-navy mb-1"><i class="bi bi-person-vcard text-primary-custom me-2"></i>Personal Information</h5>
            <p class="text-muted small mb-4">Keep your details up to date so owners can reach you easily.</p>

            <div class="alert alert-success border-0 rounded-3 small d-none" id="profileSavedAlert">
              <i class="bi bi-check-circle-fill me-2"></i>Your profile has been updated.
            </div>

            <form id="profileForm">
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="profFullName" class="form-label small fw-semibold text-navy">Full Name</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="profFullName" value="Kasun Perera">
                </div>
                <div class="col-md-6">
                  <label for="profEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                  <input type="email" class="form-control border-light-custom shadow-none" id="profEmail" value="kasun.perera@example.lk">
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="profPhone" class="form-label small fw-semibold text-navy">Phone Number</label>
                  <input type="tel" class="form-control border-light-custom shadow-none" id="profPhone" value="0771234567">
                </div>
                <div class="col-md-6">
                  <label for="profLocation" class="form-label small fw-semibold text-navy">City / District</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="profLocation" value="Kandy">
                </div>
              </div>
              <div class="mb-4">
                <label for="profBio" class="form-label small fw-semibold text-navy">About Me</label>
                <textarea class="form-control border-light-custom shadow-none" id="profBio" rows="3" placeholder="Tell owners a little about yourself...">Looking for a quiet 2-bedroom house or annex near Kandy town, ideally close to public transport.</textarea>
              </div>
              <button type="submit" class="btn btn-primary fw-medium px-4" id="btnSaveProfile">
                <span id="btnSaveProfileText">Save Changes</span>
                <span class="spinner-border spinner-border-sm ms-2 d-none" id="btnSaveProfileSpinner" role="status" aria-hidden="true"></span>
              </button>
            </form>
          </div>

          <!-- Saved Searches / Preferences -->
          <div class="card border-0 shadow-soft rounded-4 p-4">
            <h5 class="fw-bold text-navy mb-1"><i class="bi bi-sliders text-primary-custom me-2"></i>Rental Preferences</h5>
            <p class="text-muted small mb-4">Used to recommend properties that match what you're looking for.</p>

            <div class="row g-3">
              <div class="col-md-6">
                <label for="prefType" class="form-label small fw-semibold text-navy">Property Type</label>
                <select class="form-select border-light-custom shadow-none" id="prefType">
                  <option value="house" selected>House</option>
                  <option value="room">Boarding Room</option>
                  <option value="annex">Annex</option>
                  <option value="any">Any</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="prefBudget" class="form-label small fw-semibold text-navy">Monthly Budget (LKR)</label>
                <select class="form-select border-light-custom shadow-none" id="prefBudget">
                  <option value="10-30">Rs. 10,000 - 30,000</option>
                  <option value="30-70" selected>Rs. 30,000 - 70,000</option>
                  <option value="70-120">Rs. 70,000 - 120,000</option>
                </select>
              </div>
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
  <script src="assets/js/profile.js"></script>
</body>
</html>
