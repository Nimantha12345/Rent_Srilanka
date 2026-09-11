<?php $activePage = 'properties'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Moderation - RentSriLanka Admin</title>
  
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
            <h1 class="h3 fw-bold text-navy mb-1">Property Moderation</h1>
            <p class="text-muted mb-0">Review, approve, reject, or manage all rental property listings across Sri Lanka.</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm fw-medium rounded-pill px-3" id="btnExportCSV">
              <i class="bi bi-download me-1"></i>Export CSV
            </button>
          </div>
        </div>

        <!-- FILTERS BAR: SEARCH, TYPE, DISTRICT, STATUS, DATE -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="row g-2 align-items-center">
            
            <!-- Search -->
            <div class="col-12 col-md-3">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="adminPropSearch" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search title or owner...">
              </div>
            </div>

            <!-- Property Type -->
            <div class="col-6 col-md-2">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminTypeFilter">
                <option value="all">All Types</option>
                <option value="House">House</option>
                <option value="Annex">Annex</option>
                <option value="Room">Boarding Room</option>
              </select>
            </div>

            <!-- District -->
            <div class="col-6 col-md-2">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminDistrictFilter">
                <option value="all">All Districts</option>
                <option value="Colombo">Colombo</option>
                <option value="Kandy">Kandy</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
              </select>
            </div>

            <!-- Status -->
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminStatusFilter">
                <option value="all">All Statuses</option>
                <option value="Pending">Pending (Needs Moderation)</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
                <option value="Suspended">Suspended</option>
                <option value="Rented">Rented</option>
                <option value="Expired">Expired</option>
              </select>
            </div>

            <!-- Date -->
            <div class="col-6 col-md-2">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminSortBy">
                <option value="newest">Sort: Newest</option>
                <option value="oldest">Sort: Oldest</option>
                <option value="price_high">Price: High to Low</option>
              </select>
            </div>

          </div>
        </div>

        <!-- DESKTOP MODERATION TABLE VIEW (VISIBLE ON LARGE SCREENS) -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden d-none d-md-block mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="adminPropertiesTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Property</th>
                  <th>Owner</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="adminTableBody">
                
                <!-- Row 1: Pending Approval -->
                <tr class="admin-prop-row" data-id="90312" data-status="Pending" data-type="Room" data-district="Kandy" data-title="Furnished Boarding Room near Uni" data-owner="Nimal Perera" data-owner-email="nimal.p@example.lk" data-location="Peradeniya, Kandy" data-price="18000" data-date="2026-09-02">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/room-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Furnished Boarding Room near Uni</div>
                        <div class="fs-8 text-muted">ID: RSL-90312</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Nimal Perera</div>
                    <div class="fs-8 text-muted">nimal.p@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">Room</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Peradeniya, Kandy</td>
                  <td class="fw-bold text-navy">LKR 18,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Pending</span></td>
                  <td class="text-muted">Sep 02, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=90312" target="_blank" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <button class="btn btn-light border text-success btn-admin-approve" data-id="90312" data-title="Furnished Boarding Room near Uni" title="Approve Listing"><i class="bi bi-check-circle"></i></button>
                      <button class="btn btn-light border text-warning btn-admin-reject" data-id="90312" data-title="Furnished Boarding Room near Uni" title="Reject Listing"><i class="bi bi-x-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="90312" data-title="Furnished Boarding Room near Uni" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 2: Approved -->
                <tr class="admin-prop-row" data-id="84920" data-status="Approved" data-type="House" data-district="Colombo" data-title="Two Storey Luxury House in Rajagiriya" data-owner="Nimal Perera" data-owner-email="nimal.p@example.lk" data-location="Rajagiriya, Colombo" data-price="95000" data-date="2026-08-20">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Two Storey Luxury House in Rajagiriya</div>
                        <div class="fs-8 text-muted">ID: RSL-84920</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Nimal Perera</div>
                    <div class="fs-8 text-muted">nimal.p@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Rajagiriya, Colombo</td>
                  <td class="fw-bold text-navy">LKR 95,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Approved</span></td>
                  <td class="text-muted">Aug 20, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=84920" target="_blank" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <button class="btn btn-light border text-secondary btn-admin-suspend" data-id="84920" data-title="Two Storey Luxury House in Rajagiriya" title="Suspend Listing"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="84920" data-title="Two Storey Luxury House in Rajagiriya" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 3: Approved -->
                <tr class="admin-prop-row" data-id="81204" data-status="Approved" data-type="Annex" data-district="Colombo" data-title="Modern 1-Bedroom Private Annex" data-owner="Kamal De Silva" data-owner-email="kamal.ds@example.lk" data-location="Nugegoda, Colombo" data-price="42000" data-date="2026-08-15">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/annex-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Modern 1-Bedroom Private Annex</div>
                        <div class="fs-8 text-muted">ID: RSL-81204</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Kamal De Silva</div>
                    <div class="fs-8 text-muted">kamal.ds@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">Annex</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Nugegoda, Colombo</td>
                  <td class="fw-bold text-navy">LKR 42,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Approved</span></td>
                  <td class="text-muted">Aug 15, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=81204" target="_blank" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <button class="btn btn-light border text-secondary btn-admin-suspend" data-id="81204" data-title="Modern 1-Bedroom Private Annex" title="Suspend Listing"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="81204" data-title="Modern 1-Bedroom Private Annex" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 4: Suspended -->
                <tr class="admin-prop-row" data-id="61902" data-status="Suspended" data-type="House" data-district="Kandy" data-title="Scenic 4-Bedroom House in Kandy" data-owner="Sunil Shantha" data-owner-email="sunil.s@example.lk" data-location="Anniewatte, Kandy" data-price="110000" data-date="2026-06-18">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Scenic 4-Bedroom House in Kandy</div>
                        <div class="fs-8 text-muted">ID: RSL-61902</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Sunil Shantha</div>
                    <div class="fs-8 text-muted">sunil.s@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Anniewatte, Kandy</td>
                  <td class="fw-bold text-navy">LKR 110,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-dark-subtle text-dark border border-dark-subtle">Suspended</span></td>
                  <td class="text-muted">Jun 18, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=61902" target="_blank" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <button class="btn btn-light border text-success btn-admin-approve" data-id="61902" data-title="Scenic 4-Bedroom House in Kandy" title="Re-approve Listing"><i class="bi bi-play-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="61902" data-title="Scenic 4-Bedroom House in Kandy" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 5: Rejected -->
                <tr class="admin-prop-row" data-id="88102" data-status="Rejected" data-type="Annex" data-district="Colombo" data-title="Unfurnished Single Annex Room" data-owner="Mahesh Gunasekara" data-owner-email="mahesh.g@example.lk" data-location="Dehiwala, Colombo" data-price="22000" data-date="2026-08-28">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/recent-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Unfurnished Single Annex Room</div>
                        <div class="fs-8 text-muted">ID: RSL-88102</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Mahesh Gunasekara</div>
                    <div class="fs-8 text-muted">mahesh.g@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">Annex</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Dehiwala, Colombo</td>
                  <td class="fw-bold text-navy">LKR 22,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Rejected</span></td>
                  <td class="text-muted">Aug 28, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-success btn-admin-approve" data-id="88102" data-title="Unfurnished Single Annex Room" title="Approve Listing"><i class="bi bi-check-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="88102" data-title="Unfurnished Single Annex Room" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 6: Rented -->
                <tr class="admin-prop-row" data-id="74011" data-status="Rented" data-type="House" data-district="Kandy" data-title="3-Bedroom House with Garden" data-owner="Nimal Perera" data-owner-email="nimal.p@example.lk" data-location="Katugastota, Kandy" data-price="75000" data-date="2026-07-10">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-2.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">3-Bedroom House with Garden</div>
                        <div class="fs-8 text-muted">ID: RSL-74011</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Nimal Perera</div>
                    <div class="fs-8 text-muted">nimal.p@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Katugastota, Kandy</td>
                  <td class="fw-bold text-navy">LKR 75,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Rented</span></td>
                  <td class="text-muted">Jul 10, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=74011" target="_blank" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="74011" data-title="3-Bedroom House with Garden" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 7: Expired -->
                <tr class="admin-prop-row" data-id="52109" data-status="Expired" data-type="Room" data-district="Colombo" data-title="Compact Single Room in Wellawatte" data-owner="Srinath Fernando" data-owner-email="srinath.f@example.lk" data-location="Wellawatte, Colombo" data-price="15000" data-date="2026-04-12">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/recent-2.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Property">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 180px;">Compact Single Room in Wellawatte</div>
                        <div class="fs-8 text-muted">ID: RSL-52109</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fw-semibold text-navy">Srinath Fernando</div>
                    <div class="fs-8 text-muted">srinath.f@example.lk</div>
                  </td>
                  <td><span class="badge badge-property-type">Room</span></td>
                  <td class="text-muted text-truncate" style="max-width: 130px;">Wellawatte, Colombo</td>
                  <td class="fw-bold text-navy">LKR 15,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td><span class="badge bg-light text-muted border border-light-custom">Expired</span></td>
                  <td class="text-muted">Apr 12, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-danger btn-admin-delete" data-id="52109" data-title="Compact Single Room in Wellawatte" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW (VISIBLE ON SMALL SCREENS) -->
        <div class="d-md-none" id="adminMobileCardsContainer">
          
          <!-- Card 1 (Pending) -->
          <div class="card property-card admin-prop-card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white mb-3" data-id="90312" data-status="Pending" data-type="Room" data-district="Kandy" data-title="Furnished Boarding Room near Uni" data-owner="Nimal Perera" data-location="Peradeniya, Kandy" data-price="18000">
            <div class="row g-0">
              <div class="col-4 position-relative">
                <img src="../assets/images/properties/room-1.jpg" class="w-100 h-100 object-fit-cover" alt="Room in Peradeniya">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-2">Room</span>
              </div>
              <div class="col-8">
                <div class="card-body p-3 d-flex flex-column h-100">
                  <div class="d-flex justify-content-between align-items-start mb-1">
                    <div class="price-tag fs-6">LKR 18,000<span class="fs-8 text-muted font-normal">/mo</span></div>
                    <span class="badge bg-warning-subtle text-warning-emphasis">Pending</span>
                  </div>
                  <h2 class="h6 card-title text-truncate fw-semibold mb-1">Furnished Boarding Room near Uni</h2>
                  <p class="text-muted fs-8 mb-1"><i class="bi bi-person me-1"></i>Owner: Nimal Perera</p>
                  <p class="text-muted fs-8 mb-0"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light-custom border-top border-light-custom p-2 d-flex justify-content-between align-items-center">
              <span class="fs-8 text-muted">Added Sep 02</span>
              <div class="btn-group btn-group-sm">
                <a href="../property-details.php?id=90312" target="_blank" class="btn btn-light border text-navy"><i class="bi bi-eye"></i></a>
                <button class="btn btn-light border text-success btn-admin-approve" data-id="90312" data-title="Furnished Boarding Room near Uni"><i class="bi bi-check-circle"></i></button>
                <button class="btn btn-light border text-warning btn-admin-reject" data-id="90312" data-title="Furnished Boarding Room near Uni"><i class="bi bi-x-circle"></i></button>
                <button class="btn btn-light border text-danger btn-admin-delete" data-id="90312" data-title="Furnished Boarding Room near Uni"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

          <!-- Card 2 (Approved) -->
          <div class="card property-card admin-prop-card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white mb-3" data-id="84920" data-status="Approved" data-type="House" data-district="Colombo" data-title="Two Storey Luxury House in Rajagiriya" data-owner="Nimal Perera" data-location="Rajagiriya, Colombo" data-price="95000">
            <div class="row g-0">
              <div class="col-4 position-relative">
                <img src="../assets/images/properties/house-1.jpg" class="w-100 h-100 object-fit-cover" alt="House in Rajagiriya">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-2">House</span>
              </div>
              <div class="col-8">
                <div class="card-body p-3 d-flex flex-column h-100">
                  <div class="d-flex justify-content-between align-items-start mb-1">
                    <div class="price-tag fs-6">LKR 95,000<span class="fs-8 text-muted font-normal">/mo</span></div>
                    <span class="badge bg-success-subtle text-success">Approved</span>
                  </div>
                  <h2 class="h6 card-title text-truncate fw-semibold mb-1">Two Storey Luxury House in Rajagiriya</h2>
                  <p class="text-muted fs-8 mb-1"><i class="bi bi-person me-1"></i>Owner: Nimal Perera</p>
                  <p class="text-muted fs-8 mb-0"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light-custom border-top border-light-custom p-2 d-flex justify-content-between align-items-center">
              <span class="fs-8 text-muted">Added Aug 20</span>
              <div class="btn-group btn-group-sm">
                <a href="../property-details.php?id=84920" target="_blank" class="btn btn-light border text-navy"><i class="bi bi-eye"></i></a>
                <button class="btn btn-light border text-secondary btn-admin-suspend" data-id="84920" data-title="Two Storey Luxury House in Rajagiriya"><i class="bi bi-pause-circle"></i></button>
                <button class="btn btn-light border text-danger btn-admin-delete" data-id="84920" data-title="Two Storey Luxury House in Rajagiriya"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- APPROVE CONFIRMATION MODAL -->
  <div class="modal fade" id="approvePropModal" tabindex="-1" aria-labelledby="approvePropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-success mb-3">
            <i class="bi bi-check-circle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="approvePropModalLabel">Approve Property?</h5>
          <p class="small text-muted mb-4" id="approvePropModalText">Approving will publish this property live onto RentSriLanka for public searches.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success flex-fill fw-bold" id="btnConfirmApprove">Approve</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- REJECT PROPERTY MODAL (REQUIRES REASON) -->
  <div class="modal fade" id="rejectPropModal" tabindex="-1" aria-labelledby="rejectPropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="rejectPropModalLabel">
            <i class="bi bi-x-circle text-warning me-2"></i>Reject Property Listing
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <p class="small text-navy mb-3" id="rejectPropModalText">Select or provide a rejection reason. The owner will be notified with instructions to revise.</p>
          
          <form id="rejectPropertyForm" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="rejectReasonSelect" class="form-label small fw-semibold text-navy">Rejection Reason</label>
              <select class="form-select form-select-sm border-light-custom shadow-none" id="rejectReasonSelect" required>
                <option value="Inaccurate pricing or missing deposit details">Inaccurate pricing or missing deposit details</option>
                <option value="Blurry or insufficient property photos">Blurry or insufficient property photos</option>
                <option value="Incomplete street address or location error">Incomplete street address or location error</option>
                <option value="Prohibited or duplicate listing">Prohibited or duplicate listing</option>
                <option value="other">Other reason (specify below)...</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="rejectReasonNotes" class="form-label small fw-semibold text-navy">Additional Notes for Owner</label>
              <textarea class="form-control form-control-sm border-light-custom shadow-none" id="rejectReasonNotes" rows="3" placeholder="Provide clear feedback on what needs fixing..." required></textarea>
              <div class="invalid-feedback">Please enter rejection notes for the landlord.</div>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-warning fw-bold text-dark" id="btnConfirmReject">Confirm Rejection</button>
        </div>
      </div>
    </div>
  </div>

  <!-- STRONG DELETE CONFIRMATION MODAL -->
  <div class="modal fade" id="deletePropModal" tabindex="-1" aria-labelledby="deletePropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-body text-center p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-exclamation-triangle-fill display-3"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deletePropModalLabel">Permanently Delete Property?</h5>
          <p class="small text-muted mb-3" id="deletePropModalText">This action is irreversible. All property details, images, and associated renter inquiries will be permanently purged from the system.</p>
          
          <div class="alert alert-danger border-0 small p-2 mb-4">
            <i class="bi bi-shield-lock me-1"></i> Admin Authorization Confirmation
          </div>

          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnConfirmDelete">Permanently Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-properties.js"></script>
</body>
</html>