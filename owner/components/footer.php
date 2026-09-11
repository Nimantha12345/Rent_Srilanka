<?php
/**
 * Shared Owner Portal Footer Component
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
        <p class="small mb-3">Making rental property search easier, modern, and direct across Sri Lanka.</p>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Owner Shortcuts</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="dashboard.php" class="text-white-50 text-decoration-none hover-white">Dashboard</a></li>
          <li><a href="properties.php" class="text-white-50 text-decoration-none hover-white">My Properties</a></li>
          <li><a href="add-property.php" class="text-white-50 text-decoration-none hover-white">Add Property</a></li>
          <li><a href="inquiries.php" class="text-white-50 text-decoration-none hover-white">Inquiries</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Renter Links</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="../properties.php" class="text-white-50 text-decoration-none hover-white">Properties</a></li>
          <li><a href="../map-search.php" class="text-white-50 text-decoration-none hover-white">Map Search</a></li>
          <li><a href="../favorites.php" class="text-white-50 text-decoration-none hover-white">Favorites</a></li>
          <li><a href="../messages.php" class="text-white-50 text-decoration-none hover-white">Messages</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Legal &amp; Support</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a href="../pages/terms.php" class="text-white-50 text-decoration-none hover-white">Terms &amp; Conditions</a></li>
          <li><a href="../pages/privacy.php" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6">
        <h6 class="text-white fw-semibold mb-3">Contact Support</h6>
        <p class="small text-white-50 mb-1"><i class="bi bi-envelope me-1"></i> support@rentsrilanka.lk</p>
        <p class="small text-white-50 mb-0"><i class="bi bi-telephone me-1"></i> +94 11 234 5678</p>
      </div>
    </div>

    <hr class="border-secondary opacity-25 my-4">

    <div class="text-center small">
      <p class="mb-0">&copy; <?php echo date('Y'); ?> RentSriLanka. All rights reserved.</p>
    </div>
  </div>
</footer>
