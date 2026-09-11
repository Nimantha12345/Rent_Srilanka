document.addEventListener('DOMContentLoaded', () => {
  // Form References
  const websiteForm = document.getElementById('websiteSettingsForm');
  const securityForm = document.getElementById('securitySettingsForm');

  // Modal References
  const settingsFormModalEl = document.getElementById('settingsFormModal');
  const modalItemTitle = document.getElementById('modalItemTitle');
  const modalItemSlug = document.getElementById('modalItemSlug');
  const btnSaveModalItem = document.getElementById('btnSaveModalItem');
  let bsSettingsFormModal = settingsFormModalEl ? new bootstrap.Modal(settingsFormModalEl) : null;

  const deleteModalEl = document.getElementById('deleteSettingsModal');
  const deleteModalText = document.getElementById('deleteSettingsModalText');
  const btnConfirmDeleteSettings = document.getElementById('btnConfirmDeleteSettings');
  let bsDeleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;

  let activeDeleteTargetRow = null;

  // 1. Add Property Type / Add Facility Buttons Trigger
  const btnAddPropertyType = document.getElementById('btnAddPropertyType');
  const btnAddFacility = document.getElementById('btnAddFacility');
  const btnAddLocation = document.getElementById('btnAddLocation');

  if (btnAddPropertyType) {
    btnAddPropertyType.addEventListener('click', () => {
      openGenericModal('Add Property Category', '', '');
    });
  }

  if (btnAddFacility) {
    btnAddFacility.addEventListener('click', () => {
      openGenericModal('Add Facility / Amenity', '', '');
    });
  }

  if (btnAddLocation) {
    btnAddLocation.addEventListener('click', () => {
      openGenericModal('Add Location Area', '', '');
    });
  }

  function openGenericModal(title, titleVal, slugVal) {
    document.getElementById('settingsFormModalLabel').innerHTML = `<i class="bi bi-plus-circle text-primary-custom me-2"></i>${title}`;
    if (modalItemTitle) modalItemTitle.value = titleVal;
    if (modalItemSlug) modalItemSlug.value = slugVal;
    if (bsSettingsFormModal) bsSettingsFormModal.show();
  }

  // 2. Save Modal Item
  if (btnSaveModalItem) {
    btnSaveModalItem.addEventListener('click', () => {
      if (modalItemTitle && !modalItemTitle.value.trim()) {
        alert('Please enter a valid title.');
        return;
      }
      alert('Setting entry saved successfully!');
      if (bsSettingsFormModal) bsSettingsFormModal.hide();
    });
  }

  // 3. Delete Confirmation Triggers via Delegation
  document.addEventListener('click', (e) => {
    const deleteBtn = e.target.closest('.btn-delete-item');
    if (deleteBtn) {
      e.preventDefault();
      activeDeleteTargetRow = deleteBtn.closest('tr');
      const title = deleteBtn.getAttribute('data-title') || 'this item';
      if (deleteModalText) deleteModalText.textContent = `Are you sure you want to delete ${title}?`;
      if (bsDeleteModal) bsDeleteModal.show();
    }

    const editTypeBtn = e.target.closest('.btn-edit-type');
    if (editTypeBtn) {
      e.preventDefault();
      const name = editTypeBtn.getAttribute('data-name');
      const slug = editTypeBtn.getAttribute('data-slug');
      openGenericModal(`Edit Property Type: ${name}`, name, slug);
    }
  });

  if (btnConfirmDeleteSettings) {
    btnConfirmDeleteSettings.addEventListener('click', () => {
      if (activeDeleteTargetRow) {
        activeDeleteTargetRow.remove();
        activeDeleteTargetRow = null;
      }
      if (bsDeleteModal) bsDeleteModal.hide();
    });
  }

  // 4. Form Submission Alerts
  if (websiteForm) {
    websiteForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Website Configuration & Branding settings updated successfully!');
    });
  }

  if (securityForm) {
    securityForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Security & Authentication policies updated successfully!');
    });
  }
});