<?php $activePage = 'settings'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Settings - RentSriLanka Admin</title>
  
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
            <h1 class="h3 fw-bold text-navy mb-1">System Settings</h1>
            <p class="text-muted mb-0">Configure global website metadata, branding, and security authentication policies.</p>
          </div>
        </div>

        <!-- SETTINGS BOOTSTRAP TABS CONTAINER -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden mb-4">
          
          <!-- TAB HEADERS -->
          <div class="border-bottom border-light-custom bg-light-custom px-3 pt-3">
            <ul class="nav nav-tabs admin-settings-tabs border-0 gap-1" id="settingsTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold text-navy rounded-top-3 px-3 py-2.5" id="website-tab" data-bs-toggle="tab" data-bs-target="#website" type="button" role="tab" aria-controls="website" aria-selected="true">
                  <i class="bi bi-globe me-2 text-primary-custom"></i>Website Configuration
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold text-navy rounded-top-3 px-3 py-2.5" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                  <i class="bi bi-shield-lock me-2 text-primary-custom"></i>Security &amp; Auth
                </button>
              </li>
            </ul>
          </div>

          <!-- TAB CONTENT BODY -->
          <div class="tab-content p-4" id="settingsTabContent">

            <!-- TAB 1: WEBSITE CONFIGURATION -->
            <div class="tab-pane fade show active" id="website" role="tabpanel" aria-labelledby="website-tab">
              <h2 class="h5 fw-bold text-navy mb-3">Branding &amp; Website Metadata</h2>
              
              <form id="websiteSettingsForm" class="needs-validation" novalidate>
                <div class="row g-3 mb-4">
                  <div class="col-md-6">
                    <label for="siteName" class="form-label small fw-semibold text-navy">Site Name / Platform Title</label>
                    <input type="text" class="form-control border-light-custom shadow-none" id="siteName" value="RentSriLanka" required>
                  </div>

                  <div class="col-md-6">
                    <label for="siteContactEmail" class="form-label small fw-semibold text-navy">Support Email Address</label>
                    <input type="email" class="form-control border-light-custom shadow-none" id="siteContactEmail" value="support@rentsrilanka.lk" required>
                  </div>

                  <div class="col-md-6">
                    <label for="sitePhone" class="form-label small fw-semibold text-navy">Primary Contact Phone</label>
                    <input type="tel" class="form-control border-light-custom shadow-none" id="sitePhone" value="+94 11 234 5678" required>
                  </div>

                  <div class="col-md-6">
                    <label for="siteLogo" class="form-label small fw-semibold text-navy">Brand Logo File</label>
                    <input type="file" class="form-control border-light-custom shadow-none" id="siteLogo" accept="image/*">
                  </div>
                </div>

                <h6 class="fw-bold text-navy mb-3 border-top border-light-custom pt-3">
                  <i class="bi bi-share text-primary-custom me-2"></i>Official Social Media Links
                </h6>

                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label fs-8 text-muted fw-semibold">Facebook URL</label>
                    <div class="input-group input-group-sm">
                      <span class="input-group-text bg-light-custom border-light-custom text-primary"><i class="bi bi-facebook"></i></span>
                      <input type="url" class="form-control border-light-custom shadow-none" value="https://facebook.com/rentsrilanka">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label fs-8 text-muted fw-semibold">Instagram URL</label>
                    <div class="input-group input-group-sm">
                      <span class="input-group-text bg-light-custom border-light-custom text-danger"><i class="bi bi-instagram"></i></span>
                      <input type="url" class="form-control border-light-custom shadow-none" value="https://instagram.com/rentsrilanka">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label fs-8 text-muted fw-semibold">WhatsApp Business</label>
                    <div class="input-group input-group-sm">
                      <span class="input-group-text bg-light-custom border-light-custom text-success"><i class="bi bi-whatsapp"></i></span>
                      <input type="tel" class="form-control border-light-custom shadow-none" value="+94771234567">
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end mt-4 pt-3 border-top border-light-custom">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-soft">
                    <i class="bi bi-check-lg me-1"></i>Save Website Settings
                  </button>
                </div>
              </form>
            </div>

            <!-- TAB 2: SECURITY & AUTH -->
            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
              <h2 class="h5 fw-bold text-navy mb-3">Security Controls &amp; Authentication Policies</h2>

              <form id="securitySettingsForm" class="needs-validation" novalidate>
                <div class="row g-4">
                  
                  <!-- Session Timeout -->
                  <div class="col-md-6">
                    <div class="card border-light-custom shadow-xs rounded-3 p-3 h-100">
                      <h6 class="fw-bold text-navy small mb-2"><i class="bi bi-clock-history text-warning me-2"></i>Session Inactivity Timeout</h6>
                      <p class="fs-8 text-muted mb-3">Automatically terminate idle admin sessions after specified duration.</p>
                      <select class="form-select form-select-sm border-light-custom shadow-none" id="sessionTimeoutSelect">
                        <option value="15">15 Minutes</option>
                        <option value="30" selected>30 Minutes (Recommended)</option>
                        <option value="60">1 Hour</option>
                        <option value="120">2 Hours</option>
                      </select>
                    </div>
                  </div>

                  <!-- Login Attempt Limit -->
                  <div class="col-md-6">
                    <div class="card border-light-custom shadow-xs rounded-3 p-3 h-100">
                      <h6 class="fw-bold text-navy small mb-2"><i class="bi bi-exclamation-triangle text-danger me-2"></i>Login Attempt Throttle Limit</h6>
                      <p class="fs-8 text-muted mb-3">Block IP addresses exceeding maximum failed password attempts.</p>
                      <select class="form-select form-select-sm border-light-custom shadow-none" id="loginLimitSelect">
                        <option value="3">3 Failed Attempts</option>
                        <option value="5" selected>5 Failed Attempts (Default)</option>
                        <option value="10">10 Failed Attempts</option>
                      </select>
                    </div>
                  </div>

                  <!-- Password Policy Switches -->
                  <div class="col-md-6">
                    <div class="card border-light-custom shadow-xs rounded-3 p-3 h-100">
                      <h6 class="fw-bold text-navy small mb-3"><i class="bi bi-key-fill text-primary me-2"></i>Password Complexity Rules</h6>
                      <div class="d-flex flex-column gap-2.5">
                        <div class="form-check form-switch d-flex align-items-center justify-content-between ps-0">
                          <label class="form-check-label small text-navy" for="policyMinLength">Minimum 8 Characters</label>
                          <input class="form-check-input ms-auto" type="checkbox" id="policyMinLength" checked>
                        </div>
                        <div class="form-check form-switch d-flex align-items-center justify-content-between ps-0">
                          <label class="form-check-label small text-navy" for="policyNumbers">Require Numbers &amp; Symbols</label>
                          <input class="form-check-input ms-auto" type="checkbox" id="policyNumbers" checked>
                        </div>
                        <div class="form-check form-switch d-flex align-items-center justify-content-between ps-0">
                          <label class="form-check-label small text-navy" for="policyExpiry">Force Password Expiry (90 Days)</label>
                          <input class="form-check-input ms-auto" type="checkbox" id="policyExpiry">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Two-Factor Auth -->
                  <div class="col-md-6">
                    <div class="card border-light-custom shadow-xs rounded-3 p-3 h-100 bg-primary-subtle bg-opacity-10 border-primary-subtle">
                      <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-bold text-navy small mb-0"><i class="bi bi-shield-check text-success fs-5 me-2"></i>Two-Factor Authentication (2FA)</h6>
                        <span class="badge bg-success text-white rounded-pill fs-8">Enforced</span>
                      </div>
                      <p class="fs-8 text-muted mb-3">Enforce mandatory TOTP or SMS verification codes for all administrator and owner logins.</p>
                      
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="enforce2FA" checked>
                        <label class="form-check-label small fw-semibold text-navy ms-1" for="enforce2FA">Enforce 2FA for Admin Accounts</label>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="d-flex justify-content-end mt-4 pt-3 border-top border-light-custom">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-soft">
                    <i class="bi bi-shield-lock-fill me-1"></i>Save Security Policies
                  </button>
                </div>
              </form>
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
  <script src="assets/js/admin-settings.js"></script>
</body>
</html>