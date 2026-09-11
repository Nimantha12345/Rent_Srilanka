<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Saved Properties - RentSriLanka</title>
  
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

  <?php $activePage = ''; $prefix = ''; include 'components/navbar.php'; ?>

  <main class="py-4 min-vh-75">
    <div class="container">
      
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Saved Properties</li>
        </ol>
      </nav>

      <!-- PAGE HEADER -->
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
          <h1 class="h2 fw-bold text-navy mb-1">My Saved Properties</h1>
          <p class="text-muted mb-0">Properties you've saved for later comparison and quick reference.</p>
        </div>
        <div class="badge bg-white text-navy border border-light-custom shadow-xs px-3 py-2 rounded-pill fs-6 fw-semibold">
          <i class="bi bi-bookmark-heart text-danger me-2"></i><span id="favHeaderCount">8 Saved Properties</span>
        </div>
      </div>

      <!-- FILTER TABS & CLEAR ALL BAR -->
      <div class="card border-0 shadow-soft p-2 p-md-3 rounded-4 mb-4 bg-white">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
          
          <!-- Type Filter Tabs -->
          <ul class="nav nav-pills custom-fav-tabs gap-1" id="favTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active rounded-pill px-3 py-1-5 small fw-medium" id="tab-all" data-bs-toggle="pill" data-type="all" type="button" role="tab">All (8)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-house" data-bs-toggle="pill" data-type="house" type="button" role="tab">Houses (4)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-room" data-bs-toggle="pill" data-type="room" type="button" role="tab">Rooms (2)</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-annex" data-bs-toggle="pill" data-type="annex" type="button" role="tab">Annexes (2)</button>
            </li>
          </ul>

          <!-- Action Link -->
          <button class="btn btn-sm btn-link text-danger text-decoration-none fw-medium p-0" id="btnClearAllFavorites">
            <i class="bi bi-trash me-1"></i>Clear Saved List
          </button>
        </div>
      </div>

      <!-- SAVED PROPERTIES GRID -->
      <div class="row g-4" id="favoritesGrid">
        
        <!-- Saved Item 1 (House) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="house" data-id="101" data-title="Two Storey Luxury House in Rajagiriya">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="House in Rajagiriya" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 95,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Two Storey Luxury House in Rajagiriya</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
              
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

        <!-- Saved Item 2 (Room) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="room" data-id="102" data-title="Furnished Boarding Room near Uni">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/room-1.jpg" class="card-img-top" alt="Room in Peradeniya" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 18,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Furnished Boarding Room near Uni</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
              
              <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                <span><i class="bi bi-door-closed me-1"></i>1 Bed</span>
                <span><i class="bi bi-droplet me-1"></i>1 Bath</span>
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

        <!-- Saved Item 3 (Annex) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="annex" data-id="103" data-title="Modern 1-Bedroom Private Annex">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/annex-1.jpg" class="card-img-top" alt="Annex in Nugegoda" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 42,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Modern 1-Bedroom Private Annex</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Nugegoda, Colombo</p>
              
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

        <!-- Saved Item 4 (House) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="house" data-id="104" data-title="3-Bedroom House with Garden">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/house-2.jpg" class="card-img-top" alt="House in Galle" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 75,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">3-Bedroom House with Garden</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Unawatuna, Galle</p>
              
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

        <!-- Saved Item 5 (Annex) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="annex" data-id="105" data-title="Spacious 2-Bed Annex near Campus">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/annex-2.jpg" class="card-img-top" alt="Annex in Kelaniya" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Annex</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 38,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Spacious 2-Bed Annex near Campus</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kelaniya, Gampaha</p>
              
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

        <!-- Saved Item 6 (Room) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="room" data-id="106" data-title="Luxury AC Boarding Room with WiFi">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/room-2.jpg" class="card-img-top" alt="Room in Colombo 03" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">Room</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 28,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Luxury AC Boarding Room with WiFi</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Kollupitiya, Colombo 03</p>
              
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

        <!-- Saved Item 7 (House) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="house" data-id="202" data-title="New 2-Story Modern Family House">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/recent-2.jpg" class="card-img-top" alt="House in Malabe" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 65,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">New 2-Story Modern Family House</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Malabe, Colombo</p>
              
              <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                <span><i class="bi bi-arrows-angle me-1"></i>1,500 sqft</span>
              </div>

              <div class="mt-auto d-flex gap-2">
                <a href="property-details.php?id=202" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                <a href="https://wa.me/94772233445" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                <a href="tel:+94772233445" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Saved Item 8 (House) -->
        <div class="col-md-6 col-lg-3 favorite-card-col" data-type="house" data-id="205" data-title="Scenic 4-Bedroom House in Kandy">
          <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden">
            <div class="position-relative">
              <img src="assets/images/properties/house-1.jpg" class="card-img-top" alt="House in Kandy" loading="lazy">
              <span class="badge badge-property-type position-absolute top-0 start-0 m-3">House</span>
              <span class="badge bg-success position-absolute bottom-0 start-0 m-3 d-flex align-items-center gap-1">
                <i class="bi bi-patch-check-fill"></i> Verified
              </span>
              <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 p-2 shadow-sm btn-remove-fav" aria-label="Remove from saved" title="Remove from saved">
                <i class="bi bi-heart-fill text-danger fs-6"></i>
              </button>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <div class="price-tag fs-6 mb-1">LKR 110,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h2 class="h6 card-title text-truncate fw-semibold mb-1">Scenic 4-Bedroom House in Kandy</h2>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Anniewatte, Kandy</p>
              
              <div class="d-flex justify-content-between text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                <span><i class="bi bi-door-closed me-1"></i>4 Beds</span>
                <span><i class="bi bi-droplet me-1"></i>3 Baths</span>
                <span><i class="bi bi-arrows-angle me-1"></i>2,200 sqft</span>
              </div>

              <div class="mt-auto d-flex gap-2">
                <a href="property-details.php?id=205" class="btn btn-outline-primary btn-sm flex-fill fw-medium">View Details</a>
                <a href="https://wa.me/94775556677" target="_blank" class="btn btn-whatsapp btn-sm px-2" title="WhatsApp Owner" rel="noopener"><i class="bi bi-whatsapp"></i></a>
                <a href="tel:+94775556677" class="btn btn-light border btn-sm px-2" title="Call Owner"><i class="bi bi-telephone"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- EMPTY STATE (HIDDEN BY DEFAULT UNTIL ALL REMOVED) -->
      <div id="favoritesEmptyState" class="card border-0 shadow-soft rounded-4 p-5 text-center my-4 bg-white d-none">
        <div class="py-5">
          <div class="fav-empty-icon bg-danger-subtle text-danger rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px;">
            <i class="bi bi-heartbreak display-4"></i>
          </div>
          <h2 class="h3 fw-bold text-navy">You haven't saved any properties yet.</h2>
          <p class="text-muted small mb-4" style="max-width: 450px; margin: 0 auto;">Explore rental properties across Sri Lanka and click the heart icon on any listing to save it here for later reference.</p>
          <a href="properties.php" class="btn btn-primary fw-medium px-4 py-2 rounded-3">
            <i class="bi bi-search me-2"></i>Explore Properties
          </a>
        </div>
      </div>

    </div>
  </main>

  <!-- CONFIRMATION MODAL FOR REMOVAL -->
  <div class="modal fade" id="removeFavModal" tabindex="-1" aria-labelledby="removeFavModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-exclamation-circle fs-1"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="removeFavModalLabel">Remove Property?</h5>
          <p class="small text-muted mb-4" id="removeFavModalText">Are you sure you want to remove this property from your saved list?</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-medium" id="btnConfirmRemoveFav">Remove</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/favorites.js"></script>
</body>
</html>