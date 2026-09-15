document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('adminReportSearch');
  const reasonFilter = document.getElementById('adminReasonFilter');
  const statusFilter = document.getElementById('adminReportStatusFilter');
  const sortBySelect = document.getElementById('adminReportSortBy');
  const btnExportCSV = document.getElementById('btnExportReportsCSV');

  // Detail Modal References
  const reportDetailModalEl = document.getElementById('reportDetailModal');
  const modalReportHeaderId = document.getElementById('modalReportHeaderId');
  const modalPropImg = document.getElementById('modalPropImg');
  const modalPropTitle = document.getElementById('modalPropTitle');
  const modalPropId = document.getElementById('modalPropId');
  const modalPropPrice = document.getElementById('modalPropPrice');
  const modalOwnerName = document.getElementById('modalOwnerName');
  const modalOwnerId = document.getElementById('modalOwnerId');
  const modalReporterName = document.getElementById('modalReporterName');
  const modalReporterEmail = document.getElementById('modalReporterEmail');
  const modalReporterPhone = document.getElementById('modalReporterPhone');
  const modalReasonBadge = document.getElementById('modalReasonBadge');
  const modalStatusBadge = document.getElementById('modalStatusBadge');
  const modalReportDate = document.getElementById('modalReportDate');
  const modalDescriptionText = document.getElementById('modalDescriptionText');
  const modalViewListingBtn = document.getElementById('modalViewListingBtn');

  // Modal Action Buttons
  const modalBtnDismiss = document.getElementById('modalBtnDismiss');
  const modalBtnRemoveProp = document.getElementById('modalBtnRemoveProp');
  const modalBtnSuspendOwner = document.getElementById('modalBtnSuspendOwner');
  const modalBtnBlockUser = document.getElementById('modalBtnBlockUser');

  let bsDetailModal = reportDetailModalEl ? new bootstrap.Modal(reportDetailModalEl) : null;

  // Generic Action Confirmation Modal
  const actionConfirmModalEl = document.getElementById('actionConfirmModal');
  const confirmModalTitle = document.getElementById('confirmModalTitle');
  const confirmModalText = document.getElementById('confirmModalText');
  const btnExecuteConfirmAction = document.getElementById('btnExecuteConfirmAction');
  let bsConfirmModal = actionConfirmModalEl ? new bootstrap.Modal(actionConfirmModalEl) : null;

  // Delete Complaint Modal
  const deleteReportModalEl = document.getElementById('deleteReportModal');
  const deleteReportModalText = document.getElementById('deleteReportModalText');
  const btnConfirmDeleteReport = document.getElementById('btnConfirmDeleteReport');
  let bsDeleteReportModal = deleteReportModalEl ? new bootstrap.Modal(deleteReportModalEl) : null;

  let currentActiveReportId = null;
  let pendingActionType = null;

  // ----------------------------------------------------
  // DATATABLES INITIALIZATION WITH LENGTH MENU
  // ----------------------------------------------------
  let reportTable = null;
  if ($('#adminReportsTable').length) {
    reportTable = $('#adminReportsTable').DataTable({
      "paging": true,
      "lengthChange": true, // Show entries dropdown එක සක්‍රිය කිරීම
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "pageLength": 10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "dom": '<"d-flex justify-content-between align-items-center px-3 pt-3 mb-2"l>rt<"d-flex justify-content-between align-items-center p-3"ip>',
      "columnDefs": [
        { "orderable": false, "targets": [1, 6] } // Property details & Actions columns Sort නොකිරීමට
      ]
    });
  }

  // 1. URL Query Parameter Sync (e.g. ?id=402)
  const urlParams = new URLSearchParams(window.location.search);
  const paramId = urlParams.get('id');
  if (paramId) {
    const targetReport = document.querySelector(`[data-report-id="REP-${paramId}"]`);
    if (targetReport) openReportDetailModal(targetReport);
  }

  // 2. Filter & Search Logic with DataTables Support
  function filterAdminReports() {
    const searchVal = searchInput ? searchInput.value.trim() : '';
    const reasonVal = reasonFilter ? reasonFilter.value : 'all';
    const statusVal = statusFilter ? statusFilter.value : 'all';
    const sortVal = sortBySelect ? sortBySelect.value : 'newest';

    // A. Apply Filters to DataTables
    if (reportTable) {
      reportTable.search(searchVal);

      // Reason Filter (Column 3)
      if (reasonVal === 'all') {
        reportTable.column(3).search('');
      } else {
        reportTable.column(3).search(reasonVal);
      }

      // Status Filter (Column 5)
      if (statusVal === 'all') {
        reportTable.column(5).search('');
      } else {
        reportTable.column(5).search('^' + statusVal + '$', true, false);
      }

      // Sorting
      if (sortVal === 'newest') {
        reportTable.order([4, 'desc']); // Date Column (Desc)
      } else if (sortVal === 'oldest') {
        reportTable.order([4, 'asc']);  // Date Column (Asc)
      }

      reportTable.draw();
    }

    // B. Apply Filters to Mobile Cards View
    const mobileCards = document.querySelectorAll('.admin-report-card');
    const searchValLower = searchVal.toLowerCase();

    mobileCards.forEach(card => {
      const reportId = (card.getAttribute('data-report-id') || '').toLowerCase();
      const reason = card.getAttribute('data-reason');
      const status = card.getAttribute('data-status');

      const matchesSearch = reportId.includes(searchValLower);
      const matchesReason = (reasonVal === 'all' || reason === reasonVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesReason && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });

    // C. Update Sidebar Pending Count Badge
    let pendingCount = 0;
    document.querySelectorAll('.admin-report-row').forEach(row => {
      if (row.getAttribute('data-status') === 'Pending') pendingCount++;
    });
    const sidebarBadge = document.getElementById('adminSidebarReportsBadge');
    if (sidebarBadge) sidebarBadge.textContent = pendingCount;
  }

  // Initial Filter Call
  filterAdminReports();

  if (searchInput) searchInput.addEventListener('input', filterAdminReports);
  if (reasonFilter) reasonFilter.addEventListener('change', filterAdminReports);
  if (statusFilter) statusFilter.addEventListener('change', filterAdminReports);
  if (sortBySelect) sortBySelect.addEventListener('change', filterAdminReports);

  // 3. Open Detail Modal
  function openReportDetailModal(rowOrCard) {
    currentActiveReportId = rowOrCard.getAttribute('data-report-id');

    const propId = rowOrCard.getAttribute('data-prop-id');
    const propTitle = rowOrCard.getAttribute('data-prop-title');
    const propPrice = rowOrCard.getAttribute('data-prop-price');
    const propImg = rowOrCard.getAttribute('data-prop-img');
    const ownerName = rowOrCard.getAttribute('data-owner-name');
    const ownerId = rowOrCard.getAttribute('data-owner-id');
    const reporterName = rowOrCard.getAttribute('data-reporter-name');
    const reporterEmail = rowOrCard.getAttribute('data-reporter-email');
    const reporterPhone = rowOrCard.getAttribute('data-reporter-phone');
    const reason = rowOrCard.getAttribute('data-reason');
    const status = rowOrCard.getAttribute('data-status');
    const date = rowOrCard.getAttribute('data-date');
    const description = rowOrCard.getAttribute('data-description');

    if (modalReportHeaderId) modalReportHeaderId.textContent = `Report Reference: ${currentActiveReportId}`;
    if (modalPropImg) modalPropImg.src = propImg;
    if (modalPropTitle) modalPropTitle.textContent = propTitle;
    if (modalPropId) modalPropId.textContent = `RSL-${propId}`;
    if (modalPropPrice) modalPropPrice.textContent = propPrice;
    if (modalOwnerName) modalOwnerName.textContent = ownerName;
    if (modalOwnerId) modalOwnerId.textContent = ownerId;
    if (modalReporterName) modalReporterName.textContent = reporterName;
    if (modalReporterEmail) modalReporterEmail.textContent = reporterEmail;
    if (modalReporterPhone) modalReporterPhone.textContent = reporterPhone;
    if (modalReasonBadge) modalReasonBadge.textContent = reason;
    if (modalStatusBadge) modalStatusBadge.textContent = status;
    if (modalReportDate) modalReportDate.textContent = date;
    if (modalDescriptionText) modalDescriptionText.textContent = description;
    if (modalViewListingBtn) modalViewListingBtn.href = `../property-details.php?id=${propId}`;

    if (bsDetailModal) bsDetailModal.show();
  }

  // Event Delegation for Review, Dismiss & Delete Buttons
  document.addEventListener('click', (e) => {
    
    // Review Trigger
    const reviewBtn = e.target.closest('.btn-report-review');
    if (reviewBtn) {
      e.preventDefault();
      const reportId = reviewBtn.getAttribute('data-report-id');
      const target = document.querySelector(`[data-report-id="${reportId}"]`);
      if (target) openReportDetailModal(target);
    }

    // Quick Dismiss Trigger
    const dismissBtn = e.target.closest('.btn-report-dismiss');
    if (dismissBtn) {
      e.preventDefault();
      const reportId = dismissBtn.getAttribute('data-report-id');
      updateReportStatusUI(reportId, 'Dismissed', 'bg-light text-muted border border-light-custom');
      alert(`Report ${reportId} has been dismissed.`);
    }

    // Delete Complaint Trigger
    const deleteBtn = e.target.closest('.btn-report-delete');
    if (deleteBtn) {
      e.preventDefault();
      currentActiveReportId = deleteBtn.getAttribute('data-report-id');
      if (deleteReportModalText) deleteReportModalText.textContent = `Are you sure you want to permanently delete complaint ${currentActiveReportId}?`;
      if (bsDeleteReportModal) bsDeleteReportModal.show();
    }
  });

  // Confirm Delete Complaint Action
  if (btnConfirmDeleteReport) {
    btnConfirmDeleteReport.addEventListener('click', () => {
      if (currentActiveReportId) {
        // DataTable එකෙන් Row එක ඉවත් කිරීම
        if (reportTable) {
          const tr = document.querySelector(`tr.admin-report-row[data-report-id="${currentActiveReportId}"]`);
          if (tr) reportTable.row(tr).remove().draw();
        }

        // Mobile Card එක ඉවත් කිරීම
        const mobileCards = document.querySelectorAll(`.admin-report-card[data-report-id="${currentActiveReportId}"]`);
        mobileCards.forEach(item => item.remove());

        if (bsDeleteReportModal) bsDeleteReportModal.hide();
        filterAdminReports();
      }
    });
  }

  // 4. Modal Moderation Actions (Triggers Confirmation)
  if (modalBtnDismiss) {
    modalBtnDismiss.addEventListener('click', () => {
      updateReportStatusUI(currentActiveReportId, 'Dismissed', 'bg-light text-muted border border-light-custom');
      if (bsDetailModal) bsDetailModal.hide();
    });
  }

  if (modalBtnRemoveProp) {
    modalBtnRemoveProp.addEventListener('click', () => {
      pendingActionType = 'remove_prop';
      if (confirmModalTitle) confirmModalTitle.textContent = 'Remove Property Listing?';
      if (confirmModalText) confirmModalText.textContent = 'This listing will be immediately delisted from search results and marked as removed.';
      if (bsConfirmModal) bsConfirmModal.show();
    });
  }

  if (modalBtnSuspendOwner) {
    modalBtnSuspendOwner.addEventListener('click', () => {
      pendingActionType = 'suspend_owner';
      if (confirmModalTitle) confirmModalTitle.textContent = 'Suspend Property Owner?';
      if (confirmModalText) confirmModalText.textContent = 'The landlord account will be temporarily frozen and all active listings under their account will be hidden.';
      if (bsConfirmModal) bsConfirmModal.show();
    });
  }

  if (modalBtnBlockUser) {
    modalBtnBlockUser.addEventListener('click', () => {
      pendingActionType = 'block_user';
      if (confirmModalTitle) confirmModalTitle.textContent = 'Permanently Block User?';
      if (confirmModalText) confirmModalText.textContent = 'User access will be revoked immediately and all platform data permanently blocked.';
      if (bsConfirmModal) bsConfirmModal.show();
    });
  }

  // 5. Confirmation Action Execution
  if (btnExecuteConfirmAction) {
    btnExecuteConfirmAction.addEventListener('click', () => {
      if (!currentActiveReportId) return;

      if (pendingActionType === 'remove_prop') {
        updateReportStatusUI(currentActiveReportId, 'Resolved', 'bg-success-subtle text-success border border-success-subtle');
        alert(`Property associated with ${currentActiveReportId} has been removed.`);
      } else if (pendingActionType === 'suspend_owner') {
        updateReportStatusUI(currentActiveReportId, 'Resolved', 'bg-success-subtle text-success border border-success-subtle');
        alert(`Landlord account suspended and report ${currentActiveReportId} resolved.`);
      } else if (pendingActionType === 'block_user') {
        updateReportStatusUI(currentActiveReportId, 'Resolved', 'bg-success-subtle text-success border border-success-subtle');
        alert(`User permanently blocked and report ${currentActiveReportId} resolved.`);
      }

      if (bsConfirmModal) bsConfirmModal.hide();
      if (bsDetailModal) bsDetailModal.hide();
    });
  }

  function updateReportStatusUI(reportId, newStatus, badgeClass) {
    const items = document.querySelectorAll(`[data-report-id="${reportId}"]`);
    items.forEach(item => {
      item.setAttribute('data-status', newStatus);
      const badge = item.querySelector('.badge.bg-danger, .badge.bg-warning-subtle, .badge.bg-success-subtle');
      if (badge) {
        badge.className = `badge ${badgeClass}`;
        badge.textContent = newStatus;
      }
    });
    filterAdminReports();
  }

  if (btnExportCSV) {
    btnExportCSV.addEventListener('click', () => {
      alert('Exporting moderation reports CSV database...');
    });
  }
});