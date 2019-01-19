jQuery(function($) {
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

    var faq = $('.faq');
    if( faq.length > 0 ){
        function close_accordion_section() {
            $('.faq__accordion .faq__title a').removeClass('open');
            $('.faq__accordion .faq__content').slideUp(300).removeClass('active');
            $('.faq__accordion').removeClass('active');
        };

        $('.faq__title a').click(function(e) {
            var currentAttrValue = $(this).attr('href');

            if( $(e.target).is('.open') ){
                close_accordion_section();
            } else{
                close_accordion_section();
                $(this).addClass('open');
                $(this).parents('.faq__accordion').addClass('active');
                $(this).addClass('open');
                $('.faq__accordion ' + currentAttrValue).slideDown(300).addClass('active');
            };

            e.preventDefault();
        });
    };

    // Popup
    $('[data-fancybox="products"]').fancybox({
        animationEffect: "fade",
        animationDuration: 400,
        buttons: [],
        touch: false,
        keyboard: false,
        thumbs: false,
		fullScreen: false,
        slideShow: false,
        closeBtn: false,
        smallBtn : false,
        baseTpl:
            '<div class="fancybox-container" role="dialog" tabindex="-1">' +
            '<div class="fancybox-bg"></div>' +
            '<div class="fancybox-inner">' +
            '<div class="fancybox-stage"></div>' +
            '</div>' +
            '</div>',
        // hideScrollbar: false,
    });

    $('.popup__close').on('click', function() {
        $.fancybox.close();
    });
});