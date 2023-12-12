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
    
    serviceForm = $("#service_form");
    serviceForm.validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            image: {
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
            text: {
                required: true,
            },
            price: {
                required: true,
            }
        },
        messages: {
            image: {
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
        submitHandler: function (serviceForm) {
            serviceForm.submit();
        },
    });
});
