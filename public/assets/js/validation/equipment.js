$(document).ready(function () {

    equipmentForm = $("#equipment_form");
    
    equipmentForm.validate({
        ignore: [],
        rules: {
            name: {
                required: true,
            },
            additional_info: {
                required: true,
            },
            status: {
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
        submitHandler: function (equipmentForm) {
            equipmentForm.submit();
        },
    });
});
