
$(document).ready(function () {

    notificationForm = $("#notification_form");

    notificationForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            body: {
                required: true,
            },
         //   'user_id[]': {
            //    required: true,
         //   },
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
        submitHandler: function (notificationForm) {
            notificationForm.submit();
        },
    });
});
