<?php $activePage = 'add-property'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Your Property - RentSriLanka</title>
  
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
<body class="bg-light-custom">

  <?php include 'components/navbar.php'; ?>

  <!-- DASHBOARD WRAPPER -->
  <div class="container-fluid px-lg-4 py-4">
    <div class="row g-4">
      
      <?php include 'components/sidebar.php'; ?>

      <!-- MAIN WIZARD AREA -->
      <main class="col-lg-9 col-xl-10">
        
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">List a New Property</h1>
            <p class="text-muted mb-0">Complete the steps below to publish your rental property listing to thousands of potential tenants.</p>
          </div>
          <button type="button" class="btn btn-light border btn-sm text-navy fw-medium d-sm-none" id="btnSaveDraftMobile">
            <i class="bi bi-bookmark me-1"></i>Save Draft
          </button>
        </div>

        <!-- MULTI-STEP PROGRESS STEPPER TRACK -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="wizard-stepper-track d-flex justify-content-between align-items-center overflow-x-auto py-2">
            
            <div class="step-node active" data-step="1">
              <div class="node-circle">1</div>
              <span class="node-label">Type</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="2">
              <div class="node-circle">2</div>
              <span class="node-label">Basics</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="3">
              <div class="node-circle">3</div>
              <span class="node-label">Location</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="4">
              <div class="node-circle">4</div>
              <span class="node-label">Facilities</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="5">
              <div class="node-circle">5</div>
              <span class="node-label">Photos</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="6">
              <div class="node-circle">6</div>
              <span class="node-label">Contact</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="7">
              <div class="node-circle">7</div>
              <span class="node-label">Preview</span>
            </div>
            <div class="step-connector"></div>

            <div class="step-node" data-step="8">
              <div class="node-circle">8</div>
              <span class="node-label">Submit</span>
            </div>

          </div>
        </div>

        <!-- WIZARD FORM CONTAINER -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden p-4 p-md-5 mb-4">
          <form id="addPropertyWizardForm" class="needs-validation" novalidate>
            
            <!-- ================= STEP 1: PROPERTY TYPE ================= -->
            <div class="wizard-step-content active" id="wizardStep1">
              <div class="text-center max-w-600 mx-auto mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 1 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">What type of property are you listing?</h2>
                <p class="text-muted small">Select the category that best describes your rental unit.</p>
              </div>

              <div class="row g-3 justify-content-center max-w-700 mx-auto py-3">
                <div class="col-md-4">
                  <div class="type-selection-card card border-2 border-primary p-4 rounded-4 cursor-pointer text-center h-100 active" id="typeCardHouse">
                    <input class="form-check-input d-none" type="radio" name="wizPropType" id="wizPropHouse" value="House" checked>
                    <div class="type-icon-box bg-primary-subtle text-primary rounded-circle mx-auto mb-3">
                      <i class="bi bi-house-door-fill display-6"></i>
                    </div>
                    <h3 class="h6 fw-bold text-navy mb-1">House</h3>
                    <p class="fs-8 text-muted mb-0">Entire house or villa with private living spaces.</p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="type-selection-card card border border-light-custom p-4 rounded-4 cursor-pointer text-center h-100" id="typeCardRoom">
                    <input class="form-check-input d-none" type="radio" name="wizPropType" id="wizPropRoom" value="Room">
                    <div class="type-icon-box bg-teal-subtle text-teal rounded-circle mx-auto mb-3">
                      <i class="bi bi-door-open-fill display-6"></i>
                    </div>
                    <h3 class="h6 fw-bold text-navy mb-1">Boarding Room</h3>
                    <p class="fs-8 text-muted mb-0">Single room in a shared house, boarding house, or hostel.</p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="type-selection-card card border border-light-custom p-4 rounded-4 cursor-pointer text-center h-100" id="typeCardAnnex">
                    <input class="form-check-input d-none" type="radio" name="wizPropType" id="wizPropAnnex" value="Annex">
                    <div class="type-icon-box bg-info-subtle text-info-emphasis rounded-circle mx-auto mb-3">
                      <i class="bi bi-building-fill display-6"></i>
                    </div>
                    <h3 class="h6 fw-bold text-navy mb-1">Annex</h3>
                    <p class="fs-8 text-muted mb-0">Self-contained unit attached or secondary to a main house.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- ================= STEP 2: BASIC INFORMATION ================= -->
            <div class="wizard-step-content d-none" id="wizardStep2">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 2 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Basic Property Information</h2>
                <p class="text-muted small">Enter key details to highlight your listing to searchers.</p>
              </div>

              <div class="row g-3">
                <div class="col-12">
                  <label for="wizTitle" class="form-label small fw-semibold text-navy">Property Title</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizTitle" placeholder="e.g. Modern 2-Bedroom Annex with Private Entrance" required>
                  <div class="invalid-feedback">Please enter a property title.</div>
                </div>

                <div class="col-12">
                  <label for="wizDescription" class="form-label small fw-semibold text-navy">Description</label>
                  <textarea class="form-control border-light-custom shadow-none" id="wizDescription" rows="4" placeholder="Describe key features, nearby landmarks, quietness, suited tenants (e.g. students/small family)..." required></textarea>
                  <div class="invalid-feedback">Please provide a property description.</div>
                </div>

                <div class="col-md-6">
                  <label for="wizPrice" class="form-label small fw-semibold text-navy">Monthly Rent (LKR)</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom">Rs.</span>
                    <input type="number" class="form-control border-start-0 border-light-custom shadow-none" id="wizPrice" placeholder="45000" min="1000" required>
                    <span class="input-group-text bg-light-custom border-start-0 border-light-custom">/ month</span>
                    <div class="invalid-feedback">Enter a valid monthly rent amount.</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="wizBedrooms" class="form-label small fw-semibold text-navy">Bedrooms</label>
                  <select class="form-select border-light-custom shadow-none" id="wizBedrooms" required>
                    <option value="1" selected>1 Bedroom</option>
                    <option value="2">2 Bedrooms</option>
                    <option value="3">3 Bedrooms</option>
                    <option value="4">4+ Bedrooms</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizBathrooms" class="form-label small fw-semibold text-navy">Bathrooms</label>
                  <select class="form-select border-light-custom shadow-none" id="wizBathrooms" required>
                    <option value="1" selected>1 Bathroom</option>
                    <option value="2">2 Bathrooms</option>
                    <option value="3">3+ Bathrooms</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizSize" class="form-label small fw-semibold text-navy">Property Size (sqft)</label>
                  <input type="number" class="form-control border-light-custom shadow-none" id="wizSize" placeholder="750" required>
                  <div class="invalid-feedback">Enter property size in sqft.</div>
                </div>

                <div class="col-md-4">
                  <label for="wizFurnished" class="form-label small fw-semibold text-navy">Furnishing Status</label>
                  <select class="form-select border-light-custom shadow-none" id="wizFurnished" required>
                    <option value="Fully Furnished" selected>Fully Furnished</option>
                    <option value="Semi-Furnished">Semi-Furnished</option>
                    <option value="Unfurnished">Unfurnished</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- ================= STEP 3: LOCATION ================= -->
            <div class="wizard-step-content d-none" id="wizardStep3">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 3 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Property Location</h2>
                <p class="text-muted small">Specify where your property is situated.</p>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-md-4">
                  <label for="wizDistrict" class="form-label small fw-semibold text-navy">District</label>
                  <select class="form-select border-light-custom shadow-none" id="wizDistrict" required>
                    <option value="Colombo">Colombo</option>
                    <option value="Kandy" selected>Kandy</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Kurunegala">Kurunegala</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizCity" class="form-label small fw-semibold text-navy">City / Town</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizCity" value="Peradeniya" required>
                  <div class="invalid-feedback">City is required.</div>
                </div>

                <div class="col-md-4">
                  <label for="wizArea" class="form-label small fw-semibold text-navy">Neighborhood / Area</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizArea" value="Peradeniya Road" placeholder="e.g. Near University Junction">
                </div>

                <div class="col-12">
                  <label for="wizAddress" class="form-label small fw-semibold text-navy">Street Address (Private until confirmed)</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizAddress" value="No. 45, Peradeniya Road, Kandy" required>
                  <div class="invalid-feedback">Please enter street address.</div>
                </div>
              </div>

              <!-- MAP LOCATION PINNER SIMULATION -->
              <label class="form-label small fw-semibold text-navy mb-2">Pin Exact Map Location</label>
              <div class="map-pinner-box border rounded-4 position-relative overflow-hidden bg-secondary-subtle" style="height: 220px;">
                <div class="position-absolute top-50 start-50 translate-middle text-center z-2">
                  <i class="bi bi-geo-alt-fill text-danger display-4 drop-shadow"></i>
                  <span class="badge bg-navy text-white d-block mt-1 shadow-sm fs-8">Dragged Marker Position</span>
                </div>
                <div class="position-absolute bottom-0 end-0 m-3 z-2">
                  <button type="button" class="btn btn-white btn-sm border shadow-sm fw-medium"><i class="bi bi-crosshair me-1"></i>Detect My Location</button>
                </div>
                <!-- Grid background simulation -->
                <div class="w-100 h-100 opacity-25" style="background-image: radial-gradient(#64748b 1px, transparent 1px); background-size: 16px 16px;"></div>
              </div>
            </div>

            <!-- ================= STEP 4: FACILITIES ================= -->
            <div class="wizard-step-content d-none" id="wizardStep4">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 4 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Amenities &amp; Facilities</h2>
                <p class="text-muted small">Select all facilities included with this rental listing.</p>
              </div>

              <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facParking" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facParking"><i class="bi bi-p-circle text-primary-custom me-2"></i>Parking</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facWifi" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facWifi"><i class="bi bi-wifi text-teal me-2"></i>WiFi</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facKitchen" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facKitchen"><i class="bi bi-egg-fried text-warning-emphasis me-2"></i>Kitchen Access</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facBathroom" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facBathroom"><i class="bi bi-droplet-fill text-info-emphasis me-2"></i>Private Bathroom</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facGarden">
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facGarden"><i class="bi bi-flower1 text-success me-2"></i>Garden / Yard</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facAC" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facAC"><i class="bi bi-snow text-info me-2"></i>Air Conditioning</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facCCTV">
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facCCTV"><i class="bi bi-camera-video text-secondary me-2"></i>CCTV Security</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facWater" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facWater"><i class="bi bi-water text-primary me-2"></i>Main Line Water</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facElectricity" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facElectricity"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Separate Electricity</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facFurnishedChecked" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facFurnishedChecked"><i class="bi bi-lamp-fill text-danger me-2"></i>Furnished</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- ================= STEP 5: PHOTOS (DRAG & DROP) ================= -->
            <div class="wizard-step-content d-none" id="wizardStep5">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 5 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Property Photos</h2>
                <p class="text-muted small">Upload high quality photos. Clear images get up to 3x more inquiries.</p>
              </div>

              <!-- DRAG AND DROP ZONE -->
              <div class="photo-dropzone-box border-2 border-dashed border-primary rounded-4 p-5 text-center bg-light-custom cursor-pointer mb-4" id="photoDropzone">
                <i class="bi bi-cloud-arrow-up display-4 text-primary-custom d-block mb-2"></i>
                <h3 class="h6 fw-bold text-navy mb-1">Drag &amp; drop property photos here</h3>
                <p class="fs-8 text-muted mb-3">Supports JPG, PNG, WEBP (Max 5MB each)</p>
                <button type="button" class="btn btn-outline-primary btn-sm fw-medium px-4 rounded-pill" id="btnBrowsePhotos">Browse Files</button>
                <input type="file" id="photoFileInput" class="d-none" multiple accept="image/*">
              </div>

              <!-- PREVIEW / REORDER GRID -->
              <label class="form-label small fw-semibold text-navy mb-2">Uploaded Photo Previews (<span id="photoCount">2</span>/10)</label>
              <div class="row g-3" id="photoPreviewGrid">
                
                <!-- Sample Photo 1 (Main) -->
                <div class="col-6 col-md-4 col-lg-3 photo-preview-card" data-index="0">
                  <div class="card border-primary shadow-xs rounded-3 overflow-hidden position-relative">
                    <img src="../assets/images/properties/house-1.jpg" class="w-100 object-fit-cover" style="height: 120px;" alt="Property photo 1">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-2 shadow-xs">Main Cover</span>
                    <div class="photo-actions-overlay position-absolute bottom-0 start-0 end-0 p-1 bg-dark bg-opacity-75 d-flex justify-content-between">
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-set-main" title="Set as Main"><i class="bi bi-star-fill text-warning"></i></button>
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-delete-photo" title="Delete Photo"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                </div>

                <!-- Sample Photo 2 -->
                <div class="col-6 col-md-4 col-lg-3 photo-preview-card" data-index="1">
                  <div class="card border-light-custom shadow-xs rounded-3 overflow-hidden position-relative">
                    <img src="../assets/images/properties/room-1.jpg" class="w-100 object-fit-cover" style="height: 120px;" alt="Property photo 2">
                    <div class="photo-actions-overlay position-absolute bottom-0 start-0 end-0 p-1 bg-dark bg-opacity-75 d-flex justify-content-between">
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-set-main" title="Set as Main"><i class="bi bi-star"></i></button>
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-delete-photo" title="Delete Photo"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- ================= STEP 6: CONTACT ================= -->
            <div class="wizard-step-content d-none" id="wizardStep6">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 6 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Contact Information &amp; Preferences</h2>
                <p class="text-muted small">Choose how interested tenants can get in touch with you.</p>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label for="wizPhone" class="form-label small fw-semibold text-navy">Phone Number (Sri Lanka)</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="wizPhone" value="0771234567" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="wizWhatsapp" class="form-label small fw-semibold text-navy">WhatsApp Number</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-success"><i class="bi bi-whatsapp"></i></span>
                    <input type="tel" class="form-control border-start-0 border-light-custom shadow-none" id="wizWhatsapp" value="0771234567">
                  </div>
                </div>

                <div class="col-12 mt-4">
                  <label class="form-label small fw-semibold text-navy d-block mb-2">Enable Communication Channels</label>
                  
                  <div class="form-check form-switch mb-3 p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableCall">Direct Phone Calls</label>
                      <span class="fs-8 text-muted">Show phone button to verified logged-in users.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableCall" checked>
                  </div>

                  <div class="form-check form-switch mb-3 p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableWhatsapp">WhatsApp Chat</label>
                      <span class="fs-8 text-muted">Direct click-to-chat button on listing page.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableWhatsapp" checked>
                  </div>

                  <div class="form-check form-switch p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableMessaging">RentSriLanka On-Platform Messaging</label>
                      <span class="fs-8 text-muted">Receive inquiries inside your website Inbox.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableMessaging" checked>
                  </div>
                </div>
              </div>
            </div>

            <!-- ================= STEP 7: PREVIEW ================= -->
            <div class="wizard-step-content d-none" id="wizardStep7">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 7 of 8</span>
                <h2 class="h4 fw-bold text-navy mb-1">Listing Preview</h2>
                <p class="text-muted small">Review how your listing card and details will appear to renters.</p>
              </div>

              <!-- PREVIEW CARD SUMMARY -->
              <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden mb-4">
                <div class="row g-0">
                  <div class="col-md-5 position-relative">
                    <img src="../assets/images/properties/house-1.jpg" id="prevCoverImg" class="w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Listing preview cover">
                    <span class="badge badge-property-type position-absolute top-0 start-0 m-3" id="prevBadgeType">House</span>
                  </div>
                  <div class="col-md-7 p-4 d-flex flex-column">
                    <div class="price-tag fs-5 mb-1" id="prevPriceDisplay">Rs. 45,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                    <h3 class="h5 fw-bold text-navy mb-2" id="prevTitleDisplay">Modern 2-Bedroom Annex with Private Entrance</h3>
                    <p class="text-muted small mb-3" id="prevLocationDisplay"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya Road, Peradeniya, Kandy</p>
                    
                    <div class="d-flex gap-3 text-muted small border-top pt-2 mt-auto">
                      <span id="prevBedsDisplay"><i class="bi bi-door-closed me-1"></i>2 Beds</span>
                      <span id="prevBathsDisplay"><i class="bi bi-droplet me-1"></i>1 Bath</span>
                      <span id="prevSizeDisplay"><i class="bi bi-arrows-angle me-1"></i>750 sqft</span>
                      <span id="prevFurnishedDisplay"><i class="bi bi-lamp me-1"></i>Fully Furnished</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bg-light-custom p-3 rounded-3 border border-light-custom small">
                <h4 class="h6 fw-bold text-navy mb-1">Description Preview:</h4>
                <p class="text-secondary mb-0" id="prevDescDisplay">Describe key features, nearby landmarks, quietness, suited tenants...</p>
              </div>
            </div>

            <!-- ================= STEP 8: SUBMIT & ACCURACY CONFIRMATION ================= -->
            <div class="wizard-step-content d-none" id="wizardStep8">
              <div class="text-center max-w-600 mx-auto py-3">
                <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 72px; height: 72px;">
                  <i class="bi bi-shield-check display-5"></i>
                </div>
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 8 of 8</span>
                <h2 class="h3 fw-bold text-navy mb-2">Ready to Submit Your Listing</h2>
                <p class="text-muted small mb-4">Your property listing will be reviewed by our moderation team within 2-4 hours to ensure high marketplace quality.</p>

                <!-- Confirmation Checkbox -->
                <div class="form-check text-start bg-light-custom p-3 rounded-3 border border-light-custom mb-4">
                  <input class="form-check-input ms-0 me-2" type="checkbox" id="confirmAccuracy" required>
                  <label class="form-check-label small fw-semibold text-navy" for="confirmAccuracy">
                    I confirm that all provided property information, pricing, and photos are accurate and I am the lawful owner or authorized agent.
                  </label>
                  <div class="invalid-feedback">You must confirm accuracy before submitting.</div>
                </div>

                <!-- Submission Success State (Hidden by default) -->
                <div class="alert alert-success border-0 shadow-sm rounded-3 p-4 d-none text-start mb-4" id="wizardSuccessAlert">
                  <h5 class="fw-bold mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Property Submitted for Approval!</h5>
                  <p class="small mb-2">Your property ID is <strong>RSL-98231</strong>. You will receive an email notification as soon as it goes live.</p>
                  <a href="properties.php" class="btn btn-sm btn-success fw-medium rounded-pill px-3">Go to My Properties</a>
                </div>

              </div>
            </div>

            <!-- FOOTER WIZARD CONTROLS (BACK, NEXT, SUBMIT) -->
            <div class="d-flex justify-content-between align-items-center pt-4 border-top border-light-custom mt-4">
              <button type="button" class="btn btn-light border text-navy fw-medium px-4 d-none" id="btnWizBack">
                <i class="bi bi-chevron-left me-1"></i>Back
              </button>

              <div class="ms-auto d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary fw-medium px-3" id="btnWizSaveDraft">Save Draft</button>
                <button type="button" class="btn btn-primary fw-bold px-4" id="btnWizNext">
                  <span>Next</span> <i class="bi bi-chevron-right ms-1"></i>
                </button>
                <button type="submit" class="btn btn-success fw-bold px-4 d-none" id="btnWizSubmit">
                  <i class="bi bi-send-fill me-1"></i>Submit for Approval
                </button>
              </div>
            </div>

          </form>
        </div>

      </main>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/add-property-wizard.js"></script>
</body>
</html>