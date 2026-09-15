/**
 * Validation - Users
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for #userAdminForm
 * (Add / Edit User Account modal on users.php).
 *
 * Usage: include this file BEFORE assets/js/admin-users.js
 * and call validateUserForm() at the top of the #btnSaveUserModal
 * click handler.
 */

function validateUserForm() {
    var fullName = document.getElementById('modalFullName');
    var email = document.getElementById('modalEmail');
    var phone = document.getElementById('modalPhone');
    var role = document.getElementById('modalRole');
    var status = document.getElementById('modalStatus');

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phonePattern = /^[0-9+\-\s()]{7,15}$/;

    if (!fullName || !fullName.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the full name",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (fullName) fullName.focus();
        return false;
    }

    if (!email || !email.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter an email address",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (email) email.focus();
        return false;
    }

    if (!emailPattern.test(email.value.trim())) {
        swal({
            title: "Error!",
            text: "Please enter a valid email address",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        email.focus();
        return false;
    }

    if (!phone || !phone.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a phone number",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (phone) phone.focus();
        return false;
    }

    if (!phonePattern.test(phone.value.trim())) {
        swal({
            title: "Error!",
            text: "Please enter a valid phone number",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        phone.focus();
        return false;
    }

    if (!role || !role.value) {
        swal({
            title: "Error!",
            text: "Please select a role",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!status || !status.value) {
        swal({
            title: "Error!",
            text: "Please select an account status",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    return true;
}
