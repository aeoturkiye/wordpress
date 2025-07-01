(function ($) {

    "use strict";

    var theme_carousel_js = function ($scope, $) {

        if ($('.theme_carousel').length) {
            $(".theme_carousel").each(function (index) {
                var $owlAttr = {},
                    $extraAttr = $(this).data("options");
                $.extend($owlAttr, $extraAttr);

                $(this).owlCarousel($owlAttr);
            });

        }
    }


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/Loveicon_Planning_Programs.default', theme_carousel_js);
    });
})(window.jQuery);