document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const locTypeSelect = document.getElementById('locTypeSelect');
  const parentDistrictGroup = document.getElementById('parentDistrictGroup');
  const parentCityGroup = document.getElementById('parentCityGroup');

  // Search and Filter Elements
  const searchInput = document.getElementById('locationSearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const filterDistrict = document.getElementById('filterDistrict');
  const filterCity = document.getElementById('filterCity');
  const filterType = document.getElementById('filterType');
  const filterStatus = document.getElementById('filterStatus');
  const btnResetFilters = document.getElementById('btnResetFilters');
  const btnResetEmptySearch = document.getElementById('btnResetEmptySearch');
  const emptyLocationState = document.getElementById('emptyLocationState');
  const locationRows = document.querySelectorAll('.location-row');
  const locationListCount = document.getElementById('location-list-count');

  // Hierarchical Drilldown Cascade Selects
  const cascadeDistrict = document.getElementById('cascadeDistrict');
  const cascadeCity = document.getElementById('cascadeCity');
  const cascadeArea = document.getElementById('cascadeArea');
  const cascadeMatchCount = document.getElementById('cascadeMatchCount');

  // Modal References
  const addModalEl = document.getElementById('addLocationModal');
  const viewPropModalEl = document.getElementById('viewPropertiesModal');
  const deleteModalEl = document.getElementById('deleteConfirmModal');

  let bsAddModal = addModalEl ? new bootstrap.Modal(addModalEl) : null;
  let bsViewPropModal = viewPropModalEl ? new bootstrap.Modal(viewPropModalEl) : null;
  let bsDeleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;

  let activeRowToDelete = null;

  // 1. Dynamic Add Location Modal Form Controls (Show/Hide Parents)
  if (locTypeSelect) {
    locTypeSelect.addEventListener('change', () => {
      const type = locTypeSelect.value;
      if (type === 'District') {
        if (parentDistrictGroup) parentDistrictGroup.classList.add('d-none');
        if (parentCityGroup) parentCityGroup.classList.add('d-none');
      } else if (type === 'City/Town') {
        if (parentDistrictGroup) parentDistrictGroup.classList.remove('d-none');
        if (parentCityGroup) parentCityGroup.classList.add('d-none');
      } else if (type === 'Area') {
        if (parentDistrictGroup) parentDistrictGroup.classList.remove('d-none');
        if (parentCityGroup) parentCityGroup.classList.remove('d-none');
      }
    });
  }

  // Open Add Modal Button Trigger
  const btnOpenAddModal = document.getElementById('btnOpenAddLocationModal');
  if (btnOpenAddModal) {
    btnOpenAddModal.addEventListener('click', () => {
      document.getElementById('addLocationModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Location Entry`;
      if (bsAddModal) bsAddModal.show();
    });
  }

  // Save Location Trigger
  const btnSaveLocation = document.getElementById('btnSaveLocation');
  if (btnSaveLocation) {
    btnSaveLocation.addEventListener('click', () => {
      const name = document.getElementById('locNameInput')?.value;
      if (!name) {
        alert('Please enter a location name.');
        return;
      }
      alert(`Location "${name}" saved successfully!`);
      if (bsAddModal) bsAddModal.hide();
    });
  }

  // 2. Main Search & Filter Logic
  function applyLocationFilters() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const districtVal = filterDistrict ? filterDistrict.value : 'all';
    const cityVal = filterCity ? filterCity.value : 'all';
    const typeVal = filterType ? filterType.value : 'all';
    const statusVal = filterStatus ? filterStatus.value : 'all';

    let visibleCount = 0;

    locationRows.forEach(row => {
      const name = (row.getAttribute('data-name') || '').toLowerCase();
      const parent = (row.getAttribute('data-parent') || '').toLowerCase();
      const district = row.getAttribute('data-district');
      const city = row.getAttribute('data-city');
      const type = row.getAttribute('data-type');
      const status = row.getAttribute('data-status');

      const matchesSearch = !searchVal || name.includes(searchVal) || parent.includes(searchVal);
      const matchesDistrict = (districtVal === 'all') || (district === districtVal);
      const matchesCity = (cityVal === 'all') || (city === cityVal);
      const matchesType = (typeVal === 'all') || (type === typeVal);
      const matchesStatus = (statusVal === 'all') || (status === statusVal);

      if (matchesSearch && matchesDistrict && matchesCity && matchesType && matchesStatus) {
        row.classList.remove('d-none');
        visibleCount++;
      } else {
        row.classList.add('d-none');
      }
    });

    if (locationListCount) locationListCount.textContent = `${visibleCount} Records Shown`;

    if (emptyLocationState) {
      if (visibleCount === 0) {
        emptyLocationState.classList.remove('d-none');
      } else {
        emptyLocationState.classList.add('d-none');
      }
    }
  }

  if (searchInput) searchInput.addEventListener('input', applyLocationFilters);
  if (filterDistrict) filterDistrict.addEventListener('change', applyLocationFilters);
  if (filterCity) filterCity.addEventListener('change', applyLocationFilters);
  if (filterType) filterType.addEventListener('change', applyLocationFilters);
  if (filterStatus) filterStatus.addEventListener('change', applyLocationFilters);

  if (btnClearSearch) {
    btnClearSearch.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      applyLocationFilters();
    });
  }

  if (btnResetFilters) {
    btnResetFilters.addEventListener('click', resetAllFilters);
  }

  if (btnResetEmptySearch) {
    btnResetEmptySearch.addEventListener('click', resetAllFilters);
  }

  function resetAllFilters() {
    if (searchInput) searchInput.value = '';
    if (filterDistrict) filterDistrict.value = 'all';
    if (filterCity) filterCity.value = 'all';
    if (filterType) filterType.value = 'all';
    if (filterStatus) filterStatus.value = 'all';
    applyLocationFilters();
  }

  // 3. Hierarchical Drilldown Relationship Flow (District -> City -> Area)
  if (cascadeDistrict) {
    cascadeDistrict.addEventListener('change', () => {
      const val = cascadeDistrict.value;
      if (cascadeCity) {
        cascadeCity.innerHTML = '<option value="" selected>Select City/Town...</option>';
        if (val === 'colombo') {
          cascadeCity.innerHTML += '<option value="colombo_city">Colombo City</option><option value="dehiwala">Dehiwala</option><option value="nugegoda">Nugegoda</option>';
          cascadeCity.disabled = false;
        } else if (val === 'kandy') {
          cascadeCity.innerHTML += '<option value="kandy_city">Kandy City</option><option value="peradeniya">Peradeniya</option>';
          cascadeCity.disabled = false;
        } else {
          cascadeCity.disabled = true;
        }
      }
      if (cascadeArea) {
        cascadeArea.innerHTML = '<option value="" selected>Select Area...</option>';
        cascadeArea.disabled = true;
      }
      if (cascadeMatchCount) cascadeMatchCount.textContent = val ? 'Filter updated by district' : 'Select a location to filter properties';
    });
  }

  if (cascadeCity) {
    cascadeCity.addEventListener('change', () => {
      const val = cascadeCity.value;
      if (cascadeArea) {
        cascadeArea.innerHTML = '<option value="" selected>Select Area...</option>';
        if (val === 'peradeniya') {
          cascadeArea.innerHTML += '<option value="kalugamuwa">Kalugamuwa</option><option value="university_park">University Park</option>';
          cascadeArea.disabled = false;
        } else if (val === 'dehiwala') {
          cascadeArea.innerHTML += '<option value="coast_road">Wellawatte Coast Road</option>';
          cascadeArea.disabled = false;
        } else {
          cascadeArea.disabled = true;
        }
      }
      if (cascadeMatchCount) cascadeMatchCount.textContent = '35 properties found in selected city';
    });
  }

  if (cascadeArea) {
    cascadeArea.addEventListener('change', () => {
      if (cascadeMatchCount) cascadeMatchCount.textContent = '18 properties found in Peradeniya, Kandy';
    });
  }

  // 4. Action Delegation (Edit, Delete, View Properties)
  document.addEventListener('click', (e) => {
    
    // Edit Button
    const editBtn = e.target.closest('.btn-edit-location');
    if (editBtn) {
      e.preventDefault();
      const name = editBtn.getAttribute('data-name');
      const type = editBtn.getAttribute('data-type');
      const parent = editBtn.getAttribute('data-parent');
      const status = editBtn.getAttribute('data-status');

      document.getElementById('addLocationModalLabel').innerHTML = `<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit Location: ${name}`;
      if (document.getElementById('locNameInput')) document.getElementById('locNameInput').value = name;
      if (locTypeSelect) locTypeSelect.value = type;
      if (document.getElementById('locStatusSelect')) document.getElementById('locStatusSelect').value = status;

      if (bsAddModal) bsAddModal.show();
    }

    // View Properties Button
    const viewPropBtn = e.target.closest('.btn-view-properties');
    if (viewPropBtn) {
      e.preventDefault();
      const name = viewPropBtn.getAttribute('data-name');
      const subtitle = document.getElementById('modalLocationSubtitle');
      if (subtitle) subtitle.textContent = `Location: ${name} · Associated Listings`;
      if (bsViewPropModal) bsViewPropModal.show();
    }

    // Delete Button
    const deleteBtn = e.target.closest('.btn-delete-location');
    if (deleteBtn) {
      e.preventDefault();
      activeRowToDelete = deleteBtn.closest('tr');
      const name = deleteBtn.getAttribute('data-name');
      const title = document.getElementById('deleteConfirmTitle');
      if (title) title.textContent = `Delete ${name}?`;
      if (bsDeleteModal) bsDeleteModal.show();
    }
  });

  // Confirm Delete Handler
  const btnExecuteDelete = document.getElementById('btnExecuteDelete');
  if (btnExecuteDelete) {
    btnExecuteDelete.addEventListener('click', () => {
      if (activeRowToDelete) {
        activeRowToDelete.remove();
        activeRowToDelete = null;
      }
      if (bsDeleteModal) bsDeleteModal.hide();
      applyLocationFilters();
    });
  }

  // 5. Interactive Map Pin Hover & Click Synchronization
  const mapListItems = document.querySelectorAll('.map-list-item');
  const mapMarkers = document.querySelectorAll('.map-marker-pin');

  mapListItems.forEach(item => {
    item.addEventListener('click', () => {
      mapListItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');

      const name = item.getAttribute('data-name');
      mapMarkers.forEach(pin => {
        if (pin.getAttribute('data-name') === name) {
          pin.classList.add('active');
        } else {
          pin.classList.remove('active');
        }
      });
    });
  });
});