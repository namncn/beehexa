(function($){
"use strict";

		var WidgetLogoPeelHandler = function ($scope, $) {

			var logopeel = $scope.find('.logo-peel-cards-section').eq(0);
			var card     = logopeel.find('.card');

			if (logopeel.length > 0) {

				card.each(function(index, el) {
					var t = $(this);

					t.mouseenter(function(event) {
						t.removeClass('revealed');
					});

					t.mouseleave(function(event) {
						t.addClass('revealed');
					});
				});
			}
		}

		var WidgetImageTextHandler = function ($scope, $) {

			var imagetext = $scope.find('.image-text-section').eq(0);
			var imagewrap = imagetext.find('.image-wrap');

			if (imagetext.length > 0) {

				$(window).scroll(function () {
					if ( imagewrap.length > 0 ) {
						var imagewrap_height = imagewrap.offset().top;
						var height = imagewrap_height - ( $(window).height() / 2 );

						if ($(window).scrollTop() > height) {
							imagewrap.addClass('inview');
						}
					}
				});
			}
		}

		var WidgetClientsHandler = function ($scope, $) {

			var clients = $scope.find('.clients-showcase-section').eq(0);
			var logowrap = clients.find('.logo-wrap');

			if (clients.length > 0) {

				$(window).scroll(function () {
					if ( logowrap.length > 0 ) {
						var logowrap_height = logowrap.offset().top;
						var height = logowrap_height - ( $(window).height() / 2 );

						if ($(window).scrollTop() > height) {
							logowrap.addClass('inview');
						}
					}
				});
			}
		}

		// Run this code under Elementor.
		$(window).on('elementor/frontend/init', function () {
				elementorFrontend.hooks.addAction( 'frontend/element_ready/phoenixdigi-logo-peel.default', WidgetLogoPeelHandler);
				elementorFrontend.hooks.addAction( 'frontend/element_ready/phoenixdigi-image-text.default', WidgetImageTextHandler);
				elementorFrontend.hooks.addAction( 'frontend/element_ready/phoenixdigi-clients.default', WidgetClientsHandler);
		});

})(jQuery);
