(function ($) {
	"use strict";

	$(window).load(function() {
				
				 $(window).scroll(function () {
			        if ($(this).scrollTop() > 100) {
			            $('.scrollup').fadeIn();
			        } else {
			            $('.scrollup').fadeOut();
			        }
			    });

			    $('.scrollup').click(function () {
			        $("html, body").animate({
			            scrollTop: 0
			        }, 600);
			        return false;
			    });

				$(".entry-content").fitVids();
				/**
			     * Superfish menu
			     * ----------------------------------------------------
			     */
			    $('ul.sf-menu').superfish({
			      delay:400
			    });

		/* Modernizr Input fix */

		if (!Modernizr.input.placeholder){
			  $('input[placeholder], textarea[placeholder]').placeholder();
		}

	})

	/* 
	 * Toggles search on and off
	 */
	jQuery(document).ready(function($){
	    $(".search-toggle").click(function(){
	        $("#search-container").slideToggle('slow', function(){
	            $('.search-toggle').toggleClass('active');
	        });
	        // Optional return false to avoid the page "jumping" when clicked
	        return false;
	    });
	});
    
	/* Others jQuery */
	jQuery(document).ready(function(){

		/* jQuery Scroll to UP */
		$('#ScrollToUp').on("click",function(){
		$('html,body').animate({ scrollTop: 0 }, 'slow', function () {});
		});

		jQuery("aside.widget ul li ul.children").parent().addClass("no-border-bottom");

	});

}(jQuery));




