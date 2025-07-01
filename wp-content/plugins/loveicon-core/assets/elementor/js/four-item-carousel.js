(function ($) { 

    "use strict";

    var four_item_carousel_js = function ($scope, $) {
        
    // Four Item Carousel
	if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 1000,
			navText: [ '<span class="icon-19"></span>', '<span class="icon-18"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:4
				},
				1200:{
					items:4
				}
			}
		});    		
	}



	
    }
    
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_team.default', four_item_carousel_js);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_funfact.default', four_item_carousel_js);
		elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service2.default', four_item_carousel_js);
		elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service1.default', four_item_carousel_js);
    });
})(window.jQuery);