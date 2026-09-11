document.addEventListener('DOMContentLoaded', () => {
  // DOM Elements
  const chatCard = document.querySelector('.owner-chat-card');
  const conversationItems = document.querySelectorAll('.conversation-item');
  const searchInput = document.getElementById('conversationSearchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const tabTypeBtns = document.querySelectorAll('.tab-type-btn');

  // Empty State Containers
  const emptyCustomerList = document.getElementById('emptyCustomerList');
  const emptyAdminList = document.getElementById('emptyAdminList');
  const emptyAllList = document.getElementById('emptyAllList');

  // Chat Column Views
  const chatHeaderCustomer = document.getElementById('chatHeaderCustomer');
  const chatHeaderAdmin = document.getElementById('chatHeaderAdmin');
  const propertyContextBanner = document.getElementById('propertyContextBanner');
  const adminNoticeBanner = document.getElementById('adminNoticeBanner');
  const chatMessageArea = document.getElementById('chatMessageArea');
  const inputDisclaimerText = document.getElementById('inputDisclaimerText');

  // Headers Elements
  const headerCustAvatar = document.getElementById('headerCustAvatar');
  const headerCustName = document.getElementById('headerCustName');
  const headerCustMeta = document.getElementById('headerCustMeta');
  const headerAdminName = document.getElementById('headerAdminName');
  const headerAdminSubject = document.getElementById('headerAdminSubject');

  // Banner Elements
  const bannerPropertyImg = document.getElementById('bannerPropertyImg');
  const bannerPropertyTitle = document.getElementById('bannerPropertyTitle');
  const bannerPropertyLocation = document.getElementById('bannerPropertyLocation');
  const bannerPropertyPrice = document.getElementById('bannerPropertyPrice');

  // Back Buttons (Mobile)
  const btnBackToListCust = document.getElementById('btnBackToListCust');
  const btnBackToListAdmin = document.getElementById('btnBackToListAdmin');

  // Message Form Elements
  const chatSendMessageForm = document.getElementById('chatSendMessageForm');
  const messageTextInput = document.getElementById('messageTextInput');
  const btnAttachFile = document.getElementById('btnAttachFile');
  const hiddenFileInput = document.getElementById('hiddenFileInput');
  const attachmentPreviewContainer = document.getElementById('attachmentPreviewContainer');
  const attachmentFileName = document.getElementById('attachmentFileName');
  const btnRemoveAttachment = document.getElementById('btnRemoveAttachment');

  // Modals
  const contactAdminModalEl = document.getElementById('contactAdminModal');
  const custDetailsModalEl = document.getElementById('customerDetailsModal');
  const adminDetailsModalEl = document.getElementById('adminDetailsModal');
  const reportCustModalEl = document.getElementById('reportCustomerModal');
  const reportIssueModalEl = document.getElementById('reportIssueModal');
  const actionConfirmModalEl = document.getElementById('actionConfirmModal');

  let bsContactAdminModal = contactAdminModalEl ? new bootstrap.Modal(contactAdminModalEl) : null;
  let bsCustDetailsModal = custDetailsModalEl ? new bootstrap.Modal(custDetailsModalEl) : null;
  let bsAdminDetailsModal = adminDetailsModalEl ? new bootstrap.Modal(adminDetailsModalEl) : null;
  let bsReportCustModal = reportCustModalEl ? new bootstrap.Modal(reportCustModalEl) : null;
  let bsReportIssueModal = reportIssueModalEl ? new bootstrap.Modal(reportIssueModalEl) : null;
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

  // 1. Conversation Item Selection (Customer vs Admin Switcher)
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

      if (convType === 'customer') {
        // Show Customer UI
        if (chatHeaderCustomer) chatHeaderCustomer.classList.remove('d-none');
        if (chatHeaderAdmin) chatHeaderAdmin.classList.add('d-none');
        if (propertyContextBanner) propertyContextBanner.classList.remove('d-none');
        if (adminNoticeBanner) adminNoticeBanner.classList.add('d-none');
        if (inputDisclaimerText) inputDisclaimerText.innerHTML = `<i class="bi bi-shield-check me-1 text-success"></i>Direct Marketplace Messaging`;

        const custName = item.getAttribute('data-customer-name');
        const custId = item.getAttribute('data-customer-id');
        const propTitle = item.getAttribute('data-property-title');
        const propLoc = item.getAttribute('data-property-location');
        const propPrice = item.getAttribute('data-property-price');
        const propImg = item.getAttribute('data-property-image');

        if (headerCustAvatar) headerCustAvatar.textContent = getInitials(custName);
        if (headerCustName) headerCustName.textContent = custName;
        if (headerCustMeta) headerCustMeta.textContent = `Customer ID: #${custId} · Thread: #${convId}`;

        if (bannerPropertyImg) bannerPropertyImg.src = propImg;
        if (bannerPropertyTitle) bannerPropertyTitle.textContent = propTitle;
        if (bannerPropertyLocation) bannerPropertyLocation.innerHTML = `<i class="bi bi-geo-alt me-1 text-danger"></i>${propLoc}`;
        if (bannerPropertyPrice) bannerPropertyPrice.textContent = propPrice;

        // Populate Customer Modal Details
        document.getElementById('custModalName').textContent = custName;
        document.getElementById('custModalPhone').textContent = item.getAttribute('data-customer-phone');
        document.getElementById('custModalEmail').textContent = item.getAttribute('data-customer-email');
        document.getElementById('custModalLocation').textContent = item.getAttribute('data-customer-location');
        document.getElementById('custModalSince').textContent = item.getAttribute('data-customer-since');
        document.getElementById('custModalInquiries').textContent = `${item.getAttribute('data-customer-inquiries')} Inquiries Submitted`;

      } else if (convType === 'admin') {
        // Show Admin UI
        if (chatHeaderCustomer) chatHeaderCustomer.classList.add('d-none');
        if (chatHeaderAdmin) chatHeaderAdmin.classList.remove('d-none');
        if (propertyContextBanner) propertyContextBanner.classList.add('d-none');
        if (adminNoticeBanner) adminNoticeBanner.classList.remove('d-none');
        if (inputDisclaimerText) inputDisclaimerText.innerHTML = `<i class="bi bi-shield-lock me-1 text-danger"></i>Official Platform Support Desk`;

        const adminName = item.getAttribute('data-admin-name');
        const subject = item.getAttribute('data-subject');

        if (headerAdminName) headerAdminName.textContent = adminName;
        if (headerAdminSubject) headerAdminSubject.textContent = `Subject: ${subject}`;
      }

      // Mobile Responsive View Shift
      if (chatCard) chatCard.classList.add('chat-view-active');
      scrollToChatBottom();
    });
  });

  // Mobile Back Buttons
  if (btnBackToListCust && chatCard) {
    btnBackToListCust.addEventListener('click', () => chatCard.classList.remove('chat-view-active'));
  }
  if (btnBackToListAdmin && chatCard) {
    btnBackToListAdmin.addEventListener('click', () => chatCard.classList.remove('chat-view-active'));
  }

  // 2. Type Tabs & Search Filter
  function applyFilters() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
    let visibleCount = 0;
    let visibleCust = 0;
    let visibleAdmin = 0;

    conversationItems.forEach(item => {
      const type = item.getAttribute('data-conversation-type');
      const custName = (item.getAttribute('data-customer-name') || '').toLowerCase();
      const adminName = (item.getAttribute('data-admin-name') || '').toLowerCase();
      const propTitle = (item.getAttribute('data-property-title') || '').toLowerCase();
      const subject = (item.getAttribute('data-subject') || '').toLowerCase();

      const matchesType = (activeTypeFilter === 'all') || (type === activeTypeFilter);
      const matchesSearch = !searchTerm || custName.includes(searchTerm) || adminName.includes(searchTerm) || propTitle.includes(searchTerm) || subject.includes(searchTerm);

      if (matchesType && matchesSearch) {
        item.classList.remove('d-none');
        visibleCount++;
        if (type === 'customer') visibleCust++;
        if (type === 'admin') visibleAdmin++;
      } else {
        item.classList.add('d-none');
      }
    });

    // Toggle Empty States
    if (emptyCustomerList) emptyCustomerList.classList.add('d-none');
    if (emptyAdminList) emptyAdminList.classList.add('d-none');
    if (emptyAllList) emptyAllList.classList.add('d-none');

    if (visibleCount === 0) {
      if (activeTypeFilter === 'customer' && emptyCustomerList) emptyCustomerList.classList.remove('d-none');
      else if (activeTypeFilter === 'admin' && emptyAdminList) emptyAdminList.classList.remove('d-none');
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

  // 3. Contact Admin Modal Triggers
  const btnOpenContactAdmin = document.getElementById('btnOpenContactAdminModal');
  const btnEmptyContactAdmin = document.getElementById('btnEmptyContactAdmin');
  const btnEmptyAllAdmin = document.getElementById('btnEmptyAllAdmin');

  function openContactAdmin() {
    if (bsContactAdminModal) bsContactAdminModal.show();
  }

  if (btnOpenContactAdmin) btnOpenContactAdmin.addEventListener('click', openContactAdmin);
  if (btnEmptyContactAdmin) btnEmptyContactAdmin.addEventListener('click', openContactAdmin);
  if (btnEmptyAllAdmin) btnEmptyAllAdmin.addEventListener('click', openContactAdmin);

  const btnSubmitContactAdmin = document.getElementById('btnSubmitContactAdmin');
  if (btnSubmitContactAdmin) {
    btnSubmitContactAdmin.addEventListener('click', () => {
      const cat = document.getElementById('supportCategorySelect')?.value;
      const subj = document.getElementById('supportSubjectInput')?.value;
      if (!cat || !subj) {
        alert('Please fill out the required support category and subject fields.');
        return;
      }
      alert(`Support Ticket created under category: ${cat}`);
      if (bsContactAdminModal) bsContactAdminModal.hide();
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
      bubbleWrapper.setAttribute('data-sender-type', 'owner');

      bubbleWrapper.innerHTML = `
        <div class="d-flex align-items-start gap-2 flex-row-reverse">
          <div class="avatar-circle-sm bg-navy text-white fw-bold flex-shrink-0">KP</div>
          <div class="chat-bubble shadow-xs bg-navy text-white rounded-4 p-3 max-w-75">
            <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
              <span class="fw-bold fs-8 text-success-subtle">Kasun Perera (Owner)</span>
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

      // Simulate Real-Time Delivered Status
      setTimeout(() => {
        const icon = document.getElementById(`status-${msgId}`);
        const statusTxt = document.getElementById(`status-text-${msgId}`);
        if (icon) icon.className = 'bi bi-check2-all text-info';
        if (statusTxt) statusTxt.textContent = 'Delivered';
      }, 1500);
    });
  }

  // 6. Action Modal Triggers
  const actCustTriggerDetails = document.getElementById('actCustTriggerDetails');
  if (actCustTriggerDetails) actCustTriggerDetails.addEventListener('click', () => bsCustDetailsModal && bsCustDetailsModal.show());

  const actCustReport = document.getElementById('actCustReport');
  if (actCustReport) actCustReport.addEventListener('click', () => bsReportCustModal && bsReportCustModal.show());

  const actAdminReportIssue = document.getElementById('actAdminReportIssue');
  if (actAdminReportIssue) actAdminReportIssue.addEventListener('click', () => bsReportIssueModal && bsReportIssueModal.show());

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

  const actCustArchive = document.getElementById('actCustArchive');
  const actCustDelete = document.getElementById('actCustDelete');
  const actCustBlock = document.getElementById('actCustBlock');
  const actAdminArchive = document.getElementById('actAdminArchive');
  const actAdminDelete = document.getElementById('actAdminDelete');

  if (actCustArchive) actCustArchive.addEventListener('click', () => triggerConfirmModal('Archive Conversation?', 'This conversation will be moved out of your active inbox.', 'archive'));
  if (actCustDelete) actCustDelete.addEventListener('click', () => triggerConfirmModal('Delete Conversation?', 'Are you sure you want to delete this customer conversation? Backend will soft-delete your copy.', 'delete'));
  if (actCustBlock) actCustBlock.addEventListener('click', () => triggerConfirmModal('Block Customer?', 'You will no longer receive messages from this customer.', 'block'));

  if (actAdminArchive) actAdminArchive.addEventListener('click', () => triggerConfirmModal('Archive Support Thread?', 'Move this support ticket thread to archives.', 'archive'));
  if (actAdminDelete) actAdminDelete.addEventListener('click', () => triggerConfirmModal('Delete Support Conversation?', 'Are you sure you want to delete this support conversation log?', 'delete'));

  if (btnConfirmAction) {
    btnConfirmAction.addEventListener('click', () => {
      if (activeConversationItem && pendingActionType === 'delete') {
        activeConversationItem.remove();
        alert('Conversation thread deleted.');
      } else if (activeConversationItem && pendingActionType === 'block') {
        alert('Customer blocked.');
      } else if (activeConversationItem && pendingActionType === 'archive') {
        alert('Conversation thread archived.');
      }
      if (bsActionConfirmModal) bsActionConfirmModal.hide();
      applyFilters();
    });
  }

  const btnSubmitReportCust = document.getElementById('btnSubmitReportCust');
  if (btnSubmitReportCust) {
    btnSubmitReportCust.addEventListener('click', () => {
      const reason = document.getElementById('reportCustReasonSelect')?.value;
      if (!reason) {
        alert('Please select a report reason.');
        return;
      }
      alert(`Customer report submitted under reason: ${reason}`);
      if (bsReportCustModal) bsReportCustModal.hide();
    });
  }

  const btnSubmitIssueAdmin = document.getElementById('btnSubmitIssueAdmin');
  if (btnSubmitIssueAdmin) {
    btnSubmitIssueAdmin.addEventListener('click', () => {
      const category = document.getElementById('issueCategorySelect')?.value;
      if (!category) {
        alert('Please select an issue category.');
        return;
      }
      alert(`Issue report submitted under category: ${category}`);
      if (bsReportIssueModal) bsReportIssueModal.hide();
    });
  }
});