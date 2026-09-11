document.addEventListener('DOMContentLoaded', () => {
  const propertyContainer = document.getElementById('propertyContainer');
  const btnGridView = document.getElementById('btnGridView');
  const btnListView = document.getElementById('btnListView');
  const skeletonContainer = document.getElementById('skeletonContainer');
  const emptyState = document.getElementById('emptyState');
  const resultCount = document.getElementById('resultCount');
  const desktopFilterForm = document.getElementById('desktopFilterForm');
  const mobileFilterForm = document.getElementById('mobileFilterForm');
  const clearDesktopFilters = document.getElementById('clearDesktopFilters');
  const clearMobileFilters = document.getElementById('clearMobileFilters');
  const btnResetEmptyState = document.getElementById('btnResetEmptyState');

  // 1. Grid vs List View Switcher Logic
  if (btnGridView && btnListView && propertyContainer) {
    btnGridView.addEventListener('click', () => {
      btnGridView.classList.add('active');
      btnListView.classList.remove('active');
      propertyContainer.classList.remove('list-view-active');
    });

    btnListView.addEventListener('click', () => {
      btnListView.classList.add('active');
      btnGridView.classList.remove('active');
      propertyContainer.classList.add('list-view-active');
    });
  }

  // 2. Simulated Async Filter Execution with Skeleton
  const triggerFilterProcess = (isEmpty = false) => {
    // Show Skeleton State
    propertyContainer.classList.add('d-none');
    emptyState.classList.add('d-none');
    skeletonContainer.classList.remove('d-none');

    setTimeout(() => {
      skeletonContainer.classList.add('d-none');
      if (isEmpty) {
        emptyState.classList.remove('d-none');
        if (resultCount) resultCount.textContent = '0 Properties Found';
      } else {
        propertyContainer.classList.remove('d-none');
        if (resultCount) resultCount.textContent = '124 Properties Found';
      }
    }, 400); // 400ms loading effect
  };

  // 3. Form Submissions
  if (desktopFilterForm) {
    desktopFilterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      triggerFilterProcess(false);
    });
  }

  if (mobileFilterForm) {
    mobileFilterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      triggerFilterProcess(false);
    });
  }

  // 4. Clear Filters Interaction
  const resetFilters = () => {
    if (desktopFilterForm) desktopFilterForm.reset();
    if (mobileFilterForm) mobileFilterForm.reset();
    triggerFilterProcess(false);
  };

  if (clearDesktopFilters) clearDesktopFilters.addEventListener('click', resetFilters);
  if (clearMobileFilters) clearMobileFilters.addEventListener('click', resetFilters);
  if (btnResetEmptyState) btnResetEmptyState.addEventListener('click', resetFilters);
});

document.addEventListener('DOMContentLoaded', () => {
  const searchResultsContainer = document.getElementById('searchResultsContainer');
  const btnSearchGridView = document.getElementById('btnSearchGridView');
  const btnSearchListView = document.getElementById('btnSearchListView');
  const searchEmptyState = document.getElementById('searchEmptyState');
  const searchResultHeader = document.getElementById('searchResultHeader');
  const activeFilterChips = document.getElementById('activeFilterChips');
  const clearAllChips = document.getElementById('clearAllChips');
  const btnResetSearchEmpty = document.getElementById('btnResetSearchEmpty');
  const removeChipButtons = document.querySelectorAll('.remove-chip');

  // 1. Grid vs List View Switcher for Search Results
  if (btnSearchGridView && btnSearchListView && searchResultsContainer) {
    btnSearchGridView.addEventListener('click', () => {
      btnSearchGridView.classList.add('active');
      btnSearchListView.classList.remove('active');
      searchResultsContainer.classList.remove('list-view-active');
    });

    btnSearchListView.addEventListener('click', () => {
      btnSearchListView.classList.add('active');
      btnSearchGridView.classList.remove('active');
      searchResultsContainer.classList.add('list-view-active');
    });
  }

  // 2. Filter Chips Interactivity
  removeChipButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const chip = btn.closest('.badge');
      if (chip) {
        chip.remove();
      }

      // Check remaining chips
      const remainingChips = activeFilterChips ? activeFilterChips.querySelectorAll('.badge') : [];
      if (remainingChips.length === 0) {
        if (activeFilterChips) activeFilterChips.classList.add('d-none');
      }
    });
  });

  // 3. Clear All Filters Handler
  const resetSearchFilters = () => {
    if (activeFilterChips) activeFilterChips.classList.add('d-none');
    const desktopForm = document.getElementById('searchDesktopFilterForm');
    const mobileForm = document.getElementById('searchMobileFilterForm');
    if (desktopForm) desktopForm.reset();
    if (mobileForm) mobileForm.reset();

    // Show empty state for demonstration if all filters are cleared or trigger reload
    if (searchResultsContainer) searchResultsContainer.classList.remove('d-none');
    if (searchEmptyState) searchEmptyState.classList.add('d-none');
    if (searchResultHeader) searchResultHeader.textContent = '47 Houses for Rent in Kandy';
  };

  if (clearAllChips) clearAllChips.addEventListener('click', resetSearchFilters);
  if (btnResetSearchEmpty) btnResetSearchEmpty.addEventListener('click', resetSearchFilters);
});

