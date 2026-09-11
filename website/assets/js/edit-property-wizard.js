document.addEventListener('DOMContentLoaded', () => {
  let currentStep = 1;
  const totalSteps = 7;

  // Original pre-populated values for change detection
  const initialPrice = "95000";
  const initialCity = "Rajagiriya";

  const form = document.getElementById('editPropertyWizardForm');
  const btnNext = document.getElementById('btnWizNext');
  const btnBack = document.getElementById('btnWizBack');
  const btnSaveSubmit = document.getElementById('btnWizSaveSubmit');
  const btnTopSaveChanges = document.getElementById('btnTopSaveChanges');
  const editSuccessAlert = document.getElementById('editSuccessAlert');

  // Warning Modal Elements
  const warningModalEl = document.getElementById('infoChangeWarningModal');
  const btnConfirmWarningAndSave = document.getElementById('btnConfirmWarningAndSave');
  let bsWarningModal = warningModalEl ? new bootstrap.Modal(warningModalEl) : null;

  // Deactivate Modal Elements
  const deactivateModalEl = document.getElementById('deactivateModal');
  const btnConfirmDeactivate = document.getElementById('btnConfirmDeactivate');
  let bsDeactivateModal = deactivateModalEl ? new bootstrap.Modal(deactivateModalEl) : null;

  // Step 1 Category Cards Toggle
  const typeCardHouse = document.getElementById('typeCardHouse');
  const typeCardRoom = document.getElementById('typeCardRoom');
  const typeCardAnnex = document.getElementById('typeCardAnnex');

  if (typeCardHouse && typeCardRoom && typeCardAnnex) {
    const cards = [typeCardHouse, typeCardRoom, typeCardAnnex];
    cards.forEach(card => {
      card.addEventListener('click', function() {
        cards.forEach(c => {
          c.classList.remove('active', 'border-2', 'border-primary');
          c.classList.add('border-light-custom');
        });
        this.classList.add('active', 'border-2', 'border-primary');
        this.classList.remove('border-light-custom');
        const radio = this.querySelector('input[type="radio"]');
        if (radio) radio.checked = true;
      });
    });
  }

  // Next Step Action
  if (btnNext) {
    btnNext.addEventListener('click', () => {
      if (validateCurrentStep(currentStep)) {
        if (currentStep < totalSteps) {
          currentStep++;
          updateWizardStepUI();
        }
      } else {
        form.classList.add('was-validated');
      }
    });
  }

  // Back Step Action
  if (btnBack) {
    btnBack.addEventListener('click', () => {
      if (currentStep > 1) {
        currentStep--;
        updateWizardStepUI();
      }
    });
  }

  // Save Changes Logic with Warning Check for Price/City Changes
  function triggerSaveChangesProcess() {
    const currentPrice = document.getElementById('wizPrice')?.value;
    const currentCity = document.getElementById('wizCity')?.value;

    const hasImportantChanges = (currentPrice !== initialPrice) || (currentCity !== initialCity);

    if (hasImportantChanges && bsWarningModal) {
      bsWarningModal.show();
    } else {
      executeSave();
    }
  }

  if (btnTopSaveChanges) {
    btnTopSaveChanges.addEventListener('click', triggerSaveChangesProcess);
  }

  if (btnSaveSubmit) {
    btnSaveSubmit.addEventListener('click', triggerSaveChangesProcess);
  }

  if (btnConfirmWarningAndSave) {
    btnConfirmWarningAndSave.addEventListener('click', () => {
      if (bsWarningModal) bsWarningModal.hide();
      executeSave();
    });
  }

  function executeSave() {
    if (editSuccessAlert) {
      editSuccessAlert.classList.remove('d-none');
      editSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  // Deactivate Action
  if (btnConfirmDeactivate) {
    btnConfirmDeactivate.addEventListener('click', () => {
      alert('Property listing RSL-84920 has been deactivated.');
      if (bsDeactivateModal) bsDeactivateModal.hide();
      window.location.href = 'properties.php';
    });
  }

  // Update Wizard UI View
  function updateWizardStepUI() {
    for (let i = 1; i <= totalSteps; i++) {
      const stepEl = document.getElementById(`wizardStep${i}`);
      if (stepEl) stepEl.classList.add('d-none');
    }

    const currentStepEl = document.getElementById(`wizardStep${currentStep}`);
    if (currentStepEl) currentStepEl.classList.remove('d-none');

    // Stepper Nodes Sync
    const nodes = document.querySelectorAll('.step-node');
    nodes.forEach(node => {
      const stepNum = parseInt(node.getAttribute('data-step'));
      if (stepNum === currentStep) {
        node.className = 'step-node active';
      } else if (stepNum < currentStep) {
        node.className = 'step-node completed';
      } else {
        node.className = 'step-node';
      }
    });

    // Toggle Navigation Buttons
    if (currentStep === 1) {
      btnBack.classList.add('d-none');
    } else {
      btnBack.classList.remove('d-none');
    }

    if (currentStep === totalSteps) {
      btnNext.classList.add('d-none');
      btnSaveSubmit.classList.remove('d-none');
    } else {
      btnNext.classList.remove('d-none');
      btnSaveSubmit.classList.add('d-none');
    }

    // Populate Step 7 Preview
    if (currentStep === 7) {
      populatePreviewData();
    }

    window.scrollTo({ top: 100, behavior: 'smooth' });
  }

  // Step Validation
  function validateCurrentStep(step) {
    if (step === 2) {
      const title = document.getElementById('wizTitle');
      const price = document.getElementById('wizPrice');
      return title.checkValidity() && price.checkValidity();
    }
    if (step === 3) {
      const address = document.getElementById('wizAddress');
      return address.checkValidity();
    }
    return true;
  }

  // Populate Preview Details (Step 7)
  function populatePreviewData() {
    const selectedType = document.querySelector('input[name="wizPropType"]:checked')?.value || 'House';
    const title = document.getElementById('wizTitle')?.value || 'Untitled Property';
    const price = document.getElementById('wizPrice')?.value || '0';
    const beds = document.getElementById('wizBedrooms')?.value || '1';
    const baths = document.getElementById('wizBathrooms')?.value || '1';
    const size = document.getElementById('wizSize')?.value || '0';
    const city = document.getElementById('wizCity')?.value || 'Rajagiriya';
    const district = document.getElementById('wizDistrict')?.value || 'Colombo';

    document.getElementById('prevBadgeType').textContent = selectedType;
    document.getElementById('prevTitleDisplay').textContent = title;
    document.getElementById('prevPriceDisplay').innerHTML = `Rs. ${parseInt(price).toLocaleString()}<span class="fs-6 text-muted font-normal">/mo</span>`;
    document.getElementById('prevLocationDisplay').innerHTML = `<i class="bi bi-geo-alt-fill text-danger me-1"></i>${city}, ${district}`;
    document.getElementById('prevBedsDisplay').innerHTML = `<i class="bi bi-door-closed me-1"></i>${beds} Beds`;
    document.getElementById('prevBathsDisplay').innerHTML = `<i class="bi bi-droplet me-1"></i>${baths} Baths`;
    document.getElementById('prevSizeDisplay').innerHTML = `<i class="bi bi-arrows-angle me-1"></i>${size} sqft`;
  }

  // Image Deletion & Set Main Cover Trigger
  document.addEventListener('click', (e) => {
    const deleteBtn = e.target.closest('.btn-delete-photo');
    if (deleteBtn) {
      const card = deleteBtn.closest('.photo-preview-card');
      if (card) card.remove();
    }

    const setMainBtn = e.target.closest('.btn-set-main');
    if (setMainBtn) {
      document.querySelectorAll('.photo-preview-card .badge').forEach(b => b.remove());
      const card = setMainBtn.closest('.card');
      if (card) {
        card.insertAdjacentHTML('afterbegin', '<span class="badge bg-primary position-absolute top-0 start-0 m-2 shadow-xs">Main Cover</span>');
      }
    }
  });
});