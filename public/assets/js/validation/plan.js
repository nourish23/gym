$(document).ready(function () {

    planForm = $("#plan_form");
    
    planForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            is_free: {
                required: true,
            },
            price: {
                required: true,
            },
            category_id: {
                required: true,
            },
            period: {
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
        submitHandler: function (planForm) {
            planForm.submit();
        },
    });
});
