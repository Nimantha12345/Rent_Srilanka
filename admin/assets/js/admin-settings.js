document.addEventListener('DOMContentLoaded', () => {
  // Form References
  const websiteForm = document.getElementById('websiteSettingsForm');
  const securityForm = document.getElementById('securitySettingsForm');

  // Form Submission Alerts
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