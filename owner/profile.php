<?php $activePage = 'profile'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Profile &amp; Settings - RentSriLanka</title>
  
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

  <?php include 'components/navbar.php'; ?>

  <!-- DASHBOARD WRAPPER -->
  <div class="container-fluid px-lg-4 py-4">
    <div class="row g-4">
      
      <?php include 'components/sidebar.php'; ?>

      <!-- MAIN CONTENT AREA -->
      <main class="col-lg-9 col-xl-10">
        
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">Owner Profile &amp; Account</h1>
            <p class="text-muted mb-0">Manage your personal information, account verification, and security settings.</p>
          </div>
        </div>

        <!-- SECTION 1: STATISTICS SUMMARY CARDS -->
        <div class="row g-3 mb-4">
          <div class="col-12 col-sm-4">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Active Properties</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-houses-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">6</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-check-circle me-1"></i>3 Active listings</span>
            </div>
          </div>

          <div class="col-12 col-sm-4">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Listing Views</span>
                <div class="stat-icon-sm bg-info-subtle text-info-emphasis rounded-circle"><i class="bi bi-eye-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">1,932</h2>
              <span class="fs-8 text-muted">Across all property listings</span>
            </div>
          </div>

          <div class="col-12 col-sm-4">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Inquiries Received</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-chat-left-dots-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">38</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-arrow-up-short"></i>+5 new this week</span>
            </div>
          </div>
        </div>

        <div class="row g-4">
          
          <!-- LEFT COLUMN: PROFILE EDIT & VERIFICATION -->
          <div class="col-lg-8">
            
            <!-- SECTION 2: PROFILE DETAILS FORM -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
              <h2 class="h5 fw-bold text-navy mb-4 border-bottom border-light-custom pb-3">
                <i class="bi bi-person-lines-fill text-primary-custom me-2"></i>Profile Information
              </h2>

              <form id="ownerProfileForm" class="needs-validation" novalidate>
                
                <!-- PROFILE IMAGE UPLOAD -->
                <div class="d-flex align-items-center gap-4 mb-4 pb-2">
                  <div class="position-relative">
                    <img src="../assets/images/properties/room-1.jpg" id="profileAvatarPreview" class="rounded-circle object-fit-cover border border-2 border-primary-subtle" width="90" height="90" alt="Nimal Perera">
                    <button type="button" class="btn btn-primary btn-sm rounded-circle position-absolute bottom-0 end-0 p-1 lh-1 shadow-sm" id="btnUploadAvatar" title="Change Avatar">
                      <i class="bi bi-camera-fill fs-7"></i>
                    </button>
                    <input type="file" id="avatarFileInput" class="d-none" accept="image/*">
                  </div>
                  <div>
                    <h3 class="h6 fw-bold text-navy mb-1">Profile Photo</h3>
                    <p class="fs-8 text-muted mb-2">Upload a clear photo to build trust with potential renters. (JPG, PNG max 2MB)</p>
                    <button type="button" class="btn btn-light border btn-sm text-navy fw-medium fs-8" id="btnRemoveAvatar">Remove Photo</button>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="profileFullName" class="form-label small fw-semibold text-navy">Full Name</label>
                    <input type="text" class="form-control border-light-custom shadow-none" id="profileFullName" value="Nimal Perera" required>
                    <div class="invalid-feedback">Please enter your full name.</div>
                  </div>

                  <div class="col-md-6">
                    <label for="profileEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                    <div class="input-group">
                      <input type="email" class="form-control border-light-custom shadow-none" id="profileEmail" value="nimal.perera@example.lk" required>
                      <span class="input-group-text bg-success-subtle text-success border-light-custom fs-8 fw-semibold" title="Email Verified">
                        <i class="bi bi-check-circle-fill me-1"></i>Verified
                      </span>
                      <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="profilePhone" class="form-label small fw-semibold text-navy">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted">+94</span>
                      <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="profilePhone" value="771234567" required>
                      <div class="invalid-feedback">Please enter your phone number.</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="profileWhatsapp" class="form-label small fw-semibold text-navy">WhatsApp Number</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-success"><i class="bi bi-whatsapp"></i></span>
                      <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="profileWhatsapp" value="0771234567">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="profileLocation" class="form-label small fw-semibold text-navy">Primary Location / City</label>
                    <input type="text" class="form-control border-light-custom shadow-none" id="profileLocation" value="Rajagiriya, Colombo" placeholder="e.g. Colombo, Sri Lanka" required>
                    <div class="invalid-feedback">Please enter your primary location.</div>
                  </div>

                  <div class="col-12">
                    <label for="profileBio" class="form-label small fw-semibold text-navy">Bio / About Landlord</label>
                    <textarea class="form-control border-light-custom shadow-none" id="profileBio" rows="3" placeholder="Briefly introduce yourself to renters (e.g. Experienced landlord offering modern, well-maintained annexes and apartments in Colombo area)...">Experienced property owner with 8+ years of offering residential rentals in Rajagiriya and Kandy. Committed to reliable service, clear agreements, and quick maintenance support.</textarea>
                  </div>
                </div>

                <div class="alert alert-success border-0 shadow-sm rounded-3 p-3 mt-4 d-none" id="profileSaveSuccessAlert">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>Profile details updated successfully!
                </div>

                <div class="d-flex justify-content-end mt-4 pt-3 border-top border-light-custom">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-soft" id="btnSaveProfile">
                    <i class="bi bi-check-lg me-1"></i>Save Changes
                  </button>
                </div>

              </form>
            </div>

            <!-- SECTION 4: SECURITY - CHANGE PASSWORD -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
              <h2 class="h5 fw-bold text-navy mb-4 border-bottom border-light-custom pb-3">
                <i class="bi bi-shield-lock-fill text-primary-custom me-2"></i>Security &amp; Password
              </h2>

              <form id="changePasswordForm" class="needs-validation" novalidate>
                <div class="row g-3">
                  <div class="col-12">
                    <label for="currentPassword" class="form-label small fw-semibold text-navy">Current Password</label>
                    <input type="password" class="form-control border-light-custom shadow-none" id="currentPassword" required>
                    <div class="invalid-feedback">Please enter your current password.</div>
                  </div>

                  <div class="col-md-6">
                    <label for="newPassword" class="form-label small fw-semibold text-navy">New Password</label>
                    <input type="password" class="form-control border-light-custom shadow-none" id="newPassword" minlength="8" required>
                    <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                  </div>

                  <div class="col-md-6">
                    <label for="confirmPassword" class="form-label small fw-semibold text-navy">Confirm New Password</label>
                    <input type="password" class="form-control border-light-custom shadow-none" id="confirmPassword" required>
                    <div class="invalid-feedback" id="confirmPasswordFeedback">Please confirm your new password.</div>
                  </div>
                </div>

                <div class="alert alert-success border-0 shadow-sm rounded-3 p-3 mt-4 d-none" id="passwordSuccessAlert">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>Your password has been updated successfully!
                </div>

                <div class="d-flex justify-content-end mt-4 pt-3 border-top border-light-custom">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-soft" id="btnChangePassword">
                    <i class="bi bi-key-fill me-1"></i>Change Password
                  </button>
                </div>
              </form>
            </div>

          </div>

          <!-- RIGHT COLUMN: VERIFICATION STATUS & ACTIVE SESSIONS -->
          <div class="col-lg-4">
            
            <!-- SECTION 3: VERIFICATION STATUS -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
              <h2 class="h5 fw-bold text-navy mb-3 border-bottom border-light-custom pb-3">
                <i class="bi bi-patch-check-fill text-success me-2"></i>Verification Status
              </h2>

              <div class="verification-list d-flex flex-column gap-3 mb-4">
                
                <!-- Item 1: Email -->
                <div class="p-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-envelope-check-fill text-success fs-5"></i>
                    <div>
                      <div class="fw-semibold text-navy small">Email Address</div>
                      <span class="fs-8 text-muted">nimal.perera@example.lk</span>
                    </div>
                  </div>
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fs-8">Verified</span>
                </div>

                <!-- Item 2: Phone -->
                <div class="p-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-telephone-check-fill text-success fs-5"></i>
                    <div>
                      <div class="fw-semibold text-navy small">Phone Number</div>
                      <span class="fs-8 text-muted">+94 77 123 4567</span>
                    </div>
                  </div>
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fs-8">Verified</span>
                </div>

                <!-- Item 3: Owner Verification -->
                <div class="p-3 bg-success-subtle bg-opacity-25 rounded-3 border border-success-subtle d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-shield-check text-success fs-4"></i>
                    <div>
                      <div class="fw-bold text-navy small">Verified Owner Badge</div>
                      <span class="fs-8 text-muted">Identity &amp; Ownership Documented</span>
                    </div>
                  </div>
                  <span class="badge bg-success text-white rounded-pill fs-8">Approved</span>
                </div>

              </div>

              <div class="bg-light-custom p-3 rounded-3 border border-light-custom small text-muted">
                <i class="bi bi-info-circle me-1 text-primary-custom"></i> Verified owners receive <strong>40% higher tenant response rates</strong> and featured placement on RentSriLanka listings.
              </div>
            </div>

            <!-- SECTION 5: ACTIVE SESSIONS -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
              <div class="d-flex align-items-center justify-content-between mb-3 border-bottom border-light-custom pb-3">
                <h2 class="h5 fw-bold text-navy mb-0">
                  <i class="bi bi-laptop text-primary-custom me-2"></i>Active Sessions
                </h2>
              </div>

              <div class="session-list d-flex flex-column gap-3 mb-4">
                
                <!-- Session 1 (Current) -->
                <div class="p-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-start gap-3">
                  <i class="bi bi-display text-primary fs-4 mt-1"></i>
                  <div class="min-w-0 flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="fw-bold text-navy small">Windows PC • Chrome</div>
                      <span class="badge bg-primary-subtle text-primary fs-8">Current Session</span>
                    </div>
                    <div class="fs-8 text-muted"><i class="bi bi-geo-alt me-1"></i>Colombo, Sri Lanka • IP: 175.157.x.x</div>
                    <div class="fs-8 text-muted">Active now</div>
                  </div>
                </div>

                <!-- Session 2 -->
                <div class="p-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-start gap-3">
                  <i class="bi bi-phone text-secondary fs-4 mt-1"></i>
                  <div class="min-w-0 flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="fw-bold text-navy small">iPhone 14 • Safari App</div>
                      <button type="button" class="btn btn-link text-danger p-0 fs-8 btn-revoke-session" title="Revoke Session">Revoke</button>
                    </div>
                    <div class="fs-8 text-muted"><i class="bi bi-geo-alt me-1"></i>Kandy, Sri Lanka • IP: 112.134.x.x</div>
                    <div class="fs-8 text-muted">Last active 3 hours ago</div>
                  </div>
                </div>

              </div>

              <button type="button" class="btn btn-outline-danger w-100 fw-medium btn-sm py-2 rounded-3" id="btnLogoutAllSessions">
                <i class="bi bi-box-arrow-right me-1"></i>Logout All Sessions
              </button>
            </div>

          </div>

        </div>

      </main>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/owner-profile.js"></script>
</body>
</html>