<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages - RentSriLanka</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="messages-page-body overflow-hidden-desktop">

  <?php $activePage = ''; $prefix = ''; include 'components/navbar.php'; ?>

  <main class="chat-layout-wrapper">
    <div class="container-fluid p-0 h-100">
      <div class="row g-0 h-100 position-relative">
        
        <aside class="col-lg-4 col-xl-3 chat-sidebar border-end border-light-custom bg-white" id="chatSidebar">
          <div class="p-3 border-bottom border-light-custom bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h1 class="h5 fw-bold text-navy mb-0">Messages</h1>
              <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" id="totalUnreadBadge">2 Unread</span>
            </div>
            
            <div class="input-group input-group-sm">
              <span class="input-group-text bg-light-custom border-end-0 border-light-custom text-muted"><i class="bi bi-search"></i></span>
              <input type="text" id="searchConversations" class="form-control border-start-0 bg-light-custom border-light-custom shadow-none" placeholder="Search conversations...">
            </div>
          </div>

          <div class="conversation-list-scroll" id="conversationList">
            
            <div class="conversation-item p-3 border-bottom border-light-custom cursor-pointer active-chat" data-id="1" data-name="Kusum Perera" data-status="Online" data-avatar="assets/images/properties/room-1.jpg" data-prop-title="2 Bedroom House in Peradeniya" data-prop-price="Rs. 45,000/mo" data-prop-img="assets/images/properties/house-1.jpg">
              <div class="d-flex gap-3 align-items-center">
                <div class="position-relative flex-shrink-0">
                  <img src="assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover border" width="48" height="48" alt="Kusum Perera">
                  <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" title="Online"></span>
                </div>
                <div class="flex-grow-1 min-w-0">
                  <div class="d-flex justify-content-between align-items-baseline mb-1">
                    <h2 class="h6 fw-bold text-navy text-truncate mb-0">Kusum Perera</h2>
                    <span class="small text-muted chat-time">10:42 AM</span>
                  </div>
                  <p class="small text-teal fw-medium text-truncate mb-1"><i class="bi bi-house-door me-1"></i>2 Bedroom House in Peradeniya</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="small text-muted text-truncate mb-0 last-msg">Yes, the house is available for inspection tomorrow!</p>
                    <span class="badge bg-primary-green rounded-pill unread-badge">2</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="conversation-item p-3 border-bottom border-light-custom cursor-pointer" data-id="2" data-name="Sunil Jayasinghe" data-status="Offline" data-avatar="assets/images/properties/house-2.jpg" data-prop-title="Compact Single Annex in Dehiwala" data-prop-price="Rs. 32,000/mo" data-prop-img="assets/images/properties/recent-1.jpg">
              <div class="d-flex gap-3 align-items-center">
                <div class="position-relative flex-shrink-0">
                  <img src="assets/images/properties/house-2.jpg" class="rounded-circle object-fit-cover border" width="48" height="48" alt="Sunil Jayasinghe">
                  <span class="position-absolute bottom-0 end-0 bg-secondary border border-white rounded-circle p-1" title="Offline"></span>
                </div>
                <div class="flex-grow-1 min-w-0">
                  <div class="d-flex justify-content-between align-items-baseline mb-1">
                    <h2 class="h6 fw-bold text-navy text-truncate mb-0">Sunil Jayasinghe</h2>
                    <span class="small text-muted chat-time">Yesterday</span>
                  </div>
                  <p class="small text-teal fw-medium text-truncate mb-1"><i class="bi bi-house-door me-1"></i>Compact Single Annex in Dehiwala</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="small text-muted text-truncate mb-0 last-msg">Could you please send me your contact number?</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="conversation-item p-3 border-bottom border-light-custom cursor-pointer" data-id="3" data-name="Nalaka Fernando" data-status="Online" data-avatar="assets/images/properties/recent-3.jpg" data-prop-title="Luxury Boarding Room in Colombo 03" data-prop-price="Rs. 28,000/mo" data-prop-img="assets/images/properties/room-2.jpg">
              <div class="d-flex gap-3 align-items-center">
                <div class="position-relative flex-shrink-0">
                  <img src="assets/images/properties/recent-3.jpg" class="rounded-circle object-fit-cover border" width="48" height="48" alt="Nalaka Fernando">
                  <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" title="Online"></span>
                </div>
                <div class="flex-grow-1 min-w-0">
                  <div class="d-flex justify-content-between align-items-baseline mb-1">
                    <h2 class="h6 fw-bold text-navy text-truncate mb-0">Nalaka Fernando</h2>
                    <span class="small text-muted chat-time">Sep 04</span>
                  </div>
                  <p class="small text-teal fw-medium text-truncate mb-1"><i class="bi bi-house-door me-1"></i>Luxury Boarding Room in Colombo 03</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="small text-muted text-truncate mb-0 last-msg">Thank you, key money deposit confirmed.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </aside>

        <section class="col-lg-8 col-xl-9 chat-main-window bg-light-custom" id="chatMain">
          
          <div class="p-3 bg-white border-bottom border-light-custom d-flex justify-content-between align-items-center shadow-xs">
            <div class="d-flex align-items-center gap-2 min-w-0">
              <button class="btn btn-light border btn-sm d-lg-none me-1" id="btnBackToConversations" aria-label="Back to messages list">
                <i class="bi bi-chevron-left"></i>
              </button>
              
              <div class="position-relative flex-shrink-0">
                <img src="assets/images/properties/room-1.jpg" id="activeChatAvatar" class="rounded-circle object-fit-cover border" width="42" height="42" alt="Owner Profile">
                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" id="activeChatStatusDot"></span>
              </div>
              
              <div class="min-w-0">
                <h2 class="h6 fw-bold text-navy mb-0 text-truncate" id="activeChatName">Kusum Perera</h2>
                <span class="small text-success fw-medium" id="activeChatStatusText"><i class="bi bi-circle-fill me-1 fs-8"></i>Online</span>
              </div>
            </div>

            <div class="d-flex align-items-center gap-2">
              <div class="d-none d-md-flex align-items-center bg-light-custom p-1 px-2 rounded border border-light-custom me-2">
                <img src="assets/images/properties/house-1.jpg" id="activePropImg" class="rounded object-fit-cover me-2" width="36" height="36" alt="Property Preview">
                <div class="small min-w-0" style="max-width: 180px;">
                  <div class="text-truncate fw-semibold text-navy" id="activePropTitle">2 Bedroom House in Peradeniya</div>
                  <div class="text-success fw-bold" id="activePropPrice">Rs. 45,000/mo</div>
                </div>
                <a href="property-details.php?id=101" id="activePropLink" class="btn btn-sm btn-outline-primary ms-2 py-0 px-2 fs-7">View</a>
              </div>

              <div class="dropdown">
                <button class="btn btn-light border btn-sm shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Message options">
                  <i class="bi bi-three-dots-vertical text-dark"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-light-custom">
                  <li><a class="dropdown-item small text-danger" href="#" id="btnReportUserModal" data-bs-toggle="modal" data-bs-target="#reportUserModal"><i class="bi bi-flag me-2"></i>Report User</a></li>
                  <li><a class="dropdown-item small text-danger" href="#" id="btnBlockUser"><i class="bi bi-slash-circle me-2"></i>Block User</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item small text-secondary" href="#" id="btnDeleteConversation"><i class="bi bi-trash me-2"></i>Delete Conversation</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="chat-messages-body p-3 p-md-4" id="chatMessagesBody">
            
            <div class="text-center my-3">
              <span class="badge bg-white text-muted border border-light-custom px-3 py-1 rounded-pill small">Yesterday</span>
            </div>

            <div class="d-flex mb-3 align-items-end gap-2 message-row received">
              <img src="assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover border mb-1 flex-shrink-0" width="32" height="32" alt="Owner">
              <div class="message-bubble bg-white border border-light-custom p-3 rounded-4 shadow-xs">
                <p class="mb-1 text-navy small">Hello! Thank you for inquiring about my 2-bedroom house in Peradeniya.</p>
                <span class="time-stamp text-muted">10:30 AM</span>
              </div>
            </div>

            <div class="d-flex mb-3 justify-content-end align-items-end gap-2 message-row sent">
              <div class="message-bubble bg-primary-green text-white p-3 rounded-4 shadow-xs">
                <p class="mb-1 small">Hi Kusum, I would like to arrange a visit to inspect the property tomorrow afternoon. Is that convenient for you?</p>
                <div class="text-end">
                  <span class="time-stamp text-white-50"><i class="bi bi-check2-all me-1"></i>10:38 AM</span>
                </div>
              </div>
            </div>

            <div class="text-center my-3">
              <span class="badge bg-white text-muted border border-light-custom px-3 py-1 rounded-pill small">Today</span>
            </div>

            <div class="d-flex mb-3 align-items-end gap-2 message-row received">
              <img src="assets/images/properties/room-1.jpg" class="rounded-circle object-fit-cover border mb-1 flex-shrink-0" width="32" height="32" alt="Owner">
              <div class="message-bubble bg-white border border-light-custom p-3 rounded-4 shadow-xs">
                <p class="mb-1 text-navy small">Yes, the house is available for inspection tomorrow! Please come around 4:00 PM.</p>
                <span class="time-stamp text-muted">10:42 AM</span>
              </div>
            </div>

          </div>

          <div class="p-3 bg-white border-top border-light-custom">
            <form id="chatForm" class="d-flex align-items-center gap-2">
              
              <button type="button" class="btn btn-light border btn-icon text-muted flex-shrink-0" title="Attach image or file" id="btnAttachment">
                <i class="bi bi-paperclip fs-5"></i>
              </button>
              <input type="file" id="attachmentInput" class="d-none" accept="image/*,.pdf">

              <button type="button" class="btn btn-light border btn-icon text-muted flex-shrink-0 d-none d-sm-inline-flex" title="Insert Emoji" id="btnEmoji">
                <i class="bi bi-emoji-smile fs-5"></i>
              </button>

              <input type="text" id="chatMessageInput" class="form-control border-light-custom shadow-none py-2" placeholder="Type your message..." autocomplete="off" required>

              <button type="submit" class="btn btn-primary fw-medium px-3 py-2 flex-shrink-0 d-flex align-items-center gap-1">
                <span>Send</span> <i class="bi bi-send-fill fs-6"></i>
              </button>
            </form>
          </div>

        </section>

      </div>
    </div>
  </main>

  <div class="modal fade" id="reportUserModal" tabindex="-1" aria-labelledby="reportUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-bottom border-light-custom">
          <h5 class="modal-title fw-bold text-navy" id="reportUserModalLabel"><i class="bi bi-flag text-danger me-2"></i>Report User</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="reportUserForm">
            <p class="small text-muted mb-3">Report <strong class="text-navy" id="reportUserName">Kusum Perera</strong> for violating platform guidelines.</p>
            
            <label class="form-label small fw-semibold text-navy mb-2">Reason</label>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportUserReason" id="uReason1" value="Inappropriate Messages" checked>
              <label class="form-check-label small" for="uReason1">Inappropriate or abusive messages</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportUserReason" id="uReason2" value="Scam Attempt">
              <label class="form-check-label small" for="uReason2">Suspected scam or advance payment fraud</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportUserReason" id="uReason3" value="Spam">
              <label class="form-check-label small" for="uReason3">Spam or unwanted promotion</label>
            </div>

            <div class="mb-3 mt-3">
              <textarea class="form-control border-light-custom shadow-none" rows="3" placeholder="Additional details..."></textarea>
            </div>

            <button type="submit" class="btn btn-danger w-100 fw-medium py-2">Submit Report</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/messages.js"></script>
</body>
</html>