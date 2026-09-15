document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const chatCard = document.querySelector('.admin-chat-card');
  const conversationItems = document.querySelectorAll('.conversation-item');
  const searchInput = document.getElementById('conversationSearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const tabTypeBtns = document.querySelectorAll('.tab-type-btn');

  // Empty State Containers
  const emptyOwnerList = document.getElementById('emptyOwnerList');
  const emptyCustomerList = document.getElementById('emptyCustomerList');
  const emptyAllList = document.getElementById('emptyAllList');

  // Chat Column Views
  const chatHeader = document.getElementById('chatHeader');
  const propertyContextBanner = document.getElementById('propertyContextBanner');
  const chatMessageArea = document.getElementById('chatMessageArea');

  // Headers Elements
  const headerUserAvatar = document.getElementById('headerUserAvatar');
  const headerUserName = document.getElementById('headerUserName');
  const headerUserRoleBadge = document.getElementById('headerUserRoleBadge');
  const headerUserMeta = document.getElementById('headerUserMeta');

  // Banner Elements
  const bannerPropertyImg = document.getElementById('bannerPropertyImg');
  const bannerPropertyTitle = document.getElementById('bannerPropertyTitle');
  const bannerPropertyLocation = document.getElementById('bannerPropertyLocation');
  const bannerPropertyPrice = document.getElementById('bannerPropertyPrice');

  // Back Button (Mobile)
  const btnBackToList = document.getElementById('btnBackToList');

  // Message Form Elements
  const chatSendMessageForm = document.getElementById('chatSendMessageForm');
  const messageTextInput = document.getElementById('messageTextInput');
  const btnAttachFile = document.getElementById('btnAttachFile');
  const hiddenFileInput = document.getElementById('hiddenFileInput');
  const attachmentPreviewContainer = document.getElementById('attachmentPreviewContainer');
  const attachmentFileName = document.getElementById('attachmentFileName');
  const btnRemoveAttachment = document.getElementById('btnRemoveAttachment');

  // Modals
  const newMessageModalEl = document.getElementById('newMessageModal');
  const userDetailsModalEl = document.getElementById('userDetailsModal');
  const actionConfirmModalEl = document.getElementById('actionConfirmModal');

  let bsNewMessageModal = newMessageModalEl ? new bootstrap.Modal(newMessageModalEl) : null;
  let bsUserDetailsModal = userDetailsModalEl ? new bootstrap.Modal(userDetailsModalEl) : null;
  let bsActionConfirmModal = actionConfirmModalEl ? new bootstrap.Modal(actionConfirmModalEl) : null;

  let activeConversationItem = document.querySelector('.conversation-item.active');
  let activeTypeFilter = 'all';
  let pendingActionType = null;

  // Helper Initials
  function getInitials(name) {
    if (!name) return 'U';
    const parts = name.split(' ');
    if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase();
    return name.substring(0, 2).toUpperCase();
  }

  // Scroll Chat to Bottom
  function scrollToChatBottom() {
    if (chatMessageArea) {
      chatMessageArea.scrollTop = chatMessageArea.scrollHeight;
    }
  }
  scrollToChatBottom();

  // 1. Conversation Item Selection (Owner vs Customer Switcher)
  conversationItems.forEach(item => {
    item.addEventListener('click', () => {
      conversationItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      activeConversationItem = item;

      // Clear Unread Badge
      const unreadBadge = item.querySelector('.badge-unread');
      if (unreadBadge) unreadBadge.remove();
      item.setAttribute('data-status', 'read');

      const convType = item.getAttribute('data-conversation-type');
      const convId = item.getAttribute('data-conversation-id');
      const userName = item.getAttribute('data-user-name');
      const userId = item.getAttribute('data-user-id');
      const propTitle = item.getAttribute('data-property-title');
      const propLoc = item.getAttribute('data-property-location');
      const propPrice = item.getAttribute('data-property-price');
      const propImg = item.getAttribute('data-property-image');

      if (headerUserAvatar) headerUserAvatar.textContent = getInitials(userName);
      if (headerUserName) headerUserName.textContent = userName;
      if (headerUserRoleBadge) {
        headerUserRoleBadge.textContent = convType.toUpperCase();
        headerUserRoleBadge.className = convType === 'owner' ? 
          'badge bg-primary-subtle text-primary border border-primary-subtle fs-9 rounded-pill' : 
          'badge bg-teal-subtle text-teal border border-teal-subtle fs-9 rounded-pill';
      }
      if (headerUserMeta) headerUserMeta.textContent = `User ID: #${userId} · Thread: #${convId}`;

      if (bannerPropertyImg) bannerPropertyImg.src = propImg;
      if (bannerPropertyTitle) bannerPropertyTitle.textContent = propTitle;
      if (bannerPropertyLocation) bannerPropertyLocation.innerHTML = `<i class="bi bi-geo-alt me-1 text-danger"></i>${propLoc}`;
      if (bannerPropertyPrice) bannerPropertyPrice.textContent = propPrice;

      // Populate User Modal Details
      document.getElementById('userModalName').textContent = userName;
      document.getElementById('userModalPhone').textContent = item.getAttribute('data-user-phone');
      document.getElementById('userModalEmail').textContent = item.getAttribute('data-user-email');
      document.getElementById('userModalLocation').textContent = item.getAttribute('data-user-location');
      document.getElementById('userModalSince').textContent = item.getAttribute('data-user-since');
      document.getElementById('userModalRoleBadge').textContent = convType === 'owner' ? 'Verified Property Owner' : 'Marketplace Renter';

      // Mobile Responsive View Shift
      if (chatCard) chatCard.classList.add('chat-view-active');
      scrollToChatBottom();
    });
  });

  // Mobile Back Button
  if (btnBackToList && chatCard) {
    btnBackToList.addEventListener('click', () => chatCard.classList.remove('chat-view-active'));
  }

  // 2. Type Tabs & Search Filter
  function applyFilters() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
    let visibleCount = 0;
    let visibleOwner = 0;
    let visibleCust = 0;

    conversationItems.forEach(item => {
      const type = item.getAttribute('data-conversation-type');
      const userName = (item.getAttribute('data-user-name') || '').toLowerCase();
      const propTitle = (item.getAttribute('data-property-title') || '').toLowerCase();
      const subject = (item.getAttribute('data-subject') || '').toLowerCase();

      const matchesType = (activeTypeFilter === 'all') || (type === activeTypeFilter);
      const matchesSearch = !searchTerm || userName.includes(searchTerm) || propTitle.includes(searchTerm) || subject.includes(searchTerm);

      if (matchesType && matchesSearch) {
        item.classList.remove('d-none');
        visibleCount++;
        if (type === 'owner') visibleOwner++;
        if (type === 'customer') visibleCust++;
      } else {
        item.classList.add('d-none');
      }
    });

    // Toggle Empty States
    if (emptyOwnerList) emptyOwnerList.classList.add('d-none');
    if (emptyCustomerList) emptyCustomerList.classList.add('d-none');
    if (emptyAllList) emptyAllList.classList.add('d-none');

    if (visibleCount === 0) {
      if (activeTypeFilter === 'owner' && emptyOwnerList) emptyOwnerList.classList.remove('d-none');
      else if (activeTypeFilter === 'customer' && emptyCustomerList) emptyCustomerList.classList.remove('d-none');
      else if (emptyAllList) emptyAllList.classList.remove('d-none');
    }
  }

  tabTypeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabTypeBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeTypeFilter = btn.getAttribute('data-type');
      applyFilters();
    });
  });

  if (searchInput) searchInput.addEventListener('input', applyFilters);

  if (btnClearSearch) {
    btnClearSearch.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      applyFilters();
    });
  }

  // 3. New Direct Message Modal Triggers
  const btnOpenNewMessage = document.getElementById('btnOpenNewMessageModal');

  if (btnOpenNewMessage) {
    btnOpenNewMessage.addEventListener('click', () => {
      if (bsNewMessageModal) bsNewMessageModal.show();
    });
  }

  const btnSubmitNewMessage = document.getElementById('btnSubmitNewMessage');
  if (btnSubmitNewMessage) {
    btnSubmitNewMessage.addEventListener('click', () => {
      const user = document.getElementById('newMsgUserSelect')?.value;
      const subj = document.getElementById('newMsgSubjectInput')?.value;
      if (!user || !subj) {
        alert('Please fill out all required fields.');
        return;
      }
      alert(`Message thread created successfully for user: ${user}`);
      if (bsNewMessageModal) bsNewMessageModal.hide();
    });
  }

  // 4. Attachment Simulation
  if (btnAttachFile && hiddenFileInput) {
    btnAttachFile.addEventListener('click', () => hiddenFileInput.click());
    hiddenFileInput.addEventListener('change', () => {
      if (hiddenFileInput.files && hiddenFileInput.files[0]) {
        if (attachmentFileName) attachmentFileName.textContent = hiddenFileInput.files[0].name;
        if (attachmentPreviewContainer) attachmentPreviewContainer.classList.remove('d-none');
      }
    });
  }

  if (btnRemoveAttachment) {
    btnRemoveAttachment.addEventListener('click', () => {
      if (hiddenFileInput) hiddenFileInput.value = '';
      if (attachmentPreviewContainer) attachmentPreviewContainer.classList.add('d-none');
    });
  }

  // 5. Send Message (Key combinations: Enter to send, Shift+Enter for new line)
  if (messageTextInput) {
    messageTextInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        chatSendMessageForm.requestSubmit();
      }
    });
  }

  if (chatSendMessageForm) {
    chatSendMessageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const text = messageTextInput.value.trim();
      const hasAttachment = !attachmentPreviewContainer.classList.contains('d-none');

      if (!text && !hasAttachment) return;

      const now = new Date();
      const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      const msgId = `MSG-${Date.now().toString().slice(-4)}`;

      let attachmentHtml = '';
      if (hasAttachment) {
        attachmentHtml = `
          <div class="bg-white-10 border border-white-20 rounded-3 p-2 mb-2 d-flex align-items-center gap-2">
            <i class="bi bi-file-earmark-arrow-down fs-5"></i>
            <span class="fs-8 text-truncate flex-grow-1">${attachmentFileName.textContent}</span>
          </div>
        `;
      }

      const bubbleWrapper = document.createElement('div');
      bubbleWrapper.className = 'chat-bubble-wrapper bubble-right ms-auto';
      bubbleWrapper.setAttribute('data-message-id', msgId);
      bubbleWrapper.setAttribute('data-sender-type', 'admin');

      bubbleWrapper.innerHTML = `
        <div class="d-flex align-items-start gap-2 flex-row-reverse">
          <div class="avatar-circle-sm bg-primary text-white fw-bold flex-shrink-0">AD</div>
          <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
            <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
              <span class="fw-bold fs-8 text-warning"><i class="bi bi-shield-check me-1"></i>System Admin</span>
              <span class="fs-8 text-white-50">${timeStr}</span>
            </div>
            ${attachmentHtml}
            ${text ? `<p class="small mb-1">${text}</p>` : ''}
            <div class="d-flex align-items-center justify-content-end gap-1 fs-8 text-white-50">
              <i class="bi bi-check2 text-white-50" id="status-${msgId}"></i> <span id="status-text-${msgId}">Sent</span>
            </div>
          </div>
        </div>
      `;

      chatMessageArea.appendChild(bubbleWrapper);

      messageTextInput.value = '';
      if (hiddenFileInput) hiddenFileInput.value = '';
      if (attachmentPreviewContainer) attachmentPreviewContainer.classList.add('d-none');

      scrollToChatBottom();

      // Update Last Message in List
      if (activeConversationItem) {
        const lastMsgEl = activeConversationItem.querySelector('.text-last-msg');
        if (lastMsgEl) lastMsgEl.textContent = text || 'Sent an attachment';
      }

      // Simulate Real-Time Status Update
      setTimeout(() => {
        const icon = document.getElementById(`status-${msgId}`);
        const statusTxt = document.getElementById(`status-text-${msgId}`);
        if (icon) icon.className = 'bi bi-check2-all text-info';
        if (statusTxt) statusTxt.textContent = 'Delivered';
      }, 1500);
    });
  }

  // 6. Action Modal Triggers
  const btnViewUserModal = document.getElementById('btnViewUserModal');
  const actTriggerUserDetails = document.getElementById('actTriggerUserDetails');
  
  if (btnViewUserModal) btnViewUserModal.addEventListener('click', () => bsUserDetailsModal && bsUserDetailsModal.show());
  if (actTriggerUserDetails) actTriggerUserDetails.addEventListener('click', () => bsUserDetailsModal && bsUserDetailsModal.show());

  // Confirm Actions Modal Utility
  const confirmModalLabel = document.getElementById('actionConfirmModalLabel');
  const confirmModalText = document.getElementById('confirmModalBodyText');
  const btnConfirmAction = document.getElementById('btnConfirmAction');

  function triggerConfirmModal(title, text, type) {
    pendingActionType = type;
    if (confirmModalLabel) confirmModalLabel.textContent = title;
    if (confirmModalText) confirmModalText.textContent = text;
    if (bsActionConfirmModal) bsActionConfirmModal.show();
  }

  const actArchive = document.getElementById('actArchive');
  const actDelete = document.getElementById('actDelete');

  if (actArchive) actArchive.addEventListener('click', () => triggerConfirmModal('Archive Conversation?', 'This conversation thread will be moved to archives.', 'archive'));
  if (actDelete) actDelete.addEventListener('click', () => triggerConfirmModal('Delete Conversation Thread?', 'Are you sure you want to delete this support conversation thread?', 'delete'));

  if (btnConfirmAction) {
    btnConfirmAction.addEventListener('click', () => {
      if (activeConversationItem && pendingActionType === 'delete') {
        activeConversationItem.remove();
        alert('Conversation thread deleted.');
      } else if (activeConversationItem && pendingActionType === 'archive') {
        alert('Conversation thread archived.');
      }
      if (bsActionConfirmModal) bsActionConfirmModal.hide();
      applyFilters();
    });
  }
});