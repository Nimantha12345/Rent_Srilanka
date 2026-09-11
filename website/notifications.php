<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - RentSriLanka</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

  <?php $activePage = ''; $prefix = ''; include 'components/navbar.php'; ?>

  <main class="py-4 min-vh-75">
    <div class="container" style="max-width: 920px;">
      
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">Notifications</li>
        </ol>
      </nav>

      <!-- PAGE HEADER -->
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
          <h1 class="h2 fw-bold text-navy mb-1">Notifications</h1>
          <p class="text-muted mb-0">Stay updated on messages, listing updates, and property alerts.</p>
        </div>
        
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-primary btn-sm fw-medium rounded-pill px-3" id="btnMarkAllRead">
            <i class="bi bi-check2-all me-1"></i>Mark all as read
          </button>
          <button type="button" class="btn btn-outline-danger btn-sm fw-medium rounded-pill px-3" id="btnClearAllNotifs">
            <i class="bi bi-trash me-1"></i>Clear all
          </button>
        </div>
      </div>

      <!-- FILTER TABS BAR -->
      <div class="card border-0 shadow-soft p-2 p-md-3 rounded-4 mb-4 bg-white">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
          <ul class="nav nav-pills custom-notif-tabs gap-1" id="notifTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active rounded-pill px-3 py-1-5 small fw-medium" id="tab-notif-all" data-bs-toggle="pill" data-category="all" type="button" role="tab">
                All (<span id="count-all">7</span>)
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-notif-unread" data-bs-toggle="pill" data-category="unread" type="button" role="tab">
                Unread (<span id="count-unread">4</span>)
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-notif-messages" data-bs-toggle="pill" data-category="messages" type="button" role="tab">
                Messages (<span id="count-messages">2</span>)
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-notif-properties" data-bs-toggle="pill" data-category="properties" type="button" role="tab">
                Properties (<span id="count-properties">4</span>)
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-1-5 small fw-medium" id="tab-notif-system" data-bs-toggle="pill" data-category="system" type="button" role="tab">
                System (<span id="count-system">1</span>)
              </button>
            </li>
          </ul>

          <span class="small text-muted pe-2 d-none d-md-inline" id="unreadSummaryText">4 unread notifications</span>
        </div>
      </div>

      <!-- NOTIFICATIONS LIST -->
      <div class="notification-list-container d-flex flex-column gap-3" id="notificationList">
        
        <!-- Notif 1: New Message (Unread) -->
        <div class="card notification-card unread border-light-custom shadow-soft rounded-4 overflow-hidden bg-white transition-hover" data-category="messages" data-status="unread" data-id="1">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-primary-subtle text-primary rounded-circle flex-shrink-0">
                <i class="bi bi-chat-dots-fill fs-5"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-bold text-navy mb-0 notif-title">New message from Kusum Perera</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>10:42 AM Today</span>
                </div>
                <p class="text-secondary small mb-2 text-break">“Yes, the house is available for inspection tomorrow! Please come around 4:00 PM.”</p>
                <div class="d-flex align-items-center gap-2">
                  <a href="messages.php" class="btn btn-sm btn-outline-primary rounded-pill py-1 px-3 fs-7 font-medium">Reply to Message</a>
                  <span class="badge bg-success-subtle text-success border border-success-subtle small fw-normal">New Message</span>
                </div>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <span class="unread-dot bg-danger rounded-circle" title="Unread notification"></span>
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 2: Property Approved (Unread) -->
        <div class="card notification-card unread border-light-custom shadow-soft rounded-4 overflow-hidden bg-white transition-hover" data-category="properties" data-status="unread" data-id="2">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-success-subtle text-success rounded-circle flex-shrink-0">
                <i class="bi bi-patch-check-fill fs-5"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-bold text-navy mb-0 notif-title">Property Approved &amp; Published</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>2 hours ago</span>
                </div>
                <p class="text-secondary small mb-2 text-break">Your listing <strong>“3 Bedroom House with Garden in Rajagiriya”</strong> (ID: RSL-84920) has passed moderation and is now live on RentSriLanka.</p>
                <div class="d-flex align-items-center gap-2">
                  <a href="property-details.php?id=101" class="btn btn-sm btn-outline-primary rounded-pill py-1 px-3 fs-7 font-medium">View Live Listing</a>
                  <span class="badge bg-light text-navy border border-light-custom small fw-normal">Listing Status</span>
                </div>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <span class="unread-dot bg-danger rounded-circle" title="Unread notification"></span>
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 3: Price Changed (Unread) -->
        <div class="card notification-card unread border-light-custom shadow-soft rounded-4 overflow-hidden bg-white transition-hover" data-category="properties" data-status="unread" data-id="3">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-teal-subtle text-teal rounded-circle flex-shrink-0">
                <i class="bi bi-tag-fill fs-5"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-bold text-navy mb-0 notif-title">Price Drop on Saved Property</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>Yesterday at 6:15 PM</span>
                </div>
                <p class="text-secondary small mb-2 text-break">The monthly rent for saved property <strong>“Modern 1-Bedroom Private Annex in Nugegoda”</strong> dropped from <del class="text-muted">Rs. 48,000</del> to <strong class="text-success">Rs. 42,000 / month</strong>.</p>
                <div class="d-flex align-items-center gap-2">
                  <a href="property-details.php?id=103" class="btn btn-sm btn-outline-primary rounded-pill py-1 px-3 fs-7 font-medium">Check Price Details</a>
                  <span class="badge bg-warning-subtle text-warning-emphasis small fw-normal">Price Drop</span>
                </div>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <span class="unread-dot bg-danger rounded-circle" title="Unread notification"></span>
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 4: New Matching Search Property (Unread) -->
        <div class="card notification-card unread border-light-custom shadow-soft rounded-4 overflow-hidden bg-white transition-hover" data-category="properties" data-status="unread" data-id="4">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-info-subtle text-info-emphasis rounded-circle flex-shrink-0">
                <i class="bi bi-houses-fill fs-5"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-bold text-navy mb-0 notif-title">New Match: Houses in Kandy</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>Yesterday at 2:00 PM</span>
                </div>
                <p class="text-secondary small mb-2 text-break">A new verified property matching your saved search <strong>“Houses in Kandy under Rs. 70,000”</strong> was just published: <em>“Scenic 2-Bedroom House in Peradeniya”</em>.</p>
                <div class="d-flex align-items-center gap-2">
                  <a href="search.php?location=kandy&type=house" class="btn btn-sm btn-outline-primary rounded-pill py-1 px-3 fs-7 font-medium">View Search Results</a>
                  <span class="badge bg-info-subtle text-info-emphasis small fw-normal">Search Alert</span>
                </div>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <span class="unread-dot bg-danger rounded-circle" title="Unread notification"></span>
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 5: Favorite Updated (Read) -->
        <div class="card notification-card read border-light-custom shadow-sm rounded-4 overflow-hidden bg-white transition-hover" data-category="properties" data-status="read" data-id="5">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-light text-secondary rounded-circle flex-shrink-0 border border-light-custom">
                <i class="bi bi-heart-fill fs-5 text-danger"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-semibold text-navy mb-0 notif-title">Saved Listing Updated Photos</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>Sep 05, 2026</span>
                </div>
                <p class="text-secondary small mb-2 text-break">The owner of your saved property <strong>“Furnished Boarding Room near Peradeniya Uni”</strong> added 4 new interior photos and updated facilities.</p>
                <a href="property-details.php?id=102" class="btn btn-sm btn-light border rounded-pill py-1 px-3 fs-7 font-medium text-navy">View Updated Photos</a>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 6: Message (Read) -->
        <div class="card notification-card read border-light-custom shadow-sm rounded-4 overflow-hidden bg-white transition-hover" data-category="messages" data-status="read" data-id="6">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-light text-secondary rounded-circle flex-shrink-0 border border-light-custom">
                <i class="bi bi-chat-text-fill fs-5 text-teal"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-semibold text-navy mb-0 notif-title">Inquiry Reply from Sunil Jayasinghe</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>Sep 04, 2026</span>
                </div>
                <p class="text-secondary small mb-2 text-break">“Could you please send me your contact number to schedule a viewing for the annex in Dehiwala?”</p>
                <a href="messages.php" class="btn btn-sm btn-light border rounded-pill py-1 px-3 fs-7 font-medium text-navy">Open Message Thread</a>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notif 7: Account System Security (Read) -->
        <div class="card notification-card read border-light-custom shadow-sm rounded-4 overflow-hidden bg-white transition-hover" data-category="system" data-status="read" data-id="7">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start gap-3">
              <div class="notif-icon-box bg-light text-secondary rounded-circle flex-shrink-0 border border-light-custom">
                <i class="bi bi-shield-lock-fill fs-5 text-navy"></i>
              </div>
              <div class="flex-grow-1 min-w-0">
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap gap-1">
                  <h2 class="h6 fw-semibold text-navy mb-0 notif-title">Account Security Notice</h2>
                  <span class="small text-muted notif-time"><i class="bi bi-clock me-1"></i>Sep 01, 2026</span>
                </div>
                <p class="text-secondary small mb-2 text-break">You successfully logged into your RentSriLanka account from a new Chrome browser device in Colombo, Sri Lanka.</p>
                <span class="badge bg-light text-muted border border-light-custom small fw-normal">Account Security</span>
              </div>
              <div class="d-flex flex-column align-items-end gap-2 ms-2">
                <button type="button" class="btn btn-link text-muted p-0 btn-delete-notif" title="Delete notification" aria-label="Delete notification">
                  <i class="bi bi-x-lg fs-6"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- EMPTY STATE (HIDDEN BY DEFAULT) -->
      <div id="notificationsEmptyState" class="card border-0 shadow-soft rounded-4 p-5 text-center my-4 bg-white d-none">
        <div class="py-5">
          <div class="notif-empty-icon bg-success-subtle text-success rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px;">
            <i class="bi bi-bell-slash display-4"></i>
          </div>
          <h2 class="h3 fw-bold text-navy">You're all caught up.</h2>
          <p class="text-muted small mb-4" style="max-width: 420px; margin: 0 auto;">You have no new notifications right now. We'll alert you here when new property matches, prices changes, or messages arrive.</p>
          <a href="properties.php" class="btn btn-primary fw-medium px-4 py-2 rounded-3">
            <i class="bi bi-search me-2"></i>Browse Rental Properties
          </a>
        </div>
      </div>

    </div>
  </main>

  <?php $prefix = ''; include 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const notificationList = document.getElementById('notificationList');
      const emptyState = document.getElementById('notificationsEmptyState');
      const btnMarkAllRead = document.getElementById('btnMarkAllRead');
      const btnClearAllNotifs = document.getElementById('btnClearAllNotifs');
      const navNotifBadge = document.getElementById('nav-notif-count');
      const unreadSummaryText = document.getElementById('unreadSummaryText');

      // 1. Click Unread Notification -> Mark as Read
      if (notificationList) {
        notificationList.addEventListener('click', (e) => {
          // If delete icon clicked, do delete action
          const deleteBtn = e.target.closest('.btn-delete-notif');
          if (deleteBtn) {
            e.preventDefault();
            e.stopPropagation();
            const card = deleteBtn.closest('.notification-card');
            if (card) {
              card.remove();
              recalculateCounts();
            }
            return;
          }

          // Otherwise, if card clicked and unread, mark as read
          const card = e.target.closest('.notification-card.unread');
          if (card) {
            markCardAsRead(card);
            recalculateCounts();
          }
        });
      }

      // 2. Mark All as Read Action
      if (btnMarkAllRead) {
        btnMarkAllRead.addEventListener('click', () => {
          const unreadCards = document.querySelectorAll('.notification-card.unread');
          unreadCards.forEach(card => markCardAsRead(card));
          recalculateCounts();
        });
      }

      // 3. Clear All Notifications
      if (btnClearAllNotifs) {
        btnClearAllNotifs.addEventListener('click', () => {
          if (confirm('Are you sure you want to clear all notifications?')) {
            const allCards = document.querySelectorAll('.notification-card');
            allCards.forEach(card => card.remove());
            recalculateCounts();
          }
        });
      }

      // 4. Tab Filtering Logic
      const tabs = document.querySelectorAll('#notifTabs button');
      tabs.forEach(tab => {
        tab.addEventListener('click', function() {
          const category = this.getAttribute('data-category');
          const cards = document.querySelectorAll('.notification-card');

          cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            const cardStatus = card.getAttribute('data-status');

            if (category === 'all') {
              card.classList.remove('d-none');
            } else if (category === 'unread') {
              if (cardStatus === 'unread') card.classList.remove('d-none');
              else card.classList.add('d-none');
            } else {
              if (cardCat === category) card.classList.remove('d-none');
              else card.classList.add('d-none');
            }
          });
        });
      });

      // Helper: Mark single card as read
      function markCardAsRead(card) {
        card.classList.remove('unread');
        card.classList.add('read');
        card.setAttribute('data-status', 'read');

        const dot = card.querySelector('.unread-dot');
        if (dot) dot.remove();

        const badge = card.querySelector('.badge.bg-success-subtle, .badge.bg-warning-subtle, .badge.bg-info-subtle');
        if (badge) {
          badge.className = 'badge bg-light text-muted border border-light-custom small fw-normal';
        }
      }

      // Helper: Recalculate badge & tab counts
      function recalculateCounts() {
        const allCards = document.querySelectorAll('.notification-card');
        const unreadCards = document.querySelectorAll('.notification-card.unread');
        const msgCards = document.querySelectorAll('.notification-card[data-category="messages"]');
        const propCards = document.querySelectorAll('.notification-card[data-category="properties"]');
        const sysCards = document.querySelectorAll('.notification-card[data-category="system"]');

        const unreadCount = unreadCards.length;
        const totalCount = allCards.length;

        // Update tab labels
        const cAll = document.getElementById('count-all');
        const cUnread = document.getElementById('count-unread');
        const cMsg = document.getElementById('count-messages');
        const cProp = document.getElementById('count-properties');
        const cSys = document.getElementById('count-system');

        if (cAll) cAll.textContent = totalCount;
        if (cUnread) cUnread.textContent = unreadCount;
        if (cMsg) cMsg.textContent = msgCards.length;
        if (cProp) cProp.textContent = propCards.length;
        if (cSys) cSys.textContent = sysCards.length;

        // Update Navbar Badge
        if (navNotifBadge) {
          if (unreadCount > 0) {
            navNotifBadge.textContent = unreadCount;
            navNotifBadge.classList.remove('d-none');
          } else {
            navNotifBadge.textContent = '0';
            navNotifBadge.classList.add('d-none');
          }
        }

        if (unreadSummaryText) {
          unreadSummaryText.textContent = `${unreadCount} unread notification${unreadCount === 1 ? '' : 's'}`;
        }

        // Empty state check
        if (totalCount === 0) {
          if (notificationList) notificationList.classList.add('d-none');
          if (emptyState) emptyState.classList.remove('d-none');
          if (btnMarkAllRead) btnMarkAllRead.classList.add('d-none');
          if (btnClearAllNotifs) btnClearAllNotifs.classList.add('d-none');
        }
      }
    });
  </script>
</body>
</html>