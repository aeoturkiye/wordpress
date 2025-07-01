(function ($) { 

    "use strict";

    var partner_carousel_two = function ($scope, $) {
        
	//  Partner Carousel 2
if ($('.partner-carousel-2').length) {
    $('.partner-carousel-2').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        stagePadding: 0,
        singleItem:true,
        smartSpeed: 500,
        autoplay: true,
        autoplayTimeout:6000,
        navText: [ '<span class="flaticon-next left"></span>', '<span class="flaticon-next right"></span>' ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1024:{
                items:5
            }
        }
    });    		
}
	
    }
    
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_partner.default', partner_carousel_two);
   
    });
})(window.jQuery);