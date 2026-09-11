document.addEventListener('DOMContentLoaded', () => {
  // ============================================================
  // SHARED STATE & DOM ELEMENTS
  // ============================================================
  const categoryCardsGrid = document.getElementById('categoryCardsGrid');
  const emptyCategoryState = document.getElementById('emptyCategoryState');
  const facilitiesTableBody = document.getElementById('facilitiesTableBody');

  const statTotalCategories = document.getElementById('stat-total-categories');
  const statActiveCategories = document.getElementById('stat-active-categories');
  const statTotalFacilities = document.getElementById('stat-total-facilities');

  let categoryIdCounter = 105; // next id after CAT-104 in the sample data
  let deleteContext = null; // { type: 'category'|'facility', element, name }

  function refreshCategoryStats() {
    const cols = document.querySelectorAll('.category-card-col');
    const activeCols = document.querySelectorAll('.category-card-col[data-status="Active"]');
    if (statTotalCategories) statTotalCategories.textContent = cols.length;
    if (statActiveCategories) statActiveCategories.textContent = activeCols.length;
  }

  function refreshFacilityStats() {
    const rows = document.querySelectorAll('.facility-row');
    if (statTotalFacilities) statTotalFacilities.textContent = rows.length;
  }

  // ============================================================
  // CATEGORY SEARCH & FILTERS (desktop + mobile offcanvas)
  // ============================================================
  const searchInput = document.getElementById('categorySearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const filterStatus = document.getElementById('filterStatus');
  const filterCount = document.getElementById('filterCount');
  const btnResetFilters = document.getElementById('btnResetFilters');
  const btnResetEmptySearch = document.getElementById('btnResetEmptySearch');
  const categoryCols = () => document.querySelectorAll('.category-card-col');

  // Mobile offcanvas filter mirrors
  const filterStatusMobile = document.getElementById('filterStatusMobile');
  const filterCountMobile = document.getElementById('filterCountMobile');
  const btnApplyFiltersMobile = document.getElementById('btnApplyFiltersMobile');
  const btnResetFiltersMobile = document.getElementById('btnResetFiltersMobile');

  function applyCategoryFilters() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const statusVal = filterStatus ? filterStatus.value : 'all';
    const countVal = filterCount ? filterCount.value : 'all';

    let visibleCount = 0;

    categoryCols().forEach(col => {
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
      emptyCategoryState.classList.toggle('d-none', visibleCount !== 0);
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

  function resetAllCategoryFilters() {
    if (searchInput) searchInput.value = '';
    if (filterStatus) filterStatus.value = 'all';
    if (filterCount) filterCount.value = 'all';
    if (filterStatusMobile) filterStatusMobile.value = 'all';
    if (filterCountMobile) filterCountMobile.value = 'all';
    applyCategoryFilters();
  }

  if (btnResetFilters) btnResetFilters.addEventListener('click', resetAllCategoryFilters);
  if (btnResetEmptySearch) btnResetEmptySearch.addEventListener('click', resetAllCategoryFilters);

  // Mobile offcanvas: keep desktop selects in sync, then apply on demand
  if (btnApplyFiltersMobile) {
    btnApplyFiltersMobile.addEventListener('click', () => {
      if (filterStatus && filterStatusMobile) filterStatus.value = filterStatusMobile.value;
      if (filterCount && filterCountMobile) filterCount.value = filterCountMobile.value;
      applyCategoryFilters();
    });
  }
  if (btnResetFiltersMobile) {
    btnResetFiltersMobile.addEventListener('click', resetAllCategoryFilters);
  }
  // Keep mobile selects reflecting desktop state whenever the offcanvas is opened
  const filterOffcanvasEl = document.getElementById('filterCategoryOffcanvas');
  if (filterOffcanvasEl) {
    filterOffcanvasEl.addEventListener('show.bs.offcanvas', () => {
      if (filterStatusMobile && filterStatus) filterStatusMobile.value = filterStatus.value;
      if (filterCountMobile && filterCount) filterCountMobile.value = filterCount.value;
    });
  }

  // ============================================================
  // CATEGORY ADD / EDIT MODAL
  // ============================================================
  const catFormModalEl = document.getElementById('categoryFormModal');
  const catPropModalEl = document.getElementById('categoryPropertiesModal');
  const catDetailsModalEl = document.getElementById('categoryDetailsModal');
  const cannotDeleteModalEl = document.getElementById('cannotDeleteModal');
  const confirmDeleteModalEl = document.getElementById('confirmDeleteModal');

  const bsFormModal = catFormModalEl ? new bootstrap.Modal(catFormModalEl) : null;
  const bsPropModal = catPropModalEl ? new bootstrap.Modal(catPropModalEl) : null;
  const bsDetailsModal = catDetailsModalEl ? new bootstrap.Modal(catDetailsModalEl) : null;
  const bsCannotDeleteModal = cannotDeleteModalEl ? new bootstrap.Modal(cannotDeleteModalEl) : null;
  const bsConfirmDeleteModal = confirmDeleteModalEl ? new bootstrap.Modal(confirmDeleteModalEl) : null;

  const catForm = document.getElementById('categoryForm');
  const catFormId = document.getElementById('catFormId');
  const catNameInput = document.getElementById('catNameInput');
  const catSlugInput = document.getElementById('catSlugInput');
  const catDescInput = document.getElementById('catDescInput');
  const catIconInput = document.getElementById('catIconInput');
  const catStatusSelect = document.getElementById('catStatusSelect');
  const iconPreviewSpan = document.getElementById('iconPreviewSpan');
  const btnSaveCategory = document.getElementById('btnSaveCategory');

  if (catNameInput && catSlugInput) {
    catNameInput.addEventListener('input', () => {
      // Only auto-generate the slug while adding a new category (not while editing one)
      if (!catFormId || !catFormId.value) {
        catSlugInput.value = generateSlug(catNameInput.value.trim());
      }
    });
  }

  function generateSlug(text) {
    return text
      .toLowerCase()
      .replace(/[^\w\s-]/g, '')
      .replace(/\s+/g, '-')
      .replace(/--+/g, '-');
  }

  if (catIconInput && iconPreviewSpan) {
    catIconInput.addEventListener('input', () => {
      const iconClass = catIconInput.value.trim() || 'bi-tag';
      iconPreviewSpan.innerHTML = `<i class="bi ${iconClass}"></i>`;
    });
  }

  const btnOpenAdd = document.getElementById('btnOpenAddCategoryModal');
  const btnEmptyAdd = document.getElementById('btnEmptyAddCategory');

  function openAddModal() {
    document.getElementById('categoryFormModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Category`;
    if (catForm) catForm.reset();
    if (catFormId) catFormId.value = '';
    if (catSlugInput) catSlugInput.value = '';
    if (catStatusSelect) catStatusSelect.value = 'Active';
    if (catIconInput) catIconInput.value = 'bi-house-door';
    if (iconPreviewSpan) iconPreviewSpan.innerHTML = `<i class="bi bi-house-door"></i>`;
    if (catForm) catForm.classList.remove('was-validated');
    if (bsFormModal) bsFormModal.show();
  }

  if (btnOpenAdd) btnOpenAdd.addEventListener('click', openAddModal);
  if (btnEmptyAdd) btnEmptyAdd.addEventListener('click', openAddModal);

  function openEditModal(col) {
    const id = col.getAttribute('data-category-id');
    const name = col.getAttribute('data-category-name');
    const slug = col.getAttribute('data-slug');
    const desc = col.getAttribute('data-description');
    const icon = col.getAttribute('data-icon');
    const status = col.getAttribute('data-status');

    document.getElementById('categoryFormModalLabel').innerHTML = `<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit Category: ${name}`;
    if (catFormId) catFormId.value = id;
    if (catNameInput) catNameInput.value = name;
    if (catSlugInput) catSlugInput.value = slug;
    if (catDescInput) catDescInput.value = desc;
    if (catIconInput) catIconInput.value = icon;
    if (catStatusSelect) catStatusSelect.value = status;
    if (iconPreviewSpan) iconPreviewSpan.innerHTML = `<i class="bi ${icon}"></i>`;
    if (catForm) catForm.classList.remove('was-validated');

    if (bsFormModal) bsFormModal.show();
  }

  // Builds a category card column exactly matching the existing markup structure
  function buildCategoryCardCol(data) {
    const col = document.createElement('div');
    col.className = 'col-md-6 col-xl-4 category-card-col';
    col.setAttribute('data-category-id', data.id);
    col.setAttribute('data-category-name', data.name);
    col.setAttribute('data-slug', data.slug);
    col.setAttribute('data-description', data.description);
    col.setAttribute('data-property-count', data.count);
    col.setAttribute('data-status', data.status);
    col.setAttribute('data-icon', data.icon);
    col.setAttribute('data-image', data.image);
    col.setAttribute('data-created-date', data.created);
    col.setAttribute('data-updated-date', data.updated);

    const isActive = data.status === 'Active';
    const hasProperties = data.count > 0;

    col.innerHTML = `
      <div class="card border-light-custom shadow-soft rounded-4 overflow-hidden bg-white h-100 position-relative${isActive ? '' : ' opacity-75'}">
        <div class="category-card-img-wrapper position-relative">
          <img src="${data.image}" class="card-img-top object-fit-cover w-100${isActive ? '' : ' grayscale-img'}" style="height: 140px;" alt="${data.name} Category">
          <span class="badge ${isActive ? 'bg-success' : 'bg-secondary'} text-white position-absolute top-0 end-0 m-3 shadow-xs">${data.status}</span>
          <div class="category-card-icon-badge ${isActive ? 'bg-navy' : 'bg-secondary'} text-white rounded-circle shadow-soft d-flex align-items-center justify-content-center">
            <i class="bi ${data.icon} fs-5"></i>
          </div>
        </div>
        <div class="card-body p-4 pt-4">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h5 class="fw-bold text-navy mb-0 card-title-text">${data.name}</h5>
            <span class="badge ${hasProperties ? 'bg-teal-subtle text-teal border border-teal-subtle' : 'bg-secondary-subtle text-secondary border border-secondary-subtle'} fw-semibold rounded-pill px-3 py-1">${data.count} Properties</span>
          </div>
          <p class="fs-8 text-muted mb-3 card-desc-text line-clamp-2">${data.description}</p>
          <div class="p-2.5 bg-light-custom rounded-3 border border-light-custom mb-3 fs-8 text-navy d-flex align-items-center justify-content-between">
            <span><strong>Slug:</strong> <code>${data.slug}</code></span>
            <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>${data.created}</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn ${hasProperties ? 'btn-outline-primary' : 'btn-outline-secondary'} btn-sm fw-medium flex-fill rounded-3 btn-view-category-properties" data-category-id="${data.id}" data-category-name="${data.name}" data-count="${data.count}"${hasProperties ? '' : ' disabled'}>
              <i class="bi bi-houses me-1"></i>${hasProperties ? 'View Properties' : '0 Properties'}
            </button>
            <button type="button" class="btn btn-light border btn-sm text-navy btn-edit-category" data-category-id="${data.id}" title="Edit Category">
              <i class="bi bi-pencil"></i>
            </button>
            <div class="dropdown">
              <button class="btn btn-light border btn-sm text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom rounded-3 fs-8">
                <li><button class="dropdown-item btn-view-details" data-category-id="${data.id}"><i class="bi bi-info-circle me-2 text-primary"></i>Category Details</button></li>
                <li><button class="dropdown-item btn-toggle-status" data-category-id="${data.id}" data-status="${data.status}"><i class="bi ${isActive ? 'bi-pause-circle me-2 text-warning' : 'bi-play-circle me-2 text-success'}"></i>${isActive ? 'Deactivate' : 'Activate'}</button></li>
                <li><hr class="dropdown-divider"></li>
                <li><button class="dropdown-item text-danger btn-delete-category" data-category-id="${data.id}" data-category-name="${data.name}" data-count="${data.count}"><i class="bi bi-trash3 me-2"></i>Delete Category</button></li>
              </ul>
            </div>
          </div>
        </div>
      </div>`;
    return col;
  }

  if (btnSaveCategory) {
    btnSaveCategory.addEventListener('click', () => {
      if (!catNameInput.value.trim()) {
        catForm.classList.add('was-validated');
        return;
      }

      const editingId = catFormId ? catFormId.value : '';
      const todayIso = new Date().toISOString().slice(0, 10);

      if (editingId) {
        // ---- EDIT EXISTING CATEGORY ----
        const col = document.querySelector(`.category-card-col[data-category-id="${editingId}"]`);
        if (col) {
          col.setAttribute('data-category-name', catNameInput.value.trim());
          col.setAttribute('data-slug', catSlugInput.value.trim());
          col.setAttribute('data-description', catDescInput.value.trim());
          col.setAttribute('data-icon', catIconInput.value.trim() || 'bi-tag');
          col.setAttribute('data-status', catStatusSelect.value);
          col.setAttribute('data-updated-date', todayIso);

          const count = parseInt(col.getAttribute('data-property-count') || '0', 10);
          const rebuilt = buildCategoryCardCol({
            id: editingId,
            name: catNameInput.value.trim(),
            slug: catSlugInput.value.trim(),
            description: catDescInput.value.trim(),
            count: count,
            status: catStatusSelect.value,
            icon: catIconInput.value.trim() || 'bi-tag',
            image: col.getAttribute('data-image'),
            created: col.getAttribute('data-created-date'),
            updated: todayIso
          });
          col.replaceWith(rebuilt);
        }
        alert(`Category "${catNameInput.value}" updated successfully!`);
      } else {
        // ---- ADD NEW CATEGORY ----
        const newId = `CAT-${categoryIdCounter++}`;
        const newCol = buildCategoryCardCol({
          id: newId,
          name: catNameInput.value.trim(),
          slug: catSlugInput.value.trim() || generateSlug(catNameInput.value.trim()),
          description: catDescInput.value.trim(),
          count: 0,
          status: catStatusSelect.value,
          icon: catIconInput.value.trim() || 'bi-tag',
          image: '../assets/images/properties/house-1.jpg',
          created: todayIso,
          updated: todayIso
        });
        if (categoryCardsGrid) categoryCardsGrid.appendChild(newCol);
        alert(`Category "${catNameInput.value}" saved successfully!`);
      }

      refreshCategoryStats();
      applyCategoryFilters();
      if (bsFormModal) bsFormModal.hide();
    });
  }

  // ============================================================
  // CATEGORY CARD ACTIONS (delegated - works for newly added cards too)
  // ============================================================
  document.addEventListener('click', (e) => {

    const viewPropBtn = e.target.closest('.btn-view-category-properties');
    if (viewPropBtn && !viewPropBtn.disabled) {
      e.preventDefault();
      const catName = viewPropBtn.getAttribute('data-category-name');
      const count = viewPropBtn.getAttribute('data-count');
      const catId = viewPropBtn.getAttribute('data-category-id');
      openCategoryPropertiesModal(catName, count, catId);
    }

    const editBtn = e.target.closest('.btn-edit-category');
    if (editBtn) {
      e.preventDefault();
      const col = editBtn.closest('.category-card-col');
      if (col) openEditModal(col);
    }

    const detailsBtn = e.target.closest('.btn-view-details');
    if (detailsBtn) {
      e.preventDefault();
      const col = detailsBtn.closest('.category-card-col');
      if (col) openDetailsModal(col);
    }

    const toggleBtn = e.target.closest('.btn-toggle-status');
    if (toggleBtn) {
      e.preventDefault();
      const col = toggleBtn.closest('.category-card-col');
      if (col) {
        const currentStatus = col.getAttribute('data-status');
        const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
        col.setAttribute('data-status', newStatus);

        const rebuilt = buildCategoryCardCol({
          id: col.getAttribute('data-category-id'),
          name: col.getAttribute('data-category-name'),
          slug: col.getAttribute('data-slug'),
          description: col.getAttribute('data-description'),
          count: parseInt(col.getAttribute('data-property-count') || '0', 10),
          status: newStatus,
          icon: col.getAttribute('data-icon'),
          image: col.getAttribute('data-image'),
          created: col.getAttribute('data-created-date'),
          updated: new Date().toISOString().slice(0, 10)
        });
        col.replaceWith(rebuilt);

        alert(`Category status updated to ${newStatus}`);
        refreshCategoryStats();
        applyCategoryFilters();
      }
    }

    const deleteBtn = e.target.closest('.btn-delete-category');
    if (deleteBtn) {
      e.preventDefault();
      const catName = deleteBtn.getAttribute('data-category-name');
      const count = parseInt(deleteBtn.getAttribute('data-count') || '0', 10);
      const col = deleteBtn.closest('.category-card-col');

      if (count > 0) {
        deleteContext = { type: 'category', element: col, name: catName };
        const cannotTitle = document.getElementById('cannotDeleteTitle');
        const cannotMsg = document.getElementById('cannotDeleteMessage');
        const cannotCount = document.getElementById('cannotDeleteCount');
        if (cannotTitle) cannotTitle.textContent = `Cannot Delete "${catName}"`;
        if (cannotMsg) cannotMsg.textContent = 'This category still has properties assigned to it.';
        if (cannotCount) cannotCount.textContent = count;
        if (bsCannotDeleteModal) bsCannotDeleteModal.show();
      } else {
        deleteContext = { type: 'category', element: col, name: catName };
        const confirmTitle = document.getElementById('confirmDeleteTitle');
        const confirmText = document.getElementById('confirmDeleteText');
        if (confirmTitle) confirmTitle.textContent = `Delete "${catName}"?`;
        if (confirmText) confirmText.textContent = `Are you sure you want to permanently delete the "${catName}" category?`;
        if (bsConfirmDeleteModal) bsConfirmDeleteModal.show();
      }
    }
  });

  function openCategoryPropertiesModal(catName, count, catId) {
    const title = document.getElementById('catPropModalTitle');
    const subtitle = document.getElementById('catPropModalSubtitle');
    const viewAllLink = document.getElementById('catPropModalViewAllLink');
    if (title) title.textContent = `Properties in Category: ${catName}`;
    if (subtitle) subtitle.textContent = `Total Assigned Properties: ${count}`;
    if (viewAllLink) viewAllLink.setAttribute('href', `properties.php?category=${encodeURIComponent(catId || '')}`);
    if (bsPropModal) bsPropModal.show();
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

  const btnCannotDeleteViewProperties = document.getElementById('btnCannotDeleteViewProperties');
  if (btnCannotDeleteViewProperties) {
    btnCannotDeleteViewProperties.addEventListener('click', () => {
      if (bsCannotDeleteModal) bsCannotDeleteModal.hide();
      if (deleteContext && deleteContext.type === 'category' && deleteContext.element) {
        const col = deleteContext.element;
        openCategoryPropertiesModal(
          col.getAttribute('data-category-name'),
          col.getAttribute('data-property-count'),
          col.getAttribute('data-category-id')
        );
      }
    });
  }

  // ============================================================
  // SHARED CONFIRM-DELETE MODAL (used by both categories & facilities)
  // ============================================================
  const btnExecuteDeleteCategory = document.getElementById('btnExecuteDeleteCategory');
  if (btnExecuteDeleteCategory) {
    btnExecuteDeleteCategory.addEventListener('click', () => {
      if (deleteContext && deleteContext.element) {
        deleteContext.element.remove();

        if (deleteContext.type === 'category') {
          refreshCategoryStats();
          applyCategoryFilters();
        } else if (deleteContext.type === 'facility') {
          refreshFacilityStats();
        }
      }
      deleteContext = null;
      if (bsConfirmDeleteModal) bsConfirmDeleteModal.hide();
    });
  }

  // ============================================================
  // FACILITY SEARCH
  // ============================================================
  const facilitySearchInput = document.getElementById('facilitySearchInput');
  const btnClearFacilitySearch = document.getElementById('btnClearFacilitySearch');
  const facilityRows = () => document.querySelectorAll('.facility-row');

  function applyFacilitySearch() {
    const q = facilitySearchInput ? facilitySearchInput.value.toLowerCase().trim() : '';
    facilityRows().forEach(row => {
      const name = (row.getAttribute('data-facility-name') || '').toLowerCase();
      const tag = (row.getAttribute('data-tag') || '').toLowerCase();
      row.classList.toggle('d-none', !(!q || name.includes(q) || tag.includes(q)));
    });
  }

  if (facilitySearchInput) facilitySearchInput.addEventListener('input', applyFacilitySearch);
  if (btnClearFacilitySearch) {
    btnClearFacilitySearch.addEventListener('click', () => {
      if (facilitySearchInput) facilitySearchInput.value = '';
      applyFacilitySearch();
    });
  }

  // ============================================================
  // FACILITY ADD / EDIT MODAL
  // ============================================================
  const facFormModalEl = document.getElementById('facilityFormModal');
  const bsFacModal = facFormModalEl ? new bootstrap.Modal(facFormModalEl) : null;

  const facForm = document.getElementById('facilityForm');
  const facNameInput = document.getElementById('facNameInput');
  const facIconInput = document.getElementById('facIconInput');
  const facTagInput = document.getElementById('facTagInput');
  const facIconPreview = document.getElementById('facIconPreview');
  const btnSaveFacility = document.getElementById('btnSaveFacility');

  const btnOpenAddFac = document.getElementById('btnOpenAddFacilityModal');
  const btnSectionAddFac = document.getElementById('btnSectionAddFacility');

  let editingFacilityRow = null; // the <tr> being edited, or null when adding

  function openAddFacilityModal() {
    editingFacilityRow = null;
    document.getElementById('facilityFormModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>Add Facility / Amenity`;
    if (facForm) facForm.reset();
    if (facNameInput) facNameInput.value = '';
    if (facIconInput) facIconInput.value = 'bi-sliders';
    if (facTagInput) facTagInput.value = '';
    if (facIconPreview) facIconPreview.innerHTML = `<i class="bi bi-sliders"></i>`;
    if (facForm) facForm.classList.remove('was-validated');
    if (bsFacModal) bsFacModal.show();
  }

  function openEditFacilityModal(row) {
    editingFacilityRow = row;
    const name = row.querySelector('.btn-edit-facility').getAttribute('data-name');
    const icon = row.querySelector('.btn-edit-facility').getAttribute('data-icon');
    const tag = row.querySelector('.btn-edit-facility').getAttribute('data-tag');

    document.getElementById('facilityFormModalLabel').innerHTML = `<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit Facility: ${name}`;
    if (facNameInput) facNameInput.value = name;
    if (facIconInput) facIconInput.value = icon;
    if (facTagInput) facTagInput.value = tag;
    if (facIconPreview) facIconPreview.innerHTML = `<i class="bi ${icon}"></i>`;
    if (facForm) facForm.classList.remove('was-validated');
    if (bsFacModal) bsFacModal.show();
  }

  if (btnOpenAddFac) btnOpenAddFac.addEventListener('click', openAddFacilityModal);
  if (btnSectionAddFac) btnSectionAddFac.addEventListener('click', openAddFacilityModal);

  if (facNameInput && facTagInput) {
    facNameInput.addEventListener('input', () => {
      // Only auto-generate the tag while adding (don't clobber a custom tag while editing)
      if (!editingFacilityRow) {
        const val = facNameInput.value.trim().toLowerCase().replace(/\s+/g, '_').replace(/[^\w_]/g, '');
        facTagInput.value = val ? `has_${val}` : '';
      }
    });
  }

  if (facIconInput && facIconPreview) {
    facIconInput.addEventListener('input', () => {
      const iconClass = facIconInput.value.trim() || 'bi-sliders';
      facIconPreview.innerHTML = `<i class="bi ${iconClass}"></i>`;
    });
  }

  function buildFacilityRow(name, icon, tag, enabled) {
    const row = document.createElement('tr');
    row.className = 'facility-row';
    row.setAttribute('data-facility-name', name.toLowerCase());
    row.setAttribute('data-tag', tag);
    row.innerHTML = `
      <td class="ps-4 fw-bold text-navy"><i class="bi ${icon} text-success me-2 fs-6"></i>${name}</td>
      <td><code>${icon}</code></td>
      <td><span class="badge bg-light text-navy border border-light-custom">${tag}</span></td>
      <td>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" ${enabled ? 'checked' : ''}>
        </div>
      </td>
      <td class="text-end pe-4">
        <button class="btn btn-light btn-sm border text-primary-custom me-1 btn-edit-facility" data-name="${name}" data-icon="${icon}" data-tag="${tag}"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-light btn-sm border text-danger btn-delete-facility" data-title="${name}"><i class="bi bi-trash"></i></button>
      </td>`;
    return row;
  }

  if (btnSaveFacility) {
    btnSaveFacility.addEventListener('click', () => {
      if (!facNameInput.value.trim()) {
        if (facForm) facForm.classList.add('was-validated');
        return;
      }

      const name = facNameInput.value.trim();
      const icon = facIconInput.value.trim() || 'bi-sliders';
      const tag = facTagInput.value.trim() || `has_${name.toLowerCase().replace(/\s+/g, '_')}`;

      if (editingFacilityRow) {
        // ---- EDIT EXISTING FACILITY ----
        const enabledSwitch = editingFacilityRow.querySelector('.form-check-input');
        const enabled = enabledSwitch ? enabledSwitch.checked : true;
        const newRow = buildFacilityRow(name, icon, tag, enabled);
        editingFacilityRow.replaceWith(newRow);
        alert(`Facility "${name}" updated successfully!`);
      } else {
        // ---- ADD NEW FACILITY ----
        const newRow = buildFacilityRow(name, icon, tag, true);
        if (facilitiesTableBody) facilitiesTableBody.appendChild(newRow);
        alert(`Facility "${name}" saved successfully!`);
      }

      editingFacilityRow = null;
      refreshFacilityStats();
      applyFacilitySearch();
      if (bsFacModal) bsFacModal.hide();
    });
  }

  // ============================================================
  // FACILITY ROW ACTIONS (delegated - works for newly added rows too)
  // ============================================================
  document.addEventListener('click', (e) => {
    const editFacBtn = e.target.closest('.btn-edit-facility');
    if (editFacBtn) {
      e.preventDefault();
      const row = editFacBtn.closest('.facility-row');
      if (row) openEditFacilityModal(row);
    }

    const deleteFacBtn = e.target.closest('.btn-delete-facility');
    if (deleteFacBtn) {
      e.preventDefault();
      const row = deleteFacBtn.closest('.facility-row');
      const title = deleteFacBtn.getAttribute('data-title') || 'this facility';
      deleteContext = { type: 'facility', element: row, name: title };

      const confirmTitle = document.getElementById('confirmDeleteTitle');
      const confirmText = document.getElementById('confirmDeleteText');
      if (confirmTitle) confirmTitle.textContent = `Delete "${title}"?`;
      if (confirmText) confirmText.textContent = `Are you sure you want to permanently delete the "${title}" facility? It will no longer appear as a search filter.`;
      if (bsConfirmDeleteModal) bsConfirmDeleteModal.show();
    }
  });

  // Initial stat sync on page load
  refreshCategoryStats();
  refreshFacilityStats();
});