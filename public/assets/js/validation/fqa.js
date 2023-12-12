$(document).ready(function () {

    fqaForm = $("#fqa_form");
    
    fqaForm.validate({
        ignore: [],
        rules: {
            question: {
                required: true,
            },
            answer: {
                required: true,
            }
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
        submitHandler: function (fqaForm) {
            fqaForm.submit();
        },
    });
});
