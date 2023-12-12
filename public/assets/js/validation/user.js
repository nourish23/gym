$(document).ready(function () {

    user = $("#user_form");
    
    user.validate({
        ignore: [],
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                maxlength: 30,
            },
            last_name: {
                required: true,
                minlength: 2,
                maxlength: 30,
            },
            phone_number: {
                required: true,
            },
            age: {
                required: true,
                number: true,
                min: 1,
            },
            subscription_end_date: {
                required: true,
            },
            is_active: {
                required: true,
            },
            is_paid: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            terms_and_conditions_acceptance: {
                required: true,
            },
            diseases_symptoms: {
                required: true,
            },
            health_problems: {
                required: true,
            },
            food_disliked: {
                required: true,
            },
            food_allergies: {
                required: true,
            },
            supplements_taken: {
                required: true,
            },
            do_you_have_anything_else_to_tell_us_about: {
                required: true,
            },
            how_did_you_hear_about_us: {
                required: true,
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (user) {
             user.submit();
        },
    });
});
