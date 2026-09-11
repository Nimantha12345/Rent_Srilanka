<?php
/**
 * Shared Owner Top Navbar Component
 * -----------------------------------
 * Usage: set $activePage before including this file, e.g.
 *   <?php $activePage = 'dashboard'; include 'components/navbar.php'; ?>
 * $activePage is optional - only used to highlight the Messages icon
 * when the current page is messages.php.
 */
if (!isset($activePage)) {
  $activePage = '';
}
?>
  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top border-bottom border-light-custom bg-white">
    <div class="container-fluid px-lg-4">
      <div class="d-flex align-items-center gap-2">
        <!-- Mobile Sidebar Offcanvas Toggle Button -->
        <button class="btn btn-light border btn-sm d-lg-none me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#ownerSidebarOffcanvas" aria-controls="ownerSidebarOffcanvas" aria-label="Toggle owner menu">
          <i class="bi bi-list fs-5"></i>
        </button>
        <a class="navbar-brand fw-bold fs-4" href="../index.php">
          <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span>SriLanka</span>
        </a>
        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill ms-2 d-none d-sm-inline-block small fw-semibold">Owner Portal</span>
      </div>

      <div class="d-flex align-items-center gap-3">
        <a href="../notifications.php" class="btn btn-light position-relative border btn-icon" aria-label="Notifications">
          <i class="bi bi-bell text-dark"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="nav-notif-count">4</span>
        </a>
        <a href="messages.php" class="btn btn-light position-relative border btn-icon<?php echo ($activePage === 'messages') ? ' active' : ''; ?>" aria-label="Messages">
          <i class="bi bi-chat-dots text-dark"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" id="nav-msg-count">3</span>
        </a>

        <div class="vr mx-1 d-none d-sm-block"></div>

        <!-- User Profile Dropdown -->
        <div class="dropdown">
          <button class="btn btn-light border p-1 rounded-pill d-flex align-items-center gap-2 shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover" width="32" height="32" alt="Nimal Perera">
            <span class="fw-semibold text-navy small d-none d-md-inline pe-1">Nimal 👋</span>
            <i class="bi bi-chevron-down text-muted small pe-2 d-none d-md-inline"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3">
            <li><a class="dropdown-item small" href="profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
            <li><a class="dropdown-item small" href="settings.php"><i class="bi bi-gear me-2"></i>Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item small text-danger" href="../login.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
