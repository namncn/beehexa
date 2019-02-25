<?php
/**
 * Require Plugins.
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

namespace Phoenixdigi;

/**
 * Register the required plugins for this theme.
 */
function register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		array(
			'name'     => 'Yoast SEO',
			'slug'     => 'wordpress-seo',
			'required' => false,
		),
		array(
			'name'     => 'Elementor',
			'slug'     => 'elementor',
			'required' => false,
		),
		array(
			'name'     => 'Advanced Custom Fields PRO',
			'slug'     => 'advanced-custom-fields-pro',
			'source'   => 'https://phoenixdigi.vn/plugins/acfp.zip',
			'required' => false,
		),
		array(
			'name'     => 'Duplicate Post',
			'slug'     => 'duplicate-post',
			'required' => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'phoenixdigi',
		'is_automatic' => true,
		'strings'      => array( 'nag_type' => 'notice-warning' ),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'Phoenixdigi\register_required_plugins' );
