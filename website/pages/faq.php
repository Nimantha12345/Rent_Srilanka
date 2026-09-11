<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frequently Asked Questions - RentSriLanka</title>
  
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

  <!-- FAQ HERO & SEARCH BAR -->
  <section class="py-5 bg-navy text-white text-center position-relative overflow-hidden">
    <div class="container py-lg-3 px-lg-4">
      <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-3 fw-semibold">Help &amp; Knowledge Base</span>
      <h1 class="display-5 fw-bold text-white mb-3">Frequently Asked Questions</h1>
      <p class="lead text-white-50 max-w-600 mx-auto mb-4">Find answers to common questions regarding searching, listing properties, direct landlord contact, and platform safety.</p>

      <!-- LIVE SEARCH BAR -->
      <div class="max-w-600 mx-auto">
        <div class="input-group input-group-lg shadow-soft rounded-pill overflow-hidden bg-white p-1 border border-light-custom">
          <span class="input-group-text bg-white border-0 text-muted ps-3"><i class="bi bi-search fs-5"></i></span>
          <input type="text" id="faqSearchInput" class="form-control border-0 bg-white shadow-none fs-6 text-navy" placeholder="Type keywords (e.g., deposit, listing fee, contact, report)...">
          <button class="btn btn-success fw-bold px-4 rounded-pill d-none d-sm-block" type="button" id="btnFaqSearch">Search FAQ</button>
        </div>
      </div>
    </div>
  </section>

  <!-- CATEGORY SHORTCUT NAVIGATION -->
  <section class="py-3 bg-white border-bottom border-light-custom sticky-top" style="top: 72px; z-index: 1020;">
    <div class="container px-lg-4">
      <div class="d-flex align-items-center justify-content-start justify-content-md-center gap-2 overflow-x-auto pb-2 pb-md-0 faq-category-pills">
        <a href="#cat-general" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border active" data-category="general"><i class="bi bi-grid me-1"></i>General</a>
        <a href="#cat-renters" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border" data-category="renters"><i class="bi bi-person me-1"></i>Renters</a>
        <a href="#cat-owners" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border" data-category="owners"><i class="bi bi-houses me-1"></i>Owners</a>
        <a href="#cat-safety" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border" data-category="safety"><i class="bi bi-shield-check me-1"></i>Safety</a>
        <a href="#cat-account" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border" data-category="account"><i class="bi bi-gear me-1"></i>Account</a>
        <a href="#cat-communication" class="btn btn-light btn-sm rounded-pill fw-medium text-navy text-nowrap border" data-category="communication"><i class="bi bi-chat-dots me-1"></i>Communication</a>
      </div>
    </div>
  </section>

  <!-- MAIN FAQ ACCORDION SECTION -->
  <section class="py-5">
    <div class="container px-lg-4">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <!-- NO RESULTS FOUND ALERT -->
          <div class="alert alert-warning border-0 rounded-4 p-4 text-center d-none" id="faqNoResults">
            <i class="bi bi-exclamation-circle fs-2 text-warning mb-2"></i>
            <h5 class="fw-bold text-navy mb-1">No matching questions found</h5>
            <p class="small text-muted mb-3">Try searching with another keyword or browse the categories below.</p>
            <button class="btn btn-outline-primary btn-sm rounded-pill fw-medium" id="btnResetFaqSearch">Reset Search</button>
          </div>

          <!-- CATEGORY 1: GENERAL -->
          <div class="faq-category-block mb-5" id="cat-general">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-grid-fill fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">General Questions</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionGeneral">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingG1">
                  <button class="accordion-button fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG1" aria-expanded="true" aria-controls="collapseG1">
                    What is RentSriLanka?
                  </button>
                </h3>
                <div id="collapseG1" class="accordion-collapse collapse show" aria-labelledby="headingG1" data-bs-parent="#accordionGeneral">
                  <div class="accordion-body text-muted small">
                    RentSriLanka is a dedicated online property rental marketplace connecting renters directly with landlords, house owners, and annex providers across Sri Lanka. We facilitate transparent housing discovery without middleman charges or broker commissions.
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingG2">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG2" aria-expanded="false" aria-controls="collapseG2">
                    Does RentSriLanka charge any broker fee or commission?
                  </button>
                </h3>
                <div id="collapseG2" class="accordion-collapse collapse" aria-labelledby="headingG2" data-bs-parent="#accordionGeneral">
                  <div class="accordion-body text-muted small">
                    No! RentSriLanka is 100% free for property seekers. We do not charge broker fees or transaction commissions. Renters deal directly with property owners.
                  </div>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingG3">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG3" aria-expanded="false" aria-controls="collapseG3">
                    Which geographic areas in Sri Lanka are covered?
                  </button>
                </h3>
                <div id="collapseG3" class="accordion-collapse collapse" aria-labelledby="headingG3" data-bs-parent="#accordionGeneral">
                  <div class="accordion-body text-muted small">
                    We cover all 25 districts across Sri Lanka, including major urban rental hubs such as Colombo, Kandy, Galle, Gampaha, Kurunegala, and Dehiwala-Mount Lavinia.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CATEGORY 2: RENTERS -->
          <div class="faq-category-block mb-5" id="cat-renters">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-teal-subtle text-teal rounded-circle"><i class="bi bi-person-fill fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">For Renters</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionRenters">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingR1">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseR1" aria-expanded="false" aria-controls="collapseR1">
                    How do I contact a landlord or property owner?
                  </button>
                </h3>
                <div id="collapseR1" class="accordion-collapse collapse" aria-labelledby="headingR1" data-bs-parent="#accordionRenters">
                  <div class="accordion-body text-muted small">
                    Every property listing page features direct owner contact options, including the landlord’s phone number, WhatsApp quick button, and an instant inquiry form.
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingR2">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseR2" aria-expanded="false" aria-controls="collapseR2">
                    Can I save my favorite property listings for later?
                  </button>
                </h3>
                <div id="collapseR2" class="accordion-collapse collapse" aria-labelledby="headingR2" data-bs-parent="#accordionRenters">
                  <div class="accordion-body text-muted small">
                    Yes. Clicking the heart icon on any property card saves the listing into your "Favorites" page for quick comparison and future access.
                  </div>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingR3">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseR3" aria-expanded="false" aria-controls="collapseR3">
                    What should I prepare before visiting a rental property?
                  </button>
                </h3>
                <div id="collapseR3" class="accordion-collapse collapse" aria-labelledby="headingR3" data-bs-parent="#accordionRenters">
                  <div class="accordion-body text-muted small">
                    We recommend confirming the visit appointment time with the owner, reviewing the listing details regarding deposit months, and preparing any questions regarding utility bills or lease agreements.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CATEGORY 3: OWNERS -->
          <div class="faq-category-block mb-5" id="cat-owners">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-houses-fill fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">For Property Owners</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionOwners">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingO1">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseO1" aria-expanded="false" aria-controls="collapseO1">
                    How much does it cost to list a property on RentSriLanka?
                  </button>
                </h3>
                <div id="collapseO1" class="accordion-collapse collapse" aria-labelledby="headingO1" data-bs-parent="#accordionOwners">
                  <div class="accordion-body text-muted small">
                    Standard property submissions are completely free! You can publish your house, annex, or boarding room and receive tenant leads directly.
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingO2">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseO2" aria-expanded="false" aria-controls="collapseO2">
                    How long does it take for a new property listing to be approved?
                  </button>
                </h3>
                <div id="collapseO2" class="accordion-collapse collapse" aria-labelledby="headingO2" data-bs-parent="#accordionOwners">
                  <div class="accordion-body text-muted small">
                    Our admin moderation team reviews all property submissions within 1 to 4 hours to ensure photo quality and address accuracy before making listings live.
                  </div>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingO3">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseO3" aria-expanded="false" aria-controls="collapseO3">
                    How do I mark my property as "Rented" once occupied?
                  </button>
                </h3>
                <div id="collapseO3" class="accordion-collapse collapse" aria-labelledby="headingO3" data-bs-parent="#accordionOwners">
                  <div class="accordion-body text-muted small">
                    Log in to your Owner Portal dashboard, navigate to "My Properties", and toggle the property status switch to "Rented" or "Inactive".
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CATEGORY 4: SAFETY -->
          <div class="faq-category-block mb-5" id="cat-safety">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-danger-subtle text-danger rounded-circle"><i class="bi bi-shield-fill-check fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">Safety &amp; Fraud Prevention</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionSafety">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingS1">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS1" aria-expanded="false" aria-controls="collapseS1">
                    How can I avoid rental scams?
                  </button>
                </h3>
                <div id="collapseS1" class="accordion-collapse collapse" aria-labelledby="headingS1" data-bs-parent="#accordionSafety">
                  <div class="accordion-body text-muted small">
                    Never send money, bank transfers, or advance deposit payments before physically inspecting the property and meeting the owner in person. If an owner requests advance payments before viewing, report them immediately.
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingS2">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS2" aria-expanded="false" aria-controls="collapseS2">
                    How do I report a suspicious or duplicate listing?
                  </button>
                </h3>
                <div id="collapseS2" class="accordion-collapse collapse" aria-labelledby="headingS2" data-bs-parent="#accordionSafety">
                  <div class="accordion-body text-muted small">
                    Click the "Report Listing" flag button on any property page or message interface. Select the reason (Scam, Wrong Info, Fake Property) and our admin team will investigate immediately.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CATEGORY 5: ACCOUNT -->
          <div class="faq-category-block mb-5" id="cat-account">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-gear-fill fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">Account &amp; Profile</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionAccount">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingA1">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseA1" aria-expanded="false" aria-controls="collapseA1">
                    How do I reset my account password?
                  </button>
                </h3>
                <div id="collapseA1" class="accordion-collapse collapse" aria-labelledby="headingA1" data-bs-parent="#accordionAccount">
                  <div class="accordion-body text-muted small">
                    Go to the Login page, click "Forgot Password?", enter your registered email address, and follow the link sent to your inbox to set a new password.
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingA2">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseA2" aria-expanded="false" aria-controls="collapseA2">
                    Can I switch between a Renter and Owner account?
                  </button>
                </h3>
                <div id="collapseA2" class="accordion-collapse collapse" aria-labelledby="headingA2" data-bs-parent="#accordionAccount">
                  <div class="accordion-body text-muted small">
                    Yes, your account allows you to browse listings as a renter or submit properties as a landlord through the unified user navigation menu.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CATEGORY 6: COMMUNICATION -->
          <div class="faq-category-block mb-5" id="cat-communication">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="stat-icon-sm bg-purple-subtle text-purple rounded-circle"><i class="bi bi-chat-dots-fill fs-5"></i></div>
              <h2 class="h4 fw-bold text-navy mb-0">Messaging &amp; Communication</h2>
            </div>

            <div class="accordion accordion-custom shadow-soft rounded-4 overflow-hidden" id="accordionComm">
              
              <!-- Item 1 -->
              <div class="accordion-item border-light-custom faq-item">
                <h3 class="accordion-header" id="headingC1">
                  <button class="accordion-button collapsed fw-semibold text-navy shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseC1" aria-expanded="false" aria-controls="collapseC1">
                    How does the on-site messaging system work?
                  </button>
                </h3>
                <div id="collapseC1" class="accordion-collapse collapse" aria-labelledby="headingC1" data-bs-parent="#accordionComm">
                  <div class="accordion-body text-muted small">
                    When you click "Send Message" on a property listing, a private chat thread opens in your Messages inbox, showing the property reference at the top for context.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- CTA STILL HAVE QUESTIONS SECTION -->
  <section class="py-5 bg-navy text-white text-center">
    <div class="container px-lg-4 py-lg-3">
      <h2 class="display-6 fw-bold text-white mb-3">Still Have Questions?</h2>
      <p class="lead text-white-50 max-w-600 mx-auto mb-4">Can't find the answer you're looking for? Contact our customer support team directly.</p>
      <a href="contact.php" class="btn btn-success fw-bold px-4 py-2.5 rounded-3 shadow-soft">
        <i class="bi bi-envelope-fill me-2"></i>Contact Customer Support
      </a>
    </div>
  </section>

  <?php $prefix = '../'; include '../components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/faq.js"></script>
</body>
</html>