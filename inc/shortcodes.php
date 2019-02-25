<?php

namespace Phoenixdigi;

/**
 * Renders a [button] shortcode.

 * @param  array $atts
 * @param  string $content
 * @return string
 */
function render_button_shortcode( $atts, $content ) {
	$attributes = shortcode_atts([
		'href' => '#'
	], $atts);

	ob_start();

	template( 'shortcodes/button', compact( 'attributes', 'content' ) );

	return ob_get_clean();
}
// add_shortcode( 'button', 'Phoenixdigi\render_button_shortcode' );
