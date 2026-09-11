<?php $activePage = 'properties'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Properties - RentSriLanka</title>
  
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
        
        <!-- HEADER & PRIMARY ACTION -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">My Properties</h1>
            <p class="text-muted mb-0">Manage, edit, deactivate, or check performance of all your property listings.</p>
          </div>

          <a href="add-property.php" class="btn btn-primary fw-medium px-4 py-2 rounded-3 shadow-soft">
            <i class="bi bi-plus-circle me-1"></i>Add Property
          </a>
        </div>

        <!-- TABS BAR -->
        <div class="card border-0 shadow-soft p-2 p-md-3 rounded-4 mb-4 bg-white">
          <ul class="nav nav-pills custom-owner-tabs gap-1" id="propertyStatusTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-all" data-bs-toggle="pill" data-status="all" type="button" role="tab">All (6)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-active" data-bs-toggle="pill" data-status="approved" type="button" role="tab">Active (3)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-pending" data-bs-toggle="pill" data-status="pending" type="button" role="tab">Pending (1)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-rejected" data-bs-toggle="pill" data-status="rejected" type="button" role="tab">Rejected (1)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-rented" data-bs-toggle="pill" data-status="rented" type="button" role="tab">Rented (1)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-status-expired" data-bs-toggle="pill" data-status="expired" type="button" role="tab">Expired (0)</button>
            </li>
          </ul>
        </div>

        <!-- CONTROLS: SEARCH, FILTER & SORT -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="row g-2 align-items-center">
            <div class="col-12 col-md-5">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="ownerPropertySearch" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search by title or location...">
              </div>
            </div>
            
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="ownerTypeFilter">
                <option value="all">All Property Types</option>
                <option value="House">House</option>
                <option value="Annex">Annex</option>
                <option value="Room">Boarding Room</option>
              </select>
            </div>

            <div class="col-6 col-md-4">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="ownerSortBy">
                <option value="newest">Sort by: Date Added (Newest)</option>
                <option value="views_high">Sort by: Views (High to Low)</option>
                <option value="inquiries_high">Sort by: Inquiries (High to Low)</option>
                <option value="price_high">Sort by: Price (High to Low)</option>
              </select>
            </div>
          </div>
        </div>

        <!-- DESKTOP TABLE VIEW (VISIBLE ON LARGE SCREENS) -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden d-none d-md-block mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="ownerPropertiesTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Property</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Price</th>
                  <th class="text-center">Views</th>
                  <th class="text-center">Inquiries</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="ownerTableBody">
                
                <!-- Row 1 (Approved / Active) -->
                <tr class="owner-prop-item" data-status="approved" data-type="House" data-title="Two Storey Luxury House in Rajagiriya" data-location="Rajagiriya, Colombo" data-price="95000" data-views="420" data-inquiries="12" data-date="2026-08-20">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="House in Rajagiriya">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">Two Storey Luxury House in Rajagiriya</div>
                        <div class="fs-8 text-muted">ID: RSL-84920</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Rajagiriya, Colombo</td>
                  <td class="fw-bold text-navy">LKR 95,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">420</td>
                  <td class="text-center fw-medium">12</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Approved</span></td>
                  <td class="text-muted">Aug 20, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=101" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <a href="edit-property.php?id=101" class="btn btn-light border text-navy" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-warning btn-toggle-deactivate" data-id="101" title="Deactivate Listing"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="101" data-title="Two Storey Luxury House in Rajagiriya" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 2 (Approved / Active) -->
                <tr class="owner-prop-item" data-status="approved" data-type="Annex" data-title="Modern 1-Bedroom Private Annex" data-location="Nugegoda, Colombo" data-price="42000" data-views="310" data-inquiries="9" data-date="2026-08-15">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/annex-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Annex in Nugegoda">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">Modern 1-Bedroom Private Annex</div>
                        <div class="fs-8 text-muted">ID: RSL-81204</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">Annex</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Nugegoda, Colombo</td>
                  <td class="fw-bold text-navy">LKR 42,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">310</td>
                  <td class="text-center fw-medium">9</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Approved</span></td>
                  <td class="text-muted">Aug 15, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=103" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <a href="edit-property.php?id=103" class="btn btn-light border text-navy" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-warning btn-toggle-deactivate" data-id="103" title="Deactivate Listing"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="103" data-title="Modern 1-Bedroom Private Annex" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 3 (Pending) -->
                <tr class="owner-prop-item" data-status="pending" data-type="Room" data-title="Furnished Boarding Room near Uni" data-location="Peradeniya, Kandy" data-price="18000" data-views="15" data-inquiries="2" data-date="2026-09-02">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/room-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Room in Peradeniya">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">Furnished Boarding Room near Uni</div>
                        <div class="fs-8 text-muted">ID: RSL-90312</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">Room</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Peradeniya, Kandy</td>
                  <td class="fw-bold text-navy">LKR 18,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">15</td>
                  <td class="text-center fw-medium">2</td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Pending</span></td>
                  <td class="text-muted">Sep 02, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="edit-property.php?id=102" class="btn btn-light border text-navy" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="102" data-title="Furnished Boarding Room near Uni" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 4 (Rented) -->
                <tr class="owner-prop-item" data-status="rented" data-type="House" data-title="3-Bedroom House with Garden" data-location="Katugastota, Kandy" data-price="75000" data-views="675" data-inquiries="15" data-date="2026-07-10">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-2.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="House in Kandy">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">3-Bedroom House with Garden</div>
                        <div class="fs-8 text-muted">ID: RSL-74011</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Katugastota, Kandy</td>
                  <td class="fw-bold text-navy">LKR 75,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">675</td>
                  <td class="text-center fw-medium">15</td>
                  <td><span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Rented</span></td>
                  <td class="text-muted">Jul 10, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=104" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <a href="edit-property.php?id=104" class="btn btn-light border text-navy" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="104" data-title="3-Bedroom House with Garden" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 5 (Rejected) -->
                <tr class="owner-prop-item" data-status="rejected" data-type="Annex" data-title="Unfurnished Single Annex Room" data-location="Dehiwala, Colombo" data-price="22000" data-views="5" data-inquiries="0" data-date="2026-08-28">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/recent-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="Annex in Dehiwala">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">Unfurnished Single Annex Room</div>
                        <div class="fs-8 text-muted">ID: RSL-88102</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">Annex</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Dehiwala, Colombo</td>
                  <td class="fw-bold text-navy">LKR 22,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">5</td>
                  <td class="text-center fw-medium">0</td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Rejected</span></td>
                  <td class="text-muted">Aug 28, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="edit-property.php?id=105" class="btn btn-light border text-navy" title="Fix &amp; Resubmit"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="105" data-title="Unfurnished Single Annex Room" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 6 (Approved / Active - Deactivated / Suspended State Demo) -->
                <tr class="owner-prop-item" data-status="approved" data-type="House" data-title="Scenic 4-Bedroom House in Kandy" data-location="Anniewatte, Kandy" data-price="110000" data-views="512" data-inquiries="8" data-date="2026-06-18">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/properties/house-1.jpg" class="rounded-3 object-fit-cover" width="56" height="42" alt="House in Anniewatte">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 200px;">Scenic 4-Bedroom House in Kandy</div>
                        <div class="fs-8 text-muted">ID: RSL-61902</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge badge-property-type">House</span></td>
                  <td class="text-muted text-truncate" style="max-width: 140px;">Anniewatte, Kandy</td>
                  <td class="fw-bold text-navy">LKR 110,000<span class="text-muted font-normal fs-8">/mo</span></td>
                  <td class="text-center fw-medium">512</td>
                  <td class="text-center fw-medium">8</td>
                  <td><span class="badge bg-dark-subtle text-dark border border-dark-subtle">Suspended</span></td>
                  <td class="text-muted">Jun 18, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <a href="../property-details.php?id=205" class="btn btn-light border text-navy" title="View Listing"><i class="bi bi-eye"></i></a>
                      <a href="edit-property.php?id=205" class="btn btn-light border text-navy" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                      <button class="btn btn-light border text-success btn-toggle-deactivate" data-id="205" title="Re-activate Listing"><i class="bi bi-play-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-prop" data-id="205" data-title="Scenic 4-Bedroom House in Kandy" title="Delete Listing"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW (VISIBLE ON SMALL SCREENS) -->
        <div class="d-md-none" id="ownerMobileCardsContainer">
          
          <!-- Card 1 -->
          <div class="card property-card owner-prop-card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white mb-3" data-status="approved" data-type="House" data-title="Two Storey Luxury House in Rajagiriya" data-location="Rajagiriya, Colombo" data-price="95000">
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
                  <p class="text-muted fs-8 mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>420 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>12 Inquiries</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light-custom border-top border-light-custom p-2 d-flex justify-content-between align-items-center">
              <span class="fs-8 text-muted">Added Aug 20</span>
              <div class="btn-group btn-group-sm">
                <a href="../property-details.php?id=101" class="btn btn-light border text-navy"><i class="bi bi-eye"></i></a>
                <a href="edit-property.php?id=101" class="btn btn-light border text-navy"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-light border text-warning btn-toggle-deactivate" data-id="101"><i class="bi bi-pause-circle"></i></button>
                <button class="btn btn-light border text-danger btn-delete-prop" data-id="101" data-title="Two Storey Luxury House in Rajagiriya"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card property-card owner-prop-card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white mb-3" data-status="approved" data-type="Annex" data-title="Modern 1-Bedroom Private Annex" data-location="Nugegoda, Colombo" data-price="42000">
            <div class="row g-0">
              <div class="col-4 position-relative">
                <img src="../assets/images/properties/annex-1.jpg" class="w-100 h-100 object-fit-cover" alt="Annex in Nugegoda">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-2">Annex</span>
              </div>
              <div class="col-8">
                <div class="card-body p-3 d-flex flex-column h-100">
                  <div class="d-flex justify-content-between align-items-start mb-1">
                    <div class="price-tag fs-6">LKR 42,000<span class="fs-8 text-muted font-normal">/mo</span></div>
                    <span class="badge bg-success-subtle text-success">Approved</span>
                  </div>
                  <h2 class="h6 card-title text-truncate fw-semibold mb-1">Modern 1-Bedroom Private Annex</h2>
                  <p class="text-muted fs-8 mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Nugegoda, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>310 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>9 Inquiries</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light-custom border-top border-light-custom p-2 d-flex justify-content-between align-items-center">
              <span class="fs-8 text-muted">Added Aug 15</span>
              <div class="btn-group btn-group-sm">
                <a href="../property-details.php?id=103" class="btn btn-light border text-navy"><i class="bi bi-eye"></i></a>
                <a href="edit-property.php?id=103" class="btn btn-light border text-navy"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-light border text-warning btn-toggle-deactivate" data-id="103"><i class="bi bi-pause-circle"></i></button>
                <button class="btn btn-light border text-danger btn-delete-prop" data-id="103" data-title="Modern 1-Bedroom Private Annex"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="card property-card owner-prop-card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white mb-3" data-status="pending" data-type="Room" data-title="Furnished Boarding Room near Uni" data-location="Peradeniya, Kandy" data-price="18000">
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
                  <p class="text-muted fs-8 mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>15 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>2 Inquiries</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light-custom border-top border-light-custom p-2 d-flex justify-content-between align-items-center">
              <span class="fs-8 text-muted">Added Sep 02</span>
              <div class="btn-group btn-group-sm">
                <a href="edit-property.php?id=102" class="btn btn-light border text-navy"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-light border text-danger btn-delete-prop" data-id="102" data-title="Furnished Boarding Room near Uni"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- DELETE CONFIRMATION MODAL -->
  <div class="modal fade" id="deletePropModal" tabindex="-1" aria-labelledby="deletePropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-exclamation-circle fs-1"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deletePropModalLabel">Delete Property?</h5>
          <p class="small text-muted mb-4" id="deletePropModalText">Are you sure you want to permanently delete this property listing?</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-medium" id="btnConfirmDeleteProp">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/owner-properties.js"></script>
</body>
</html>