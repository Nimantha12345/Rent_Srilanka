$(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var email = $('#loginEmail').val().trim();
        var password = $('#loginPassword').val().trim();
        var role = $('#loginRole').val();
        var rememberMe = $('#rememberMe').is(':checked');

        if (!email) {
            Swal.fire({
                title: "Error!",
                text: "Please enter your email address",
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            Swal.fire({
                title: "Error!",
                text: "Please enter a valid email address",
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!password) {
            Swal.fire({
                title: "Error!",
                text: "Please enter your password",
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {

            // UI state during authentication
            $('#btnLoginSubmit').prop('disabled', true);
            $('#btnSubmitText').text('Authenticating...');
            $('#btnSubmitSpinner').removeClass('d-none');

            $.ajax({
                url: 'ajax/php/login.php', // dynamic login backend script
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    role: role,
                    remember_me: rememberMe
                },
                dataType: 'json',
                success: function (result) {
                    $('#btnLoginSubmit').prop('disabled', false);
                    $('#btnSubmitText').text('Log In to Portal');
                    $('#btnSubmitSpinner').addClass('d-none');

                    if (result.status === "success") {
                        Swal.fire({
                            title: "Success!",
                            text: result.message || "Login successful!",
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.href = result.redirect || 'dashboard.php';
                        });
                    } else {
                        Swal.fire({
                            title: "Login Failed",
                            text: result.message || "Invalid Email or Password",
                            icon: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function () {
                    $('#btnLoginSubmit').prop('disabled', false);
                    $('#btnSubmitText').text('Log In to Portal');
                    $('#btnSubmitSpinner').addClass('d-none');

                    Swal.fire({
                        title: "Error!",
                        text: "Server error occurred. Please try again.",
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
    });
});