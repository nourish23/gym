$(document).ready(function () {
    $.validator.addMethod(
        "afterStartTime",
        function (value, element, params) {
            var start = new Date($("#start_time").val());
            var end = new Date(value);

            return end > start;
        },
        "End time must be after start time."
    );

    scheduledClassForm = $("#scheduled_class_form");
    scheduledClassForm.validate({
        ignore: [],
        rules: {
            plan_class_id: {
                required: true,
            },
            day_id: {
                required: true,
            },
            status: {
                required: true,
            },
            start_time: {
                required: true,
            },
            end_time: {
                required: true,
                afterStartTime: {
                    start: function () {
                        return $("#start_time").val();
                    },
                },
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
        submitHandler: function (scheduledClassForm) {
            scheduledClassForm.submit();
        },
    });
});
