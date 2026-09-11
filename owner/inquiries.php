<?php $activePage = 'inquiries'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Inquiries - RentSriLanka</title>
  
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
            <h1 class="h3 fw-bold text-navy mb-1">Property Inquiries</h1>
            <p class="text-muted mb-0">Manage tenant leads, view message details, and respond directly.</p>
          </div>
          <button type="button" class="btn btn-outline-primary btn-sm fw-medium rounded-pill px-3" id="btnMarkAllRead">
            <i class="bi bi-check2-all me-1"></i>Mark all as read
          </button>
        </div>

        <!-- STATS CARDS ROW (TOTAL, NEW, REPLIED, CLOSED) -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Inquiries</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-inbox-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0" id="statTotalCount">38</h2>
              <span class="fs-8 text-muted">All-time received</span>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">New Leads</span>
                <div class="stat-icon-sm bg-danger-subtle text-danger rounded-circle"><i class="bi bi-envelope-exclamation-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0" id="statNewCount">5</h2>
              <span class="fs-8 text-danger fw-semibold">Requires action</span>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Replied</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-reply-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0" id="statRepliedCount">28</h2>
              <span class="fs-8 text-success fw-medium">Messages answered</span>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Closed / Archived</span>
                <div class="stat-icon-sm bg-secondary-subtle text-secondary rounded-circle"><i class="bi bi-archive-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0" id="statClosedCount">5</h2>
              <span class="fs-8 text-muted">Completed leads</span>
            </div>
          </div>
        </div>

        <!-- TABS & SEARCH BAR -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="row g-2 align-items-center justify-content-between">
            <div class="col-12 col-md-auto">
              <ul class="nav nav-pills custom-owner-tabs gap-1" id="inquiryTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active rounded-pill px-3 py-1-5 small fw-medium" id="tab-inq-all" data-bs-toggle="pill" data-status="all" type="button" role="tab">All (5)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-inq-new" data-bs-toggle="pill" data-status="New" type="button" role="tab">New (2)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-inq-read" data-bs-toggle="pill" data-status="Read" type="button" role="tab">Read (1)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-inq-replied" data-bs-toggle="pill" data-status="Replied" type="button" role="tab">Replied (1)</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-inq-closed" data-bs-toggle="pill" data-status="Closed" type="button" role="tab">Closed (1)</button>
                </li>
              </ul>
            </div>

            <div class="col-12 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="inquirySearchInput" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search by name, property, or text...">
              </div>
            </div>
          </div>
        </div>

        <!-- DESKTOP INQUIRIES TABLE VIEW -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden d-none d-md-block mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="inquiriesTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Renter</th>
                  <th>Property</th>
                  <th>Message Preview</th>
                  <th>Preferred Contact</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="inquiriesTableBody">
                
                <!-- Inquiry 1 (New) -->
                <tr class="inquiry-row-item unread-row" data-id="101" data-status="New" data-name="Kusum Perera" data-phone="0771234567" data-email="kusum.p@example.lk" data-prop="2-Bed House in Peradeniya" data-method="WhatsApp" data-date="Today, 10:42 AM" data-message="Hello, I saw your house listing in Peradeniya. Is it available for inspection tomorrow afternoon around 4 PM? We are a family of 3.">
                  <td class="ps-4">
                    <div class="fw-bold text-navy">Kusum Perera</div>
                    <div class="fs-8 text-muted">077****567</div>
                  </td>
                  <td class="fw-semibold text-teal text-truncate" style="max-width: 160px;">2-Bed House in Peradeniya</td>
                  <td class="text-muted text-truncate" style="max-width: 220px;">Is it available for inspection tomorrow afternoon around 4 PM?</td>
                  <td>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"><i class="bi bi-whatsapp me-1"></i>WhatsApp</span>
                  </td>
                  <td class="text-muted">Today, 10:42 AM</td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">New</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-inquiry" title="View Details"><i class="bi bi-eye"></i></button>
                      <a href="../messages.php" class="btn btn-light border text-primary-custom" title="Reply in Messages"><i class="bi bi-reply"></i></a>
                      <button class="btn btn-light border text-secondary btn-mark-read" title="Mark as Read"><i class="bi bi-check2"></i></button>
                      <button class="btn btn-light border text-danger btn-archive-inquiry" title="Archive / Delete"><i class="bi bi-archive"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Inquiry 2 (New) -->
                <tr class="inquiry-row-item unread-row" data-id="102" data-status="New" data-name="Kamal Silva" data-phone="0719876543" data-email="kamal.silva@gmail.com" data-prop="Furnished Annex in Nugegoda" data-method="Call" data-date="Yesterday, 3:15 PM" data-message="Hi Nimal, I would like to know if vehicle parking is available for 2 cars at the Nugegoda Annex. Please give me a call back.">
                  <td class="ps-4">
                    <div class="fw-bold text-navy">Kamal Silva</div>
                    <div class="fs-8 text-muted">071****543</div>
                  </td>
                  <td class="fw-semibold text-teal text-truncate" style="max-width: 160px;">Furnished Annex in Nugegoda</td>
                  <td class="text-muted text-truncate" style="max-width: 220px;">I would like to know if vehicle parking is available for 2 cars...</td>
                  <td>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill"><i class="bi bi-telephone me-1"></i>Call</span>
                  </td>
                  <td class="text-muted">Yesterday, 3:15 PM</td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">New</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-inquiry" title="View Details"><i class="bi bi-eye"></i></button>
                      <a href="../messages.php" class="btn btn-light border text-primary-custom" title="Reply in Messages"><i class="bi bi-reply"></i></a>
                      <button class="btn btn-light border text-secondary btn-mark-read" title="Mark as Read"><i class="bi bi-check2"></i></button>
                      <button class="btn btn-light border text-danger btn-archive-inquiry" title="Archive / Delete"><i class="bi bi-archive"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Inquiry 3 (Read) -->
                <tr class="inquiry-row-item" data-id="103" data-status="Read" data-name="Saman Fernando" data-phone="0751112233" data-email="saman.f@outlook.com" data-prop="Luxury House in Rajagiriya" data-method="Message" data-date="Sep 05, 2026" data-message="Good day, what is the minimum advance deposit key money required for the Rajagiriya Luxury House? Is 6 months required or negotiable?">
                  <td class="ps-4">
                    <div class="fw-semibold text-navy">Saman Fernando</div>
                    <div class="fs-8 text-muted">075****233</div>
                  </td>
                  <td class="fw-semibold text-teal text-truncate" style="max-width: 160px;">Luxury House in Rajagiriya</td>
                  <td class="text-muted text-truncate" style="max-width: 220px;">What is the minimum advance deposit key money required?</td>
                  <td>
                    <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle rounded-pill"><i class="bi bi-chat-text me-1"></i>Message</span>
                  </td>
                  <td class="text-muted">Sep 05, 2026</td>
                  <td><span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">Read</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-inquiry" title="View Details"><i class="bi bi-eye"></i></button>
                      <a href="../messages.php" class="btn btn-light border text-primary-custom" title="Reply in Messages"><i class="bi bi-reply"></i></a>
                      <button class="btn btn-light border text-danger btn-archive-inquiry" title="Archive / Delete"><i class="bi bi-archive"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Inquiry 4 (Replied) -->
                <tr class="inquiry-row-item" data-id="104" data-status="Replied" data-name="Dilani Wickramasinghe" data-phone="0784445566" data-email="dilani.w@yahoo.com" data-prop="AC Boarding Room in Colombo 03" data-method="WhatsApp" data-date="Sep 04, 2026" data-message="Is the boarding room suitable for a female university student? Are utility bills included in the 28k rent?">
                  <td class="ps-4">
                    <div class="fw-semibold text-navy">Dilani Wickramasinghe</div>
                    <div class="fs-8 text-muted">078****566</div>
                  </td>
                  <td class="fw-semibold text-teal text-truncate" style="max-width: 160px;">AC Boarding Room in Colombo 03</td>
                  <td class="text-muted text-truncate" style="max-width: 220px;">Is the boarding room suitable for a female student?</td>
                  <td>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"><i class="bi bi-whatsapp me-1"></i>WhatsApp</span>
                  </td>
                  <td class="text-muted">Sep 04, 2026</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Replied</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-inquiry" title="View Details"><i class="bi bi-eye"></i></button>
                      <a href="../messages.php" class="btn btn-light border text-primary-custom" title="View Conversation"><i class="bi bi-chat-dots"></i></a>
                      <button class="btn btn-light border text-danger btn-archive-inquiry" title="Archive / Delete"><i class="bi bi-archive"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Inquiry 5 (Closed) -->
                <tr class="inquiry-row-item" data-id="105" data-status="Closed" data-name="Ruwan Jayawardena" data-phone="0723332211" data-email="ruwan.j@domain.lk" data-prop="3-Bed House with Garden" data-method="Call" data-date="Sep 02, 2026" data-message="Thank you Nimal, I inspected the property with my family yesterday and we have already signed the agreement for Katugastota house.">
                  <td class="ps-4">
                    <div class="fw-semibold text-navy">Ruwan Jayawardena</div>
                    <div class="fs-8 text-muted">072****211</div>
                  </td>
                  <td class="fw-semibold text-teal text-truncate" style="max-width: 160px;">3-Bed House with Garden</td>
                  <td class="text-muted text-truncate" style="max-width: 220px;">Thank you, we signed the agreement for Katugastota house.</td>
                  <td>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill"><i class="bi bi-telephone me-1"></i>Call</span>
                  </td>
                  <td class="text-muted">Sep 02, 2026</td>
                  <td><span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Closed</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-inquiry" title="View Details"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-danger btn-archive-inquiry" title="Archive / Delete"><i class="bi bi-archive"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW -->
        <div class="d-md-none" id="inquiriesMobileContainer">
          
          <!-- Card 1 -->
          <div class="card property-card inquiry-card-item border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3 unread-row" data-id="101" data-status="New" data-name="Kusum Perera" data-phone="0771234567" data-email="kusum.p@example.lk" data-prop="2-Bed House in Peradeniya" data-method="WhatsApp" data-date="Today, 10:42 AM" data-message="Hello, I saw your house listing in Peradeniya. Is it available for inspection tomorrow afternoon around 4 PM? We are a family of 3.">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                <h2 class="h6 fw-bold text-navy mb-0">Kusum Perera</h2>
                <span class="fs-8 text-muted">0771234567</span>
              </div>
              <span class="badge bg-danger-subtle text-danger">New</span>
            </div>
            <p class="small text-teal fw-semibold mb-1"><i class="bi bi-house-door me-1"></i>2-Bed House in Peradeniya</p>
            <p class="small text-muted mb-2 text-truncate">Is it available for inspection tomorrow afternoon around 4 PM?</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2 mt-auto">
              <span class="badge bg-success-subtle text-success"><i class="bi bi-whatsapp me-1"></i>WhatsApp</span>
              <div class="btn-group btn-group-sm">
                <button class="btn btn-light border btn-view-inquiry"><i class="bi bi-eye"></i></button>
                <a href="../messages.php" class="btn btn-light border text-primary-custom"><i class="bi bi-reply"></i></a>
                <button class="btn btn-light border text-danger btn-archive-inquiry"><i class="bi bi-archive"></i></button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card property-card inquiry-card-item border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3 unread-row" data-id="102" data-status="New" data-name="Kamal Silva" data-phone="0719876543" data-email="kamal.silva@gmail.com" data-prop="Furnished Annex in Nugegoda" data-method="Call" data-date="Yesterday, 3:15 PM" data-message="Hi Nimal, I would like to know if vehicle parking is available for 2 cars at the Nugegoda Annex. Please give me a call back.">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                <h2 class="h6 fw-bold text-navy mb-0">Kamal Silva</h2>
                <span class="fs-8 text-muted">0719876543</span>
              </div>
              <span class="badge bg-danger-subtle text-danger">New</span>
            </div>
            <p class="small text-teal fw-semibold mb-1"><i class="bi bi-house-door me-1"></i>Furnished Annex in Nugegoda</p>
            <p class="small text-muted mb-2 text-truncate">I would like to know if vehicle parking is available for 2 cars...</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2 mt-auto">
              <span class="badge bg-primary-subtle text-primary"><i class="bi bi-telephone me-1"></i>Call</span>
              <div class="btn-group btn-group-sm">
                <button class="btn btn-light border btn-view-inquiry"><i class="bi bi-eye"></i></button>
                <a href="../messages.php" class="btn btn-light border text-primary-custom"><i class="bi bi-reply"></i></a>
                <button class="btn btn-light border text-danger btn-archive-inquiry"><i class="bi bi-archive"></i></button>
              </div>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- INQUIRY DETAIL BOOTSTRAP MODAL -->
  <div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-labelledby="inquiryDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="inquiryDetailModalLabel"><i class="bi bi-envelope-open text-primary-custom me-2"></i>Inquiry Details</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          
          <div class="p-3 bg-light-custom rounded-3 border border-light-custom mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <h6 class="fw-bold text-navy mb-0" id="modalRenterName">Kusum Perera</h6>
              <span class="badge bg-danger-subtle text-danger" id="modalStatusBadge">New</span>
            </div>
            <p class="small text-muted mb-0" id="modalInquiryDate"><i class="bi bi-clock me-1"></i>Today, 10:42 AM</p>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-semibold text-navy mb-1">Interested Property</label>
            <div class="fw-bold text-teal small" id="modalPropTitle"><i class="bi bi-house-door me-1"></i>2-Bed House in Peradeniya</div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-semibold text-navy mb-1">Renter Contact Details</label>
            <div class="d-flex flex-wrap gap-2">
              <a href="tel:0771234567" id="modalPhoneBtn" class="btn btn-sm btn-outline-primary fw-medium"><i class="bi bi-telephone me-1"></i><span id="modalPhoneText">0771234567</span></a>
              <a href="https://wa.me/94771234567" target="_blank" id="modalWhatsappBtn" class="btn btn-sm btn-whatsapp fw-medium"><i class="bi bi-whatsapp me-1"></i>WhatsApp</a>
              <a href="mailto:renter@example.com" id="modalEmailBtn" class="btn btn-sm btn-light border text-navy fw-medium"><i class="bi bi-envelope me-1"></i>Email</a>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-semibold text-navy mb-1">Message</label>
            <div class="p-3 bg-white border border-light-custom rounded-3 small text-secondary" id="modalMessageText">
              Hello, I saw your house listing in Peradeniya. Is it available for inspection tomorrow afternoon around 4 PM? We are a family of 3.
            </div>
          </div>

        </div>
        <div class="modal-footer border-top border-light-custom d-flex justify-content-between">
          <button type="button" class="btn btn-light border text-danger btn-sm fw-medium" id="modalBtnArchive"><i class="bi bi-archive me-1"></i>Archive Inquiry</button>
          <a href="../messages.php" class="btn btn-primary btn-sm fw-bold px-3"><i class="bi bi-chat-dots me-1"></i>Open Chat Thread</a>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/owner-inquiries.js"></script>
</body>
</html>