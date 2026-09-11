document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const searchInput = document.getElementById('categorySearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const filterStatus = document.getElementById('filterStatus');
  const filterCount = document.getElementById('filterCount');
  const btnResetFilters = document.getElementById('btnResetFilters');
  const btnResetEmptySearch = document.getElementById('btnResetEmptySearch');
  const emptyCategoryState = document.getElementById('emptyCategoryState');
  const categoryCardsGrid = document.getElementById('categoryCardsGrid');
  const categoryCols = document.querySelectorAll('.category-card-col');

  // Modal Elements
  const catFormModalEl = document.getElementById('categoryFormModal');
  const catPropModalEl = document.getElementById('categoryPropertiesModal');
  const catDetailsModalEl = document.getElementById('categoryDetailsModal');
  const cannotDeleteModalEl = document.getElementById('cannotDeleteModal');
  const confirmDeleteModalEl = document.getElementById('confirmDeleteModal');

  let bsFormModal = catFormModalEl ? new bootstrap.Modal(catFormModalEl) : null;
  let bsPropModal = catPropModalEl ? new bootstrap.Modal(catPropModalEl) : null;
  let bsDetailsModal = catDetailsModalEl ? new bootstrap.Modal(catDetailsModalEl) : null;
  let bsCannotDeleteModal = cannotDeleteModalEl ? new bootstrap.Modal(cannotDeleteModalEl) : null;
  let bsConfirmDeleteModal = confirmDeleteModalEl ? new bootstrap.Modal(confirmDeleteModalEl) : null;

  // Form Inputs
  const catForm = document.getElementById('categoryForm');
  const catNameInput = document.getElementById('catNameInput');
  const catSlugInput = document.getElementById('catSlugInput');
  const catDescInput = document.getElementById('catDescInput');
  const catIconInput = document.getElementById('catIconInput');
  const catStatusSelect = document.getElementById('catStatusSelect');
  const iconPreviewSpan = document.getElementById('iconPreviewSpan');
  const btnSaveCategory = document.getElementById('btnSaveCategory');

  let activeCardColToDelete = null;
  let activeTargetCatName = '';

  // 1. Automatic Slug Generation from Category Name
  if (catNameInput && catSlugInput) {
    catNameInput.addEventListener('input', () => {
      const nameVal = catNameInput.value.trim();
      catSlugInput.value = generateSlug(nameVal);
    });
  }

  function generateSlug(text) {
    return text
      .toLowerCase()
      .replace(/[^\w\s-]/g, '') // remove invalid chars
      .replace(/\s+/g, '-')     // replace spaces with -
      .replace(/--+/g, '-');    // replace multiple - with single -
  }

  // Icon Preview Live Sync
  if (catIconInput && iconPreviewSpan) {
    catIconInput.addEventListener('input', () => {
      const iconClass = catIconInput.value.trim() || 'bi-tag';
      iconPreviewSpan.innerHTML = `<i class="bi ${iconClass}"></i>`;
    });
  }

  // 2. Open Add Category Modal
  const btnOpenAdd = document.getElementById('btnOpenAddCategoryModal');
  const btnEmptyAdd = document.getElementById('btnEmptyAddCategory');

  function openAddModal() {
    document.getElementById('categoryFormModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Category`;
    if (catForm) catForm.reset();
    if (catSlugInput) catSlugInput.value = '';
    if (iconPreviewSpan) iconPreviewSpan.innerHTML = `<i class="bi bi-house-door"></i>`;
    if (bsFormModal) bsFormModal.show();
  }

  if (btnOpenAdd) btnOpenAdd.addEventListener('click', openAddModal);
  if (btnEmptyAdd) btnEmptyAdd.addEventListener('click', openAddModal);

  // 3. Filter & Search Logic
  function applyCategoryFilters() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const statusVal = filterStatus ? filterStatus.value : 'all';
    const countVal = filterCount ? filterCount.value : 'all';

    let visibleCount = 0;

    categoryCols.forEach(col => {
      const name = (col.getAttribute('data-category-name') || '').toLowerCase();
      const slug = (col.getAttribute('data-slug') || '').toLowerCase();
      const desc = (col.getAttribute('data-description') || '').toLowerCase();
      const status = col.getAttribute('data-status');
      const count = parseInt(col.getAttribute('data-property-count') || '0', 10);

      const matchesSearch = !searchVal || name.includes(searchVal) || slug.includes(searchVal) || desc.includes(searchVal);
      const matchesStatus = (statusVal === 'all') || (status === statusVal);
      const matchesCount = (countVal === 'all') || (countVal === 'with' && count > 0) || (countVal === 'without' && count === 0);

      if (matchesSearch && matchesStatus && matchesCount) {
        col.classList.remove('d-none');
        visibleCount++;
      } else {
        col.classList.add('d-none');
      }
    });

    if (emptyCategoryState) {
      if (visibleCount === 0) {
        emptyCategoryState.classList.remove('d-none');
      } else {
        emptyCategoryState.classList.add('d-none');
      }
    }
  }

  if (searchInput) searchInput.addEventListener('input', applyCategoryFilters);
  if (filterStatus) filterStatus.addEventListener('change', applyCategoryFilters);
  if (filterCount) filterCount.addEventListener('change', applyCategoryFilters);

  if (btnClearSearch) {
    btnClearSearch.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      applyCategoryFilters();
    });
  }

  if (btnResetFilters) btnResetFilters.addEventListener('click', resetAllCategoryFilters);
  if (btnResetEmptySearch) btnResetEmptySearch.addEventListener('click', resetAllCategoryFilters);

  function resetAllCategoryFilters() {
    if (searchInput) searchInput.value = '';
    if (filterStatus) filterStatus.value = 'all';
    if (filterCount) filterCount.value = 'all';
    applyCategoryFilters();
  }

  // 4. Action Event Delegation (Edit, Delete, View Properties, View Details, Toggle Status)
  document.addEventListener('click', (e) => {

    // View Properties Button
    const viewPropBtn = e.target.closest('.btn-view-category-properties');
    if (viewPropBtn) {
      e.preventDefault();
      const catName = viewPropBtn.getAttribute('data-category-name');
      const count = viewPropBtn.getAttribute('data-count');
      openCategoryPropertiesModal(catName, count);
    }

    // Edit Category Button
    const editBtn = e.target.closest('.btn-edit-category');
    if (editBtn) {
      e.preventDefault();
      const col = editBtn.closest('.category-card-col');
      if (col) openEditModal(col);
    }

    // Details Modal Button
    const detailsBtn = e.target.closest('.btn-view-details');
    if (detailsBtn) {
      e.preventDefault();
      const col = detailsBtn.closest('.category-card-col');
      if (col) openDetailsModal(col);
    }

    // Toggle Status Button
    const toggleBtn = e.target.closest('.btn-toggle-status');
    if (toggleBtn) {
      e.preventDefault();
      const col = toggleBtn.closest('.category-card-col');
      if (col) {
        const currentStatus = col.getAttribute('data-status');
        const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
        col.setAttribute('data-status', newStatus);

        const badge = col.querySelector('.badge.bg-success, .badge.bg-secondary');
        if (badge) {
          badge.className = `badge ${newStatus === 'Active' ? 'bg-success' : 'bg-secondary'} text-white position-absolute top-0 end-0 m-3 shadow-xs`;
          badge.textContent = newStatus;
        }
        alert(`Category status updated to ${newStatus}`);
        applyCategoryFilters();
      }
    }

    // Delete Category Button
    const deleteBtn = e.target.closest('.btn-delete-category');
    if (deleteBtn) {
      e.preventDefault();
      const catName = deleteBtn.getAttribute('data-category-name');
      const count = parseInt(deleteBtn.getAttribute('data-count') || '0', 10);
      activeCardColToDelete = deleteBtn.closest('.category-card-col');
      activeTargetCatName = catName;

      if (count > 0) {
        // Show Cannot Delete Warning Modal
        const cannotTitle = document.getElementById('cannotDeleteTitle');
        const cannotMsg = document.getElementById('cannotDeleteMessage');
        const cannotCount = document.getElementById('cannotDeleteCount');
        if (cannotTitle) cannotTitle.textContent = `Cannot Delete "${catName}"`;
        if (cannotCount) cannotCount.textContent = count;
        if (bsCannotDeleteModal) bsCannotDeleteModal.show();
      } else {
        // Show Confirm Delete Modal for 0 property categories
        const confirmTitle = document.getElementById('confirmDeleteTitle');
        const confirmText = document.getElementById('confirmDeleteText');
        if (confirmTitle) confirmTitle.textContent = `Delete "${catName}"?`;
        if (confirmText) confirmText.textContent = `Are you sure you want to permanently delete the "${catName}" category?`;
        if (bsConfirmDeleteModal) bsConfirmDeleteModal.show();
      }
    }
  });

  // 5. Modal Helpers
  function openCategoryPropertiesModal(catName, count) {
    const title = document.getElementById('catPropModalTitle');
    const subtitle = document.getElementById('catPropModalSubtitle');
    if (title) title.textContent = `Properties in Category: ${catName}`;
    if (subtitle) subtitle.textContent = `Total Assigned Properties: ${count}`;
    if (bsPropModal) bsPropModal.show();
  }

  function openEditModal(col) {
    const name = col.getAttribute('data-category-name');
    const slug = col.getAttribute('data-slug');
    const desc = col.getAttribute('data-description');
    const icon = col.getAttribute('data-icon');
    const status = col.getAttribute('data-status');

    document.getElementById('categoryFormModalLabel').innerHTML = `<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit Category: ${name}`;
    if (catNameInput) catNameInput.value = name;
    if (catSlugInput) catSlugInput.value = slug;
    if (catDescInput) catDescInput.value = desc;
    if (catIconInput) catIconInput.value = icon;
    if (catStatusSelect) catStatusSelect.value = status;
    if (iconPreviewSpan) iconPreviewSpan.innerHTML = `<i class="bi ${icon}"></i>`;

    if (bsFormModal) bsFormModal.show();
  }

  function openDetailsModal(col) {
    document.getElementById('cdId').textContent = col.getAttribute('data-category-id');
    document.getElementById('cdName').textContent = col.getAttribute('data-category-name');
    document.getElementById('cdSlug').textContent = col.getAttribute('data-slug');
    document.getElementById('cdDesc').textContent = col.getAttribute('data-description');
    document.getElementById('cdCount').textContent = `${col.getAttribute('data-property-count')} Properties`;
    document.getElementById('cdStatus').textContent = col.getAttribute('data-status');
    document.getElementById('cdCreated').textContent = col.getAttribute('data-created-date');
    document.getElementById('cdUpdated').textContent = col.getAttribute('data-updated-date');

    if (bsDetailsModal) bsDetailsModal.show();
  }

  // 6. Action Modal Button Listeners
  const btnCannotDeleteViewProperties = document.getElementById('btnCannotDeleteViewProperties');
  if (btnCannotDeleteViewProperties) {
    btnCannotDeleteViewProperties.addEventListener('click', () => {
      if (bsCannotDeleteModal) bsCannotDeleteModal.hide();
      openCategoryPropertiesModal(activeTargetCatName, 125);
    });
  }

  const btnExecuteDeleteCategory = document.getElementById('btnExecuteDeleteCategory');
  if (btnExecuteDeleteCategory) {
    btnExecuteDeleteCategory.addEventListener('click', () => {
      if (activeCardColToDelete) {
        activeCardColToDelete.remove();
        activeCardColToDelete = null;
      }
      if (bsConfirmDeleteModal) bsConfirmDeleteModal.hide();
      applyCategoryFilters();
    });
  }

  if (btnSaveCategory) {
    btnSaveCategory.addEventListener('click', () => {
      if (!catNameInput.value.trim()) {
        catForm.classList.add('was-validated');
        return;
      }
      alert(`Category "${catNameInput.value}" saved successfully!`);
      if (bsFormModal) bsFormModal.hide();
    });
  }
});