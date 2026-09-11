<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RentSriLanka - Find Houses, Boarding Rooms & Annexes in Sri Lanka</title>
  
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

  <?php $activePage = 'home'; $prefix = ''; include 'components/navbar.php'; ?>

  <!-- SECTION 2 — HERO -->
  <header class="hero-section text-white d-flex align-items-center position-relative py-5">
    <div class="hero-overlay"></div>
    <div class="container position-relative z-1 py-4">
      <div class="row justify-content-center text-center mb-4">
        <div class="col-lg-9 col-xl-8">
          <span class="badge badge-hero text-uppercase px-3 py-2 mb-3"><i class="bi bi-geo-fill me-1"></i> #1 Rental Portal in Sri Lanka</span>
          <h1 class="display-4 fw-bold mb-3 text-white">Find Your Perfect Rental Home</h1>
          <p class="lead mb-0 text-white-50 fs-5">Houses, Rooms &amp; Annexes across Sri Lanka</p>
        </div>
      </div>

      <!-- Search Panel -->
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
          <div class="search-panel p-4 rounded-4 shadow-lg bg-white text-dark">
            <form action="search.php" method="GET" id="heroSearchForm">
              <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                  <label for="propertyType" class="form-label small fw-semibold text-muted mb-1">
                    <i class="bi bi-building me-1 text-primary-custom"></i>Property Type
                  </label>
                  <select class="form-select border-light-custom shadow-none" id="propertyType" name="type">
                    <option value="" selected>All Types</option>
                    <option value="house">House</option>
                    <option value="room">Boarding Room</option>
                    <option value="annex">Annex</option>
                  </select>
                </div>

                <div class="col-md-6 col-lg-3">
                  <label for="location" class="form-label small fw-semibold text-muted mb-1">
                    <i class="bi bi-geo-alt me-1 text-primary-custom"></i>Location
                  </label>
                  <select class="form-select border-light-custom shadow-none" id="location" name="location">
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

                <div class="col-md-6 col-lg-2">
                  <label for="minPrice" class="form-label small fw-semibold text-muted mb-1">Min Price (LKR)</label>
                  <select class="form-select border-light-custom shadow-none" id="minPrice" name="min_price">
                    <option value="" selected>Any Min</option>
                    <option value="10000">10,000</option>
                    <option value="25000">25,000</option>
                    <option value="50000">50,000</option>
                    <option value="100000">100,000</option>
                  </select>
                </div>

                <div class="col-md-6 col-lg-2">
                  <label for="maxPrice" class="form-label small fw-semibold text-muted mb-1">Max Price (LKR)</label>
                  <select class="form-select border-light-custom shadow-none" id="maxPrice" name="max_price">
                    <option value="" selected>Any Max</option>
                    <option value="30000">30,000</option>
                    <option value="60000">60,000</option>
                    <option value="120000">120,000</option>
                    <option value="250000">250,000+</option>
                  </select>
                </div>

                <div class="col-lg-2 d-flex align-items-end">
                  <button type="submit" class="btn btn-primary w-100 py-2 font-medium">
                    <i class="bi bi-search me-1"></i>Search
                  </button>
                </div>
              </div>

              <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-3 pt-3 border-top border-light-custom gap-2">
                <span class="small text-muted text-center text-sm-start">
                  <i class="bi bi-check-circle-fill text-success me-1"></i>Thousands of rental properties across Sri Lanka
                </span>
                <a href="map-search.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                  <i class="bi bi-map-fill me-1 text-teal"></i>Search on Map
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    <!-- SECTION 3 — PROPERTY TYPES -->
    <section class="py-5 bg-white">
      <div class="container py-3">
        <div class="text-center mb-5">
          <span class="text-uppercase fw-semibold small text-teal tracking-wide">Categories</span>
          <h2 class="fw-bold mt-1">Find What You Need</h2>
          <p class="text-muted">Select a category to filter your search quickly</p>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card type-card border-0 shadow-soft h-100 text-center p-4 rounded-4 transition-hover">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="icon-wrapper bg-success-subtle text-success rounded-circle mb-4">
                  <i class="bi bi-house-door-fill fs-2"></i>
                </div>
                <h3 class="h4 fw-semibold text-navy">House</h3>
                <p class="text-muted small mb-4">Comfortable homes for families seeking spacious residential environments.</p>
                <a href="properties.php?type=house" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-auto">Browse Houses</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card type-card border-0 shadow-soft h-100 text-center p-4 rounded-4 transition-hover">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="icon-wrapper bg-teal-subtle text-teal rounded-circle mb-4">
                  <i class="bi bi-door-open-fill fs-2"></i>
                </div>
                <h3 class="h4 fw-semibold text-navy">Boarding Room</h3>
                <p class="text-muted small mb-4">Affordable rooms for students and working professionals near hubs.</p>
                <a href="properties.php?type=room" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-auto">Browse Rooms</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card type-card border-0 shadow-soft h-100 text-center p-4 rounded-4 transition-hover">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="icon-wrapper bg-info-subtle text-info-emphasis rounded-circle mb-4">
                  <i class="bi bi-building-fill fs-2"></i>
                </div>
                <h3 class="h4 fw-semibold text-navy">Annex</h3>
                <p class="text-muted small mb-4">Private annexes with individual entrances for comfortable, quiet living.</p>
                <a href="properties.php?type=annex" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-auto">Browse Annexes</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4 — POPULAR LOCATIONS -->
    <section class="py-5 bg-light-custom border-top border-bottom border-light-custom">
      <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
          <div>
            <span class="text-uppercase fw-semibold small text-teal">Destinations</span>
            <h2 class="fw-bold mb-0 mt-1">Popular Locations</h2>
          </div>
          <a href="properties.php" class="btn btn-link text-success p-0 fw-semibold text-decoration-none">
            View All Districts <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

        <div class="row g-3">
          <!-- Colombo -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/colombo.jpg" class="card-img" alt="Rental properties in Colombo" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Colombo</h3>
                <span class="small opacity-75">1,240+ Properties</span>
                <a href="properties.php?location=colombo" class="stretched-link" aria-label="View properties in Colombo"></a>
              </div>
            </div>
          </div>
          <!-- Kandy -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/kandy.jpg" class="card-img" alt="Rental properties in Kandy" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Kandy</h3>
                <span class="small opacity-75">450+ Properties</span>
                <a href="properties.php?location=kandy" class="stretched-link" aria-label="View properties in Kandy"></a>
              </div>
            </div>
          </div>
          <!-- Galle -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/galle.jpg" class="card-img" alt="Rental properties in Galle" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Galle</h3>
                <span class="small opacity-75">320+ Properties</span>
                <a href="properties.php?location=galle" class="stretched-link" aria-label="View properties in Galle"></a>
              </div>
            </div>
          </div>
          <!-- Gampaha -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/gampaha.jpg" class="card-img" alt="Rental properties in Gampaha" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Gampaha</h3>
                <span class="small opacity-75">680+ Properties</span>
                <a href="properties.php?location=gampaha" class="stretched-link" aria-label="View properties in Gampaha"></a>
              </div>
            </div>
          </div>
          <!-- Kurunegala -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/kurunegala.jpg" class="card-img" alt="Rental properties in Kurunegala" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Kurunegala</h3>
                <span class="small opacity-75">210+ Properties</span>
                <a href="properties.php?location=kurunegala" class="stretched-link" aria-label="View properties in Kurunegala"></a>
              </div>
            </div>
          </div>
          <!-- Kegalle -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/kegalle.jpg" class="card-img" alt="Rental properties in Kegalle" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Kegalle</h3>
                <span class="small opacity-75">140+ Properties</span>
                <a href="properties.php?location=kegalle" class="stretched-link" aria-label="View properties in Kegalle"></a>
              </div>
            </div>
          </div>
          <!-- Matara -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/matara.jpg" class="card-img" alt="Rental properties in Matara" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Matara</h3>
                <span class="small opacity-75">190+ Properties</span>
                <a href="properties.php?location=matara" class="stretched-link" aria-label="View properties in Matara"></a>
              </div>
            </div>
          </div>
          <!-- Kalutara -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card location-card border-0 rounded-3 overflow-hidden shadow-sm h-100 position-relative">
              <img src="assets/images/locations/kalutara.jpg" class="card-img" alt="Rental properties in Kalutara" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3 text-white">
                <h3 class="h5 fw-bold mb-0 text-white">Kalutara</h3>
                <span class="small opacity-75">280+ Properties</span>
                <a href="properties.php?location=kalutara" class="stretched-link" aria-label="View properties in Kalutara"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 5 — FEATURED PROPERTIES -->
    <section class="py-5 bg-white">
      <div class="container py-3">
        <div class="text-center mb-5">
          <span class="text-uppercase fw-semibold small text-teal">Handpicked</span>
          <h2 class="fw-bold mt-1">Featured Properties</h2>
          <p class="text-muted">Explore some of the best rental properties available now.</p>
        </div>

        <div class="row g-4">
          <!-- Property 1 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="Two Storey Luxury House in Rajagiriya" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=101" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94771234567" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94771234567" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 2 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/room-1.jpg" class="card-img-top" alt="Fully Furnished Room near Peradeniya Uni" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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
                  <span><i class="bi bi-droplet me-1"></i>1 Bath (Attached)</span>
                  <span><i class="bi bi-arrows-angle me-1"></i>220 sqft</span>
                </div>

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=102" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94777654321" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94777654321" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 3 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/annex-1.jpg" class="card-img-top" alt="Modern Single Bedroom Annex in Nugegoda" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=103" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94712345678" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94712345678" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 4 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="3-Bedroom Family House in Galle Fort area" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=104" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94751112233" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94751112233" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 5 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/annex-2.jpg" class="card-img-top" alt="Spacious 2 Bed Annex in Kelaniya" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=105" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94723334455" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94723334455" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 6 -->
          <div class="col-md-6 col-lg-4">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/room-2.jpg" class="card-img-top" alt="AC Boarding Room in Colombo 03" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                  <i class="bi bi-patch-check-fill"></i> Verified Owner
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

                <div class="mt-auto d-flex gap-2">
                  <a href="property-details.php?id=106" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                  <a href="https://wa.me/94789990011" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                  <a href="tel:+94789990011" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 6 — RECENTLY ADDED -->
    <section class="py-5 bg-light-custom border-top border-bottom border-light-custom">
      <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
          <div>
            <span class="text-uppercase fw-semibold small text-teal">Fresh Listings</span>
            <h2 class="fw-bold mb-0 mt-1">Recently Added</h2>
          </div>
          <a href="properties.php" class="btn btn-primary rounded-pill px-4">View All Properties</a>
        </div>

        <div class="row g-4">
          <!-- Recent Item 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/recent-1.jpg" class="card-img-top" alt="Compact Annex in Dehiwala" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                  <i class="bi bi-heart fs-6"></i>
                </button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">LKR 32,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">Compact Single Annex</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Dehiwala, Colombo</p>
                <a href="property-details.php?id=201" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>

          <!-- Recent Item 2 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="House for Rent in Malabe" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                  <i class="bi bi-heart fs-6"></i>
                </button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">LKR 65,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">New 2-Story House</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Malabe, Colombo</p>
                <a href="property-details.php?id=202" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>

          <!-- Recent Item 3 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/recent-3.jpg" class="card-img-top" alt="Boarding Room in Kurunegala Town" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                  <i class="bi bi-heart fs-6"></i>
                </button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">LKR 12,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">Budget Single Room</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kurunegala Town</p>
                <a href="property-details.php?id=203" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>

          <!-- Recent Item 4 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/recent-4.jpg" class="card-img-top" alt="Seaside Annex in Matara" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite" aria-label="Add to favorites">
                  <i class="bi bi-heart fs-6"></i>
                </button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">LKR 35,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">Furnished Beachside Annex</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Polhena, Matara</p>
                <a href="property-details.php?id=204" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 7 — WHY RENTSRILANKA -->
    <section class="py-5 bg-white">
      <div class="container py-3">
        <div class="text-center mb-5">
          <span class="text-uppercase fw-semibold small text-teal">Our Value</span>
          <h2 class="fw-bold mt-1">Why Choose RentSriLanka?</h2>
          <p class="text-muted">Designed to overcome messy, cluttered general classified platforms.</p>
        </div>

        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-soft h-100 p-3 rounded-4 text-center">
              <div class="card-body">
                <div class="feature-icon bg-success-subtle text-success rounded-circle mx-auto mb-3">
                  <i class="bi bi-patch-check-fill fs-3"></i>
                </div>
                <h3 class="h5 fw-semibold mb-2">Verified Listings</h3>
                <p class="text-muted small mb-0">Find properties reviewed and approved by our moderation platform.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-soft h-100 p-3 rounded-4 text-center">
              <div class="card-body">
                <div class="feature-icon bg-teal-subtle text-teal rounded-circle mx-auto mb-3">
                  <i class="bi bi-sliders fs-3"></i>
                </div>
                <h3 class="h5 fw-semibold mb-2">Easy Search</h3>
                <p class="text-muted small mb-0">Quickly find properties using localized filters tailored for rentals.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-soft h-100 p-3 rounded-4 text-center">
              <div class="card-body">
                <div class="feature-icon bg-primary-subtle text-primary rounded-circle mx-auto mb-3">
                  <i class="bi bi-chat-dots-fill fs-3"></i>
                </div>
                <h3 class="h5 fw-semibold mb-2">Direct Contact</h3>
                <p class="text-muted small mb-0">Call, WhatsApp or message property owners directly without middlemen.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-soft h-100 p-3 rounded-4 text-center">
              <div class="card-body">
                <div class="feature-icon bg-warning-subtle text-warning-emphasis rounded-circle mx-auto mb-3">
                  <i class="bi bi-phone-fill fs-3"></i>
                </div>
                <h3 class="h5 fw-semibold mb-2">Mobile Friendly</h3>
                <p class="text-muted small mb-0">Search for your next home seamlessly from any smartphone or tablet device.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 8 — HOW IT WORKS -->
    <section class="py-5 bg-light-custom border-top border-light-custom">
      <div class="container py-3">
        <div class="text-center mb-5">
          <span class="text-uppercase fw-semibold small text-teal">Simple Steps</span>
          <h2 class="fw-bold mt-1">How It Works</h2>
          <p class="text-muted">Find your rental home in three easy steps</p>
        </div>

        <div class="row g-4 text-center">
          <div class="col-md-4">
            <div class="step-card position-relative p-4 bg-white rounded-4 shadow-soft h-100">
              <div class="step-number bg-navy text-white rounded-circle mx-auto mb-3 fw-bold">01</div>
              <h3 class="h5 fw-semibold mb-2">Search</h3>
              <p class="text-muted small mb-0">Choose your property type, location and budget parameters.</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="step-card position-relative p-4 bg-white rounded-4 shadow-soft h-100">
              <div class="step-number bg-navy text-white rounded-circle mx-auto mb-3 fw-bold">02</div>
              <h3 class="h5 fw-semibold mb-2">Explore</h3>
              <p class="text-muted small mb-0">View high resolution photos, listed facilities, price and map location.</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="step-card position-relative p-4 bg-white rounded-4 shadow-soft h-100">
              <div class="step-number bg-navy text-white rounded-circle mx-auto mb-3 fw-bold">03</div>
              <h3 class="h5 fw-semibold mb-2">Contact</h3>
              <p class="text-muted small mb-0">Call, WhatsApp or message the property owner to arrange a visit.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 9 — OWNER CTA -->
    <section class="py-5 cta-section text-white position-relative overflow-hidden">
      <div class="container py-4 position-relative z-1">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <h2 class="display-6 fw-bold mb-3 text-white">Have a Property to Rent?</h2>
            <p class="lead mb-4 opacity-90">List your House, Room or Annex and reach thousands of verified tenants looking for a rental home across Sri Lanka.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
              <a href="../owner/add-property.php" class="btn btn-light text-navy fw-bold px-4 py-3 rounded-3 shadow">
                <i class="bi bi-plus-lg me-1"></i>List Your Property
              </a>
              <a href="pages/how-it-works.php" class="btn btn-outline-light fw-semibold px-4 py-3 rounded-3">
                Learn How It Works
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>