(function ($) { 

    "use strict";

    var banner_js = function ($scope, $) {
        
       // banner-carousel
       
	
if ($('.banner-carousel').length) {
    let dataSlider = $('.banner-carousel').data('slider');
    $('.banner-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:0,
        dots: true,
        singleItem:true,
        smartSpeed: 500,
        autoplay: JSON.parse(dataSlider.autoplay),
        autoplayTimeout:parseInt(dataSlider.autoplayTimeout),
        mouseDrag: JSON.parse(dataSlider.mouseDrag),
        nav: JSON.parse(dataSlider.nav),
        loop: JSON.parse(dataSlider.loop),
        navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1024:{
                items:1
            }
        }
    });    		
}
       


    }
    

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveicon_banner.default', banner_js);

        
    });
})(window.jQuery);
//https://www.loom.com/share/cd697ad8f98a48a1896557f4d6fc113c?focus_title=1&muted=1&from_recorder=1