!function(n){var o={};function r(e){if(o[e])return o[e].exports;var t=o[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,r),t.l=!0,t.exports}r.m=n,r.c=o,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)r.d(n,o,function(e){return t[e]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=0)}([function(e,t,n){"use strict";n.r(t),n(1),n(2),jQuery(function(n){n(window).on("scroll load resize",function(){100<n(window).scrollTop()?n("body").addClass("scrolled"):n("body").removeClass("scrolled")}),n(".navbar__hamburger").on("click",function(){n("body").toggleClass("nav-open"),n("html").toggleClass("not-scrollable")}),n(".mobile-menu .mobile-menu__wrapper .menu-item-has-children").append('<span class="menu-dropdown"></span>');for(var e=document.getElementsByClassName("mobile-menu")[0].getElementsByClassName("menu-item-has-children"),t=function(){r=e[o];var t=!1;a=n(r).find(".menu-dropdown"),n(a).on("click",function(){var e=n(this).parent().find(".sub-menu").outerHeight();t=t?(n(this).parent().css("margin-bottom",9),!1):(n(this).parent().css("margin-bottom",e),!0),n(this).parent().toggleClass("active")})},o=0;o<e.length;o++){var r,a;t()}var i,l,s=document.querySelectorAll(".carousel-container");for(o=0;o<s.length;o++)i=s[o],l=void 0,(l=new Flickity(i,{autoPlay:4e3,draggable:">1",friction:.3,prevNextButtons:!1,resize:!0})).cells.length<=1&&l.destroy();if(0<n(".faq").length){var c=function(){n(".faq__accordion .faq__title a").removeClass("open"),n(".faq__accordion .faq__content").slideUp(300).removeClass("active"),n(".faq__accordion").removeClass("active")};n(".faq__title a").click(function(e){var t=n(this).attr("href");n(e.target).is(".open")?c():(c(),n(this).addClass("open"),n(this).parents(".faq__accordion").addClass("active"),n(this).addClass("open"),n(".faq__accordion "+t).slideDown(300).addClass("active")),e.preventDefault()})}document.querySelectorAll(".slider-list").forEach(function(e){var t=e.querySelectorAll("li"),n=t.length-1,o=t[0],r=1;setInterval(function(){o.classList.remove("active"),t[r].classList.add("active"),o=t[r],r=r==n?0:r+1},4e3)}),n(".woocommerce-variation.single_variation").appendTo(".wapf-wrapper")})},function(e,t){jQuery(function(e){if("objectFit"in document.documentElement.style==0){var t=document.getElementsByClassName("img");console.log(t);for(var n=0;n<t.length;n++){var o=t[n].querySelector("img").src;t[n].querySelector("img").style.display="none",t[n].style.backgroundSize="cover",t[n].style.backgroundImage="url("+o+")",t[n].style.backgroundPosition="center center"}}/MSIE 10/i.test(navigator.userAgent)&&e("figure.img img").remove(),(/MSIE 9/i.test(navigator.userAgent)||/rv:11.0/i.test(navigator.userAgent))&&e("figure.img img").remove()})},function(e,t){jQuery(function(e){var t=document.querySelector(".notifications__succes");e("body").on("added_to_cart",function(){t.classList.add("show"),setTimeout(function(){t.classList.remove("show")},4500)});var n=document.querySelector("#add-variant");if(n){var o=n.querySelector("select"),r=n.querySelector("a");o.addEventListener("change",function(){r.dataset.product_id=o.value})}})}]);