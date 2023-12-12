$(document).ready(function () {
    countryForm = $("#country_form");

    countryForm.validate({
        ignore: [],
        rules: {
            name: {
                required: true,
            },
            code: {
                required: true,
            },
            flag_url: {
                required: true,
            },
            phone_code: {
                 required: true,
            },
            status: {
                 required: true,
            },
            phone_length: {
                 required: true,
            },
            currency: {
                 required: true,
            },
        },
        messages: {
            image_url: {
                extension:
                    "Please upload file in these format only (jpg, jpeg, png).",
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
        submitHandler: function (countryForm) {
            countryForm.submit();
        },
    });
});
