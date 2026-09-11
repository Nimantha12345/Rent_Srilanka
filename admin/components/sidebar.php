<?php
/**
 * Shared Admin Sidebar Component (desktop aside + mobile offcanvas)
 * -------------------------------------------------------------------
 * Usage: set $activePage before including this file, e.g.
 *   <?php $activePage = 'dashboard'; include 'components/sidebar.php'; ?>
 * Valid values: dashboard, properties, users, reports, messages,
 *               categories, locations, settings
 */
if (!isset($activePage)) {
  $activePage = '';
}

function admin_nav_class($page, $activePage, $extra = '') {
  $classes = 'nav-link rounded-3 fw-medium py-2 px-3';
  if ($extra !== '') {
    $classes .= ' ' . $extra;
  }
  if ($page === $activePage) {
    $classes = 'nav-link active rounded-3 fw-medium py-2 px-3';
    if ($extra !== '') {
      $classes .= ' ' . $extra;
    }
  } else {
    $classes .= ' text-navy hover-bg';
  }
  return $classes;
}
?>
      <!-- DESKTOP ADMIN SIDEBAR -->
      <aside class="col-lg-3 col-xl-2 d-none d-lg-block">
        <div class="card border-0 shadow-soft rounded-4 p-3 bg-white sticky-top" style="top: 80px;">
          <div class="px-3 py-2 mb-2 text-center text-lg-start border-bottom border-light-custom pb-3">
            <h6 class="fw-bold text-navy mb-0">System Control</h6>
            <span class="small text-muted"><i class="bi bi-shield-lock-fill text-danger me-1"></i>Administrator</span>
          </div>

          <nav class="nav flex-column nav-pills owner-sidebar-nav gap-1">
            <a class="<?php echo admin_nav_class('dashboard', $activePage); ?>" href="dashboard.php">
              <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
            <a class="<?php echo admin_nav_class('properties', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="properties.php">
              <span><i class="bi bi-houses me-2"></i>Properties</span>
              <span class="badge bg-warning text-dark rounded-pill">10</span>
            </a>
            <a class="<?php echo admin_nav_class('users', $activePage); ?>" href="users.php">
              <i class="bi bi-people me-2"></i>Users
            </a>
            <a class="<?php echo admin_nav_class('categories', $activePage); ?>" href="categories.php">
              <i class="bi bi-tags me-2"></i>Categories
            </a>
            <a class="<?php echo admin_nav_class('locations', $activePage); ?>" href="locations.php">
              <i class="bi bi-geo-alt me-2"></i>Locations
            </a>
            <a class="<?php echo admin_nav_class('messages', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="messages.php">
              <span><i class="bi bi-chat-dots me-2"></i>Messages</span>
              <span class="badge bg-success rounded-pill">5</span>
            </a>
            <a class="<?php echo admin_nav_class('reports', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="reports.php">
              <span><i class="bi bi-flag me-2"></i>Reports</span>
              <span class="badge bg-danger rounded-pill">3</span>
            </a>
            <a class="<?php echo admin_nav_class('settings', $activePage); ?>" href="settings.php">
              <i class="bi bi-gear me-2"></i>Settings
            </a>
            <hr class="my-2 border-light-custom">
            <a class="nav-link rounded-3 fw-medium py-2 px-3 text-danger hover-bg" href="../login.php">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
          </nav>
        </div>
      </aside>

      <!-- MOBILE RESPONSIVE SIDEBAR OFFCANVAS -->
      <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="adminSidebarOffcanvas" aria-labelledby="adminSidebarOffcanvasLabel">
        <div class="offcanvas-header border-bottom border-light-custom">
          <h5 class="offcanvas-title fw-bold text-navy" id="adminSidebarOffcanvasLabel">
            <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span>SriLanka</span>
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-3">
          <div class="p-3 mb-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-center gap-3">
            <div class="bg-navy text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 42px; height: 42px;">SA</div>
            <div>
              <h6 class="fw-bold text-navy mb-0">Super Admin</h6>
              <span class="small text-muted"><i class="bi bi-shield-lock-fill text-danger me-1"></i>System Administrator</span>
            </div>
          </div>

          <nav class="nav flex-column nav-pills owner-sidebar-nav gap-1">
            <a class="<?php echo admin_nav_class('dashboard', $activePage); ?>" href="dashboard.php">
              <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
            <a class="<?php echo admin_nav_class('properties', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="properties.php">
              <span><i class="bi bi-houses me-2"></i>Properties</span>
              <span class="badge bg-warning text-dark rounded-pill">10</span>
            </a>
            <a class="<?php echo admin_nav_class('users', $activePage); ?>" href="users.php">
              <i class="bi bi-people me-2"></i>Users
            </a>
            <a class="<?php echo admin_nav_class('reports', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="reports.php">
              <span><i class="bi bi-flag me-2"></i>Reports</span>
              <span class="badge bg-danger rounded-pill">3</span>
            </a>
            <a class="<?php echo admin_nav_class('messages', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="messages.php">
              <span><i class="bi bi-chat-dots me-2"></i>Messages</span>
              <span class="badge bg-success rounded-pill">5</span>
            </a>
            <a class="<?php echo admin_nav_class('categories', $activePage); ?>" href="categories.php">
              <i class="bi bi-tags me-2"></i>Categories
            </a>
            <a class="<?php echo admin_nav_class('locations', $activePage); ?>" href="locations.php">
              <i class="bi bi-geo-alt me-2"></i>Locations
            </a>
            <a class="<?php echo admin_nav_class('settings', $activePage); ?>" href="settings.php">
              <i class="bi bi-gear me-2"></i>Settings
            </a>
            <hr class="my-2 border-light-custom">
            <a class="nav-link rounded-3 fw-medium py-2 px-3 text-danger" href="../login.php">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
          </nav>
        </div>
      </div>
