document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const chatCard = document.querySelector('.admin-chat-card');
  const conversationItems = document.querySelectorAll('.conversation-item');
  const searchInput = document.getElementById('conversationSearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const filterUserType = document.getElementById('filterUserType');
  const filterStatus = document.getElementById('filterStatus');
  const filterDate = document.getElementById('filterDate');
  const btnResetFilters = document.getElementById('btnResetFilters');
  const emptyListState = document.getElementById('emptyConversationList');
  const visibleCountBadge = document.getElementById('visible-conversations-count');
  const btnBackToList = document.getElementById('btnBackToList');

  // Header and Details Modal Elements
  const headerOwnerAvatar = document.getElementById('headerOwnerAvatar');
  const headerParticipantsText = document.getElementById('headerParticipantsText');
  const headerThreadMeta = document.getElementById('headerThreadMeta');
  const miniCardTitle = document.getElementById('miniCardTitle');
  const miniCardPropertyId = document.getElementById('miniCardPropertyId');
  const miniCardLocation = document.getElementById('miniCardLocation');
  const miniCardPrice = document.getElementById('miniCardPrice');

  // Modal Details
  const mdConversationId = document.getElementById('mdConversationId');
  const mdOwner = document.getElementById('mdOwner');
  const mdCustomer = document.getElementById('mdCustomer');
  const mdProperty = document.getElementById('mdProperty');
  const mdCreatedDate = document.getElementById('mdCreatedDate');
  const mdLastDate = document.getElementById('mdLastDate');
  const mdStatus = document.getElementById('mdStatus');

  // Modals
  const reportModalEl = document.getElementById('reportMessageModal');
  const actionModalEl = document.getElementById('actionConfirmModal');
  let bsReportModal = reportModalEl ? new bootstrap.Modal(reportModalEl) : null;
  let bsActionModal = actionModalEl ? new bootstrap.Modal(actionModalEl) : null;

  let activeConversationItem = document.querySelector('.conversation-item.active');
  let pendingActionType = null;

  // 1. Conversation Item Click Handler (Switch Active Thread)
  conversationItems.forEach(item => {
    item.addEventListener('click', () => {
      conversationItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      activeConversationItem = item;

      // Extract Data Attributes
      const convId = item.getAttribute('data-conversation-id');
      const ownerName = item.getAttribute('data-owner-name');
      const ownerId = item.getAttribute('data-owner-id');
      const customerName = item.getAttribute('data-customer-name');
      const customerId = item.getAttribute('data-customer-id');
      const propTitle = item.getAttribute('data-property-title');
      const propId = item.getAttribute('data-property-id');
      const propLoc = item.getAttribute('data-property-location');
      const propPrice = item.getAttribute('data-property-price');
      const createdDate = item.getAttribute('data-created-date');
      const lastDate = item.getAttribute('data-last-date');
      const status = item.getAttribute('data-status');

      // Update Chat Header & Mini Card UI
      if (headerOwnerAvatar) headerOwnerAvatar.textContent = getInitials(ownerName);
      if (headerParticipantsText) headerParticipantsText.textContent = `Owner: ${ownerName} ↔ Customer: ${customerName}`;
      if (headerThreadMeta) headerThreadMeta.textContent = `Thread ID: #${convId} · Created: ${createdDate}`;
      if (miniCardTitle) miniCardTitle.textContent = propTitle;
      if (miniCardPropertyId) miniCardPropertyId.textContent = `#${propId}`;
      if (miniCardLocation) miniCardLocation.innerHTML = `<i class="bi bi-geo-alt me-1 text-danger"></i>${propLoc}`;
      if (miniCardPrice) miniCardPrice.textContent = propPrice;

      // Update Modal Metadata Details
      if (mdConversationId) mdConversationId.textContent = `#${convId}`;
      if (mdOwner) mdOwner.textContent = `${ownerName} (ID: ${ownerId})`;
      if (mdCustomer) mdCustomer.textContent = `${customerName} (ID: ${customerId})`;
      if (mdProperty) mdProperty.textContent = `${propTitle} (${propId})`;
      if (mdCreatedDate) mdCreatedDate.textContent = createdDate;
      if (mdLastDate) mdLastDate.textContent = lastDate;
      if (mdStatus) mdStatus.textContent = status.toUpperCase();

      // Mobile Responsive Toggle to Chat View
      if (chatCard) chatCard.classList.add('chat-view-active');
    });
  });

  // Mobile Back Button
  if (btnBackToList && chatCard) {
    btnBackToList.addEventListener('click', () => {
      chatCard.classList.remove('chat-view-active');
    });
  }

  // Helper Initials
  function getInitials(name) {
    if (!name) return 'U';
    const parts = name.split(' ');
    if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase();
    return name.substring(0, 2).toUpperCase();
  }

  // 2. Filter & Search Logic
  function applyFilters() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const selectedType = filterUserType ? filterUserType.value : 'all';
    const selectedStatus = filterStatus ? filterStatus.value : 'all';
    let visibleCount = 0;

    conversationItems.forEach(item => {
      const owner = (item.getAttribute('data-owner-name') || '').toLowerCase();
      const customer = (item.getAttribute('data-customer-name') || '').toLowerCase();
      const title = (item.getAttribute('data-property-title') || '').toLowerCase();
      const propId = (item.getAttribute('data-property-id') || '').toLowerCase();
      const convId = (item.getAttribute('data-conversation-id') || '').toLowerCase();
      const type = item.getAttribute('data-user-type');
      const status = item.getAttribute('data-status');

      const matchesSearch = !searchTerm || owner.includes(searchTerm) || customer.includes(searchTerm) || title.includes(searchTerm) || propId.includes(searchTerm) || convId.includes(searchTerm);
      const matchesType = (selectedType === 'all') || (type === selectedType);
      const matchesStatus = (selectedStatus === 'all') || (status === selectedStatus);

      if (matchesSearch && matchesType && matchesStatus) {
        item.classList.remove('d-none');
        visibleCount++;
      } else {
        item.classList.add('d-none');
      }
    });

    if (visibleCountBadge) visibleCountBadge.textContent = `${visibleCount} Threads`;

    if (emptyListState) {
      if (visibleCount === 0) {
        emptyListState.classList.remove('d-none');
      } else {
        emptyListState.classList.add('d-none');
      }
    }
  }

  if (searchInput) searchInput.addEventListener('input', applyFilters);
  if (filterUserType) filterUserType.addEventListener('change', applyFilters);
  if (filterStatus) filterStatus.addEventListener('change', applyFilters);
  if (filterDate) filterDate.addEventListener('change', applyFilters);

  if (btnClearSearch) {
    btnClearSearch.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      applyFilters();
    });
  }

  if (btnResetFilters) {
    btnResetFilters.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      if (filterUserType) filterUserType.value = 'all';
      if (filterStatus) filterStatus.value = 'all';
      if (filterDate) filterDate.value = 'all';
      applyFilters();
    });
  }

  // 3. Admin Action Handlers
  const confirmModalLabel = document.getElementById('actionConfirmModalLabel');
  const confirmModalText = document.getElementById('confirmModalBodyText');
  const btnConfirmAction = document.getElementById('btnConfirmAction');

  function triggerActionModal(title, text, type) {
    pendingActionType = type;
    if (confirmModalLabel) confirmModalLabel.textContent = title;
    if (confirmModalText) confirmModalText.textContent = text;
    if (bsActionModal) bsActionModal.show();
  }

  const actBlockConv = document.getElementById('actBlockConv');
  const actDeleteConv = document.getElementById('actDeleteConv');
  const actArchiveConv = document.getElementById('actArchiveConv');
  const actReportConv = document.getElementById('actReportConv');

  if (actBlockConv) {
    actBlockConv.addEventListener('click', () => {
      triggerActionModal('Block Conversation?', 'This will prevent further messages from being sent between these participants.', 'block');
    });
  }

  if (actDeleteConv) {
    actDeleteConv.addEventListener('click', () => {
      triggerActionModal('Delete Thread Permanently?', 'Are you sure you want to delete this conversation audit thread? This action cannot be undone.', 'delete');
    });
  }

  if (actArchiveConv) {
    actArchiveConv.addEventListener('click', () => {
      triggerActionModal('Archive Thread?', 'Move this conversation to administrative archives.', 'archive');
    });
  }

  if (actReportConv) {
    actReportConv.addEventListener('click', () => {
      if (bsReportModal) bsReportModal.show();
    });
  }

  if (btnConfirmAction) {
    btnConfirmAction.addEventListener('click', () => {
      if (activeConversationItem && pendingActionType === 'delete') {
        activeConversationItem.remove();
        alert('Conversation thread deleted successfully.');
      } else if (pendingActionType === 'block') {
        if (activeConversationItem) activeConversationItem.setAttribute('data-status', 'blocked');
        alert('Conversation thread blocked.');
      } else if (pendingActionType === 'archive') {
        alert('Conversation thread archived.');
      }
      if (bsActionModal) bsActionModal.hide();
      applyFilters();
    });
  }

  // 4. Submit Report Handler
  const btnSubmitReport = document.getElementById('btnSubmitReport');
  if (btnSubmitReport) {
    btnSubmitReport.addEventListener('click', () => {
      const reason = document.getElementById('reportReasonSelect')?.value;
      if (!reason) {
        alert('Please select a report reason.');
        return;
      }
      alert(`Report submitted successfully under reason: ${reason}`);
      if (bsReportModal) bsReportModal.hide();
    });
  }
});