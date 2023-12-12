$(document).ready(function () {
    $.validator.addMethod(
        "fileSize",
        function (value, element, param) {
            // param = size (en bytes)
            // element = element to validate (<input>)
            // value = value of the element (file name)
            return this.optional(element) || element.files[0].size <= param;
        },
        "Maximum allowed size is 25 MB."
    );

    classForm = $("#class_form");

    classForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            thumbnail_url: {
                required: {
                    depends: function (element) {
                        console.log(
                            window.location.pathname.includes("create")
                        );
                        if (window.location.pathname.includes("create")) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                },
                extension: "jpg|jpeg|png",
                fileSize: 26214400,
            },
        },
        messages: {
            thumbnail_url: {
                extension:
                    "Please upload file in these format only (jpg, jpeg, png).",
            },
            video_url: {
                extension: "Allowed file format is mp4.",
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
        submitHandler: function (classForm) {
            classForm.submit();
        },
    });
});
