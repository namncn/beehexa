<?php

namespace Phoenixdigi;

/**
 * Registers theme stylesheet files.
 *
 * @return void
 */
function register_stylesheets() {
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( 'assets/css/font-awesome.min.css' ) );
	wp_enqueue_style( 'pdvn-style', get_theme_file_uri( 'assets/css/app.min.css' ) );
}
add_action( 'wp_enqueue_scripts', 'Phoenixdigi\register_stylesheets' );

/**
 * Registers theme script files.
 *
 * @return void
 */
function register_scripts() {
	wp_enqueue_script( 'pdvn-script', get_theme_file_uri( 'assets/js/app.js' ), array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.min.js' ), array( 'jquery' ), '4.1.3', true );
}
add_action( 'wp_enqueue_scripts', 'Phoenixdigi\register_scripts' );

/**
 * Moves front-end jQuery script to the footer.
 *
 * @param  \WP_Scripts $wp_scripts
 * @return void
 */
function move_jquery_to_the_footer( $wp_scripts ) {
	if ( ! is_admin() ) {
		$wp_scripts->add_data( 'jquery', 'group', 1 );
		$wp_scripts->add_data( 'jquery-core', 'group', 1 );
		$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
	}
}
add_action( 'wp_default_scripts', 'Phoenixdigi\move_jquery_to_the_footer' );
