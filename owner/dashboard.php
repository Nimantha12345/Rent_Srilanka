<?php $activePage = 'dashboard'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Dashboard - RentSriLanka</title>
  
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

      <!-- MAIN CONTENT AREA -->
      <main class="col-lg-9 col-xl-10">
        
        <!-- WELCOME HEADER & QUICK ACTIONS -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">Good morning, Nimal 👋</h1>
            <p class="text-muted mb-0">Here is an overview of your listed rental properties and inquiries.</p>
          </div>

          <div class="d-flex gap-2 flex-wrap">
            <a href="add-property.php" class="btn btn-primary fw-medium px-3 py-2 rounded-3 shadow-soft">
              <i class="bi bi-plus-circle me-1"></i>Add Property
            </a>
            <a href="properties.php" class="btn btn-outline-primary fw-medium px-3 py-2 rounded-3">
              <i class="bi bi-houses me-1"></i>View My Properties
            </a>
          </div>
        </div>

        <!-- STATISTICS GRID (6 CARDS) -->
        <div class="row g-3 mb-4">
          <!-- Stat 1 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Properties</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-houses-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">6</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-arrow-up-short"></i>+1 this month</span>
            </div>
          </div>

          <!-- Stat 2 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Active Listings</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-check-circle-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">4</h2>
              <span class="fs-8 text-muted">Published live</span>
            </div>
          </div>

          <!-- Stat 3 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Pending Approval</span>
                <div class="stat-icon-sm bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-clock-history"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">1</h2>
              <span class="fs-8 text-warning-emphasis">Under review</span>
            </div>
          </div>

          <!-- Stat 4 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Views</span>
                <div class="stat-icon-sm bg-info-subtle text-info-emphasis rounded-circle"><i class="bi bi-eye-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">1,420</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-arrow-up-short"></i>+18% vs last week</span>
            </div>
          </div>

          <!-- Stat 5 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Inquiries</span>
                <div class="stat-icon-sm bg-danger-subtle text-danger rounded-circle"><i class="bi bi-envelope-paper-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">38</h2>
              <span class="fs-8 text-danger fw-semibold">5 new unread</span>
            </div>
          </div>

          <!-- Stat 6 -->
          <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Unread Messages</span>
                <div class="stat-icon-sm bg-teal-subtle text-teal rounded-circle"><i class="bi bi-chat-dots-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">3</h2>
              <span class="fs-8 text-teal fw-medium">Active chats</span>
            </div>
          </div>
        </div>

        <!-- CHARTS SECTION (2 COLUMNS) -->
        <div class="row g-4 mb-4">
          <!-- Property Views Chart (Custom HTML/CSS Bar Chart) -->
          <div class="col-lg-7">
            <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Property Views (Last 7 Days)</h2>
                  <span class="small text-muted">Daily view count across all your listings</span>
                </div>
                <span class="badge bg-light text-navy border border-light-custom small">1,420 Total</span>
              </div>

              <!-- Bar Chart Container -->
              <div class="css-chart-bar-container d-flex align-items-end justify-content-between gap-2 pt-4 pb-2 px-2 border-bottom border-light-custom" style="height: 200px;">
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 45%;" title="Mon: 180 views"></div>
                  <span class="fs-8 text-muted mt-2">Mon</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 60%;" title="Tue: 240 views"></div>
                  <span class="fs-8 text-muted mt-2">Tue</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 35%;" title="Wed: 140 views"></div>
                  <span class="fs-8 text-muted mt-2">Wed</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 80%;" title="Thu: 310 views"></div>
                  <span class="fs-8 text-muted mt-2">Thu</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 65%;" title="Fri: 260 views"></div>
                  <span class="fs-8 text-muted mt-2">Fri</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-green rounded-top w-100" style="height: 95%;" title="Sat: 380 views"></div>
                  <span class="fs-8 text-navy fw-bold mt-2">Sat</span>
                </div>
                <div class="bar-item d-flex flex-column align-items-center flex-fill h-100 justify-content-end">
                  <div class="bar-fill bg-primary-subtle border border-primary rounded-top w-100" style="height: 70%;" title="Sun: 280 views"></div>
                  <span class="fs-8 text-muted mt-2">Sun</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Inquiries Breakdown Chart (Progress Bars) -->
          <div class="col-lg-5">
            <div class="card border-light-custom shadow-soft rounded-4 p-4 bg-white h-100">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Inquiries by Property Type</h2>
                  <span class="small text-muted">Distribution of tenant interest</span>
                </div>
              </div>

              <div class="d-flex flex-column gap-3">
                <div>
                  <div class="d-flex justify-content-between small fw-medium mb-1">
                    <span class="text-navy"><i class="bi bi-house-door text-primary-custom me-1"></i>Houses (2 listings)</span>
                    <span class="text-muted">22 inquiries (58%)</span>
                  </div>
                  <div class="progress rounded-pill" style="height: 8px;">
                    <div class="progress-bar bg-primary-green" role="progressbar" style="width: 58%;" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div>
                  <div class="d-flex justify-content-between small fw-medium mb-1">
                    <span class="text-navy"><i class="bi bi-door-open text-teal me-1"></i>Annexes (2 listings)</span>
                    <span class="text-muted">11 inquiries (29%)</span>
                  </div>
                  <div class="progress rounded-pill" style="height: 8px;">
                    <div class="progress-bar bg-teal" role="progressbar" style="width: 29%;" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div>
                  <div class="d-flex justify-content-between small fw-medium mb-1">
                    <span class="text-navy"><i class="bi bi-building text-info-emphasis me-1"></i>Boarding Rooms (2 listings)</span>
                    <span class="text-muted">5 inquiries (13%)</span>
                  </div>
                  <div class="progress rounded-pill" style="height: 8px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 13%;" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <div class="mt-auto pt-3 border-top border-light-custom">
                <a href="inquiries.php" class="btn btn-sm btn-light border w-100 fw-medium text-navy">View All 38 Inquiries</a>
              </div>
            </div>
          </div>
        </div>

        <!-- RECENT INQUIRIES & RECENT MESSAGES ROW (2 COLUMNS) -->
        <div class="row g-4 mb-4">
          
          <!-- Recent 5 Inquiries Table -->
          <div class="col-lg-7">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden h-100">
              <div class="p-3 p-md-4 border-bottom border-light-custom d-flex justify-content-between align-items-center">
                <h2 class="h6 fw-bold text-navy mb-0"><i class="bi bi-envelope-open me-2 text-primary-custom"></i>Recent Inquiries</h2>
                <a href="inquiries.php" class="small text-primary-custom text-decoration-none fw-medium">View All</a>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="bg-light-custom small text-muted">
                    <tr>
                      <th class="ps-4">Renter</th>
                      <th>Property</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th class="text-end pe-4">Action</th>
                    </tr>
                  </thead>
                  <tbody class="small">
                    <!-- Inquiry 1 -->
                    <tr>
                      <td class="ps-4">
                        <div class="fw-semibold text-navy">Kusum Perera</div>
                        <div class="fs-8 text-muted">077****890</div>
                      </td>
                      <td class="text-truncate" style="max-width: 150px;">2-Bed House in Peradeniya</td>
                      <td class="text-muted">10:42 AM</td>
                      <td><span class="badge bg-danger-subtle text-danger">Unread</span></td>
                      <td class="text-end pe-4">
                        <a href="../messages.php" class="btn btn-sm btn-outline-primary py-0 px-2 fs-7">Reply</a>
                      </td>
                    </tr>

                    <!-- Inquiry 2 -->
                    <tr>
                      <td class="ps-4">
                        <div class="fw-semibold text-navy">Kamal Silva</div>
                        <div class="fs-8 text-muted">071****123</div>
                      </td>
                      <td class="text-truncate" style="max-width: 150px;">Furnished Annex in Nugegoda</td>
                      <td class="text-muted">Yesterday</td>
                      <td><span class="badge bg-danger-subtle text-danger">Unread</span></td>
                      <td class="text-end pe-4">
                        <a href="../messages.php" class="btn btn-sm btn-outline-primary py-0 px-2 fs-7">Reply</a>
                      </td>
                    </tr>

                    <!-- Inquiry 3 -->
                    <tr>
                      <td class="ps-4">
                        <div class="fw-semibold text-navy">Saman Fernando</div>
                        <div class="fs-8 text-muted">075****555</div>
                      </td>
                      <td class="text-truncate" style="max-width: 150px;">Luxury House in Rajagiriya</td>
                      <td class="text-muted">Sep 05</td>
                      <td><span class="badge bg-light text-muted border">Replied</span></td>
                      <td class="text-end pe-4">
                        <a href="../messages.php" class="btn btn-sm btn-light border py-0 px-2 fs-7">View</a>
                      </td>
                    </tr>

                    <!-- Inquiry 4 -->
                    <tr>
                      <td class="ps-4">
                        <div class="fw-semibold text-navy">Dilani Wickramasinghe</div>
                        <div class="fs-8 text-muted">078****999</div>
                      </td>
                      <td class="text-truncate" style="max-width: 150px;">AC Boarding Room in Colombo 03</td>
                      <td class="text-muted">Sep 04</td>
                      <td><span class="badge bg-light text-muted border">Replied</span></td>
                      <td class="text-end pe-4">
                        <a href="../messages.php" class="btn btn-sm btn-light border py-0 px-2 fs-7">View</a>
                      </td>
                    </tr>

                    <!-- Inquiry 5 -->
                    <tr>
                      <td class="ps-4">
                        <div class="fw-semibold text-navy">Ruwan Jayawardena</div>
                        <div class="fs-8 text-muted">072****444</div>
                      </td>
                      <td class="text-truncate" style="max-width: 150px;">3-Bed House with Garden</td>
                      <td class="text-muted">Sep 02</td>
                      <td><span class="badge bg-light text-muted border">Closed</span></td>
                      <td class="text-end pe-4">
                        <a href="../messages.php" class="btn btn-sm btn-light border py-0 px-2 fs-7">View</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Recent 5 Conversations List -->
          <div class="col-lg-5">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden h-100">
              <div class="p-3 p-md-4 border-bottom border-light-custom d-flex justify-content-between align-items-center">
                <h2 class="h6 fw-bold text-navy mb-0"><i class="bi bi-chat-dots me-2 text-teal"></i>Recent Messages</h2>
                <a href="../messages.php" class="small text-primary-custom text-decoration-none fw-medium">Open Inbox</a>
              </div>

              <div class="list-group list-group-flush">
                
                <!-- Chat 1 -->
                <a href="../messages.php" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom">
                  <div class="d-flex align-items-center gap-3">
                    <img src="../assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="Kusum">
                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-baseline mb-1">
                        <h3 class="h6 fw-bold text-navy mb-0 text-truncate">Kusum Perera</h3>
                        <span class="fs-8 text-muted">10:42 AM</span>
                      </div>
                      <p class="small text-muted text-truncate mb-0">Yes, the house is available for inspection...</p>
                    </div>
                    <span class="badge bg-primary-green rounded-pill">2</span>
                  </div>
                </a>

                <!-- Chat 2 -->
                <a href="../messages.php" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom">
                  <div class="d-flex align-items-center gap-3">
                    <img src="../assets/images/properties/house-2.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="Sunil">
                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-baseline mb-1">
                        <h3 class="h6 fw-bold text-navy mb-0 text-truncate">Sunil Jayasinghe</h3>
                        <span class="fs-8 text-muted">Yesterday</span>
                      </div>
                      <p class="small text-muted text-truncate mb-0">Could you please send me your contact number?</p>
                    </div>
                    <span class="badge bg-primary-green rounded-pill">1</span>
                  </div>
                </a>

                <!-- Chat 3 -->
                <a href="../messages.php" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom">
                  <div class="d-flex align-items-center gap-3">
                    <img src="../assets/images/properties/recent-3.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="Nalaka">
                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-baseline mb-1">
                        <h3 class="h6 fw-bold text-navy mb-0 text-truncate">Nalaka Fernando</h3>
                        <span class="fs-8 text-muted">Sep 04</span>
                      </div>
                      <p class="small text-muted text-truncate mb-0">Thank you, key money deposit confirmed.</p>
                    </div>
                  </div>
                </a>

                <!-- Chat 4 -->
                <a href="../messages.php" class="list-group-item list-group-item-action p-3 border-bottom border-light-custom">
                  <div class="d-flex align-items-center gap-3">
                    <img src="../assets/images/properties/annex-1.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="Mahesh">
                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-baseline mb-1">
                        <h3 class="h6 fw-bold text-navy mb-0 text-truncate">Mahesh Cooray</h3>
                        <span class="fs-8 text-muted">Sep 01</span>
                      </div>
                      <p class="small text-muted text-truncate mb-0">Is parking available for two cars?</p>
                    </div>
                  </div>
                </a>

                <!-- Chat 5 -->
                <a href="../messages.php" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-3">
                    <img src="../assets/images/properties/recent-1.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="Chathuri">
                    <div class="flex-grow-1 min-w-0">
                      <div class="d-flex justify-content-between align-items-baseline mb-1">
                        <h3 class="h6 fw-bold text-navy mb-0 text-truncate">Chathuri Peiris</h3>
                        <span class="fs-8 text-muted">Aug 28</span>
                      </div>
                      <p class="small text-muted text-truncate mb-0">We have finalized the lease agreement.</p>
                    </div>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </div>

        <!-- MY RECENT PROPERTIES GRID (4 CARDS) -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 fw-bold text-navy mb-0">My Recent Properties</h2>
            <a href="properties.php" class="small text-primary-custom text-decoration-none fw-medium">View All Properties (6)</a>
          </div>

          <div class="row g-4">
            
            <!-- Prop 1 -->
            <div class="col-md-6 col-xl-3">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden bg-white">
                <div class="position-relative">
                  <img src="../assets/images/properties/house-1.jpg" class="card-img-top" alt="House in Rajagiriya" loading="lazy">
                  <span class="badge bg-success position-absolute top-0 start-0 m-3">Active</span>
                  <span class="badge badge-property-type position-absolute top-0 end-0 m-3">House</span>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                  <div class="price-tag fs-6 mb-1">LKR 95,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-1">Luxury House in Rajagiriya</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Rajagiriya, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>420 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>12 Inquiries</span>
                  </div>
                  
                  <div class="d-flex gap-2 mt-3 pt-2 border-top border-light-custom">
                    <a href="../property-details.php?id=101" class="btn btn-sm btn-outline-primary flex-fill fw-medium">View Live</a>
                    <a href="edit-property.php?id=101" class="btn btn-sm btn-light border" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Prop 2 -->
            <div class="col-md-6 col-xl-3">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden bg-white">
                <div class="position-relative">
                  <img src="../assets/images/properties/annex-1.jpg" class="card-img-top" alt="Annex in Nugegoda" loading="lazy">
                  <span class="badge bg-success position-absolute top-0 start-0 m-3">Active</span>
                  <span class="badge badge-property-type position-absolute top-0 end-0 m-3">Annex</span>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                  <div class="price-tag fs-6 mb-1">LKR 42,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-1">Private Annex in Nugegoda</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Nugegoda, Colombo</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>310 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>9 Inquiries</span>
                  </div>

                  <div class="d-flex gap-2 mt-3 pt-2 border-top border-light-custom">
                    <a href="../property-details.php?id=103" class="btn btn-sm btn-outline-primary flex-fill fw-medium">View Live</a>
                    <a href="edit-property.php?id=103" class="btn btn-sm btn-light border" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Prop 3 -->
            <div class="col-md-6 col-xl-3">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden bg-white">
                <div class="position-relative">
                  <img src="../assets/images/properties/room-1.jpg" class="card-img-top" alt="Room in Peradeniya" loading="lazy">
                  <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-3">Pending Approval</span>
                  <span class="badge badge-property-type position-absolute top-0 end-0 m-3">Room</span>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                  <div class="price-tag fs-6 mb-1">LKR 18,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-1">Boarding Room near Uni</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Peradeniya, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>15 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>2 Inquiries</span>
                  </div>

                  <div class="d-flex gap-2 mt-3 pt-2 border-top border-light-custom">
                    <a href="edit-property.php?id=102" class="btn btn-sm btn-primary flex-fill fw-medium">Edit Details</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Prop 4 -->
            <div class="col-md-6 col-xl-3">
              <div class="card property-card h-100 border-light-custom shadow-soft rounded-4 overflow-hidden bg-white">
                <div class="position-relative">
                  <img src="../assets/images/properties/house-2.jpg" class="card-img-top" alt="House in Kandy" loading="lazy">
                  <span class="badge bg-secondary position-absolute top-0 start-0 m-3">Rented</span>
                  <span class="badge badge-property-type position-absolute top-0 end-0 m-3">House</span>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                  <div class="price-tag fs-6 mb-1">LKR 75,000<span class="fs-6 text-muted font-normal">/mo</span></div>
                  <h3 class="h6 card-title text-truncate fw-semibold mb-1">Garden House in Kandy</h3>
                  <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Katugastota, Kandy</p>
                  
                  <div class="d-flex justify-content-between text-muted fs-8 border-top pt-2 mt-auto">
                    <span><i class="bi bi-eye me-1"></i>675 Views</span>
                    <span><i class="bi bi-envelope me-1"></i>15 Inquiries</span>
                  </div>

                  <div class="d-flex gap-2 mt-3 pt-2 border-top border-light-custom">
                    <button class="btn btn-sm btn-outline-secondary flex-fill fw-medium" disabled>Occupied</button>
                    <a href="edit-property.php?id=104" class="btn btn-sm btn-light border" title="Edit Listing"><i class="bi bi-pencil"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </main>
    </div>
  </div>

  <?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>