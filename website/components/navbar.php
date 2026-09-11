<?php
/**
 * Shared Website Navbar Component
 * -----------------------------------
 * Usage: set $activePage and $prefix before including this file, e.g.
 *   <?php $activePage = 'home'; $prefix = ''; include 'components/navbar.php'; ?>
 *   <?php $activePage = 'about'; $prefix = '../'; include 'components/navbar.php'; ?>
 *
 * $activePage: one of home, properties, map-search, about, contact (optional)
 * $prefix: '' for pages at the website/ root, '../' for pages inside website/pages/
 */
if (!isset($activePage)) { $activePage = ''; }
if (!isset($prefix)) { $prefix = ''; }
?>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4" href="<?php echo $prefix; ?>index.php">
        <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span>SriLanka</span>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item">
            <a class="nav-link fw-medium<?php echo ($activePage === 'home') ? ' active fw-semibold' : ''; ?>" <?php echo ($activePage === 'home') ? 'aria-current="page"' : ''; ?> href="<?php echo $prefix; ?>index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium<?php echo ($activePage === 'properties') ? ' active fw-semibold' : ''; ?>" <?php echo ($activePage === 'properties') ? 'aria-current="page"' : ''; ?> href="<?php echo $prefix; ?>properties.php">Properties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium<?php echo ($activePage === 'map-search') ? ' active fw-semibold' : ''; ?>" <?php echo ($activePage === 'map-search') ? 'aria-current="page"' : ''; ?> href="<?php echo $prefix; ?>map-search.php">Map Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium<?php echo ($activePage === 'about') ? ' active fw-semibold' : ''; ?>" <?php echo ($activePage === 'about') ? 'aria-current="page"' : ''; ?> href="<?php echo $prefix; ?>pages/about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium<?php echo ($activePage === 'contact') ? ' active fw-semibold' : ''; ?>" <?php echo ($activePage === 'contact') ? 'aria-current="page"' : ''; ?> href="<?php echo $prefix; ?>pages/contact.php">Contact</a>
          </li>
        </ul>

        <div class="d-flex align-items-center gap-2 flex-wrap">
          <a href="<?php echo $prefix; ?>favorites.php" class="btn btn-light position-relative border btn-icon me-1" aria-label="Favorites">
            <i class="bi bi-heart text-dark"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="nav-fav-count">3</span>
          </a>
          <a href="<?php echo $prefix; ?>login.php" class="btn btn-outline-primary fw-medium px-3">Login</a>
          <a href="<?php echo $prefix; ?>register.php" class="btn btn-outline-secondary fw-medium px-3">Sign Up</a>

          <!-- Profile Dropdown -->
          <div class="dropdown">
            <button class="btn btn-light border p-1 rounded-circle d-flex align-items-center justify-content-center shadow-none" type="button" id="navProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Account menu" style="width: 40px; height: 40px;">
              <i class="bi bi-person-fill fs-5 text-navy"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 mt-2" aria-labelledby="navProfileDropdown">
              <li>
                <a class="dropdown-item small d-flex justify-content-between align-items-center" href="<?php echo $prefix; ?>messages.php">
                  <span><i class="bi bi-chat-dots me-2"></i>Messages</span>
                  <span class="badge bg-success rounded-pill">2</span>
                </a>
              </li>
              <li><a class="dropdown-item small" href="<?php echo $prefix; ?>profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
              <li><a class="dropdown-item small" href="<?php echo $prefix; ?>settings.php"><i class="bi bi-gear me-2"></i>Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item small text-danger" href="<?php echo $prefix; ?>login.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
