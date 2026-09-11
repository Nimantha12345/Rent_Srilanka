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

  // Chat View Elements
  const chatMessageArea = document.getElementById('chatMessageArea');
  const adminSendMessageForm = document.getElementById('adminSendMessageForm');
  const adminMessageInput = document.getElementById('adminMessageInput');

  // Header Elements
  const headerUserAvatar = document.getElementById('headerUserAvatar');
  const headerParticipantsText = document.getElementById('headerParticipantsText');
  const headerThreadMeta = document.getElementById('headerThreadMeta');
  const miniCardTitle = document.getElementById('miniCardTitle');
  const miniCardPropertyId = document.getElementById('miniCardPropertyId');
  const miniCardLocation = document.getElementById('miniCardLocation');
  const miniCardPrice = document.getElementById('miniCardPrice');

  // Modal Details
  const mdConversationId = document.getElementById('mdConversationId');
  const mdUserRole = document.getElementById('mdUserRole');
  const mdUser = document.getElementById('mdUser');
  const mdSubject = document.getElementById('mdSubject');
  const mdProperty = document.getElementById('mdProperty');
  const mdCreatedDate = document.getElementById('mdCreatedDate');
  const mdLastDate = document.getElementById('mdLastDate');

  // Modals
  const actionModalEl = document.getElementById('actionConfirmModal');
  let bsActionModal = actionModalEl ? new bootstrap.Modal(actionModalEl) : null;

  let activeConversationItem = document.querySelector('.conversation-item.active');
  let pendingActionType = null;

  // 1. Conversation Item Click Handler
  conversationItems.forEach(item => {
    item.addEventListener('click', () => {
      conversationItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      activeConversationItem = item;

      // Extract Data Attributes
      const convId = item.getAttribute('data-conversation-id');
      const userName = item.getAttribute('data-user-name');
      const userId = item.getAttribute('data-user-id');
      const userRole = item.getAttribute('data-user-role');
      const subject = item.getAttribute('data-subject');
      const propTitle = item.getAttribute('data-property-title');
      const propId = item.getAttribute('data-property-id');
      const propLoc = item.getAttribute('data-property-location');
      const propPrice = item.getAttribute('data-property-price');
      const createdDate = item.getAttribute('data-created-date');
      const lastDate = item.getAttribute('data-last-date');

      // Update Header
      if (headerUserAvatar) headerUserAvatar.textContent = getInitials(userName);
      if (headerParticipantsText) headerParticipantsText.textContent = `Admin ↔ ${userName} (${userRole})`;
      if (headerThreadMeta) headerThreadMeta.textContent = `Thread ID: #${convId} · Subject: ${subject}`;
      if (miniCardTitle) miniCardTitle.textContent = propTitle;
      if (miniCardPropertyId) miniCardPropertyId.textContent = `#${propId}`;
      if (miniCardLocation) miniCardLocation.innerHTML = `<i class="bi bi-geo-alt me-1 text-danger"></i>${propLoc}`;
      if (miniCardPrice) miniCardPrice.textContent = propPrice;

      // Update Modal
      if (mdConversationId) mdConversationId.textContent = `#${convId}`;
      if (mdUserRole) mdUserRole.textContent = userRole;
      if (mdUser) mdUser.textContent = `${userName} (ID: ${userId})`;
      if (mdSubject) mdSubject.textContent = subject;
      if (mdProperty) mdProperty.textContent = `${propTitle} (${propId})`;
      if (mdCreatedDate) mdCreatedDate.textContent = createdDate;
      if (mdLastDate) mdLastDate.textContent = lastDate;

      if (chatCard) chatCard.classList.add('chat-view-active');
    });
  });

  if (btnBackToList && chatCard) {
    btnBackToList.addEventListener('click', () => {
      chatCard.classList.remove('chat-view-active');
    });
  }

  function getInitials(name) {
    if (!name) return 'U';
    const parts = name.split(' ');
    if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase();
    return name.substring(0, 2).toUpperCase();
  }

  // 2. Search & Filter Logic
  function applyFilters() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const selectedType = filterUserType ? filterUserType.value : 'all';
    const selectedStatus = filterStatus ? filterStatus.value : 'all';
    let visibleCount = 0;

    conversationItems.forEach(item => {
      const name = (item.getAttribute('data-user-name') || '').toLowerCase();
      const subject = (item.getAttribute('data-subject') || '').toLowerCase();
      const propId = (item.getAttribute('data-property-id') || '').toLowerCase();
      const convId = (item.getAttribute('data-conversation-id') || '').toLowerCase();
      const type = item.getAttribute('data-user-type');
      const status = item.getAttribute('data-status');

      const matchesSearch = !searchTerm || name.includes(searchTerm) || subject.includes(searchTerm) || propId.includes(searchTerm) || convId.includes(searchTerm);
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

  // 3. Send Message Logic
  if (adminSendMessageForm) {
    adminSendMessageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const messageText = adminMessageInput ? adminMessageInput.value.trim() : '';
      if (!messageText) return;

      const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

      const newMsgHtml = `
        <div class="chat-bubble-wrapper bubble-right ms-auto">
          <div class="d-flex align-items-start gap-2 flex-row-reverse">
            <div class="avatar-circle-sm bg-primary text-white fw-bold flex-shrink-0">AD</div>
            <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
              <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                <span class="fw-bold fs-8 text-warning"><i class="bi bi-shield-check me-1"></i>System Admin</span>
                <span class="fs-8 text-white-50">${currentTime}</span>
              </div>
              <p class="small mb-1">${escapeHtml(messageText)}</p>
              <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-white-50">
                <i class="bi bi-check2-all text-info"></i> Sent
              </div>
            </div>
          </div>
        </div>
      `;

      if (chatMessageArea) {
        chatMessageArea.insertAdjacentHTML('beforeend', newMsgHtml);
        chatMessageArea.scrollTop = chatMessageArea.scrollHeight;
      }

      if (activeConversationItem) {
        const lastMsgEl = activeConversationItem.querySelector('.text-last-msg');
        if (lastMsgEl) {
          lastMsgEl.innerHTML = `<span class="text-primary fw-semibold">[Admin]:</span> ${escapeHtml(messageText)}`;
        }
      }

      adminMessageInput.value = '';
    });
  }

  function escapeHtml(text) {
    const div = document.createElement('div');
    div.innerText = text;
    return div.innerHTML;
  }

  // 4. Admin Actions
  const actDeleteConv = document.getElementById('actDeleteConv');
  const btnConfirmAction = document.getElementById('btnConfirmAction');

  if (actDeleteConv) {
    actDeleteConv.addEventListener('click', () => {
      pendingActionType = 'delete';
      if (bsActionModal) bsActionModal.show();
    });
  }

  if (btnConfirmAction) {
    btnConfirmAction.addEventListener('click', () => {
      if (activeConversationItem && pendingActionType === 'delete') {
        activeConversationItem.remove();
        alert('Support thread deleted successfully.');
      }
      if (bsActionModal) bsActionModal.hide();
      applyFilters();
    });
  }
});