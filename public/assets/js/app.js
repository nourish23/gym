document.addEventListener("DOMContentLoaded", () => {
    AOS.init();

    $(".navbar-toggler").click(function () {
        $(".navbar-collapse").toggleClass("show");
    });
    const glightbox = GLightbox({
        selector: ".glightbox",
    });

    $(window).on("load", function () {
        $("#js-preloader").addClass("loaded");
    });

    /*------------------
Trainer Slider
--------------------*/
    $(".trainer-slider").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        navText: [" ", " "],
        autoplay: true,
        rtl: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 2,
            },
        },
    });
    $(".review-slider").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        rtl: true,
        autoplay: true,
    });
});
$(document).ready(function () {
    $("#monthly").click(function () {
        $(this).addClass("active");
        $("#sixMonth").removeClass("active");
        $("#yearly").removeClass("active");

        $(".monthlyPriceList").removeClass("d-none");
        $(".monthlyPriceList").addClass("fadeIn");
        $(".sixMonthPriceList").addClass("d-none");
        $(".yearlyPriceList").addClass("d-none");

        $(".indicator").css("left", "2px");
    });

    $("#sixMonth").click(function () {
        $(this).addClass("active");
        $("#monthly").removeClass("active");
        $("#yearly").removeClass("active");

        $(".sixMonthPriceList").removeClass("d-none");
        $(".sixMonthPriceList").addClass("fadeIn");
        $(".monthlyPriceList").addClass("d-none");
        $(".yearlyPriceList").addClass("d-none");

        $(".indicator").css("left", "82px");
    });

    $("#yearly").click(function () {
        $(this).addClass("active");
        $("#monthly").removeClass("active");
        $("#sixMonth").removeClass("active");

        $(".yearlyPriceList").removeClass("d-none");
        $(".yearlyPriceList").addClass("fadeIn");
        $(".monthlyPriceList").addClass("d-none");
        $(".sixMonthPriceList").addClass("d-none");

        $(".indicator").css("left", "163px");
    });
});

function redirectToSubdomain() {
    window.location.href = "https://portal.nourishfitness.net";
}
$(document).ready(function () {
    var register = $("#register");
    register.validate({
        ignore: [],
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
            },
            age: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            countries: {
                required: true,
            },
            password: {
                required: true,
            },
            password_confirmation: {
                required: true,
            },
            services: {
                required: true,
            },
            subscription: {
                required: true,
            },
            do_you_have_anything_else_to_tell_us_about: {
                required: true,
            },
            how_did_you_hear_about_us: {
                required: true,
            },
            terms_and_conditions_acceptance: {
                required: true,
            },
            policy:{
                required:true,
            },
            diseases_symptoms:{
                required:true,
            }
        },
        errorPlacement: function (error, element) {
            // error.addClass("invalid-feedback");
            error.appendTo(element.parent().find(".error-message"));
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});
