document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const locTypeSelect = document.getElementById('locTypeSelect');
  const parentProvinceGroup = document.getElementById('parentProvinceGroup');
  const parentDistrictGroup = document.getElementById('parentDistrictGroup');
  const parentCityGroup = document.getElementById('parentCityGroup');

  // Search and Filter Elements
  const searchInput = document.getElementById('locationSearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const filterProvince = document.getElementById('filterProvince');
  const filterDistrict = document.getElementById('filterDistrict');
  const filterType = document.getElementById('filterType');
  const filterStatus = document.getElementById('filterStatus');
  const btnResetFilters = document.getElementById('btnResetFilters');
  const btnResetEmptySearch = document.getElementById('btnResetEmptySearch');
  const emptyLocationState = document.getElementById('emptyLocationState');
  const locationRows = document.querySelectorAll('.location-row');
  const locationListCount = document.getElementById('location-list-count');

  // Dynamic Drilldown Cascades (Province -> District -> City -> Area)
  const cascadeProvince = document.getElementById('cascadeProvince');
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

  // 1. Dynamic Add Location Modal Form Controls
  if (locTypeSelect) {
    locTypeSelect.addEventListener('change', () => {
      const type = locTypeSelect.value;
      if (type === 'Province') {
        if (parentProvinceGroup) parentProvinceGroup.classList.add('d-none');
        if (parentDistrictGroup) parentDistrictGroup.classList.add('d-none');
        if (parentCityGroup) parentCityGroup.classList.add('d-none');
      } else if (type === 'District') {
        if (parentProvinceGroup) parentProvinceGroup.classList.remove('d-none');
        if (parentDistrictGroup) parentDistrictGroup.classList.add('d-none');
        if (parentCityGroup) parentCityGroup.classList.add('d-none');
      } else if (type === 'City/Town') {
        if (parentProvinceGroup) parentProvinceGroup.classList.remove('d-none');
        if (parentDistrictGroup) parentDistrictGroup.classList.remove('d-none');
        if (parentCityGroup) parentCityGroup.classList.add('d-none');
      } else if (type === 'Area') {
        if (parentProvinceGroup) parentProvinceGroup.classList.remove('d-none');
        if (parentDistrictGroup) parentDistrictGroup.classList.remove('d-none');
        if (parentCityGroup) parentCityGroup.classList.remove('d-none');
      }
    });
  }

  // Trigger Open Add Modal
  const btnOpenAddModal = document.getElementById('btnOpenAddLocationModal');
  if (btnOpenAddModal) {
    btnOpenAddModal.addEventListener('click', () => {
      document.getElementById('addLocationModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>Add New Location Entry`;
      if (bsAddModal) bsAddModal.show();
    });
  }

  // Save Location
  const btnSaveLocation = document.getElementById('btnSaveLocation');
  if (btnSaveLocation) {
    btnSaveLocation.addEventListener('click', () => {
      const name = document.getElementById('locNameInput')?.value;
      if (!name) {
        alert('Please enter a location name.');
        return;
      }
      alert(`Location "${name}" added to hierarchy successfully!`);
      if (bsAddModal) bsAddModal.hide();
    });
  }

  // 2. Main Search & Filtering Function (Includes Drilldown Cascade Values)
  function applyLocationFilters() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    
    // Top Bar Filters OR Cascade Filters
    const provVal = (cascadeProvince && cascadeProvince.value) ? cascadeProvince.value : (filterProvince ? filterProvince.value : 'all');
    const distVal = (cascadeDistrict && cascadeDistrict.value) ? cascadeDistrict.value : (filterDistrict ? filterDistrict.value : 'all');
    const cityVal = (cascadeCity && cascadeCity.value) ? cascadeCity.value : 'all';
    const areaVal = (cascadeArea && cascadeArea.value) ? cascadeArea.value : 'all';
    
    const typeVal = filterType ? filterType.value : 'all';
    const statusVal = filterStatus ? filterStatus.value : 'all';

    let visibleCount = 0;

    locationRows.forEach(row => {
      const name = (row.getAttribute('data-name') || '').toLowerCase();
      const province = (row.getAttribute('data-province') || '').toLowerCase();
      const district = (row.getAttribute('data-district') || '').toLowerCase();
      const city = (row.getAttribute('data-city') || '').toLowerCase();
      const type = row.getAttribute('data-type');
      const status = row.getAttribute('data-status');

      const matchesSearch = !searchVal || name.includes(searchVal) || province.includes(searchVal) || district.includes(searchVal) || city.includes(searchVal);
      
      const matchesProv = (provVal === 'all' || provVal === '') || (province === provVal.toLowerCase());
      const matchesDist = (distVal === 'all' || distVal === '') || (district === distVal.toLowerCase());
      const matchesCity = (cityVal === 'all' || cityVal === '') || (city === cityVal.toLowerCase());
      const matchesArea = (areaVal === 'all' || areaVal === '') || (name === areaVal.toLowerCase());

      const matchesType = (typeVal === 'all') || (type === typeVal);
      const matchesStatus = (statusVal === 'all') || (status === statusVal);

      if (matchesSearch && matchesProv && matchesDist && matchesCity && matchesArea && matchesType && matchesStatus) {
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

  // Event Listeners for Filters
  if (searchInput) searchInput.addEventListener('input', applyLocationFilters);
  if (filterProvince) filterProvince.addEventListener('change', () => {
    if (cascadeProvince) cascadeProvince.value = filterProvince.value === 'all' ? '' : filterProvince.value.toLowerCase();
    applyLocationFilters();
  });
  if (filterDistrict) filterDistrict.addEventListener('change', () => {
    if (cascadeDistrict) cascadeDistrict.value = filterDistrict.value === 'all' ? '' : filterDistrict.value.toLowerCase();
    applyLocationFilters();
  });
  if (filterType) filterType.addEventListener('change', applyLocationFilters);
  if (filterStatus) filterStatus.addEventListener('change', applyLocationFilters);

  if (btnClearSearch) {
    btnClearSearch.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      applyLocationFilters();
    });
  }

  const resetAll = () => {
    if (searchInput) searchInput.value = '';
    if (filterProvince) filterProvince.value = 'all';
    if (filterDistrict) filterDistrict.value = 'all';
    if (filterType) filterType.value = 'all';
    if (filterStatus) filterStatus.value = 'all';
    
    if (cascadeProvince) cascadeProvince.value = '';
    if (cascadeDistrict) { cascadeDistrict.value = ''; cascadeDistrict.disabled = true; }
    if (cascadeCity) { cascadeCity.value = ''; cascadeCity.disabled = true; }
    if (cascadeArea) { cascadeArea.value = ''; cascadeArea.disabled = true; }
    if (cascadeMatchCount) cascadeMatchCount.textContent = 'Select a location hierarchy to filter properties';
    
    applyLocationFilters();
  };

  if (btnResetFilters) btnResetFilters.addEventListener('click', resetAll);
  if (btnResetEmptySearch) btnResetEmptySearch.addEventListener('click', resetAll);

  // 3. Hierarchical Drilldown Cascade Event Listeners (Province -> District -> City -> Area)
  if (cascadeProvince) {
    cascadeProvince.addEventListener('change', () => {
      const prov = cascadeProvince.value;
      if (cascadeDistrict) {
        cascadeDistrict.innerHTML = '<option value="" selected>2. Select District...</option>';
        if (prov === 'western' || prov === 'Western') {
          cascadeDistrict.innerHTML += '<option value="colombo">Colombo District</option><option value="gampaha">Gampaha District</option>';
          cascadeDistrict.disabled = false;
        } else if (prov === 'central' || prov === 'Central') {
          cascadeDistrict.innerHTML += '<option value="kandy">Kandy District</option>';
          cascadeDistrict.disabled = false;
        } else if (prov === 'southern' || prov === 'Southern') {
          cascadeDistrict.innerHTML += '<option value="galle">Galle District</option>';
          cascadeDistrict.disabled = false;
        } else if (prov === 'northern' || prov === 'Northern') {
          cascadeDistrict.innerHTML += '<option value="jaffna">Jaffna District</option>';
          cascadeDistrict.disabled = false;
        } else {
          cascadeDistrict.disabled = true;
        }
      }
      if (cascadeCity) {
        cascadeCity.innerHTML = '<option value="" selected>3. Select City/Town...</option>';
        cascadeCity.disabled = true;
      }
      if (cascadeArea) {
        cascadeArea.innerHTML = '<option value="" selected>4. Select Sub-Area...</option>';
        cascadeArea.disabled = true;
      }
      
      if (cascadeMatchCount) cascadeMatchCount.textContent = prov ? `Filtered by ${prov.toUpperCase()} Province` : 'Select a location hierarchy to filter properties';
      applyLocationFilters();
    });
  }

  if (cascadeDistrict) {
    cascadeDistrict.addEventListener('change', () => {
      const dist = cascadeDistrict.value;
      if (cascadeCity) {
        cascadeCity.innerHTML = '<option value="" selected>3. Select City/Town...</option>';
        if (dist === 'colombo') {
          cascadeCity.innerHTML += '<option value="rajagiriya">Rajagiriya</option><option value="bambalapitiya">Bambalapitiya</option>';
          cascadeCity.disabled = false;
        } else if (dist === 'kandy') {
          cascadeCity.innerHTML += '<option value="peradeniya">Peradeniya</option>';
          cascadeCity.disabled = false;
        } else if (dist === 'galle') {
          cascadeCity.innerHTML += '<option value="galle city">Galle City</option>';
          cascadeCity.disabled = false;
        } else if (dist === 'jaffna') {
          cascadeCity.innerHTML += '<option value="jaffna town">Jaffna Town</option>';
          cascadeCity.disabled = false;
        } else {
          cascadeCity.disabled = true;
        }
      }
      if (cascadeArea) {
        cascadeArea.innerHTML = '<option value="" selected>4. Select Sub-Area...</option>';
        cascadeArea.disabled = true;
      }
      applyLocationFilters();
    });
  }

  if (cascadeCity) {
    cascadeCity.addEventListener('change', () => {
      const city = cascadeCity.value;
      if (cascadeArea) {
        cascadeArea.innerHTML = '<option value="" selected>4. Select Sub-Area...</option>';
        if (city === 'rajagiriya') {
          cascadeArea.innerHTML += '<option value="kalapaluwawa">Kalapaluwawa</option>';
          cascadeArea.disabled = false;
        } else if (city === 'peradeniya') {
          cascadeArea.innerHTML += '<option value="university park">University Park</option>';
          cascadeArea.disabled = false;
        } else if (city === 'galle city') {
          cascadeArea.innerHTML += '<option value="galle fort zone">Galle Fort Zone</option>';
          cascadeArea.disabled = false;
        } else {
          cascadeArea.disabled = true;
        }
      }
      applyLocationFilters();
    });
  }

  if (cascadeArea) {
    cascadeArea.addEventListener('change', () => {
      applyLocationFilters();
    });
  }

  // 4. Action Delegation (Edit, Delete, View Properties)
  document.addEventListener('click', (e) => {
    const editBtn = e.target.closest('.btn-edit-location');
    if (editBtn) {
      e.preventDefault();
      const name = editBtn.getAttribute('data-name');
      const type = editBtn.getAttribute('data-type');
      const status = editBtn.getAttribute('data-status');

      document.getElementById('addLocationModalLabel').innerHTML = `<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit Location: ${name}`;
      if (document.getElementById('locNameInput')) document.getElementById('locNameInput').value = name;
      if (locTypeSelect) locTypeSelect.value = type;
      if (document.getElementById('locStatusSelect')) document.getElementById('locStatusSelect').value = status;

      if (bsAddModal) bsAddModal.show();
    }

    const viewPropBtn = e.target.closest('.btn-view-properties');
    if (viewPropBtn) {
      e.preventDefault();
      const name = viewPropBtn.getAttribute('data-name');
      const subtitle = document.getElementById('modalLocationSubtitle');
      if (subtitle) subtitle.textContent = `Location: ${name} · Associated Listings`;
      if (bsViewPropModal) bsViewPropModal.show();
    }

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

  // 5. Interactive Map & Map Dropdown Filter Synchronization
  const mapListItems = document.querySelectorAll('.map-list-item');
  const mapMarkers = document.querySelectorAll('.map-marker-pin');
  const mapProvinceFilter = document.getElementById('mapProvinceFilter');

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

  if (mapProvinceFilter) {
    mapProvinceFilter.addEventListener('change', () => {
      const selectedProv = mapProvinceFilter.value;
      mapMarkers.forEach(pin => {
        const pinProv = pin.getAttribute('data-province');
        if (selectedProv === 'all' || pinProv === selectedProv) {
          pin.classList.remove('d-none');
        } else {
          pin.classList.add('d-none');
        }
      });
    });
  }
});