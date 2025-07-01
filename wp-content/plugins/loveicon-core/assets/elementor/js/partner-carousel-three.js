(function ($) {

    "use strict";

    var partner_carousel_three = function ($scope, $) {

        //  Partner Carousel 3
        if ($('.partner-carousel-3').length) {
            $('.partner-carousel-3').owlCarousel({
                loop: true,
                margin: 100,
                dots: false,
                nav: false,
                stagePadding: 0,
                singleItem: true,
                smartSpeed: 500,
                autoplay: true,
                autoplayTimeout: 6000,
                navText: ['<span class="flaticon-next left"></span>', '<span class="flaticon-next right"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1199: {
                        items: 5
                    }
                }
            });
        }


    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_partner.default', partner_carousel_three);

    });
})(window.jQuery);