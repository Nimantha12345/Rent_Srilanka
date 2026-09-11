<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browse Rental Properties - RentSriLanka</title>
  
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
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Properties</li>
        </ol>
      </nav>

      <div class="mb-4">
        <h1 class="h2 fw-bold text-navy mb-1">Find Rental Properties</h1>
        <p class="text-muted mb-0">Browse Houses, Rooms and Annexes available across Sri Lanka.</p>
      </div>

      <!-- TOP SEARCH BAR -->
      <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
        <form id="topSearchForm" action="properties.php" method="GET">
          <div class="row g-2 align-items-center">
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="topKeyword" class="form-control border-start-0 ps-0 border-light-custom shadow-none" placeholder="Keyword (e.g. Garden, AC, University)...">
              </div>
            </div>
            <div class="col-md-3">
              <select id="topLocation" class="form-select border-light-custom shadow-none">
                <option value="" selected>All Locations</option>
                <option value="colombo">Colombo</option>
                <option value="kandy">Kandy</option>
                <option value="galle">Galle</option>
                <option value="gampaha">Gampaha</option>
                <option value="kurunegala">Kurunegala</option>
                <option value="kegalle">Kegalle</option>
                <option value="matara">Matara</option>
                <option value="kalutara">Kalutara</option>
              </select>
            </div>
            <div class="col-md-3">
              <select id="topType" class="form-select border-light-custom shadow-none">
                <option value="" selected>All Property Types</option>
                <option value="house">House</option>
                <option value="room">Boarding Room</option>
                <option value="annex">Annex</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w-100 fw-medium py-2">
                <i class="bi bi-search me-1"></i>Search
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- SYSTEM ERROR ALERT (HIDDEN BY DEFAULT) -->
      <div id="filterErrorAlert" class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 d-none mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <span>Unable to fetch results due to a network connection issue. Showing cached results.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <!-- MAIN LAYOUT -->
      <div class="row g-4">
        
        <!-- DESKTOP FILTER SIDEBAR -->
        <aside class="col-lg-3 d-none d-lg-block">
          <div class="card border-0 shadow-soft rounded-4 p-4 sticky-filter bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h2 class="h5 fw-bold mb-0 text-navy"><i class="bi bi-funnel me-2 text-primary-custom"></i>Filters</h2>
              <button type="button" class="btn btn-sm btn-link text-decoration-none text-muted p-0" id="clearDesktopFilters">Clear All</button>
            </div>
            <hr class="border-light-custom my-3">
            
            <form id="desktopFilterForm">
              <!-- Property Type -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Property Type</label>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="house" id="typeHouse">
                  <label class="form-check-label small" for="typeHouse">House</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="room" id="typeRoom">
                  <label class="form-check-label small" for="typeRoom">Boarding Room</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="annex" id="typeAnnex">
                  <label class="form-check-label small" for="typeAnnex">Annex</label>
                </div>
              </div>

              <!-- Location Hierarchy -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Location</label>
                <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="filterDistrict">
                  <option value="" selected>Select District</option>
                  <option value="colombo">Colombo</option>
                  <option value="kandy">Kandy</option>
                  <option value="galle">Galle</option>
                  <option value="gampaha">Gampaha</option>
                </select>
                <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="filterCity">
                  <option value="" selected>Select City</option>
                  <option value="rajagiriya">Rajagiriya</option>
                  <option value="nugegoda">Nugegoda</option>
                  <option value="dehiwala">Dehiwala</option>
                  <option value="peradeniya">Peradeniya</option>
                </select>
                <input type="text" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Area / Landmark" id="filterArea">
              </div>

              <!-- Price Range -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Price Range (LKR / mo)</label>
                <div class="row g-2">
                  <div class="col-6">
                    <input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Min" id="filterMinPrice">
                  </div>
                  <div class="col-6">
                    <input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Max" id="filterMaxPrice">
                  </div>
                </div>
              </div>

              <!-- Bedrooms -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Bedrooms</label>
                <div class="btn-group btn-group-sm w-100" role="group" aria-label="Bedrooms filter">
                  <input type="radio" class="btn-check" name="bedrooms" id="bedAny" checked>
                  <label class="btn btn-outline-secondary" for="bedAny">Any</label>
                  <input type="radio" class="btn-check" name="bedrooms" id="bed1">
                  <label class="btn btn-outline-secondary" for="bed1">1</label>
                  <input type="radio" class="btn-check" name="bedrooms" id="bed2">
                  <label class="btn btn-outline-secondary" for="bed2">2</label>
                  <input type="radio" class="btn-check" name="bedrooms" id="bed3">
                  <label class="btn btn-outline-secondary" for="bed3">3</label>
                  <input type="radio" class="btn-check" name="bedrooms" id="bed4">
                  <label class="btn btn-outline-secondary" for="bed4">4+</label>
                </div>
              </div>

              <!-- Bathrooms -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Bathrooms</label>
                <div class="btn-group btn-group-sm w-100" role="group" aria-label="Bathrooms filter">
                  <input type="radio" class="btn-check" name="bathrooms" id="bathAny" checked>
                  <label class="btn btn-outline-secondary" for="bathAny">Any</label>
                  <input type="radio" class="btn-check" name="bathrooms" id="bath1">
                  <label class="btn btn-outline-secondary" for="bath1">1</label>
                  <input type="radio" class="btn-check" name="bathrooms" id="bath2">
                  <label class="btn btn-outline-secondary" for="bath2">2</label>
                  <input type="radio" class="btn-check" name="bathrooms" id="bath3">
                  <label class="btn btn-outline-secondary" for="bath3">3+</label>
                </div>
              </div>

              <!-- Facilities -->
              <div class="mb-4">
                <label class="form-label fw-semibold text-navy small mb-2">Facilities &amp; Amenities</label>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facParking"><label class="form-check-label small" for="facParking">Parking</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facWifi"><label class="form-check-label small" for="facWifi">WiFi</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facKitchen"><label class="form-check-label small" for="facKitchen">Kitchen</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facBathroom"><label class="form-check-label small" for="facBathroom">Attached Bathroom</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facGarden"><label class="form-check-label small" for="facGarden">Garden</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facAC"><label class="form-check-label small" for="facAC">AC</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="facCCTV"><label class="form-check-label small" for="facCCTV">CCTV</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="facFurnished"><label class="form-check-label small" for="facFurnished">Furnished</label></div>
              </div>

              <button type="submit" class="btn btn-primary w-100 fw-medium">Apply Filters</button>
            </form>
          </div>
        </aside>

        <!-- RESULTS AREA -->
        <section class="col-lg-9">
          
          <!-- RESULTS HEADER TOOLBAR -->
          <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
              <div>
                <span class="h5 fw-bold text-navy mb-0" id="resultCount">124 Properties Found</span>
              </div>
              
              <div class="d-flex align-items-center gap-3 ms-auto">
                <!-- Sort Dropdown -->
                <div class="d-flex align-items-center gap-2">
                  <label for="sortBy" class="small text-muted fw-medium text-nowrap mb-0">Sort By:</label>
                  <select id="sortBy" class="form-select form-select-sm border-light-custom shadow-none" style="width: auto;">
                    <option value="newest" selected>Newest</option>
                    <option value="price_low">Lowest Price</option>
                    <option value="price_high">Highest Price</option>
                    <option value="most_viewed">Most Viewed</option>
                  </select>
                </div>

                <!-- View Switcher -->
                <div class="btn-group btn-group-sm" role="group" aria-label="Layout View Switcher">
                  <button type="button" class="btn btn-outline-secondary active" id="btnGridView" title="Grid View">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </button>
                  <button type="button" class="btn btn-outline-secondary" id="btnListView" title="List View">
                    <i class="bi bi-list-task"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- SKELETON LOADING STATE (HIDDEN BY DEFAULT) -->
          <div id="skeletonContainer" class="row g-4 d-none">
            <div class="col-md-6 col-lg-4 skeleton-card-wrap">
              <div class="card border-0 shadow-soft rounded-4 overflow-hidden p-3 h-100">
                <div class="skeleton-box skeleton-img rounded-3 mb-3"></div>
                <div class="skeleton-box skeleton-title rounded mb-2"></div>
                <div class="skeleton-box skeleton-text rounded mb-3"></div>
                <div class="skeleton-box skeleton-btn rounded mt-auto"></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 skeleton-card-wrap">
              <div class="card border-0 shadow-soft rounded-4 overflow-hidden p-3 h-100">
                <div class="skeleton-box skeleton-img rounded-3 mb-3"></div>
                <div class="skeleton-box skeleton-title rounded mb-2"></div>
                <div class="skeleton-box skeleton-text rounded mb-3"></div>
                <div class="skeleton-box skeleton-btn rounded mt-auto"></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 skeleton-card-wrap">
              <div class="card border-0 shadow-soft rounded-4 overflow-hidden p-3 h-100">
                <div class="skeleton-box skeleton-img rounded-3 mb-3"></div>
                <div class="skeleton-box skeleton-title rounded mb-2"></div>
                <div class="skeleton-box skeleton-text rounded mb-3"></div>
                <div class="skeleton-box skeleton-btn rounded mt-auto"></div>
              </div>
            </div>
          </div>

          <!-- EMPTY STATE (HIDDEN BY DEFAULT) -->
          <div id="emptyState" class="card border-0 shadow-soft rounded-4 p-5 text-center my-4 bg-white d-none">
            <div class="py-4">
              <i class="bi bi-search text-muted opacity-25 display-1"></i>
              <h3 class="h4 fw-bold text-navy mt-3">No Properties Found</h3>
              <p class="text-muted small mb-4">We couldn't find any listings matching your search filters. Try clearing some constraints.</p>
              <button class="btn btn-outline-primary fw-medium px-4" id="btnResetEmptyState">Clear All Filters</button>
            </div>
          </div>

          <!-- PROPERTY GRID CONTAINER -->
          <div class="row g-4" id="propertyContainer">
            
            <!-- Property 01 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="Two Storey Luxury House in Rajagiriya" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 95,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Two Storey Luxury House in Rajagiriya</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,800 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=101" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94771234567" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94771234567" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 02 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/room-1.jpg" class="card-img-top" alt="Furnished Boarding Room near Uni" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 18,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Furnished Boarding Room near Uni</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>220 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 day ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=102" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94777654321" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94777654321" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 03 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/annex-1.jpg" class="card-img-top" alt="Modern 1-Bedroom Private Annex" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 42,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Modern 1-Bedroom Private Annex</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Nugegoda, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>650 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=103" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94712345678" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94712345678" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 04 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="3-Bedroom House with Garden" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 75,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">3-Bedroom House with Garden</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Unawatuna, Galle</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,400 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 4 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=104" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94751112233" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94751112233" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 05 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/annex-2.jpg" class="card-img-top" alt="Spacious 2-Bed Annex near Campus" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 38,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Spacious 2-Bed Annex near Campus</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kelaniya, Gampaha</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>800 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 5 days ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=105" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94723334455" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94723334455" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 06 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/room-2.jpg" class="card-img-top" alt="Luxury AC Boarding Room with WiFi" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 28,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Luxury AC Boarding Room with WiFi</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kollupitiya, Colombo 03</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>250 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 week ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=106" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94789990011" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94789990011" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 07 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-1.jpg" class="card-img-top" alt="Compact Single Annex in Dehiwala" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 32,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Compact Single Annex</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Dehiwala, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>400 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 week ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=201" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94711122334" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94711122334" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 08 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="New 2-Story House in Malabe" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 65,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">New 2-Story Modern Family House</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Malabe, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>1,500 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=202" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94772233445" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94772233445" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 09 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-3.jpg" class="card-img-top" alt="Budget Single Room in Kurunegala" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 12,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Budget Single Boarding Room</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kurunegala Town</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>180 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 2 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=203" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94763334455" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94763334455" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 10 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/recent-4.jpg" class="card-img-top" alt="Furnished Beachside Annex in Matara" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 35,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Furnished Beachside Annex</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Polhena, Matara</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>500 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=204" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94714445566" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94714445566" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 11 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="Luxury Villa in Kandy Hills" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 110,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Scenic 4-Bedroom House in Kandy</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Anniewatte, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>4 Beds</span>
                    <span><i class="bi bi-droplet me-1"></i>3 Baths</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>2,200 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 3 weeks ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=205" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94775556677" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94775556677" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property 12 -->
            <div class="col-md-6 col-lg-4 property-item-col">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="assets/images/properties/annex-1.jpg" class="card-img-top" alt="Cozy Upper Floor Annex in Wattala" loading="lazy">
                  <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                  <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Verified
                  </span>
                  <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                    <i class="bi bi-heart fs-6"></i>
                  </button>
                </div>
                <div class="card-body d-flex flex-column p-4">
                  <div class="price-tag mb-1">LKR 29,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-2">Cozy Upper Floor Private Annex</h3>
                  <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Wattala, Gampaha</p>
                  
                  <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                    <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                    <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
                    <span><i class="bi bi-arrows-angle me-1"></i>450 sqft</span>
                  </div>

                  <div class="text-muted small mb-3">
                    <i class="bi bi-clock me-1"></i>Posted 1 month ago
                  </div>

                  <div class="mt-auto d-flex gap-2">
                    <a href="property-details.php?id=206" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                    <a href="https://wa.me/94786667788" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                    <a href="tel:+94786667788" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- PAGINATION -->
          <nav aria-label="Properties pagination" class="mt-5">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-left"></i> Previous</a>
              </li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">11</a></li>
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
            <i class="bi bi-funnel-fill me-1"></i> Filters
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
          <a href="map-search.php" class="btn btn-teal w-100 btn-sm py-2 text-white fw-medium">
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
        <i class="bi bi-funnel text-primary-custom me-2"></i>Filter Properties
      </h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <!-- Cloned Mobile Filter Form Structure -->
      <form id="mobileFilterForm">
        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Property Type</label>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="house" id="mTypeHouse">
            <label class="form-check-label small" for="mTypeHouse">House</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="room" id="mTypeRoom">
            <label class="form-check-label small" for="mTypeRoom">Boarding Room</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="annex" id="mTypeAnnex">
            <label class="form-check-label small" for="mTypeAnnex">Annex</label>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Location</label>
          <select class="form-select form-select-sm mb-2 border-light-custom shadow-none" id="mFilterDistrict">
            <option value="" selected>Select District</option>
            <option value="colombo">Colombo</option>
            <option value="kandy">Kandy</option>
            <option value="galle">Galle</option>
            <option value="gampaha">Gampaha</option>
          </select>
          <input type="text" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Area / Landmark" id="mFilterArea">
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold text-navy small mb-2">Price Range (LKR)</label>
          <div class="row g-2">
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Min" id="mFilterMinPrice"></div>
            <div class="col-6"><input type="number" class="form-control form-control-sm border-light-custom shadow-none" placeholder="Max" id="mFilterMaxPrice"></div>
          </div>
        </div>

        <div class="d-grid gap-2 mb-3">
          <button type="submit" class="btn btn-primary fw-medium" data-bs-dismiss="offcanvas">Apply Filters</button>
          <button type="button" class="btn btn-light border fw-medium" id="clearMobileFilters">Clear All</button>
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