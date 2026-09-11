document.addEventListener('DOMContentLoaded', () => {
  const conversationItems = document.querySelectorAll('.conversation-item');
  const chatMessagesBody = document.getElementById('chatMessagesBody');
  const chatForm = document.getElementById('chatForm');
  const chatMessageInput = document.getElementById('chatMessageInput');
  const btnBackToConversations = document.getElementById('btnBackToConversations');
  const searchConversations = document.getElementById('searchConversations');
  const btnAttachment = document.getElementById('btnAttachment');
  const attachmentInput = document.getElementById('attachmentInput');
  const btnBlockUser = document.getElementById('btnBlockUser');
  const btnDeleteConversation = document.getElementById('btnDeleteConversation');
  const reportUserForm = document.getElementById('reportUserForm');

  // Active elements
  const activeChatAvatar = document.getElementById('activeChatAvatar');
  const activeChatName = document.getElementById('activeChatName');
  const activeChatStatusText = document.getElementById('activeChatStatusText');
  const activeChatStatusDot = document.getElementById('activeChatStatusDot');
  const activePropTitle = document.getElementById('activePropTitle');
  const activePropPrice = document.getElementById('activePropPrice');
  const activePropImg = document.getElementById('activePropImg');
  const activePropLink = document.getElementById('activePropLink');

  // 1. Selecting Conversations
  conversationItems.forEach(item => {
    item.addEventListener('click', function() {
      conversationItems.forEach(c => c.classList.remove('active-chat'));
      this.classList.add('active-chat');

      // Clear unread badge on click
      const unreadBadge = this.querySelector('.unread-badge');
      if (unreadBadge) {
        unreadBadge.remove();
        updateTotalUnreadBadge();
      }

      // Update Header Data
      const name = this.getAttribute('data-name');
      const status = this.getAttribute('data-status');
      const avatar = this.getAttribute('data-avatar');
      const propTitle = this.getAttribute('data-prop-title');
      const propPrice = this.getAttribute('data-prop-price');
      const propImg = this.getAttribute('data-prop-img');
      const propId = this.getAttribute('data-id');

      if (activeChatName) activeChatName.textContent = name;
      if (activeChatAvatar) activeChatAvatar.src = avatar;
      if (activePropTitle) activePropTitle.textContent = propTitle;
      if (activePropPrice) activePropPrice.textContent = propPrice;
      if (activePropImg) activePropImg.src = propImg;
      if (activePropLink) activePropLink.href = `property-details.php?id=${propId}`;

      if (activeChatStatusText && activeChatStatusDot) {
        if (status === 'Online') {
          activeChatStatusText.className = 'small text-success fw-medium';
          activeChatStatusText.innerHTML = '<i class="bi bi-circle-fill me-1 fs-8"></i>Online';
          activeChatStatusDot.className = 'position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1';
        } else {
          activeChatStatusText.className = 'small text-muted fw-medium';
          activeChatStatusText.innerHTML = '<i class="bi bi-circle-fill me-1 fs-8"></i>Offline';
          activeChatStatusDot.className = 'position-absolute bottom-0 end-0 bg-secondary border border-white rounded-circle p-1';
        }
      }

      // Mobile: Open full-screen chat window
      document.body.classList.add('mobile-chat-open');
      scrollToBottom();
    });
  });

  // 2. Mobile Back Button
  if (btnBackToConversations) {
    btnBackToConversations.addEventListener('click', () => {
      document.body.classList.remove('mobile-chat-open');
    });
  }

  // 3. Sending Messages
  if (chatForm && chatMessageInput && chatMessagesBody) {
    chatForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const messageText = chatMessageInput.value.trim();
      if (!messageText) return;

      const now = new Date();
      const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

      // Append Sent Message Bubble
      const msgHTML = `
        <div class="d-flex mb-3 justify-content-end align-items-end gap-2 message-row sent">
          <div class="message-bubble bg-primary-green text-white p-3 rounded-4 shadow-xs">
            <p class="mb-1 small">${escapeHTML(messageText)}</p>
            <div class="text-end">
              <span class="time-stamp text-white-50"><i class="bi bi-check2 me-1"></i>${timeStr}</span>
            </div>
          </div>
        </div>
      `;

      chatMessagesBody.insertAdjacentHTML('beforeend', msgHTML);
      chatMessageInput.value = '';
      scrollToBottom();

      // Update Last Message in Active Conversation Item
      const activeItem = document.querySelector('.conversation-item.active-chat');
      if (activeItem) {
        const lastMsgEl = activeItem.querySelector('.last-msg');
        const timeEl = activeItem.querySelector('.chat-time');
        if (lastMsgEl) lastMsgEl.textContent = `You: ${messageText}`;
        if (timeEl) timeEl.textContent = timeStr;
      }
    });
  }

  // 4. Search Conversations Filter
  if (searchConversations) {
    searchConversations.addEventListener('input', function() {
      const query = this.value.toLowerCase();
      conversationItems.forEach(item => {
        const name = item.getAttribute('data-name').toLowerCase();
        const prop = item.getAttribute('data-prop-title').toLowerCase();
        if (name.includes(query) || prop.includes(query)) {
          item.classList.remove('d-none');
        } else {
          item.classList.add('d-none');
        }
      });
    });
  }

  // 5. Attachment Input Trigger
  if (btnAttachment && attachmentInput) {
    btnAttachment.addEventListener('click', () => attachmentInput.click());
    attachmentInput.addEventListener('change', () => {
      if (attachmentInput.files.length > 0) {
        alert(`Attached: ${attachmentInput.files[0].name}`);
      }
    });
  }

  // 6. Block & Delete Actions
  if (btnBlockUser) {
    btnBlockUser.addEventListener('click', (e) => {
      e.preventDefault();
      if (confirm('Are you sure you want to block this user? You will no longer receive messages from them.')) {
        alert('User has been blocked.');
      }
    });
  }

  if (btnDeleteConversation) {
    btnDeleteConversation.addEventListener('click', (e) => {
      e.preventDefault();
      if (confirm('Are you sure you want to delete this conversation? This action cannot be undone.')) {
        const activeItem = document.querySelector('.conversation-item.active-chat');
        if (activeItem) activeItem.remove();
        alert('Conversation deleted.');
        document.body.classList.remove('mobile-chat-open');
      }
    });
  }

  if (reportUserForm) {
    reportUserForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Thank you for reporting this user. Our team will review the conversation logs.');
      const modalEl = document.getElementById('reportUserModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();
    });
  }

  // Helpers
  function scrollToBottom() {
    if (chatMessagesBody) {
      chatMessagesBody.scrollTop = chatMessagesBody.scrollHeight;
    }
  }

  function updateTotalUnreadBadge() {
    const totalUnread = document.querySelectorAll('.unread-badge').length;
    const badge = document.getElementById('totalUnreadBadge');
    const navBadge = document.getElementById('nav-msg-count');
    if (badge) badge.textContent = `${totalUnread} Unread`;
    if (navBadge) navBadge.textContent = totalUnread;
  }

  function escapeHTML(str) {
    return str.replace(/[&<>'"]/g, 
      tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
    );
  }

  scrollToBottom();
});