(function($){
	"use strict";

	// Project Slides
	$('.project-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 4
			}
		}
	});

	// Video Popup
	$('.popup-youtube').magnificPopup({
		disableOn: 320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Feedback Slides
	$('.feedback-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		margin: 30,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
	});

	// Partner Slides
	$('.partner-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: false,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 2
			},
			576: {
				items: 3
			},
			768: {
				items: 4
			},
			1200: {
				items: 6
			}
		}
	});

	// Team Slides
	$('.team-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 15,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 5
			}
		}
	});

	// Odometer JS
	$('.odometer').appear(function(e) {
		var odo = $(".odometer");
		odo.each(function() {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
	});

	// Blog Slides
	$('.blog-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

	// Services Details Slides
	$('.services-image-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		items: 1,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
	});

	// FAQ Accordion
	$(function() {
		$('.accordion').find('.accordion-title').on('click', function(){
			// Adds Active Class
			$(this).toggleClass('active');
			// Expand or Collapse This Panel
			$(this).next().slideToggle('fast');
			// Hide The Other Panels
			$('.accordion-content').not($(this).next()).slideUp('fast');
			// Removes Active Class From Other Titles
			$('.accordion-title').not($(this)).removeClass('active');		
		});
	});

	// Services Slides
	$('.services-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		margin: 30,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

	// Feedback Slides
	$('.feedback-slides-two').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		margin: 30,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 2
			}
		}
	});

	/*end-new-js*/

	// Go to Top
	$(function(){
		//Scroll event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 300) $('.go-top').fadeIn('slow');
			if (scrolled < 300) $('.go-top').fadeOut('slow');
		});  
		//Click event
		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  0);
		});
	});

	// Testimonials Slides
	$('.testimonials-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		items: 1,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: false,
	});

	// Lax JS
	window.onload = function() {
		lax.setup() // init
		const updateLax = () => {
			lax.update(window.scrollY)
			window.requestAnimationFrame(updateLax)
		}
		window.requestAnimationFrame(updateLax)
    }

	// Preloader JS
    jQuery(window).on('load', function() {
        $('.uk-preloader').fadeOut();
    });

	// Header Sticky
	$(window).on('scroll',function() {
		if ($(this).scrollTop() > 120){  
			$('.header-area-with-position-relative').addClass("is-sticky");
		}
		else{
			$('.header-area-with-position-relative').removeClass("is-sticky");
		}
	});

	// Search Menu JS
	$(".uk-navbar .search-box").on("click", function(){
		$(".search-overlay").toggleClass("search-overlay-active");
	});
	$(".search-overlay-close").on("click", function(){
		$(".search-overlay").removeClass("search-overlay-active");
	});
	$(".others-options .search-box").on("click", function(){
		$(".search-overlay").toggleClass("search-overlay-active");
	});
	$(".search-overlay-close").on("click", function(){
		$(".search-overlay").removeClass("search-overlay-active");
	});

	// Creative Projects Slides
	$('.creative-projects-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 3
			},
			1550: {
				items: 5
			}
		}
	});
	$('.creative-projects-slides-two').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 3
			},
			1550: {
				items: 5
			}
		}
	});
	$('.creative-projects-slides-three').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			1200: {
				items: 3
			},
			1550: {
				items: 5
			}
		}
	});

	// Creative Feedback Slides
	$('.creative-reviews-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin: 30,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
	});
	$('.creative-reviews-wrap-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin: 30,
		smartSpeed: 2000,
		autoplayHoverPause: true,
		autoplay: true,
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-right'></i>"
		],
	});

	// Creative Partner Slides
	$('.creative-partner-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: false,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		
		responsive: {
			0: {
				items: 2
			},
			576: {
				items: 3
			},
			768: {
				items: 4
			},
			1200: {
				items: 6
			}
		}
	});
	
	// Creative News Slides
	$('.creative-news-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			1024: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

}(jQuery));