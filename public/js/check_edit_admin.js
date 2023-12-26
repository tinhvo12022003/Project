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

    $('#form_edit_admin').validate({
        rules: {
            fullname_admin_edit: {
                required: true,
            },
            username_admin_edit: {
                required: true,
                minlength: 8
            },
            new_username_admin_edit: {
                required: true,
                minlength: 8
            },
            email_admin_edit: {
                required: true,
                email: true
            },
            phone_admin_edit: {
                required: true,
                phoneUS: true
            },
            password_admin_edit: {
                required: true,
                minlength: 8             
            },
            change_admin_password: {
                required: true,
                minlength: 8
            },
            confirm_pwd_admin: {
                required: true,
                minlength: 8,
                equalTo: "#change_admin_password"
            }
        },
        messages: {
            fullname_admin_edit: {
                required: "Please enter your fullname",
            },
            username_admin_edit: {
                required: "Please enter a username",
                minlength: "Username must have at least 8 characters"
            },
            new_username_admin_edit: {
                required: "Please enter a new username",
                minlength: "Username must have at least 8 characters"
            },
            email_admin_edit: {
                required: "Please enter a email",
                email: "Please enter a valid email"
            },
            phone_admin_edit: {
                required: "Please enter a phone number",
                phoneUS: "Please enter a valid phone number"
            },
            password_admin_edit: {
                required: "Please provide a password",
                minlength: "Password must have at least 8 characters"         
            },
            change_admin_password: {
                required: "Please provide a new password",
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