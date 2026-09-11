<?php $activePage = 'categories'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category & Facility Management - RentSriLanka Admin</title>

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
            <h1 class="h3 fw-bold text-navy mb-1">Category & Facility Management</h1>
            <p class="text-muted mb-0">Manage property categories, amenities, facilities, and view assigned listings.</p>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-light border btn-sm d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterCategoryOffcanvas" aria-controls="filterCategoryOffcanvas">
              <i class="bi bi-funnel me-1"></i>Filters
            </button>
            <button class="btn btn-navy btn-sm fw-bold rounded-3 px-3 shadow-soft me-1" id="btnOpenAddFacilityModal">
              <i class="bi bi-sliders me-1"></i>Add Facility
            </button>
            <button class="btn btn-primary btn-sm fw-bold rounded-3 px-3 shadow-soft" id="btnOpenAddCategoryModal">
              <i class="bi bi-plus-circle me-1"></i>Add Category
            </button>
          </div>
        </div>

        <!-- STATISTICS CARDS (INCLUDES TOTAL FACILITIES CARD) -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Categories</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-tags-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-categories">4</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Active Categories</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-check-circle-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-active-categories">3</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Facilities</span>
                <div class="stat-icon-sm bg-purple-subtle text-purple rounded-circle"><i class="bi bi-sliders text-primary"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-facilities">10</h3>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-medium">Total Properties</span>
                <div class="stat-icon-sm bg-teal-subtle text-teal rounded-circle"><i class="bi bi-houses-fill"></i></div>
              </div>
              <h3 class="h4 fw-bold text-navy mb-0" id="stat-total-properties">275</h3>
            </div>
          </div>
        </div>

        <!-- CATEGORY SEARCH & DESKTOP FILTERS -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3 mb-4">
          <div class="row g-2 align-items-center">
            <div class="col-12 col-md-6">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-light-custom shadow-none" id="categorySearchInput" placeholder="Search categories by name, slug or description...">
                <button class="btn btn-light border border-light-custom" type="button" id="btnClearSearch" title="Clear Search"><i class="bi bi-x-lg"></i></button>
              </div>
            </div>

            <div class="col-12 col-md-6 d-none d-md-flex align-items-center gap-2 justify-content-end">
              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterStatus">
                <option value="all" selected>All Statuses</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>

              <select class="form-select form-select-sm border-light-custom shadow-none w-auto" id="filterCount">
                <option value="all" selected>All Property Counts</option>
                <option value="with">With Properties (>0)</option>
                <option value="without">Without Properties (0)</option>
              </select>

              <button class="btn btn-outline-secondary btn-sm fw-medium rounded-3" id="btnResetFilters" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- MOBILE FILTER OFFCANVAS -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="filterCategoryOffcanvas" aria-labelledby="filterCategoryOffcanvasLabel">
          <div class="offcanvas-header border-bottom border-light-custom">
            <h5 class="offcanvas-title fw-bold text-navy" id="filterCategoryOffcanvasLabel">Filter Categories</h5>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Status</label>
              <select class="form-select border-light-custom shadow-none" id="filterStatusMobile">
                <option value="all" selected>All Statuses</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="mb-4">
              <label class="form-label small fw-semibold text-navy">Property Count</label>
              <select class="form-select border-light-custom shadow-none" id="filterCountMobile">
                <option value="all" selected>All Property Counts</option>
                <option value="with">With Properties (&gt;0)</option>
                <option value="without">Without Properties (0)</option>
              </select>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary flex-fill fw-medium" id="btnResetFiltersMobile" type="button">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
              </button>
              <button class="btn btn-primary flex-fill fw-bold" id="btnApplyFiltersMobile" type="button" data-bs-dismiss="offcanvas">
                Apply Filters
              </button>
            </div>
          </div>
        </div>

        <!-- CATEGORY CARDS GRID -->
        <div class="row g-4 mb-5" id="categoryCardsGrid">

          <!-- Category Card 1: House -->
          <div class="col-md-6 col-xl-4 category-card-col"
            data-category-id="CAT-101"
            data-category-name="House"
            data-slug="house"
            data-description="Complete residential houses available for rent across Sri Lanka."
            data-property-count="125"
            data-status="Active"
            data-icon="bi-house-door"
            data-image="../assets/images/properties/house-1.jpg"
            data-created-date="2026-01-05"
            data-updated-date="2026-08-20">
            <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white h-100 position-relative">
              <div class="category-card-img-wrapper position-relative">
                <img src="../assets/images/properties/house-1.jpg" class="card-img-top object-fit-cover w-100" style="height: 140px;" alt="House Category">
                <span class="badge bg-success text-white position-absolute top-0 end-0 m-3 shadow-xs">Active</span>
                <div class="category-card-icon-badge bg-navy text-white rounded-circle shadow-soft d-flex align-items-center justify-content-center">
                  <i class="bi bi-house-door-fill fs-5"></i>
                </div>
              </div>

              <div class="card-body p-4 pt-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="fw-bold text-navy mb-0 card-title-text">House</h5>
                  <span class="badge bg-teal-subtle text-teal border border-teal-subtle fw-semibold rounded-pill px-3 py-1">125 Properties</span>
                </div>

                <p class="fs-8 text-muted mb-3 card-desc-text line-clamp-2">Complete residential houses available for rent across Sri Lanka.</p>

                <div class="p-2.5 bg-light-custom rounded-3 border border-light-custom mb-3 fs-8 text-navy d-flex align-items-center justify-content-between">
                  <span><strong>Slug:</strong> <code>house</code></span>
                  <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>Jan 05, 2026</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn btn-outline-primary btn-sm fw-medium flex-fill rounded-3 btn-view-category-properties" data-category-id="CAT-101" data-category-name="House" data-count="125">
                    <i class="bi bi-houses me-1"></i>View Properties
                  </button>
                  <button type="button" class="btn btn-light border btn-sm text-navy btn-edit-category" data-category-id="CAT-101" title="Edit Category">
                    <i class="bi bi-pencil"></i>
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item btn-view-details" data-category-id="CAT-101"><i class="bi bi-info-circle me-2 text-primary"></i>Category Details</button></li>
                      <li><button class="dropdown-item btn-toggle-status" data-category-id="CAT-101" data-status="Active"><i class="bi bi-pause-circle me-2 text-warning"></i>Deactivate</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger btn-delete-category" data-category-id="CAT-101" data-category-name="House" data-count="125"><i class="bi bi-trash3 me-2"></i>Delete Category</button></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Category Card 2: Room -->
          <div class="col-md-6 col-xl-4 category-card-col"
            data-category-id="CAT-102"
            data-category-name="Room"
            data-slug="room"
            data-description="Single and shared boarding rooms for students and working professionals."
            data-property-count="86"
            data-status="Active"
            data-icon="bi-door-open"
            data-image="../assets/images/properties/room-1.jpg"
            data-created-date="2026-01-10"
            data-updated-date="2026-08-25">
            <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white h-100 position-relative">
              <div class="category-card-img-wrapper position-relative">
                <img src="../assets/images/properties/room-1.jpg" class="card-img-top object-fit-cover w-100" style="height: 140px;" alt="Room Category">
                <span class="badge bg-success text-white position-absolute top-0 end-0 m-3 shadow-xs">Active</span>
                <div class="category-card-icon-badge bg-navy text-white rounded-circle shadow-soft d-flex align-items-center justify-content-center">
                  <i class="bi bi-door-open-fill fs-5"></i>
                </div>
              </div>

              <div class="card-body p-4 pt-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="fw-bold text-navy mb-0 card-title-text">Room</h5>
                  <span class="badge bg-teal-subtle text-teal border border-teal-subtle fw-semibold rounded-pill px-3 py-1">86 Properties</span>
                </div>

                <p class="fs-8 text-muted mb-3 card-desc-text line-clamp-2">Single and shared boarding rooms for students and working professionals.</p>

                <div class="p-2.5 bg-light-custom rounded-3 border border-light-custom mb-3 fs-8 text-navy d-flex align-items-center justify-content-between">
                  <span><strong>Slug:</strong> <code>room</code></span>
                  <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>Jan 10, 2026</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn btn-outline-primary btn-sm fw-medium flex-fill rounded-3 btn-view-category-properties" data-category-id="CAT-102" data-category-name="Room" data-count="86">
                    <i class="bi bi-houses me-1"></i>View Properties
                  </button>
                  <button type="button" class="btn btn-light border btn-sm text-navy btn-edit-category" data-category-id="CAT-102" title="Edit Category">
                    <i class="bi bi-pencil"></i>
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item btn-view-details" data-category-id="CAT-102"><i class="bi bi-info-circle me-2 text-primary"></i>Category Details</button></li>
                      <li><button class="dropdown-item btn-toggle-status" data-category-id="CAT-102" data-status="Active"><i class="bi bi-pause-circle me-2 text-warning"></i>Deactivate</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger btn-delete-category" data-category-id="CAT-102" data-category-name="Room" data-count="86"><i class="bi bi-trash3 me-2"></i>Delete Category</button></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Category Card 3: Annex -->
          <div class="col-md-6 col-xl-4 category-card-col"
            data-category-id="CAT-103"
            data-category-name="Annex"
            data-slug="annex"
            data-description="Self-contained private annexes and upper-floor living spaces."
            data-property-count="64"
            data-status="Active"
            data-icon="bi-building"
            data-image="../assets/images/properties/annex-1.jpg"
            data-created-date="2026-01-15"
            data-updated-date="2026-08-28">
            <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white h-100 position-relative">
              <div class="category-card-img-wrapper position-relative">
                <img src="../assets/images/properties/annex-1.jpg" class="card-img-top object-fit-cover w-100" style="height: 140px;" alt="Annex Category">
                <span class="badge bg-success text-white position-absolute top-0 end-0 m-3 shadow-xs">Active</span>
                <div class="category-card-icon-badge bg-navy text-white rounded-circle shadow-soft d-flex align-items-center justify-content-center">
                  <i class="bi bi-building-fill fs-5"></i>
                </div>
              </div>

              <div class="card-body p-4 pt-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="fw-bold text-navy mb-0 card-title-text">Annex</h5>
                  <span class="badge bg-teal-subtle text-teal border border-teal-subtle fw-semibold rounded-pill px-3 py-1">64 Properties</span>
                </div>

                <p class="fs-8 text-muted mb-3 card-desc-text line-clamp-2">Self-contained private annexes and upper-floor living spaces.</p>

                <div class="p-2.5 bg-light-custom rounded-3 border border-light-custom mb-3 fs-8 text-navy d-flex align-items-center justify-content-between">
                  <span><strong>Slug:</strong> <code>annex</code></span>
                  <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>Jan 15, 2026</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn btn-outline-primary btn-sm fw-medium flex-fill rounded-3 btn-view-category-properties" data-category-id="CAT-103" data-category-name="Annex" data-count="64">
                    <i class="bi bi-houses me-1"></i>View Properties
                  </button>
                  <button type="button" class="btn btn-light border btn-sm text-navy btn-edit-category" data-category-id="CAT-103" title="Edit Category">
                    <i class="bi bi-pencil"></i>
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item btn-view-details" data-category-id="CAT-103"><i class="bi bi-info-circle me-2 text-primary"></i>Category Details</button></li>
                      <li><button class="dropdown-item btn-toggle-status" data-category-id="CAT-103" data-status="Active"><i class="bi bi-pause-circle me-2 text-warning"></i>Deactivate</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger btn-delete-category" data-category-id="CAT-103" data-category-name="Annex" data-count="64"><i class="bi bi-trash3 me-2"></i>Delete Category</button></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Category Card 4: Commercial Unit -->
          <div class="col-md-6 col-xl-4 category-card-col"
            data-category-id="CAT-104"
            data-category-name="Commercial Unit"
            data-slug="commercial-unit"
            data-description="Shops, office spaces and commercial storage properties."
            data-property-count="0"
            data-status="Inactive"
            data-icon="bi-shop"
            data-image="../assets/images/properties/recent-1.jpg"
            data-created-date="2026-02-01"
            data-updated-date="2026-09-01">
            <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white h-100 position-relative opacity-75">
              <div class="category-card-img-wrapper position-relative">
                <img src="../assets/images/properties/recent-1.jpg" class="card-img-top object-fit-cover w-100 grayscale-img" style="height: 140px;" alt="Commercial Unit Category">
                <span class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 shadow-xs">Inactive</span>
                <div class="category-card-icon-badge bg-secondary text-white rounded-circle shadow-soft d-flex align-items-center justify-content-center">
                  <i class="bi bi-shop fs-5"></i>
                </div>
              </div>

              <div class="card-body p-4 pt-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="fw-bold text-navy mb-0 card-title-text">Commercial Unit</h5>
                  <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fw-semibold rounded-pill px-3 py-1">0 Properties</span>
                </div>

                <p class="fs-8 text-muted mb-3 card-desc-text line-clamp-2">Shops, office spaces and commercial storage properties.</p>

                <div class="p-2.5 bg-light-custom rounded-3 border border-light-custom mb-3 fs-8 text-navy d-flex align-items-center justify-content-between">
                  <span><strong>Slug:</strong> <code>commercial-unit</code></span>
                  <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>Feb 01, 2026</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn btn-outline-secondary btn-sm fw-medium flex-fill rounded-3 btn-view-category-properties" data-category-id="CAT-104" data-category-name="Commercial Unit" data-count="0" disabled>
                    <i class="bi bi-houses me-1"></i>0 Properties
                  </button>
                  <button type="button" class="btn btn-light border btn-sm text-navy btn-edit-category" data-category-id="CAT-104" title="Edit Category">
                    <i class="bi bi-pencil"></i>
                  </button>

                  <div class="dropdown">
                    <button class="btn btn-light border btn-sm text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                      <li><button class="dropdown-item btn-view-details" data-category-id="CAT-104"><i class="bi bi-info-circle me-2 text-primary"></i>Category Details</button></li>
                      <li><button class="dropdown-item btn-toggle-status" data-category-id="CAT-104" data-status="Inactive"><i class="bi bi-play-circle me-2 text-success"></i>Activate</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger btn-delete-category" data-category-id="CAT-104" data-category-name="Commercial Unit" data-count="0"><i class="bi bi-trash3 me-2"></i>Delete Category</button></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- EMPTY STATE CONTAINER FOR CATEGORIES -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white p-5 text-center d-none my-4" id="emptyCategoryState">
          <div class="stat-icon-lg bg-light-custom text-muted rounded-circle mx-auto mb-3">
            <i class="bi bi-grid-3x3-gap display-6"></i>
          </div>
          <h5 class="fw-bold text-navy mb-1">No categories found</h5>
          <p class="small text-muted mb-3">Create your first property category or clear active search filters.</p>
          <div class="d-flex justify-content-center gap-2">
            <button class="btn btn-outline-primary btn-sm rounded-pill fw-medium" id="btnResetEmptySearch">
              <i class="bi bi-arrow-counterclockwise me-1"></i>Clear Filters
            </button>
            <button class="btn btn-primary btn-sm rounded-pill fw-bold" id="btnEmptyAddCategory">
              <i class="bi bi-plus-circle me-1"></i>Add Category
            </button>
          </div>
        </div>


        <!-- ========================================== -->
        <!-- FACILITIES CATALOG SECTION WITH SEARCH BAR -->
        <!-- ========================================== -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden mb-4">
          <div class="p-4 border-bottom border-light-custom d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
              <h2 class="h5 fw-bold text-navy mb-1"><i class="bi bi-sliders text-primary me-2"></i>Amenities &amp; Facilities Catalog</h2>
              <p class="text-muted small mb-0">Manage feature tags and icons available across rental search filters and listing submissions.</p>
            </div>
            
            <div class="d-flex align-items-center gap-2 flex-grow-1 flex-md-grow-0 justify-content-end">
              <!-- Facility Search Bar -->
              <div class="input-group input-group-sm max-w-350">
                <span class="input-group-text bg-light-custom border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-light-custom shadow-none" id="facilitySearchInput" placeholder="Search facility name or tag...">
                <button class="btn btn-light border border-light-custom" type="button" id="btnClearFacilitySearch" title="Clear Search"><i class="bi bi-x-lg"></i></button>
              </div>

              <button class="btn btn-navy btn-sm fw-medium rounded-3 text-nowrap" id="btnSectionAddFacility">
                <i class="bi bi-plus-lg me-1"></i>Add Facility
              </button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Facility Name</th>
                  <th>Icon Class</th>
                  <th>Filter Tag</th>
                  <th>Enabled</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="facilitiesTableBody">
                <tr class="facility-row" data-facility-name="parking" data-tag="has_parking">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-p-square text-success me-2 fs-6"></i>Parking</td>
                  <td><code>bi-p-square</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_parking</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Parking" data-icon="bi-p-square" data-tag="has_parking"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Parking"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="wifi" data-tag="has_wifi">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-wifi text-success me-2 fs-6"></i>WiFi</td>
                  <td><code>bi-wifi</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_wifi</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="WiFi" data-icon="bi-wifi" data-tag="has_wifi"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="WiFi"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="kitchen" data-tag="has_kitchen">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-cup-hot text-success me-2 fs-6"></i>Kitchen</td>
                  <td><code>bi-cup-hot</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_kitchen</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Kitchen" data-icon="bi-cup-hot" data-tag="has_kitchen"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Kitchen"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="attached bathroom" data-tag="has_bathroom">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-droplet-half text-success me-2 fs-6"></i>Attached Bathroom</td>
                  <td><code>bi-droplet-half</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_bathroom</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Attached Bathroom" data-icon="bi-droplet-half" data-tag="has_bathroom"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Attached Bathroom"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="garden" data-tag="has_garden">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-tree text-success me-2 fs-6"></i>Garden</td>
                  <td><code>bi-tree</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_garden</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Garden" data-icon="bi-tree" data-tag="has_garden"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Garden"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="ac" data-tag="has_ac">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-snow text-success me-2 fs-6"></i>AC</td>
                  <td><code>bi-snow</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_ac</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="AC" data-icon="bi-snow" data-tag="has_ac"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="AC"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="cctv" data-tag="has_cctv">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-camera-video text-success me-2 fs-6"></i>CCTV</td>
                  <td><code>bi-camera-video</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_cctv</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="CCTV" data-icon="bi-camera-video" data-tag="has_cctv"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="CCTV"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="water" data-tag="has_water">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-water text-success me-2 fs-6"></i>Water</td>
                  <td><code>bi-water</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_water</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Water" data-icon="bi-water" data-tag="has_water"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Water"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="electricity" data-tag="has_electricity">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-lightning-charge text-success me-2 fs-6"></i>Electricity</td>
                  <td><code>bi-lightning-charge</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">has_electricity</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Electricity" data-icon="bi-lightning-charge" data-tag="has_electricity"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Electricity"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr class="facility-row" data-facility-name="furnished" data-tag="is_furnished">
                  <td class="ps-4 fw-bold text-navy"><i class="bi bi-house-gear text-success me-2 fs-6"></i>Furnished</td>
                  <td><code>bi-house-gear</code></td>
                  <td><span class="badge bg-light text-navy border border-light-custom">is_furnished</span></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" checked>
                    </div>
                  </td>
                  <td class="text-end pe-4">
                    <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="Furnished" data-icon="bi-house-gear" data-tag="is_furnished"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="Furnished"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- CATEGORY PROPERTIES MODAL -->
  <div class="modal fade" id="categoryPropertiesModal" tabindex="-1" aria-labelledby="categoryPropertiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="categoryPropertiesModalLabel"><i class="bi bi-houses text-primary-custom me-2"></i>Properties in Category</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-4 text-center">
          <h5 class="fw-bold text-navy mb-1" id="catPropModalTitle">Properties in Category: House</h5>
          <div class="stat-icon-lg bg-primary-subtle text-primary rounded-circle mx-auto my-3">
            <i class="bi bi-houses-fill display-6"></i>
          </div>
          <p class="text-muted small mb-0" id="catPropModalSubtitle">Total Assigned Properties: 0</p>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Close</button>
          <a href="properties.php" class="btn btn-primary fw-bold" id="catPropModalViewAllLink">
            <i class="bi bi-arrow-right me-1"></i>View All in Properties
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- CATEGORY DETAILS MODAL -->
  <div class="modal fade" id="categoryDetailsModal" tabindex="-1" aria-labelledby="categoryDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="categoryDetailsModalLabel"><i class="bi bi-info-circle text-primary-custom me-2"></i>Category Details</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <ul class="list-group list-group-flush small">
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Category ID</span><span class="fw-semibold text-navy" id="cdId">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Name</span><span class="fw-semibold text-navy" id="cdName">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Slug</span><code id="cdSlug">-</code>
            </li>
            <li class="list-group-item px-0">
              <span class="text-muted d-block mb-1">Description</span><span class="text-navy" id="cdDesc">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Property Count</span><span class="fw-semibold text-navy" id="cdCount">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Status</span><span class="fw-semibold text-navy" id="cdStatus">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Created</span><span class="text-navy" id="cdCreated">-</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Last Updated</span><span class="text-navy" id="cdUpdated">-</span>
            </li>
          </ul>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- CANNOT DELETE CATEGORY MODAL -->
  <div class="modal fade" id="cannotDeleteModal" tabindex="-1" aria-labelledby="cannotDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-warning mb-3"><i class="bi bi-exclamation-triangle-fill display-4"></i></div>
          <h5 class="fw-bold text-navy mb-2" id="cannotDeleteTitle">Cannot Delete Category</h5>
          <p class="small text-muted mb-1" id="cannotDeleteMessage">This category still has properties assigned to it.</p>
          <p class="small text-muted mb-4"><span id="cannotDeleteCount">0</span> propert(y/ies) must be reassigned or removed first.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary flex-fill fw-bold" id="btnCannotDeleteViewProperties">View Properties</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ADD / EDIT FACILITY MODAL FORM -->
  <div class="modal fade" id="facilityFormModal" tabindex="-1" aria-labelledby="facilityFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="facilityFormModalLabel">
            <i class="bi bi-plus-circle text-primary-custom me-2"></i>Add Facility / Amenity
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="facilityForm">
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Facility Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control border-light-custom shadow-none" id="facNameInput" placeholder="e.g. Swimming Pool" required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Bootstrap Icon Class</label>
              <div class="input-group">
                <span class="input-group-text bg-light-custom border-light-custom text-navy" id="facIconPreview"><i class="bi bi-sliders"></i></span>
                <input type="text" class="form-control border-light-custom shadow-none" id="facIconInput" placeholder="e.g. bi-water" value="bi-sliders">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold text-navy">Filter Tag / System Key</label>
              <input type="text" class="form-control border-light-custom shadow-none" id="facTagInput" placeholder="e.g. has_pool">
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSaveFacility">Save Facility</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ADD / EDIT CATEGORY MODAL -->
  <div class="modal fade" id="categoryFormModal" tabindex="-1" aria-labelledby="categoryFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="categoryFormModalLabel">
            <i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Category
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <form id="categoryForm" class="needs-validation" novalidate>
            <input type="hidden" id="catFormId" value="">

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control border-light-custom shadow-none" id="catNameInput" placeholder="e.g. Boarding Room" required>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">URL Slug <span class="text-muted fs-8">(Auto-generated)</span></label>
                <input type="text" class="form-control border-light-custom shadow-none bg-light-custom" id="catSlugInput" placeholder="e.g. boarding-room" required readonly>
              </div>

              <div class="col-12">
                <label class="form-label small fw-semibold text-navy">Description</label>
                <textarea class="form-control border-light-custom shadow-none" id="catDescInput" rows="3" placeholder="Brief description of properties belonging to this category..."></textarea>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Category Bootstrap Icon Class</label>
                <div class="input-group">
                  <span class="input-group-text bg-light-custom border-light-custom text-navy" id="iconPreviewSpan"><i class="bi bi-tag"></i></span>
                  <input type="text" class="form-control border-light-custom shadow-none" id="catIconInput" placeholder="e.g. bi-house-door" value="bi-house-door">
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Category Thumbnail Image</label>
                <input type="file" class="form-control border-light-custom shadow-none" id="catImageInput" accept="image/*">
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold text-navy">Status</label>
                <select class="form-select border-light-custom shadow-none" id="catStatusSelect">
                  <option value="Active" selected>Active (Selectable by Owners)</option>
                  <option value="Inactive">Inactive (Hidden from Submission)</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom pt-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSaveCategory">Save Category</button>
        </div>
      </div>
    </div>
  </div>

  <!-- CONFIRM DELETE MODAL -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-trash3-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="confirmDeleteTitle">Delete Item?</h5>
          <p class="small text-muted mb-4" id="confirmDeleteText">Are you sure you want to permanently delete this item?</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnExecuteDeleteCategory">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-categories.js"></script>
</body>
</html>