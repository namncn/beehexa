<?php
/**
 * Phoenix Digi Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

/**
 * Phoenix Digi Viet Nam only works in WordPress 4.9.3 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.9.3', '<' ) ) {
	require get_theme_file_path( '/inc/setup/back-compat.php' );
	return;
}

/**
 * Get default option for Phoenix Digi Viet Nam.
 *
 * @param  string $name Option key name to get.
 * @return mixin
 */
function pdvn_get_option_default( $name ) {
	$defaults = array(
		'include_fb_sdk_js'    => false,
		'fb_language'          => 'vi_VN',
		'facebook_app_id'      => '1491529591098383',
		'header_script'        => '',
		'header_script_on_off' => true,
		'footer_script'        => '',
		'footer_script_on_off' => true,
		'totop'                => true,
		'copyright'            => 'Copyright © ' . date( 'Y' ) . ' - Bản quyền thuộc về <a target="_blank" href="https://phoenixdigi.vn/" title="Thiết kế Website">Phoenixdigi.vn</a>.',
	);

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}

/**
 * Phoenix Digi Viet Nam Option.
 *
 * Get all options to setting for our theme.
 *
 * @param string    $name      option name.
 * @param string    $default     option default.
 */
function pdvn_get_option( $name, $default = null ) {
	$name = sanitize_key( $name );

	if ( is_null( $default ) ) {
		$default = pdvn_get_option_default( $name );
	}

	$option = get_theme_mod( $name, $default );

	return $option;
}

/**
 * Get theme options.
 * @return [type] [description]
 */
function pdvn_get_acf_option( $selector, $post_id = false, $format_value = true ) {
	if ( ! class_exists( 'ACF' ) ) {
		return false;
	}

	return apply_filters( 'pdvn_get_acf_option', get_field( $selector, $post_id, $format_value ) );
}

require_once get_theme_file_path( '/inc/assets.php' );
require_once get_theme_file_path( '/inc/ajaxes.php' );
require_once get_theme_file_path( '/inc/template-functions.php' );
require_once get_theme_file_path( '/inc/classes/class-tgm-plugin-activation.php' );
require_once get_theme_file_path( '/inc/classes/class-phoenixdigi-widget.php' );
require_once get_theme_file_path( '/inc/customizer.php' );
require_once get_theme_file_path( '/inc/actions.php' );
require_once get_theme_file_path( '/inc/filters.php' );
require_once get_theme_file_path( '/inc/branding.php' );
require_once get_theme_file_path( '/inc/security.php' );
require_once get_theme_file_path( '/inc/roles.php' );
require_once get_theme_file_path( '/inc/supports.php' );
require_once get_theme_file_path( '/inc/require-plugin.php' );
require_once get_theme_file_path( '/inc/metabox.php' );
require_once get_theme_file_path( '/inc/posttypes.php' );
require_once get_theme_file_path( '/inc/taxonomies.php' );
require_once get_theme_file_path( '/inc/navs.php' );
require_once get_theme_file_path( '/inc/shortcodes.php' );
require_once get_theme_file_path( '/inc/sidebars.php' );
require_once get_theme_file_path( '/inc/widgets.php' );
require_once get_theme_file_path( '/inc/woocommerce.php' );
