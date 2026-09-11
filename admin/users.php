<?php $activePage = 'users'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management - RentSriLanka Admin</title>
  
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
        
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
          <div>
            <h1 class="h3 fw-bold text-navy mb-1">User Management Dashboard</h1>
            <p class="text-muted mb-0">Manage registered owners, renters, and administrator accounts across the platform.</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-navy fw-medium text-white rounded-3 shadow-xs" id="btnOpenAddUserModal">
              <i class="bi bi-person-plus-fill me-1"></i>Add New User
            </button>
            <button class="btn btn-outline-secondary btn-sm fw-medium rounded-pill px-3" id="btnExportUsersCSV">
              <i class="bi bi-download me-1"></i>Export CSV
            </button>
          </div>
        </div>

        <!-- FILTERS BAR: SEARCH, ROLE, STATUS, DATE SORT -->
        <div class="card border-0 shadow-soft p-3 rounded-4 mb-4 bg-white">
          <div class="row g-2 align-items-center">
            
            <!-- Search -->
            <div class="col-12 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
                <input type="text" id="adminUserSearch" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search by name, email, or phone...">
              </div>
            </div>

            <!-- Role Filter -->
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminRoleFilter">
                <option value="all">All Roles</option>
                <option value="Admin">Admin</option>
                <option value="Owner">Owner</option>
                <option value="Renter">Renter</option>
              </select>
            </div>

            <!-- Status Filter -->
            <div class="col-6 col-md-3">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminUserStatusFilter">
                <option value="all">All Statuses</option>
                <option value="Active">Active</option>
                <option value="Suspended">Suspended</option>
                <option value="Blocked">Blocked</option>
              </select>
            </div>

            <!-- Date Sort -->
            <div class="col-12 col-md-2">
              <select class="form-select form-select-sm border-light-custom shadow-none" id="adminUserSortBy">
                <option value="newest">Joined: Newest</option>
                <option value="oldest">Joined: Oldest</option>
                <option value="properties_high">Properties: High to Low</option>
              </select>
            </div>

          </div>
        </div>

        <!-- DESKTOP USERS TABLE VIEW (VISIBLE ON LARGE SCREENS) -->
        <div class="card border-light-custom shadow-soft rounded-4 bg-white overflow-hidden d-none d-md-block mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="adminUsersTable">
              <thead class="bg-light-custom small text-muted">
                <tr>
                  <th class="ps-4">User</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th class="text-center">Properties</th>
                  <th>Status</th>
                  <th>Joined</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody class="small" id="adminUsersTableBody">
                
                <!-- User 1: Admin -->
                <tr class="admin-user-row" data-id="101" data-name="Sirimewan Kumara" data-email="admin@rentsrilanka.lk" data-phone="+94 77 123 4567" data-role="Admin" data-status="Active" data-properties="0" data-joined="2025-01-10">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="bg-navy text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8 flex-shrink-0" style="width: 36px; height: 36px;">SK</div>
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 160px;">Sirimewan Kumara</div>
                        <div class="fs-8 text-muted">ID: USR-1001</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-navy font-medium">admin@rentsrilanka.lk</td>
                  <td class="text-muted">+94 77 123 4567</td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-shield-lock-fill me-1"></i>Admin</span></td>
                  <td class="text-center fw-medium">-</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-muted">Jan 10, 2025</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-user-view" data-id="101" title="View User"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="101" title="Edit User"><i class="bi bi-pencil"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- User 2: Owner (Active) -->
                <tr class="admin-user-row" data-id="102" data-name="Nimal Perera" data-email="nimal.perera@example.lk" data-phone="+94 77 987 6543" data-role="Owner" data-status="Active" data-properties="6" data-joined="2025-03-15">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-2">
                      <img src="../assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover flex-shrink-0" width="36" height="36" alt="User Avatar">
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 160px;">Nimal Perera</div>
                        <div class="fs-8 text-muted">ID: USR-1002</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-navy font-medium">nimal.perera@example.lk</td>
                  <td class="text-muted">+94 77 987 6543</td>
                  <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="bi bi-person-badge me-1"></i>Owner</span></td>
                  <td class="text-center fw-bold text-teal">6</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-muted">Mar 15, 2025</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-user-view" data-id="102" title="View User"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="102" title="Edit User"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-warning btn-user-suspend" data-id="102" data-name="Nimal Perera" title="Suspend User"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-block" data-id="102" data-name="Nimal Perera" title="Block User"><i class="bi bi-slash-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-delete" data-id="102" data-name="Nimal Perera" title="Delete User"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- User 3: Renter (Active) -->
                <tr class="admin-user-row" data-id="103" data-name="Kusum Perera" data-email="kusum.p@example.lk" data-phone="+94 71 234 5678" data-role="Renter" data-status="Active" data-properties="0" data-joined="2026-02-01">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8 flex-shrink-0" style="width: 36px; height: 36px;">KP</div>
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 160px;">Kusum Perera</div>
                        <div class="fs-8 text-muted">ID: USR-1003</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-navy font-medium">kusum.p@example.lk</td>
                  <td class="text-muted">+94 71 234 5678</td>
                  <td><span class="badge bg-teal-subtle text-teal border border-teal-subtle"><i class="bi bi-person me-1"></i>Renter</span></td>
                  <td class="text-center fw-medium">-</td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Active</span></td>
                  <td class="text-muted">Feb 01, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-user-view" data-id="103" title="View User"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="103" title="Edit User"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-warning btn-user-suspend" data-id="103" data-name="Kusum Perera" title="Suspend User"><i class="bi bi-pause-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-block" data-id="103" data-name="Kusum Perera" title="Block User"><i class="bi bi-slash-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-delete" data-id="103" data-name="Kusum Perera" title="Delete User"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- User 4: Owner (Suspended) -->
                <tr class="admin-user-row" data-id="104" data-name="Mahesh Gunasekara" data-email="mahesh.g@example.lk" data-phone="+94 75 111 2222" data-role="Owner" data-status="Suspended" data-properties="2" data-joined="2025-08-20">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8 flex-shrink-0" style="width: 36px; height: 36px;">MG</div>
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 160px;">Mahesh Gunasekara</div>
                        <div class="fs-8 text-muted">ID: USR-1004</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-navy font-medium">mahesh.g@example.lk</td>
                  <td class="text-muted">+94 75 111 2222</td>
                  <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="bi bi-person-badge me-1"></i>Owner</span></td>
                  <td class="text-center fw-bold text-teal">2</td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Suspended</span></td>
                  <td class="text-muted">Aug 20, 2025</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-user-view" data-id="104" title="View User"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="104" title="Edit User"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-light border text-success btn-user-activate" data-id="104" data-name="Mahesh Gunasekara" title="Reactivate User"><i class="bi bi-play-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-delete" data-id="104" data-name="Mahesh Gunasekara" title="Delete User"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- User 5: Renter (Blocked) -->
                <tr class="admin-user-row" data-id="105" data-name="Saman Wickrama" data-email="saman.w@example.lk" data-phone="+94 72 333 4444" data-role="Renter" data-status="Blocked" data-properties="0" data-joined="2026-01-05">
                  <td class="ps-4">
                    <div class="d-flex align-items-center gap-2">
                      <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8 flex-shrink-0" style="width: 36px; height: 36px;">SW</div>
                      <div class="min-w-0">
                        <div class="fw-bold text-navy text-truncate" style="max-width: 160px;">Saman Wickrama</div>
                        <div class="fs-8 text-muted">ID: USR-1005</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-navy font-medium">saman.w@example.lk</td>
                  <td class="text-muted">+94 72 333 4444</td>
                  <td><span class="badge bg-teal-subtle text-teal border border-teal-subtle"><i class="bi bi-person me-1"></i>Renter</span></td>
                  <td class="text-center fw-medium">-</td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Blocked</span></td>
                  <td class="text-muted">Jan 05, 2026</td>
                  <td class="text-end pe-4">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-light border text-navy btn-user-view" data-id="105" title="View User"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-light border text-success btn-user-activate" data-id="105" data-name="Saman Wickrama" title="Unblock User"><i class="bi bi-check-circle"></i></button>
                      <button class="btn btn-light border text-danger btn-user-delete" data-id="105" data-name="Saman Wickrama" title="Delete User"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW (VISIBLE ON SMALL SCREENS) -->
        <div class="d-md-none" id="adminUsersMobileContainer">
          
          <!-- Card 1 -->
          <div class="card property-card admin-user-card border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3" data-id="102" data-name="Nimal Perera" data-email="nimal.perera@example.lk" data-phone="+94 77 987 6543" data-role="Owner" data-status="Active">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="d-flex align-items-center gap-2">
                <img src="../assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover" width="38" height="38" alt="Nimal Perera">
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Nimal Perera</h2>
                  <span class="fs-8 text-muted">ID: USR-1002</span>
                </div>
              </div>
              <span class="badge bg-success-subtle text-success">Active</span>
            </div>
            <p class="small text-navy mb-1"><i class="bi bi-envelope me-1 text-muted"></i>nimal.perera@example.lk</p>
            <p class="small text-muted mb-2"><i class="bi bi-telephone me-1 text-muted"></i>+94 77 987 6543</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2 mt-auto">
              <span class="badge bg-primary-subtle text-primary"><i class="bi bi-person-badge me-1"></i>Owner (6 Props)</span>
              <div class="btn-group btn-group-sm">
                <button class="btn btn-light border btn-user-view" data-id="102"><i class="bi bi-eye"></i></button>
                <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="102"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-light border text-warning btn-user-suspend" data-id="102" data-name="Nimal Perera"><i class="bi bi-pause-circle"></i></button>
                <button class="btn btn-light border text-danger btn-user-delete" data-id="102" data-name="Nimal Perera"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card property-card admin-user-card border-light-custom shadow-soft rounded-4 p-3 bg-white mb-3" data-id="103" data-name="Kusum Perera" data-email="kusum.p@example.lk" data-phone="+94 71 234 5678" data-role="Renter" data-status="Active">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="d-flex align-items-center gap-2">
                <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-8" style="width: 38px; height: 38px;">KP</div>
                <div>
                  <h2 class="h6 fw-bold text-navy mb-0">Kusum Perera</h2>
                  <span class="fs-8 text-muted">ID: USR-1003</span>
                </div>
              </div>
              <span class="badge bg-success-subtle text-success">Active</span>
            </div>
            <p class="small text-navy mb-1"><i class="bi bi-envelope me-1 text-muted"></i>kusum.p@example.lk</p>
            <p class="small text-muted mb-2"><i class="bi bi-telephone me-1 text-muted"></i>+94 71 234 5678</p>
            <div class="d-flex justify-content-between align-items-center border-top border-light-custom pt-2 mt-auto">
              <span class="badge bg-teal-subtle text-teal"><i class="bi bi-person me-1"></i>Renter</span>
              <div class="btn-group btn-group-sm">
                <button class="btn btn-light border btn-user-view" data-id="103"><i class="bi bi-eye"></i></button>
                <button class="btn btn-light border text-primary-custom btn-user-edit" data-id="103"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-light border text-danger btn-user-block" data-id="103" data-name="Kusum Perera"><i class="bi bi-slash-circle"></i></button>
                <button class="btn btn-light border text-danger btn-user-delete" data-id="103" data-name="Kusum Perera"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>

  <!-- ADD / EDIT USER MODAL -->
  <div class="modal fade" id="userFormModal" tabindex="-1" aria-labelledby="userFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom p-4">
          <h5 class="modal-title fw-bold text-navy" id="userFormModalLabel">
            <i class="bi bi-person-plus-fill text-primary-custom me-2"></i>Add New User Account
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="userAdminForm" class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-12">
                <label for="modalFullName" class="form-label small fw-semibold text-navy">Full Name</label>
                <input type="text" class="form-control border-light-custom shadow-none" id="modalFullName" placeholder="e.g. Ruwan Jayawardena" required>
                <div class="invalid-feedback">Please enter full name.</div>
              </div>

              <div class="col-md-6">
                <label for="modalEmail" class="form-label small fw-semibold text-navy">Email Address</label>
                <input type="email" class="form-control border-light-custom shadow-none" id="modalEmail" placeholder="name@example.lk" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>

              <div class="col-md-6">
                <label for="modalPhone" class="form-label small fw-semibold text-navy">Phone Number</label>
                <input type="tel" class="form-control border-light-custom shadow-none" id="modalPhone" placeholder="0771234567" required>
                <div class="invalid-feedback">Please enter phone number.</div>
              </div>

              <div class="col-md-6">
                <label for="modalRole" class="form-label small fw-semibold text-navy">Account Role</label>
                <select class="form-select border-light-custom shadow-none" id="modalRole" required>
                  <option value="Renter" selected>Renter</option>
                  <option value="Owner">Owner / Landlord</option>
                  <option value="Admin">System Administrator</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="modalStatus" class="form-label small fw-semibold text-navy">Account Status</label>
                <select class="form-select border-light-custom shadow-none" id="modalStatus" required>
                  <option value="Active" selected>Active</option>
                  <option value="Suspended">Suspended</option>
                  <option value="Blocked">Blocked</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer border-top border-light-custom p-3">
          <button type="button" class="btn btn-light border fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary fw-bold" id="btnSaveUserModal">Save User Account</button>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW USER DETAILS MODAL -->
  <div class="modal fade" id="userViewModal" tabindex="-1" aria-labelledby="userViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-header border-bottom border-light-custom pb-3">
          <h5 class="modal-title fw-bold text-navy" id="userViewModalLabel">
            <i class="bi bi-person-lines-fill text-primary-custom me-2"></i>User Profile Overview
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <div class="d-flex align-items-center gap-3 p-3 bg-light-custom rounded-3 border border-light-custom mb-3">
            <div class="bg-navy text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px;" id="viewModalInitials">NP</div>
            <div>
              <h6 class="fw-bold text-navy mb-0" id="viewModalName">Nimal Perera</h6>
              <span class="badge bg-primary-subtle text-primary" id="viewModalRole">Owner</span>
              <span class="badge bg-success-subtle text-success ms-1" id="viewModalStatus">Active</span>
            </div>
          </div>

          <div class="row g-2 small text-secondary">
            <div class="col-6"><strong>Email:</strong> <span id="viewModalEmail">nimal.perera@example.lk</span></div>
            <div class="col-6"><strong>Phone:</strong> <span id="viewModalPhone">+94 77 987 6543</span></div>
            <div class="col-6 mt-2"><strong>Joined:</strong> <span id="viewModalJoined">Mar 15, 2025</span></div>
            <div class="col-6 mt-2"><strong>Active Properties:</strong> <span id="viewModalProps">6 Listings</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SUSPEND USER CONFIRMATION MODAL -->
  <div class="modal fade" id="suspendUserModal" tabindex="-1" aria-labelledby="suspendUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-warning mb-3">
            <i class="bi bi-pause-circle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="suspendUserModalLabel">Suspend Account?</h5>
          <p class="small text-muted mb-4" id="suspendUserModalText">Suspending will temporarily freeze this user's ability to login or manage properties.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning flex-fill fw-bold text-dark" id="btnConfirmSuspendUser">Suspend</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BLOCK USER CONFIRMATION MODAL -->
  <div class="modal fade" id="blockUserModal" tabindex="-1" aria-labelledby="blockUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg rounded-4 text-center p-3">
        <div class="modal-body p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-slash-circle-fill display-4"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="blockUserModalLabel">Block Account?</h5>
          <p class="small text-muted mb-4" id="blockUserModalText">Blocking will permanently revoke access and hide all active property listings submitted by this account.</p>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnConfirmBlockUser">Block User</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DANGEROUS DELETE USER CONFIRMATION MODAL -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4 p-3">
        <div class="modal-body text-center p-3">
          <div class="text-danger mb-3">
            <i class="bi bi-exclamation-triangle-fill display-3"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2" id="deleteUserModalLabel">Permanently Delete User?</h5>
          <p class="small text-muted mb-3" id="deleteUserModalText">Are you sure you want to delete this user? This action cannot be undone and will erase all profile data and messages.</p>
          
          <div class="alert alert-danger border-0 small p-2 mb-4">
            <i class="bi bi-shield-lock me-1"></i> Admin Security Action Required
          </div>

          <div class="d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-medium" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger flex-fill fw-bold" id="btnConfirmDeleteUser">Permanently Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/admin-users.js"></script>
</body>
</html>