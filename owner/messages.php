<?php $activePage = 'messages'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages &amp; Support - RentSriLanka Owner Portal</title>

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
            <h1 class="h3 fw-bold text-navy mb-1">Messages</h1>
            <p class="text-muted mb-0">Communicate with customers and RentSriLanka support.</p>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap ms-auto">
            <button class="btn btn-outline-primary btn-sm fw-bold rounded-pill px-3 shadow-soft" id="btnOpenContactAdminModal">
              <i class="bi bi-headset me-1"></i>Contact Admin
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
                <span class="text-muted fs-8 fw-medium">Unread Messages</span>
                <div class="stat-icon-xs bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-envelope-exclamation-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-unread-messages">3</h4>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Customer Messages</span>
                <div class="stat-icon-xs bg-teal-subtle text-teal rounded-circle"><i class="bi bi-people-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-customer-convs">3</h4>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fs-8 fw-medium">Admin / Support</span>
                <div class="stat-icon-xs bg-danger-subtle text-danger rounded-circle"><i class="bi bi-shield-lock-fill"></i></div>
              </div>
              <h4 class="fw-bold text-navy mb-0" id="stat-admin-convs">1</h4>
            </div>
          </div>
        </div>

        <!-- MAIN MESSAGING INTERFACE CARD -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden owner-chat-card" data-owner-id="OWN-401">
          <div class="row g-0 h-100">

            <!-- LEFT COLUMN: CONVERSATION LIST (35% Desktop / Full Mobile) -->
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
                    <button class="nav-link py-1.5 px-2 rounded-2 tab-type-btn" id="tab-type-customer" type="button" data-type="customer">
                      Customers <span class="badge bg-teal text-white rounded-pill ms-1" id="badge-type-cust">2</span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link py-1.5 px-2 rounded-2 tab-type-btn" id="tab-type-admin" type="button" data-type="admin">
                      Admin <span class="badge bg-danger rounded-pill ms-1" id="badge-type-admin">1</span>
                    </button>
                  </li>
                </ul>

                <!-- SEARCH BAR -->
                <div class="input-group input-group-sm">
                  <span class="input-group-text bg-white border-light-custom text-muted"><i class="bi bi-search"></i></span>
                  <input type="text" class="form-control border-light-custom shadow-none" id="conversationSearchInput" placeholder="Search messages by name, property, email or topic...">
                  <button class="btn btn-white border border-light-custom text-muted" type="button" id="btnClearSearch" title="Clear search"><i class="bi bi-x-lg"></i></button>
                </div>
              </div>

              <!-- SKELETON LOADING UI (HIDDEN BY JS WHEN LOADED) -->
              <div class="p-3 d-none" id="chatListSkeleton">
                <div class="skeleton-item mb-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <div class="skeleton-avatar"></div>
                    <div class="flex-grow-1"><div class="skeleton-line w-75"></div><div class="skeleton-line w-50"></div></div>
                  </div>
                  <div class="skeleton-line w-100"></div>
                </div>
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

                <!-- Thread 1: Customer (Active / Unread) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item active"
                  data-conversation-id="CONV-101"
                  data-conversation-type="customer"
                  data-owner-id="OWN-401"
                  data-customer-id="CUST-802"
                  data-customer-name="Nimal Fernando"
                  data-customer-email="nimal.f@example.com"
                  data-customer-phone="+94 71 987 6543"
                  data-customer-location="Kandy, Sri Lanka"
                  data-customer-since="Jan 2025"
                  data-customer-inquiries="5"
                  data-property-id="PROP-2026-01"
                  data-property-title="2 Bedroom House for Rent – Kandy"
                  data-property-location="Peradeniya, Kandy"
                  data-property-price="Rs. 45,000 / month"
                  data-property-status="Available"
                  data-property-image="../assets/images/properties/house-1.jpg"
                  data-subject="Property Availability Inquiry"
                  data-status="unread"
                  data-timestamp="10:45 AM">
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
                        <span class="fs-8 text-muted ms-1 text-nowrap">10:45 AM</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <img src="../assets/images/properties/house-1.jpg" class="rounded object-fit-cover flex-shrink-0" style="width: 20px; height: 20px;" alt="Property Thumb">
                        <span class="fs-8 text-navy text-truncate fw-semibold">2 Bed House – Kandy</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg fw-semibold">Can I visit the property tomorrow?</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-success rounded-pill badge-unread">2</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 2: Admin Support (Unread) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-301"
                  data-conversation-type="admin"
                  data-owner-id="OWN-401"
                  data-admin-id="ADM-001"
                  data-admin-name="RentSriLanka Support"
                  data-admin-role="Verification Desk"
                  data-subject="Property Verification #PROP-2026-09"
                  data-property-id="PROP-2026-09"
                  data-property-title="Single Student Room near Campus"
                  data-status="unread"
                  data-timestamp="09:15 AM">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-navy text-white fw-bold border border-warning"><i class="bi bi-shield-check text-warning"></i></div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="System Online"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">RentSriLanka Support</span>
                          <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-9 px-1.5 py-0.5 rounded">ADMIN</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">09:15 AM</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <i class="bi bi-shield-exclamation text-danger fs-8"></i>
                        <span class="fs-8 text-danger text-truncate fw-bold">Subject: Property Verification</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg fw-semibold">Please upload ownership deed document for #PROP-2026-09.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-danger rounded-pill badge-unread">1</span>
                    </div>
                  </div>
                </button>

                <!-- Thread 3: Customer (Read) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-102"
                  data-conversation-type="customer"
                  data-owner-id="OWN-401"
                  data-customer-id="CUST-805"
                  data-customer-name="Anusha Ranasinghe"
                  data-customer-email="anusha.r@example.com"
                  data-customer-phone="+94 70 333 8899"
                  data-customer-location="Colombo, Sri Lanka"
                  data-customer-since="Mar 2025"
                  data-customer-inquiries="3"
                  data-property-id="PROP-2026-04"
                  data-property-title="Luxury Modern Annex near Colombo"
                  data-property-location="Rajagiriya, Colombo"
                  data-property-price="Rs. 65,000 / month"
                  data-property-status="Available"
                  data-property-image="../assets/images/properties/annex-1.jpg"
                  data-subject="Advance Deposit Payment"
                  data-status="read"
                  data-timestamp="Yesterday">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-purple text-white fw-bold">AR</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle" title="Offline"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Anusha Ranasinghe</span>
                          <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-9 px-1.5 py-0.5 rounded">CUSTOMER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">Yesterday</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <img src="../assets/images/properties/annex-1.jpg" class="rounded object-fit-cover flex-shrink-0" style="width: 20px; height: 20px;" alt="Property Thumb">
                        <span class="fs-8 text-navy text-truncate fw-medium">Luxury Modern Annex</span>
                      </div>

                      <p class="fs-8 text-secondary mb-0 text-truncate text-last-msg">Thank you, I will transfer the advance payment by Friday.</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <i class="bi bi-check2-all text-info fs-8" title="Read"></i>
                    </div>
                  </div>
                </button>

                <!-- Thread 4: Customer (Closed) -->
                <button type="button" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom conversation-item"
                  data-conversation-id="CONV-104"
                  data-conversation-type="customer"
                  data-owner-id="OWN-401"
                  data-customer-id="CUST-812"
                  data-customer-name="Saman Kumara"
                  data-customer-email="saman.k@example.com"
                  data-customer-phone="+94 78 111 2244"
                  data-customer-location="Galle, Sri Lanka"
                  data-customer-since="Feb 2026"
                  data-customer-inquiries="2"
                  data-property-id="PROP-2026-01"
                  data-property-title="2 Bedroom House for Rent – Kandy"
                  data-property-location="Peradeniya, Kandy"
                  data-property-price="Rs. 45,000 / month"
                  data-property-status="Available"
                  data-property-image="../assets/images/properties/house-1.jpg"
                  data-subject="Rental Period Terms"
                  data-status="closed"
                  data-timestamp="28 Aug">
                  <div class="d-flex align-items-start gap-2.5">
                    <div class="position-relative flex-shrink-0">
                      <div class="avatar-circle bg-secondary text-white fw-bold">SK</div>
                      <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle" title="Offline"></span>
                    </div>

                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-1.5 min-w-0">
                          <span class="fw-bold text-navy text-truncate small">Saman Kumara</span>
                          <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-9 px-1.5 py-0.5 rounded">CUSTOMER</span>
                        </div>
                        <span class="fs-8 text-muted ms-1 text-nowrap">28 Aug</span>
                      </div>

                      <div class="d-flex align-items-center gap-1.5 mb-1">
                        <img src="../assets/images/properties/house-1.jpg" class="rounded object-fit-cover flex-shrink-0" style="width: 20px; height: 20px;" alt="Property Thumb">
                        <span class="fs-8 text-navy text-truncate fw-medium">2 Bed House – Kandy</span>
                      </div>

                      <p class="fs-8 text-muted mb-0 text-truncate text-last-msg"><i class="bi bi-lock me-1"></i>[Conversation Closed]</p>
                    </div>

                    <div class="d-flex flex-column align-items-end justify-content-between h-100 flex-shrink-0 ms-1">
                      <span class="badge bg-light text-secondary border border-light-custom fs-8">Closed</span>
                    </div>
                  </div>
                </button>

              </div>

              <!-- EMPTY CONVERSATION LIST STATES -->
              <div class="p-5 text-center my-auto d-none" id="emptyCustomerList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-person-chat display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No customer messages</h6>
                <p class="small text-muted mb-3">When customers contact you about your properties, their conversations will appear here.</p>
                <a href="my-properties.php" class="btn btn-outline-primary btn-sm rounded-pill fw-medium">
                  <i class="bi bi-houses me-1"></i>View My Properties
                </a>
              </div>

              <div class="p-5 text-center my-auto d-none" id="emptyAdminList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-headset display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No support conversations</h6>
                <p class="small text-muted mb-3">Contact RentSriLanka support if you need assistance with property verification or account settings.</p>
                <button type="button" class="btn btn-primary btn-sm rounded-pill fw-bold" id="btnEmptyContactAdmin">
                  <i class="bi bi-plus-circle me-1"></i>Contact Admin
                </button>
              </div>

              <div class="p-5 text-center my-auto d-none" id="emptyAllList">
                <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
                  <i class="bi bi-chat-square-dots display-6"></i>
                </div>
                <h6 class="fw-bold text-navy mb-1">No messages yet</h6>
                <p class="small text-muted mb-3">Your conversations with customers and RentSriLanka support will appear here.</p>
                <div class="d-flex justify-content-center gap-2">
                  <a href="my-properties.php" class="btn btn-outline-primary btn-sm rounded-pill fw-medium">My Properties</a>
                  <button type="button" class="btn btn-primary btn-sm rounded-pill fw-bold" id="btnEmptyAllAdmin">Contact Admin</button>
                </div>
              </div>

            </div>

            <!-- RIGHT COLUMN: ACTIVE CHAT VIEW (65% Desktop / Full Mobile) -->
            <div class="col-lg-7 col-xl-8 d-flex flex-column h-100 chat-col-view" id="chatViewColumn">

              <!-- CUSTOMER HEADER (VISIBLE WHEN CUSTOMER CONVERSATION IS ACTIVE) -->
              <div class="p-3 bg-white border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2 shadow-xs" id="chatHeaderCustomer">
                <div class="d-flex align-items-center gap-2.5 min-w-0">
                  <button class="btn btn-light btn-sm border me-1 d-lg-none" type="button" id="btnBackToListCust" aria-label="Back to conversations">
                    <i class="bi bi-arrow-left"></i>
                  </button>

                  <div class="position-relative flex-shrink-0">
                    <div class="avatar-circle-md bg-teal text-white fw-bold" id="headerCustAvatar">NF</div>
                    <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                  </div>

                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="headerCustName">Nimal Fernando</h6>
                      <span class="badge bg-teal-subtle text-teal border border-teal-subtle fs-9 rounded-pill">CUSTOMER</span>
                      <span class="badge bg-success-subtle text-success fs-8 rounded-pill">Online</span>
                    </div>
                    <p class="fs-8 text-muted mb-0 text-truncate" id="headerCustMeta">Customer ID: #CUST-802 · Thread: #CONV-101</p>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-2 ms-auto">
                  <button class="btn btn-light border btn-sm text-navy fw-medium d-none d-sm-inline-flex align-items-center gap-1.5" id="btnViewCustModal" data-bs-toggle="modal" data-bs-target="#customerDetailsModal">
                    <i class="bi bi-person-badge"></i>Customer Info
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-navy fw-medium dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical me-1"></i>More
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item" id="actCustMarkRead"><i class="bi bi-check2-all text-primary me-2"></i>Mark as Read</button></li>
                      <li><button class="dropdown-item" id="actCustMarkUnread"><i class="bi bi-envelope-exclamation text-warning me-2"></i>Mark as Unread</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../property-details.php" target="_blank" id="actCustViewProperty"><i class="bi bi-house-door text-info me-2"></i>View Property Listing</a></li>
                      <li><button class="dropdown-item" id="actCustTriggerDetails"><i class="bi bi-person text-teal me-2"></i>View Customer Details</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item" id="actCustArchive"><i class="bi bi-archive text-secondary me-2"></i>Archive Conversation</button></li>
                      <li><button class="dropdown-item" id="actCustClose"><i class="bi bi-x-circle text-warning me-2"></i>Close Conversation</button></li>
                      <li><button class="dropdown-item text-danger" id="actCustBlock"><i class="bi bi-slash-circle me-2"></i>Block Customer</button></li>
                      <li><button class="dropdown-item text-danger" id="actCustReport"><i class="bi bi-flag me-2"></i>Report Customer</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger fw-semibold" id="actCustDelete"><i class="bi bi-trash3 me-2"></i>Delete Conversation</button></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- ADMIN HEADER (VISIBLE WHEN ADMIN CONVERSATION IS ACTIVE) -->
              <div class="p-3 bg-white border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2 shadow-xs d-none" id="chatHeaderAdmin">
                <div class="d-flex align-items-center gap-2.5 min-w-0">
                  <button class="btn btn-light btn-sm border me-1 d-lg-none" type="button" id="btnBackToListAdmin" aria-label="Back to conversations">
                    <i class="bi bi-arrow-left"></i>
                  </button>

                  <div class="position-relative flex-shrink-0">
                    <div class="avatar-circle-md bg-navy text-white fw-bold border border-warning"><i class="bi bi-shield-check text-warning"></i></div>
                    <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                  </div>

                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="headerAdminName">RentSriLanka Support</h6>
                      <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-9 rounded-pill">ADMIN / SUPPORT</span>
                      <span class="badge bg-success-subtle text-success fs-8 rounded-pill">Available</span>
                    </div>
                    <p class="fs-8 text-danger fw-bold mb-0 text-truncate" id="headerAdminSubject">Subject: Property Verification #PROP-2026-09</p>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-2 ms-auto">
                  <button class="btn btn-light border btn-sm text-navy fw-medium d-none d-sm-inline-flex align-items-center gap-1.5" id="btnViewAdminModal" data-bs-toggle="modal" data-bs-target="#adminDetailsModal">
                    <i class="bi bi-info-circle"></i>Support Details
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-navy fw-medium dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical me-1"></i>More
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item" id="actAdminMarkRead"><i class="bi bi-check2-all text-primary me-2"></i>Mark as Read</button></li>
                      <li><button class="dropdown-item" id="actAdminMarkUnread"><i class="bi bi-envelope-exclamation text-warning me-2"></i>Mark as Unread</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item" id="actAdminArchive"><i class="bi bi-archive text-secondary me-2"></i>Archive Thread</button></li>
                      <li><button class="dropdown-item" id="actAdminClose"><i class="bi bi-x-circle text-warning me-2"></i>Close Ticket</button></li>
                      <li><button class="dropdown-item text-danger" id="actAdminReportIssue"><i class="bi bi-exclamation-triangle me-2"></i>Report Issue to Admin</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger fw-semibold" id="actAdminDelete"><i class="bi bi-trash3 me-2"></i>Delete Conversation</button></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- PROPERTY CONTEXT BANNER (FOR CUSTOMER CONVERSATIONS) -->
              <div class="px-3 py-2 bg-light-custom border-bottom border-light-custom d-flex align-items-center justify-content-between flex-wrap gap-2" id="propertyContextBanner">
                <div class="d-flex align-items-center gap-2.5 min-w-0">
                  <img src="../assets/images/properties/house-1.jpg" class="rounded-3 border border-light-custom object-fit-cover flex-shrink-0" style="width: 48px; height: 48px;" alt="Property Thumbnail" id="bannerPropertyImg">
                  <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0 text-truncate fs-7" id="bannerPropertyTitle">2 Bedroom House for Rent – Kandy</h6>
                      <span class="badge bg-success-subtle text-success fs-8" id="bannerPropertyStatus">Available</span>
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

              <!-- ADMIN AUDIT INFO BANNER (FOR ADMIN CONVERSATIONS) -->
              <div class="px-3 py-1.5 bg-danger-subtle text-danger-emphasis border-bottom border-danger-subtle fs-8 d-flex align-items-center justify-content-between d-none" id="adminNoticeBanner">
                <span><i class="bi bi-shield-lock-fill me-1"></i><strong>Official Support Channel:</strong> RentSriLanka Support Desk Team. Response time: &lt; 2 hours.</span>
                <span class="badge bg-danger text-white">Verified Official</span>
              </div>

              <!-- CHAT MESSAGES SCROLL AREA -->
              <div class="overflow-y-auto flex-grow-1 p-3 p-md-4 custom-scrollbar bg-light-subtle d-flex flex-column gap-3" id="chatMessageArea">

                <!-- Date Divider -->
                <div class="text-center my-1">
                  <span class="badge bg-white text-muted border border-light-custom rounded-pill fs-8 px-3 py-1 fw-normal shadow-xs">Today, September 08</span>
                </div>

                <!-- Message 1 (Customer - Left) -->
                <div class="chat-bubble-wrapper bubble-left" data-message-id="MSG-1001" data-sender-type="customer">
                  <div class="d-flex align-items-start gap-2">
                    <div class="avatar-circle-sm bg-teal text-white fw-bold flex-shrink-0">NF</div>
                    <div class="chat-bubble shadow-xs bg-white text-navy border border-light-custom rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-teal">Nimal Fernando (Customer)</span>
                        <span class="fs-8 text-muted">10:40 AM</span>
                      </div>
                      <p class="small mb-1">Hello, is this house in Peradeniya, Kandy still available for rent?</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-muted">
                        <i class="bi bi-check2-all text-primary"></i> Delivered
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Message 2 (Owner - Right) -->
                <div class="chat-bubble-wrapper bubble-right ms-auto" data-message-id="MSG-1002" data-sender-type="owner">
                  <div class="d-flex align-items-start gap-2 flex-row-reverse">
                    <div class="avatar-circle-sm bg-navy text-white fw-bold flex-shrink-0">KP</div>
                    <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-success-subtle">Kasun Perera (Owner)</span>
                        <span class="fs-8 text-white-50">10:42 AM</span>
                      </div>
                      <p class="small mb-1">Yes, it is available. We are offering it for Rs. 45,000 per month with 4 months key deposit required.</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-white-50">
                        <i class="bi bi-check2-all text-info"></i> Read
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Message 3 (Customer - Left) -->
                <div class="chat-bubble-wrapper bubble-left" data-message-id="MSG-1003" data-sender-type="customer">
                  <div class="d-flex align-items-start gap-2">
                    <div class="avatar-circle-sm bg-teal text-white fw-bold flex-shrink-0">NF</div>
                    <div class="chat-bubble shadow-xs bg-white text-navy border border-light-custom rounded-4 p-3 max-w-75">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <span class="fw-bold fs-8 text-teal">Nimal Fernando (Customer)</span>
                        <span class="fs-8 text-muted">10:45 AM</span>
                      </div>
                      <p class="small mb-1">Can I visit the property tomorrow afternoon around 3:00 PM for an inspection?</p>
                      <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-muted">
                        <i class="bi bi-check2-all text-primary"></i> Delivered
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- CHAT INPUT AREA (STICKY BOTTOM) -->
              <div class="p-3 bg-white border-top border-light-custom position-sticky bottom-0">
                
                <!-- Attachment Preview Pill Container -->
                <div class="mb-2 d-none" id="attachmentPreviewContainer">
                  <div class="badge bg-light text-navy border border-light-custom p-2 rounded-3 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-paperclip text-primary"></i>
                    <span class="fs-8 text-truncate max-w-150" id="attachmentFileName">deed_doc.pdf</span>
                    <button type="button" class="btn-close fs-8 shadow-none" id="btnRemoveAttachment" aria-label="Remove attachment"></button>
                  </div>
                </div>

                <form id="chatSendMessageForm" class="d-flex align-items-center gap-2">
                  <div class="input-group">
                    <!-- File Attachment Button -->
                    <button class="btn btn-light border border-light-custom text-secondary" type="button" id="btnAttachFile" title="Attach Document/Photo">
                      <i class="bi bi-paperclip"></i>
                    </button>
                    <input type="file" id="hiddenFileInput" class="d-none" accept="image/*,.pdf,.doc,.docx">

                    <!-- Emoji Picker Button Placeholder -->
                    <button class="btn btn-light border border-light-custom text-secondary" type="button" id="btnEmojiPicker" title="Insert Emoji">
                      <i class="bi bi-emoji-smile"></i>
                    </button>

                    <!-- Message Text Input -->
                    <textarea class="form-control border-light-custom shadow-none py-2 custom-scrollbar" id="messageTextInput" rows="1" placeholder="Type your message... (Enter to send, Shift+Enter for new line)" autocomplete="off" required></textarea>
                  </div>

                  <!-- Send Button -->
                  <button type="submit" class="btn btn-primary fw-bold px-3 py-2 rounded-3 d-flex align-items-center gap-1 shadow-soft" id="btnSendMessage">
                    <i class="bi bi-send-fill"></i>
                    <span class="d-none d-sm-inline">Send</span>
                  </button>
                </form>

                <div class="d-flex align-items-center justify-content-between mt-1.5 fs-8 text-muted">
                  <span id="inputDisclaimerText"><i class="bi bi-shield-check me-1 text-success"></i>Direct Marketplace Messaging</span>
                  <span>Press <strong>Enter</strong> to send</span>
                </div>
              </div>

            </div>

            <!-- NO SELECTED CONVERSATION PLACEHOLDER -->
            <div class="col-lg-7 col-xl-8 d-none align-items-center justify-content-center text-center p-5 bg-light-subtle h-100" id="noSelectedChatState">
              <div class="max-w-350">
                <div class="stat-icon-lg bg-white text-primary shadow-soft rounded-circle mx-auto mb-3">
                  <i class="bi bi-chat-left-text display-5"></i>
                </div>
                <h5 class="fw-bold text-navy mb-1">Select a conversation</h5>
                <p class="small text-muted mb-0">Choose a customer or support conversation from the left thread list to view messages and reply.</p>
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
        <label class="form-label small fw-semibold text-navy">Conversation Type</label>
        <select class="form-select border-light-custom shadow-none" id="mobileFilterType">
          <option value="all" selected>All (Customers &amp; Support)</option>
          <option value="customer">Customers Only</option>
          <option value="admin">Admin / Support Only</option>
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

      <div class="mb-4">
        <label class="form-label small fw-semibold text-navy">Sort Order</label>
        <select class="form-select border-light-custom shadow-none" id="mobileSortSelect">
          <option value="newest" selected>Newest First</option>
          <option value="oldest">Oldest First</option>
          <option value="unread">Unread First</option>
        </select>
      </div>

      <div class="d-flex gap-2">
        <button type="button" class="btn btn-light border flex-fill fw-medium" id="btnMobileResetFilters">Reset</button>
        <button type="button" class="btn btn-primary flex-fill fw-bold" data-bs-dismiss="offcanvas" id="btnMobileApplyFilters">Apply Filters</button>
      </div>
    </div>
  </div>

  <!-- CONTACT ADMIN / SUPPORT MODAL -->
  <div class="modal fade" id="contactAdminModal" tabindex="-1" aria-labelledby="contactAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="contactAdminModalLabel"><i class="bi bi-headset text-primary me-2"></i>Contact RentSriLanka Support</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="contactAdminForm">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Support Category <span class="text-danger">*</span></label>
              <select class="form-select border-light-custom shadow-none" id="supportCategorySelect" required>
                <option value="" selected disabled>Select topic category...</option>
                <option value="Account Support">Account &amp; Profile Support</option>
                <option value="Property Verification">Property Listing Verification</option>
                <option value="Property Issue">Listing Display Issue</option>
                <option value="Payment">Billing &amp; Subscription Inquiry</option>
                <option value="Report">Report Tenant Misconduct</option>
                <option value="Technical Issue">Technical Platform Error</option>
                <option value="Other">Other Inquiry</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Subject / Ticket Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control border-light-custom shadow-none" id="supportSubjectInput" placeholder="e.g. Verification check for #PROP-2026-09" required>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Message Details <span class="text-danger">*</span></label>
              <textarea class="form-control border-light-custom shadow-none" id="supportMessageText" rows="4" placeholder="Describe your request clearly for admin desk..." required></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Attachment (Optional Deed / Document / Screenshot)</label>
              <input type="file" class="form-control border-light-custom shadow-none" id="supportAttachmentInput" accept="image/*,.pdf,.doc,.docx">
              <span class="fs-8 text-muted mt-1 d-block"><i class="bi bi-shield-lock me-1"></i>Secure upload pipeline for verification identity records.</span>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSubmitContactAdmin">Send Message</button>
        </div>
      </div>
    </div>
  </div>

  <!-- CUSTOMER DETAILS MODAL -->
  <div class="modal fade" id="customerDetailsModal" tabindex="-1" aria-labelledby="customerDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="customerDetailsModalLabel"><i class="bi bi-person-badge text-teal me-2"></i>Customer Profile Metadata</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <div class="text-center mb-3">
            <div class="avatar-circle-lg bg-teal text-white fw-bold mx-auto mb-2" id="custModalAvatar">NF</div>
            <h5 class="fw-bold text-navy mb-0" id="custModalName">Nimal Fernando</h5>
            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fs-8 mt-1"><i class="bi bi-check-circle-fill me-1"></i>Verified Marketplace Renter</span>
          </div>

          <div class="table-responsive border border-light-custom rounded-3 p-2 small">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                  <td class="text-muted fw-semibold" style="width: 140px;"><i class="bi bi-telephone text-primary me-2"></i>Phone:</td>
                  <td class="fw-bold text-navy" id="custModalPhone">+94 71 987 6543</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-envelope text-primary me-2"></i>Email:</td>
                  <td id="custModalEmail">nimal.f@example.com</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-geo-alt text-danger me-2"></i>Location:</td>
                  <td id="custModalLocation">Kandy, Sri Lanka</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-calendar-check text-info me-2"></i>Member Since:</td>
                  <td id="custModalSince">Jan 2025</td>
                </tr>
                <tr>
                  <td class="text-muted fw-semibold"><i class="bi bi-card-checklist text-warning me-2"></i>Total Inquiries:</td>
                  <td class="fw-bold text-navy" id="custModalInquiries">5 Inquiries Submitted</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="fs-8 text-muted text-center mt-3 mb-0"><i class="bi bi-shield-lock me-1"></i>Information exposed strictly as allowed by customer privacy permissions.</p>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-secondary btn-sm fw-medium rounded-pill px-4" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ADMIN DETAILS MODAL -->
  <div class="modal fade" id="adminDetailsModal" tabindex="-1" aria-labelledby="adminDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="adminDetailsModalLabel"><i class="bi bi-shield-check text-primary me-2"></i>Support Desk Details</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3 text-center">
          <div class="avatar-circle-lg bg-navy text-white fw-bold mx-auto mb-2 border border-warning">
            <i class="bi bi-shield-check text-warning fs-3"></i>
          </div>
          <h5 class="fw-bold text-navy mb-0">RentSriLanka Official Support</h5>
          <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill fs-8 mt-1">Platform Admin Team</span>

          <div class="p-3 bg-light-custom rounded-3 border border-light-custom text-start small mt-3">
            <p class="mb-1"><strong>Status:</strong> <span class="text-success fw-bold"><i class="bi bi-circle-fill fs-9 me-1"></i>Available</span></p>
            <p class="mb-1"><strong>Desk Hours:</strong> Mon - Sat (8:30 AM - 6:00 PM)</p>
            <p class="mb-0 text-muted fs-8">Private administrative employee details and backend credentials are strictly masked for platform security compliance.</p>
          </div>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-secondary btn-sm fw-medium rounded-pill px-4" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- REPORT CUSTOMER MODAL -->
  <div class="modal fade" id="reportCustomerModal" tabindex="-1" aria-labelledby="reportCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="reportCustomerModalLabel"><i class="bi bi-flag-fill text-warning me-2"></i>Report Customer</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="reportCustomerForm">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Reason for Report</label>
              <select class="form-select border-light-custom shadow-none" id="reportCustReasonSelect" required>
                <option value="" selected disabled>Select violation reason...</option>
                <option value="Spam">Spam Messages</option>
                <option value="Scam">Scam / Fraudulent Offer</option>
                <option value="Harassment">Harassment / Abusive Behavior</option>
                <option value="Inappropriate Content">Inappropriate Content</option>
                <option value="Fake Information">Fake Information / Impersonation</option>
                <option value="Suspicious Activity">Suspicious Activity</option>
                <option value="Other">Other Violation</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Additional Details</label>
              <textarea class="form-control border-light-custom shadow-none" id="reportCustDetailsText" rows="4" placeholder="Describe the violation for admin team audit..." required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-warning fw-bold text-dark" id="btnSubmitReportCust">Submit Report</button>
        </div>
      </div>
    </div>
  </div>

  <!-- REPORT ISSUE TO ADMIN MODAL -->
  <div class="modal fade" id="reportIssueModal" tabindex="-1" aria-labelledby="reportIssueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="reportIssueModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>Report an Issue to Admin</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="reportIssueForm">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Issue Category</label>
              <select class="form-select border-light-custom shadow-none" id="issueCategorySelect" required>
                <option value="" selected disabled>Select issue type...</option>
                <option value="Property Issue">Property Listing Dispute</option>
                <option value="Account Issue">Account Configuration Issue</option>
                <option value="Technical Issue">Technical / Bug Issue</option>
                <option value="Safety Issue">Safety &amp; Compliance Concern</option>
                <option value="Other">Other Issue</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Description</label>
              <textarea class="form-control border-light-custom shadow-none" id="issueDescriptionText" rows="4" placeholder="Detail the issue encountered..." required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Screenshot Attachment (Optional)</label>
              <input type="file" class="form-control border-light-custom shadow-none" accept="image/*,.pdf">
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger fw-bold" id="btnSubmitIssueAdmin">Submit Issue</button>
        </div>
      </div>
    </div>
  </div>

  <!-- CONFIRMATION MODAL (GENERIC ACTIONS: ARCHIVE, DELETE, BLOCK) -->
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
  <script src="assets/js/owner-messages.js"></script>
</body>
</html>