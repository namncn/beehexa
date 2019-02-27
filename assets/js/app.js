"use strict";

(function ($) {
  'use strict';

  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      // $('.site-header').addClass('header-fixed')
      $('#backtotop').fadeIn();
    } else {
      // $('.site-header').removeClass('header-fixed')
      $('#backtotop').fadeOut();
    }
  });
  $('#backtotop').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  $('.menu-item-has-children > a').append('<span class="drop-arrow"></span>');

  $('.menu-item-has-children > a').click(function(event) {
  	event.preventDefault();
  	$(this).parents('.menu-item-has-children').find('.sub-menu').toggleClass('d-block');
  });

  $('.search-toggle').click(function(event) {
  	$('.header-search-form').toggleClass('search-opened');
  });

  $('.navbar-toggler').click(function(event) {
  	$('header#mashead').toggleClass('header-expanded');
  });
})(jQuery);
