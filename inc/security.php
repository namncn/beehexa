<?php

namespace Phoenixdigi;

/**
 * [remove_version_scripts_styles description]
 * @param  [type] $src [description]
 * @return [type]      [description]
 */
function remove_version_scripts_styles( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}
add_filter( 'style_loader_src', 'Phoenixdigi\remove_version_scripts_styles', 9999 );
add_filter( 'script_loader_src', 'Phoenixdigi\remove_version_scripts_styles', 9999 );

/**
 * Disable WP emojicons.
 *
 * @param  array $plugins //
 * @return array          //
 */
function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Removes the generator tag with WP version numbers. Hackers will use this to find weak and old WP installs
 *
 * @return string
 */
function no_generator() {
	return '';
}
add_filter( 'the_generator', 'Phoenixdigi\no_generator' );

/*
 * Clean up wp_head() from unused or unsecure stuff
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);

// all actions related to emojis
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

// filter to remove TinyMCE emojis
add_filter( 'tiny_mce_plugins', 'Phoenixdigi\disable_emojicons_tinymce' );
add_filter( 'emoji_svg_url', '\__return_false' );
