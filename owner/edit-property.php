<?php $activePage = ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Property - RentSriLanka</title>
  
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
        
        <!-- HEADER WITH LISTING STATUS & QUICK ACTIONS -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <div class="d-flex align-items-center gap-2 mb-1">
              <h1 class="h3 fw-bold text-navy mb-0">Edit Property</h1>
              <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fs-7 fw-semibold">
                <i class="bi bi-patch-check-fill me-1"></i>Approved
              </span>
            </div>
            <p class="text-muted mb-0 small">Editing Property ID: <strong class="text-navy">RSL-84920</strong> (Two Storey Luxury House in Rajagiriya)</p>
          </div>

          <div class="d-flex gap-2 flex-wrap">
            <button type="button" class="btn btn-outline-secondary fw-medium px-3 py-2 rounded-3" id="btnTriggerPreviewModal" data-bs-toggle="modal" data-bs-target="#previewModal">
              <i class="bi bi-eye me-1"></i>Preview
            </button>
            <button type="button" class="btn btn-outline-warning fw-medium px-3 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#deactivateModal">
              <i class="bi bi-pause-circle me-1"></i>Deactivate
            </button>
            <button type="button" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-soft" id="btnTopSaveChanges">
              <i class="bi bi-check-lg me-1"></i>Save Changes
            </button>
          </div>
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

          </div>
        </div>

        <!-- WIZARD FORM CONTAINER -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden p-4 p-md-5 mb-4">
          <form id="editPropertyWizardForm" class="needs-validation" novalidate>
            
            <!-- ================= STEP 1: PROPERTY TYPE ================= -->
            <div class="wizard-step-content active" id="wizardStep1">
              <div class="text-center max-w-600 mx-auto mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 1 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Property Category</h2>
                <p class="text-muted small">Update category if needed. Changing category requires re-moderation.</p>
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
                    <p class="fs-8 text-muted mb-0">Single room in a shared house or boarding house.</p>
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
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 2 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Basic Property Information</h2>
                <p class="text-muted small">Update key listing features, title, and pricing.</p>
              </div>

              <div class="row g-3">
                <div class="col-12">
                  <label for="wizTitle" class="form-label small fw-semibold text-navy">Property Title</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizTitle" value="Two Storey Luxury House in Rajagiriya" required>
                  <div class="invalid-feedback">Please enter a property title.</div>
                </div>

                <div class="col-12">
                  <label for="wizDescription" class="form-label small fw-semibold text-navy">Description</label>
                  <textarea class="form-control border-light-custom shadow-none" id="wizDescription" rows="4" required>Spacious two-storey luxury residential house situated in a peaceful, highly secure neighborhood in Rajagiriya. Features air-conditioned master bedrooms, modern pantry, roller gate parking for 2 vehicles, private garden, and easy access to Colombo city center and major international schools.</textarea>
                  <div class="invalid-feedback">Please provide a property description.</div>
                </div>

                <div class="col-md-6">
                  <label for="wizPrice" class="form-label small fw-semibold text-navy">Monthly Rent (LKR)</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text bg-light-custom border-end-0 border-light-custom">Rs.</span>
                    <input type="number" class="form-control border-start-0 border-light-custom shadow-none" id="wizPrice" value="95000" min="1000" required>
                    <span class="input-group-text bg-light-custom border-start-0 border-light-custom">/ month</span>
                    <div class="invalid-feedback">Enter a valid monthly rent amount.</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="wizBedrooms" class="form-label small fw-semibold text-navy">Bedrooms</label>
                  <select class="form-select border-light-custom shadow-none" id="wizBedrooms" required>
                    <option value="1">1 Bedroom</option>
                    <option value="2">2 Bedrooms</option>
                    <option value="3" selected>3 Bedrooms</option>
                    <option value="4">4+ Bedrooms</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizBathrooms" class="form-label small fw-semibold text-navy">Bathrooms</label>
                  <select class="form-select border-light-custom shadow-none" id="wizBathrooms" required>
                    <option value="1">1 Bathroom</option>
                    <option value="2" selected>2 Bathrooms</option>
                    <option value="3">3+ Bathrooms</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizSize" class="form-label small fw-semibold text-navy">Property Size (sqft)</label>
                  <input type="number" class="form-control border-light-custom shadow-none" id="wizSize" value="1800" required>
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
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 3 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Property Location</h2>
                <p class="text-muted small">Location details for tenant searches.</p>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-md-4">
                  <label for="wizDistrict" class="form-label small fw-semibold text-navy">District</label>
                  <select class="form-select border-light-custom shadow-none" id="wizDistrict" required>
                    <option value="Colombo" selected>Colombo</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Kurunegala">Kurunegala</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="wizCity" class="form-label small fw-semibold text-navy">City / Town</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizCity" value="Rajagiriya" required>
                  <div class="invalid-feedback">City is required.</div>
                </div>

                <div class="col-md-4">
                  <label for="wizArea" class="form-label small fw-semibold text-navy">Neighborhood / Area</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizArea" value="Obeysekarapura / Nawala Road">
                </div>

                <div class="col-12">
                  <label for="wizAddress" class="form-label small fw-semibold text-navy">Street Address (Private until confirmed)</label>
                  <input type="text" class="form-control border-light-custom shadow-none" id="wizAddress" value="No. 12/A, Nawala Road, Rajagiriya" required>
                  <div class="invalid-feedback">Please enter street address.</div>
                </div>
              </div>

              <!-- MAP LOCATION PINNER SIMULATION -->
              <label class="form-label small fw-semibold text-navy mb-2">Pin Exact Map Location</label>
              <div class="map-pinner-box border rounded-4 position-relative overflow-hidden bg-secondary-subtle" style="height: 220px;">
                <div class="position-absolute top-50 start-50 translate-middle text-center z-2">
                  <i class="bi bi-geo-alt-fill text-danger display-4 drop-shadow"></i>
                  <span class="badge bg-navy text-white d-block mt-1 shadow-sm fs-8">Current Saved Location (Rajagiriya)</span>
                </div>
                <div class="position-absolute bottom-0 end-0 m-3 z-2">
                  <button type="button" class="btn btn-white btn-sm border shadow-sm fw-medium"><i class="bi bi-crosshair me-1"></i>Adjust Location Pin</button>
                </div>
                <div class="w-100 h-100 opacity-25" style="background-image: radial-gradient(#64748b 1px, transparent 1px); background-size: 16px 16px;"></div>
              </div>
            </div>

            <!-- ================= STEP 4: FACILITIES ================= -->
            <div class="wizard-step-content d-none" id="wizardStep4">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 4 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Amenities &amp; Facilities</h2>
                <p class="text-muted small">Update amenities offered with this listing.</p>
              </div>

              <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facParking" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facParking"><i class="bi bi-p-circle text-primary-custom me-2"></i>Parking (2 Cars)</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facWifi" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facWifi"><i class="bi bi-wifi text-teal me-2"></i>Fiber WiFi</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facKitchen" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facKitchen"><i class="bi bi-egg-fried text-warning-emphasis me-2"></i>Modern Pantry</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facBathroom" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facBathroom"><i class="bi bi-droplet-fill text-info-emphasis me-2"></i>2 Attached Baths</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facGarden" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facGarden"><i class="bi bi-flower1 text-success me-2"></i>Private Garden</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facAC" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facAC"><i class="bi bi-snow text-info me-2"></i>AC Master Room</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facCCTV" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facCCTV"><i class="bi bi-camera-video text-secondary me-2"></i>CCTV Cameras</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                  <div class="facility-checkbox-card border border-light-custom p-3 rounded-3 d-flex align-items-center gap-2 cursor-pointer bg-white">
                    <input class="form-check-input flex-shrink-0" type="checkbox" id="facWater" checked>
                    <label class="form-check-label small fw-medium text-navy cursor-pointer w-100" for="facWater"><i class="bi bi-water text-primary me-2"></i>Overhead Tank</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- ================= STEP 5: PHOTOS (IMAGES) ================= -->
            <div class="wizard-step-content d-none" id="wizardStep5">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 5 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Manage Property Images</h2>
                <p class="text-muted small">Reorder, add new photos, or update the main cover image.</p>
              </div>

              <div class="photo-dropzone-box border-2 border-dashed border-primary rounded-4 p-4 text-center bg-light-custom cursor-pointer mb-4" id="photoDropzone">
                <i class="bi bi-cloud-arrow-up display-5 text-primary-custom d-block mb-1"></i>
                <h3 class="h6 fw-bold text-navy mb-1">Upload additional property photos</h3>
                <button type="button" class="btn btn-outline-primary btn-sm fw-medium px-4 rounded-pill" id="btnBrowsePhotos">Browse Files</button>
                <input type="file" id="photoFileInput" class="d-none" multiple accept="image/*">
              </div>

              <label class="form-label small fw-semibold text-navy mb-2">Current Active Photos (3 Uploaded)</label>
              <div class="row g-3" id="photoPreviewGrid">
                
                <!-- Image 1 -->
                <div class="col-6 col-md-4 col-lg-3 photo-preview-card" data-index="0">
                  <div class="card border-primary shadow-xs rounded-3 overflow-hidden position-relative">
                    <img src="../assets/images/properties/house-1.jpg" class="w-100 object-fit-cover" style="height: 130px;" alt="Property exterior">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-2 shadow-xs">Main Cover</span>
                    <div class="photo-actions-overlay position-absolute bottom-0 start-0 end-0 p-1 bg-dark bg-opacity-75 d-flex justify-content-between">
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-set-main" title="Main Cover"><i class="bi bi-star-fill text-warning"></i></button>
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-delete-photo" title="Remove"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                </div>

                <!-- Image 2 -->
                <div class="col-6 col-md-4 col-lg-3 photo-preview-card" data-index="1">
                  <div class="card border-light-custom shadow-xs rounded-3 overflow-hidden position-relative">
                    <img src="../assets/images/properties/recent-2.jpg" class="w-100 object-fit-cover" style="height: 130px;" alt="Living area">
                    <div class="photo-actions-overlay position-absolute bottom-0 start-0 end-0 p-1 bg-dark bg-opacity-75 d-flex justify-content-between">
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-set-main" title="Set as Main"><i class="bi bi-star"></i></button>
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-delete-photo" title="Remove"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                </div>

                <!-- Image 3 -->
                <div class="col-6 col-md-4 col-lg-3 photo-preview-card" data-index="2">
                  <div class="card border-light-custom shadow-xs rounded-3 overflow-hidden position-relative">
                    <img src="../assets/images/properties/house-2.jpg" class="w-100 object-fit-cover" style="height: 130px;" alt="Garden area">
                    <div class="photo-actions-overlay position-absolute bottom-0 start-0 end-0 p-1 bg-dark bg-opacity-75 d-flex justify-content-between">
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-set-main" title="Set as Main"><i class="bi bi-star"></i></button>
                      <button type="button" class="btn btn-link text-white p-0 fs-7 btn-delete-photo" title="Remove"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- ================= STEP 6: CONTACT OPTIONS ================= -->
            <div class="wizard-step-content d-none" id="wizardStep6">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 6 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Contact Methods</h2>
                <p class="text-muted small">Manage tenant inquiry preferences for this property.</p>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label for="wizPhone" class="form-label small fw-semibold text-navy">Phone Number</label>
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
                  <div class="form-check form-switch mb-3 p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableCall">Direct Phone Calls</label>
                      <span class="fs-8 text-muted">Allow renters to view and call phone number.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableCall" checked>
                  </div>

                  <div class="form-check form-switch mb-3 p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableWhatsapp">WhatsApp Chat</label>
                      <span class="fs-8 text-muted">Show WhatsApp button on property page.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableWhatsapp" checked>
                  </div>

                  <div class="form-check form-switch p-3 border border-light-custom rounded-3 bg-white d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-check-label fw-semibold text-navy d-block" for="enableMessaging">RentSriLanka On-Platform Messaging</label>
                      <span class="fs-8 text-muted">Receive inquiry notifications in website chat inbox.</span>
                    </div>
                    <input class="form-check-input fs-5 ms-0" type="checkbox" role="switch" id="enableMessaging" checked>
                  </div>
                </div>
              </div>
            </div>

            <!-- ================= STEP 7: PREVIEW & CONFIRM EDIT ================= -->
            <div class="wizard-step-content d-none" id="wizardStep7">
              <div class="mb-4">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill fw-medium">Step 7 of 7</span>
                <h2 class="h4 fw-bold text-navy mb-1">Review Updated Listing</h2>
                <p class="text-muted small">Verify all changes before saving.</p>
              </div>

              <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden mb-4">
                <div class="row g-0">
                  <div class="col-md-5 position-relative">
                    <img src="../assets/images/properties/house-1.jpg" id="prevCoverImg" class="w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Listing preview cover">
                    <span class="badge badge-property-type position-absolute top-0 start-0 m-3" id="prevBadgeType">House</span>
                  </div>
                  <div class="col-md-7 p-4 d-flex flex-column">
                    <div class="price-tag fs-5 mb-1" id="prevPriceDisplay">Rs. 95,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                    <h3 class="h5 fw-bold text-navy mb-2" id="prevTitleDisplay">Two Storey Luxury House in Rajagiriya</h3>
                    <p class="text-muted small mb-3" id="prevLocationDisplay"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
                    
                    <div class="d-flex gap-3 text-muted small border-top pt-2 mt-auto">
                      <span id="prevBedsDisplay"><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                      <span id="prevBathsDisplay"><i class="bi bi-droplet me-1"></i>2 Baths</span>
                      <span id="prevSizeDisplay"><i class="bi bi-arrows-angle me-1"></i>1,800 sqft</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Success Feedback Box (Shown after saving) -->
              <div class="alert alert-success border-0 shadow-sm rounded-3 p-4 d-none mb-4" id="editSuccessAlert">
                <h5 class="fw-bold mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Changes Saved Successfully!</h5>
                <p class="small mb-2">Property listing <strong>RSL-84920</strong> has been updated live.</p>
                <a href="properties.php" class="btn btn-sm btn-success fw-medium rounded-pill px-3">Return to My Properties</a>
              </div>
            </div>

            <!-- FOOTER WIZARD CONTROLS -->
            <div class="d-flex justify-content-between align-items-center pt-4 border-top border-light-custom mt-4">
              <button type="button" class="btn btn-light border text-navy fw-medium px-4 d-none" id="btnWizBack">
                <i class="bi bi-chevron-left me-1"></i>Back
              </button>

              <div class="ms-auto d-flex gap-2">
                <button type="button" class="btn btn-outline-warning fw-medium px-3" data-bs-toggle="modal" data-bs-target="#deactivateModal">Deactivate</button>
                <button type="button" class="btn btn-primary fw-bold px-4" id="btnWizNext">
                  <span>Next</span> <i class="bi bi-chevron-right ms-1"></i>
                </button>
                <button type="button" class="btn btn-success fw-bold px-4 d-none" id="btnWizSaveSubmit">
                  <i class="bi bi-check-lg me-1"></i>Save Changes
                </button>
              </div>
            </div>

          </form>
        </div>

      </main>
    </div>
  </div>

  <!-- IMPORTANT INFORMATION CHANGE WARNING MODAL -->
  <div class="modal fade" id="infoChangeWarningModal" tabindex="-1" aria-labelledby="infoChangeWarningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom bg-warning-subtle rounded-top-4">
          <h5 class="modal-title fw-bold text-navy" id="infoChangeWarningModalLabel">
            <i class="bi bi-exclamation-triangle-fill text-warning-emphasis me-2"></i>Important Change Notice
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <p class="small text-navy mb-3">You have modified key listing information (such as <strong>Monthly Rent</strong> or <strong>Property Location</strong>).</p>
          <div class="alert alert-warning border-0 small mb-3">
            <i class="bi bi-info-circle me-1"></i> Significant price or location updates may require a brief re-verification by RentSriLanka moderators to maintain listing integrity.
          </div>
          <p class="small text-muted mb-0">Do you wish to proceed and apply these changes now?</p>
        </div>
        <div class="modal-footer border-top border-light-custom">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Review Changes</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnConfirmWarningAndSave">Confirm &amp; Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- DEACTIVATE LISTING CONFIRMATION MODAL -->
  <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-warning mb-3">
            <i class="bi bi-pause-circle-fill fs-1"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deactivateModalLabel">Deactivate Listing?</h5>
          <p class="small text-muted mb-4">Deactivating will temporarily hide this property from tenant searches. You can re-activate it anytime from "My Properties".</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning flex-fill fw-medium" id="btnConfirmDeactivate">Deactivate</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PREVIEW MODAL -->
  <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="previewModalLabel"><i class="bi bi-eye text-primary-custom me-2"></i>Live Property Preview</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
            <img src="../assets/images/properties/house-1.jpg" class="w-100 object-fit-cover" style="max-height: 320px;" alt="Property cover">
            <div class="card-body p-4">
              <span class="badge badge-property-type mb-2">House</span>
              <div class="price-tag fs-4 mb-2">Rs. 95,000<span class="fs-6 text-muted font-normal">/mo</span></div>
              <h3 class="h4 fw-bold text-navy mb-2">Two Storey Luxury House in Rajagiriya</h3>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
              
              <div class="d-flex gap-3 text-muted small border-top border-bottom border-light-custom py-2 mb-3">
                <span><i class="bi bi-door-closed me-1"></i>3 Beds</span>
                <span><i class="bi bi-droplet me-1"></i>2 Baths</span>
                <span><i class="bi bi-arrows-angle me-1"></i>1,800 sqft</span>
                <span><i class="bi bi-lamp me-1"></i>Fully Furnished</span>
              </div>
              <p class="small text-secondary mb-0">Spacious two-storey luxury residential house situated in a peaceful, highly secure neighborhood in Rajagiriya...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/edit-property-wizard.js"></script>
</body>
</html>