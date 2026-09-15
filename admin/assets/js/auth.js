document.addEventListener('DOMContentLoaded', () => {
  
  // 1. DOM Elements Selection
  const ownerTab = document.getElementById('owner-tab');
  const adminTab = document.getElementById('admin-tab');
  const loginRoleInput = document.getElementById('loginRole');
  const ownerRegisterLink = document.getElementById('ownerRegisterLink');
  
  const btnTogglePassword = document.getElementById('btnTogglePassword');
  const loginPassword = document.getElementById('loginPassword');
  const passwordToggleIcon = document.getElementById('passwordToggleIcon');
  
  const loginForm = document.getElementById('loginForm');
  const loginErrorAlert = document.getElementById('loginErrorAlert');
  const loginErrorText = document.getElementById('loginErrorText');
  const btnSubmitText = document.getElementById('btnSubmitText');
  const btnSubmitSpinner = document.getElementById('btnSubmitSpinner');
  
  const forgotPasswordForm = document.getElementById('forgotPasswordForm');
  const standaloneForgotPasswordForm = document.getElementById('standaloneForgotPasswordForm');

  // 2. Role Switcher Logic (Owner ↔ Admin)
  if (ownerTab && adminTab && loginRoleInput) {
    ownerTab.addEventListener('click', () => {
      ownerTab.classList.add('active');
      adminTab.classList.remove('active');
      loginRoleInput.value = 'owner';
      
      if (ownerRegisterLink) {
        ownerRegisterLink.classList.remove('d-none');
      }
      if (loginErrorAlert) {
        loginErrorAlert.classList.add('d-none');
      }
    });

    adminTab.addEventListener('click', () => {
      adminTab.classList.add('active');
      ownerTab.classList.remove('active');
      loginRoleInput.value = 'admin';
      
      if (ownerRegisterLink) {
        ownerRegisterLink.classList.add('d-none');
      }
      if (loginErrorAlert) {
        loginErrorAlert.classList.add('d-none');
      }
    });
  }

  // 3. Toggle Password Visibility (Eye Icon Click)
  if (btnTogglePassword && loginPassword && passwordToggleIcon) {
    btnTogglePassword.addEventListener('click', () => {
      const isPassword = loginPassword.type === 'password';
      loginPassword.type = isPassword ? 'text' : 'password';
      
      if (isPassword) {
        passwordToggleIcon.classList.remove('bi-eye');
        passwordToggleIcon.classList.add('bi-eye-slash');
      } else {
        passwordToggleIcon.classList.remove('bi-eye-slash');
        passwordToggleIcon.classList.add('bi-eye');
      }
    });
  }

  // 4. Login Form Submission Handler
  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const email = document.getElementById('loginEmail').value.trim();
      const password = loginPassword.value.trim();
      const role = loginRoleInput ? loginRoleInput.value : 'owner';

      // Bootstrap Client Validation Check
      if (!loginForm.checkValidity()) {
        e.stopPropagation();
        loginForm.classList.add('was-validated');
        return;
      }

      // UI Loading State
      if (btnSubmitText && btnSubmitSpinner) {
        btnSubmitText.textContent = 'Authenticating...';
        btnSubmitSpinner.classList.remove('d-none');
      }
      if (loginErrorAlert) loginErrorAlert.classList.add('d-none');

      // Simulate Authentication API Call (Replace with real AJAX/Fetch backend logic)
      setTimeout(() => {
        // Reset Loading State
        if (btnSubmitText && btnSubmitSpinner) {
          btnSubmitText.textContent = 'Log In to Portal';
          btnSubmitSpinner.classList.add('d-none');
        }

        // Demo Credential Check Logic
        if (email === 'admin@rentsrilanka.lk' && password === 'admin123' && role === 'admin') {
          window.location.href = 'index.php'; // Admin Dashboard Redirect
        } else if (email && password && role === 'owner') {
          window.location.href = 'owner-dashboard.php'; // Owner Dashboard Redirect
        } else {
          // Show Error
          if (loginErrorAlert && loginErrorText) {
            loginErrorText.textContent = `Invalid ${role} credentials. Please check your email and password.`;
            loginErrorAlert.classList.remove('d-none');
          }
        }
      }, 1200);
    });
  }

  // 5. Modal Forgot Password Form Handler
  if (forgotPasswordForm) {
    forgotPasswordForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const resetEmail = document.getElementById('resetEmail').value.trim();

      if (!resetEmail) return;

      alert(`Password reset instructions have been sent to ${resetEmail}.`);
      
      const modalEl = document.getElementById('forgotPasswordModal');
      if (modalEl) {
        const bsModal = bootstrap.Modal.getInstance(modalEl);
        if (bsModal) bsModal.hide();
      }
      forgotPasswordForm.reset();
    });
  }

  // 6. Standalone Forgot Password Page Form Handler
  if (standaloneForgotPasswordForm) {
    standaloneForgotPasswordForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const resetEmailInput = document.getElementById('resetEmailInput').value.trim();

      if (!resetEmailInput) return;

      alert(`Password reset link successfully dispatched to ${resetEmailInput}. Please check your email inbox.`);
      window.location.href = 'login.php';
    });
  }

});