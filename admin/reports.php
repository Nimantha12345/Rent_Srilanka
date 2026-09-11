<?php $activePage = 'reports'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports & Moderation - RentSriLanka Admin</title>
  
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
            <h1 class="h3 fw-bold text-navy mb-1">Reports &amp; Moderation</h1>
            <p class="text-muted mb-0">Investigate user reports regarding fake listings, scam inquiries, wrong info, or inappropriate conduct.</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm fw-medium rounded-pill px-3" id="btnExportReportsCSV">
              <i class="bi bi-download me-1"></i>Export CSV
            </button>
          </div>
        </div>

        <!-- FILTERS BAR: SEARCH, REASON, STATUS, SORT DATE -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="row g-2 align-items-center">
            
            <!-- Search -->
            <div class="col-12 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="adminReportSearch" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search by Report ID, property, or reporter...">
              </div>
            </div>

            <!-- Report Reason Filter -->
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminReasonFilter">
                <option value="all">All Report Reasons</option>
                <option value="Fake Property">Fake Property</option>
                <option value="Scam">Scam</option>
                <option value="Wrong Information">Wrong Information</option>
                <option value="Already Rented">Already Rented</option>
                <option value="Duplicate Listing">Duplicate Listing</option>
                <option value="Inappropriate Content">Inappropriate Content</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <!-- Status Filter -->
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminReportStatusFilter">
                <option value="all">All Statuses</option>
                <option value="Pending">Pending (Requires Action)</option>
                <option value="Under Review">Under Review</option>
                <option value="Resolved">Resolved</option>
                <option value="Dismissed">Dismissed</option>
              </select>
            </div>

            <!-- Date Sort -->
            <div class="col-12 col-md-2">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminReportSortBy">
                <option value="newest">Sort: Newest</option>
                <option value="oldest">Sort: Oldest</option>
              </select>
            </div>

          </div>
        </div>

        <!-- DESKTOP REPORTS TABLE VIEW (VISIBLE ON LARGE SCREENS) -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden d-none d-md-block mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="adminReportsTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Report ID</th>
                  <th>Property</th>
                  <th>Reporter</th>
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="adminReportsTableBody">
                
                <!-- Report 1: Scam (Pending) -->
                <tr class="admin-report-row" 
                    data-report-id="REP-402" 
                    data-status="Pending" 
                    data-reason="Scam" 
                    data-prop-id="77102"
                    data-prop-title="Luxury Villa with Pool in Mount Lavinia" 
                    data-prop-price="LKR 180,000/mo"
                    data-prop-img="../assets/images/properties/house-1.jpg"
                    data-owner-name="Ruwan Silva"
                    data-owner-id="USR-8812"
                    data-reporter-name="Saman Fernando" 
                    data-reporter-email="saman.f@example.lk"
                    data-reporter-phone="+94 75 111 2233"
                    data-date="2026-09-07"
                    data-description="Landlord requested an advance wire transfer of LKR 50,000 before showing the property in person. Photos look stolen from a hotel website.">
                  <td class="ps-4 fw-bold text-navy">REP-402</td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-2 object-fit-cover" width="42" height="32" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 170px;">Luxury Villa in Mt Lavinia</div>
                        <div class="fs-8 text-muted">Ref: RSL-77102</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Saman Fernando</div>
                    <div class="fs-8 text-muted">saman.f@example.lk</div>
                  </td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-exclamation-triangle-fill me-1"></i>Scam</span></td>
                  <td class="text-muted">Today, 11:30 AM</td>
                  <td><span class="badge bg-danger text-white rounded-pill">Pending</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-report-review" data-report-id="REP-402" title="Review Report Details"><i class="bi bi-eye-fill me-1"></i>Review</button>
                      <button class="btn btn-light border text-secondary btn-report-dismiss" data-report-id="REP-402" title="Dismiss Report"><i class="bi bi-x-circle"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Report 2: Fake Property (Under Review) -->
                <tr class="admin-report-row" 
                    data-report-id="REP-398" 
                    data-status="Under Review" 
                    data-reason="Fake Property" 
                    data-prop-id="88102"
                    data-prop-title="Unfurnished Single Annex Room" 
                    data-prop-price="LKR 22,000/mo"
                    data-prop-img="../assets/images/properties/recent-1.jpg"
                    data-owner-name="Mahesh Gunasekara"
                    data-owner-id="USR-1004"
                    data-reporter-name="Kamal De Silva" 
                    data-reporter-email="kamal.ds@example.lk"
                    data-reporter-phone="+94 77 987 6543"
                    data-date="2026-09-05"
                    data-description="The property listed at this address does not exist. Address points to an empty commercial lot in Dehiwala.">
                  <td class="ps-4 fw-bold text-navy">REP-398</td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/recent-1.jpg" class="rounded-2 object-fit-cover" width="42" height="32" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 170px;">Single Annex Room</div>
                        <div class="fs-8 text-muted">Ref: RSL-88102</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Kamal De Silva</div>
                    <div class="fs-8 text-muted">kamal.ds@example.lk</div>
                  </td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle"><i class="bi bi-geo-alt-fill me-1"></i>Fake Property</span></td>
                  <td class="text-muted">Sep 05, 2026</td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Under Review</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-report-review" data-report-id="REP-398" title="Review Report Details"><i class="bi bi-eye-fill me-1"></i>Review</button>
                      <button class="btn btn-light border text-secondary btn-report-dismiss" data-report-id="REP-398" title="Dismiss Report"><i class="bi bi-x-circle"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Report 3: Wrong Information (Pending) -->
                <tr class="admin-report-row" 
                    data-report-id="REP-391" 
                    data-status="Pending" 
                    data-reason="Wrong Information" 
                    data-prop-id="84920"
                    data-prop-title="Two Storey Luxury House in Rajagiriya" 
                    data-prop-price="LKR 95,000/mo"
                    data-prop-img="../assets/images/properties/house-1.jpg"
                    data-owner-name="Nimal Perera"
                    data-owner-id="USR-1002"
                    data-reporter-name="Dilani Wickramasinghe" 
                    data-reporter-email="dilani.w@example.lk"
                    data-reporter-phone="+94 78 444 5566"
                    data-date="2026-09-04"
                    data-description="Listing says LKR 95,000/mo including electricity, but landlord insisted on an additional LKR 15,000 utility charge upon visiting.">
                  <td class="ps-4 fw-bold text-navy">REP-391</td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-2 object-fit-cover" width="42" height="32" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 170px;">Two Storey House</div>
                        <div class="fs-8 text-muted">Ref: RSL-84920</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Dilani Wickramasinghe</div>
                    <div class="fs-8 text-muted">dilani.w@example.lk</div>
                  </td>
                  <td><span class="badge bg-info-subtle text-info-emphasis border border-info-subtle"><i class="bi bi-info-circle-fill me-1"></i>Wrong Information</span></td>
                  <td class="text-muted">Sep 04, 2026</td>
                  <td><span class="badge bg-danger text-white rounded-pill">Pending</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-report-review" data-report-id="REP-391" title="Review Report Details"><i class="bi bi-eye-fill me-1"></i>Review</button>
                      <button class="btn btn-light border text-secondary btn-report-dismiss" data-report-id="REP-391" title="Dismiss Report"><i class="bi bi-x-circle"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Report 4: Already Rented (Resolved) -->
                <tr class="admin-report-row" 
                    data-report-id="REP-380" 
                    data-status="Resolved" 
                    data-reason="Already Rented" 
                    data-prop-id="74011"
                    data-prop-title="3-Bedroom House with Garden" 
                    data-prop-price="LKR 75,000/mo"
                    data-prop-img="../assets/images/properties/house-2.jpg"
                    data-owner-name="Nimal Perera"
                    data-owner-id="USR-1002"
                    data-reporter-name="Kasun Jayawardena" 
                    data-reporter-email="kasun.j@example.lk"
                    data-reporter-phone="+94 71 888 9900"
                    data-date="2026-08-28"
                    data-description="Landlord confirmed on phone that property was occupied two weeks ago, but listing is still active.">
                  <td class="ps-4 fw-bold text-navy">REP-380</td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/house-2.jpg" class="rounded-2 object-fit-cover" width="42" height="32" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 170px;">3-Bed House Garden</div>
                        <div class="fs-8 text-muted">Ref: RSL-74011</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Kasun Jayawardena</div>
                    <div class="fs-8 text-muted">kasun.j@example.lk</div>
                  </td>
                  <td><span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle"><i class="bi bi-check2-circle me-1"></i>Already Rented</span></td>
                  <td class="text-muted">Aug 28, 2026</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Resolved</span></td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light border btn-sm text-navy btn-report-review" data-report-id="REP-380" title="Review Report Details"><i class="bi bi-eye me-1"></i>View Log</button>
                  </td>
                </tr>

                <!-- Report 5: Duplicate Listing (Dismissed) -->
                <tr class="admin-report-row" 
                    data-report-id="REP-365" 
                    data-status="Dismissed" 
                    data-reason="Duplicate Listing" 
                    data-prop-id="81204"
                    data-prop-title="Modern 1-Bedroom Private Annex" 
                    data-prop-price="LKR 42,000/mo"
                    data-prop-img="../assets/images/properties/annex-1.jpg"
                    data-owner-name="Kamal De Silva"
                    data-owner-id="USR-1003"
                    data-reporter-name="System Auto-Scanner" 
                    data-reporter-email="bot@rentsrilanka.lk"
                    data-reporter-phone="System Bot"
                    data-date="2026-08-20"
                    data-description="Auto flag triggered due to similar title keywords. Verified manual review proved distinct upper and lower units.">
                  <td class="ps-4 fw-bold text-navy">REP-365</td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/annex-1.jpg" class="rounded-2 object-fit-cover" width="42" height="32" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 170px;">1-Bed Private Annex</div>
                        <div class="fs-8 text-muted">Ref: RSL-81204</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">System Bot</div>
                    <div class="fs-8 text-muted">bot@rentsrilanka.lk</div>
                  </td>
                  <td><span class="badge bg-purple-subtle text-purple border border-purple-subtle"><i class="bi bi-files me-1"></i>Duplicate Listing</span></td>
                  <td class="text-muted">Aug 20, 2026</td>
                  <td><span class="badge bg-light text-muted border border-light-custom">Dismissed</span></td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light border btn-sm text-navy btn-report-review" data-report-id="REP-365" title="Review Report Details"><i class="bi bi-eye me-1"></i>View Log</button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW (VISIBLE ON SMALL SCREENS) -->
        <div class="d-md-none" id="adminReportsMobileContainer">
          
          <!-- Card 1 -->
          <div class="card property-card admin-report-card border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3" data-report-id="REP-402" data-status="Pending" data-reason="Scam">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                <span class="fw-bold text-navy">REP-402</span>
                <span class="badge bg-danger text-white rounded-pill ms-2">Pending</span>
              </div>
              <span class="badge bg-danger-subtle text-danger"><i class="bi bi-exclamation-triangle-fill me-1"></i>Scam</span>
            </div>
            <h2 class="h6 fw-bold text-navy mb-1 text-truncate">Luxury Villa Villa in Mt Lavinia</h2>
            <p class="small text-muted mb-2"><i class="bi bi-person me-1"></i>Reported by: Saman Fernando</p>
            <p class="fs-8 text-navy bg-light-custom p-2 rounded-3 mb-3 text-truncate">"Landlord requested an advance wire transfer of LKR 50,000..."</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2">
              <span class="fs-8 text-muted">Today, 11:30 AM</span>
              <button class="btn btn-primary btn-sm rounded-3 fw-bold btn-report-review" data-report-id="REP-402">Review Report</button>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card property-card admin-report-card border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3" data-report-id="REP-398" data-status="Under Review" data-reason="Fake Property">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                <span class="fw-bold text-navy">REP-398</span>
                <span class="badge bg-warning-subtle text-warning-emphasis ms-2">Under Review</span>
              </div>
              <span class="badge bg-warning-subtle text-warning-emphasis"><i class="bi bi-geo-alt-fill me-1"></i>Fake Property</span>
            </div>
            <h2 class="h6 fw-bold text-navy mb-1 text-truncate">Single Annex Room</h2>
            <p class="small text-muted mb-2"><i class="bi bi-person me-1"></i>Reported by: Kamal De Silva</p>
            <p class="fs-8 text-navy bg-light-custom p-2 rounded-3 mb-3 text-truncate">"The property listed at this address does not exist..."</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2">
              <span class="fs-8 text-muted">Sep 05, 2026</span>
              <button class="btn btn-primary btn-sm rounded-3 fw-bold btn-report-review" data-report-id="REP-398">Review Report</button>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- COMPREHENSIVE REPORT DETAIL MODAL -->
  <div class="modal fade" id="reportDetailModal" tabindex="-1" aria-labelledby="reportDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
        
        <div class="modal-header bg-navy text-white p-4">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-shield-exclamation text-warning fs-4"></i>
            <div>
              <h5 class="modal-title fw-bold text-white mb-0" id="reportDetailModalLabel">Report Investigation Details</h5>
              <span class="fs-8 text-white-50" id="modalReportHeaderId">Report Reference: REP-402</span>
            </div>
          </div>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 bg-light-custom">
          
          <!-- 1. PROPERTY PREVIEW CARD -->
          <div class="card border-light-custom shadow-xs rounded-4 bg-white p-3 mb-4">
            <h6 class="fw-bold text-navy fs-8 text-uppercase tracking-wider mb-2">Flagged Property Listing</h6>
            <div class="d-flex align-items-center gap-3 flex-wrap flex-sm-nowrap">
              <img src="../assets/images/properties/house-1.jpg" id="modalPropImg" class="rounded-3 object-fit-cover flex-shrink-0" width="90" height="68" alt="Flagged Property">
              <div class="min-w-0 flex-grow-1">
                <h6 class="fw-bold text-navy mb-1" id="modalPropTitle">Luxury Villa with Pool in Mount Lavinia</h6>
                <div class="fs-8 text-muted mb-1">Listing Ref: <span class="fw-semibold text-navy" id="modalPropId">RSL-77102</span> • <strong class="text-success" id="modalPropPrice">LKR 180,000/mo</strong></div>
                <div class="fs-8 text-muted"><i class="bi bi-person me-1"></i>Owner: <span class="fw-semibold text-navy" id="modalOwnerName">Ruwan Silva</span> (<span id="modalOwnerId">USR-8812</span>)</div>
              </div>
              <a href="../property-details.php?id=77102" id="modalViewListingBtn" target="_blank" class="btn btn-light border btn-sm text-navy fw-semibold text-nowrap align-self-sm-center">
                View Full Listing<i class="bi bi-box-arrow-up-right ms-1"></i>
              </a>
            </div>
          </div>

          <div class="row g-3 mb-4">
            <!-- 2. REPORTER DETAILS -->
            <div class="col-md-6">
              <div class="card border-light-custom shadow-xs rounded-4 bg-white p-3 h-100">
                <h6 class="fw-bold text-navy fs-8 text-uppercase tracking-wider mb-2"><i class="bi bi-person-fill text-primary-custom me-1"></i>Reporter Information</h6>
                <div class="small text-navy fw-semibold mb-1" id="modalReporterName">Saman Fernando</div>
                <div class="fs-8 text-muted mb-1"><i class="bi bi-envelope me-1"></i><span id="modalReporterEmail">saman.f@example.lk</span></div>
                <div class="fs-8 text-muted"><i class="bi bi-telephone me-1"></i><span id="modalReporterPhone">+94 75 111 2233</span></div>
              </div>
            </div>

            <!-- 3. REPORT METADATA -->
            <div class="col-md-6">
              <div class="card border-light-custom shadow-xs rounded-4 bg-white p-3 h-100">
                <h6 class="fw-bold text-navy fs-8 text-uppercase tracking-wider mb-2"><i class="bi bi-flag-fill text-danger me-1"></i>Report Classification</h6>
                <div class="d-flex align-items-center gap-2 mb-2">
                  <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-8" id="modalReasonBadge">Scam</span>
                  <span class="badge bg-danger text-white rounded-pill fs-8" id="modalStatusBadge">Pending</span>
                </div>
                <div class="fs-8 text-muted"><i class="bi bi-calendar-event me-1"></i>Reported Date: <span id="modalReportDate">Sep 07, 2026</span></div>
              </div>
            </div>
          </div>

          <!-- 4. REPORTER DESCRIPTION / EVIDENCE -->
          <div class="card border-light-custom shadow-xs rounded-4 bg-white p-3 mb-3">
            <h6 class="fw-bold text-navy fs-8 text-uppercase tracking-wider mb-2"><i class="bi bi-chat-left-quote-fill text-secondary me-1"></i>Reporter Explanation / Complaint Notes</h6>
            <div class="p-3 bg-light-custom rounded-3 border border-light-custom text-navy small" id="modalDescriptionText">
              Landlord requested an advance wire transfer of LKR 50,000 before showing the property in person. Photos look stolen from a hotel website.
            </div>
          </div>

          <!-- DANGEROUS MODERATION ACTIONS WARNING BANNER -->
          <div class="alert alert-warning border-0 rounded-3 p-3 mb-0 d-flex align-items-center gap-2 small">
            <i class="bi bi-shield-lock-fill text-warning fs-5"></i>
            <div>
              <strong>Moderation Enforcement Policy:</strong> Taking punitive action against a property or landlord will notify the account owner and update the public marketplace immediately.
            </div>
          </div>

        </div>

        <!-- 5. ACTION BUTTONS FOOTER -->
        <div class="modal-footer border-top border-light-custom bg-white p-3 d-flex flex-wrap gap-2 justify-content-between">
          <button type="button" class="btn btn-light border fw-medium btn-sm" data-bs-dismiss="modal">Close Window</button>

          <div class="d-flex gap-2 flex-wrap">
            <!-- Dismiss Report -->
            <button type="button" class="btn btn-outline-secondary btn-sm fw-medium" id="modalBtnDismiss">
              <i class="bi bi-x-circle me-1"></i>Dismiss Report
            </button>

            <!-- Remove Property (Dangerous) -->
            <button type="button" class="btn btn-outline-warning btn-sm fw-bold text-dark" id="modalBtnRemoveProp">
              <i class="bi bi-house-x-fill me-1"></i>Remove Property
            </button>

            <!-- Suspend Owner (Dangerous) -->
            <button type="button" class="btn btn-outline-danger btn-sm fw-bold" id="modalBtnSuspendOwner">
              <i class="bi bi-pause-circle-fill me-1"></i>Suspend Owner
            </button>

            <!-- Block User (Severe Danger) -->
            <button type="button" class="btn btn-danger btn-sm fw-bold" id="modalBtnBlockUser">
              <i class="bi bi-slash-circle-fill me-1"></i>Block User
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- ACTION CONFIRMATION MODAL (GENERIC DANGEROUS ACTION TRIGGER) -->
  <div class="modal fade" id="actionConfirmModal" tabindex="-1" aria-labelledby="actionConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3" id="confirmModalIcon">
            <i class="bi bi-exclamation-triangle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="confirmModalTitle">Confirm Action</h5>
          <p class="small text-muted mb-4" id="confirmModalText">Are you sure you want to proceed with this moderation action?</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnExecuteConfirmAction">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-reports.js"></script>
</body>
</html>