<?php

namespace Phoenixdigi;

/**
 * Adds various theme supports.
 *
 * @return void
 */
function add_theme_supports() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'phoenixdigi', apply_filters( 'pdvn_theme_textdomain', get_theme_file_path( '/languages' ), 'phoenixdigi' ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	update_option( 'thumbnail_size_w', 285 ); /* internal max-width of col-3 */
	update_option( 'small_size_w', 350 ); /* internal max-width of col-4 */
	update_option( 'medium_size_w', 730 ); /* internal max-width of col-8 */
	update_option( 'large_size_w', 1110 ); /* internal max-width of col-12 */
	add_image_size( 'custom-thumbnail', 800, 600, true );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Menu Chính', 'phoenixdigi' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 251,
		'height'     => 56,
		'flex-width' => true,
	) );

	// Add support for custom background.
	// add_theme_support( 'custom-background' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'footer-column' => array(
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'footer-column-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'footer-column-3' => array(
				'text_about',
			),

			'footer-column-4' => array(
				'search',
			),
		),
		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'primary' => array(
				'name' => __( 'Menu Chính', 'phoenixdigi' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters PhoenixDigiVietNam array of starter content.
	 *
	 * @since PhoenixDigiVietNam 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'pdvn_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'phoenixdigi' ),
				'shortName' => __( 'S', 'phoenixdigi' ),
				'size'      => 19.5,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'phoenixdigi' ),
				'shortName' => __( 'M', 'phoenixdigi' ),
				'size'      => 22,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'phoenixdigi' ),
				'shortName' => __( 'L', 'phoenixdigi' ),
				'size'      => 36.5,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'phoenixdigi' ),
				'shortName' => __( 'XL', 'phoenixdigi' ),
				'size'      => 49.5,
				'slug'      => 'huge',
			),
		)
	);
}
add_action( 'after_setup_theme', 'Phoenixdigi\add_theme_supports' );
