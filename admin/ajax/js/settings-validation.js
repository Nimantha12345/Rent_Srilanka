/**
 * Validation - Settings
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for:
 *  - #websiteSettingsForm   (Website Configuration & Branding tab)
 *  - #securitySettingsForm  (Security & Authentication tab)
 *
 * Usage: include this file BEFORE assets/js/admin-settings.js
 * and call validateWebsiteSettingsForm() / validateSecuritySettingsForm()
 * at the top of each form's submit handler.
 */

function validateWebsiteSettingsForm() {
    var siteName = document.getElementById('siteName');
    var contactEmail = document.getElementById('siteContactEmail');
    var phone = document.getElementById('sitePhone');

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!siteName || !siteName.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the site name",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (siteName) siteName.focus();
        return false;
    }

    if (!contactEmail || !contactEmail.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a contact email address",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (contactEmail) contactEmail.focus();
        return false;
    }

    if (!emailPattern.test(contactEmail.value.trim())) {
        swal({
            title: "Error!",
            text: "Please enter a valid contact email address",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        contactEmail.focus();
        return false;
    }

    if (!phone || !phone.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a contact phone number",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (phone) phone.focus();
        return false;
    }

    return true;
}

function validateSecuritySettingsForm() {
    var sessionTimeout = document.getElementById('sessionTimeoutSelect');
    var loginLimit = document.getElementById('loginLimitSelect');

    if (!sessionTimeout || !sessionTimeout.value) {
        swal({
            title: "Error!",
            text: "Please select a session timeout duration",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!loginLimit || !loginLimit.value) {
        swal({
            title: "Error!",
            text: "Please select a login attempt limit",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    return true;
}
