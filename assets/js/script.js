jQuery(function($){
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
        
    // SUBMENUS
    $('.navbar--fixed-top .container-fluid .row .menu > li > .sub-menu').wrapInner('<div class="submenu-wrapper"><div class="container-fluid"></div></div>');

    $('.mobile-menu .mobile-menu__wrapper .menu-item-has-children').append('<span class="more"><i></i><i></i><i></i></span>');
    $('<li class="back"><a><i class="icon-cursor"></i>Terug</a></li>').insertBefore('.mobile-menu .mobile-menu__wrapper .menu-item-has-children .sub-menu li:first-child');


    $('.mobile-menu .mobile-menu__wrapper .more').click(function(){
        $('html').addClass('sub-menu-active');
            $(this).closest('li').addClass('children-active');
            $(this).closest('ul.sub-menu').addClass('submenu-active');
    });

    $('.mobile-menu .mobile-menu__wrapper .back').click(function(){
        $('html').removeClass('sub-menu-active');
            $(this).closest('li.children-active').removeClass('children-active');
            $(this).closest('ul.sub-menu.submenu-active').removeClass('submenu-active');
    });

    $('.mobile-menu .mobile-menu__wrapper .sub-menu .sub-menu .back').click(function(){
        $('html').addClass('sub-menu-active');
    });

    // Slider
    $('.photos__slider').flickity({
        cellAlign: 'left',
        friction: 0.4
    });

    // $('[data-fancybox="gallery"]').fancybox({
    //     buttons: [
    //         "slideShow",
    //         "fullScreen",
    //         "close"
    //       ],
    // });
});