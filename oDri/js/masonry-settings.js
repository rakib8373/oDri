
// Masonry settings to organize footer widgets
jQuery(document).ready(function($){
    var $container = $('.masonry-wraper');
    var $masonryOn;
    var $columnWidth = 400;
    
    if ($(document).width() > 767) {;
        $masonryOn = true;
        runMasonry();
    };

    $(window).resize( function() {
        if ($(document).width() < 768) {
            if ($masonryOn){
                $container.masonry('destroy');
                $masonryOn = false;
            }

        } else {
            $masonryOn = true;
            runMasonry();
        }
    });
    
    function runMasonry() {
        // initialize
        $container.masonry({
            itemSelector: '.active-masonry',
            isAnimated: true
        });
    };
    
});