<?php $activePage = 'dashboard'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - RentSriLanka</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        
        <!-- HEADER & QUICK ACTIONS -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">Enterprise Admin Dashboard</h1>
            <p class="text-muted mb-0">Overview of platform metrics, pending approvals, user activity, and system analytics.</p>
          </div>

          <!-- QUICK ACTION BUTTONS -->
          <div class="d-flex gap-2 flex-wrap">
            <a href="properties.php?filter=pending" class="btn btn-warning fw-medium text-dark rounded-3 shadow-xs">
              <i class="bi bi-clock-history me-1"></i>Approve Properties (12)
            </a>
            <a href="reports.php" class="btn btn-danger fw-medium rounded-3 shadow-xs">
              <i class="bi bi-flag me-1"></i>Review Reports (3)
            </a>
            <a href="users.php?action=add" class="btn btn-navy fw-medium text-white rounded-3 shadow-xs">
              <i class="bi bi-person-plus me-1"></i>Add User
            </a>
          </div>
        </div>

        <!-- 8 STATISTICS CARDS GRID -->
        <div class="row g-3 mb-4">
          
          <!-- Card 1: Total Users -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Users</span>
                <div class="stat-icon-sm bg-primary-subtle text-primary rounded-circle"><i class="bi bi-people-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">4,850</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-arrow-up-short"></i>+12.4% this month</span>
            </div>
          </div>

          <!-- Card 2: Owners -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Owners / Landlords</span>
                <div class="stat-icon-sm bg-teal-subtle text-teal rounded-circle"><i class="bi bi-person-badge-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">1,240</h2>
              <span class="fs-8 text-muted">25.5% of user base</span>
            </div>
          </div>

          <!-- Card 3: Renters -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Renters / Tenants</span>
                <div class="stat-icon-sm bg-info-subtle text-info-emphasis rounded-circle"><i class="bi bi-person-workspace"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">3,610</h2>
              <span class="fs-8 text-muted">74.5% of user base</span>
            </div>
          </div>

          <!-- Card 4: Properties -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Properties</span>
                <div class="stat-icon-sm bg-indigo-subtle text-indigo rounded-circle"><i class="bi bi-houses-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">2,180</h2>
              <span class="fs-8 text-success fw-medium"><i class="bi bi-arrow-up-short"></i>+85 new listings</span>
            </div>
          </div>

          <!-- Card 5: Active Listings -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Active Listings</span>
                <div class="stat-icon-sm bg-success-subtle text-success rounded-circle"><i class="bi bi-check-circle-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">1,940</h2>
              <span class="fs-8 text-success fw-medium">89% active rate</span>
            </div>
          </div>

          <!-- Card 6: Pending Approval -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Pending Approval</span>
                <div class="stat-icon-sm bg-warning-subtle text-warning-emphasis rounded-circle"><i class="bi bi-hourglass-split"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">12</h2>
              <span class="fs-8 text-warning-emphasis fw-medium">Needs moderation</span>
            </div>
          </div>

          <!-- Card 7: Flagged Reports -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">User Reports</span>
                <div class="stat-icon-sm bg-danger-subtle text-danger rounded-circle"><i class="bi bi-flag-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">3</h2>
              <span class="fs-8 text-danger fw-semibold">Action required</span>
            </div>
          </div>

          <!-- Card 8: Total Inquiries -->
          <div class="col-6 col-md-3">
            <div class="card border-light-custom shadow-soft rounded-4 p-3 bg-white h-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="small text-muted fw-medium">Total Inquiries</span>
                <div class="stat-icon-sm bg-purple-subtle text-purple rounded-circle"><i class="bi bi-chat-square-text-fill"></i></div>
              </div>
              <h2 class="h3 fw-bold text-navy mb-0">14,290</h2>
              <span class="fs-8 text-muted">All-time leads sent</span>
            </div>
          </div>

        </div>

        <!-- CHARTS SECTION: ROW 1 -->
        <div class="row g-4 mb-4">
          
          <!-- Chart 1: New Users Growth -->
          <div class="col-lg-6">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 h-100">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">New Users Acquisition</h2>
                  <span class="fs-8 text-muted">Monthly registrations (Owners vs Renters)</span>
                </div>
                <span class="badge bg-light text-navy border border-light-custom fs-8">2026</span>
              </div>
              <div class="chart-container" style="position: relative; height:260px;">
                <canvas id="chartNewUsers"></canvas>
              </div>
            </div>
          </div>

          <!-- Chart 2: New Properties Growth -->
          <div class="col-lg-6">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 h-100">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Property Submissions &amp; Approvals</h2>
                  <span class="fs-8 text-muted">Monthly submission trends</span>
                </div>
                <span class="badge bg-light text-navy border border-light-custom fs-8">2026</span>
              </div>
              <div class="chart-container" style="position: relative; height:260px;">
                <canvas id="chartNewProperties"></canvas>
              </div>
            </div>
          </div>

        </div>

        <!-- CHARTS SECTION: ROW 2 -->
        <div class="row g-4 mb-4">
          
          <!-- Chart 3: Property Types Distribution -->
          <div class="col-lg-5">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 h-100">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Property Type Breakdown</h2>
                  <span class="fs-8 text-muted">Active marketplace distribution</span>
                </div>
              </div>
              <div class="chart-container" style="position: relative; height:240px;">
                <canvas id="chartPropertyTypes"></canvas>
              </div>
            </div>
          </div>

          <!-- Chart 4: Properties by District -->
          <div class="col-lg-7">
            <div class="card border-light-custom shadow-soft rounded-4 bg-white p-4 h-100">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Top Districts by Listing Volume</h2>
                  <span class="fs-8 text-muted">Geographic coverage across Sri Lanka</span>
                </div>
              </div>
              <div class="chart-container" style="position: relative; height:240px;">
                <canvas id="chartPropertiesDistrict"></canvas>
              </div>
            </div>
          </div>

        </div>

        <!-- RECENT ACTIVITY AUDIT LOG TABLE -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden mb-4">
          <div class="p-4 border-bottom border-light-custom d-flex align-items-center justify-content-between">
            <div>
              <h2 class="h5 fw-bold text-navy mb-0">Recent System Activity</h2>
              <span class="fs-8 text-muted">Real-time audit log of user registrations, property approvals, and reports</span>
            </div>
            <a href="reports.php" class="btn btn-light border btn-sm text-navy fw-medium fs-8">View Full Audit Log</a>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">Event Type</th>
                  <th>Details / Target</th>
                  <th>Performed By / User</th>
                  <th>Timestamp</th>
                  <th class="text-end pe-4">Status / Action</th>
                </tr>
              </thead>
              <tbody class="small">
                
                <!-- Activity 1: New Property Submitted -->
                <tr>
                  <td class="ps-4">
                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill">
                      <i class="bi bi-hourglass-split me-1"></i>New Property
                    </span>
                  </td>
                  <td>
                    <div class="fw-bold text-navy">Furnished Boarding Room near Uni</div>
                    <div class="fs-8 text-muted">ID: RSL-90312 • Peradeniya, Kandy</div>
                  </td>
                  <td>
                    <div class="fw-medium text-navy">Nimal Perera</div>
                    <div class="fs-8 text-muted">Owner (ID: U-8492)</div>
                  </td>
                  <td class="text-muted">10 mins ago</td>
                  <td class="text-end pe-4">
                    <a href="properties.php?id=90312" class="btn btn-sm btn-outline-primary fw-medium py-1 px-2.5">Review Listing</a>
                  </td>
                </tr>

                <!-- Activity 2: Property Approved -->
                <tr>
                  <td class="ps-4">
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">
                      <i class="bi bi-check-circle-fill me-1"></i>Property Approved
                    </span>
                  </td>
                  <td>
                    <div class="fw-bold text-navy">Two Storey Luxury House in Rajagiriya</div>
                    <div class="fs-8 text-muted">ID: RSL-84920 • Colombo</div>
                  </td>
                  <td>
                    <div class="fw-medium text-navy">Super Admin</div>
                    <div class="fs-8 text-muted">System Staff</div>
                  </td>
                  <td class="text-muted">45 mins ago</td>
                  <td class="text-end pe-4">
                    <span class="text-success fw-semibold fs-8"><i class="bi bi-check-lg me-1"></i>Live</span>
                  </td>
                </tr>

                <!-- Activity 3: New User Registration -->
                <tr>
                  <td class="ps-4">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill">
                      <i class="bi bi-person-plus-fill me-1"></i>New User
                    </span>
                  </td>
                  <td>
                    <div class="fw-bold text-navy">Kasun Wickramasinghe</div>
                    <div class="fs-8 text-muted">kasun.w@example.lk • Renter Account</div>
                  </td>
                  <td>
                    <div class="fw-medium text-navy">Self-registered</div>
                    <div class="fs-8 text-muted">Web Signup</div>
                  </td>
                  <td class="text-muted">2 hours ago</td>
                  <td class="text-end pe-4">
                    <span class="badge bg-success-subtle text-success fs-8">Verified</span>
                  </td>
                </tr>

                <!-- Activity 4: New Report Flagged -->
                <tr>
                  <td class="ps-4">
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">
                      <i class="bi bi-flag-fill me-1"></i>New Report
                    </span>
                  </td>
                  <td>
                    <div class="fw-bold text-navy">Report #REP-402: Fraudulent Price</div>
                    <div class="fs-8 text-muted">Target Listing: RSL-77102</div>
                  </td>
                  <td>
                    <div class="fw-medium text-navy">Saman Fernando</div>
                    <div class="fs-8 text-muted">Renter User</div>
                  </td>
                  <td class="text-muted">3 hours ago</td>
                  <td class="text-end pe-4">
                    <a href="reports.php?id=402" class="btn btn-sm btn-danger fw-medium py-1 px-2.5">Investigate</a>
                  </td>
                </tr>

                <!-- Activity 5: Property Rejected -->
                <tr>
                  <td class="ps-4">
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">
                      <i class="bi bi-x-circle-fill me-1"></i>Property Rejected
                    </span>
                  </td>
                  <td>
                    <div class="fw-bold text-navy">Unfurnished Single Annex Room</div>
                    <div class="fs-8 text-muted">ID: RSL-88102 • Insufficient photos</div>
                  </td>
                  <td>
                    <div class="fw-medium text-navy">Moderator System</div>
                    <div class="fs-8 text-muted">Auto Rules</div>
                  </td>
                  <td class="text-muted">5 hours ago</td>
                  <td class="text-end pe-4">
                    <span class="text-muted fs-8">Owner Notified</span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>