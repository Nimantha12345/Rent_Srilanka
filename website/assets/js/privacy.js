document.addEventListener('DOMContentLoaded', () => {
  const cookieBanner = document.getElementById('cookieConsentBanner');
  const btnAccept = document.getElementById('btnAcceptCookies');
  const btnReject = document.getElementById('btnRejectCookies');

  // 1. Check Cookie Consent Storage
  if (localStorage.getItem('rsl_cookie_consent') === 'accepted') {
    if (cookieBanner) cookieBanner.classList.add('banner-hidden');
  }

  // 2. Accept Cookie Event
  if (btnAccept) {
    btnAccept.addEventListener('click', () => {
      localStorage.setItem('rsl_cookie_consent', 'accepted');
      if (cookieBanner) cookieBanner.classList.add('banner-hidden');
    });
  }

  // 3. Preferences / Reject Event
  if (btnReject) {
    btnReject.addEventListener('click', () => {
      localStorage.setItem('rsl_cookie_consent', 'essential_only');
      if (cookieBanner) cookieBanner.classList.add('banner-hidden');
    });
  }

  // 4. Table of Contents Scrollspy Highlight
  const tocLinks = document.querySelectorAll('.legal-toc-nav .nav-link');
  const sections = document.querySelectorAll('.legal-body-content section[id]');

  function highlightPrivacyTOC() {
    let currentSectionId = '';
    const scrollPosition = window.scrollY + 120;

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;

      if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
        currentSectionId = section.getAttribute('id');
      }
    });

    if (currentSectionId) {
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${currentSectionId}`) {
          link.classList.add('active');
        }
      });
    }
  }

  window.addEventListener('scroll', highlightPrivacyTOC);
});