document.addEventListener('DOMContentLoaded', () => {
  // Map Search Simulation Dataset
  const mockMapData = {
    'm25': { id: '101', title: 'Furnished 1-Bed Annex', price: 'Rs. 25,000/mo', location: 'Peradeniya Road, Kandy', badge: 'Annex', img: 'assets/images/properties/house-1.jpg' },
    'm35': { id: '102', title: 'Compact 2-Bed Garden House', price: 'Rs. 35,000/mo', location: 'Katugastota, Kandy', badge: 'House', img: 'assets/images/properties/house-2.jpg' },
    'm45': { id: '103', title: '2 Bedroom Modern House', price: 'Rs. 45,000/mo', location: 'Peradeniya, Kandy', badge: 'House', img: 'assets/images/properties/annex-1.jpg' },
    'm55': { id: '104', title: '2-Story Family House', price: 'Rs. 55,000/mo', location: 'Anniewatte, Kandy', badge: 'House', img: 'assets/images/properties/recent-2.jpg' }
  };

  const mapMarkers = document.querySelectorAll('.map-marker-pin');
  const mapPopupCard = document.getElementById('mapPopupCard');
  const closeMapPopup = document.getElementById('closeMapPopup');
  const listCards = document.querySelectorAll('.map-card-item');
  const btnMobileToggleList = document.getElementById('btnMobileToggleList');

  // 1. Click Marker -> Show Floating Preview Card & Highlight Left Card
  mapMarkers.forEach(marker => {
    marker.addEventListener('click', function(e) {
      e.stopPropagation();
      const markerId = this.id;
      const data = mockMapData[markerId];

      if (!data) return;

      // Update Active Marker Class
      mapMarkers.forEach(m => m.classList.remove('active-marker'));
      this.classList.add('active-marker');

      // Update Popup Content
      document.getElementById('popupImg').src = data.img;
      document.getElementById('popupBadge').textContent = data.badge;
      document.getElementById('popupPrice').textContent = data.price;
      document.getElementById('popupTitle').textContent = data.title;
      document.getElementById('popupLocation').innerHTML = `<i class="bi bi-geo-alt-fill text-danger me-1"></i>${data.location}`;
      document.getElementById('popupLink').href = `property-details.php?id=${data.id}`;

      // Position Popup near Marker
      const topPos = parseFloat(this.style.top);
      const leftPos = parseFloat(this.style.left);
      
      if (mapPopupCard) {
        mapPopupCard.style.top = `${Math.max(10, topPos - 25)}%`;
        mapPopupCard.style.left = `${Math.min(65, leftPos)}%`;
        mapPopupCard.classList.remove('d-none');
      }

      // Highlight Left List Card
      listCards.forEach(card => {
        if (card.getAttribute('data-marker') === markerId) {
          card.classList.add('active-map-card');
          card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
          card.classList.remove('active-map-card');
        }
      });
    });
  });

  // 2. Click Left List Card -> Activate Map Marker
  listCards.forEach(card => {
    card.addEventListener('click', function() {
      const targetMarkerId = this.getAttribute('data-marker');
      const targetMarker = document.getElementById(targetMarkerId);
      if (targetMarker) {
        targetMarker.click();
      }
    });
  });

  // 3. Close Popup Event
  if (closeMapPopup && mapPopupCard) {
    closeMapPopup.addEventListener('click', (e) => {
      e.stopPropagation();
      mapPopupCard.classList.add('d-none');
    });
  }

  // 4. Mobile Quick List Offcanvas Toggle
  if (btnMobileToggleList) {
    btnMobileToggleList.addEventListener('click', () => {
      const offcanvasEl = document.getElementById('mobileListOffcanvas');
      if (offcanvasEl) {
        const bsOffcanvas = new bootstrap.Offcanvas(offcanvasEl);
        bsOffcanvas.show();
      }
    });
  }

  // 5. "Search This Area" Button - Demo Re-Search Feedback
  const btnSearchArea = document.getElementById('btnSearchArea');
  const mapListCount = document.getElementById('mapListCount');
  if (btnSearchArea) {
    btnSearchArea.addEventListener('click', () => {
      const originalHtml = btnSearchArea.innerHTML;
      btnSearchArea.disabled = true;
      btnSearchArea.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Searching...';

      setTimeout(() => {
        btnSearchArea.disabled = false;
        btnSearchArea.innerHTML = originalHtml;
        if (mapListCount) {
          mapListCount.classList.add('text-primary-custom');
          setTimeout(() => mapListCount.classList.remove('text-primary-custom'), 600);
        }
      }, 800);
    });
  }
});