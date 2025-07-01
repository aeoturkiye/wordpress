(function ($) { 

    "use strict";

    var three_item_carousel_js = function ($scope, $) {
        
	//three-item-carousel
	if ($('.three-item-carousel').length) {
		$('.three-item-carousel').owlCarousel({
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
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_team.default', three_item_carousel_js);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_team2.default', three_item_carousel_js);
		elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service1.default', three_item_carousel_js);
		elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_service2.default', three_item_carousel_js);
    });
})(window.jQuery);