$(document).ready(function(){
	"use strict";
		
	/*
	  =======================================================================
		  		 	Pet Bx-Slider Script
	  =======================================================================
	*/
	if($('.pet-bxslider').length){
		$('.pet-bxslider').bxSlider();
	}
	
	/*
	  =======================================================================
		  		 	Pet Bx-Slider Script
	  =======================================================================
	*/
	if($("a[data-rel^='prettyPhoto']").length){
		$("a[data-rel^='prettyPhoto']").prettyPhoto();
	}
	 
	 /*
	  =======================================================================
		  		 	Pet Testimonail Script
	  =======================================================================
	*/
	if($('.pet_testi_bxslider').length){
		$('.pet_testi_bxslider').bxSlider();
	}
	 
	 /*
	  =======================================================================
		  		 	Pet Range Slider Script Script
	  =======================================================================
	*/
	if($('#ex6').length){
		$("#ex6").slider();
		$("#ex6").on('slide', function(slideEvt) {
			$("#ex6SliderVal").text(slideEvt.value);
		});
	}
		
		
	/*
	  =======================================================================
		  		 	Flex Slider Script Script
	  =======================================================================
	*/
	if($('.flexslider').length){
		$('.flexslider').flexslider({
			animation: "slide",
			prevText: "<i class='fa fa-angle-left'></i>",
			nextText: "<i class='fa fa-angle-right'></i>",
			start: function(slider){
				$('body').removeClass('loading');
			}
		});
	}
		
	// responsive menu
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
			$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());
					
					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	/*
	  =======================================================================
		  		 	Flex Slider Script Script
	  =======================================================================
	*/
	if($('#owl-demo').length){
		$("#owl-demo").owlCarousel({
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			itemsCustom : [
				[0, 1],
				[450, 2],
				[600, 3],
				[700, 4],
				[1000, 6],
				[1200, 6],
				[1400, 6],
				[1600, 6]
			],
			navigation : true
		});
	}
	/*
	  =======================================================================
		  		 	Testimonial Script Script
	  =======================================================================
	*/
	if($('#owl-demo2').length){
		$("#owl-demo2").owlCarousel({
			 
			  itemsCustom : [
				[0, 1],
				[450, 2],
				[600, 3],
				[700, 3],
				[1000, 4],
				[1200, 5],
				[1400, 5],
				[1600, 5]
			  ],
			  navigation : true
		});
	}
  
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').css('opacity','1');
		} else {
			$('.back-to-top').css('opacity','0');
		}
	});
	
	//Click event to scroll to top
	$('.back-to-top a').on('click',function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	
	if($('.kode_pet_navigation').length){
		// grab the initial top offset of the navigation 
		var stickyNavTop = $('.kode_pet_navigation').offset().top;
		// our function that decides weather the navigation bar should have "fixed" css position or not.
		var stickyNav = function(){
			var scrollTop = $(window).scrollTop(); // our current vertical position from the top
			// if we've scrolled more than the navigation, change its position to fixed to stick to top,
			// otherwise change it back to relative
			if (scrollTop > stickyNavTop) { 
				$('.kode_pet_navigation').addClass('kf_sticky');
			} else {
				$('.kode_pet_navigation').removeClass('kf_sticky'); 
			}
		};
		stickyNav();
		// and run it again every time you scroll
		$(window).scroll(function() {
			stickyNav();
		});
	}	
	
	if($('.single-page').length){
		$('.single-page').singlePageNav({
			offset: $('.kode_pet_navigation').outerHeight(),
			filter: ':not(.external)',
			updateHash: true,
			beforeStart: function() {
				console.log('begin scrolling');
			},
			onComplete: function() {
				console.log('done scrolling');
			}
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- */
	
	if($('#contactform').length) {

		var $form = $('#contactform'),
		$loader = '<img src="images/ajax_loading.gif" alt="Loading..." />';
		$form.append('<div class="hidden-me" id="contact_form_responce">');

		var $response = $('#contact_form_responce');
		$response.append('<p></p>');

		$form.submit(function(e){

			$response.find('p').html($loader);

			var data = {
				action: "contact_form_request",
				values: $("#contactform").serialize()
			};

			//send data to server
			$.post("inc/contact-send.php", data, function(response) {

				response = $.parseJSON(response);
				
				$(".incorrect-data").removeClass("incorrect-data");
				$response.find('img').remove();

				if(response.is_errors){

					$response.find('p').removeClass().addClass("error type-2");
					$.each(response.info,function(input_name, input_label) {

						$("[name="+input_name+"]").addClass("incorrect-data");
						$response.find('p').append('Please enter correct "'+input_label+'"!'+ '</br>');
					});

				} else {

					$response.find('p').removeClass().addClass('success type-2');

					if(response.info == 'success'){

						$response.find('p').append('Your email has been sent!');
						$form.find('input:not(input[type="submit"], button), textarea, select').val('').attr( 'checked', false );
						$response.delay(1500).hide(400);
					}

					if(response.info == 'server_fail'){
						$response.find('p').append('Server failed. Send later!');
					}
				}

				// Scroll to bottom of the form to show respond message
				var bottomPosition = $form.offset().top + $form.outerHeight() - $(window).height();

				if($(document).scrollTop() < bottomPosition) {
					$('html, body').animate({
						scrollTop : bottomPosition
					});
				}

				if(!$('#contact_form_responce').css('display') == 'block') {
					$response.show(450);
				}

			});

			e.preventDefault();

		});				

	}
		/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
		if($(".word-count").length){
		$('.word-count').counterUp({
            delay: 10,
            time: 1000
        });
		}
		/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
		if($(".counter").length){
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		}
		/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
		if($(".DateCountdown").length){
			$(".DateCountdown").TimeCircles();
		}
	
});

/* ---------------------------------------------------------------------- */
/*	Google Map Function for Custom Style
/* ---------------------------------------------------------------------- */
function initialize() {
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
	var featureOpts = [
		{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}

	];
	var mapOptions = {
		zoom: 12,
		center: brooklyn,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		zoomControl: false,
		scaleControl: false,
		scrollwheel: false,
		disableDoubleClickZoom: true,
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(
		document.getElementById('map-canvas'),
		mapOptions
	);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}