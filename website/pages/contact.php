<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - RentSriLanka</title>
  
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

  <?php $activePage = 'contact'; $prefix = '../'; include '../components/navbar.php'; ?>

  <!-- CONTACT HERO -->
  <section class="py-5 bg-navy text-white position-relative overflow-hidden">
    <div class="container text-center py-lg-3 px-lg-4">
      <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-3 fw-semibold">We're Here to Help</span>
      <h1 class="display-5 fw-bold text-white mb-3">Get in Touch with Our Team</h1>
      <p class="lead text-white-50 max-w-600 mx-auto mb-0">Have a question about a property listing, account verification, or general inquiry? We're always happy to assist you.</p>
    </div>
  </section>

  <!-- CONTACT FORM & DETAILS SECTION -->
  <section class="py-5">
    <div class="container px-lg-4">
      <div class="row g-4 g-lg-5">
        
        <!-- LEFT: CONTACT FORM -->
        <div class="col-lg-7">
          <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 p-md-5">
            <h2 class="h4 fw-bold text-navy mb-2">Send Us a Message</h2>
            <p class="text-muted small mb-4">Fill out the form below and our customer support team will respond within 24 hours.</p>

            <form id="contactForm" class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="contactName" class="form-label small fw-semibold text-navy">Your Name</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="contactName" placeholder="e.g. Kasun Perera" required>
                  <div class="invalid-feedback">Please enter your name.</div>
                </div>

                <div class="col-md-6">
                  <label for="contactEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                  <input type="email" class="form-control border-light-custom shadow-none" id="contactEmail" placeholder="kasun@example.lk" required>
                  <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>

                <div class="col-md-6">
                  <label for="contactPhone" class="form-label small fw-semibold text-navy">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted">+94</span>
                    <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="contactPhone" placeholder="771234567" required>
                    <div class="invalid-feedback">Please enter your phone number.</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="contactSubject" class="form-label small fw-semibold text-navy">Subject</label>
                  <select class="form-select border-light-custom shadow-none" id="contactSubject" required>
                    <option value="" selected disabled>Select subject...</option>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Listing Help">Help with Property Listing</option>
                    <option value="Account & Verification">Account &amp; Verification</option>
                    <option value="Report an Issue">Report Fake Listing / Fraud</option>
                    <option value="Feedback">Feedback &amp; Suggestions</option>
                  </select>
                  <div class="invalid-feedback">Please select a subject.</div>
                </div>

                <div class="col-12">
                  <label for="contactMessage" class="form-label small fw-semibold text-navy">Message</label>
                  <textarea class="form-control border-light-custom shadow-none" id="contactMessage" rows="5" placeholder="How can we help you today?" required></textarea>
                  <div class="invalid-feedback">Please type your message.</div>
                </div>

                <div class="col-12">
                  <div class="alert alert-success border-0 shadow-sm rounded-3 p-3 d-none" id="contactSuccessAlert">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>Thank you! Your message has been sent successfully. We will get back to you soon.
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2.5 rounded-3 shadow-soft w-100 w-sm-auto" id="btnSubmitContact">
                    <i class="bi bi-send-fill me-2"></i>Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- RIGHT: CONTACT INFO & DETAILS -->
        <div class="col-lg-5">
          
          <!-- Contact Cards -->
          <div class="d-flex flex-column gap-3 mb-4">
            
            <!-- Email -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3.5">
              <div class="d-flex align-items-center gap-3">
                <div class="contact-icon bg-primary-subtle text-primary rounded-circle flex-shrink-0">
                  <i class="bi bi-envelope-fill fs-5"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Email Support</h6>
                  <p class="small text-muted mb-0">support@rentsrilanka.lk</p>
                </div>
              </div>
            </div>

            <!-- Phone -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3.5">
              <div class="d-flex align-items-center gap-3">
                <div class="contact-icon bg-success-subtle text-success rounded-circle flex-shrink-0">
                  <i class="bi bi-telephone-fill fs-5"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Phone Hotline</h6>
                  <p class="small text-muted mb-0">+94 11 234 5678 / +94 77 123 4567</p>
                </div>
              </div>
            </div>

            <!-- Location -->
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-3.5">
              <div class="d-flex align-items-center gap-3">
                <div class="contact-icon bg-teal-subtle text-teal rounded-circle flex-shrink-0">
                  <i class="bi bi-geo-alt-fill fs-5"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Headquarters</h6>
                  <p class="small text-muted mb-0">Level 4, Millennium Tower, Nawala Road, Rajagiriya, Colombo</p>
                </div>
              </div>
            </div>

          </div>

          <!-- Social Links Card -->
          <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 mb-4">
            <h6 class="fw-bold text-navy mb-3">Connect With Us</h6>
            <div class="d-flex gap-2">
              <a href="https://facebook.com" target="_blank" class="btn btn-light border btn-icon-lg text-primary" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
              <a href="https://instagram.com" target="_blank" class="btn btn-light border btn-icon-lg text-danger" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
              <a href="https://whatsapp.com" target="_blank" class="btn btn-light border btn-icon-lg text-success" aria-label="WhatsApp"><i class="bi bi-whatsapp fs-5"></i></a>
              <a href="https://linkedin.com" target="_blank" class="btn btn-light border btn-icon-lg text-info" aria-label="LinkedIn"><i class="bi bi-linkedin fs-5"></i></a>
            </div>
          </div>

          <!-- FAQ Shortcut Banner -->
          <div class="card border-0 bg-primary-subtle bg-opacity-25 border-primary-subtle rounded-4 p-4 text-center">
            <i class="bi bi-question-circle-fill fs-2 text-primary mb-2"></i>
            <h6 class="fw-bold text-navy mb-1">Looking for Immediate Answers?</h6>
            <p class="small text-muted mb-3">Check our Frequently Asked Questions section for quick answers on rental guidelines, adding listings, and safety.</p>
            <a href="faq.php" class="btn btn-primary btn-sm fw-bold rounded-pill align-self-center px-4">Visit FAQ Center</a>
          </div>

        </div>

      </div>
    </div>
  </section>

  <?php $prefix = '../'; include '../components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/contact.js"></script>
</body>
</html>