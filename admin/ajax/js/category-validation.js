/**
 * Validation - Categories & Facilities
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for:
 *  - #categoryForm  (Add / Edit Category modal)
 *  - #facilityForm  (Add / Edit Facility modal)
 *
 * Usage: include this file BEFORE assets/js/admin-categories.js
 * and call validateCategoryForm() / validateFacilityForm() at the
 * top of the respective Save button click handlers.
 */

function validateCategoryForm() {
    var name = document.getElementById('catNameInput');
    var slug = document.getElementById('catSlugInput');
    var desc = document.getElementById('catDescInput');
    var icon = document.getElementById('catIconInput');
    var status = document.getElementById('catStatusSelect');

    if (!name || !name.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the category name",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (name) name.focus();
        return false;
    }

    if (!slug || !slug.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the category slug",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (slug) slug.focus();
        return false;
    }

    if (!desc || !desc.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a short description",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (desc) desc.focus();
        return false;
    }

    if (!icon || !icon.value.trim()) {
        swal({
            title: "Error!",
            text: "Please choose an icon class for this category",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (icon) icon.focus();
        return false;
    }

    if (!status || !status.value) {
        swal({
            title: "Error!",
            text: "Please select a status",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    return true;
}

function validateFacilityForm() {
    var name = document.getElementById('facNameInput');
    var icon = document.getElementById('facIconInput');
    var tag = document.getElementById('facTagInput');

    if (!name || !name.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the facility / amenity name",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (name) name.focus();
        return false;
    }

    if (!icon || !icon.value.trim()) {
        swal({
            title: "Error!",
            text: "Please choose an icon class for this facility",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (icon) icon.focus();
        return false;
    }

    if (!tag || !tag.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter a filter tag for this facility",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (tag) tag.focus();
        return false;
    }

    return true;
}
