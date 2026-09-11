document.addEventListener('DOMContentLoaded', () => {
  // Global Tooltip initialization
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});

document.addEventListener('DOMContentLoaded', () => {
  // Favorite Button Toggle State
  const favoriteButtons = document.querySelectorAll('.btn-favorite');
  const favCountBadge = document.getElementById('nav-fav-count');
  let currentFavCount = favCountBadge ? parseInt(favCountBadge.textContent, 10) || 0 : 0;

  favoriteButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      
      const icon = button.querySelector('i');
      if (icon.classList.contains('bi-heart')) {
        icon.classList.remove('bi-heart');
        icon.classList.add('bi-heart-fill', 'text-danger');
        currentFavCount++;
      } else {
        icon.classList.remove('bi-heart-fill', 'text-danger');
        icon.classList.add('bi-heart');
        currentFavCount = Math.max(0, currentFavCount - 1);
      }

      if (favCountBadge) {
        favCountBadge.textContent = currentFavCount;
      }
    });
  });

  // Client-side Price Range Validation Safety Check
  const searchForm = document.getElementById('heroSearchForm');
  if (searchForm) {
    searchForm.addEventListener('submit', (e) => {
      const minPrice = parseInt(document.getElementById('minPrice').value, 10);
      const maxPrice = parseInt(document.getElementById('maxPrice').value, 10);

      if (minPrice && maxPrice && minPrice > maxPrice) {
        e.preventDefault();
        alert('Minimum price cannot be higher than Maximum price.');
      }
    });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  // 1. Gallery Image Switcher & Thumbnail Click Handlers
  const galleryMainImg = document.getElementById('galleryMainImg');
  const galleryThumbs = document.querySelectorAll('.gallery-thumb');
  const galleryCounter = document.getElementById('galleryCounter');

  if (galleryMainImg && galleryThumbs.length > 0) {
    galleryThumbs.forEach((thumb) => {
      thumb.addEventListener('click', function() {
        const fullSrc = this.getAttribute('data-full');
        const imgIndex = this.getAttribute('data-index');

        if (fullSrc) {
          galleryMainImg.src = fullSrc;
        }

        galleryThumbs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        if (galleryCounter && imgIndex) {
          galleryCounter.textContent = `${imgIndex} / 6 Photos`;
        }
      });
    });
  }

  // 2. Read More / Read Less Toggle Interaction
  const btnToggleDescription = document.getElementById('btnToggleDescription');
  const moreDescription = document.getElementById('moreDescription');

  if (btnToggleDescription && moreDescription) {
    moreDescription.addEventListener('show.bs.collapse', () => {
      btnToggleDescription.innerHTML = 'Read Less <i class="bi bi-chevron-up ms-1"></i>';
    });

    moreDescription.addEventListener('hide.bs.collapse', () => {
      btnToggleDescription.innerHTML = 'Read More <i class="bi bi-chevron-down ms-1"></i>';
    });
  }

  // 3. Demo Form Submissions with Toast/Alert feedback
  const ownerMessageForm = document.getElementById('ownerMessageForm');
  if (ownerMessageForm) {
    ownerMessageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Your message has been sent successfully to the owner! They will respond shortly.');
      const modalEl = document.getElementById('messageModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();
      ownerMessageForm.reset();
    });
  }

  const reportPropertyForm = document.getElementById('reportPropertyForm');
  if (reportPropertyForm) {
    reportPropertyForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Thank you for reporting. Our moderation team will investigate this listing immediately.');
      const modalEl = document.getElementById('reportModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();
      reportPropertyForm.reset();
    });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  // Mobile Offcanvas Close on Nav Link Click
  const ownerSidebarOffcanvas = document.getElementById('ownerSidebarOffcanvas');
  if (ownerSidebarOffcanvas) {
    const navLinks = ownerSidebarOffcanvas.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        const bsOffcanvas = bootstrap.Offcanvas.getInstance(ownerSidebarOffcanvas);
        if (bsOffcanvas) {
          bsOffcanvas.hide();
        }
      });
    });
  }

  // Interactive Bar Chart Tooltips / Animation Trigger
  const chartBars = document.querySelectorAll('.css-chart-bar-container .bar-fill');
  chartBars.forEach(bar => {
    bar.addEventListener('mouseenter', function() {
      this.classList.add('shadow-sm');
    });
    bar.addEventListener('mouseleave', function() {
      this.classList.remove('shadow-sm');
    });
  });
});