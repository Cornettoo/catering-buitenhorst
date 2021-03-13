jQuery(function ($) {
	// Window scroll addClass to body
	$(window).on('scroll load resize', function () {
		if ($(window).scrollTop() > 100) {
			$('body').addClass('scrolled');
		} else {
			$('body').removeClass('scrolled');
		}
	});

	// Toggle hamburger menu
	$('.navbar__hamburger').on('click', function () {
		$("body").toggleClass("nav-open");
		$("html").toggleClass("not-scrollable");
	});

	$('.mobile-menu .mobile-menu__wrapper .menu-item-has-children').append('<span class="menu-dropdown"></span>');

	
	var mobileMenu = document.getElementsByClassName('mobile-menu')[0];
	var subMenuItems = mobileMenu.getElementsByClassName('menu-item-has-children');
	
	for (var i = 0; i < subMenuItems.length; i++) {
		var subMenu = subMenuItems[i];
		let subMenuActive = false;
		var menuDropdown = $(subMenu).find('.menu-dropdown');

		$(menuDropdown).on('click', function () {
			var subMenuHeight = $(this).parent().find('.sub-menu').outerHeight();
	
			if (!subMenuActive) {
				$(this).parent().css('margin-bottom', subMenuHeight);
				subMenuActive = true;
			} else {
				$(this).parent().css('margin-bottom', 9);
				subMenuActive = false;
			}
	
			$(this).parent().toggleClass('active');
		});
	}

	// Carousels
	var carouselContainers = document.querySelectorAll('.carousel-container');
	for (var i = 0; i < carouselContainers.length; i++) {
		var container = carouselContainers[i];
		initCarouselContainer(container);
	}

	function initCarouselContainer(container) {
		var flkty = new Flickity(container, {
			autoPlay: 4000,
			draggable: '>1',
			friction: .3,
			prevNextButtons: false,
			resize: true
		});

		if (flkty.cells.length <= 1) {
			flkty.destroy();
		}
	}

	// Accordion
	var faq = $('.faq');
	if (faq.length > 0) {
		function close_accordion_section() {
			$('.faq__accordion .faq__title a').removeClass('open');
			$('.faq__accordion .faq__content').slideUp(300).removeClass('active');
			$('.faq__accordion').removeClass('active');
		};

		$('.faq__title a').click(function (e) {
			var currentAttrValue = $(this).attr('href');

			if ($(e.target).is('.open')) {
				close_accordion_section();
			} else {
				close_accordion_section();
				$(this).addClass('open');
				$(this).parents('.faq__accordion').addClass('active');
				$(this).addClass('open');
				$('.faq__accordion ' + currentAttrValue).slideDown(300).addClass('active');
			};

			e.preventDefault();
		});
	};

		// Slider list
	let slidersList = document.querySelectorAll('.slider-list');
	slidersList.forEach(slider => {
		let listItems = slider.querySelectorAll('li'),
			listItemsLength = listItems.length - 1,
			activeListItem = listItems[0],
			activeIndex = 0,
			nextActiveIndex = 1;

		setInterval(function () {
			activeListItem.classList.remove('active');
			listItems[nextActiveIndex].classList.add('active');

			activeIndex = nextActiveIndex;
			activeListItem = listItems[activeIndex];

			nextActiveIndex = nextActiveIndex == listItemsLength ? 0 : nextActiveIndex + 1;
		}, 4000);
	});

});

// Import files
import './components/object-fit';
import './components/products';