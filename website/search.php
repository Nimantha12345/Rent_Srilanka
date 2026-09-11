<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Houses for Rent in Kandy - RentSriLanka</title>
  
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
<body>

  <?php $activePage = 'properties'; $prefix = ''; include 'components/navbar.php'; ?>

  <main class="py-4">
    <div class="container">
      
      <!-- BREADCRUMB & PAGE HEADING -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item"><a href="properties.php" class="text-decoration-none text-muted">Properties</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Houses in Kandy</li>
        </ol>
      </nav>

      <div class="mb-4">
        <h1 class="h2 fw-bold text-navy mb-1">Houses for Rent in Kandy</h1>
        <p class="text-muted mb-0">Showing search results for verified rental homes in Kandy area.</p>
      </div>

      <!-- TOP SEARCH BAR -->
      <div class="card border-0 shadow-soft p-3 rounded-4 mb-3 bg-white">
        <form id="searchResultsSearchForm" action="search.php" method="GET">
          <div class="row g-2 align-items-center">
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="searchKeyword" name="keyword" class="form-control border-start-0 ps-0 border-light-custom shadow-none" placeholder="Keyword (e.g. Garden, AC)..." value="Garden">
              </div>
            </div>
            <div class="col-md-3">
              <select id="searchLocation" name="location" class="form-select border-light-custom shadow-none">
                <option value="">All Locations</option>
                <option value="colombo">Colombo</option>
                <option value="kandy" selected>Kandy</option>
                <option value="galle">Galle</option>
                <option value="gampaha">Gampaha</option>
                <option value="kurunegala">Kurunegala</option>
                <option value="matara">Matara</option>
              </select>
            </div>
            <div class="col-md-3">
              <select id="searchType" name="type" class="form-select border-light-custom shadow-none">
                <option value="">All Property Types</option>
                <option value="house" selected>House</option>
                <option value="room">Boarding Room</option>
                <option value="annex">Annex</option>
              </select>
            </div>
            <div class="col-md-2">
              <select id="searchPrice" name="price_range" class="form-select border-light-custom shadow-none">
                <option value="">Any Price</option>
                <option value="10-30">Rs. 10k - Rs. 30k</option>
                <option value="30-70" selected>Rs. 30k - Rs. 70k</option>
                <option value="70-120">Rs. 70k - Rs. 120k</option>
                <option value="120+">Rs. 120k+</option>
              </select>
            </div>
            <div class="col-md-1">
              <button type="submit" class="btn btn-primary w-100 fw-medium py-2">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- ACTIVE FILTER CHIPS -->
      <div class="d-flex align-items-center flex-wrap gap-2 mb-4" id="activeFilterChips">
        <span class="small fw-semibold text-muted me-1"><i class="bi bi-funnel me-1"></i>Active Filters:</span>
        <span class="badge bg-light text-navy border border-light-custom px-3 py-2 rounded-pill fw-normal d-inline-flex align-items-center gap-2">
          Kandy
          <a href="#" class="text-muted text-decoration-none remove-chip" data-filter="location"><i class="bi bi-x-circle-fill"></i></a>
        </span>
        <span class="badge bg-light text-navy border border-light-custom px-3 py-2 rounded-pill fw-normal d-inline-flex align-items-center gap-2">
          House
          <a href="#" class="text-muted text-decoration-none remove-chip" data-filter="type"><i class="bi bi-x-circle-fill"></i></a>
        </span>
        <span class="badge bg-light text-navy border border-light-custom px-3 py-2 rounded-pill fw-normal d-inline-flex align-items-center gap-2">
          Rs. 30,000 – Rs. 70,000
          <a href="#" class="text-muted text-decoration-none remove-chip" data-filter="price"><i class="bi bi-x-circle-fill"></i></a>
        </span>
        <span class="badge bg-light text-navy border border-light-custom px-3 py-2 rounded-pill fw-normal d-inline-flex align-items-center gap-2">
          2+ Bedrooms
          <a href="#" class="text-muted text-decoration-none remove-chip" data-filter="bedrooms"><i class="bi bi-x-circle-fill"></i></a>
        </span>
        <button class="btn btn-sm btn-link text-danger text-decoration-none p-0 ms-2 small fw-medium" id="clearAllChips">Clear All Filters</button>
      </div>

      <!-- MAIN LAYOUT -->
      <div class="row g-4">
        
        <!-- DESKTOP FILTER SIDEBAR -->
        <aside class="col-lg-3 d-none d-lg-block">
          <div class="card border-0 shadow-soft rounded-4 p-4 sticky-filter bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h2 class="h5 fw-bold mb-0 text-navy"><i class="bi bi-sliders me-2 text-primary-custom"></i>Filter Search</h2>
              <button type="button" class="btn btn-sm btn-link text-decoration-none text-muted p-0" id="clearDesktopFilters">Clear All</button>
            </div>
            <hr class="border-light-custom my-3">
            
            <form id="searchDesktopFilterForm">
              <!-- Property Type -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Property Type</label>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="house" id="searchTypeHouse" checked>
                  <label class="form-check-label small" for="searchTypeHouse">House</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="room" id="searchTypeRoom">
                  <label class="form-check-label small" for="searchTypeRoom">Boarding Room</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="annex" id="searchTypeAnnex">
                  <label class="form-check-label small" for="searchTypeAnnex">Annex</label>
                </div>
              </div>

              <!-- Location -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Location</label>
                <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="searchFilterDistrict">
                  <option value="">Select District</option>
                  <option value="colombo">Colombo</option>
                  <option value="kandy" selected>Kandy</option>
                  <option value="galle">Galle</option>
                  <option value="gampaha">Gampaha</option>
                </select>
                <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="searchFilterCity">
                  <option value="" selected>Select City</option>
                  <option value="peradeniya">Peradeniya</option>
                  <option value="anniewatte">Anniewatte</option>
                  <option value="katugastota">Katugastota</option>
                  <option value="digana">Digana</option>
                </select>
              </div>

              <!-- Price Range -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Price Range (LKR / mo)</label>
                <div class="row g-2">
                  <div class="col-6">
                    <input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Min" id="searchFilterMinPrice" value="30000">
                  </div>
                  <div class="col-6">
                    <input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Max" id="searchFilterMaxPrice" value="70000">
                  </div>
                </div>
              </div>

              <!-- Bedrooms -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Bedrooms</label>
                <div class="btn-group btn-group-sm w-100" role="group" aria-label="Bedrooms filter">
                  <input type="radio" class="btn-check" name="searchBedrooms" id="sBedAny">
                  <label class="btn btn-outline-secondary" for="sBedAny">Any</label>
                  <input type="radio" class="btn-check" name="searchBedrooms" id="sBed1">
                  <label class="btn btn-outline-secondary" for="sBed1">1</label>
                  <input type="radio" class="btn-check" name="searchBedrooms" id="sBed2" checked>
                  <label class="btn btn-outline-secondary" for="sBed2">2</label>
                  <input type="radio" class="btn-check" name="searchBedrooms" id="sBed3">
                  <label class="btn btn-outline-secondary" for="sBed3">3</label>
                  <input type="radio" class="btn-check" name="searchBedrooms" id="sBed4">
                  <label class="btn btn-outline-secondary" for="sBed4">4+</label>
                </div>
              </div>

              <!-- Bathrooms -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Bathrooms</label>
                <div class="btn-group btn-group-sm w-100" role="group" aria-label="Bathrooms filter">
                  <input type="radio" class="btn-check" name="searchBathrooms" id="sBathAny" checked>
                  <label class="btn btn-outline-secondary" for="sBathAny">Any</label>
                  <input type="radio" class="btn-check" name="searchBathrooms" id="sBath1">
                  <label class="btn btn-outline-secondary" for="sBath1">1</label>
                  <input type="radio" class="btn-check" name="searchBathrooms" id="sBath2">
                  <label class="btn btn-outline-secondary" for="sBath2">2</label>
                  <input type="radio" class="btn-check" name="searchBathrooms" id="sBath3">
                  <label class="btn btn-outline-secondary" for="sBath3">3+</label>
                </div>
              </div>

              <!-- Facilities -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Facilities &amp; Amenities</label>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacParking" checked><label class="form-check-label small" for="sFacParking">Parking</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacWifi"><label class="form-check-label small" for="sFacWifi">WiFi</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacKitchen" checked><label class="form-check-label small" for="sFacKitchen">Kitchen</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacBathroom" checked><label class="form-check-label small" for="sFacBathroom">Attached Bathroom</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacGarden"><label class="form-check-label small" for="sFacGarden">Garden</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacAC"><label class="form-check-label small" for="sFacAC">AC</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="sFacCCTV"><label class="form-check-label small" for="sFacCCTV">CCTV</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="sFacFurnished"><label class="form-check-label small" for="sFacFurnished">Furnished</label></div>
              </div>

              <button type="submit" class="btn btn-primary w-100 fw-medium">Apply Filters</button>
            </form>
          </div>
        </aside>

        <!-- RESULTS AREA -->
        <section class="col-lg-9">
          
          <!-- RESULT HEADER TOOLBAR -->
          <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
              <div>
                <h2 class="h5 fw-bold text-navy mb-0" id="searchResultHeader">47 Houses for Rent in Kandy</h2>
              </div>
              
              <div class="d-flex align-items-center gap-2 ms-auto flex-wrap">
                <!-- Action Buttons -->
                <button type="button" class="btn btn-outline-primary btn-sm d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileFilterOffcanvas" aria-controls="mobileFilterOffcanvas">
                  <i class="bi bi-funnel me-1"></i>Filter
                </button>
                
                <a href="map-search.php?location=kandy&type=house" class="btn btn-outline-secondary btn-sm">
                  <i class="bi bi-map me-1 text-teal"></i>Map View
                </a>

                <!-- Sort Dropdown -->
                <div class="d-flex align-items-center gap-2">
                  <select id="searchSortBy" class="form-select form-select-sm border-light-custom shadow-none" style="width: auto;">
                    <option value="newest" selected>Newest First</option>
                    <option value="price_low">Lowest Price</option>
                    <option value="price_high">Highest Price</option>
                    <option value="most_viewed">Most Viewed</option>
                  </select>
                </div>

                <!-- View Switcher -->
                <div class="btn-group btn-group-sm" role="group" aria-label="Layout View Switcher">
                  <button type="button" class="btn btn-outline-secondary active" id="btnSearchGridView" title="Grid View">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </button>
                  <button type="button" class="btn btn-outline-secondary" id="btnSearchListView" title="List View">
                    <i class="bi bi-list-task"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- EMPTY STATE (HIDDEN BY DEFAULT) -->
          <div id="searchEmptyState" class="card border-0 shadow-soft rounded-4 p-5 text-center my-4 bg-white d-none">
            <div class="py-4">
              <div class="bg-light-custom rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-house-x text-muted opacity-50 fs-1"></i>
              </div>
              <h3 class="h4 fw-bold text-navy">No properties match your search.</h3>
              <p class="text-muted small mb-4">We couldn't find any Houses in Kandy matching your exact criteria. Try broadening your budget or bedroom requirements.</p>
              <div class="d-flex justify-content-center gap-3 flex-wrap">
                <button class="btn btn-outline-primary fw-medium px-4" id="btnResetSearchEmpty">Clear Filters</button>
                <a href="properties.php" class="btn btn-primary fw-medium px-4">Browse All Properties</a>
              </div>
            </div>
          </div>

          <!-- PROPERTY RESULTS CONTAINER -->
          <div class="row g-4" id="searchResultsContainer">
            
            <!-- Result 01 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="Two Storey House in Anniewatte" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 65,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Two Storey Modern House in Anniewatte</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Anniewatte, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,600 sqft</span>
                  </div>

                  <!-- Facilities list preview -->
                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 day ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=301" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94771234567" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94771234567" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 02 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="Scenic 2-Bed House in Peradeniya" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 45,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Scenic 2-Bedroom House near Campus</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,100 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">WiFi</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=302" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94777654321" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94777654321" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 03 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="Cozy Family House in Katugastota" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 52,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Cozy 3-Bedroom Family House</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Katugastota, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,400 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">CCTV</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=303" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94712345678" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94712345678" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 04 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="Spacious Single Storey House in Digana" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 38,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Spacious Single Storey House</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Digana, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,000 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 4 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=304" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94751112233" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94751112233" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 05 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="Fully Furnished Hillside House" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 68,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Fully Furnished Hillside House</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Hanthana, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,550 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Furnished</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">AC</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 5 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=305" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94723334455" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94723334455" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 06 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="Modern 2 Bedroom House in Primrose" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 42,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Modern 2 Bedroom House in Primrose</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Primrose Road, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>980 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 week ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=306" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94789990011" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94789990011" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 07 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="3-Bedroom House near Kandy Town" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 60,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">3-Bedroom House near Kandy Town</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Suduhumpola, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,350 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 week ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=307" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94711122334" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94711122334" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 08 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="Compact 2-Bed House in Ampitiya" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 35,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Compact 2-Bed House with Garden</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Ampitiya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>900 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=308" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94772233445" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94772233445" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 09 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="Upper Floor 2-Bed House Unit" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 40,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Upper Floor 2-Bed Independent House</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Mawilmada, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>950 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=309" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94763334455" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94763334455" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 10 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="4-Bed Executive House in Kandy" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 70,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">4-Bed Executive House with Lake View</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajapihilla Mawatha, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>4 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>3 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>2,000 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">CCTV</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=310" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94714445566" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94714445566" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 11 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="Peaceful 3-Bed House in Kundasale" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 48,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Peaceful 3-Bed House in Scheme Area</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kundasale, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,300 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Kitchen</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=311" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94775556677" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94775556677" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Result 12 -->
            <div class="col-md-6 col-lg-4 search-property-item">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="2-Story Newly Built House in Gelioya" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified Owner
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 55,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">2-Story Newly Built Family House</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Gelioya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-2">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,450 sqft</span>
                  </div>

                  <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Parking</span>
                    <span class="badge bg-light text-secondary border border-light-custom font-normal small">Garden</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 month ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=312" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94786667788" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94786667788" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- PAGINATION -->
          <nav aria-label="Search results pagination" class="mt-5">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-left"></i> Previous</a>
              </li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next <i class="bi bi-chevron-right"></i></a>
              </li>
            </ul>
          </nav>

        </section>
      </div>
    </div>
  </main>

  <!-- STICKY MOBILE CONTROLS (VISIBLE ONLY ON MOBILE/TABLET) -->
  <div class="sticky-mobile-bar d-lg-none bg-white border-top border-light-custom p-2 fixed-bottom shadow-lg">
    <div class="container">
      <div class="row g-2">
        <div class="col-4">
          <button class="btn btn-outline-primary w-100 btn-sm py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileFilterOffcanvas" aria-controls="mobileFilterOffcanvas">
            <i class="bi bi-funnel-fill me-1"></i> Filter
          </button>
        </div>
        <div class="col-4">
          <button class="btn btn-outline-secondary w-100 btn-sm py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-sort-down me-1"></i> Sort
          </button>
          <ul class="dropdown-menu shadow">
            <li><a class="dropdown-item small active" href="#">Newest First</a></li>
            <li><a class="dropdown-item small" href="#">Lowest Price</a></li>
            <li><a class="dropdown-item small" href="#">Highest Price</a></li>
            <li><a class="dropdown-item small" href="#">Most Viewed</a></li>
          </ul>
        </div>
        <div class="col-4">
          <a href="map-search.php?location=kandy&type=house" class="btn btn-teal w-100 btn-sm py-2 text-white fw-medium">
            <i class="bi bi-map-fill me-1"></i> Map
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- MOBILE FILTER OFFCANVAS -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileFilterOffcanvas" aria-labelledby="mobileFilterOffcanvasLabel">
    <div class="offcanvas-header border-bottom border-light-custom">
      <h5 class="offcanvas-title fw-bold text-navy" id="mobileFilterOffcanvasLabel">
        <i class="bi bi-sliders text-primary-custom me-2"></i>Filter Search
      </h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form id="searchMobileFilterForm">
        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Property Type</label>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="house" id="mSearchTypeHouse" checked>
            <label class="form-check-label small" for="mSearchTypeHouse">House</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="room" id="mSearchTypeRoom">
            <label class="form-check-label small" for="mSearchTypeRoom">Boarding Room</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="annex" id="mSearchTypeAnnex">
            <label class="form-check-label small" for="mSearchTypeAnnex">Annex</label>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Location</label>
          <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="mSearchFilterDistrict">
            <option value="">Select District</option>
            <option value="colombo">Colombo</option>
            <option value="kandy" selected>Kandy</option>
            <option value="galle">Galle</option>
            <option value="gampaha">Gampaha</option>
          </select>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Price Range (LKR)</label>
          <div class="row g-2">
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Min" id="mSearchFilterMinPrice" value="30000"></div>
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Max" id="mSearchFilterMaxPrice" value="70000"></div>
          </div>
        </div>

        <div class="d-grid gap-2 mb-3">
          <button type="submit" class="btn btn-primary fw-medium" data-bs-dismiss="offcanvas">Apply Filters</button>
          <button type="button" class="btn btn-light border fw-medium" id="clearMobileSearchFilters">Clear All</button>
        </div>
      </form>
    </div>
  </div>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/search.js"></script>
</body>
</html>