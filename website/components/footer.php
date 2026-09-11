<?php
/**
 * Shared Website Footer Component
 * -----------------------------------
 * Usage: set $prefix before including this file, e.g.
 *   <?php $prefix = ''; include 'components/footer.php'; ?>
 *   <?php $prefix = '../'; include 'components/footer.php'; ?>
 *
 * $prefix: '' for pages at the website/ root, '../' for pages inside website/pages/
 * (owner/ links are resolved as $prefix . '../owner/...' so this works from both depths)
 */
if (!isset($prefix)) { $prefix = ''; }
$ownerPrefix = $prefix . '../owner/';
?>
  <!-- FOOTER -->
  <footer class="pt-5 pb-4 bg-navy text-white-50 mt-5">
    <div class="container">
      <div class="row g-4 mb-5">
        <!-- Brand Info -->
        <div class="col-lg-3 col-md-6">
          <a class="navbar-brand fw-bold fs-4 text-white d-block mb-3" href="<?php echo $prefix; ?>index.php">
            <i class="bi bi-house-door-fill text-success me-1"></i>Rent<span class="text-success">SriLanka</span>
          </a>
          <p class="small mb-3">Making rental property search easier, modern, and direct across Sri Lanka.</p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-sm btn-outline-light rounded-circle btn-social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-sm btn-outline-light rounded-circle btn-social" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="btn btn-sm btn-outline-light rounded-circle btn-social" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            <a href="#" class="btn btn-sm btn-outline-light rounded-circle btn-social" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-2 col-md-6">
          <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
          <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
            <li><a href="<?php echo $prefix; ?>index.php" class="text-white-50 text-decoration-none hover-white">Home</a></li>
            <li><a href="<?php echo $prefix; ?>properties.php" class="text-white-50 text-decoration-none hover-white">Properties</a></li>
            <li><a href="<?php echo $prefix; ?>map-search.php" class="text-white-50 text-decoration-none hover-white">Map Search</a></li>
            <li><a href="<?php echo $prefix; ?>pages/about.php" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
            <li><a href="<?php echo $prefix; ?>pages/contact.php" class="text-white-50 text-decoration-none hover-white">Contact</a></li>
          </ul>
        </div>

        <!-- For Renters -->
        <div class="col-lg-2 col-md-6">
          <h6 class="text-white fw-semibold mb-3">For Renters</h6>
          <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
            <li><a href="<?php echo $prefix; ?>properties.php" class="text-white-50 text-decoration-none hover-white">Search Properties</a></li>
            <li><a href="<?php echo $prefix; ?>favorites.php" class="text-white-50 text-decoration-none hover-white">Favorites</a></li>
            <li><a href="<?php echo $prefix; ?>messages.php" class="text-white-50 text-decoration-none hover-white">Messages</a></li>
            <li><a href="<?php echo $prefix; ?>pages/how-it-works.php" class="text-white-50 text-decoration-none hover-white">How It Works</a></li>
            <li><a href="<?php echo $prefix; ?>pages/faq.php" class="text-white-50 text-decoration-none hover-white">FAQ</a></li>
          </ul>
        </div>

        <!-- For Owners -->
        <div class="col-lg-2 col-md-6">
          <h6 class="text-white fw-semibold mb-3">For Owners</h6>
          <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
            <li><a href="<?php echo $ownerPrefix; ?>add-property.php" class="text-white-50 text-decoration-none hover-white">List Property</a></li>
            <li><a href="<?php echo $ownerPrefix; ?>dashboard.php" class="text-white-50 text-decoration-none hover-white">Owner Dashboard</a></li>
            <li><a href="<?php echo $ownerPrefix; ?>properties.php" class="text-white-50 text-decoration-none hover-white">My Properties</a></li>
            <li><a href="<?php echo $ownerPrefix; ?>inquiries.php" class="text-white-50 text-decoration-none hover-white">Inquiries</a></li>
          </ul>
        </div>

        <!-- Legal -->
        <div class="col-lg-3 col-md-6">
          <h6 class="text-white fw-semibold mb-3">Legal &amp; Support</h6>
          <ul class="list-unstyled small d-flex flex-column gap-2 mb-3">
            <li><a href="<?php echo $prefix; ?>pages/terms.php" class="text-white-50 text-decoration-none hover-white">Terms &amp; Conditions</a></li>
            <li><a href="<?php echo $prefix; ?>pages/privacy.php" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a></li>
          </ul>
          <p class="small text-white-50 mb-0"><i class="bi bi-envelope me-1"></i> support@rentsrilanka.lk</p>
        </div>
      </div>

      <hr class="border-secondary opacity-25 my-4">

      <div class="text-center small">
        <p class="mb-0">&copy; 2026 RentSriLanka. All rights reserved.</p>
      </div>
    </div>
  </footer>
