document.addEventListener('DOMContentLoaded', () => {
  const profileForm = document.getElementById('profileForm');
  const btnSaveProfile = document.getElementById('btnSaveProfile');
  const btnSaveProfileText = document.getElementById('btnSaveProfileText');
  const btnSaveProfileSpinner = document.getElementById('btnSaveProfileSpinner');
  const profileSavedAlert = document.getElementById('profileSavedAlert');

  if (profileForm) {
    profileForm.addEventListener('submit', (e) => {
      e.preventDefault();

      if (btnSaveProfile && btnSaveProfileText && btnSaveProfileSpinner) {
        btnSaveProfile.disabled = true;
        btnSaveProfileSpinner.classList.remove('d-none');
        btnSaveProfileText.textContent = 'Saving...';

        setTimeout(() => {
          btnSaveProfile.disabled = false;
          btnSaveProfileSpinner.classList.add('d-none');
          btnSaveProfileText.textContent = 'Save Changes';

          if (profileSavedAlert) {
            profileSavedAlert.classList.remove('d-none');
            profileSavedAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            setTimeout(() => profileSavedAlert.classList.add('d-none'), 4000);
          }
        }, 900);
      }
    });
  }
});
