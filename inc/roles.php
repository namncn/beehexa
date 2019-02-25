<?php
/**
 * Roles
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

namespace Phoenixdigi;

/**
 * Adds customer users.
 */
add_role( 'quantrivien', esc_html__( 'Quản trị viên', 'phoenixdigi' ), array(
	'switch_themes'          => 0,
	'edit_themes'            => 0,
	'activate_plugins'       => 1,
	'edit_plugins'           => 0,
	'edit_users'             => 1,
	'edit_files'             => 1,
	'manage_options'         => 1,
	'moderate_comments'      => 1,
	'manage_categories'      => 1,
	'manage_links'           => 1,
	'upload_files'           => 1,
	'import'                 => 1,
	'unfiltered_html'        => 1,
	'edit_posts'             => 1,
	'edit_others_posts'      => 1,
	'edit_published_posts'   => 1,
	'publish_posts'          => 1,
	'edit_pages'             => 1,
	'read'                   => 1,
	'level_10'               => 1,
	'level_9'                => 1,
	'level_8'                => 1,
	'level_7'                => 1,
	'level_6'                => 1,
	'level_5'                => 1,
	'level_4'                => 1,
	'level_3'                => 1,
	'level_2'                => 1,
	'level_1'                => 1,
	'level_0'                => 1,
	'edit_others_pages'      => 1,
	'edit_published_pages'   => 1,
	'publish_pages'          => 1,
	'delete_pages'           => 1,
	'delete_others_pages'    => 1,
	'delete_published_pages' => 1,
	'delete_posts'           => 1,
	'delete_others_posts'    => 1,
	'delete_published_posts' => 1,
	'delete_private_posts'   => 1,
	'edit_private_posts'     => 1,
	'read_private_posts'     => 1,
	'delete_private_pages'   => 1,
	'edit_private_pages'     => 1,
	'read_private_pages'     => 1,
	'delete_users'           => 0,
	'create_users'           => 1,
	'unfiltered_upload'      => 1,
	'edit_dashboard'         => 1,
	'update_plugins'         => 1,
	'delete_plugins'         => 0,
	'install_plugins'        => 0,
	'update_themes'          => 1,
	'install_themes'         => 0,
	'update_core'            => 1,
	'list_users'             => 1,
	'remove_users'           => 1,
	'add_users'              => 1,
	'promote_users'          => 1,
	'edit_theme_options'     => 1,
	'delete_themes'          => 0,
	'export'                 => 1,
	'edit_comment'           => 1,
	'approve_comment'        => 1,
	'unapprove_comment'      => 1,
	'reply_comment'          => 1,
	'quick_edit_comment'     => 1,
	'spam_comment'           => 1,
	'unspam_comment'         => 1,
	'trash_comment'          => 1,
	'untrash_comment'        => 1,
	'delete_comment'         => 1,
	'edit_permalink'         => 1,
) );

/**
 * Get core capabilities
 * @return array core capabilities
 */
function get_core_capabilities() {
	$capabilities = array();

	$capabilities['core'] = array(
		'manage_woocommerce',
		'manage_woocommerce_orders',
		'manage_woocommerce_coupons',
		'manage_woocommerce_products',
		'view_woocommerce_reports',
	);

	$capability_types = array( 'product', 'shop_order', 'shop_coupon', 'shop_webhook' );

	foreach ( $capability_types as $capability_type ) {

		$capabilities[ $capability_type ] = array(
			// Post type
			"edit_{$capability_type}",
			"read_{$capability_type}",
			"delete_{$capability_type}",
			"edit_{$capability_type}s",
			"edit_others_{$capability_type}s",
			"publish_{$capability_type}s",
			"read_private_{$capability_type}s",
			"delete_{$capability_type}s",
			"delete_private_{$capability_type}s",
			"delete_published_{$capability_type}s",
			"delete_others_{$capability_type}s",
			"edit_private_{$capability_type}s",
			"edit_published_{$capability_type}s",

			// Terms
			"manage_{$capability_type}_terms",
			"edit_{$capability_type}_terms",
			"delete_{$capability_type}_terms",
			"assign_{$capability_type}_terms",
		);
	}

	return $capabilities;
}

/**
 * Add role capabilities
 */
function add_role_caps() {

	$capabilities = get_core_capabilities();

	$role = get_role( 'quantrivien' );

	foreach ( $capabilities as $cap_group ) {
		foreach ( $cap_group as $cap ) {
			$role->add_cap( $cap );
		}
	}

}
add_action( 'admin_init', 'Phoenixdigi\add_role_caps');
