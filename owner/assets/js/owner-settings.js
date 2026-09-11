document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const settingsForms = document.querySelectorAll('.settings-form');
  const unsavedChangesBanner = document.getElementById('unsavedChangesBanner');
  const btnDiscardChanges = document.getElementById('btnDiscardChanges');
  const btnBannerSave = document.getElementById('btnBannerSave');
  const settingsAlertContainer = document.getElementById('settingsAlertContainer');
  const alertMessageText = document.getElementById('alertMessageText');

  let hasUnsavedChanges = false;

  // Track Unsaved Changes
  settingsForms.forEach(form => {
    form.addEventListener('change', () => {
      markUnsaved();
    });
    form.addEventListener('input', () => {
      markUnsaved();
    });
  });

  function markUnsaved() {
    hasUnsavedChanges = true;
    if (unsavedChangesBanner) unsavedChangesBanner.classList.remove('d-none');
  }

  function clearUnsaved() {
    hasUnsavedChanges = false;
    if (unsavedChangesBanner) unsavedChangesBanner.classList.add('d-none');
  }

  if (btnDiscardChanges) {
    btnDiscardChanges.addEventListener('click', () => {
      clearUnsaved();
      location.reload();
    });
  }

  // Generic Section Form Submit Simulation
  document.querySelectorAll('.btn-save-section').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const form = btn.closest('form');
      if (form && !form.checkValidity()) {
        form.reportValidity();
        return;
      }

      // Show Saving State
      const originalText = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Saving...`;

      setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = originalText;
        clearUnsaved();
        showAlert('Settings updated successfully.');
      }, 1000);
    });
  });

  if (btnBannerSave) {
    btnBannerSave.addEventListener('click', () => {
      clearUnsaved();
      showAlert('All pending settings saved successfully.');
    });
  }

  function showAlert(msg) {
    if (alertMessageText) alertMessageText.textContent = msg;
    if (settingsAlertContainer) {
      settingsAlertContainer.classList.remove('d-none');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }

  // 1. Password Strength & Match Validation
  const newPasswordInput = document.getElementById('newPassword');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  const pwStrengthBar = document.getElementById('pwStrengthBar');
  const pwStrengthText = document.getElementById('pwStrengthText');
  const pwMatchError = document.getElementById('pwMatchError');

  // Requirement elements
  const reqMinChar = document.getElementById('reqMinChar');
  const reqUpper = document.getElementById('reqUpper');
  const reqLower = document.getElementById('reqLower');
  const reqNum = document.getElementById('reqNum');
  const reqSpecial = document.getElementById('reqSpecial');

  if (newPasswordInput) {
    newPasswordInput.addEventListener('input', () => {
      const val = newPasswordInput.value;
      let score = 0;

      // Min 8
      const hasMin = val.length >= 8;
      updateRequirement(reqMinChar, hasMin);
      if (hasMin) score += 20;

      // Uppercase
      const hasUp = /[A-Z]/.test(val);
      updateRequirement(reqUpper, hasUp);
      if (hasUp) score += 20;

      // Lowercase
      const hasLow = /[a-z]/.test(val);
      updateRequirement(reqLower, hasLow);
      if (hasLow) score += 20;

      // Number
      const hasN = /[0-9]/.test(val);
      updateRequirement(reqNum, hasN);
      if (hasN) score += 20;

      // Special
      const hasSpec = /[!@#$%^&*(),.?":{}|<>]/.test(val);
      updateRequirement(reqSpecial, hasSpec);
      if (hasSpec) score += 20;

      // Strength bar updates
      if (pwStrengthBar) {
        pwStrengthBar.style.width = `${score}%`;
        if (score <= 40) {
          pwStrengthBar.className = 'progress-bar bg-danger';
          if (pwStrengthText) pwStrengthText.textContent = 'Password strength: Weak';
        } else if (score <= 80) {
          pwStrengthBar.className = 'progress-bar bg-warning';
          if (pwStrengthText) pwStrengthText.textContent = 'Password strength: Moderate';
        } else {
          pwStrengthBar.className = 'progress-bar bg-success';
          if (pwStrengthText) pwStrengthText.textContent = 'Password strength: Strong';
        }
      }

      validatePwMatch();
    });
  }

  if (confirmPasswordInput) {
    confirmPasswordInput.addEventListener('input', validatePwMatch);
  }

  function validatePwMatch() {
    if (!newPasswordInput || !confirmPasswordInput || !pwMatchError) return;
    if (confirmPasswordInput.value && confirmPasswordInput.value !== newPasswordInput.value) {
      pwMatchError.classList.remove('d-none');
    } else {
      pwMatchError.classList.add('d-none');
    }
  }

  function updateRequirement(el, isMet) {
    if (!el) return;
    if (isMet) {
      el.classList.add('req-met');
      el.innerHTML = `<i class="bi bi-check-circle-fill text-success me-1"></i>${el.textContent.replace(/^.*?i>/, '')}`;
    } else {
      el.classList.remove('req-met');
      el.innerHTML = `<i class="bi bi-x-circle text-danger me-1"></i>${el.textContent.replace(/^.*?i>/, '')}`;
    }
  }

  // Toggle Show/Hide Password Buttons
  document.querySelectorAll('.btn-toggle-pw').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = btn.previousElementSibling;
      if (input && input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = `<i class="bi bi-eye-slash"></i>`;
      } else if (input) {
        input.type = 'password';
        btn.innerHTML = `<i class="bi bi-eye"></i>`;
      }
    });
  });

  // Password Submit Action
  const btnUpdatePasswordSubmit = document.getElementById('btnUpdatePasswordSubmit');
  const changePasswordModalEl = document.getElementById('changePasswordModal');
  let bsPwModal = changePasswordModalEl ? new bootstrap.Modal(changePasswordModalEl) : null;

  if (btnUpdatePasswordSubmit) {
    btnUpdatePasswordSubmit.addEventListener('click', () => {
      const curr = document.getElementById('currPassword')?.value;
      const newP = newPasswordInput?.value;
      const conf = confirmPasswordInput?.value;

      if (!curr || !newP || !conf) {
        alert('Please fill out all password fields.');
        return;
      }
      if (newP !== conf) {
        alert('New password and confirmation do not match.');
        return;
      }

      btnUpdatePasswordSubmit.disabled = true;
      btnUpdatePasswordSubmit.textContent = 'Updating...';

      setTimeout(() => {
        btnUpdatePasswordSubmit.disabled = false;
        btnUpdatePasswordSubmit.textContent = 'Update Password';
        if (bsPwModal) bsPwModal.hide();
        showAlert('Password changed successfully.');
      }, 1200);
    });
  }

  // 2. Enable 2FA Trigger
  const btnEnable2FA = document.getElementById('btnEnable2FA');
  const twoFactorModalEl = document.getElementById('twoFactorModal');
  let bs2faModal = twoFactorModalEl ? new bootstrap.Modal(twoFactorModalEl) : null;

  if (btnEnable2FA && bs2faModal) {
    btnEnable2FA.addEventListener('click', () => {
      bs2faModal.show();
    });
  }

  // 3. Session Termination Handlers
  document.querySelectorAll('.btn-terminate-session').forEach(btn => {
    btn.addEventListener('click', () => {
      const sessionRow = btn.closest('.list-group-item');
      if (sessionRow) {
        sessionRow.remove();
        showAlert('Session terminated successfully.');
      }
    });
  });

  const btnLogoutAllDevices = document.getElementById('btnLogoutAllDevices');
  if (btnLogoutAllDevices) {
    btnLogoutAllDevices.addEventListener('click', () => {
      if (confirm('Are you sure you want to log out all other active sessions?')) {
        document.querySelectorAll('[data-session-id="SESS-902"]').forEach(el => el.remove());
        showAlert('Logged out all other devices successfully.');
      }
    });
  }

  // 4. Deactivate Account Trigger
  const btnDeactivateAccount = document.getElementById('btnDeactivateAccount');
  const deactivateModalEl = document.getElementById('deactivateModal');
  let bsDeactivateModal = deactivateModalEl ? new bootstrap.Modal(deactivateModalEl) : null;

  if (btnDeactivateAccount && bsDeactivateModal) {
    btnDeactivateAccount.addEventListener('click', () => {
      bsDeactivateModal.show();
    });
  }

  const btnConfirmDeactivate = document.getElementById('btnConfirmDeactivate');
  if (btnConfirmDeactivate) {
    btnConfirmDeactivate.addEventListener('click', () => {
      alert('Account deactivated. Redirecting to login page...');
      window.location.href = '../login.php';
    });
  }

  // 5. Delete Account typed "DELETE" confirmation
  const btnDeleteAccount = document.getElementById('btnDeleteAccount');
  const deleteAccountModalEl = document.getElementById('deleteAccountModal');
  const deleteConfirmationInput = document.getElementById('deleteConfirmationInput');
  const btnConfirmDeleteFinal = document.getElementById('btnConfirmDeleteFinal');
  let bsDeleteModal = deleteAccountModalEl ? new bootstrap.Modal(deleteAccountModalEl) : null;

  if (btnDeleteAccount && bsDeleteModal) {
    btnDeleteAccount.addEventListener('click', () => {
      if (deleteConfirmationInput) deleteConfirmationInput.value = '';
      if (btnConfirmDeleteFinal) btnConfirmDeleteFinal.disabled = true;
      bsDeleteModal.show();
    });
  }

  if (deleteConfirmationInput && btnConfirmDeleteFinal) {
    deleteConfirmationInput.addEventListener('input', () => {
      if (deleteConfirmationInput.value.trim() === 'DELETE') {
        btnConfirmDeleteFinal.disabled = false;
      } else {
        btnConfirmDeleteFinal.disabled = true;
      }
    });
  }

  if (btnConfirmDeleteFinal) {
    btnConfirmDeleteFinal.addEventListener('click', () => {
      alert('Account deleted permanently. Redirecting to home page...');
      window.location.href = '../index.php';
    });
  }
});