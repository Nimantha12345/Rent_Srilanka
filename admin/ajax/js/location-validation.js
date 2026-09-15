/**
 * Validation - Locations
 * -------------------------------------------------------------------
 * Field-by-field SweetAlert validation for #locationForm
 * (Add New Sri Lankan Location modal on locations.php).
 *
 * Parent Province / District / City are only required when their
 * group is actually visible for the selected Location Entry Level
 * (Province / District / City-Town / Area), matching the show/hide
 * logic already in assets/js/admin-locations.js.
 *
 * Usage: include this file BEFORE assets/js/admin-locations.js
 * and call validateLocationForm() at the top of the #btnSaveLocation
 * click handler.
 */

function validateLocationForm() {
    var type = document.getElementById('locTypeSelect');
    var name = document.getElementById('locNameInput');
    var provinceGroup = document.getElementById('parentProvinceGroup');
    var districtGroup = document.getElementById('parentDistrictGroup');
    var cityGroup = document.getElementById('parentCityGroup');
    var provinceSelect = document.getElementById('parentProvinceSelect');
    var districtSelect = document.getElementById('parentDistrictSelect');
    var citySelect = document.getElementById('parentCitySelect');
    var status = document.getElementById('locStatusSelect');

    if (!type || !type.value) {
        swal({
            title: "Error!",
            text: "Please select the location entry level",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!name || !name.value.trim()) {
        swal({
            title: "Error!",
            text: "Please enter the location name",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        if (name) name.focus();
        return false;
    }

    var groupVisible = function (group) {
        return group && !group.classList.contains('d-none');
    };

    if (groupVisible(provinceGroup) && (!provinceSelect || !provinceSelect.value)) {
        swal({
            title: "Error!",
            text: "Please select a province",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (groupVisible(districtGroup) && (!districtSelect || !districtSelect.value)) {
        swal({
            title: "Error!",
            text: "Please select a district",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (groupVisible(cityGroup) && (!citySelect || !citySelect.value)) {
        swal({
            title: "Error!",
            text: "Please select a city / town",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    if (!status || !status.value) {
        swal({
            title: "Error!",
            text: "Please select a publication status",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
        return false;
    }

    return true;
}
