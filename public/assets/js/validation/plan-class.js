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

    planClassForm = $("#plan_class_form");

    planClassForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            // status: {
            //     required: true,
            // },
            class_type: {
                required: true,
            },
            duration: {
                required: false,
            },
            subscription_end_date: {
                required: true,
            },
            // color: {
            //     required: true,
            // },
            burn_rate: {
                required: true,
            },
            coache_id: {
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
            video_url: {
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
                extension: "mp4",
                fileSize:300 * 1024 * 1024,
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
        submitHandler: function (planClassForm) {
            planClassForm.submit();
        },
    });

    function handleConditionalRequirements() {
        var classType = $("select[name='class_type']").val();
        var thumbnailUrlField = $("input[name='thumbnail_url']");
        var videoUrlField = $("input[name='video_url']");
        if (classType === "1") {
            thumbnailUrlField.rules("add", "required");
            videoUrlField.rules("add", "required");
        } else {
            thumbnailUrlField.rules("remove", "required");
            videoUrlField.rules("remove", "required");
        }
    }
    $("select[name='class_type']").on("change", handleConditionalRequirements);
    handleConditionalRequirements();
});
