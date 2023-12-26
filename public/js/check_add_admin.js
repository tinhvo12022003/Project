$.validator.setDefaults({
    submitHandler: function(e) {
        e.preventDefault();
        alert("Submitted!");
    }
});
$(document).ready(function() {
    $('input').on('change', function() {
        $(this).removeClass('error');
    });

    $('#form_add_admin').validate({
        rules: {
            fullname_admin: {
                required: true,
            },

            username_admin: {
                required: true,
                minlength: 8
            },

            email_admin: {
                required: true,
                email: true
            },

            phone_admin: {
                required: true,
                phoneUS: true
            },

            password_admin: {
                required: true,
                minlength: 8
            },

            confirm_pwd_admin: {
                required: true,
                minlength: 8,
                equalTo: "#password_admin"
            }
        },
        messages: {
            fullname_admin: {
                required: "Please enter your fullname",
            },

            username_admin: {
                required: "Please enter a username",
                minlength: "Username must have at least 8 characters"
            },

            email_admin: {
                required: "Please enter a email",
                email: "Please enter a valid email"
            },

            phone_admin: {
                required: "Please enter a phone number",
                phoneUS: "Please enter a valid phone number"
            },

            password_admin: {
                required: "Please provide a password",
                minlength: "Password must have at least 8 characters"
            },

            confirm_pwd_admin: {
                required: "Please provide a confirm password",
                minlength: "Password must have at least 8 characters",
                equalTo: "Passwords don't match"
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.siblings('label'));
            } else {
                error.insertAfter(element);
            }
        },
        highLight: function(error, element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(error, element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },

    });
});