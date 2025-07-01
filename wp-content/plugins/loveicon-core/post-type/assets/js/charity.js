



(function ($) { 

    "use strict";

    var causes = function ($scope, $) {

        if ($('.theme_carousel').length) {
            $(".theme_carousel").each(function (index) {
                var $owlAttr = {},
                $extraAttr = $(this).data("options");
                $.extend($owlAttr, $extraAttr);
                $(this).owlCarousel($owlAttr);
            });
        }

    }
    
    var event = function ($scope, $) {

        if ($('.event-style1-carousel').length) {
            $('.event-style1-carousel').owlCarousel({
                loop: true,
                margin: 40,
                dots: false,
                nav: true,
                stagePadding: 0,
                singleItem:true,
                smartSpeed: 500,
                autoplay: true,
                autoplayTimeout:6000,
                navText: [ '<span class="fa fa-long-arrow-left"></span>', '<span class="fa fa-long-arrow-right"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                    992:{
                        items:2
                    },
                    1200:{
                        items:1
                    },
                    1750:{
                        items:2
                    }
                }
            });    		
        }
    }
    

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/LoveIcon_Pro_Slider.default', causes);
        elementorFrontend.hooks.addAction('frontend/element_ready/LoveIcon_Event_Slider.default', event);
    });
})(window.jQuery);