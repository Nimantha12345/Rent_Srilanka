<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - RentSriLanka</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body class="bg-light-custom">

  <?php $activePage = 'about'; $prefix = '../'; include '../components/navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="py-5 bg-navy text-white position-relative overflow-hidden">
    <div class="container py-lg-4 px-lg-4">
      <div class="row align-items-center g-4">
        <div class="col-lg-7">
          <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-3 fw-semibold">Modern Rental Marketplace</span>
          <h1 class="display-5 fw-bold text-white mb-3">Connecting Renters &amp; Property Owners Across Sri Lanka</h1>
          <p class="lead text-white-50 mb-4">RentSriLanka is built to simplify the search for houses, annexes, and boarding rooms with direct communication, zero broker commissions, and verified listings.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="../properties.php" class="btn btn-success fw-bold px-4 py-2 rounded-3 shadow-soft">Explore Properties</a>
            <a href="contact.php" class="btn btn-outline-light fw-medium px-4 py-2 rounded-3">Get In Touch</a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="position-relative">
            <img src="../assets/images/properties/house-1.jpg" class="img-fluid rounded-4 shadow-lg border border-2 border-white-10" alt="RentSriLanka Platform">
            <div class="position-absolute bottom-0 start-0 m-3 p-3 bg-white text-navy rounded-3 shadow-soft d-flex align-items-center gap-3">
              <i class="bi bi-shield-check fs-2 text-success"></i>
              <div>
                <h6 class="fw-bold mb-0">100% Direct Contact</h6>
                <span class="small text-muted">No middlemen, no hidden fees</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT RENTSRILANKA SECTION -->
  <section class="py-5 bg-white">
    <div class="container px-lg-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div class="row g-3">
            <div class="col-6">
              <img src="../assets/images/properties/annex-1.jpg" class="img-fluid rounded-4 shadow-xs" alt="Annex Listing">
            </div>
            <div class="col-6">
              <img src="../assets/images/properties/room-1.jpg" class="img-fluid rounded-4 shadow-xs mt-4" alt="Boarding Room">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h2 class="h3 fw-bold text-navy mb-3">Transforming the Sri Lankan Rental Experience</h2>
          <p class="text-muted mb-3">Finding a suitable home or boarding room in Sri Lanka used to mean scrolling endlessly through unverified social posts or paying steep broker commissions. RentSriLanka was founded to solve this frustration.</p>
          <p class="text-muted mb-4">Our platform empowers students, working professionals, families, and property owners with a clean, centralized portal where verified listings meet transparent inquiry tools.</p>

          <div class="row g-3">
            <div class="col-6">
              <div class="p-3 bg-light-custom rounded-3 border border-light-custom">
                <h3 class="h4 fw-bold text-success mb-1">2,100+</h3>
                <span class="small text-muted fw-medium">Active Properties</span>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-light-custom rounded-3 border border-light-custom">
                <h3 class="h4 fw-bold text-success mb-1">15,000+</h3>
                <span class="small text-muted fw-medium">Monthly Inquiries</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION SECTION -->
  <section class="py-5 bg-light-custom">
    <div class="container px-lg-4">
      <div class="row g-4">
        <!-- Mission -->
        <div class="col-md-6">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
            <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle mb-3"><i class="bi bi-bullseye fs-4"></i></div>
            <h3 class="h4 fw-bold text-navy mb-2">Our Mission</h3>
            <p class="text-muted mb-0">To provide a reliable, transparent, and easy-to-use digital platform that seamlessly connects renters directly with verified property owners across all 25 districts of Sri Lanka.</p>
          </div>
        </div>

        <!-- Vision -->
        <div class="col-md-6">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
            <div class="stat-icon-sm bg-success-subtle text-success rounded-circle mb-3"><i class="bi bi-eye-fill fs-4"></i></div>
            <h3 class="h4 fw-bold text-navy mb-2">Our Vision</h3>
            <p class="text-muted mb-0">To become Sri Lanka's most trusted real estate rental destination, recognized for innovation, community safety, and empowering effortless housing discovery.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BENEFITS FOR RENTERS & OWNERS -->
  <section class="py-5 bg-white">
    <div class="container px-lg-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <h2 class="h3 fw-bold text-navy mb-2">Why Choose RentSriLanka?</h2>
        <p class="text-muted mb-0">Designed to give equal value to both property seekers and landlords.</p>
      </div>

      <div class="row g-4">
        <!-- Renter Benefits -->
        <div class="col-lg-6">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
            <div class="d-flex align-items-center gap-2 mb-3">
              <span class="badge bg-teal text-white rounded-pill px-3 py-1 fw-semibold">For Renters</span>
              <h3 class="h5 fw-bold text-navy mb-0">Hassle-Free Home Searching</h3>
            </div>
            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Direct Owner Contact</h6>
                  <span class="small text-muted">Call or WhatsApp landlords directly without broker fees.</span>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Smart Filters &amp; Map Search</h6>
                  <span class="small text-muted">Filter by district, budget, property type, and key amenities like AC or WiFi.</span>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Verified Property Photos</h6>
                  <span class="small text-muted">Browse genuine photos, detailed deposit terms, and complete location details.</span>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Owner Benefits -->
        <div class="col-lg-6">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
            <div class="d-flex align-items-center gap-2 mb-3">
              <span class="badge bg-primary text-white rounded-pill px-3 py-1 fw-semibold">For Landlords</span>
              <h3 class="h5 fw-bold text-navy mb-0">Maximize Occupancy &amp; Reach</h3>
            </div>
            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-primary fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Free &amp; Fast Property Listing</h6>
                  <span class="small text-muted">Publish your house, annex, or boarding room in under 5 minutes.</span>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-primary fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Qualified Renter Leads</h6>
                  <span class="small text-muted">Receive inquiries directly to your email, dashboard, and phone.</span>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-start">
                <i class="bi bi-check-circle-fill text-primary fs-5 mt-1"></i>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Dedicated Owner Portal</h6>
                  <span class="small text-muted">Easily update price, availability status, or photos at any time.</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUST & SAFETY SECTION -->
  <section class="py-5 bg-light-custom">
    <div class="container px-lg-4">
      <div class="card border-0 shadow-soft rounded-4 bg-white p-4 p-md-5">
        <div class="row align-items-center g-4">
          <div class="col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex p-3 bg-success-subtle text-success rounded-circle mb-2">
              <i class="bi bi-shield-lock-fill display-4"></i>
            </div>
            <h3 class="h4 fw-bold text-navy">Trust &amp; Safety</h3>
          </div>
          <div class="col-lg-9 border-start-lg border-light-custom ps-lg-4">
            <p class="text-muted mb-3">We prioritize the safety of our community. Every listing passes through automated moderation and administrator approval to ensure accurate location details, reasonable rental pricing, and genuine photo uploads.</p>
            <div class="d-flex gap-4 flex-wrap">
              <span class="small text-navy fw-medium"><i class="bi bi-patch-check-fill text-success me-1"></i>Verified Phone Numbers</span>
              <span class="small text-navy fw-medium"><i class="bi bi-flag-fill text-warning me-1"></i>24/7 Report System</span>
              <span class="small text-navy fw-medium"><i class="bi bi-lock-fill text-primary me-1"></i>Data Protection Standard</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CALL TO ACTION (CTA) -->
  <section class="py-5 bg-navy text-white text-center">
    <div class="container px-lg-4 py-lg-3">
      <h2 class="display-6 fw-bold text-white mb-3">Ready to Find Your Next Rental?</h2>
      <p class="lead text-white-50 max-w-600 mx-auto mb-4">Join thousands of Sri Lankans using RentSriLanka for fast, direct, and trusted rental housing solutions.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="../properties.php" class="btn btn-success fw-bold px-4 py-2 rounded-3 shadow-soft">Browse All Properties</a>
        <a href="../../owner/add-property.php" class="btn btn-outline-light fw-medium px-4 py-2 rounded-3">List Your Property Free</a>
      </div>
    </div>
  </section>

  <?php $prefix = '../'; include '../components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>