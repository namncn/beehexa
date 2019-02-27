<?php

namespace Phoenixdigi;

/**
 * Registers navigation areas.
 *
 * @return void
 */
function register_navigation_areas() {
	register_nav_menus([
		'primary' => __( 'Primary', 'phoenixdigi' ),
		'mobile'  => __( 'Mobile', 'phoenixdigi' ),
		'topbar'  => __( 'Topbar', 'phoenixdigi' ),
	]);
}
add_action( 'after_setup_theme', 'Phoenixdigi\register_navigation_areas' );
