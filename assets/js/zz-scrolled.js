jQuery(document).ready(function($) {
    if ($(window).width() > 520) {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 31 || $('#main').scrollTop() > 31) {
                $('body').addClass('scrolled');
            }
            else {
                $('body').removeClass('scrolled');
            }
        });
        $('#main').on('scroll', function() {
            if ($('#main').scrollTop() > 0) {
                $('body').addClass('scrolled');
            }
            else {
                $('body').removeClass('scrolled');
            }
        });
    }
    if ($(window).width() < 520) {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 0 || $('#main').scrollTop() > 31) {
                $('body').addClass('scrolled');
            }
            else {
                $('body').removeClass('scrolled');
            }
        });
        $('#main').on('scroll', function() {
            if ($('#main').scrollTop() > 0) {
                $('body').addClass('scrolled');
            }
            else {
                $('body').removeClass('scrolled');
            }
        });
    }
});