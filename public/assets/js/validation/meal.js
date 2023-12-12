$(document).ready(function () {

    MealForm = $("#meal_form");
    
    MealForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            time: {
                required: true,
            },
            price: {
                required: true,
            },
            user_id: {
                required: true,
            },
            week_id: {
                required: true,
            },
            status: {
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
        submitHandler: function (MealForm) {
            MealForm.submit();
        },
    });
});
