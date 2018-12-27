jQuery(function($) {
    'use strict';

    // Window scroll addClass to body
    $(window).on('scroll load resize', function(){
        if( $(window).scrollTop() > 100 ){
            $('body').addClass('scrolled');
        } else {
            $('body').removeClass('scrolled');
        }
    });

    // Toggle hamburger menu
    $('.navbar__hamburger').on('click', function() {
        $("body").toggleClass("nav-open");
        $("html").toggleClass("not-scrollable");
        $('.navbar__hamburger-bar').toggleClass('navbar__hamburger-bar--animate');
    });

    // Carousels
    var carouselContainers = document.querySelectorAll('.carousel-container');
    for (var i=0; i < carouselContainers.length; i++) {
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

    var faq = $('.faq__section');
    if( faq.length > 0 ){
        close_accordion_section();
        function close_accordion_section() {
            $('.accordion .title a').removeClass('open');
            $('.accordion .content').slideUp(300).removeClass('active');
            $('.accordion').removeClass('active');
        };

        $('.title a').click(function(e) {
            var currentAttrValue = $(this).attr('href');

            if( $(e.target).is('.open') ){
                close_accordion_section();
            } else{
                close_accordion_section();
                $(this).addClass('open');
                $(this).parents('.accordion').addClass('active');
                $(this).addClass('open');
                $('.accordion ' + currentAttrValue).slideDown(300).addClass('active');
            };

            e.preventDefault();
        });
    };

    console.log('test');
});