document.addEventListener('DOMContentLoaded', () => {
  const securityForm = document.getElementById('securityForm');
  const btnSaveSecurity = document.getElementById('btnSaveSecurity');
  const btnSaveSecurityText = document.getElementById('btnSaveSecurityText');
  const btnSaveSecuritySpinner = document.getElementById('btnSaveSecuritySpinner');
  const settingsSavedAlert = document.getElementById('settingsSavedAlert');
  const setNewPassword = document.getElementById('setNewPassword');
  const setConfirmPassword = document.getElementById('setConfirmPassword');

  function showSaved() {
    if (settingsSavedAlert) {
      settingsSavedAlert.classList.remove('d-none');
      settingsSavedAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      setTimeout(() => settingsSavedAlert.classList.add('d-none'), 4000);
    }
  }

  if (securityForm) {
    securityForm.addEventListener('submit', (e) => {
      e.preventDefault();

      if (setNewPassword && setConfirmPassword && setNewPassword.value && setNewPassword.value !== setConfirmPassword.value) {
        setConfirmPassword.setCustomValidity('Passwords do not match.');
        securityForm.reportValidity();
        return;
      }
      if (setConfirmPassword) setConfirmPassword.setCustomValidity('');

      if (btnSaveSecurity && btnSaveSecurityText && btnSaveSecuritySpinner) {
        btnSaveSecurity.disabled = true;
        btnSaveSecuritySpinner.classList.remove('d-none');
        btnSaveSecurityText.textContent = 'Saving...';

        setTimeout(() => {
          btnSaveSecurity.disabled = false;
          btnSaveSecuritySpinner.classList.add('d-none');
          btnSaveSecurityText.textContent = 'Save Changes';
          securityForm.reset();
          showSaved();
        }, 900);
      }
    });
  }

  // Toggle switches auto-save (demo feedback only)
  document.querySelectorAll('.form-switch .form-check-input').forEach((toggle) => {
    toggle.addEventListener('change', showSaved);
  });
});
