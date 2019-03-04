<?php
/**
 * Theme options.
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

if ( ! function_exists('acf_add_options_page') ) {
	return;
}

acf_add_options_page( array(
	'page_title' => esc_html__( 'Theme General Options', 'phoenixdigi' ),
	'menu_title' => esc_html__( 'Theme Options', 'phoenixdigi' ),
	'menu_slug'  => 'theme-general-settings',
	'capability' => 'edit_posts',
	'redirect'   => true
) );

/**
 * Options fields
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}
