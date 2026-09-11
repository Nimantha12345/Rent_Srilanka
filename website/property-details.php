<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2 Bedroom House for Rent in Peradeniya, Kandy - RentSriLanka</title>
  
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
<body class="pb-5 pb-lg-0">

  <?php $activePage = 'properties'; $prefix = ''; include 'components/navbar.php'; ?>

  <main class="py-4">
    <div class="container">
      
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item"><a href="properties.php" class="text-decoration-none text-muted">Properties</a></li>
          <li class="breadcrumb-item"><a href="properties.php?type=house" class="text-decoration-none text-muted">Houses</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Kandy</li>
        </ol>
      </nav>

      <!-- PROPERTY HEADER -->
      <div class="card border-0 shadow-soft p-4 rounded-4 mb-4 bg-white">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
              <span class="badge badge-property-type">House</span>
              <span class="badge bg-success-subtle text-success border border-success-subtle d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified Listing
              </span>
              <span class="small text-muted"><i class="bi bi-clock me-1"></i>Posted 2 days ago</span>
              <span class="small text-muted border-start ps-2">Property ID: <strong class="text-navy">RSL-84920</strong></span>
            </div>
            <h1 class="h2 fw-bold text-navy mb-2">2 Bedroom House for Rent</h1>
            <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya Road, Peradeniya, Kandy</p>
          </div>

          <div class="text-lg-end d-flex flex-column align-items-lg-end w-100 w-lg-auto">
            <div class="price-tag fs-2 mb-2">Rs. 45,000 <span class="fs-6 text-muted font-normal">/ month</span></div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary btn-sm rounded-pill btn-favorite" aria-label="Save Property">
                <i class="bi bi-heart me-1"></i> Save
              </button>
              <button class="btn btn-outline-secondary btn-sm rounded-pill" id="btnShareProperty" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="bi bi-share me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- IMAGE GALLERY SECTION -->
      <div class="card border-0 shadow-soft rounded-4 overflow-hidden mb-4 bg-white p-3">
        <div class="row g-2">
          <!-- Main Hero Image -->
          <div class="col-lg-8 position-relative">
            <div class="gallery-hero-wrapper rounded-3 overflow-hidden h-100 position-relative">
              <img src="assets/images/properties/house-1.jpg" id="galleryMainImg" class="w-100 h-100 object-fit-cover cursor-pointer" alt="Main property view of 2 Bedroom House in Peradeniya" data-bs-toggle="modal" data-bs-target="#lightboxModal" data-bs-slide-to="0">
              <span class="badge bg-dark bg-opacity-75 text-white position-absolute bottom-0 start-0 m-3 px-3 py-2 rounded-pill small">
                <i class="bi bi-camera me-1"></i> <span id="galleryCounter">1 / 6 Photos</span>
              </span>
            </div>
          </div>

          <!-- Thumbnails Grid -->
          <div class="col-lg-4 d-none d-lg-block">
            <div class="row g-2 h-100">
              <div class="col-6">
                <div class="gallery-thumb-wrapper rounded-3 overflow-hidden position-relative">
                  <img src="assets/images/properties/house-2.jpg" class="w-100 h-100 object-fit-cover gallery-thumb active" alt="Living Room" data-full="assets/images/properties/house-2.jpg" data-index="1">
                </div>
              </div>
              <div class="col-6">
                <div class="gallery-thumb-wrapper rounded-3 overflow-hidden position-relative">
                  <img src="assets/images/properties/room-1.jpg" class="w-100 h-100 object-fit-cover gallery-thumb" data-full="assets/images/properties/room-1.jpg" alt="Master Bedroom" data-index="2">
                </div>
              </div>
              <div class="col-6">
                <div class="gallery-thumb-wrapper rounded-3 overflow-hidden position-relative">
                  <img src="assets/images/properties/annex-1.jpg" class="w-100 h-100 object-fit-cover gallery-thumb" data-full="assets/images/properties/annex-1.jpg" alt="Kitchen Space" data-index="3">
                </div>
              </div>
              <div class="col-6">
                <div class="gallery-thumb-wrapper rounded-3 overflow-hidden position-relative cursor-pointer" data-bs-toggle="modal" data-bs-target="#lightboxModal" data-bs-slide-to="4">
                  <img src="assets/images/properties/recent-1.jpg" class="w-100 h-100 object-fit-cover gallery-thumb" data-full="assets/images/properties/recent-1.jpg" alt="Bathroom" data-index="4">
                  <div class="gallery-overlay-more position-absolute inset-0 bg-dark bg-opacity-60 text-white d-flex align-items-center justify-content-center fw-bold">
                    +2 More
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- DETAILS CONTENT & OWNER SIDEBAR -->
      <div class="row g-4">
        
        <!-- LEFT COLUMN: OVERVIEW, DESCRIPTION, FACILITIES, LOCATION -->
        <div class="col-lg-8">
          
          <!-- PROPERTY SUMMARY CARDS -->
          <div class="card border-0 shadow-soft rounded-4 p-4 mb-4 bg-white">
            <h2 class="h5 fw-bold text-navy mb-3">Property Summary</h2>
            <div class="row g-3">
              <div class="col-6 col-md-4 col-lg-2.4">
                <div class="summary-card p-3 rounded-3 text-center bg-light-custom border border-light-custom">
                  <i class="bi bi-door-closed text-primary-custom fs-3 mb-1 d-block"></i>
                  <span class="fw-bold text-navy d-block">2</span>
                  <span class="small text-muted">Bedrooms</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2.4">
                <div class="summary-card p-3 rounded-3 text-center bg-light-custom border border-light-custom">
                  <i class="bi bi-droplet text-primary-custom fs-3 mb-1 d-block"></i>
                  <span class="fw-bold text-navy d-block">1</span>
                  <span class="small text-muted">Bathroom</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2.4">
                <div class="summary-card p-3 rounded-3 text-center bg-light-custom border border-light-custom">
                  <i class="bi bi-aspect-ratio text-primary-custom fs-3 mb-1 d-block"></i>
                  <span class="fw-bold text-navy d-block">1,200</span>
                  <span class="small text-muted">sq.ft</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2.4">
                <div class="summary-card p-3 rounded-3 text-center bg-light-custom border border-light-custom">
                  <i class="bi bi-box-seam text-primary-custom fs-3 mb-1 d-block"></i>
                  <span class="fw-bold text-navy d-block">Semi</span>
                  <span class="small text-muted">Furnished</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2.4">
                <div class="summary-card p-3 rounded-3 text-center bg-light-custom border border-light-custom">
                  <i class="bi bi-check-circle text-primary-custom fs-3 mb-1 d-block"></i>
                  <span class="fw-bold text-navy d-block">Immediate</span>
                  <span class="small text-muted">Availability</span>
                </div>
              </div>
            </div>
          </div>

          <!-- DESCRIPTION WITH READ MORE -->
          <div class="card border-0 shadow-soft rounded-4 p-4 mb-4 bg-white">
            <h2 class="h5 fw-bold text-navy mb-3">About This Property</h2>
            <div class="description-body text-secondary lh-lg" id="descriptionText">
              <p>This beautifully maintained 2-bedroom residential house is located in a peaceful and secure neighborhood along Peradeniya Road, just 5 minutes away from the University of Peradeniya and Teaching Hospital Peradeniya. Ideal for university staff, medical professionals, or small families seeking a quiet living space with easy access to Kandy town center.</p>
              
              <div class="collapse" id="moreDescription">
                <p>The house features a spacious living room with natural ventilation, a dining area, a fully tiled kitchen equipped with pantry cupboards, and a modern attached bathroom with hot water facilities. The master bedroom comes with a ceiling fan and large windows overlooking the lush garden area.</p>
                <p><strong>Additional Details:</strong></p>
                <ul>
                  <li>Separate electricity and water utility meters.</li>
                  <li>Secure boundary wall with locked gate.</li>
                  <li>Vehicle parking space for 1 car and 2 motorbikes.</li>
                  <li>Minimum lease period: 6 months (Key money deposit: 3 months).</li>
                </ul>
              </div>
            </div>
            <button class="btn btn-link text-primary-custom p-0 mt-2 fw-semibold text-decoration-none w-auto text-start" id="btnToggleDescription" data-bs-toggle="collapse" data-bs-target="#moreDescription" aria-expanded="false" aria-controls="moreDescription">
              Read More <i class="bi bi-chevron-down ms-1"></i>
            </button>
          </div>

          <!-- FACILITIES & AMENITIES GRID -->
          <div class="card border-0 shadow-soft rounded-4 p-4 mb-4 bg-white">
            <h2 class="h5 fw-bold text-navy mb-3">Facilities &amp; Amenities</h2>
            <div class="row g-3">
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-p-square-fill text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Parking Space</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-wifi text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">High-Speed WiFi</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-egg-fried text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Pantry Kitchen</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-droplet-fill text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Attached Bathroom</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-tree-fill text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Private Garden</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom opacity-50">
                  <i class="bi bi-snow text-muted fs-5"></i>
                  <span class="small text-muted text-decoration-line-through">Air Conditioning</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-shield-check text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">CCTV Security</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-water text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">24/7 Water Line</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-lightning-charge-fill text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Electricity Supply</span>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="d-flex align-items-center gap-2 p-2 rounded bg-light-custom">
                  <i class="bi bi-couch-fill text-teal fs-5"></i>
                  <span class="small fw-medium text-navy">Semi Furnished</span>
                </div>
              </div>
            </div>
          </div>

          <!-- LOCATION & NEARBY PLACES -->
          <div class="card border-0 shadow-soft rounded-4 p-4 mb-4 bg-white">
            <h2 class="h5 fw-bold text-navy mb-3">Location &amp; Neighborhood</h2>
            <p class="small text-muted mb-3"><i class="bi bi-geo-alt me-1 text-danger"></i>Peradeniya Road, Near University Junction, Peradeniya, Kandy</p>
            
            <!-- Map Placeholder -->
            <div class="map-placeholder-box rounded-3 overflow-hidden position-relative mb-4 bg-light border border-light-custom text-center d-flex align-items-center justify-content-center" style="height: 250px;">
              <div class="position-relative z-1">
                <i class="bi bi-geo-alt-fill text-danger display-4 d-block mb-2"></i>
                <span class="fw-semibold text-navy d-block">Interactive Map View</span>
                <span class="small text-muted">Peradeniya, Kandy District</span>
              </div>
              <div class="position-absolute inset-0 opacity-25" style="background: repeating-linear-gradient(45deg, #cbd5e1, #cbd5e1 10px, #f1f5f9 10px, #f1f5f9 20px);"></div>
            </div>

            <!-- Nearby Landmarks -->
            <h3 class="h6 fw-semibold text-navy mb-2">Nearby Key Locations</h3>
            <div class="row g-2 small text-secondary">
              <div class="col-md-6"><i class="bi bi-mortarboard me-2 text-primary-custom"></i>University of Peradeniya (1.2 km)</div>
              <div class="col-md-6"><i class="bi bi-hospital me-2 text-primary-custom"></i>Teaching Hospital Peradeniya (1.8 km)</div>
              <div class="col-md-6"><i class="bi bi-train-front me-2 text-primary-custom"></i>Peradeniya Railway Station (900m)</div>
              <div class="col-md-6"><i class="bi bi-cart me-2 text-primary-custom"></i>Cargills Food City Supermarket (400m)</div>
            </div>
          </div>

          <!-- REPORT LISTING LINK -->
          <div class="text-end mb-4">
            <button class="btn btn-link text-danger text-decoration-none small p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
              <i class="bi bi-flag me-1"></i>Report this property for misconduct or fake information
            </button>
          </div>
        </div>

        <!-- RIGHT COLUMN: OWNER CARD & DIRECT CONTACT (STICKY DESKTOP) -->
        <div class="col-lg-4">
          <div class="card border-0 shadow-soft rounded-4 p-4 bg-white sticky-owner-card">
            <h2 class="h5 fw-bold text-navy mb-3">Property Listed By</h2>
            
            <!-- Owner Info Header -->
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="position-relative">
                <img src="assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover border border-2 border-success" width="60" height="60" alt="Landlord Profile Picture">
                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" title="Online Now"></span>
              </div>
              <div>
                <h3 class="h6 fw-bold mb-0 text-navy">Kusum Perera</h3>
                <span class="badge bg-success-subtle text-success small mb-1"><i class="bi bi-check-circle-fill"></i> Verified Owner</span>
                <div class="small text-muted"><i class="bi bi-calendar-check me-1"></i>Member since Jan 2024</div>
              </div>
            </div>

            <!-- Owner Statistics -->
            <div class="row g-2 border-top border-bottom border-light-custom py-3 my-3 text-center small">
              <div class="col-6">
                <span class="text-muted d-block">Response Rate</span>
                <strong class="text-navy">98% (Very Fast)</strong>
              </div>
              <div class="col-6 border-start border-light-custom">
                <span class="text-muted d-block">Properties Listed</span>
                <strong class="text-navy">3 Properties</strong>
              </div>
            </div>

            <!-- Primary Contact Call To Actions -->
            <div class="d-grid gap-2 mb-3">
              <a href="tel:+94771234567" class="btn btn-primary btn-lg fw-bold fs-6 py-2">
                <i class="bi bi-telephone-fill me-2"></i> CALL OWNER (+94 77...)
              </a>
              <a href="https://wa.me/94771234567?text=Hi,%20I%20am%20interested%20in%20your%20property%20RSL-84920%20(2%20Bedroom%20House%20in%20Peradeniya)" target="_blank" class="btn btn-whatsapp btn-lg fw-bold fs-6 py-2" rel="noopener">
                <i class="bi bi-whatsapp me-2"></i> WHATSAPP OWNER
              </a>
              <button class="btn btn-outline-primary btn-lg fw-semibold fs-6 py-2" data-bs-toggle="modal" data-bs-target="#messageModal">
                <i class="bi bi-chat-dots me-2"></i> SEND MESSAGE
              </button>
            </div>

            <div class="p-3 bg-light-custom rounded-3 border border-light-custom text-center">
              <p class="small text-muted mb-0"><i class="bi bi-shield-lock text-success me-1"></i> Always inspect property details in person before advancing key money or safety deposits.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- SIMILAR PROPERTIES -->
      <section class="mt-5 pt-4 border-top border-light-custom">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-uppercase fw-semibold small text-teal">Recommendations</span>
            <h2 class="fw-bold text-navy mb-0 mt-1">Similar Properties in Kandy</h2>
          </div>
          <a href="properties.php?location=kandy" class="btn btn-link text-success p-0 fw-semibold text-decoration-none">
            View All in Kandy <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

        <div class="row g-4">
          <!-- Card 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="House in Katugastota" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite"><i class="bi bi-heart fs-6"></i></button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">Rs. 52,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">3-Bed Family House</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Katugastota, Kandy</p>
                <a href="property-details.php?id=303" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="House in Anniewatte" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite"><i class="bi bi-heart fs-6"></i></button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">Rs. 65,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">Luxury 2-Storey House</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Anniewatte, Kandy</p>
                <a href="property-details.php?id=301" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/annex-1.jpg" class="card-img-top" alt="Annex in Peradeniya" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite"><i class="bi bi-heart fs-6"></i></button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">Rs. 30,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">Modern Private Annex</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                <a href="property-details.php?id=304" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>
          <!-- Card 4 -->
          <div class="col-md-6 col-lg-3">
            <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="assets/images/properties/room-1.jpg" class="card-img-top" alt="Room in Kandy Town" loading="lazy">
                <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
                <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-favorite"><i class="bi bi-heart fs-6"></i></button>
              </div>
              <div class="card-body d-flex flex-column p-3">
                <div class="price-tag fs-6 mb-1">Rs. 18,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                <h3 class="h6 card-title text-truncate fw-semibold mb-1">AC Boarding Room</h3>
                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kandy Town</p>
                <a href="property-details.php?id=102" class="btn btn-outline-primary btn-sm mt-auto w-100 fw-medium">View Details</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- RECENTLY VIEWED PROPERTIES -->
      <section class="mt-5 pt-4 border-top border-light-custom">
        <h2 class="h5 fw-bold text-navy mb-4">Recently Viewed Properties</h2>
        <div class="row g-3">
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-sm rounded-3 overflow-hidden p-2 bg-white d-flex flex-row align-items-center gap-2">
              <img src="assets/images/properties/recent-1.jpg" class="rounded object-fit-cover" width="60" height="60" alt="Recent item">
              <div class="text-truncate">
                <h3 class="h6 text-truncate mb-0 small font-semibold">Single Annex</h3>
                <span class="text-success fw-bold small">Rs. 32,000</span>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-sm rounded-3 overflow-hidden p-2 bg-white d-flex flex-row align-items-center gap-2">
              <img src="assets/images/properties/recent-2.jpg" class="rounded object-fit-cover" width="60" height="60" alt="Recent item">
              <div class="text-truncate">
                <h3 class="h6 text-truncate mb-0 small font-semibold">Malabe Family House</h3>
                <span class="text-success fw-bold small">Rs. 65,000</span>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-sm rounded-3 overflow-hidden p-2 bg-white d-flex flex-row align-items-center gap-2">
              <img src="assets/images/properties/recent-3.jpg" class="rounded object-fit-cover" width="60" height="60" alt="Recent item">
              <div class="text-truncate">
                <h3 class="h6 text-truncate mb-0 small font-semibold">Kurunegala Room</h3>
                <span class="text-success fw-bold small">Rs. 12,000</span>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-sm rounded-3 overflow-hidden p-2 bg-white d-flex flex-row align-items-center gap-2">
              <img src="assets/images/properties/recent-4.jpg" class="rounded object-fit-cover" width="60" height="60" alt="Recent item">
              <div class="text-truncate">
                <h3 class="h6 text-truncate mb-0 small font-semibold">Matara Beach Annex</h3>
                <span class="text-success fw-bold small">Rs. 35,000</span>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <!-- STICKY MOBILE CONTACT BAR -->
  <div class="sticky-mobile-bar d-lg-none bg-white border-top border-light-custom p-2 fixed-bottom shadow-lg">
    <div class="container">
      <div class="row g-2">
        <div class="col-4">
          <a href="tel:+94771234567" class="btn btn-primary w-100 btn-sm py-2 fw-semibold">
            <i class="bi bi-telephone-fill me-1"></i> Call
          </a>
        </div>
        <div class="col-4">
          <a href="https://wa.me/94771234567" target="_blank" class="btn btn-whatsapp w-100 btn-sm py-2 fw-semibold" rel="noopener">
            <i class="bi bi-whatsapp me-1"></i> WhatsApp
          </a>
        </div>
        <div class="col-4">
          <button class="btn btn-outline-primary w-100 btn-sm py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#messageModal">
            <i class="bi bi-chat-dots me-1"></i> Message
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- LIGHTBOX / FULLSCREEN GALLERY MODAL -->
  <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-dark border-0">
        <div class="modal-header border-0">
          <span class="text-white small">Property Photo Gallery - RSL-84920</span>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div id="lightboxCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner text-center">
              <div class="carousel-item active"><img src="assets/images/properties/house-1.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Main Photo"></div>
              <div class="carousel-item"><img src="assets/images/properties/house-2.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Living Room"></div>
              <div class="carousel-item"><img src="assets/images/properties/room-1.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Bedroom 1"></div>
              <div class="carousel-item"><img src="assets/images/properties/annex-1.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Kitchen"></div>
              <div class="carousel-item"><img src="assets/images/properties/recent-1.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Bathroom"></div>
              <div class="carousel-item"><img src="assets/images/properties/recent-2.jpg" class="img-fluid max-vh-80 object-fit-contain" alt="Exterior Garden"></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SEND MESSAGE MODAL -->
  <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="messageModalLabel"><i class="bi bi-envelope me-2 text-primary-custom"></i>Message Property Owner</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="ownerMessageForm">
            <div class="mb-3">
              <label for="msgSenderName" class="form-label small fw-semibold text-navy">Your Name</label>
              <input type="text" class="form-control border-light-custom shadow-none" id="msgSenderName" placeholder="e.g. Nimal Silva" required>
            </div>
            <div class="mb-3">
              <label for="msgSenderPhone" class="form-label small fw-semibold text-navy">Phone Number</label>
              <input type="tel" class="form-control border-light-custom shadow-none" id="msgSenderPhone" placeholder="0771234567" required>
            </div>
            <div class="mb-3">
              <label for="msgSenderMessage" class="form-label small fw-semibold text-navy">Message</label>
              <textarea class="form-control border-light-custom shadow-none" id="msgSenderMessage" rows="4" required>Hi Kusum, I am interested in your 2 Bedroom House in Peradeniya (Ref: RSL-84920). Is it still available for viewing?</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-medium py-2">Send Message Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- SHARE MODAL -->
  <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-4">
        <h5 class="fw-bold text-navy mb-3">Share Property</h5>
        <div class="d-flex justify-content-center gap-3 mb-3">
          <a href="#" class="btn btn-outline-primary rounded-circle btn-social fs-5"><i class="bi bi-facebook"></i></a>
          <a href="#" class="btn btn-whatsapp rounded-circle btn-social fs-5"><i class="bi bi-whatsapp"></i></a>
          <a href="#" class="btn btn-outline-secondary rounded-circle btn-social fs-5"><i class="bi bi-link-45deg"></i></a>
        </div>
        <input type="text" class="form-control form-control-sm text-center border-light-custom" value="https://rentsrilanka.lk/property-details.php?id=84920" readonly>
      </div>
    </div>
  </div>

  <!-- REPORT PROPERTY MODAL -->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="reportModalLabel"><i class="bi bi-flag text-danger me-2"></i>Report Property</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="reportPropertyForm">
            <label class="form-label small fw-semibold text-navy mb-2">Reason for Reporting</label>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="reason1" value="Fake Property" checked>
              <label class="form-check-label small" for="reason1">Fake Property / Does not exist</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="reason2" value="Scam">
              <label class="form-check-label small" for="reason2">Scam or Fraudulent advance request</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="reason3" value="Wrong Info">
              <label class="form-check-label small" for="reason3">Wrong Price or Location details</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="reason4" value="Already Rented">
              <label class="form-check-label small" for="reason4">Property Already Rented</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="reportReason" id="reason5" value="Other">
              <label class="form-check-label small" for="reason5">Other issue</label>
            </div>

            <div class="mb-3">
              <textarea class="form-control border-light-custom shadow-none" rows="3" placeholder="Provide additional details (optional)..."></textarea>
            </div>

            <button type="submit" class="btn btn-danger w-100 fw-medium py-2">Submit Report</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>