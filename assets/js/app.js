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
  $('.search-overlay .btn-close').click(function () {
    $('.search-overlay').removeClass('open');
  });
  $('.nav-search-item').click(function () {
    $('.main-navigation').toggleClass('header-search-form-open');
  });
  $('.hamburger').click(function () {
    $('.main-navigation').toggleClass('active');
  });
  $('.menu-item-has-children').prepend('<i class="fa fa-angle-down"></i>');
})(jQuery);