<?php

namespace Phoenixdigi;

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function my_taxonomies_name() {

	$labels = array(
		'name'                  => _x( 'Plural Name', 'Taxonomy plural name', 'text-domain' ),
		'singular_name'         => _x( 'Singular Name', 'Taxonomy singular name', 'text-domain' ),
		'search_items'          => __( 'Search Plural Name', 'text-domain' ),
		'popular_items'         => __( 'Popular Plural Name', 'text-domain' ),
		'all_items'             => __( 'All Plural Name', 'text-domain' ),
		'parent_item'           => __( 'Parent Singular Name', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Singular Name', 'text-domain' ),
		'edit_item'             => __( 'Edit Singular Name', 'text-domain' ),
		'update_item'           => __( 'Update Singular Name', 'text-domain' ),
		'add_new_item'          => __( 'Add New Singular Name', 'text-domain' ),
		'new_item_name'         => __( 'New Singular Name Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Plural Name', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Plural Name', 'text-domain' ),
		'menu_name'             => __( 'Singular Name', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'taxonomy-slug', array( 'post' ), $args );
}

// add_action( 'init', 'Phoenixdigi\my_taxonomies_name' );
