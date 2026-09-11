document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('inquirySearchInput');
  const tabs = document.querySelectorAll('#inquiryTabs button');
  const btnMarkAllRead = document.getElementById('btnMarkAllRead');

  // Modal Elements
  const detailModalEl = document.getElementById('inquiryDetailModal');
  const modalRenterName = document.getElementById('modalRenterName');
  const modalStatusBadge = document.getElementById('modalStatusBadge');
  const modalInquiryDate = document.getElementById('modalInquiryDate');
  const modalPropTitle = document.getElementById('modalPropTitle');
  const modalPhoneBtn = document.getElementById('modalPhoneBtn');
  const modalPhoneText = document.getElementById('modalPhoneText');
  const modalWhatsappBtn = document.getElementById('modalWhatsappBtn');
  const modalEmailBtn = document.getElementById('modalEmailBtn');
  const modalMessageText = document.getElementById('modalMessageText');
  const modalBtnArchive = document.getElementById('modalBtnArchive');

  let bsDetailModal = detailModalEl ? new bootstrap.Modal(detailModalEl) : null;
  let activeInquiryId = null;

  // 1. Tab & Search Filtering
  function filterInquiries() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const activeTab = document.querySelector('#inquiryTabs button.active');
    const statusVal = activeTab ? activeTab.getAttribute('data-status') : 'all';

    const tableRows = document.querySelectorAll('.inquiry-row-item');
    const mobileCards = document.querySelectorAll('.inquiry-card-item');

    tableRows.forEach(row => {
      const name = (row.getAttribute('data-name') || '').toLowerCase();
      const prop = (row.getAttribute('data-prop') || '').toLowerCase();
      const msg = (row.getAttribute('data-message') || '').toLowerCase();
      const status = row.getAttribute('data-status');

      const matchesSearch = name.includes(searchVal) || prop.includes(searchVal) || msg.includes(searchVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesStatus) {
        row.classList.remove('d-none');
      } else {
        row.classList.add('d-none');
      }
    });

    mobileCards.forEach(card => {
      const name = (card.getAttribute('data-name') || '').toLowerCase();
      const prop = (card.getAttribute('data-prop') || '').toLowerCase();
      const msg = (card.getAttribute('data-message') || '').toLowerCase();
      const status = card.getAttribute('data-status');

      const matchesSearch = name.includes(searchVal) || prop.includes(searchVal) || msg.includes(searchVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });
  }

  if (searchInput) searchInput.addEventListener('input', filterInquiries);

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      setTimeout(filterInquiries, 50);
    });
  });

  // 2. View Inquiry Modal Trigger
  document.addEventListener('click', (e) => {
    const viewBtn = e.target.closest('.btn-view-inquiry');
    if (viewBtn) {
      e.preventDefault();
      const parent = viewBtn.closest('.inquiry-row-item') || viewBtn.closest('.inquiry-card-item');
      if (!parent) return;

      activeInquiryId = parent.getAttribute('data-id');
      const name = parent.getAttribute('data-name');
      const phone = parent.getAttribute('data-phone');
      const email = parent.getAttribute('data-email');
      const prop = parent.getAttribute('data-prop');
      const date = parent.getAttribute('data-date');
      const status = parent.getAttribute('data-status');
      const msg = parent.getAttribute('data-message');

      // Populate Modal Fields
      if (modalRenterName) modalRenterName.textContent = name;
      if (modalStatusBadge) {
        modalStatusBadge.textContent = status;
        modalStatusBadge.className = `badge ${getStatusBadgeClass(status)}`;
      }
      if (modalInquiryDate) modalInquiryDate.innerHTML = `<i class="bi bi-clock me-1"></i>${date}`;
      if (modalPropTitle) modalPropTitle.innerHTML = `<i class="bi bi-house-door me-1"></i>${prop}`;
      if (modalPhoneBtn) modalPhoneBtn.href = `tel:${phone}`;
      if (modalPhoneText) modalPhoneText.textContent = phone;
      if (modalWhatsappBtn) modalWhatsappBtn.href = `https://wa.me/94${phone.substring(1)}`;
      if (modalEmailBtn) modalEmailBtn.href = `mailto:${email}`;
      if (modalMessageText) modalMessageText.textContent = msg;

      // Mark row as read automatically on viewing
      markInquiryAsRead(parent);

      if (bsDetailModal) bsDetailModal.show();
    }

    // Mark as Read Button Action
    const readBtn = e.target.closest('.btn-mark-read');
    if (readBtn) {
      e.preventDefault();
      const parent = readBtn.closest('.inquiry-row-item') || readBtn.closest('.inquiry-card-item');
      if (parent) markInquiryAsRead(parent);
    }

    // Archive / Delete Action
    const archiveBtn = e.target.closest('.btn-archive-inquiry');
    if (archiveBtn) {
      e.preventDefault();
      const parent = archiveBtn.closest('.inquiry-row-item') || archiveBtn.closest('.inquiry-card-item');
      if (parent && confirm('Are you sure you want to archive this inquiry?')) {
        parent.remove();
        recalculateInquiryCounts();
      }
    }
  });

  // Archive from inside Modal
  if (modalBtnArchive) {
    modalBtnArchive.addEventListener('click', () => {
      if (activeInquiryId && confirm('Are you sure you want to archive this inquiry?')) {
        const items = document.querySelectorAll(`[data-id="${activeInquiryId}"]`);
        items.forEach(el => el.remove());
        if (bsDetailModal) bsDetailModal.hide();
        recalculateInquiryCounts();
      }
    });
  }

  // Mark All Read Button Action
  if (btnMarkAllRead) {
    btnMarkAllRead.addEventListener('click', () => {
      const unreadItems = document.querySelectorAll('.unread-row');
      unreadItems.forEach(item => markInquiryAsRead(item));
    });
  }

  // Helpers
  function markInquiryAsRead(element) {
    element.classList.remove('unread-row');
    const badge = element.querySelector('.badge.bg-danger-subtle');
    if (badge) {
      badge.className = 'badge bg-info-subtle text-info-emphasis border border-info-subtle';
      badge.textContent = 'Read';
      element.setAttribute('data-status', 'Read');
    }
    recalculateInquiryCounts();
  }

  function recalculateInquiryCounts() {
    const unreadCount = document.querySelectorAll('.unread-row').length;
    const sidebarBadge = document.getElementById('sidebarInquiriesBadge');
    const statNewCount = document.getElementById('statNewCount');

    if (sidebarBadge) sidebarBadge.textContent = unreadCount;
    if (statNewCount) statNewCount.textContent = unreadCount;
  }

  function getStatusBadgeClass(status) {
    switch (status) {
      case 'New': return 'bg-danger-subtle text-danger border border-danger-subtle';
      case 'Read': return 'bg-info-subtle text-info-emphasis border border-info-subtle';
      case 'Replied': return 'bg-success-subtle text-success border border-success-subtle';
      case 'Closed': return 'bg-secondary-subtle text-secondary border border-secondary-subtle';
      default: return 'bg-light text-navy';
    }
  }
});