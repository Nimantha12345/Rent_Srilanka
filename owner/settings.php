<?php $activePage = 'settings'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Settings - RentSriLanka Owner Portal</title>

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

        <!-- PAGE HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">Settings</h1>
            <p class="text-muted mb-0">Manage your account preferences, notifications and security.</p>
          </div>
        </div>

        <!-- ALERT MESSAGES CONTAINER -->
        <div id="settingsAlertContainer" class="mb-4 d-none">
          <div class="alert alert-success border-success-subtle alert-dismissible fade show rounded-3 shadow-soft mb-0" role="alert" id="successAlert">
            <i class="bi bi-check-circle-fill me-2"></i><span id="alertMessageText">Settings updated successfully.</span>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>

        <!-- UNSAVED CHANGES STICKY BANNER -->
        <div class="card border-warning bg-warning-subtle text-warning-emphasis shadow-soft rounded-4 p-3 mb-4 d-none" id="unsavedChangesBanner">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-exclamation-triangle-fill fs-5 text-warning-emphasis"></i>
              <span class="fw-semibold small">You have unsaved changes in your settings.</span>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary btn-sm fw-medium rounded-pill" id="btnDiscardChanges">Discard Changes</button>
              <button class="btn btn-warning btn-sm fw-bold rounded-pill text-dark" id="btnBannerSave">Save Changes</button>
            </div>
          </div>
        </div>

        <!-- SETTINGS MAIN LAYOUT -->
        <div class="row g-4" data-user-id="OWN-401">

          <!-- LEFT: NAVIGATION TABS (DESKTOP NAV / MOBILE TOUCH SCROLLABLE) -->
          <div class="col-md-4 col-lg-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-2 bg-white sticky-top" style="top: 80px;">
              <div class="nav flex-column nav-pills settings-nav gap-1" id="settingsTabNav" role="tablist" aria-orientation="vertical">
                <button class="nav-link active rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-account" data-bs-toggle="pill" data-bs-target="#sec-account" type="button" role="tab" aria-controls="sec-account" aria-selected="true">
                  <span><i class="bi bi-person-gear me-2"></i>Account</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-notifications" data-bs-toggle="pill" data-bs-target="#sec-notifications" type="button" role="tab" aria-controls="sec-notifications" aria-selected="false">
                  <span><i class="bi bi-bell me-2"></i>Notifications</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-messages" data-bs-toggle="pill" data-bs-target="#sec-messages" type="button" role="tab" aria-controls="sec-messages" aria-selected="false">
                  <span><i class="bi bi-chat-dots me-2"></i>Messages</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-privacy" data-bs-toggle="pill" data-bs-target="#sec-privacy" type="button" role="tab" aria-controls="sec-privacy" aria-selected="false">
                  <span><i class="bi bi-shield-check me-2"></i>Privacy</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-security" data-bs-toggle="pill" data-bs-target="#sec-security" type="button" role="tab" aria-controls="sec-security" aria-selected="false">
                  <span><i class="bi bi-lock me-2"></i>Security</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 d-flex align-items-center justify-content-between" id="tab-appearance" data-bs-toggle="pill" data-bs-target="#sec-appearance" type="button" role="tab" aria-controls="sec-appearance" aria-selected="false">
                  <span><i class="bi bi-palette me-2"></i>Appearance</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>

                <hr class="my-2 border-light-custom">

                <button class="nav-link rounded-3 text-start fw-semibold py-2.5 px-3 text-danger d-flex align-items-center justify-content-between" id="tab-danger" data-bs-toggle="pill" data-bs-target="#sec-danger" type="button" role="tab" aria-controls="sec-danger" aria-selected="false">
                  <span><i class="bi bi-exclamation-octagon me-2"></i>Danger Zone</span>
                  <i class="bi bi-chevron-right fs-8"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- RIGHT: SELECTED SETTINGS CONTENT SECTIONS -->
          <div class="col-md-8 col-lg-9">
            <div class="tab-content" id="settingsTabContent">

              <!-- 1. ACCOUNT SETTINGS -->
              <div class="tab-pane fade show active" id="sec-account" role="tabpanel" aria-labelledby="tab-account" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4">
                  <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-light-custom mb-4">
                    <div>
                      <h5 class="fw-bold text-navy mb-1"><i class="bi bi-person-gear text-primary me-2"></i>Account Settings</h5>
                      <p class="small text-muted mb-0">Update your primary account information and contact numbers.</p>
                    </div>
                    <div class="d-flex gap-2">
                      <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill small fw-semibold">
                        <i class="bi bi-shield-check me-1"></i>Verified Owner
                      </span>
                    </div>
                  </div>

                  <form id="accountSettingsForm" class="settings-form">
                    <div class="row g-3 mb-4">
                      <div class="col-md-6">
                        <label for="accFullName" class="form-label small fw-semibold text-navy">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control border-light-custom shadow-none" id="accFullName" value="Kasun Perera" required>
                      </div>

                      <div class="col-md-6">
                        <label for="accEmail" class="form-label small fw-semibold text-navy">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <input type="email" class="form-control border-light-custom shadow-none" id="accEmail" value="kasun.perera@example.com" required>
                          <span class="input-group-text bg-success-subtle text-success border-light-custom small fw-semibold" title="Email Verified">
                            <i class="bi bi-check-circle-fill me-1"></i>Verified
                          </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label for="accPhone" class="form-label small fw-semibold text-navy">Phone Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <input type="tel" class="form-control border-light-custom shadow-none" id="accPhone" value="+94 77 123 4567" required>
                          <span class="input-group-text bg-success-subtle text-success border-light-custom small fw-semibold" title="Phone Verified">
                            <i class="bi bi-check-circle-fill me-1"></i>Verified
                          </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label for="accWhatsapp" class="form-label small fw-semibold text-navy">WhatsApp Number</label>
                        <input type="tel" class="form-control border-light-custom shadow-none" id="accWhatsapp" value="+94 77 123 4567" placeholder="+94 7X XXX XXXX">
                      </div>

                      <div class="col-md-6">
                        <label for="accLocation" class="form-label small fw-semibold text-navy">Primary Location / District</label>
                        <select class="form-select border-light-custom shadow-none" id="accLocation">
                          <option value="Colombo">Colombo</option>
                          <option value="Kandy" selected>Kandy</option>
                          <option value="Gampaha">Gampaha</option>
                          <option value="Galle">Galle</option>
                          <option value="Kurunegala">Kurunegala</option>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-navy">Account System Role</label>
                        <input type="text" class="form-control border-light-custom bg-light-custom text-muted shadow-none" value="Property Owner (Non-Admin)" readonly disabled>
                        <span class="fs-8 text-muted mt-1 d-block"><i class="bi bi-info-circle me-1"></i>System permissions are enforced securely on backend authentication servers.</span>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top border-light-custom">
                      <button type="button" class="btn btn-light border fw-medium px-4 btn-reset-form">Cancel</button>
                      <button type="submit" class="btn btn-primary fw-bold px-4 btn-save-section">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- 2. NOTIFICATION SETTINGS -->
              <div class="tab-pane fade" id="sec-notifications" role="tabpanel" aria-labelledby="tab-notifications" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4">
                  <div class="pb-3 border-bottom border-light-custom mb-4">
                    <h5 class="fw-bold text-navy mb-1"><i class="bi bi-bell text-primary me-2"></i>Notification Preferences</h5>
                    <p class="small text-muted mb-0">Choose which events trigger real-time alerts and delivery methods.</p>
                  </div>

                  <form id="notificationSettingsForm" class="settings-form">
                    <h6 class="fw-bold text-navy mb-3 small text-uppercase letter-spacing-1">Delivery Channels</h6>
                    <div class="row g-3 mb-4 p-3 bg-light-custom rounded-3 border border-light-custom">
                      <div class="col-md-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="chanEmail" checked data-setting="channel_email">
                          <label class="form-check-label fw-semibold small text-navy" for="chanEmail">Email Notifications</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="chanSms" checked data-setting="channel_sms">
                          <label class="form-check-label fw-semibold small text-navy" for="chanSms">SMS Notifications</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="chanBrowser" checked data-setting="channel_browser">
                          <label class="form-check-label fw-semibold small text-navy" for="chanBrowser">Browser Notifications</label>
                        </div>
                      </div>
                    </div>

                    <h6 class="fw-bold text-navy mb-3 small text-uppercase letter-spacing-1">Event Trigger Alerts</h6>
                    <div class="list-group list-group-flush mb-4">
                      
                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">New Inquiry Received</div>
                          <div class="fs-8 text-muted">Receive alerts when a potential tenant submits an inquiry form.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifInquiry" checked data-setting="notif_new_inquiry">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">New Message Received</div>
                          <div class="fs-8 text-muted">Receive notifications when a customer sends you a message.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifMessage" checked data-setting="notif_new_message">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Property Approved / Listed</div>
                          <div class="fs-8 text-muted">Alert when admins approve your property listing.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifApproved" checked data-setting="notif_prop_approved">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Property Rejected or Suspended</div>
                          <div class="fs-8 text-muted">Get immediate updates if moderation flags or holds your listing.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifSuspended" checked data-setting="notif_prop_suspended">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Listing Expiration Warning</div>
                          <div class="fs-8 text-muted">Receive reminders when property listings are near expiration.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifExpired" checked data-setting="notif_prop_expired">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Property Favorited</div>
                          <div class="fs-8 text-muted">Alert when users save your properties to their wishlist.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifFavorite" data-setting="notif_new_favorite">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between">
                        <div>
                          <div class="fw-semibold text-navy small">System Announcements</div>
                          <div class="fs-8 text-muted">Receive platform feature updates and maintenance notices.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="notifSystem" checked data-setting="notif_system">
                        </div>
                      </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top border-light-custom">
                      <button type="button" class="btn btn-light border fw-medium px-4 btn-reset-form">Cancel</button>
                      <button type="submit" class="btn btn-primary fw-bold px-4 btn-save-section">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- 3. MESSAGES SETTINGS -->
              <div class="tab-pane fade" id="sec-messages" role="tabpanel" aria-labelledby="tab-messages" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4">
                  <div class="pb-3 border-bottom border-light-custom mb-4">
                    <h5 class="fw-bold text-navy mb-1"><i class="bi bi-chat-dots text-primary me-2"></i>Messaging Controls</h5>
                    <p class="small text-muted mb-0">Control how renters communicate with you through the platform.</p>
                  </div>

                  <form id="messageSettingsForm" class="settings-form">
                    <div class="list-group list-group-flush mb-4">
                      
                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Allow customers to message me</div>
                          <div class="fs-8 text-muted">When enabled, customers can start conversations about your listed properties.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="msgAllowInternal" checked data-setting="allow_messages">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Allow WhatsApp direct contact</div>
                          <div class="fs-8 text-muted">Displays a direct WhatsApp inquiry button on your property detail pages.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="msgAllowWhatsapp" checked data-setting="allow_whatsapp">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Show phone number to interested customers</div>
                          <div class="fs-8 text-muted">Allows verified customers to view your phone number for direct calling.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="msgShowPhone" checked data-setting="show_phone">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Show online status in chat</div>
                          <div class="fs-8 text-muted">Displays an online indicator when you are active on the portal.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="msgShowOnline" checked data-setting="show_online">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between">
                        <div>
                          <div class="fw-semibold text-navy small">Allow message attachments</div>
                          <div class="fs-8 text-muted">Permits sending PDF and image attachments in internal chat.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="msgAllowAttachments" checked data-setting="allow_attachments">
                        </div>
                      </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top border-light-custom">
                      <button type="button" class="btn btn-light border fw-medium px-4 btn-reset-form">Cancel</button>
                      <button type="submit" class="btn btn-primary fw-bold px-4 btn-save-section">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- 4. PRIVACY SETTINGS -->
              <div class="tab-pane fade" id="sec-privacy" role="tabpanel" aria-labelledby="tab-privacy" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4">
                  <div class="pb-3 border-bottom border-light-custom mb-4">
                    <h5 class="fw-bold text-navy mb-1"><i class="bi bi-shield-check text-primary me-2"></i>Privacy Controls</h5>
                    <p class="small text-muted mb-0">Your privacy settings control what information customers can see on public listings.</p>
                  </div>

                  <form id="privacySettingsForm" class="settings-form">
                    <div class="list-group list-group-flush mb-4">

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Show phone number publicly</div>
                          <div class="fs-8 text-muted">Display phone number on property cards and details page.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="privPhone" checked data-setting="priv_phone">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Show WhatsApp number publicly</div>
                          <div class="fs-8 text-muted">Display WhatsApp action button publicly.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="privWhatsapp" checked data-setting="priv_whatsapp">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between border-bottom border-light-custom">
                        <div>
                          <div class="fw-semibold text-navy small">Show email address publicly</div>
                          <div class="fs-8 text-muted">Display email address on owner profile page.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="privEmail" data-setting="priv_email">
                        </div>
                      </div>

                      <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between">
                        <div>
                          <div class="fw-semibold text-navy small">Show public owner profile</div>
                          <div class="fs-8 text-muted">Allow tenants to view your public landlord rating and active listings catalog.</div>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input shadow-none" type="checkbox" id="privProfile" checked data-setting="priv_profile">
                        </div>
                      </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top border-light-custom">
                      <button type="button" class="btn btn-light border fw-medium px-4 btn-reset-form">Cancel</button>
                      <button type="submit" class="btn btn-primary fw-bold px-4 btn-save-section">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- 5. SECURITY SETTINGS -->
              <div class="tab-pane fade" id="sec-security" role="tabpanel" aria-labelledby="tab-security" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
                  <div class="pb-3 border-bottom border-light-custom mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                      <h5 class="fw-bold text-navy mb-1"><i class="bi bi-lock text-primary me-2"></i>Security &amp; Authentication</h5>
                      <p class="small text-muted mb-0">Manage password updates, active logins, and 2FA protection.</p>
                    </div>
                    <button class="btn btn-outline-primary btn-sm fw-bold rounded-pill" id="btnOpenChangePassword" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                      <i class="bi bi-key me-1"></i>Change Password
                    </button>
                  </div>

                  <!-- METADATA AUDIT CARDS -->
                  <div class="row g-3 mb-4">
                    <div class="col-md-4">
                      <div class="p-3 bg-light-custom rounded-3 border border-light-custom">
                        <span class="fs-8 text-muted d-block fw-semibold mb-1">LAST PASSWORD CHANGE</span>
                        <span class="fw-bold text-navy small"><i class="bi bi-clock-history me-1 text-primary"></i>14 Days Ago</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="p-3 bg-light-custom rounded-3 border border-light-custom">
                        <span class="fs-8 text-muted d-block fw-semibold mb-1">LAST LOGIN AUDIT</span>
                        <span class="fw-bold text-navy small"><i class="bi bi-box-arrow-in-right me-1 text-success"></i>Today, 02:15 PM</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="p-3 bg-light-custom rounded-3 border border-light-custom">
                        <span class="fs-8 text-muted d-block fw-semibold mb-1">CURRENT SESSION LOCATION</span>
                        <span class="fw-bold text-navy small"><i class="bi bi-geo-alt me-1 text-danger"></i>Colombo, Sri Lanka</span>
                      </div>
                    </div>
                  </div>

                  <!-- TWO-FACTOR AUTHENTICATION CARD -->
                  <div class="card border-light-custom rounded-3 p-3 bg-light-subtle mb-4">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                      <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-sm bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-shield-lock-fill"></i></div>
                        <div>
                          <h6 class="fw-bold text-navy mb-0">Two-Factor Authentication (2FA)</h6>
                          <span class="fs-8 text-muted">Add an extra layer of security to prevent unauthorized access.</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">Not Enabled</span>
                        <button class="btn btn-navy btn-sm fw-bold rounded-pill" id="btnEnable2FA">Enable 2FA</button>
                      </div>
                    </div>
                  </div>

                  <!-- ACTIVE SESSIONS LIST -->
                  <h6 class="fw-bold text-navy mb-3 small text-uppercase letter-spacing-1">Active Login Sessions</h6>
                  <div class="list-group list-group-flush mb-4">
                    
                    <div class="list-group-item px-3 py-3 border rounded-3 border-light-custom mb-2 bg-white d-flex align-items-center justify-content-between flex-wrap gap-2" data-session-id="SESS-901">
                      <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-laptop display-6 text-primary"></i>
                        <div>
                          <div class="fw-bold text-navy small">Chrome on Windows 11 <span class="badge bg-success-subtle text-success border border-success-subtle fs-8 rounded-pill ms-1">Current Device</span></div>
                          <span class="fs-8 text-muted">Colombo, Sri Lanka · IP: 175.157.XX.XX · Active Now</span>
                        </div>
                      </div>
                      <span class="badge bg-light text-navy border">Current Session</span>
                    </div>

                    <div class="list-group-item px-3 py-3 border rounded-3 border-light-custom mb-3 bg-white d-flex align-items-center justify-content-between flex-wrap gap-2" data-session-id="SESS-902">
                      <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-phone display-6 text-secondary"></i>
                        <div>
                          <div class="fw-bold text-navy small">Mobile Chrome on Android</div>
                          <span class="fs-8 text-muted">Kandy, Sri Lanka · Last active 2 hours ago</span>
                        </div>
                      </div>
                      <button class="btn btn-outline-danger btn-sm fs-8 fw-semibold btn-terminate-session">Logout Session</button>
                    </div>

                  </div>

                  <div class="d-flex justify-content-between align-items-center pt-3 border-top border-light-custom flex-wrap gap-2">
                    <span class="fs-8 text-muted"><i class="bi bi-info-circle me-1"></i>Terminating session revokes current refresh tokens securely.</span>
                    <button class="btn btn-outline-danger btn-sm fw-bold rounded-pill" id="btnLogoutAllDevices">Logout All Other Devices</button>
                  </div>
                </div>
              </div>

              <!-- 6. APPEARANCE SETTINGS -->
              <div class="tab-pane fade" id="sec-appearance" role="tabpanel" aria-labelledby="tab-appearance" tabindex="0">
                <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4">
                  <div class="pb-3 border-bottom border-light-custom mb-4">
                    <h5 class="fw-bold text-navy mb-1"><i class="bi bi-palette text-primary me-2"></i>Appearance &amp; Display</h5>
                    <p class="small text-muted mb-0">Customize portal theme mode, layout density and language settings.</p>
                  </div>

                  <form id="appearanceSettingsForm" class="settings-form">
                    <div class="row g-4 mb-4">
                      
                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-navy">Interface Theme</label>
                        <select class="form-select border-light-custom shadow-none" id="appTheme" data-setting="theme">
                          <option value="system" selected>System Default</option>
                          <option value="light">Light Theme</option>
                          <option value="dark">Dark Theme (Preview)</option>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-navy">Layout Density</label>
                        <select class="form-select border-light-custom shadow-none" id="appDensity" data-setting="density">
                          <option value="comfortable" selected>Comfortable (Default Spacing)</option>
                          <option value="compact">Compact (Higher Data Density)</option>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-navy">Preferred Language</label>
                        <select class="form-select border-light-custom shadow-none" id="appLanguage" data-setting="language">
                          <option value="en" selected>English</option>
                          <option value="si">Sinhala (සිංහල)</option>
                          <option value="ta">Tamil (தமிழ்)</option>
                        </select>
                      </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top border-light-custom">
                      <button type="button" class="btn btn-light border fw-medium px-4 btn-reset-form">Cancel</button>
                      <button type="submit" class="btn btn-primary fw-bold px-4 btn-save-section">Save Preferences</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- 7. DANGER ZONE -->
              <div class="tab-pane fade" id="sec-danger" role="tabpanel" aria-labelledby="tab-danger" tabindex="0">
                <div class="card border-danger shadow-soft rounded-4 bg-white p-4">
                  <div class="pb-3 border-bottom border-danger-subtle mb-4">
                    <h5 class="fw-bold text-danger mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Danger Zone</h5>
                    <p class="small text-muted mb-0">Destructive actions regarding account deactivation and data deletion.</p>
                  </div>

                  <div class="row g-4 mb-2">
                    
                    <div class="col-12">
                      <div class="p-3 bg-danger-subtle bg-opacity-20 rounded-3 border border-danger-subtle d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                          <h6 class="fw-bold text-navy mb-1">Deactivate Account</h6>
                          <p class="fs-8 text-muted mb-0">Temporarily disable your account and hide all associated property listings from public search.</p>
                        </div>
                        <button class="btn btn-outline-danger btn-sm fw-bold rounded-pill" id="btnDeactivateAccount">Deactivate Account</button>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="p-3 bg-danger-subtle bg-opacity-30 rounded-3 border border-danger d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                          <h6 class="fw-bold text-danger mb-1">Permanently Delete Account</h6>
                          <p class="fs-8 text-muted mb-0">Permanently erase your owner profile, inquiries, and property records where legally applicable.</p>
                        </div>
                        <button class="btn btn-danger btn-sm fw-bold rounded-pill" id="btnDeleteAccount">Delete Account</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- CHANGE PASSWORD MODAL -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="changePasswordModalLabel"><i class="bi bi-shield-lock-fill text-primary me-2"></i>Change Account Password</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="changePasswordForm">
            
            <div class="mb-3">
              <label for="currPassword" class="form-label small fw-semibold text-navy">Current Password</label>
              <div class="input-group">
                <input type="password" class="form-control border-light-custom shadow-none" id="currPassword" required>
                <button class="btn btn-light border border-light-custom text-muted btn-toggle-pw" type="button"><i class="bi bi-eye"></i></button>
              </div>
            </div>

            <div class="mb-2">
              <label for="newPassword" class="form-label small fw-semibold text-navy">New Password</label>
              <div class="input-group">
                <input type="password" class="form-control border-light-custom shadow-none" id="newPassword" required>
                <button class="btn btn-light border border-light-custom text-muted btn-toggle-pw" type="button"><i class="bi bi-eye"></i></button>
              </div>
              <div class="progress mt-2" style="height: 5px;">
                <div class="progress-bar bg-danger" id="pwStrengthBar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fs-8 text-muted" id="pwStrengthText">Password strength: Too weak</span>
            </div>

            <div class="mb-3">
              <label for="confirmPassword" class="form-label small fw-semibold text-navy">Confirm New Password</label>
              <div class="input-group">
                <input type="password" class="form-control border-light-custom shadow-none" id="confirmPassword" required>
                <button class="btn btn-light border border-light-custom text-muted btn-toggle-pw" type="button"><i class="bi bi-eye"></i></button>
              </div>
              <span class="fs-8 text-danger d-none" id="pwMatchError">Passwords do not match!</span>
            </div>

            <!-- Password Requirements checklist -->
            <div class="p-3 bg-light-custom rounded-3 border border-light-custom fs-8 text-muted mb-2">
              <span class="fw-semibold text-navy d-block mb-1">Password Requirements:</span>
              <ul class="list-unstyled mb-0 d-flex flex-column gap-1">
                <li id="reqMinChar"><i class="bi bi-x-circle text-danger me-1"></i>Minimum 8 characters long</li>
                <li id="reqUpper"><i class="bi bi-x-circle text-danger me-1"></i>At least one uppercase letter (A-Z)</li>
                <li id="reqLower"><i class="bi bi-x-circle text-danger me-1"></i>At least one lowercase letter (a-z)</li>
                <li id="reqNum"><i class="bi bi-x-circle text-danger me-1"></i>At least one number (0-9)</li>
                <li id="reqSpecial"><i class="bi bi-x-circle text-danger me-1"></i>At least one special character (!@#$%^&amp;*)</li>
              </ul>
            </div>

          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnUpdatePasswordSubmit">Update Password</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 2FA EXPLANATION MODAL -->
  <div class="modal fade" id="twoFactorModal" tabindex="-1" aria-labelledby="twoFactorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="twoFactorModalLabel"><i class="bi bi-qr-code text-primary me-2"></i>Two-Factor Authentication Setup</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3 text-center">
          <div class="stat-icon-lg bg-primary-subtle text-primary rounded-circle mx-auto mb-3">
            <i class="bi bi-shield-lock display-6"></i>
          </div>
          <h6 class="fw-bold text-navy mb-2">Backend Authentication Integration Notice</h6>
          <p class="small text-muted mb-3">In production environment, setting up 2FA generates a secure Time-based One-Time Password (TOTP) QR code for Google Authenticator or sends SMS verification tokens.</p>
          <div class="alert alert-light border border-light-custom rounded-3 text-start fs-8 mb-0">
            <i class="bi bi-info-circle me-1 text-primary"></i><strong>Backend Requirement:</strong> 2FA state, secrets, and backup recovery codes will be securely processed and hashed via backend PHP logic.
          </div>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-primary fw-bold rounded-pill px-4" data-bs-dismiss="modal">Understand</button>
        </div>
      </div>
    </div>
  </div>

  <!-- DEACTIVATE ACCOUNT CONFIRMATION MODAL -->
  <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-warning mb-3">
            <i class="bi bi-pause-circle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deactivateModalLabel">Deactivate Account?</h5>
          <p class="small text-muted mb-4">Your account will be suspended and all property listings hidden from public renters until you re-login.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning flex-fill fw-bold text-dark" id="btnConfirmDeactivate">Deactivate</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE ACCOUNT FINAL CONFIRMATION MODAL -->
  <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-4 text-center">
        <div class="modal-body p-2">
          <div class="stat-icon-lg bg-danger-subtle text-danger rounded-circle mx-auto mb-3">
            <i class="bi bi-trash3-fill display-5"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2">Permanently Delete Account?</h5>
          <p class="small text-muted mb-3">
            This action is irreversible. All your property listings, messages, and account history will be permanently deleted where legally permissible.
          </p>

          <div class="mb-4 text-start bg-light-custom p-3 rounded-3 border border-light-custom">
            <label for="deleteConfirmationInput" class="form-label fs-8 fw-bold text-navy mb-1">Type <code class="text-danger">DELETE</code> to confirm:</label>
            <input type="text" class="form-control border-light-custom shadow-none text-center fw-bold" id="deleteConfirmationInput" placeholder="DELETE" autocomplete="off">
          </div>

          <div class="d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-light border fw-medium px-4" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger fw-bold px-4" id="btnConfirmDeleteFinal" disabled>Delete Account</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/owner-settings.js"></script>
</body>
</html>