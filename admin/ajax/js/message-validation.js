/**
 * Validation - Messages
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for #newMessageForm
 * (New Direct Admin Message modal on messages.php).
 *
 * Usage: include this file BEFORE assets/js/admin-messages.js
 * and call validateNewMessageForm() at the top of the
 * #btnSubmitNewMessage click handler.
 */

function validateNewMessageForm() {
    var role = document.getElementById('newMsgUserRole');
    var user = document.getElementById('newMsgUserSelect');
    var subject = document.getElementById('newMsgSubjectInput');
    var message = document.getElementById('newMsgText');

    if (!role || !role.value) {
        swal({
            title: "Error!",
            text: "Please select a user role",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!user || !user.value) {
        swal({
            title: "Error!",
            text: "Please select a recipient",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!subject || !subject.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a subject",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (subject) subject.focus();
        return false;
    }

    if (!message || !message.value.trim()) {
        swal({
            title: "Error!",
            text: "Please type a message",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (message) message.focus();
        return false;
    }

    return true;
}
