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

    $('#form-login').validate({
        rules: {
            username: {
                required: true,
                minlength: 8
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            username: {
                required: 'You have not entered your username',
                minlength: 'Username must have at least 8 characters'
            },
            password: {
                required: 'You have not entered your password',
                minlength: 'Password must have at least 8 characters'
            },
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