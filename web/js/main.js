;(function () {
	
	'use strict';

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
	    	}
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#fh5co-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#fh5co-offcanvas').append(clone2);

		$('#fh5co-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#fh5co-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};



	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var testimonialCarousel = function(){
		var owl = $('.owl-carousel-fullwidth');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
		});
	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};


	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	var counterWayPoint = function() {
		if ($('#fh5co-counter').length > 0 ) {
			$('#fh5co-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	// Parallax
	var parallax = function() {
		$(window).stellar();
	};

	var mobileNavFix = function(){
		$("div#fh5co-offcanvas > ul > li:not(.offcanvas-has-dropdown) > a, div#fh5co-offcanvas > ul > li.offcanvas-has-dropdown > ul > li > a").click(function (e) {
			$('body').removeClass('offcanvas');
			$('.js-fh5co-nav-toggle').removeClass('active');

			window.location.hash = this.href;
		});
	};

	$(function(){
		mobileMenuOutsideClick();
		parallax();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		dropdown();
		testimonialCarousel();
		goToTop();
		loaderPage();
		counter();
		counterWayPoint();

		mobileNavFix();

		$(function() {

			// wedding_date, date_before_text, date_after_text передаются из php на странице site/index
			if (wedding_date === undefined) wedding_date = '0';
			if (date_before_text === undefined) date_before_text = 'Мы поженимся через';
			if (date_after_text === undefined) date_after_text = 'Мы женаты';

			wedding_date = parseInt(wedding_date) + (new Date()).getTimezoneOffset() *60;

			// let d = new Date(2019, 8, 20, 12, 40, 0, 0);
			let d = new Date(wedding_date*1000);
			console.log(date_after_text);

			$('.simply-countdown-text').text(date_before_text);

			let args = {
				year: d.getFullYear(),
				month: d.getMonth() + 1,
				day: d.getDate(),
				enableUtc: false,
				words: {
					days: 'дней',
					hours: 'часов',
					minutes: 'минут',
					seconds: 'секунд',
					pluralLetter: ''
				},
			};

			// Дата прошла
			if (Date.now() - d > 0) {
				$('.simply-countdown-text').text(date_after_text);
				simplyCountup('.simply-countdown-one', args);
			} else
				simplyCountdown('.simply-countdown-one', args);
		});

	});


}());


function yandexMapLoad(number) {

	let map_iframe = "";

	switch (number) {
		case 1:
			map_iframe = '<iframe src="https://yandex.ru/map-widget/v1/-/CCwNV01f" width="100%" height="400" frameborder="0" allowfullscreen="true"></iframe>';
			break;
		case 2:
			map_iframe = '<iframe src="https://yandex.ru/map-widget/v1/-/CGeOB24A" width="100%" height="400" frameborder="0" allowfullscreen="true"></iframe>';
			break;
		case 3:
			map_iframe = '<iframe src="https://yandex.ru/map-widget/v1/-/CCwRIWmy" width="100%" height="400" frameborder="0" allowfullscreen="true"></iframe>';
			break;
	}
	$($('#map_' + number + '>div>div>div.modal-body')).html(map_iframe);

};