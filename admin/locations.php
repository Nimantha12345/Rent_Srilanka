<?php $activePage = 'locations'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Location Management - RentSriLanka Admin</title>

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
            <h1 class="h3 fw-bold text-navy mb-1">Location Management</h1>
            <p class="text-muted mb-0">Manage provinces, districts, cities, towns and local sub-areas across Sri Lanka.</p>
          </div>

          <div class="d-flex gap-2">
            <a href="#mapSection" class="btn btn-outline-secondary btn-sm fw-medium rounded-3 px-3">
              <i class="bi bi-map me-1"></i>View Map
            </a>
            <button class="btn btn-primary btn-sm fw-bold rounded-3 px-3 shadow-soft" id="btnOpenAddLocationModal">
              <i class="bi bi-plus-circle me-1"></i>Add Location
            </button>
          </div>
        </div>

        <!-- LOCATION STATISTICS CARDS -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Provinces</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-geo-alt-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-provinces">9</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Districts</span>
                <div class="stat-icon-sm bg-info-subtle text-info-emphasis rounded-circle"><i class="bi bi-map-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-districts">25</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Cities / Towns</span>
                <div class="stat-icon-sm bg-teal-subtle text-teal rounded-circle"><i class="bi bi-building-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-cities">142</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Local Sub-Areas</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-pin-map-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-areas">380</h3>
            </div>
          </div>
        </div>

        <!-- LOCATION SEARCH & FILTERS -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3 mb-4">
          <div class="row g-2 align-items-center">
            <div class="col-12 col-md-4 col-lg-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-light-custom shadow-none" id="locationSearchInput" placeholder="Search province, district, city or area...">
                <button class="btn btn-light border border-light-custom" type="button" id="btnClearSearch" title="Clear Search"><i class="bi bi-x-lg"></i></button>
              </div>
            </div>

            <div class="col-12 col-md-8 col-lg-8 d-none d-md-flex align-items-center gap-2 justify-content-end">
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterProvince">
                <option value="all" selected>All Provinces</option>
                <option value="Western">Western Province</option>
                <option value="Central">Central Province</option>
                <option value="Southern">Southern Province</option>
                <option value="Northern">Northern Province</option>
                <option value="Eastern">Eastern Province</option>
                <option value="North Western">North Western Province</option>
                <option value="North Central">North Central Province</option>
                <option value="Uva">Uva Province</option>
                <option value="Sabaragamuwa">Sabaragamuwa Province</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterDistrict">
                <option value="all" selected>All Districts</option>
                <option value="Colombo">Colombo</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Kandy">Kandy</option>
                <option value="Galle">Galle</option>
                <option value="Jaffna">Jaffna</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterType">
                <option value="all" selected>All Types</option>
                <option value="Province">Province</option>
                <option value="District">District</option>
                <option value="City/Town">City/Town</option>
                <option value="Area">Area</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterStatus">
                <option value="all" selected>All Statuses</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>

              <button class="btn btn-outline-secondary btn-sm fw-medium rounded-3" id="btnResetFilters" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- HIERARCHICAL DRILLDOWN RELATIONSHIP BAR (Province -> District -> City -> Area) -->
        <div class="card border-0 bg-primary-subtle bg-opacity-20 border-primary-subtle rounded-4 p-3 mb-4">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2 flex-wrap text-navy fs-8 fw-semibold">
              <i class="bi bi-diagram-3-fill text-primary fs-6 me-1"></i>
              <span>Hierarchical Drilldown:</span>
              
              <!-- 1. Province Select -->
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto fs-8" id="cascadeProvince">
                <option value="" selected>1. Select Province...</option>
                <option value="western">Western Province</option>
                <option value="central">Central Province</option>
                <option value="southern">Southern Province</option>
                <option value="northern">Northern Province</option>
              </select>
              <i class="bi bi-chevron-right text-muted"></i>

              <!-- 2. District Select -->
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto fs-8" id="cascadeDistrict" disabled>
                <option value="" selected>2. Select District...</option>
              </select>
              <i class="bi bi-chevron-right text-muted"></i>

              <!-- 3. City/Town Select -->
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto fs-8" id="cascadeCity" disabled>
                <option value="" selected>3. Select City/Town...</option>
              </select>
              <i class="bi bi-chevron-right text-muted"></i>

              <!-- 4. Area Select -->
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto fs-8" id="cascadeArea" disabled>
                <option value="" selected>4. Select Sub-Area...</option>
              </select>
            </div>

            <div class="fs-8 fw-bold text-success bg-white px-3 py-1.5 rounded-pill border border-success-subtle shadow-xs" id="cascadeMatchCount">
              Select a location hierarchy to filter properties
            </div>
          </div>
        </div>

        <!-- LOCATION TABLE (DESKTOP) & MOBILE CARDS CONTAINER -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden mb-4">
          <div class="p-3 bg-light-custom border-bottom border-light-custom d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-navy mb-0"><i class="bi bi-list-nested me-2 text-primary"></i>Sri Lankan Geographic Hierarchy Tree</h6>
            <span class="badge bg-navy text-white rounded-pill small" id="location-list-count">8 Records Shown</span>
          </div>

          <!-- DESKTOP TABLE VIEW -->
          <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-middle mb-0" id="locationsTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Province</th>
                  <th>District</th>
                  <th>City / Town</th>
                  <th>Sub-Area</th>
                  <th>Type</th>
                  <th>Properties</th>
                  <th>Status</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="locationsTableBody">
                
                <!-- Entry 1 -->
                <tr class="location-row" data-id="1" data-name="Kalapaluwawa" data-province="Western" data-district="Colombo" data-city="Rajagiriya" data-type="Area" data-status="Active">
                  <td class="ps-4 text-muted">Western Province</td>
                  <td class="fw-medium text-navy">Colombo</td>
                  <td class="fw-semibold text-navy">Rajagiriya</td>
                  <td class="fw-bold text-navy"><i class="bi bi-pin-map text-teal me-1"></i>Kalapaluwawa</td>
                  <td><span class="badge bg-teal-subtle text-teal border border-teal-subtle">Area</span></td>
                  <td class="fw-semibold text-teal">18 Properties</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-properties" data-id="1" data-name="Kalapaluwawa" title="View Properties"><i class="bi bi-houses-fill me-1"></i>Properties</button>
                      <button class="btn btn-light border text-primary btn-edit-location" data-id="1" data-name="Kalapaluwawa" data-province="Western" data-district="Colombo" data-city="Rajagiriya" data-type="Area" data-status="Active" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-location" data-id="1" data-name="Kalapaluwawa" title="Delete"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Entry 2 -->
                <tr class="location-row" data-id="2" data-name="University Park" data-province="Central" data-district="Kandy" data-city="Peradeniya" data-type="Area" data-status="Active">
                  <td class="ps-4 text-muted">Central Province</td>
                  <td class="fw-medium text-navy">Kandy</td>
                  <td class="fw-semibold text-navy">Peradeniya</td>
                  <td class="fw-bold text-navy"><i class="bi bi-pin-map text-teal me-1"></i>University Park</td>
                  <td><span class="badge bg-teal-subtle text-teal border border-teal-subtle">Area</span></td>
                  <td class="fw-semibold text-teal">25 Properties</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-properties" data-id="2" data-name="University Park" title="View Properties"><i class="bi bi-houses-fill me-1"></i>Properties</button>
                      <button class="btn btn-light border text-primary btn-edit-location" data-id="2" data-name="University Park" data-province="Central" data-district="Kandy" data-city="Peradeniya" data-type="Area" data-status="Active" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-location" data-id="2" data-name="University Park" title="Delete"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Entry 3 -->
                <tr class="location-row" data-id="3" data-name="Bambalapitiya" data-province="Western" data-district="Colombo" data-city="Bambalapitiya" data-type="City/Town" data-status="Active">
                  <td class="ps-4 text-muted">Western Province</td>
                  <td class="fw-medium text-navy">Colombo</td>
                  <td class="fw-bold text-navy"><i class="bi bi-building text-info me-1"></i>Bambalapitiya</td>
                  <td class="text-muted">-</td>
                  <td><span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">City/Town</span></td>
                  <td class="fw-semibold text-teal">42 Properties</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-properties" data-id="3" data-name="Bambalapitiya" title="View Properties"><i class="bi bi-houses-fill me-1"></i>Properties</button>
                      <button class="btn btn-light border text-primary btn-edit-location" data-id="3" data-name="Bambalapitiya" data-province="Western" data-district="Colombo" data-city="Bambalapitiya" data-type="City/Town" data-status="Active" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-location" data-id="3" data-name="Bambalapitiya" title="Delete"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Entry 4 -->
                <tr class="location-row" data-id="4" data-name="Galle Fort Zone" data-province="Southern" data-district="Galle" data-city="Galle City" data-type="Area" data-status="Active">
                  <td class="ps-4 text-muted">Southern Province</td>
                  <td class="fw-medium text-navy">Galle</td>
                  <td class="fw-semibold text-navy">Galle City</td>
                  <td class="fw-bold text-navy"><i class="bi bi-pin-map text-teal me-1"></i>Galle Fort Zone</td>
                  <td><span class="badge bg-teal-subtle text-teal border border-teal-subtle">Area</span></td>
                  <td class="fw-semibold text-teal">31 Properties</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-properties" data-id="4" data-name="Galle Fort Zone" title="View Properties"><i class="bi bi-houses-fill me-1"></i>Properties</button>
                      <button class="btn btn-light border text-primary btn-edit-location" data-id="4" data-name="Galle Fort Zone" data-province="Southern" data-district="Galle" data-city="Galle City" data-type="Area" data-status="Active" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-location" data-id="4" data-name="Galle Fort Zone" title="Delete"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Entry 5 -->
                <tr class="location-row" data-id="5" data-name="Jaffna Town" data-province="Northern" data-district="Jaffna" data-city="Jaffna Town" data-type="City/Town" data-status="Active">
                  <td class="ps-4 text-muted">Northern Province</td>
                  <td class="fw-medium text-navy">Jaffna</td>
                  <td class="fw-bold text-navy"><i class="bi bi-building text-info me-1"></i>Jaffna Town</td>
                  <td class="text-muted">-</td>
                  <td><span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">City/Town</span></td>
                  <td class="fw-semibold text-teal">19 Properties</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-view-properties" data-id="5" data-name="Jaffna Town" title="View Properties"><i class="bi bi-houses-fill me-1"></i>Properties</button>
                      <button class="btn btn-light border text-primary btn-edit-location" data-id="5" data-name="Jaffna Town" data-province="Northern" data-district="Jaffna" data-city="Jaffna Town" data-type="City/Town" data-status="Active" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-danger btn-delete-location" data-id="5" data-name="Jaffna Town" title="Delete"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- EMPTY STATE CONTAINER -->
          <div class="p-5 text-center d-none" id="emptyLocationState">
            <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
              <i class="bi bi-geo-alt-fill display-6"></i>
            </div>
            <h5 class="fw-bold text-navy mb-1">No locations found</h5>
            <p class="small text-muted mb-3">Try changing your search keywords or hierarchical filters.</p>
            <button class="btn btn-outline-primary btn-sm rounded-pill fw-medium" id="btnResetEmptySearch">
              <i class="bi bi-arrow-counterclockwise me-1"></i>Clear Filters
            </button>
          </div>
        </div>

        <!-- MAP SECTION - FULL SRI LANKA MAP WITH ALL PROVINCES -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden mb-4" id="mapSection">
          <div class="p-3 bg-navy text-white d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-map-fill text-warning fs-5"></i>
              <h6 class="fw-bold text-white mb-0">Island-Wide Sri Lanka Location Map (All 9 Provinces)</h6>
            </div>
            <div class="d-flex align-items-center gap-2">
              <select class="form-select form-select-sm bg-dark text-white border-secondary fs-8 shadow-none" id="mapProvinceFilter">
                <option value="all" selected>Show All Provinces</option>
                <option value="Western">Western Province</option>
                <option value="Central">Central Province</option>
                <option value="Southern">Southern Province</option>
                <option value="Northern">Northern Province</option>
                <option value="Eastern">Eastern Province</option>
                <option value="North Western">North Western Province</option>
                <option value="North Central">North Central Province</option>
                <option value="Uva">Uva Province</option>
                <option value="Sabaragamuwa">Sabaragamuwa Province</option>
              </select>
              <button class="btn btn-light btn-sm fw-medium fs-8" id="btnMapMyLocation"><i class="bi bi-crosshair me-1"></i>Reset View</button>
            </div>
          </div>

          <div class="row g-0">
            <!-- LEFT: MAP LOCATION SELECTOR SIDEBAR -->
            <div class="col-lg-4 col-xl-3 border-end border-light-custom p-3 bg-light-custom">
              <h6 class="fw-bold text-navy small mb-3"><i class="bi bi-geo-fill text-primary me-1"></i>Provinces &amp; Key Hubs</h6>
              <div class="list-group list-group-flush gap-1 bg-transparent overflow-auto" style="max-height: 480px;" id="mapLocationList">
                
                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 active p-2.5 map-list-item" data-province="Western" data-name="Colombo (Western)" data-count="125">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Colombo</span>
                      <span class="fs-8 text-muted">Western Province</span>
                    </div>
                    <span class="badge bg-primary text-white rounded-pill fs-8">125 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="Central" data-name="Kandy (Central)" data-count="65">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Kandy</span>
                      <span class="fs-8 text-muted">Central Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">65 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="Southern" data-name="Galle (Southern)" data-count="48">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Galle</span>
                      <span class="fs-8 text-muted">Southern Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">48 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="Northern" data-name="Jaffna (Northern)" data-count="34">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Jaffna</span>
                      <span class="fs-8 text-muted">Northern Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">34 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="Eastern" data-name="Trincomalee (Eastern)" data-count="28">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Trincomalee</span>
                      <span class="fs-8 text-muted">Eastern Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">28 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="North Central" data-name="Anuradhapura (North Central)" data-count="22">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Anuradhapura</span>
                      <span class="fs-8 text-muted">North Central Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">22 Properties</span>
                  </div>
                </button>

                <button type="button" class="list-group-item list-group-item-action rounded-3 border-0 p-2.5 map-list-item" data-province="Uva" data-name="Badulla / Ella (Uva)" data-count="41">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold small text-navy d-block">Ella / Badulla</span>
                      <span class="fs-8 text-muted">Uva Province</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill fs-8">41 Properties</span>
                  </div>
                </button>

              </div>
            </div>

            <!-- RIGHT: FULL SRI LANKA MAP DISPLAY -->
            <div class="col-lg-8 col-xl-9 position-relative bg-light">
              <div class="map-placeholder-container p-4 d-flex align-items-center justify-content-center text-center" id="mapCanvas" style="min-height: 520px;">
                <div class="map-canvas-mockup w-100 h-100 rounded-3 border border-light-custom position-relative overflow-hidden bg-white">
                  
                  <div class="map-grid-overlay"></div>

                  <!-- MAP CONTROLS -->
                  <div class="position-absolute top-0 end-0 m-3 d-flex flex-column gap-1" style="z-index: 10;">
                    <button class="btn btn-white btn-sm border shadow-xs" id="btnMapZoomIn" title="Zoom In"><i class="bi bi-plus-lg"></i></button>
                    <button class="btn btn-white btn-sm border shadow-xs" id="btnMapZoomOut" title="Zoom Out"><i class="bi bi-dash-lg"></i></button>
                    <button class="btn btn-white btn-sm border shadow-xs" id="btnMapReset" title="Reset View"><i class="bi bi-arrow-counterclockwise"></i></button>
                  </div>

                  <!-- MAP PINS ACROSS FULL SRI LANKA MAP -->
                  <!-- Northern -->
                  <div class="map-marker-pin" style="top: 15%; left: 42%;" data-name="Jaffna (Northern)" data-province="Northern">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Jaffna</strong>
                      <span class="text-muted fs-8">Northern Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">34 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <!-- North Central -->
                  <div class="map-marker-pin" style="top: 35%; left: 48%;" data-name="Anuradhapura (North Central)" data-province="North Central">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Anuradhapura</strong>
                      <span class="text-muted fs-8">North Central</span>
                      <span class="text-success fs-8 fw-semibold d-block">22 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <!-- Eastern -->
                  <div class="map-marker-pin" style="top: 38%; left: 68%;" data-name="Trincomalee (Eastern)" data-province="Eastern">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Trincomalee</strong>
                      <span class="text-muted fs-8">Eastern Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">28 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <!-- Western (Colombo) -->
                  <div class="map-marker-pin active" style="top: 65%; left: 32%;" data-name="Colombo (Western)" data-province="Western">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Colombo</strong>
                      <span class="text-muted fs-8">Western Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">125 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-danger display-6"></i>
                  </div>

                  <!-- Central (Kandy) -->
                  <div class="map-marker-pin" style="top: 55%; left: 50%;" data-name="Kandy (Central)" data-province="Central">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Kandy</strong>
                      <span class="text-muted fs-8">Central Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">65 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <!-- Uva (Ella) -->
                  <div class="map-marker-pin" style="top: 64%; left: 62%;" data-name="Badulla / Ella (Uva)" data-province="Uva">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Ella / Badulla</strong>
                      <span class="text-muted fs-8">Uva Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">41 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <!-- Southern (Galle) -->
                  <div class="map-marker-pin" style="top: 82%; left: 42%;" data-name="Galle (Southern)" data-province="Southern">
                    <div class="marker-popup shadow-soft">
                      <strong class="d-block text-navy fs-8">Galle</strong>
                      <span class="text-muted fs-8">Southern Province</span>
                      <span class="text-success fs-8 fw-semibold d-block">48 Properties</span>
                    </div>
                    <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                  </div>

                  <div class="position-absolute bottom-0 start-0 m-3 bg-white p-2 rounded-3 border shadow-xs text-navy fs-8">
                    <i class="bi bi-map me-1 text-primary"></i>Interactive Full Sri Lanka Coordinates Map Active
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- ADD / EDIT LOCATION MODAL -->
  <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="addLocationModalLabel">
            <i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Sri Lankan Location
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="locationForm">
            <div class="row g-3">
              
              <!-- 1. Location Level Select -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Location Entry Level</label>
                <select class="form-select border-light-custom shadow-none" id="locTypeSelect" required>
                  <option value="Province">1. Province</option>
                  <option value="District">2. District</option>
                  <option value="City/Town">3. City / Town</option>
                  <option value="Area" selected>4. Sub-Area</option>
                </select>
              </div>

              <!-- Location Name -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Location Name</label>
                <input type="text" class="form-control border-light-custom shadow-none" id="locNameInput" placeholder="e.g. Kalapaluwawa / Rajagiriya" required>
              </div>

              <!-- 2. Province Selection -->
              <div class="col-md-4" id="parentProvinceGroup">
                <label class="form-label small fw-semibold text-navy">Province</label>
                <select class="form-select border-light-custom shadow-none" id="parentProvinceSelect">
                  <option value="" disabled selected>Select Province...</option>
                  <option value="Western">Western Province</option>
                  <option value="Central">Central Province</option>
                  <option value="Southern">Southern Province</option>
                  <option value="Northern">Northern Province</option>
                  <option value="Eastern">Eastern Province</option>
                  <option value="North Western">North Western Province</option>
                  <option value="North Central">North Central Province</option>
                  <option value="Uva">Uva Province</option>
                  <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                </select>
              </div>

              <!-- 3. District Selection -->
              <div class="col-md-4" id="parentDistrictGroup">
                <label class="form-label small fw-semibold text-navy">District</label>
                <select class="form-select border-light-custom shadow-none" id="parentDistrictSelect">
                  <option value="" disabled selected>Select District...</option>
                  <option value="Colombo">Colombo District</option>
                  <option value="Gampaha">Gampaha District</option>
                  <option value="Kalutara">Kalutara District</option>
                  <option value="Kandy">Kandy District</option>
                  <option value="Galle">Galle District</option>
                  <option value="Jaffna">Jaffna District</option>
                </select>
              </div>

              <!-- 4. City/Town Selection -->
              <div class="col-md-4" id="parentCityGroup">
                <label class="form-label small fw-semibold text-navy">City / Town</label>
                <select class="form-select border-light-custom shadow-none" id="parentCitySelect">
                  <option value="" disabled selected>Select City/Town...</option>
                  <option value="Rajagiriya">Rajagiriya</option>
                  <option value="Nugegoda">Nugegoda</option>
                  <option value="Bambalapitiya">Bambalapitiya</option>
                  <option value="Peradeniya">Peradeniya</option>
                  <option value="Galle City">Galle City</option>
                </select>
              </div>

              <!-- Status -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Publication Status</label>
                <select class="form-select border-light-custom shadow-none" id="locStatusSelect">
                  <option value="Active" selected>Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>

              <!-- Coordinates -->
              <div class="col-md-3">
                <label class="form-label small fw-semibold text-navy">Latitude</label>
                <input type="text" class="form-control border-light-custom shadow-none" id="locLatInput" placeholder="6.9271">
              </div>

              <div class="col-md-3">
                <label class="form-label small fw-semibold text-navy">Longitude</label>
                <input type="text" class="form-control border-light-custom shadow-none" id="locLngInput" placeholder="79.8612">
              </div>

              <!-- Description -->
              <div class="col-12">
                <label class="form-label small fw-semibold text-navy">Location Notes / Landmarks</label>
                <textarea class="form-control border-light-custom shadow-none" id="locDescriptionInput" rows="2" placeholder="Brief geographical details or landmarks..."></textarea>
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSaveLocation">Save Location</button>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW PROPERTIES BY LOCATION MODAL -->
  <div class="modal fade" id="viewPropertiesModal" tabindex="-1" aria-labelledby="viewPropertiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <div>
            <h5 class="modal-title fw-bold text-navy mb-0" id="viewPropertiesModalLabel">Properties in Location</h5>
            <span class="fs-8 text-muted" id="modalLocationSubtitle">Location: Kalapaluwawa · Total Properties: 18</span>
          </div>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <div class="table-responsive border border-light-custom rounded-3">
            <table class="table table-hover align-middle mb-0">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-3">Property Title</th>
                  <th>Owner</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th class="text-end pe-3">Action</th>
                </tr>
              </thead>
              <tbody class="small">
                <tr>
                  <td class="ps-3 fw-bold text-navy">Luxury 3BR Apartment - Rajagiriya</td>
                  <td>Kasun Perera</td>
                  <td><span class="badge bg-light text-navy border">Apartment</span></td>
                  <td class="fw-semibold text-success">Rs. 120,000 / mo</td>
                  <td><span class="badge bg-success-subtle text-success">Active</span></td>
                  <td class="text-end pe-3">
                    <a href="properties.php" class="btn btn-light btn-sm border text-primary fw-semibold fs-8">View Listing</a>
                  </td>
                </tr>
                <tr>
                  <td class="ps-3 fw-bold text-navy">Modern House with Garden</td>
                  <td>Sunil Jayasinghe</td>
                  <td><span class="badge bg-light text-navy border">House</span></td>
                  <td class="fw-semibold text-success">Rs. 85,000 / mo</td>
                  <td><span class="badge bg-success-subtle text-success">Active</span></td>
                  <td class="text-end pe-3">
                    <a href="properties.php" class="btn btn-light btn-sm border text-primary fw-semibold fs-8">View Listing</a>
                  </td>
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

  <!-- CONFIRMATION DELETE MODAL -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-exclamation-triangle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deleteConfirmTitle">Delete Location?</h5>
          <p class="small text-muted mb-4" id="deleteConfirmBody">Properties assigned to this location hierarchy may require re-mapping.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnExecuteDelete">Confirm Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-locations.js"></script>
</body>
</html>