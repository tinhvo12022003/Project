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

    $('#form-signup').validate({
        rules: {
            username: {
                required: true,
                minlength: 8
            },
            password: {
                required: true,
                minlength: 8
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phoneUS: true
            },
            birthday: {
                required: true,
                date: true
            },
            gender: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Please enter a username",
                minlength: "Your username must be at least 8 characters long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            firstname: {
                required: "Please enter your firstname"
            },
            lastname: {
                required: "Please enter your lastname"
            },
            email: {
                required: "Please enter a email",
                email: "Please enter a valid email"
            },
            phone: {
                required: "Please enter a phone number",
                phoneUS: "Please enter a valid phone number"
            },
            birthday: {
                required: "Please enter your birthday",
                date: "Please enter a valid date"
            },
            gender: {
                required: "Please select your gender"
            },
            address: {
                required: "Please enter your address"
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