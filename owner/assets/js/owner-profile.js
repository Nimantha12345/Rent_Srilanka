document.addEventListener('DOMContentLoaded', () => {
  // Profile Elements
  const profileForm = document.getElementById('ownerProfileForm');
  const profileSaveSuccessAlert = document.getElementById('profileSaveSuccessAlert');
  const btnUploadAvatar = document.getElementById('btnUploadAvatar');
  const avatarFileInput = document.getElementById('avatarFileInput');
  const profileAvatarPreview = document.getElementById('profileAvatarPreview');
  const btnRemoveAvatar = document.getElementById('btnRemoveAvatar');

  // Password Elements
  const changePasswordForm = document.getElementById('changePasswordForm');
  const currentPassword = document.getElementById('currentPassword');
  const newPassword = document.getElementById('newPassword');
  const confirmPassword = document.getElementById('confirmPassword');
  const confirmPasswordFeedback = document.getElementById('confirmPasswordFeedback');
  const passwordSuccessAlert = document.getElementById('passwordSuccessAlert');

  // Session Elements
  const btnLogoutAllSessions = document.getElementById('btnLogoutAllSessions');

  // 1. Profile Avatar Change Simulation
  if (btnUploadAvatar && avatarFileInput) {
    btnUploadAvatar.addEventListener('click', () => avatarFileInput.click());

    avatarFileInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
          if (profileAvatarPreview) profileAvatarPreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  }

  if (btnRemoveAvatar && profileAvatarPreview) {
    btnRemoveAvatar.addEventListener('click', () => {
      profileAvatarPreview.src = '../assets/images/properties/room-1.jpg';
    });
  }

  // 2. Profile Form Validation & Save
  if (profileForm) {
    profileForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      if (!profileForm.checkValidity()) {
        e.stopPropagation();
        profileForm.classList.add('was-validated');
        return;
      }

      if (profileSaveSuccessAlert) {
        profileSaveSuccessAlert.classList.remove('d-none');
        profileSaveSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        setTimeout(() => {
          profileSaveSuccessAlert.classList.add('d-none');
        }, 4000);
      }
    });
  }

  // 3. Password Validation & Form Submit
  if (changePasswordForm) {
    changePasswordForm.addEventListener('submit', (e) => {
      e.preventDefault();

      let isValid = true;
      confirmPassword.setCustomValidity('');

      if (!changePasswordForm.checkValidity()) {
        isValid = false;
      }

      if (newPassword.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity('Passwords do not match');
        if (confirmPasswordFeedback) confirmPasswordFeedback.textContent = 'Passwords do not match.';
        isValid = false;
      }

      if (!isValid) {
        e.stopPropagation();
        changePasswordForm.classList.add('was-validated');
        return;
      }

      if (passwordSuccessAlert) {
        passwordSuccessAlert.classList.remove('d-none');
        changePasswordForm.reset();
        changePasswordForm.classList.remove('was-validated');
        passwordSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        setTimeout(() => {
          passwordSuccessAlert.classList.add('d-none');
        }, 4000);
      }
    });
  }

  // 4. Revoke Individual Session
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('btn-revoke-session')) {
      e.preventDefault();
      const sessionCard = e.target.closest('.p-3');
      if (sessionCard && confirm('Are you sure you want to revoke this session?')) {
        sessionCard.remove();
      }
    }
  });

  // 5. Logout All Sessions
  if (btnLogoutAllSessions) {
    btnLogoutAllSessions.addEventListener('click', () => {
      if (confirm('Are you sure you want to log out from all other active devices?')) {
        const revocableSessions = document.querySelectorAll('.btn-revoke-session');
        revocableSessions.forEach(btn => {
          const card = btn.closest('.p-3');
          if (card) card.remove();
        });
        alert('All other active sessions have been logged out.');
      }
    });
  }
});