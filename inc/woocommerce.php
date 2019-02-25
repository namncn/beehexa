<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

namespace Phoenixdigi\Woocommerce;

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'Phoenixdigi\Woocommerce\woocommerce_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'Phoenixdigi\Woocommerce\woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'Phoenixdigi\Woocommerce\woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'Phoenixdigi\Woocommerce\woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function woocommerce_loop_columns() {
	return 4;
}
add_filter( 'loop_shop_columns', 'Phoenixdigi\Woocommerce\woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'Phoenixdigi\Woocommerce\woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'Phoenixdigi\Woocommerce\woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'Phoenixdigi\Woocommerce\woocommerce_output_content_wrapper_end', 10 );

/**
 * Before Content.
 *
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 *
 * @return void
 */
function woocommerce_wrapper_before() {
	?>
	<div id="primary" class="content-area col-12 col-lg-9">
		<main id="main" class="site-main" role="main">
	<?php
}
add_action( 'woocommerce_before_main_content', 'Phoenixdigi\Woocommerce\woocommerce_wrapper_before' );

/**
 * After Content.
 *
 * Closes the wrapping divs.
 *
 * @return void
 */
function woocommerce_wrapper_after() {
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
add_action( 'woocommerce_after_main_content', 'woocommerce_wrapper_after' );

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'pdvn_posts_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_filter( 'woocommerce_product_description_heading', '__return_false' );

function woocommerce_before_shop_loop() { ?>
	<div class="pdvn_woocommerce_before_shop_loop d-flex">
		<?php woocommerce_result_count(); ?>
		<?php woocommerce_catalog_ordering(); ?>
	</div>
<?php
}
add_action( 'woocommerce_before_shop_loop', 'Phoenixdigi\Woocommerce\woocommerce_before_shop_loop', 20 );
