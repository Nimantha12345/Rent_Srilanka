<?php $activePage = 'messages'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages &amp; Support Desk - RentSriLanka Admin</title>

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
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">Admin Messages &amp; Support Desk</h1>
            <p class="text-muted mb-0">Communicate directly with Property Owners and Customers across Sri Lanka.</p>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap ms-auto">
            <button class="btn btn-primary btn-sm fw-bold rounded-pill px-3 shadow-soft" id="btnOpenNewMessageModal">
              <i class="bi bi-plus-circle me-1"></i>New Direct Message
            </button>
            <button class="btn btn-light border btn-sm rounded-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas">
              <i class="bi bi-funnel me-1"></i>Filter
            </button>
          </div>
        </div>

        <!-- MESSAGE STATISTICS CARDS -->
        <div class="row g-3 mb-3">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Total Conversations</span>
                <div class="stat-icon-xs bg-primary-subtle text-primary rounded-circle"><i class="bi bi-chat-left-text-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-total-convs">4</h4>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Unread Inquiries</span>
                <div class="stat-icon-xs bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-envelope-exclamation-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-unread-messages">3</h4>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Owner Threads</span>
                <div class="stat-icon-xs bg-navy-subtle text-navy rounded-circle"><i class="bi bi-house-gear-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-owner-convs">2</h4>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Customer Threads</span>
                <div class="stat-icon-xs bg-teal-subtle text-teal rounded-circle"><i class="bi bi-people-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-customer-convs">2</h4>
            </div>
          </div>
        </div>

        <!-- MAIN MESSAGING INTERFACE CARD -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden admin-chat-card">
          <div class="row g-0 h-100">

            <!-- LEFT COLUMN: CONVERSATION LIST -->
            <div class="col-lg-5 col-xl-4 border-end border-light-custom d-flex flex-column h-100 chat-col-list" id="chatListColumn">
              
              <!-- SEARCH & TYPE TABS HEADER -->
              <div class="p-3 bg-light-custom border-bottom border-light-custom">
                
                <!-- UNIFIED MESSAGE TYPE TABS -->
                <ul class="nav nav-pills nav-justified mb-2 p-1 bg-white border border-light-custom rounded-3 fs-8 fw-bold" id="typeTabNav" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active py-1.5 px-2 rounded-2 tab-type-btn" id="tab-type-all" type="button" data-type="all">
                      All <span class="badge bg-secondary rounded-pill ms-1" id="badge-type-all">4</span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link py-1.5 px-2 rounded-2 tab-type-btn" id="tab-type-owner" type="button" data-type="owner">
                      Owners <span class="badge bg-navy text-white rounded-pill ms-1" id="badge-type-owner">2</span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link py-1.5 px-2 rounded-2 tab-type-btn" id="tab-type-customer" type="button" data-type="customer">
                      Customers <span class="badge bg-teal text-white rounded-pill ms-1" id="badge-type-cust">2</span>
                    </button>
                  </li>
                </ul>

                <!-- SEARCH BAR -->
                <div class="input-group input-group-sm">
                  <span class="input-group-text bg-white border-light-custom text-muted"><i class="bi bi-search"></i></span>
                  <input type="text" class="form-control border-light-custom shadow-none" id="conversationSearchInput" placeholder="Search by user name, property, email or topic...">
                  <button class="btn btn-white border border-light-custom text-muted" type="button" id="btnClearSearch" title="Clear search"><i class="bi bi-x-lg"></i></button>
                </div>
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

              <!-- CONVERSATION LIST CONTAINER -->
              <div class="overflow-y-auto flex-grow-1 custom-scrollbar list-group list-group-flush" id="conversationListContainer">

                <!-- Thread 1: Owner (Active / Unread) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item active"
                  data-conversation-id="CONV-201"
                  data-conversation-type="owner"
                  data-user-id="OWN-401"
                  data-user-name="Kasun Perera"
                  data-user-email="kasun.p@example.com"
                  data-user-phone="+94 77 123 4567"
                  data-user-location="Kandy, Sri Lanka"
                  data-user-since="Jan 2025"
                  data-property-id="PROP-2026-01"
                  data-property-title="2 Bedroom House for Rent – Kandy"
                  data-property-location="Peradeniya, Kandy"
                  data-property-price="Rs. 45,000 / month"
                  data-property-image="../assets/images/properties/house-1.jpg"
                  data-subject="Property Verification Request"
                  data-status="unread"
                  data-timestamp="10:45 AM">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-navy text-white fw-bold">KP</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Online"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Kasun Perera</span>
                          <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-9 px-1.5 py-0.5 rounded">OWNER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">10:45 AM</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <img src="../assets/images/properties/house-1.jpg" class="rounded object-fit-cover flex-shrink-0" style="width: 20px; height: 20px;" alt="Property Thumb">
                        <span class="fs-8 text-navy text-truncate fw-semibold">#PROP-2026-01 Verification</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg fw-semibold">I submitted my ownership deed document via email.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-success rounded-pill badge-unread">1</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 2: Customer (Unread) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-202"
                  data-conversation-type="customer"
                  data-user-id="CUST-802"
                  data-user-name="Nimal Fernando"
                  data-user-email="nimal.f@example.com"
                  data-user-phone="+94 71 987 6543"
                  data-user-location="Colombo, Sri Lanka"
                  data-user-since="Mar 2025"
                  data-property-id="PROP-2026-04"
                  data-property-title="Luxury Modern Annex near Colombo"
                  data-property-location="Rajagiriya, Colombo"
                  data-property-price="Rs. 65,000 / month"
                  data-property-image="../assets/images/properties/annex-1.jpg"
                  data-subject="Payment & Refund Inquiry"
                  data-status="unread"
                  data-timestamp="09:15 AM">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-teal text-white fw-bold">NF</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Online"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Nimal Fernando</span>
                          <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-9 px-1.5 py-0.5 rounded">CUSTOMER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">09:15 AM</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <i class="bi bi-credit-card text-teal fs-8"></i>
                        <span class="fs-8 text-teal text-truncate fw-bold">Subject: Refund Issue</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg fw-semibold">Can you help me check my advance deposit transaction status?</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-danger rounded-pill badge-unread">1</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 3: Owner (Read) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-203"
                  data-conversation-type="owner"
                  data-user-id="OWN-402"
                  data-user-name="Sunil Jayasinghe"
                  data-user-email="sunil.j@example.com"
                  data-user-phone="+94 76 555 1234"
                  data-user-location="Gampaha, Sri Lanka"
                  data-user-since="Feb 2025"
                  data-property-id="PROP-2026-09"
                  data-property-title="Single Student Room near Campus"
                  data-property-location="Nugegoda, Colombo"
                  data-property-price="Rs. 18,000 / month"
                  data-property-image="../assets/images/properties/room-1.jpg"
                  data-subject="Featured Listing Upgrade"
                  data-status="read"
                  data-timestamp="Yesterday">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-purple text-white fw-bold">SJ</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle" title="Offline"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Sunil Jayasinghe</span>
                          <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-9 px-1.5 py-0.5 rounded">OWNER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">Yesterday</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <img src="../assets/images/properties/room-1.jpg" class="rounded object-fit-cover flex-shrink-0" style="width: 20px; height: 20px;" alt="Property Thumb">
                        <span class="fs-8 text-navy text-truncate fw-medium">Student Room Nugegoda</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg">Thank you, I will upgrade my subscription package tomorrow.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <i class="bi bi-check2-all text-info fs-8" title="Read"></i>
                    </div>
                  </div>
                </button>

                <!-- Thread 4: Customer (Closed) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-204"
                  data-conversation-type="customer"
                  data-user-id="CUST-812"
                  data-user-name="Anusha Ranasinghe"
                  data-user-email="anusha.r@example.com"
                  data-user-phone="+94 70 333 8899"
                  data-user-location="Galle, Sri Lanka"
                  data-user-since="Feb 2026"
                  data-property-id="PROP-2026-12"
                  data-property-title="3 Room Upper Floor Unit – Galle"
                  data-property-location="Unawatuna, Galle"
                  data-property-price="Rs. 50,000 / month"
                  data-property-image="../assets/images/properties/unit-1.jpg"
                  data-subject="Account Security Inquiry"
                  data-status="closed"
                  data-timestamp="28 Aug">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-secondary text-white fw-bold">AR</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle" title="Offline"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Anusha Ranasinghe</span>
                          <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-9 px-1.5 py-0.5 rounded">CUSTOMER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">28 Aug</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <i class="bi bi-shield-check text-muted fs-8"></i>
                        <span class="fs-8 text-muted text-truncate fw-medium">Password Reset Issue</span>
                      </div>

                      <p class="fs-8 text-muted mb-0 text-truncate text-last-msg"><i class="bi bi-lock me-1"></i>[Ticket Closed by Admin]</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-light text-secondary border border-light-custom fs-8">Closed</span>
                    </div>
                  </div>
                </button>

              </div>

              <!-- EMPTY CONVERSATION LIST STATES -->
              <div class="p-5 text-center my-auto d-none" id="emptyOwnerList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-house-gear display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No owner conversations</h6>
                <p class="small text-muted mb-3">Inquiries from property owners regarding verification or listings will appear here.</p>
              </div>

              <div class="p-5 text-center my-auto d-none" id="emptyCustomerList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-people display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No customer conversations</h6>
                <p class="small text-muted mb-3">Support inquiries or complaints from renters will appear here.</p>
              </div>

              <div class="p-5 text-center my-auto d-none" id="emptyAllList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-chat-square-dots display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No messages found</h6>
                <p class="small text-muted mb-3">There are currently no active support threads or messages.</p>
              </div>

            </div>

            <!-- RIGHT COLUMN: ACTIVE CHAT VIEW -->
            <div class="col-lg-7 col-xl-8 d-flex flex-column h-100 chat-col-view" id="chatViewColumn">

              <!-- CHAT HEADER -->
              <div class="p-3 bg-white border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2 shadow-xs" id="chatHeader">
                <div class="d-flex align-items-center gap-2.5 min-w-0">
                  <button class="btn btn-light btn-sm border me-1 d-lg-none" type="button" id="btnBackToList" aria-label="Back to conversations">
                    <i class="bi bi-arrow-left"></i>
                  </button>

                  <div class="position-relative flex-shrink-0">
                    <div class="avatar-circle-md bg-navy text-white fw-bold" id="headerUserAvatar">KP</div>
                    <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                  </div>

                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="headerUserName">Kasun Perera</h6>
                      <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-9 rounded-pill" id="headerUserRoleBadge">OWNER</span>
                      <span class="badge bg-success-subtle text-success fs-8 rounded-pill">Online</span>
                    </div>
                    <p class="fs-8 text-muted mb-0 text-truncate" id="headerUserMeta">User ID: #OWN-401 · Thread: #CONV-201</p>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-2 ms-auto">
                  <button class="btn btn-light border btn-sm text-navy fw-medium d-none d-sm-inline-flex align-items-center gap-1.5" id="btnViewUserModal" data-bs-toggle="modal" data-bs-target="#userDetailsModal">
                    <i class="bi bi-person-badge"></i>User Info
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-navy fw-medium dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical me-1"></i>Admin Actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item" id="actMarkRead"><i class="bi bi-check2-all text-primary me-2"></i>Mark as Read</button></li>
                      <li><button class="dropdown-item" id="actMarkUnread"><i class="bi bi-envelope-exclamation text-warning me-2"></i>Mark as Unread</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../property-details.php" target="_blank" id="actViewProperty"><i class="bi bi-house-door text-info me-2"></i>View Property Listing</a></li>
                      <li><button class="dropdown-item" id="actTriggerUserDetails"><i class="bi bi-person text-teal me-2"></i>View User Profile</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item" id="actArchive"><i class="bi bi-archive text-secondary me-2"></i>Archive Conversation</button></li>
                      <li><button class="dropdown-item" id="actClose"><i class="bi bi-x-circle text-warning me-2"></i>Close Support Ticket</button></li>
                      <li><button class="dropdown-item text-danger fw-semibold" id="actDelete"><i class="bi bi-trash3 me-2"></i>Delete Thread</button></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- PROPERTY CONTEXT BANNER -->
              <div class="px-3 py-2 bg-light-custom border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2" id="propertyContextBanner">
                <div class="d-flex align-items-center gap-2.5 min-w-0">
                  <img src="../assets/images/properties/house-1.jpg" class="rounded-3 border border-light-custom object-fit-cover flex-shrink-0" style="width: 48px; height: 48px;" alt="Property Thumbnail" id="bannerPropertyImg">
                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="bannerPropertyTitle">2 Bedroom House for Rent – Kandy</h6>
                      <span class="badge bg-success-subtle text-success fs-8" id="bannerPropertyStatus">Active Listing</span>
                    </div>
                    <span class="fs-8 text-muted me-3" id="bannerPropertyLocation"><i class="bi bi-geo-alt me-1 text-danger"></i>Peradeniya, Kandy</span>
                    <span class="fs-8 fw-bold text-success" id="bannerPropertyPrice">Rs. 45,000 / month</span>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-2 ms-auto">
                  <a href="../property-details.php" class="btn btn-outline-primary btn-sm fs-8 fw-medium rounded-pill px-3" target="_blank" id="btnBannerViewProperty">
                    <i class="bi bi-box-arrow-up-right me-1"></i>View Property
                  </a>
                </div>
              </div>

              <!-- CHAT MESSAGES SCROLL AREA -->
              <div class="overflow-y-auto flex-grow-1 p-3 p-md-4 custom-scrollbar bg-light-subtle d-flex flex-column gap-3" id="chatMessageArea">

                <!-- Date Divider -->
                <div class="text-center my-1">
                  <span class="badge bg-white text-muted border border-light-custom rounded-pill fs-8 px-3 py-1 fw-normal shadow-xs">Today, September 08</span>
                </div>

                <!-- Message 1 (User - Left) -->
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

                <!-- Message 2 (Admin - Right) -->
                <div class="chat-bubble-wrapper bubble-right ms-auto" data-message-id="MSG-2002" data-sender-type="admin">
                  <div class="d-flex align-items-start gap-2 flex-row-reverse">
                    <div class="avatar-circle-sm bg-primary text-white fw-bold flex-shrink-0">AD</div>
                    <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-warning"><i class="bi bi-shield-check me-1"></i>System Admin Desk</span>
                        <span class="fs-8 text-white-50">10:42 AM</span>
                      </div>
                      <p class="small mb-1">Hello Kasun, we received your submission. Our verification team is reviewing it and will update your listing status shortly.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-white-50">
                        <i class="bi bi-check2-all text-info"></i> Sent
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Message 3 (User - Left) -->
                <div class="chat-bubble-wrapper bubble-left" data-message-id="MSG-2003" data-sender-type="user">
                  <div class="d-flex align-items-start gap-2">
                    <div class="avatar-circle-sm bg-navy text-white fw-bold flex-shrink-0">KP</div>
                    <div class="chat-bubble shadow-xs bg-white text-navy border border-light-custom rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-navy">Kasun Perera (Owner)</span>
                        <span class="fs-8 text-muted">10:45 AM</span>
                      </div>
                      <p class="small mb-1">Thank you very much! I submitted my ownership deed document via email as well.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-muted">
                        <i class="bi bi-check2-all text-primary"></i> Received
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- CHAT INPUT AREA -->
              <div class="p-3 bg-white border-top border-light-custom position-sticky bottom-0">
                
                <!-- Attachment Preview Pill Container -->
                <div class="mb-2 d-none" id="attachmentPreviewContainer">
                  <div class="badge bg-light text-navy border border-light-custom p-2 rounded-3 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-paperclip text-primary"></i>
                    <span class="fs-8 text-truncate max-w-150" id="attachmentFileName">document.pdf</span>
                    <button type="button" class="btn-close fs-8 shadow-none" id="btnRemoveAttachment" aria-label="Remove attachment"></button>
                  </div>
                </div>

                <form id="chatSendMessageForm" class="d-flex align-items-center gap-2">
                  <div class="input-group">
                    <button class="btn btn-light border border-light-custom text-secondary" type="button" id="btnAttachFile" title="Attach Document/Photo">
                      <i class="bi bi-paperclip"></i>
                    </button>
                    <input type="file" id="hiddenFileInput" class="d-none" accept="image/*,.pdf,.doc,.docx">

                    <button class="btn btn-light border border-light-custom text-secondary" type="button" id="btnEmojiPicker" title="Insert Emoji">
                      <i class="bi bi-emoji-smile"></i>
                    </button>

                    <textarea class="form-control border-light-custom shadow-none py-2 custom-scrollbar" id="messageTextInput" rows="1" placeholder="Type official response as Admin..." autocomplete="off" required></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary fw-bold px-3 py-2 rounded-3 d-flex align-items-center gap-1 shadow-soft" id="btnSendMessage">
                    <i class="bi bi-send-fill"></i>
                    <span class="d-none d-sm-inline">Send</span>
                  </button>
                </form>

                <div class="d-flex align-items-center justify-content-between mt-1.5 fs-8 text-muted">
                  <span><i class="bi bi-shield-lock me-1 text-primary"></i>Official RentSriLanka Admin Communication</span>
                  <span>Press <strong>Enter</strong> to send</span>
                </div>
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
      <h5 class="offcanvas-title fw-bold text-navy" id="filterOffcanvasLabel"><i class="bi bi-funnel me-2 text-primary"></i>Filter Conversations</h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="mb-3">
        <label class="form-label small fw-semibold text-navy">User Role Type</label>
        <select class="form-select border-light-custom shadow-none" id="mobileFilterType">
          <option value="all" selected>All (Owners &amp; Customers)</option>
          <option value="owner">Owners Only</option>
          <option value="customer">Customers Only</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label small fw-semibold text-navy">Thread Status</label>
        <select class="form-select border-light-custom shadow-none" id="mobileFilterStatus">
          <option value="all" selected>All Statuses</option>
          <option value="unread">Unread Messages</option>
          <option value="read">Read Messages</option>
          <option value="closed">Closed Threads</option>
        </select>
      </div>

      <div class="d-flex gap-2">
        <button type="button" class="btn btn-light border flex-fill fw-medium" id="btnMobileResetFilters">Reset</button>
        <button type="button" class="btn btn-primary flex-fill fw-bold" data-bs-dismiss="offcanvas" id="btnMobileApplyFilters">Apply Filters</button>
      </div>
    </div>
  </div>

  <!-- NEW DIRECT MESSAGE MODAL -->
  <div class="modal fade" id="newMessageModal" tabindex="-1" aria-labelledby="newMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="newMessageModalLabel"><i class="bi bi-plus-circle text-primary me-2"></i>New Direct Admin Message</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="newMessageForm">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Recipient Type <span class="text-danger">*</span></label>
              <select class="form-select border-light-custom shadow-none" id="newMsgUserRole" required>
                <option value="owner" selected>Property Owner</option>
                <option value="customer">Customer / Renter</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Select Recipient User <span class="text-danger">*</span></label>
              <select class="form-select border-light-custom shadow-none" id="newMsgUserSelect" required>
                <option value="" selected disabled>Select user account...</option>
                <option value="OWN-401">Kasun Perera (kasun.p@example.com)</option>
                <option value="OWN-402">Sunil Jayasinghe (sunil.j@example.com)</option>
                <option value="CUST-802">Nimal Fernando (nimal.f@example.com)</option>
                <option value="CUST-812">Anusha Ranasinghe (anusha.r@example.com)</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Subject / Topic <span class="text-danger">*</span></label>
              <input type="text" class="form-control border-light-custom shadow-none" id="newMsgSubjectInput" placeholder="e.g. Property Listing Verification Request" required>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Initial Message <span class="text-danger">*</span></label>
              <textarea class="form-control border-light-custom shadow-none" id="newMsgText" rows="4" placeholder="Type your official notification message..." required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSubmitNewMessage">Start Thread</button>
        </div>
      </div>
    </div>
  </div>

  <!-- USER DETAILS MODAL -->
  <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="userDetailsModalLabel"><i class="bi bi-person-badge text-primary me-2"></i>User Profile Metadata</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <div class="text-center mb-3">
            <div class="avatar-circle-lg bg-navy text-white fw-bold mx-auto mb-2" id="userModalAvatar">KP</div>
            <h5 class="fw-bold text-navy mb-0" id="userModalName">Kasun Perera</h5>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill fs-8 mt-1" id="userModalRoleBadge">Verified Property Owner</span>
          </div>

          <div class="table-responsive border border-light-custom rounded-3 p-2 small">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                  <td class="text-muted fw-semibold" style="width: 140px;"><i class="bi bi-telephone text-primary me-2"></i>Phone:</td>
                  <td class="fw-bold text-navy" id="userModalPhone">+94 77 123 4567</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-envelope text-primary me-2"></i>Email:</td>
                  <td id="userModalEmail">kasun.p@example.com</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-geo-alt text-danger me-2"></i>Location:</td>
                  <td id="userModalLocation">Kandy, Sri Lanka</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-calendar-check text-info me-2"></i>Member Since:</td>
                  <td id="userModalSince">Jan 2025</td>
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

  <!-- CONFIRMATION MODAL -->
  <div class="modal fade" id="actionConfirmModal" tabindex="-1" aria-labelledby="actionConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3" id="confirmModalIcon">
            <i class="bi bi-exclamation-triangle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="actionConfirmModalLabel">Confirm Action</h5>
          <p class="small text-muted mb-4" id="confirmModalBodyText">Are you sure you want to perform this action on the selected conversation thread?</p>
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