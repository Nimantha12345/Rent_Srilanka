<?php
/**
 * Shared Admin Footer Component
 * -------------------------------------------------------------------
 * Usage: <?php include 'components/footer.php'; ?>
 */
?>
<!-- FOOTER -->
<footer class="pt-5 pb-4 bg-navy text-white-50 mt-5">
  <div class="container-fluid px-lg-4">
    <div class="row g-4 mb-5">
      <div class="col-lg-3 col-md-6">
        <a class="navbar-brand fw-bold fs-4 text-white d-block mb-3" href="../index.php">
          <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span class="text-success">SriLanka</span>
        </a>
        <p class="small mb-3">Enterprise Administration &amp; Marketplace Management Portal.</p>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Admin Navigation</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="dashboard.php" class="text-white-50 text-decoration-none hover-white">Dashboard</a></li>
          <li><a href="properties.php" class="text-white-50 text-decoration-none hover-white">Properties</a></li>
          <li><a href="users.php" class="text-white-50 text-decoration-none hover-white">Users</a></li>
          <li><a href="reports.php" class="text-white-50 text-decoration-none hover-white">Reports</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">System Controls</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="categories.php" class="text-white-50 text-decoration-none hover-white">Categories</a></li>
          <li><a href="locations.php" class="text-white-50 text-decoration-none hover-white">Locations</a></li>
          <li><a href="messages.php" class="text-white-50 text-decoration-none hover-white">Messages</a></li>
          <li><a href="settings.php" class="text-white-50 text-decoration-none hover-white">Settings</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Public Portal</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="../index.php" class="text-white-50 text-decoration-none hover-white">Homepage</a></li>
          <li><a href="../properties.php" class="text-white-50 text-decoration-none hover-white">Browse Listings</a></li>
          <li><a href="../owner/dashboard.php" class="text-white-50 text-decoration-none hover-white">Owner Portal</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6">
        <h6 class="text-white fw-semibold mb-3">System Health</h6>
        <p class="small text-white-50 mb-1"><i class="bi bi-cpu me-1 text-success"></i> Server Load: 18% (Normal)</p>
        <p class="small text-white-50 mb-0"><i class="bi bi-database me-1 text-info"></i> DB Status: Connected (0.4ms)</p>
      </div>
    </div>

    <hr class="border-secondary opacity-25 my-4">

    <div class="text-center small">
      <p class="mb-0">&copy; <?php echo date('Y'); ?> RentSriLanka Enterprise Platform. All rights reserved.</p>
    </div>
  </div>
</footer>
