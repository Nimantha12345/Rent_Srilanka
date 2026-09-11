<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How It Works - RentSriLanka</title>
  
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

  <?php $activePage = ''; $prefix = '../'; include '../components/navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="py-5 bg-navy text-white position-relative overflow-hidden text-center">
    <div class="container py-lg-3 px-lg-4">
      <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-3 fw-semibold">Simple &amp; Transparent Workflow</span>
      <h1 class="display-5 fw-bold text-white mb-3">How RentSriLanka Works</h1>
      <p class="lead text-white-50 max-w-600 mx-auto mb-4">Whether you are searching for your next home or listing a rental property, our 6-step process keeps everything direct and straightforward.</p>
      
      <div class="d-inline-flex p-1 bg-white bg-opacity-10 rounded-pill border border-white-10">
        <a href="#renter-flow" class="btn btn-success btn-sm rounded-pill px-4 fw-bold">For Renters</a>
        <a href="#owner-flow" class="btn btn-link text-white btn-sm rounded-pill px-4 text-decoration-none fw-medium">For Landlords</a>
      </div>
    </div>
  </section>

  <!-- SECTION 1: RENTER WORKFLOW -->
  <section class="py-5 bg-white" id="renter-flow">
    <div class="container px-lg-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Renter Guide</span>
        <h2 class="h3 fw-bold text-navy mb-2">6 Steps to Rent Your Ideal Property</h2>
        <p class="text-muted mb-0">No broker commissions, no middleman delays. Connect directly with landlords.</p>
      </div>

      <div class="row g-4">
        
        <!-- Step 1: Search -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">1</span>
            <div class="step-icon-wrapper bg-primary-subtle text-primary rounded-circle mb-3">
              <i class="bi bi-search fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">1. Search</h3>
            <p class="text-muted small mb-0">Browse verified houses, annexes, and boarding rooms across Colombo, Kandy, Galle, and all 25 districts.</p>
          </div>
        </div>

        <!-- Step 2: Filter -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">2</span>
            <div class="step-icon-wrapper bg-info-subtle text-info-emphasis rounded-circle mb-3">
              <i class="bi bi-funnel-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">2. Filter</h3>
            <p class="text-muted small mb-0">Narrow down your results by monthly budget, bedroom count, deposit terms, and facilities like AC, WiFi, or parking.</p>
          </div>
        </div>

        <!-- Step 3: View -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">3</span>
            <div class="step-icon-wrapper bg-success-subtle text-success rounded-circle mb-3">
              <i class="bi bi-images fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">3. View</h3>
            <p class="text-muted small mb-0">Inspect high-resolution property photos, full address descriptions, key location highlights, and landlord policies.</p>
          </div>
        </div>

        <!-- Step 4: Contact -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">4</span>
            <div class="step-icon-wrapper bg-teal-subtle text-teal rounded-circle mb-3">
              <i class="bi bi-telephone-outbound-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">4. Contact</h3>
            <p class="text-muted small mb-0">Connect directly with the property owner via phone call, WhatsApp, or through our instant on-site message portal.</p>
          </div>
        </div>

        <!-- Step 5: Visit -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">5</span>
            <div class="step-icon-wrapper bg-warning-subtle text-warning-emphasis rounded-circle mb-3">
              <i class="bi bi-geo-alt-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">5. Visit</h3>
            <p class="text-muted small mb-0">Schedule a convenient physical inspection visit to inspect the property premises and meet the owner.</p>
          </div>
        </div>

        <!-- Step 6: Rent -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge">6</span>
            <div class="step-icon-wrapper bg-indigo-subtle text-indigo rounded-circle mb-3">
              <i class="bi bi-key-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">6. Rent</h3>
            <p class="text-muted small mb-0">Finalize rental terms, agree on deposit agreements directly with the landlord, and move into your new home!</p>
          </div>
        </div>

      </div>

      <div class="text-center mt-5">
        <a href="../properties.php" class="btn btn-primary fw-bold px-4 py-2.5 rounded-3 shadow-soft">
          <i class="bi bi-search me-1"></i>Start Searching Properties Now
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION 2: OWNER WORKFLOW -->
  <section class="py-5 bg-light-custom border-top border-light-custom" id="owner-flow">
    <div class="container px-lg-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Landlord Guide</span>
        <h2 class="h3 fw-bold text-navy mb-2">6 Steps to List &amp; Rent Out Your Property</h2>
        <p class="text-muted mb-0">Reach thousands of active tenants across Sri Lanka with maximum listing exposure.</p>
      </div>

      <div class="row g-4">
        
        <!-- Step 1: Register -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">1</span>
            <div class="step-icon-wrapper bg-primary-subtle text-primary rounded-circle mb-3">
              <i class="bi bi-person-plus-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">1. Register</h3>
            <p class="text-muted small mb-0">Create your free RentSriLanka owner account using your phone number or email in less than a minute.</p>
          </div>
        </div>

        <!-- Step 2: Add Property -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">2</span>
            <div class="step-icon-wrapper bg-info-subtle text-info-emphasis rounded-circle mb-3">
              <i class="bi bi-house-add-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">2. Add Property</h3>
            <p class="text-muted small mb-0">Select your property category (House, Annex, Boarding Room), location, monthly rent rate, and deposit requirement.</p>
          </div>
        </div>

        <!-- Step 3: Upload Photos -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">3</span>
            <div class="step-icon-wrapper bg-teal-subtle text-teal rounded-circle mb-3">
              <i class="bi bi-camera-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">3. Upload Photos</h3>
            <p class="text-muted small mb-0">Upload clear, well-lit photos of rooms, bathrooms, kitchen, and exterior entrance to attract genuine inquiries.</p>
          </div>
        </div>

        <!-- Step 4: Submit -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">4</span>
            <div class="step-icon-wrapper bg-warning-subtle text-warning-emphasis rounded-circle mb-3">
              <i class="bi bi-send-check-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">4. Submit</h3>
            <p class="text-muted small mb-0">Review your listing details and submit for moderation to verify accuracy and platform standards.</p>
          </div>
        </div>

        <!-- Step 5: Approval -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">5</span>
            <div class="step-icon-wrapper bg-success-subtle text-success rounded-circle mb-3">
              <i class="bi bi-patch-check-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">5. Approval</h3>
            <p class="text-muted small mb-0">Our admin team verifies your submission quickly, publishing your listing live onto search results.</p>
          </div>
        </div>

        <!-- Step 6: Receive Inquiries -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100 position-relative">
            <span class="step-number-badge border-primary text-primary bg-primary-subtle">6</span>
            <div class="step-icon-wrapper bg-purple-subtle text-purple rounded-circle mb-3">
              <i class="bi bi-chat-quote-fill fs-4"></i>
            </div>
            <h3 class="h5 fw-bold text-navy mb-2">6. Receive Inquiries</h3>
            <p class="text-muted small mb-0">Get direct calls, WhatsApp messages, and online lead inquiries directly in your Owner Portal dashboard!</p>
          </div>
        </div>

      </div>

      <div class="text-center mt-5">
        <a href="../../owner/add-property.php" class="btn btn-success fw-bold px-4 py-2.5 rounded-3 shadow-soft">
          <i class="bi bi-plus-circle me-1"></i>List Your Property Free
        </a>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="py-5 bg-navy text-white text-center">
    <div class="container px-lg-4 py-lg-3">
      <h2 class="display-6 fw-bold text-white mb-3">Questions About How RentSriLanka Works?</h2>
      <p class="lead text-white-50 max-w-600 mx-auto mb-4">Explore our detailed Help Center FAQs or reach out to our team for one-on-one assistance.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="faq.php" class="btn btn-success fw-bold px-4 py-2 rounded-3 shadow-soft">Visit FAQ Center</a>
        <a href="contact.php" class="btn btn-outline-light fw-medium px-4 py-2 rounded-3">Contact Support</a>
      </div>
    </div>
  </section>

  <?php $prefix = '../'; include '../components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>