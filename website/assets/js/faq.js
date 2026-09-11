document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('faqSearchInput');
  const btnSearch = document.getElementById('btnFaqSearch');
  const btnReset = document.getElementById('btnResetFaqSearch');
  const noResultsAlert = document.getElementById('faqNoResults');
  const faqItems = document.querySelectorAll('.faq-item');
  const faqCategories = document.querySelectorAll('.faq-category-block');
  const categoryPills = document.querySelectorAll('.faq-category-pills .btn');

  // 1. Live FAQ Search Filter Function
  function performFaqSearch() {
    const term = searchInput ? searchInput.value.toLowerCase().trim() : '';
    let matchCount = 0;

    faqItems.forEach(item => {
      const text = item.textContent.toLowerCase();
      if (text.includes(term)) {
        item.classList.remove('d-none');
        matchCount++;

        // Auto expand matching accordion item when searching
        if (term.length > 2) {
          const collapseEl = item.querySelector('.accordion-collapse');
          if (collapseEl && !collapseEl.classList.contains('show')) {
            const bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false });
            bsCollapse.show();
          }
        }
      } else {
        item.classList.add('d-none');
      }
    });

    // Hide empty category sections
    faqCategories.forEach(cat => {
      const visibleChildItems = cat.querySelectorAll('.faq-item:not(.d-none)');
      if (visibleChildItems.length === 0 && term !== '') {
        cat.classList.add('d-none');
      } else {
        cat.classList.remove('d-none');
      }
    });

    // Toggle No Results Alert
    if (noResultsAlert) {
      if (matchCount === 0 && term !== '') {
        noResultsAlert.classList.remove('d-none');
      } else {
        noResultsAlert.classList.add('d-none');
      }
    }
  }

  // 2. Listeners
  if (searchInput) {
    searchInput.addEventListener('input', performFaqSearch);
  }

  if (btnSearch) {
    btnSearch.addEventListener('click', performFaqSearch);
  }

  if (btnReset) {
    btnReset.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      performFaqSearch();
    });
  }

  // 3. Category Pill Active Toggle
  categoryPills.forEach(pill => {
    pill.addEventListener('click', function() {
      categoryPills.forEach(p => p.classList.remove('active'));
      this.classList.add('active');
    });
  });
});