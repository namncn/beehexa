<?php

namespace Phoenixdigi;

/**
 * My AJAX action callback.
 *
 * @return void
 */
function action_callback() {
	// Validate nonce token.
	check_ajax_referer( 'my_action_nonce', 'nonce' );

	// Action logic...

	die();
}
// add_action( 'wp_ajax_my_action', 'Phoenixdigi\action_callback' );
// add_action( 'wp_ajax_nopriv_my_action', 'Phoenixdigi\action_callback' );

/**
 * [post_view_callback description]
 * @return [type] [description]
 */
function post_view_callback() {
	if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'pdvn_count_post' ) ) {
		exit();
	}

	$count = 0;

	if ( isset( $_GET['p'] ) ) {
		$post_id = intval( $_GET['p'] );
		$post    = get_post( $post_id );

		if ( $post && ! empty( $post ) && ! is_wp_error( $post ) ) {
			pdvn_post_view_set( $post->ID );
			$count_key = 'post_view_number';
			$count     = get_post_meta( $post_id, $count_key, true );
		}
	}

	die( $count );
}
add_action( 'wp_ajax_post_view_number', 'Phoenixdigi\post_view_callback' );
add_action( 'wp_ajax_nopriv_post_view_number', 'Phoenixdigi\post_view_callback' );
