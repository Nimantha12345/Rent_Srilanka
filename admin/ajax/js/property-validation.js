/**
 * Validation - Properties
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for #rejectPropertyForm
 * (Reject Listing modal on properties.php).
 *
 * Usage: include this file BEFORE assets/js/admin-properties.js
 * and call validateRejectForm() at the top of the #btnConfirmReject
 * click handler.
 */

function validateRejectForm() {
    var reason = document.getElementById('rejectReasonSelect');
    var notes = document.getElementById('rejectReasonNotes');

    if (!reason || !reason.value) {
        swal({
            title: "Error!",
            text: "Please select a rejection reason",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!notes || !notes.value.trim()) {
        swal({
            title: "Error!",
            text: "Please provide feedback notes for the owner",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        notes.focus();
        return false;
    }

    return true;
}
