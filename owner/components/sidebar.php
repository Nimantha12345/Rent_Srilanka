<?php
/**
 * Shared Owner Sidebar Component (desktop aside + mobile offcanvas)
 * -------------------------------------------------------------------
 * Usage: set $activePage before including this file, e.g.
 *   <?php $activePage = 'dashboard'; include 'components/sidebar.php'; ?>
 * Valid values: dashboard, properties, add-property, inquiries,
 *               messages, profile, settings
 */
if (!isset($activePage)) {
  $activePage = '';
}

// Sidebar nav items: page key => base bootstrap-icon name (without -fill)
$ownerNavIcons = [
  'dashboard'    => 'bi-grid-1x2',
  'properties'   => 'bi-houses',
  'add-property' => 'bi-plus-circle',
  'inquiries'    => 'bi-envelope-open',
  'messages'     => 'bi-chat-dots',
  'profile'      => 'bi-person',
  'settings'     => 'bi-gear',
];

function owner_nav_class($page, $activePage, $extra = '') {
  if ($page === $activePage) {
    $classes = 'nav-link active rounded-3 fw-medium py-2 px-3';
  } else {
    $classes = 'nav-link rounded-3 fw-medium py-2 px-3 text-navy hover-bg';
  }
  if ($extra !== '') {
    $classes .= ' ' . $extra;
  }
  return $classes;
}

// Icon is shown "filled" only for the active page, outline otherwise
function owner_nav_icon($page, $activePage, $baseIcon) {
  return ($page === $activePage) ? $baseIcon . '-fill' : $baseIcon;
}
?>
      <!-- DESKTOP OWNER SIDEBAR -->
      <aside class="col-lg-3 col-xl-2 d-none d-lg-block">
        <div class="card border-0 shadow-soft rounded-4 p-3 bg-white sticky-top" style="top: 80px;">
          <div class="px-3 py-2 mb-2 text-center text-lg-start border-bottom border-light-custom pb-3">
            <h6 class="fw-bold text-navy mb-0">Nimal Perera</h6>
            <span class="small text-muted"><i class="bi bi-patch-check-fill text-success me-1"></i>Verified Landlord</span>
          </div>

          <nav class="nav flex-column nav-pills owner-sidebar-nav gap-1">
            <a class="<?php echo owner_nav_class('dashboard', $activePage); ?>" href="dashboard.php">
              <i class="bi <?php echo owner_nav_icon('dashboard', $activePage, $ownerNavIcons['dashboard']); ?> me-2"></i>Dashboard
            </a>
            <a class="<?php echo owner_nav_class('properties', $activePage); ?>" href="properties.php">
              <i class="bi <?php echo owner_nav_icon('properties', $activePage, $ownerNavIcons['properties']); ?> me-2"></i>My Properties
            </a>
            <a class="<?php echo owner_nav_class('add-property', $activePage); ?>" href="add-property.php">
              <i class="bi <?php echo owner_nav_icon('add-property', $activePage, $ownerNavIcons['add-property']); ?> me-2"></i>Add Property
            </a>
            <a class="<?php echo owner_nav_class('inquiries', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="inquiries.php">
              <span><i class="bi <?php echo owner_nav_icon('inquiries', $activePage, $ownerNavIcons['inquiries']); ?> me-2"></i>Inquiries</span>
              <span class="badge bg-danger rounded-pill">5</span>
            </a>
            <a class="<?php echo owner_nav_class('messages', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="messages.php">
              <span><i class="bi <?php echo owner_nav_icon('messages', $activePage, $ownerNavIcons['messages']); ?> me-2"></i>Messages</span>
              <span class="badge bg-success rounded-pill">3</span>
            </a>
            <a class="<?php echo owner_nav_class('profile', $activePage); ?>" href="profile.php">
              <i class="bi <?php echo owner_nav_icon('profile', $activePage, $ownerNavIcons['profile']); ?> me-2"></i>Profile
            </a>
            <a class="<?php echo owner_nav_class('settings', $activePage); ?>" href="settings.php">
              <i class="bi <?php echo owner_nav_icon('settings', $activePage, $ownerNavIcons['settings']); ?> me-2"></i>Settings
            </a>
            <hr class="my-2 border-light-custom">
            <a class="nav-link rounded-3 fw-medium py-2 px-3 text-danger hover-bg" href="../login.php">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
          </nav>
        </div>
      </aside>

      <!-- MOBILE RESPONSIVE SIDEBAR OFFCANVAS -->
      <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="ownerSidebarOffcanvas" aria-labelledby="ownerSidebarOffcanvasLabel">
        <div class="offcanvas-header border-bottom border-light-custom">
          <h5 class="offcanvas-title fw-bold text-navy" id="ownerSidebarOffcanvasLabel">
            <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span>SriLanka</span>
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-3">
          <div class="p-3 mb-3 bg-light-custom rounded-3 border border-light-custom d-flex align-items-center gap-3">
            <img src="../assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover" width="42" height="42" alt="Owner Profile">
            <div>
              <h6 class="fw-bold text-navy mb-0">Nimal Perera</h6>
              <span class="small text-muted"><i class="bi bi-patch-check-fill text-success me-1"></i>Verified Landlord</span>
            </div>
          </div>

          <nav class="nav flex-column nav-pills owner-sidebar-nav gap-1">
            <a class="<?php echo owner_nav_class('dashboard', $activePage); ?>" href="dashboard.php">
              <i class="bi <?php echo owner_nav_icon('dashboard', $activePage, $ownerNavIcons['dashboard']); ?> me-2"></i>Dashboard
            </a>
            <a class="<?php echo owner_nav_class('properties', $activePage); ?>" href="properties.php">
              <i class="bi <?php echo owner_nav_icon('properties', $activePage, $ownerNavIcons['properties']); ?> me-2"></i>My Properties
            </a>
            <a class="<?php echo owner_nav_class('add-property', $activePage); ?>" href="add-property.php">
              <i class="bi <?php echo owner_nav_icon('add-property', $activePage, $ownerNavIcons['add-property']); ?> me-2"></i>Add Property
            </a>
            <a class="<?php echo owner_nav_class('inquiries', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="inquiries.php">
              <span><i class="bi <?php echo owner_nav_icon('inquiries', $activePage, $ownerNavIcons['inquiries']); ?> me-2"></i>Inquiries</span>
              <span class="badge bg-danger rounded-pill">5</span>
            </a>
            <a class="<?php echo owner_nav_class('messages', $activePage, 'd-flex justify-content-between align-items-center'); ?>" href="messages.php">
              <span><i class="bi <?php echo owner_nav_icon('messages', $activePage, $ownerNavIcons['messages']); ?> me-2"></i>Messages</span>
              <span class="badge bg-success rounded-pill">3</span>
            </a>
            <a class="<?php echo owner_nav_class('profile', $activePage); ?>" href="profile.php">
              <i class="bi <?php echo owner_nav_icon('profile', $activePage, $ownerNavIcons['profile']); ?> me-2"></i>Profile
            </a>
            <a class="<?php echo owner_nav_class('settings', $activePage); ?>" href="settings.php">
              <i class="bi <?php echo owner_nav_icon('settings', $activePage, $ownerNavIcons['settings']); ?> me-2"></i>Settings
            </a>
            <hr class="my-2 border-light-custom">
            <a class="nav-link rounded-3 fw-medium py-2 px-3 text-danger" href="../login.php">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
          </nav>
        </div>
      </div>
