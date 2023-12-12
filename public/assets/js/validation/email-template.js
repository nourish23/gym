$(document).ready(function () {

    emailTemplateForm = $("#email_template_form");
    
    emailTemplateForm.validate({
        ignore: [],
        rules: {
            subject: {
                required: true,
            },
            content: {
                required: true,
            },
            'user_id[]': {
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
        submitHandler: function (emailTemplateForm) {
            emailTemplateForm.submit();
        },
    });
});
