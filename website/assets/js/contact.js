document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('contactForm');
  const successAlert = document.getElementById('contactSuccessAlert');

  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();

      if (!contactForm.checkValidity()) {
        e.stopPropagation();
        contactForm.classList.add('was-validated');
        return;
      }

      // Display Success Alert
      if (successAlert) {
        successAlert.classList.remove('d-none');
        contactForm.reset();
        contactForm.classList.remove('was-validated');
        
        // Auto hide success alert
        setTimeout(() => {
          successAlert.classList.add('d-none');
        }, 5000);
      }
    });
  }
});