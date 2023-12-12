$(document).ready(function () {

    MealDataForm = $("#meal_data_form");
    
    MealDataForm.validate({
        ignore: [],
        rules: {
            body: {
                required: true,
            },
            day_id: {
                required: true,
            },
            status: {
                required: true,
            } 
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
        submitHandler: function (MealDataForm) {
            MealDataForm.submit();
        },
    });
});
