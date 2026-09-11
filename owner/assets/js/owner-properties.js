document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('ownerPropertySearch');
  const typeFilter = document.getElementById('ownerTypeFilter');
  const sortBySelect = document.getElementById('ownerSortBy');
  const statusTabs = document.querySelectorAll('#propertyStatusTabs button');

  const tableBody = document.getElementById('ownerTableBody');
  const mobileContainer = document.getElementById('ownerMobileCardsContainer');

  // Modal Elements
  const deleteModalEl = document.getElementById('deletePropModal');
  const deleteModalText = document.getElementById('deletePropModalText');
  const btnConfirmDeleteProp = document.getElementById('btnConfirmDeleteProp');
  let bsDeleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;

  let targetItemToDelete = null;

  // Filter & Search Master Function
  function filterAndSortProperties() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const typeVal = typeFilter ? typeFilter.value : 'all';
    const activeTab = document.querySelector('#propertyStatusTabs button.active');
    const statusVal = activeTab ? activeTab.getAttribute('data-status') : 'all';

    const tableRows = Array.from(document.querySelectorAll('.owner-prop-item'));
    const mobileCards = Array.from(document.querySelectorAll('.owner-prop-card'));

    // Filter Table Rows
    tableRows.forEach(row => {
      const title = (row.getAttribute('data-title') || '').toLowerCase();
      const location = (row.getAttribute('data-location') || '').toLowerCase();
      const pType = row.getAttribute('data-type');
      const pStatus = row.getAttribute('data-status');

      const matchesSearch = title.includes(searchVal) || location.includes(searchVal);
      const matchesType = (typeVal === 'all' || pType === typeVal);
      const matchesStatus = (statusVal === 'all' || pStatus === statusVal);

      if (matchesSearch && matchesType && matchesStatus) {
        row.classList.remove('d-none');
      } else {
        row.classList.add('d-none');
      }
    });

    // Filter Mobile Cards
    mobileCards.forEach(card => {
      const title = (card.getAttribute('data-title') || '').toLowerCase();
      const location = (card.getAttribute('data-location') || '').toLowerCase();
      const pType = card.getAttribute('data-type');
      const pStatus = card.getAttribute('data-status');

      const matchesSearch = title.includes(searchVal) || location.includes(searchVal);
      const matchesType = (typeVal === 'all' || pType === typeVal);
      const matchesStatus = (statusVal === 'all' || pStatus === statusVal);

      if (matchesSearch && matchesType && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });

    // Sort Table Rows
    if (sortBySelect && tableBody) {
      const sortVal = sortBySelect.value;
      const visibleRows = tableRows.filter(r => !r.classList.contains('d-none'));

      visibleRows.sort((a, b) => {
        if (sortVal === 'newest') {
          return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
        } else if (sortVal === 'views_high') {
          return parseInt(b.getAttribute('data-views') || 0) - parseInt(a.getAttribute('data-views') || 0);
        } else if (sortVal === 'inquiries_high') {
          return parseInt(b.getAttribute('data-inquiries') || 0) - parseInt(a.getAttribute('data-inquiries') || 0);
        } else if (sortVal === 'price_high') {
          return parseInt(b.getAttribute('data-price') || 0) - parseInt(a.getAttribute('data-price') || 0);
        }
        return 0;
      });

      visibleRows.forEach(row => tableBody.appendChild(row));
    }
  }

  // Event Listeners for Filters & Search
  if (searchInput) searchInput.addEventListener('input', filterAndSortProperties);
  if (typeFilter) typeFilter.addEventListener('change', filterAndSortProperties);
  if (sortBySelect) sortBySelect.addEventListener('change', filterAndSortProperties);

  statusTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      setTimeout(filterAndSortProperties, 50);
    });
  });

  // Delete Confirmation Trigger
  document.addEventListener('click', (e) => {
    const deleteBtn = e.target.closest('.btn-delete-prop');
    if (deleteBtn) {
      e.preventDefault();
      const pId = deleteBtn.getAttribute('data-id');
      const pTitle = deleteBtn.getAttribute('data-title');
      
      targetItemToDelete = pId;

      if (deleteModalText) {
        deleteModalText.textContent = `Are you sure you want to permanently delete "${pTitle}"?`;
      }

      if (bsDeleteModal) {
        bsDeleteModal.show();
      }
    }

    // Toggle Deactivate Action
    const deactivateBtn = e.target.closest('.btn-toggle-deactivate');
    if (deactivateBtn) {
      e.preventDefault();
      const pId = deactivateBtn.getAttribute('data-id');
      alert(`Property ID RSL-${pId} status has been updated.`);
    }
  });

  // Confirm Delete Action
  if (btnConfirmDeleteProp) {
    btnConfirmDeleteProp.addEventListener('click', () => {
      if (targetItemToDelete) {
        const itemsToRemove = document.querySelectorAll(`[data-id="${targetItemToDelete}"]`);
        itemsToRemove.forEach(btn => {
          const row = btn.closest('.owner-prop-item');
          const card = btn.closest('.owner-prop-card');
          if (row) row.remove();
          if (card) card.remove();
        });
        targetItemToDelete = null;
      }
      if (bsDeleteModal) {
        bsDeleteModal.hide();
      }
    });
  }
});