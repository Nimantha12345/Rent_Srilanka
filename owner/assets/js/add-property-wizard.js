document.addEventListener('DOMContentLoaded', () => {
  let currentStep = 1;
  const totalSteps = 8;

  const form = document.getElementById('addPropertyWizardForm');
  const btnNext = document.getElementById('btnWizNext');
  const btnBack = document.getElementById('btnWizBack');
  const btnSubmit = document.getElementById('btnWizSubmit');
  const btnSaveDraft = document.getElementById('btnWizSaveDraft');
  const wizardSuccessAlert = document.getElementById('wizardSuccessAlert');

  // Step 1 Type Selection Cards
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

  // Save Draft Action
  if (btnSaveDraft) {
    btnSaveDraft.addEventListener('click', () => {
      alert('Draft saved successfully! You can resume editing anytime.');
    });
  }

  // Update Wizard UI View
  function updateWizardStepUI() {
    // Hide all step contents
    for (let i = 1; i <= totalSteps; i++) {
      const stepEl = document.getElementById(`wizardStep${i}`);
      if (stepEl) stepEl.classList.add('d-none');
    }

    // Show current step content
    const currentStepEl = document.getElementById(`wizardStep${currentStep}`);
    if (currentStepEl) currentStepEl.classList.remove('d-none');

    // Update Stepper Nodes
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

    // Toggle Buttons
    if (currentStep === 1) {
      btnBack.classList.add('d-none');
    } else {
      btnBack.classList.remove('d-none');
    }

    if (currentStep === totalSteps) {
      btnNext.classList.add('d-none');
      btnSubmit.classList.remove('d-none');
    } else {
      btnNext.classList.remove('d-none');
      btnSubmit.classList.add('d-none');
    }

    // Populate Preview on Step 7
    if (currentStep === 7) {
      populatePreviewData();
    }

    window.scrollTo({ top: 100, behavior: 'smooth' });
  }

  // Validation per Step
  function validateCurrentStep(step) {
    if (step === 1) return true; // Property type pre-selected
    if (step === 2) {
      const title = document.getElementById('wizTitle');
      const desc = document.getElementById('wizDescription');
      const price = document.getElementById('wizPrice');
      return title.checkValidity() && desc.checkValidity() && price.checkValidity();
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
    const desc = document.getElementById('wizDescription')?.value || 'No description provided.';
    const price = document.getElementById('wizPrice')?.value || '0';
    const beds = document.getElementById('wizBedrooms')?.value || '1';
    const baths = document.getElementById('wizBathrooms')?.value || '1';
    const size = document.getElementById('wizSize')?.value || '0';
    const furnished = document.getElementById('wizFurnished')?.value || 'Unfurnished';
    const city = document.getElementById('wizCity')?.value || 'Kandy';
    const district = document.getElementById('wizDistrict')?.value || 'Kandy';
    const area = document.getElementById('wizArea')?.value || '';

    document.getElementById('prevBadgeType').textContent = selectedType;
    document.getElementById('prevTitleDisplay').textContent = title;
    document.getElementById('prevPriceDisplay').innerHTML = `Rs. ${parseInt(price).toLocaleString()}<span class="fs-6 text-muted font-normal">/mo</span>`;
    document.getElementById('prevLocationDisplay').innerHTML = `<i class="bi bi-geo-alt-fill text-danger me-1"></i>${area ? area + ', ' : ''}${city}, ${district}`;
    document.getElementById('prevBedsDisplay').innerHTML = `<i class="bi bi-door-closed me-1"></i>${beds} Bed${beds > 1 ? 's' : ''}`;
    document.getElementById('prevBathsDisplay').innerHTML = `<i class="bi bi-droplet me-1"></i>${baths} Bath${baths > 1 ? 's' : ''}`;
    document.getElementById('prevSizeDisplay').innerHTML = `<i class="bi bi-arrows-angle me-1"></i>${size} sqft`;
    document.getElementById('prevFurnishedDisplay').innerHTML = `<i class="bi bi-lamp me-1"></i>${furnished}`;
    document.getElementById('prevDescDisplay').textContent = desc;
  }

  // Photo Upload Simulation
  const photoDropzone = document.getElementById('photoDropzone');
  const photoFileInput = document.getElementById('photoFileInput');
  const btnBrowsePhotos = document.getElementById('btnBrowsePhotos');

  if (photoDropzone && photoFileInput && btnBrowsePhotos) {
    btnBrowsePhotos.addEventListener('click', () => photoFileInput.click());
    photoFileInput.addEventListener('change', () => {
      if (photoFileInput.files.length > 0) {
        alert(`${photoFileInput.files.length} photo(s) uploaded successfully!`);
      }
    });
  }

  // Final Submit Handler
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const confirmAccuracy = document.getElementById('confirmAccuracy');
      if (confirmAccuracy && !confirmAccuracy.checked) {
        form.classList.add('was-validated');
        return;
      }

      if (wizardSuccessAlert) {
        wizardSuccessAlert.classList.remove('d-none');
        btnSubmit.disabled = true;
        btnBack.disabled = true;
      }
    });
  }
});