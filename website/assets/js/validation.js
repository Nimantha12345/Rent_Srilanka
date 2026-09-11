document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  const loginEmail = document.getElementById('loginEmail');
  const loginPassword = document.getElementById('loginPassword');
  const btnTogglePassword = document.getElementById('btnTogglePassword');
  const passwordToggleIcon = document.getElementById('passwordToggleIcon');
  const btnLoginSubmit = document.getElementById('btnLoginSubmit');
  const btnSubmitText = document.getElementById('btnSubmitText');
  const btnSubmitSpinner = document.getElementById('btnSubmitSpinner');
  const loginErrorAlert = document.getElementById('loginErrorAlert');
  const forgotPasswordForm = document.getElementById('forgotPasswordForm');

  // 1. Password Visibility Toggle
  if (btnTogglePassword && loginPassword && passwordToggleIcon) {
    btnTogglePassword.addEventListener('click', () => {
      const isPassword = loginPassword.getAttribute('type') === 'password';
      loginPassword.setAttribute('type', isPassword ? 'text' : 'password');
      
      if (isPassword) {
        passwordToggleIcon.classList.remove('bi-eye');
        passwordToggleIcon.classList.add('bi-eye-slash');
      } else {
        passwordToggleIcon.classList.remove('bi-eye-slash');
        passwordToggleIcon.classList.add('bi-eye');
      }
    });
  }

  // 2. Form Validation & Demo Login Submission Loading State
  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      e.stopPropagation();

      // Clear previous error
      if (loginErrorAlert) loginErrorAlert.classList.add('d-none');

      // HTML5 Validation check
      if (!loginForm.checkValidity()) {
        loginForm.classList.add('was-validated');
        return;
      }

      loginForm.classList.add('was-validated');

      // Trigger Demo Loading State (NO passwords stored in JS)
      if (btnLoginSubmit && btnSubmitText && btnSubmitSpinner) {
        btnLoginSubmit.disabled = true;
        btnSubmitSpinner.classList.remove('d-none');
        btnSubmitText.textContent = 'Authenticating...';

        setTimeout(() => {
          // Demo Auth Check Simulation
          const emailVal = loginEmail.value.trim().toLowerCase();

          if (emailVal === 'error@rentsrilanka.lk') {
            // Show error state demo
            if (loginErrorAlert) loginErrorAlert.classList.remove('d-none');
            btnLoginSubmit.disabled = false;
            btnSubmitSpinner.classList.add('d-none');
            btnSubmitText.textContent = 'Log In';
          } else {
            // Success redirect simulation to the signed-in renter's profile
            window.location.href = 'profile.php';
          }
        }, 1200); // 1.2s simulated API delay
      }
    });
  }

  // 3. Forgot Password Form Submission Demo
  if (forgotPasswordForm) {
    forgotPasswordForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('A password reset link has been sent to your email address.');
      const modalEl = document.getElementById('forgotPasswordModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();
      forgotPasswordForm.reset();
    });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  // Account Type Card Selection Toggle
  const cardRenter = document.getElementById('cardRenter');
  const cardOwner = document.getElementById('cardOwner');
  const typeRenter = document.getElementById('typeRenter');
  const typeOwner = document.getElementById('typeOwner');

  if (cardRenter && cardOwner && typeRenter && typeOwner) {
    cardRenter.addEventListener('click', () => {
      cardRenter.classList.add('active', 'border-2', 'border-primary');
      cardRenter.classList.remove('border-light-custom');
      cardOwner.classList.remove('active', 'border-2', 'border-primary');
      cardOwner.classList.add('border-light-custom');
      typeRenter.checked = true;
    });

    cardOwner.addEventListener('click', () => {
      cardOwner.classList.add('active', 'border-2', 'border-primary');
      cardOwner.classList.remove('border-light-custom');
      cardRenter.classList.remove('active', 'border-2', 'border-primary');
      cardRenter.classList.add('border-light-custom');
      typeOwner.checked = true;
    });
  }

  // Password Visibility Toggle for Registration
  const btnToggleRegPassword = document.getElementById('btnToggleRegPassword');
  const regPassword = document.getElementById('regPassword');
  const regPasswordToggleIcon = document.getElementById('regPasswordToggleIcon');

  if (btnToggleRegPassword && regPassword && regPasswordToggleIcon) {
    btnToggleRegPassword.addEventListener('click', () => {
      const isPassword = regPassword.getAttribute('type') === 'password';
      regPassword.setAttribute('type', isPassword ? 'text' : 'password');
      regPasswordToggleIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
  }

  // Password Strength Calculation
  const passwordStrengthBar = document.getElementById('passwordStrengthBar');
  const passwordStrengthText = document.getElementById('passwordStrengthText');

  if (regPassword && passwordStrengthBar && passwordStrengthText) {
    regPassword.addEventListener('input', function() {
      const val = this.value;
      let score = 0;

      if (val.length >= 8) score += 25;
      if (/[A-Z]/.test(val)) score += 25;
      if (/[0-9]/.test(val)) score += 25;
      if (/[^A-Za-z0-9]/.test(val)) score += 25;

      passwordStrengthBar.style.width = `${score}%`;

      if (score <= 25) {
        passwordStrengthBar.className = 'progress-bar bg-danger';
        passwordStrengthText.textContent = 'Password strength: Too weak';
      } else if (score <= 50) {
        passwordStrengthBar.className = 'progress-bar bg-warning';
        passwordStrengthText.textContent = 'Password strength: Medium';
      } else if (score <= 75) {
        passwordStrengthBar.className = 'progress-bar bg-info';
        passwordStrengthText.textContent = 'Password strength: Good';
      } else {
        passwordStrengthBar.className = 'progress-bar bg-success';
        passwordStrengthText.textContent = 'Password strength: Strong';
      }
    });
  }

  // Registration Form Real-time Validation & Submission
  const registerForm = document.getElementById('registerForm');
  const regConfirmPassword = document.getElementById('regConfirmPassword');
  const regPhone = document.getElementById('regPhone');
  const registerSuccessAlert = document.getElementById('registerSuccessAlert');
  const registerSuccessText = document.getElementById('registerSuccessText');
  const registerSuccessBtn = document.getElementById('registerSuccessBtn');
  const btnRegisterSubmit = document.getElementById('btnRegisterSubmit');
  const btnRegSubmitText = document.getElementById('btnRegSubmitText');
  const btnRegSubmitSpinner = document.getElementById('btnRegSubmitSpinner');

  if (registerForm) {
    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      e.stopPropagation();

      let isCustomValid = true;

      // 1. Password Match Validation
      if (regPassword && regConfirmPassword) {
        if (regPassword.value !== regConfirmPassword.value) {
          regConfirmPassword.setCustomValidity('Passwords do not match.');
          isCustomValid = false;
        } else {
          regConfirmPassword.setCustomValidity('');
        }
      }

      // 2. Sri Lankan Phone Format Check (07XXXXXXXX or +947XXXXXXXX)
      if (regPhone) {
        const phoneRegex = /^(?:0|94|\+94)?(7[01245678]\d{7})$/;
        if (!phoneRegex.test(regPhone.value.trim())) {
          regPhone.setCustomValidity('Invalid Sri Lankan phone number.');
          isCustomValid = false;
        } else {
          regPhone.setCustomValidity('');
        }
      }

      if (!registerForm.checkValidity() || !isCustomValid) {
        registerForm.classList.add('was-validated');
        return;
      }

      registerForm.classList.add('was-validated');

      // Trigger Demo Submission Loading State & Success Display
      if (btnRegisterSubmit && btnRegSubmitText && btnRegSubmitSpinner) {
        btnRegisterSubmit.disabled = true;
        btnRegSubmitSpinner.classList.remove('d-none');
        btnRegSubmitText.textContent = 'Creating Account...';

        setTimeout(() => {
          btnRegisterSubmit.disabled = false;
          btnRegSubmitSpinner.classList.add('d-none');
          btnRegSubmitText.textContent = 'Create Account';

          // Determine which account type was chosen before the form resets
          const selectedType = document.querySelector('input[name="accountType"]:checked');
          const isOwner = selectedType && selectedType.value === 'owner';

          if (registerSuccessText && registerSuccessBtn) {
            if (isOwner) {
              registerSuccessText.textContent = 'Welcome to RentSriLanka! Your landlord account is ready — list your first property or head to your dashboard.';
              registerSuccessBtn.textContent = 'Go to Owner Dashboard';
              registerSuccessBtn.setAttribute('href', '../owner/dashboard.php');
            } else {
              registerSuccessText.textContent = 'Welcome to RentSriLanka! Your registration is complete.';
              registerSuccessBtn.textContent = 'Go to My Profile';
              registerSuccessBtn.setAttribute('href', 'profile.php');
            }
          }

          // Show Success State
          if (registerSuccessAlert) {
            registerSuccessAlert.classList.remove('d-none');
            registerSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          }

          registerForm.reset();
          registerForm.classList.remove('was-validated');
          if (passwordStrengthBar) passwordStrengthBar.style.width = '0%';
          if (passwordStrengthText) passwordStrengthText.textContent = 'Password strength: Too weak';

          // Restore the default "renter" card visual state after reset
          if (cardRenter && cardOwner && typeRenter) {
            cardRenter.classList.add('active', 'border-2', 'border-primary');
            cardRenter.classList.remove('border-light-custom');
            cardOwner.classList.remove('active', 'border-2', 'border-primary');
            cardOwner.classList.add('border-light-custom');
            typeRenter.checked = true;
          }
        }, 1200);
      }
    });
  }
});