<?php $activePage = 'messages'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages Management - RentSriLanka Admin</title>

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
            <h1 class="h3 fw-bold text-navy mb-1">Admin Messages &amp; Support Inquiries</h1>
            <p class="text-muted mb-0">Manage direct admin communications with property owners and customers.</p>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap ms-auto">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill small fw-semibold">
              <i class="bi bi-chat-left-text me-1"></i>Total: <span id="stat-total-badge">148</span>
            </span>
            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2 rounded-pill small fw-semibold">
              <i class="bi bi-envelope-exclamation me-1"></i>Unread: <span id="stat-unread-badge">5</span>
            </span>
            <button class="btn btn-light border btn-sm rounded-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas">
              <i class="bi bi-funnel me-1"></i>Filters
            </button>
          </div>
        </div>

        <!-- MESSAGE STATISTICS CARDS -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Inquiries</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-chat-left-text-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="card-total-conversations">148</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Unread Messages</span>
                <div class="stat-icon-sm bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-envelope-paper-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="card-unread-messages">5</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Active Inquiries</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-chat-dots-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="card-active-conversations">138</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Closed / Blocked</span>
                <div class="stat-icon-sm bg-danger-subtle text-danger rounded-circle"><i class="bi bi-slash-circle-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="card-blocked-conversations">5</h3>
            </div>
          </div>
        </div>

        <!-- SEARCH BAR & DESKTOP FILTER BAR -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3 mb-4">
          <div class="row g-2 align-items-center">
            <div class="col-12 col-md-5 col-lg-6">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-light-custom shadow-none" id="conversationSearchInput" placeholder="Search by user name, phone, subject or ID...">
                <button class="btn btn-light border border-light-custom" type="button" id="btnClearSearch" title="Clear Search"><i class="bi bi-x-lg"></i></button>
              </div>
            </div>

            <div class="col-12 col-md-7 col-lg-6 d-none d-md-flex align-items-center gap-2 justify-content-end">
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterUserType">
                <option value="all" selected>All Admin Threads</option>
                <option value="owner_admin">Admin ↔ Owner</option>
                <option value="customer_admin">Admin ↔ Customer</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterStatus">
                <option value="all" selected>All Statuses</option>
                <option value="unread">Unread</option>
                <option value="read">Read</option>
                <option value="active">Active</option>
                <option value="closed">Closed</option>
                <option value="blocked">Blocked</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterDate">
                <option value="all" selected>All Dates</option>
                <option value="today">Today</option>
                <option value="7days">Last 7 Days</option>
                <option value="30days">Last 30 Days</option>
              </select>

              <button class="btn btn-outline-secondary btn-sm fw-medium rounded-3" id="btnResetFilters" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- MAIN MESSAGING INTERFACE -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden admin-chat-card">
          <div class="row g-0 h-100">

            <!-- LEFT COLUMN: CONVERSATION LIST -->
            <div class="col-lg-5 col-xl-4 border-end border-light-custom d-flex flex-column h-100 chat-col-list" id="chatListColumn">
              <div class="p-3 bg-light-custom border-bottom border-light-custom d-flex align-items-center justify-content-between">
                <h6 class="fw-bold text-navy mb-0"><i class="bi bi-chat-left-dots me-2 text-primary"></i>Admin Support Threads</h6>
                <span class="badge bg-navy text-white rounded-pill small" id="visible-conversations-count">3 Threads</span>
              </div>

              <!-- SKELETON LOADING UI -->
              <div class="p-3 d-none" id="chatListSkeleton">
                <div class="skeleton-item mb-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <div class="skeleton-avatar"></div>
                    <div class="flex-grow-1"><div class="skeleton-line w-75"></div><div class="skeleton-line w-50"></div></div>
                  </div>
                  <div class="skeleton-line w-100"></div>
                </div>
              </div>

              <!-- CONVERSATIONS LIST CONTAINER -->
              <div class="overflow-y-auto flex-grow-1 custom-scrollbar list-group list-group-flush" id="conversationListContainer">

                <!-- Thread 1: Admin ↔ Owner (Kasun Perera) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item active"
                  data-conversation-id="201"
                  data-user-role="Owner"
                  data-user-id="USR-401"
                  data-user-name="Kasun Perera"
                  data-user-phone="+94 77 123 4567"
                  data-subject="Property Listing Verification Inquiry"
                  data-property-id="PROP-2026-01"
                  data-property-title="2 Bedroom House for Rent – Kandy"
                  data-property-location="Peradeniya, Kandy"
                  data-property-price="Rs. 45,000 / mo"
                  data-user-type="owner_admin"
                  data-status="unread"
                  data-created-date="2026-09-01"
                  data-last-date="2026-09-08">
                  <div class="d-flex align-items-start gap-2">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-navy text-white fw-bold">KP</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Online"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-navy text-truncate small">Admin ↔ Kasun P. (Owner)</span>
                        <span class="fs-8 text-muted ms-1 text-nowrap">10:45 AM</span>
                      </div>

                      <div class="d-flex align-items-center gap-1 mb-1">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8">Owner</span>
                        <span class="fs-8 text-muted text-truncate fw-medium">#PROP-2026-01 Verification</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg">I submitted my ownership document via email.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-success rounded-pill badge-unread">1</span>
                      <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fs-8 mt-2">Unread</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 2: Admin ↔ Customer (Nimal Fernando) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="202"
                  data-user-role="Customer"
                  data-user-id="USR-802"
                  data-user-name="Nimal Fernando"
                  data-user-phone="+94 71 987 6543"
                  data-subject="Payment & Refund Inquiry"
                  data-property-id="PROP-2026-04"
                  data-property-title="Luxury Modern Annex near Colombo"
                  data-property-location="Rajagiriya, Colombo"
                  data-property-price="Rs. 65,000 / mo"
                  data-user-type="customer_admin"
                  data-status="read"
                  data-created-date="2026-08-15"
                  data-last-date="2026-09-08">
                  <div class="d-flex align-items-start gap-2">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-teal text-white fw-bold">NF</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle" title="Offline"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-navy text-truncate small">Admin ↔ Nimal F. (Customer)</span>
                        <span class="fs-8 text-muted ms-1 text-nowrap">Yesterday</span>
                      </div>

                      <div class="d-flex align-items-center gap-1 mb-1">
                        <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-8">Customer</span>
                        <span class="fs-8 text-muted text-truncate fw-medium">Refund Question</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg">Thank you Admin team for resolving my issue quickly.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-light text-navy border border-light-custom fs-8">Read</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 3: Admin ↔ Owner (Sunil Jayasinghe) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="203"
                  data-user-role="Owner"
                  data-user-id="USR-402"
                  data-user-name="Sunil Jayasinghe"
                  data-user-phone="+94 76 555 1234"
                  data-subject="Account Subscription Update"
                  data-property-id="PROP-2026-09"
                  data-property-title="Single Student Room near Campus"
                  data-property-location="Nugegoda, Colombo"
                  data-property-price="Rs. 18,000 / mo"
                  data-user-type="owner_admin"
                  data-status="unread"
                  data-created-date="2026-09-02"
                  data-last-date="2026-09-07">
                  <div class="d-flex align-items-start gap-2">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-primary text-white fw-bold">SJ</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Online"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-navy text-truncate small">Admin ↔ Sunil J. (Owner)</span>
                        <span class="fs-8 text-muted ms-1 text-nowrap">02 Sep</span>
                      </div>

                      <div class="d-flex align-items-center gap-1 mb-1">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8">Owner</span>
                        <span class="fs-8 text-muted text-truncate fw-medium">Subscription Renewal</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg">How can I upgrade to featured listing package?</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-success rounded-pill badge-unread">2</span>
                      <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fs-8 mt-2">Unread</span>
                    </div>
                  </div>
                </button>

              </div>

              <!-- EMPTY CONVERSATIONS LIST STATE -->
              <div class="p-5 text-center my-auto d-none" id="emptyConversationList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-chat-square-x display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No support threads found</h6>
                <p class="small text-muted mb-3">No admin messages match your current filter criteria.</p>
                <button class="btn btn-outline-primary btn-sm rounded-pill fw-medium" id="btnRefreshList">
                  <i class="bi bi-arrow-repeat me-1"></i>Reset List
                </button>
              </div>

            </div>

            <!-- RIGHT COLUMN: SELECTED CHAT VIEW -->
            <div class="col-lg-7 col-xl-8 d-flex flex-column h-100 chat-col-view" id="chatViewColumn">

              <!-- CHAT HEADER -->
              <div class="p-3 bg-white border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2 shadow-xs" id="chatHeader">
                <div class="d-flex align-items-center gap-2 min-w-0">
                  <button class="btn btn-light btn-sm border me-1 d-lg-none" type="button" id="btnBackToList" aria-label="Back to conversations">
                    <i class="bi bi-arrow-left"></i>
                  </button>

                  <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold flex-shrink-0" style="width: 40px; height: 40px;" id="headerUserAvatar">KP</div>

                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <h6 class="fw-bold text-navy mb-0 text-truncate" id="headerParticipantsText">Admin ↔ Kasun Perera (Owner)</h6>
                      <span class="badge bg-success-subtle text-success border border-success-subtle fs-8 rounded-pill" id="headerLiveStatus">Active Support Thread</span>
                    </div>
                    <p class="fs-8 text-muted mb-0 text-truncate" id="headerThreadMeta">Thread ID: #201 · Subject: Property Listing Verification Inquiry</p>
                  </div>
                </div>

                <!-- ADMIN ACTION BUTTONS -->
                <div class="d-flex align-items-center gap-2 ms-auto">
                  <button class="btn btn-light border btn-sm text-navy fw-medium d-none d-sm-inline-flex align-items-center gap-1" id="btnHeaderDetails" data-bs-toggle="modal" data-bs-target="#messageDetailsModal">
                    <i class="bi bi-info-circle"></i>Details
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-navy btn-sm fw-medium dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-shield-gear me-1"></i>Admin Actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item" id="actMarkRead"><i class="bi bi-check2-all text-primary me-2"></i>Mark as Read</button></li>
                      <li><button class="dropdown-item" id="actMarkUnread"><i class="bi bi-envelope-exclamation text-warning me-2"></i>Mark as Unread</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item" id="actViewUser"><i class="bi bi-person-badge text-navy me-2"></i>View User Profile</button></li>
                      <li><button class="dropdown-item" id="actArchiveConv"><i class="bi bi-archive text-secondary me-2"></i>Archive Inquiry</button></li>
                      <li><button class="dropdown-item text-danger fw-semibold" id="actDeleteConv"><i class="bi bi-trash3 me-2"></i>Delete Inquiry Thread</button></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- PROPERTY / INQUIRY CONTEXT BANNER -->
              <div class="px-3 py-2 bg-light-custom border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2" id="propertyMiniCard">
                <div class="d-flex align-items-center gap-3 min-w-0">
                  <img src="../assets/images/properties/house-1.jpg" class="rounded-3 border border-light-custom object-fit-cover flex-shrink-0" style="width: 48px; height: 48px;" alt="Property Thumbnail" id="miniCardImg">
                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="miniCardTitle">2 Bedroom House for Rent – Kandy</h6>
                      <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-8" id="miniCardPropertyId">#PROP-2026-01</span>
                    </div>
                    <span class="fs-8 text-muted me-3" id="miniCardLocation"><i class="bi bi-geo-alt me-1 text-danger"></i>Peradeniya, Kandy</span>
                    <span class="fs-8 fw-bold text-success" id="miniCardPrice">Rs. 45,000 / month</span>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-2 ms-auto">
                  <a href="../property-details.php" class="btn btn-outline-primary btn-sm fs-8 fw-medium rounded-pill" target="_blank" id="btnMiniCardView">
                    <i class="bi bi-box-arrow-up-right me-1"></i>View Property
                  </a>
                </div>
              </div>

              <!-- CHAT MESSAGES SCROLL AREA -->
              <div class="overflow-y-auto flex-grow-1 p-3 p-md-4 custom-scrollbar bg-light-subtle d-flex flex-column gap-3" id="chatMessageArea">

                <!-- Date Divider -->
                <div class="text-center my-2">
                  <span class="badge bg-white text-muted border border-light-custom rounded-pill fs-8 px-3 py-1 fw-normal shadow-xs">September 08, 2026</span>
                </div>

                <!-- Message 1 (Owner - Left Aligned) -->
                <div class="chat-bubble-wrapper bubble-left" data-message-id="MSG-2001" data-sender-type="user">
                  <div class="d-flex align-items-start gap-2">
                    <div class="avatar-circle-sm bg-navy text-white fw-bold flex-shrink-0">KP</div>
                    <div class="chat-bubble shadow-xs bg-white text-navy border border-light-custom rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-navy">Kasun Perera (Owner)</span>
                        <span class="fs-8 text-muted">10:40 AM</span>
                      </div>
                      <p class="small mb-1">Hello Admin team, I uploaded my deed document for property #PROP-2026-01 verification. Please check and approve.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-muted">
                        <i class="bi bi-check2-all text-primary"></i> Received
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Message 2 (Admin - Right Aligned) -->
                <div class="chat-bubble-wrapper bubble-right ms-auto" data-message-id="MSG-2002" data-sender-type="admin">
                  <div class="d-flex align-items-start gap-2 flex-row-reverse">
                    <div class="avatar-circle-sm bg-primary text-white fw-bold flex-shrink-0">AD</div>
                    <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-warning"><i class="bi bi-shield-check me-1"></i>System Admin</span>
                        <span class="fs-8 text-white-50">10:42 AM</span>
                      </div>
                      <p class="small mb-1">Hello Kasun, we received your submission. Our verification team is reviewing it and will update your listing status within 2 hours.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-white-50">
                        <i class="bi bi-check2-all text-info"></i> Delivered
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Message 3 (Owner - Left Aligned) -->
                <div class="chat-bubble-wrapper bubble-left" data-message-id="MSG-2003" data-sender-type="user">
                  <div class="d-flex align-items-start gap-2">
                    <div class="avatar-circle-sm bg-navy text-white fw-bold flex-shrink-0">KP</div>
                    <div class="chat-bubble shadow-xs bg-white text-navy border border-light-custom rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-navy">Kasun Perera (Owner)</span>
                        <span class="fs-8 text-muted">10:45 AM</span>
                      </div>
                      <p class="small mb-1">Thank you very much! I submitted my ownership document via email as well.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-muted">
                        <i class="bi bi-check2-all text-primary"></i> Received
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- ADMIN MESSAGE INPUT TYPE BAR -->
              <div class="p-3 bg-white border-top border-light-custom">
                <form id="adminSendMessageForm" class="d-flex gap-2">
                  <input type="text" class="form-control border-light-custom shadow-none" id="adminMessageInput" placeholder="Type reply message to user..." required>
                  <button class="btn btn-primary fw-bold px-4 shadow-soft text-nowrap" type="submit" id="btnAdminSendMessage">
                    <i class="bi bi-send-fill me-1"></i>Send
                  </button>
                </form>
              </div>

            </div>

          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- MOBILE FILTER OFFCANVAS -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
    <div class="offcanvas-header border-bottom border-light-custom">
      <h5 class="offcanvas-title fw-bold text-navy" id="filterOffcanvasLabel"><i class="bi bi-funnel me-2 text-primary"></i>Filter Inquiries</h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="mb-3">
        <label class="form-label small fw-semibold text-navy">User Type</label>
        <select class="form-select border-light-custom shadow-none" id="mobileFilterUserType">
          <option value="all" selected>All</option>
          <option value="owner_admin">Admin ↔ Owner</option>
          <option value="customer_admin">Admin ↔ Customer</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label small fw-semibold text-navy">Thread Status</label>
        <select class="form-select border-light-custom shadow-none" id="mobileFilterStatus">
          <option value="all" selected>All</option>
          <option value="unread">Unread</option>
          <option value="read">Read</option>
          <option value="active">Active</option>
          <option value="closed">Closed</option>
          <option value="blocked">Blocked</option>
        </select>
      </div>

      <div class="d-flex gap-2">
        <button type="button" class="btn btn-light border flex-fill fw-medium" id="btnMobileClearFilters">Clear</button>
        <button type="button" class="btn btn-primary flex-fill fw-bold" data-bs-dismiss="offcanvas" id="btnMobileApplyFilters">Apply Filters</button>
      </div>
    </div>
  </div>

  <!-- CONVERSATION DETAILS MODAL -->
  <div class="modal fade" id="messageDetailsModal" tabindex="-1" aria-labelledby="messageDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="messageDetailsModalLabel"><i class="bi bi-info-circle text-primary me-2"></i>Inquiry Metadata</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3 small">
          <div class="table-responsive">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                  <td class="text-muted fw-semibold" style="width: 140px;">Thread ID:</td>
                  <td class="fw-bold text-navy" id="mdConversationId">#201</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">User Role:</td>
                  <td id="mdUserRole">Owner</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">User Details:</td>
                  <td id="mdUser">Kasun Perera (ID: USR-401)</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">Subject / Context:</td>
                  <td id="mdSubject">Property Listing Verification Inquiry</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">Property Listing:</td>
                  <td id="mdProperty">2 Bedroom House (PROP-2026-01)</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">Created Date:</td>
                  <td id="mdCreatedDate">2026-09-01</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold">Last Activity:</td>
                  <td id="mdLastDate">2026-09-08 10:45 AM</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-secondary btn-sm fw-medium rounded-pill px-4" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ACTION CONFIRMATION MODAL -->
  <div class="modal fade" id="actionConfirmModal" tabindex="-1" aria-labelledby="actionConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3" id="confirmModalIcon">
            <i class="bi bi-exclamation-triangle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="actionConfirmModalLabel">Confirm Action</h5>
          <p class="small text-muted mb-4" id="confirmModalBodyText">Are you sure you want to delete this support thread?</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnConfirmAction">Proceed</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-messages.js"></script>
</body>
</html>