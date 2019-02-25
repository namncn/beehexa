<?php
/**
 * PD Theme back compat functionality
 *
 * Prevents PD Theme from running on WordPress versions prior to 4.9.3,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.9.3.
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

namespace Phoenixdigi;

/**
 * Prevent switching to PD Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since PD Theme 1.0
 */
function switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'Phoenixdigi\upgrade_notice' );
}
add_action( 'after_switch_theme', 'Phoenixdigi\switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * PD Theme on WordPress versions prior to 4.9.3.
 *
 * @since PD Theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function upgrade_notice() {
	$message = sprintf( __( 'PD Theme requires at least WordPress version 4.9.3. You are running version %s. Please upgrade and try again.', 'pd-theme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.9.3.
 *
 * @since PD Theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function customize() {
	wp_die( sprintf( __( 'PD Theme requires at least WordPress version 4.9.3. You are running version %s. Please upgrade and try again.', 'pd-theme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'Phoenixdigi\customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.9.3.
 *
 * @since PD Theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'PD Theme requires at least WordPress version 4.9.3. You are running version %s. Please upgrade and try again.', 'pd-theme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'Phoenixdigi\preview' );

/**
 * And only works with PHP 5.6 or later.
 */
if ( version_compare( phpversion(), '5.6', '<' ) ) :
	/**
	 * Prevent switching to PD Theme on old versions of WordPress.
	 *
	 * Switches to the default theme.
	 */
	function phpcompat_switch_theme() {
		switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

		unset( $_GET['activated'] );

		add_action( 'admin_notices', 'Phoenixdigi\phpcompat_upgrade_notice' );
	}
	add_action( 'after_switch_theme', 'Phoenixdigi\phpcompat_switch_theme' );

	/**
	 * Adds a message for outdate PHP version.
	 */
	function phpcompat_upgrade_notice() {
		$message = sprintf( esc_html__( 'PD Theme requires at least PHP version 5.6. You are running version %s.', 'pd-theme' ), phpversion() );
		printf( '<div class="error"><p>%s</p></div>', $message ); // WPCS: XSS OK.
	}
endif;
