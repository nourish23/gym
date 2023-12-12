$(document).ready(function () {
    $.validator.addMethod(
        "floatOrInt",
        function (value, element) {
            return this.optional(element) || /^-?\d*\.?\d+$/.test(value);
        },
        "Please enter a valid number."
    );

    bodyMeasurementForm = $("#body_measurement_form");

    bodyMeasurementForm.validate({
        ignore: [],
        rules: {
            weight: {
                required: true,
            },
            height: {
                required: true,
            },
            chest: {
                required: true,
            },
            waist: {
                required: true,
                number: true,
                min: 1,
            },
            abs: {
                required: true,
            },
            hips: {
                required: true,
            },
            left_thigh: {
                required: true,
            },
            right_thigh: {
                required: true,
            },
            left_arm: {
                required: true,
            },
            right_arm: {
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
        submitHandler: function (bodyMeasurementForm) {
            bodyMeasurementForm.submit();
        },
    });
});
