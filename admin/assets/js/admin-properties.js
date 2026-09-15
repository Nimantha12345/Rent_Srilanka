document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('adminPropSearch');
  const typeFilter = document.getElementById('adminTypeFilter');
  const districtFilter = document.getElementById('adminDistrictFilter');
  const statusFilter = document.getElementById('adminStatusFilter');
  const sortBySelect = document.getElementById('adminSortBy');
  const btnExportCSV = document.getElementById('btnExportCSV');

  // Modal References
  const approveModalEl = document.getElementById('approvePropModal');
  const approveModalText = document.getElementById('approvePropModalText');
  const btnConfirmApprove = document.getElementById('btnConfirmApprove');
  let bsApproveModal = approveModalEl ? new bootstrap.Modal(approveModalEl) : null;

  const rejectModalEl = document.getElementById('rejectPropModal');
  const rejectForm = document.getElementById('rejectPropertyForm');
  const rejectReasonNotes = document.getElementById('rejectReasonNotes');
  const btnConfirmReject = document.getElementById('btnConfirmReject');
  let bsRejectModal = rejectModalEl ? new bootstrap.Modal(rejectModalEl) : null;

  const deleteModalEl = document.getElementById('deletePropModal');
  const deleteModalText = document.getElementById('deletePropModalText');
  const btnConfirmDelete = document.getElementById('btnConfirmDelete');
  let bsDeleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;

  let activeTargetId = null;

  // ----------------------------------------------------
  // DATATABLES INITIALIZATION WITH LENGTH MENU
  // ----------------------------------------------------
  let propTable = null;
  if ($('#adminPropertiesTable').length) {
    propTable = $('#adminPropertiesTable').DataTable({
      "paging": true,
      "lengthChange": true, // Show entries dropdown එක සක්‍රිය කිරීම
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "pageLength": 10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      // Default Search box එක සඟවා Top Left එකට Length Menu එක පමණක් පෙන්වීමට:
      "dom": '<"d-flex justify-content-between align-items-center px-3 pt-3 mb-2"l>rt<"d-flex justify-content-between align-items-center p-3"ip>',
      "columnDefs": [
        { "orderable": false, "targets": [0, 7] } // Property Details & Actions columns Sort නොකිරීමට
      ]
    });
  }

  // 1. URL Query Parameter Sync (e.g. ?filter=pending)
  const urlParams = new URLSearchParams(window.location.search);
  const filterParam = urlParams.get('filter');
  if (filterParam === 'pending' && statusFilter) {
    statusFilter.value = 'Pending';
  }

  // 2. Filter & Sort Handler (DataTables + Mobile Cards)
  function filterAdminProperties() {
    const searchVal = searchInput ? searchInput.value.trim() : '';
    const typeVal = typeFilter ? typeFilter.value : 'all';
    const districtVal = districtFilter ? districtFilter.value : 'all';
    const statusVal = statusFilter ? statusFilter.value : 'all';
    const sortVal = sortBySelect ? sortBySelect.value : 'newest';

    // A. Apply Filters to DataTables
    if (propTable) {
      // Custom Search Input (Title / Owner)
      propTable.search(searchVal);

      // Property Type (Column 2)
      if (typeVal === 'all') {
        propTable.column(2).search('');
      } else {
        propTable.column(2).search('^' + typeVal + '$', true, false);
      }

      // District (Column 3)
      if (districtVal === 'all') {
        propTable.column(3).search('');
      } else {
        propTable.column(3).search(districtVal);
      }

      // Status (Column 5)
      if (statusVal === 'all') {
        propTable.column(5).search('');
      } else {
        propTable.column(5).search('^' + statusVal + '$', true, false);
      }

      // Sorting
      if (sortVal === 'newest') {
        propTable.order([6, 'desc']); // Created Date (Desc)
      } else if (sortVal === 'oldest') {
        propTable.order([6, 'asc']);  // Created Date (Asc)
      } else if (sortVal === 'price_high') {
        propTable.order([4, 'desc']); // Price (Desc)
      }

      propTable.draw();
    }

    // B. Apply Filters to Mobile Cards View
    const mobileCards = document.querySelectorAll('.admin-prop-card');
    const searchValLower = searchVal.toLowerCase();

    mobileCards.forEach(card => {
      const title = (card.getAttribute('data-title') || '').toLowerCase();
      const owner = (card.getAttribute('data-owner') || '').toLowerCase();
      const type = card.getAttribute('data-type');
      const district = card.getAttribute('data-district');
      const status = card.getAttribute('data-status');

      const matchesSearch = title.includes(searchValLower) || owner.includes(searchValLower);
      const matchesType = (typeVal === 'all' || type === typeVal);
      const matchesDistrict = (districtVal === 'all' || district === districtVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesType && matchesDistrict && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });

    // C. Update Sidebar Pending Count Badge
    let pendingCount = 0;
    document.querySelectorAll('.admin-prop-row').forEach(row => {
      if (row.getAttribute('data-status') === 'Pending') pendingCount++;
    });
    const sidebarBadge = document.getElementById('adminSidebarPendingBadge');
    if (sidebarBadge) sidebarBadge.textContent = pendingCount;
  }

  // Initial Filter Run
  filterAdminProperties();

  // Filter Event Listeners
  if (searchInput) searchInput.addEventListener('input', filterAdminProperties);
  if (typeFilter) typeFilter.addEventListener('change', filterAdminProperties);
  if (districtFilter) districtFilter.addEventListener('change', filterAdminProperties);
  if (statusFilter) statusFilter.addEventListener('change', filterAdminProperties);
  if (sortBySelect) sortBySelect.addEventListener('change', filterAdminProperties);

  // 3. Action Click Event Delegation
  document.addEventListener('click', (e) => {
    
    // Approve Action Trigger
    const approveBtn = e.target.closest('.btn-admin-approve');
    if (approveBtn) {
      e.preventDefault();
      activeTargetId = approveBtn.getAttribute('data-id');
      const title = approveBtn.getAttribute('data-title');
      if (approveModalText) approveModalText.textContent = `Are you sure you want to approve and publish "${title}"?`;
      if (bsApproveModal) bsApproveModal.show();
    }

    // Reject Action Trigger
    const rejectBtn = e.target.closest('.btn-admin-reject');
    if (rejectBtn) {
      e.preventDefault();
      activeTargetId = rejectBtn.getAttribute('data-id');
      if (rejectForm) rejectForm.classList.remove('was-validated');
      if (rejectReasonNotes) rejectReasonNotes.value = '';
      if (bsRejectModal) bsRejectModal.show();
    }

    // Suspend Action Trigger
    const suspendBtn = e.target.closest('.btn-admin-suspend');
    if (suspendBtn) {
      e.preventDefault();
      const id = suspendBtn.getAttribute('data-id');
      updateStatusUI(id, 'Suspended', 'bg-dark-subtle text-dark border border-dark-subtle');
      alert(`Property RSL-${id} status updated to Suspended.`);
    }

    // Delete Action Trigger
    const deleteBtn = e.target.closest('.btn-admin-delete');
    if (deleteBtn) {
      e.preventDefault();
      activeTargetId = deleteBtn.getAttribute('data-id');
      const title = deleteBtn.getAttribute('data-title');
      if (deleteModalText) deleteModalText.textContent = `Are you sure you want to permanently delete "${title}" (ID: RSL-${activeTargetId})?`;
      if (bsDeleteModal) bsDeleteModal.show();
    }
  });

  // 4. Confirm Approve Handler
  if (btnConfirmApprove) {
    btnConfirmApprove.addEventListener('click', () => {
      if (activeTargetId) {
        updateStatusUI(activeTargetId, 'Approved', 'bg-success-subtle text-success border border-success-subtle');
        if (bsApproveModal) bsApproveModal.hide();
      }
    });
  }

  // 5. Confirm Reject Handler
  if (btnConfirmReject) {
    btnConfirmReject.addEventListener('click', () => {
      if (rejectForm && !rejectForm.checkValidity()) {
        rejectForm.classList.add('was-validated');
        return;
      }

      if (activeTargetId) {
        updateStatusUI(activeTargetId, 'Rejected', 'bg-danger-subtle text-danger border border-danger-subtle');
        if (bsRejectModal) bsRejectModal.hide();
      }
    });
  }

  // 6. Confirm Delete Handler
  if (btnConfirmDelete) {
    btnConfirmDelete.addEventListener('click', () => {
      if (activeTargetId) {
        // DataTable එකෙන් Row එක Remove කිරීම
        if (propTable) {
          const tr = document.querySelector(`tr.admin-prop-row[data-id="${activeTargetId}"]`);
          if (tr) propTable.row(tr).remove().draw();
        }

        // Mobile Card එක Remove කිරීම
        const mobileCards = document.querySelectorAll(`.admin-prop-card[data-id="${activeTargetId}"]`);
        mobileCards.forEach(item => item.remove());

        if (bsDeleteModal) bsDeleteModal.hide();
        filterAdminProperties();
      }
    });
  }

  // Dynamic Status UI Updating Helper
  function updateStatusUI(id, newStatus, badgeClass) {
    const items = document.querySelectorAll(`[data-id="${id}"]`);
    items.forEach(item => {
      item.setAttribute('data-status', newStatus);
      const badge = item.querySelector('.badge.bg-warning-subtle, .badge.bg-success-subtle, .badge.bg-danger-subtle, .badge.bg-dark-subtle');
      if (badge) {
        badge.className = `badge ${badgeClass}`;
        badge.textContent = newStatus;
      }
    });
    filterAdminProperties();
  }

  // Export CSV Handler
  if (btnExportCSV) {
    btnExportCSV.addEventListener('click', () => {
      alert('Exporting properties database CSV report...');
    });
  }
});