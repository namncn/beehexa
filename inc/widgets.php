<?php

namespace Phoenixdigi;

require_once get_theme_file_path( '/inc/widgets/facebook-page-widget.php' );

/**
 * Registers custom widgets.
 *
 * @return void
 */
function register_widgets() {
	register_widget( 'Phoenixdigi\App\Widgets\Facebook_Page' );
}
add_action( 'widgets_init', 'Phoenixdigi\register_widgets' );
