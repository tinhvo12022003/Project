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

    $('#form_delete_admin').validate({
        rules: {
            username_admin_delete: {
                required: true,
                minlength: 8
            },
            pwd_admin_delete: {
                required: true,
                minlength: 8
            },
            pwd_confirm_admin_delete: {
                required: true,
                minlength: 8,
                equalTo: "#pwd_admin_delete"
            }
        },
        messages: {
            username_admin_delete: {
                required: "Please enter a username",
                minlength: "Username must have at least 8 characters"
            },
            pwd_admin_delete: {
                required: "Please provide a password",
                minlength: "Password must have at least 8 characters"
            },
            pwd_confirm_admin_delete: {
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