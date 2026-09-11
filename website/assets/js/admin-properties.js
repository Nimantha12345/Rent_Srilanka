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

  // 1. URL Query Parameter Sync (e.g. ?filter=pending)
  const urlParams = new URLSearchParams(window.location.search);
  const filterParam = urlParams.get('filter');
  if (filterParam === 'pending' && statusFilter) {
    statusFilter.value = 'Pending';
  }

  // 2. Filter & Sort Function
  function filterAdminProperties() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const typeVal = typeFilter ? typeFilter.value : 'all';
    const districtVal = districtFilter ? districtFilter.value : 'all';
    const statusVal = statusFilter ? statusFilter.value : 'all';

    const tableRows = document.querySelectorAll('.admin-prop-row');
    const mobileCards = document.querySelectorAll('.admin-prop-card');

    let pendingCount = 0;

    tableRows.forEach(row => {
      const title = (row.getAttribute('data-title') || '').toLowerCase();
      const owner = (row.getAttribute('data-owner') || '').toLowerCase();
      const type = row.getAttribute('data-type');
      const district = row.getAttribute('data-district');
      const status = row.getAttribute('data-status');

      if (status === 'Pending') pendingCount++;

      const matchesSearch = title.includes(searchVal) || owner.includes(searchVal);
      const matchesType = (typeVal === 'all' || type === typeVal);
      const matchesDistrict = (districtVal === 'all' || district === districtVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesType && matchesDistrict && matchesStatus) {
        row.classList.remove('d-none');
      } else {
        row.classList.add('d-none');
      }
    });

    mobileCards.forEach(card => {
      const title = (card.getAttribute('data-title') || '').toLowerCase();
      const owner = (card.getAttribute('data-owner') || '').toLowerCase();
      const type = card.getAttribute('data-type');
      const district = card.getAttribute('data-district');
      const status = card.getAttribute('data-status');

      const matchesSearch = title.includes(searchVal) || owner.includes(searchVal);
      const matchesType = (typeVal === 'all' || type === typeVal);
      const matchesDistrict = (districtVal === 'all' || district === districtVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesType && matchesDistrict && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });

    // Update Sidebar Pending Badge Count
    const sidebarBadge = document.getElementById('adminSidebarPendingBadge');
    if (sidebarBadge) sidebarBadge.textContent = pendingCount;
  }

  // Initial Filter Call
  filterAdminProperties();

  // Listeners
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
        const rows = document.querySelectorAll(`[data-id="${activeTargetId}"]`);
        rows.forEach(item => item.remove());
        if (bsDeleteModal) bsDeleteModal.hide();
        filterAdminProperties();
      }
    });
  }

  // Helper to update status badges in DOM dynamically
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