$(function () {

    "use strict";

    //=======menu fix js====== 
    if ($('.main_menu').offset() != undefined) {
        var navoff = $('.main_menu').offset().top;
        $(window).scroll(function () {
            var scrolling = $(this).scrollTop();

            if (scrolling > navoff) {
                $('.main_menu').addClass('menu_fix');
            } else {
                $('.main_menu').removeClass('menu_fix');
            }
        });
    }


    //=======select2====== 
    $(document).ready(function () {
        $('.select_2').select2();
    });


    //======select js=======
    $('.select_js').niceSelect();


    //======destination slider======
    $('.destination_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //======marquee js=======
    $('.marquee_animi').marquee({
        speed: 50,
        gap: 50,
        delayBeforeStart: 0,
        direction: 'left',
        duplicated: true,
        pauseOnHover: true
    });


    //======= banner search ========
    $(".adv_search_close").on("click", function () {
        $(".adv_search_area").removeClass("show_search");
    });

    $(".adv_search_icon").on("click", function (event) {
        $(".adv_search_area").toggleClass("show_search");
        event.stopPropagation();
    });

    $('body').click(function (event) {
        if ($(".adv_search_area").hasClass("show_search")) {
            if (!$(event.target).closest('.banner_search').length) {
                $(".adv_search_area").removeClass("show_search");
            }
        }
    });


//======= banner search ========
    $(".adv_search_close2").on("click", function () {
        $(".adv_search_area2").removeClass("show_search");
    });

    $(".adv_search_icon2").on("click", function (event) {
        $(".adv_search_area2").toggleClass("show_search");
        event.stopPropagation();
    });

    $('body').click(function (event) {
        if ($(".adv_search_area2").hasClass("show_search")) {
            if (!$(event.target).closest('.banner_search').length) {
                $(".adv_search_area2").removeClass("show_search");
            }
        }
    });
//======= banner search ========
    $(".adv_search_close3").on("click", function () {
        $(".adv_search_area3").removeClass("show_search");
    });

    $(".adv_search_icon3").on("click", function (event) {
        $(".adv_search_area3").toggleClass("show_search");
        event.stopPropagation();
    });

    $('body').click(function (event) {
        if ($(".adv_search_area3").hasClass("show_search")) {
            if (!$(event.target).closest('.banner_search').length) {
                $(".adv_search_area3").removeClass("show_search");
            }
        }
    });
//======= banner search ========
    $(".adv_search_close4").on("click", function () {
        $(".adv_search_area4").removeClass("show_search");
    });

    $(".adv_search_icon4").on("click", function (event) {
        $(".adv_search_area4").toggleClass("show_search");
        event.stopPropagation();
    });

    $('body').click(function (event) {
        if ($(".adv_search_area4").hasClass("show_search")) {
            if (!$(event.target).closest('.banner_search').length) {
                $(".adv_search_area4").removeClass("show_search");
            }
        }
    });





    //======category slider======
    $('.category_pro_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        cssEase: 'linear',
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //====== testimonial slider ======= 
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: true,
        asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //======category slider======
    $('.latest_pro_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //======featured listingr slider======
    $('.featured_listing_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //======testimonial 2 slider======
    $('.testimonial_2_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            }
        ]
    });


    //======WOW JS========
    new WOW().init();


    //======STICKY SIDEBAR======= 
    $(".sticky_sidebar").stickit({
        top: 90,
    })


    //=====LOGIN PASSWORD======== 
    $(".show_password").on("click", function () {
        $(".show_password").toggleClass("show");
    });

    $(".show_confirm_password").on("click", function () {
        $(".show_confirm_password").toggleClass("show");
    });


    //=====BARFILLER BAR=====
    $(document).ready(function () {
        $('#bar1').barfiller();
        $('#bar2').barfiller();
        $('#bar3').barfiller();
        $('#bar4').barfiller();
        $('#bar5').barfiller();
        $('#bar6').barfiller();
        $('#bar7').barfiller();
        $('#bar8').barfiller();
    });


    //=====PROPERTY DETAILS SLIDER======== 
    $('.slider-for2').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.slider-nav2'
    });
    $('.slider-nav2').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for2',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            }
        ]
    });


    //=====SUMMER NOTE======== 
    $(document).ready(function () {
        $('.summer_note').summernote();
    });


    //======MOBILE MENU BUTTON=======
    $(".navbar-toggler").on("click", function () {
        $(".navbar-toggler").toggleClass("show");
    });


    //======related property slider======
    $('.related_property_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            }
        ]
    });


    //======dsahboard menu icon======
    $(".sidebar_menu_icon").on("click", function () {
        $(".dashboard_sidebar").toggleClass("dash_show_menu");
    });

});
