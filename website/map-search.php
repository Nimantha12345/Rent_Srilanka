<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map Search - RentSriLanka</title>
  
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
<body class="map-search-page overflow-hidden-desktop">

  <?php $activePage = 'map-search'; $prefix = ''; include 'components/navbar.php'; ?>

  <!-- TOP SEARCH BAR HEADER -->
  <header class="bg-white border-bottom border-light-custom py-2 px-3 px-lg-4 sticky-search-header">
    <form id="mapSearchHeaderForm">
      <div class="row g-2 align-items-center">
        <div class="col-6 col-md-3">
          <select id="mapLocationSelect" class="form-select form-select-sm border-light-custom shadow-none">
            <option value="">All Locations</option>
            <option value="colombo">Colombo</option>
            <option value="kandy" selected>Kandy</option>
            <option value="galle">Galle</option>
            <option value="gampaha">Gampaha</option>
            <option value="kurunegala">Kurunegala</option>
          </select>
        </div>
        
        <div class="col-6 col-md-3">
          <select id="mapTypeSelect" class="form-select form-select-sm border-light-custom shadow-none">
            <option value="">All Property Types</option>
            <option value="house" selected>House</option>
            <option value="room">Boarding Room</option>
            <option value="annex">Annex</option>
          </select>
        </div>

        <div class="col-6 col-md-3">
          <select id="mapPriceSelect" class="form-select form-select-sm border-light-custom shadow-none">
            <option value="">Any Price</option>
            <option value="10-30">Rs. 10k - Rs. 30k</option>
            <option value="30-70" selected>Rs. 30k - Rs. 70k</option>
            <option value="70-120">Rs. 70k - Rs. 120k</option>
          </select>
        </div>

        <div class="col-6 col-md-3 d-flex gap-2">
          <button type="submit" class="btn btn-primary btn-sm flex-fill fw-medium">
            <i class="bi bi-search me-1"></i>Search
          </button>
          <button type="button" class="btn btn-outline-secondary btn-sm fw-medium" data-bs-toggle="offcanvas" data-bs-target="#mapFilterOffcanvas">
            <i class="bi bi-funnel"></i> Filters
          </button>
        </div>
      </div>
    </form>
  </header>

  <!-- MAIN SPLIT CONTAINER -->
  <div class="map-split-container">
    <div class="container-fluid p-0 h-100">
      <div class="row g-0 h-100 position-relative">
        
        <!-- LEFT PANEL: PROPERTY LIST (40% DESKTOP) -->
        <aside class="col-lg-5 col-xl-4 map-property-list-panel bg-light-custom border-end border-light-custom d-none d-lg-block">
          <div class="p-3 bg-white border-bottom border-light-custom d-flex justify-content-between align-items-center">
            <div>
              <span class="h6 fw-bold text-navy mb-0 d-block" id="mapListCount">4 Properties in Kandy</span>
              <span class="small text-muted">Click a card or marker to view details</span>
            </div>
            <select class="form-select form-select-sm w-auto border-light-custom shadow-none" id="mapSortBy">
              <option value="newest">Newest</option>
              <option value="price_low">Price: Low to High</option>
              <option value="price_high">Price: High to Low</option>
            </select>
          </div>

          <!-- LIST SCROLL AREA -->
          <div class="map-list-scroll p-3">
            
            <!-- Item 1 -->
            <div class="card property-card border-light-custom shadow-soft rounded-3 overflow-hidden mb-3 map-card-item active-map-card" data-id="101" data-marker="m25">
              <div class="row g-0">
                <div class="col-4 position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="w-100 h-100 object-fit-cover" alt="Furnished Annex in Peradeniya">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-2">Annex</span>
                </div>
                <div class="col-8">
                  <div class="card-body p-2 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start">
                      <div class="price-tag fs-6">Rs. 25,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                      <button class="btn btn-link text-muted p-0 btn-favorite me-1"><i class="bi bi-heart fs-6"></i></button>
                    </div>
                    <h3 class="h6 card-title text-truncate fw-semibold mb-1">Furnished 1-Bed Annex</h3>
                    <p class="text-muted small mb-1 text-truncate"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya Road, Kandy</p>
                    <div class="d-flex gap-2 text-muted small border-top pt-1 mt-auto">
                      <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                      <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 2 -->
            <div class="card property-card border-light-custom shadow-soft rounded-3 overflow-hidden mb-3 map-card-item" data-id="102" data-marker="m35">
              <div class="row g-0">
                <div class="col-4 position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="w-100 h-100 object-fit-cover" alt="House in Katugastota">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-2">House</span>
                </div>
                <div class="col-8">
                  <div class="card-body p-2 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start">
                      <div class="price-tag fs-6">Rs. 35,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                      <button class="btn btn-link text-muted p-0 btn-favorite me-1"><i class="bi bi-heart fs-6"></i></button>
                    </div>
                    <h3 class="h6 card-title text-truncate fw-semibold mb-1">Compact 2-Bed Garden House</h3>
                    <p class="text-muted small mb-1 text-truncate"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Katugastota, Kandy</p>
                    <div class="d-flex gap-2 text-muted small border-top pt-1 mt-auto">
                      <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                      <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="card property-card border-light-custom shadow-soft rounded-3 overflow-hidden mb-3 map-card-item" data-id="103" data-marker="m45">
              <div class="row g-0">
                <div class="col-4 position-relative">
                  <img src="assets/images/properties/annex-1.jpg" class="w-100 h-100 object-fit-cover" alt="House in Peradeniya">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-2">House</span>
                </div>
                <div class="col-8">
                  <div class="card-body p-2 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start">
                      <div class="price-tag fs-6">Rs. 45,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                      <button class="btn btn-link text-muted p-0 btn-favorite me-1"><i class="bi bi-heart fs-6"></i></button>
                    </div>
                    <h3 class="h6 card-title text-truncate fw-semibold mb-1">2 Bedroom Modern House</h3>
                    <p class="text-muted small mb-1 text-truncate"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                    <div class="d-flex gap-2 text-muted small border-top pt-1 mt-auto">
                      <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                      <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 4 -->
            <div class="card property-card border-light-custom shadow-soft rounded-3 overflow-hidden mb-3 map-card-item" data-id="104" data-marker="m55">
              <div class="row g-0">
                <div class="col-4 position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="w-100 h-100 object-fit-cover" alt="Luxury House in Anniewatte">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-2">House</span>
                </div>
                <div class="col-8">
                  <div class="card-body p-2 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start">
                      <div class="price-tag fs-6">Rs. 55,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                      <button class="btn btn-link text-muted p-0 btn-favorite me-1"><i class="bi bi-heart fs-6"></i></button>
                    </div>
                    <h3 class="h6 card-title text-truncate fw-semibold mb-1">2-Story Family House</h3>
                    <p class="text-muted small mb-1 text-truncate"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Anniewatte, Kandy</p>
                    <div class="d-flex gap-2 text-muted small border-top pt-1 mt-auto">
                      <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                      <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </aside>

        <!-- RIGHT PANEL: INTERACTIVE MAP SIMULATION (60% DESKTOP / 100% MOBILE) -->
        <main class="col-lg-7 col-xl-8 h-100 map-canvas-wrapper position-relative overflow-hidden bg-secondary-subtle">
          
          <!-- SEARCH THIS AREA BUTTON (STICKY TOP CENTER) -->
          <div class="position-absolute top-0 start-50 translate-middle-x mt-3 z-3">
            <button class="btn btn-white shadow-soft rounded-pill btn-sm px-3 fw-medium text-navy border" id="btnSearchArea">
              <i class="bi bi-arrow-repeat me-1 text-primary-custom"></i> Search This Area
            </button>
          </div>

          <!-- MAP UI SIMULATION BG -->
          <div class="map-grid-graphics position-absolute inset-0">
            <!-- Simulated River / Geography SVG -->
            <svg class="w-100 h-100 opacity-25" viewBox="0 0 1200 600" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-50,200 Q200,100 400,300 T800,200 T1200,500" fill="none" stroke="#0F766E" stroke-width="40" />
              <path d="M100,-50 Q150,300 600,400 T1000,900" fill="none" stroke="#e2e8f0" stroke-width="25" />
            </svg>
          </div>

          <!-- MAP MARKERS -->
          <!-- Marker 1 (Rs. 25K) -->
          <div class="map-marker-pin position-absolute active-marker" id="m25" style="top: 35%; left: 25%;" data-id="101">
            <div class="marker-bubble shadow-sm fw-bold">Rs. 25K</div>
          </div>

          <!-- Marker 2 (Rs. 35K) -->
          <div class="map-marker-pin position-absolute" id="m35" style="top: 25%; left: 60%;" data-id="102">
            <div class="marker-bubble shadow-sm fw-bold">Rs. 35K</div>
          </div>

          <!-- Marker 3 (Rs. 45K) -->
          <div class="map-marker-pin position-absolute" id="m45" style="top: 55%; left: 45%;" data-id="103">
            <div class="marker-bubble shadow-sm fw-bold">Rs. 45K</div>
          </div>

          <!-- Marker 4 (Rs. 55K) -->
          <div class="map-marker-pin position-absolute" id="m55" style="top: 65%; left: 75%;" data-id="104">
            <div class="marker-bubble shadow-sm fw-bold">Rs. 55K</div>
          </div>

          <!-- MAP POPUP PREVIEW CARD (FLOATING OVER MARKER CLICK) -->
          <div class="map-popup-card position-absolute shadow-lg rounded-4 overflow-hidden bg-white z-3 d-none" id="mapPopupCard" style="width: 280px;">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-2 z-2 shadow-none" id="closeMapPopup" aria-label="Close"></button>
            <div class="position-relative">
              <img src="assets/images/properties/house-1.jpg" id="popupImg" class="w-100" style="height: 140px; object-fit: cover;" alt="Popup preview">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-2" id="popupBadge">Annex</span>
            </div>
            <div class="p-3">
              <div class="price-tag fs-6 mb-1" id="popupPrice">Rs. 25,000/mo</div>
              <h4 class="h6 fw-bold text-navy text-truncate mb-1" id="popupTitle">Furnished 1-Bed Annex</h4>
              <p class="text-muted small mb-2 text-truncate" id="popupLocation"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya Road, Kandy</p>
              <a href="property-details.php?id=101" id="popupLink" class="btn btn-primary btn-sm w-100 fw-medium">View Property Details</a>
            </div>
          </div>

          <!-- MAP CONTROLS (ZOOM IN/OUT) -->
          <div class="position-absolute bottom-0 end-0 m-3 d-flex flex-column gap-1 z-2">
            <button class="btn btn-white border shadow-sm btn-icon rounded-2"><i class="bi bi-plus-lg"></i></button>
            <button class="btn btn-white border shadow-sm btn-icon rounded-2"><i class="bi bi-dash-lg"></i></button>
            <button class="btn btn-white border shadow-sm btn-icon rounded-2" title="My Location"><i class="bi bi-crosshair"></i></button>
          </div>

        </main>
      </div>
    </div>
  </div>

  <!-- MOBILE BOTTOM DRAGGABLE PANEL / TOGGLE CONTROLS -->
  <div class="sticky-mobile-bar d-lg-none bg-white border-top border-light-custom p-2 fixed-bottom shadow-lg z-3">
    <div class="container">
      <div class="row g-2">
        <div class="col-4">
          <button class="btn btn-outline-primary w-100 btn-sm py-2 fw-semibold" data-bs-toggle="offcanvas" data-bs-target="#mapFilterOffcanvas">
            <i class="bi bi-funnel-fill me-1"></i> Filters
          </button>
        </div>
        <div class="col-4">
          <a href="properties.php" class="btn btn-outline-secondary w-100 btn-sm py-2 fw-semibold">
            <i class="bi bi-list-task me-1"></i> List View
          </a>
        </div>
        <div class="col-4">
          <button class="btn btn-teal w-100 btn-sm py-2 fw-semibold text-white" id="btnMobileToggleList">
            <i class="bi bi-houses me-1"></i> Quick List
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- MOBILE SLIDE-UP LIST OFFCANVAS -->
  <div class="offcanvas offcanvas-bottom h-75 d-lg-none" tabindex="-1" id="mobileListOffcanvas" aria-labelledby="mobileListOffcanvasLabel">
    <div class="offcanvas-header border-bottom border-light-custom">
      <h5 class="offcanvas-title fw-bold text-navy" id="mobileListOffcanvasLabel"><i class="bi bi-houses me-2 text-primary-custom"></i>Properties in View</h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3 bg-light-custom">
      <!-- Cloned Mobile Property Item -->
      <div class="card property-card border-light-custom shadow-soft rounded-3 overflow-hidden mb-3">
        <div class="row g-0">
          <div class="col-4 position-relative">
            <img src="assets/images/properties/house-1.jpg" class="w-100 h-100 object-fit-cover" alt="Mobile item">
            <span class="badge badge-property-type position-absolute top-0 start-0 m-2">Annex</span>
          </div>
          <div class="col-8">
            <div class="card-body p-2">
              <div class="price-tag fs-6">Rs. 25,000/mo</div>
              <h3 class="h6 card-title text-truncate fw-semibold mb-1">Furnished 1-Bed Annex</h3>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya Road</p>
              <a href="property-details.php?id=101" class="btn btn-outline-primary btn-sm w-100">View Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FILTER OFFCANVAS (SHARED MOBILE / DESKTOP) -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="mapFilterOffcanvas" aria-labelledby="mapFilterOffcanvasLabel">
    <div class="offcanvas-header border-bottom border-light-custom">
      <h5 class="offcanvas-title fw-bold text-navy" id="mapFilterOffcanvasLabel"><i class="bi bi-sliders text-primary-custom me-2"></i>Map Search Filters</h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form id="mapOffcanvasFilterForm">
        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Property Type</label>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="house" id="mapTypeHouse" checked>
            <label class="form-check-label small" for="mapTypeHouse">House</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="room" id="mapTypeRoom">
            <label class="form-check-label small" for="mapTypeRoom">Boarding Room</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="annex" id="mapTypeAnnex" checked>
            <label class="form-check-label small" for="mapTypeAnnex">Annex</label>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Price Range (LKR / mo)</label>
          <div class="row g-2">
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Min" value="10000"></div>
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Max" value="70000"></div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Required Facilities</label>
          <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="mParking" checked><label class="form-check-label small" for="mParking">Parking</label></div>
          <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="mWifi"><label class="form-check-label small" for="mWifi">WiFi</label></div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="mAC"><label class="form-check-label small" for="mAC">Air Conditioning</label></div>
        </div>

        <button type="submit" class="btn btn-primary w-100 fw-medium" data-bs-dismiss="offcanvas">Apply Map Filters</button>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/search.js"></script>
</body>
</html>