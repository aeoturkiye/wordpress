// Four Item Carousel
(function ($) { 

    "use strict";

    var four_item_carousel = function ($scope, $) {
        
        if ($('.four-item-carousel').length) {
            $('.four-item-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 5000,
                navText: [ '<span class="fas fa-angle-left"></span>', '<span class="fas fa-angle-right"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    800:{
                        items:2
                    },
                    1024:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
                }
            });    		
        }
        if ($('.three-item-carousel').length) {
            $('.three-item-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                smartSpeed: 500,
                autoplay: 1000,
                navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    800:{
                        items:2
                    },
                    1024:{
                        items:3
                    }
                }
            });    		
        }
    }
    

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service2.default', four_item_carousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service1.slider', four_item_carousel);
        e
})(window.jQuery);