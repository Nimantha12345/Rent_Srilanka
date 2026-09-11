document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('adminUserSearch');
  const roleFilter = document.getElementById('adminRoleFilter');
  const statusFilter = document.getElementById('adminUserStatusFilter');
  const sortBySelect = document.getElementById('adminUserSortBy');
  const btnExportCSV = document.getElementById('btnExportUsersCSV');
  const btnOpenAddUserModal = document.getElementById('btnOpenAddUserModal');

  // Form Modal References
  const userFormModalEl = document.getElementById('userFormModal');
  const userAdminForm = document.getElementById('userAdminForm');
  const modalFullName = document.getElementById('modalFullName');
  const modalEmail = document.getElementById('modalEmail');
  const modalPhone = document.getElementById('modalPhone');
  const modalRole = document.getElementById('modalRole');
  const modalStatus = document.getElementById('modalStatus');
  const btnSaveUserModal = document.getElementById('btnSaveUserModal');
  let bsFormModal = userFormModalEl ? new bootstrap.Modal(userFormModalEl) : null;

  // View Modal References
  const userViewModalEl = document.getElementById('userViewModal');
  const viewModalName = document.getElementById('viewModalName');
  const viewModalEmail = document.getElementById('viewModalEmail');
  const viewModalPhone = document.getElementById('viewModalPhone');
  const viewModalRole = document.getElementById('viewModalRole');
  const viewModalStatus = document.getElementById('viewModalStatus');
  const viewModalInitials = document.getElementById('viewModalInitials');
  let bsViewModal = userViewModalEl ? new bootstrap.Modal(userViewModalEl) : null;

  // Confirmation Modals
  const suspendModalEl = document.getElementById('suspendUserModal');
  const suspendModalText = document.getElementById('suspendUserModalText');
  const btnConfirmSuspendUser = document.getElementById('btnConfirmSuspendUser');
  let bsSuspendModal = suspendModalEl ? new bootstrap.Modal(suspendModalEl) : null;

  const blockModalEl = document.getElementById('blockUserModal');
  const blockModalText = document.getElementById('blockUserModalText');
  const btnConfirmBlockUser = document.getElementById('btnConfirmBlockUser');
  let bsBlockModal = blockModalEl ? new bootstrap.Modal(blockModalEl) : null;

  const deleteModalEl = document.getElementById('deleteUserModal');
  const deleteModalText = document.getElementById('deleteUserModalText');
  const btnConfirmDeleteUser = document.getElementById('btnConfirmDeleteUser');
  let bsDeleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;

  let activeTargetUserId = null;

  // 1. URL Query Parameter Sync (e.g. ?action=add)
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('action') === 'add' && bsFormModal) {
    bsFormModal.show();
  }

  // 2. Filter & Search Logic
  function filterAdminUsers() {
    const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const roleVal = roleFilter ? roleFilter.value : 'all';
    const statusVal = statusFilter ? statusFilter.value : 'all';

    const tableRows = document.querySelectorAll('.admin-user-row');
    const mobileCards = document.querySelectorAll('.admin-user-card');

    tableRows.forEach(row => {
      const name = (row.getAttribute('data-name') || '').toLowerCase();
      const email = (row.getAttribute('data-email') || '').toLowerCase();
      const phone = (row.getAttribute('data-phone') || '').toLowerCase();
      const role = row.getAttribute('data-role');
      const status = row.getAttribute('data-status');

      const matchesSearch = name.includes(searchVal) || email.includes(searchVal) || phone.includes(searchVal);
      const matchesRole = (roleVal === 'all' || role === roleVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesRole && matchesStatus) {
        row.classList.remove('d-none');
      } else {
        row.classList.add('d-none');
      }
    });

    mobileCards.forEach(card => {
      const name = (card.getAttribute('data-name') || '').toLowerCase();
      const email = (card.getAttribute('data-email') || '').toLowerCase();
      const phone = (card.getAttribute('data-phone') || '').toLowerCase();
      const role = card.getAttribute('data-role');
      const status = card.getAttribute('data-status');

      const matchesSearch = name.includes(searchVal) || email.includes(searchVal) || phone.includes(searchVal);
      const matchesRole = (roleVal === 'all' || role === roleVal);
      const matchesStatus = (statusVal === 'all' || status === statusVal);

      if (matchesSearch && matchesRole && matchesStatus) {
        card.classList.remove('d-none');
      } else {
        card.classList.add('d-none');
      }
    });
  }

  if (searchInput) searchInput.addEventListener('input', filterAdminUsers);
  if (roleFilter) roleFilter.addEventListener('change', filterAdminUsers);
  if (statusFilter) statusFilter.addEventListener('change', filterAdminUsers);
  if (sortBySelect) sortBySelect.addEventListener('change', filterAdminUsers);

  // 3. Open Add User Modal Trigger
  if (btnOpenAddUserModal) {
    btnOpenAddUserModal.addEventListener('click', () => {
      if (userAdminForm) userAdminForm.reset();
      if (userAdminForm) userAdminForm.classList.remove('was-validated');
      document.getElementById('userFormModalLabel').innerHTML = '<i class="bi bi-person-plus-fill text-primary-custom me-2"></i>Add New User Account';
      if (bsFormModal) bsFormModal.show();
    });
  }

  // 4. Action Delegation
  document.addEventListener('click', (e) => {
    
    // View User
    const viewBtn = e.target.closest('.btn-user-view');
    if (viewBtn) {
      e.preventDefault();
      const id = viewBtn.getAttribute('data-id');
      const row = document.querySelector(`.admin-user-row[data-id="${id}"]`);
      if (row) {
        const name = row.getAttribute('data-name');
        const email = row.getAttribute('data-email');
        const phone = row.getAttribute('data-phone');
        const role = row.getAttribute('data-role');
        const status = row.getAttribute('data-status');

        if (viewModalName) viewModalName.textContent = name;
        if (viewModalEmail) viewModalEmail.textContent = email;
        if (viewModalPhone) viewModalPhone.textContent = phone;
        if (viewModalRole) viewModalRole.textContent = role;
        if (viewModalStatus) viewModalStatus.textContent = status;
        if (viewModalInitials) viewModalInitials.textContent = name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();

        if (bsViewModal) bsViewModal.show();
      }
    }

    // Edit User
    const editBtn = e.target.closest('.btn-user-edit');
    if (editBtn) {
      e.preventDefault();
      const id = editBtn.getAttribute('data-id');
      const row = document.querySelector(`.admin-user-row[data-id="${id}"]`);
      if (row) {
        if (modalFullName) modalFullName.value = row.getAttribute('data-name');
        if (modalEmail) modalEmail.value = row.getAttribute('data-email');
        if (modalPhone) modalPhone.value = row.getAttribute('data-phone');
        if (modalRole) modalRole.value = row.getAttribute('data-role');
        if (modalStatus) modalStatus.value = row.getAttribute('data-status');

        document.getElementById('userFormModalLabel').innerHTML = '<i class="bi bi-pencil-square text-primary-custom me-2"></i>Edit User Account';
        if (bsFormModal) bsFormModal.show();
      }
    }

    // Suspend Trigger
    const suspendBtn = e.target.closest('.btn-user-suspend');
    if (suspendBtn) {
      e.preventDefault();
      activeTargetUserId = suspendBtn.getAttribute('data-id');
      const name = suspendBtn.getAttribute('data-name');
      if (suspendModalText) suspendModalText.textContent = `Are you sure you want to suspend user "${name}"?`;
      if (bsSuspendModal) bsSuspendModal.show();
    }

    // Block Trigger
    const blockBtn = e.target.closest('.btn-user-block');
    if (blockBtn) {
      e.preventDefault();
      activeTargetUserId = blockBtn.getAttribute('data-id');
      const name = blockBtn.getAttribute('data-name');
      if (blockModalText) blockModalText.textContent = `Are you sure you want to block user "${name}"? Access will be revoked immediately.`;
      if (bsBlockModal) bsBlockModal.show();
    }

    // Reactivate / Unblock Trigger
    const activateBtn = e.target.closest('.btn-user-activate');
    if (activateBtn) {
      e.preventDefault();
      const id = activateBtn.getAttribute('data-id');
      updateUserStatusUI(id, 'Active', 'bg-success-subtle text-success border border-success-subtle');
      alert(`User account USR-${id} has been reactivated.`);
    }

    // Delete Trigger
    const deleteBtn = e.target.closest('.btn-user-delete');
    if (deleteBtn) {
      e.preventDefault();
      activeTargetUserId = deleteBtn.getAttribute('data-id');
      const name = deleteBtn.getAttribute('data-name');
      if (deleteModalText) deleteModalText.textContent = `Are you sure you want to permanently delete user "${name}" (ID: USR-${activeTargetUserId})? This action cannot be undone.`;
      if (bsDeleteModal) bsDeleteModal.show();
    }
  });

  // 5. Confirm Suspend
  if (btnConfirmSuspendUser) {
    btnConfirmSuspendUser.addEventListener('click', () => {
      if (activeTargetUserId) {
        updateUserStatusUI(activeTargetUserId, 'Suspended', 'bg-warning-subtle text-warning-emphasis border border-warning-subtle');
        if (bsSuspendModal) bsSuspendModal.hide();
      }
    });
  }

  // 6. Confirm Block
  if (btnConfirmBlockUser) {
    btnConfirmBlockUser.addEventListener('click', () => {
      if (activeTargetUserId) {
        updateUserStatusUI(activeTargetUserId, 'Blocked', 'bg-danger-subtle text-danger border border-danger-subtle');
        if (bsBlockModal) bsBlockModal.hide();
      }
    });
  }

  // 7. Confirm Delete
  if (btnConfirmDeleteUser) {
    btnConfirmDeleteUser.addEventListener('click', () => {
      if (activeTargetUserId) {
        const rows = document.querySelectorAll(`[data-id="${activeTargetUserId}"]`);
        rows.forEach(item => item.remove());
        if (bsDeleteModal) bsDeleteModal.hide();
        filterAdminUsers();
      }
    });
  }

  // 8. Save Form Modal
  if (btnSaveUserModal) {
    btnSaveUserModal.addEventListener('click', () => {
      if (userAdminForm && !userAdminForm.checkValidity()) {
        userAdminForm.classList.add('was-validated');
        return;
      }
      alert('User account saved successfully!');
      if (bsFormModal) bsFormModal.hide();
    });
  }

  function updateUserStatusUI(id, newStatus, badgeClass) {
    const items = document.querySelectorAll(`[data-id="${id}"]`);
    items.forEach(item => {
      item.setAttribute('data-status', newStatus);
      const badge = item.querySelector('.badge.bg-success-subtle, .badge.bg-warning-subtle, .badge.bg-danger-subtle');
      if (badge) {
        badge.className = `badge ${badgeClass}`;
        badge.textContent = newStatus;
      }
    });
    filterAdminUsers();
  }

  if (btnExportCSV) {
    btnExportCSV.addEventListener('click', () => {
      alert('Exporting registered users list CSV...');
    });
  }
});