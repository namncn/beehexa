"use strict";

(function ($) {
  'use strict';

  $(window).scroll(function () {
    if ( $(window).scrollTop() > 100 ) {
      $('#backtotop').fadeIn();
    } else {
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
  	if ( $(window).width() < 992 ) {
	  	$(this).parents('.menu-item-has-children').find('.sub-menu').toggleClass('d-block');
  	}
  });

  $('.search-toggle').click(function(event) {
  	$('.header-search-form').toggleClass('search-opened');
  });

  $('.navbar-toggler').click(function(event) {
  	$('header#mashead').toggleClass('header-expanded');
  });

  if($('#floatingContactButton').length){
		var contactFloatBtn  = $('#floatingContactButton');
		var contactFloatWrap = $('#floatingContactWrap');
		var offset           = contactFloatWrap.offset();
		var top              = offset.top;
		var btnHeight        = contactFloatWrap.height();
		var windowHeight     = $(window).height();
    $(window).scroll(function(){
      var scrolled = $(this).scrollTop();
      if(scrolled + windowHeight - btnHeight - 30 < top) {
        contactFloatBtn.addClass('fixed');
      }
      if(scrolled + windowHeight - btnHeight - 30 > top) {
        contactFloatBtn.removeClass('fixed');
      }
    });
  }
})(jQuery);
