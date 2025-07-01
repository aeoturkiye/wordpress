(function ($) {
	"use strict";
	var testimonial_style1_carousel = function ($scope, $) {
	// Testimonial Style1 Carousel
if ($('.testimonial-style1_carousel').length) {
    $('.testimonial-style1_carousel').owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        nav: false,
        stagePadding: 0,
        singleItem:true,
        smartSpeed: 500,
        autoplay: true,
        autoplayTimeout:6000,
        navText: [ '<span class="fa fa-angle-left left"></span>', '<span class="fa fa-angle-right right"></span>' ],
        responsive:{
            0:{
                items:1
            },
            768:{
                items:1
            },
            850:{
                items:1
            },
            992:{
                items:1
            },
            1200:{
                items:1
            }
        }
    });    		
}
	}

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_testimonials.default', testimonial_style1_carousel);
	});
})(window.jQuery);