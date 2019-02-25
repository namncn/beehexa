<?php

namespace Phoenixdigi;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Phoenix Digi Viet Nam 2.0.0
 */
function javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'Phoenixdigi\javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'Phoenixdigi\pingback_header' );

/**
 * Update Permalink.
 * @return [type] [description]
 */
function update_permalink() {
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'after_setup_theme', 'Phoenixdigi\update_permalink' );
add_action( 'after_switch_theme', 'Phoenixdigi\update_permalink' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function content_width() {

	$content_width = 1100;

	/**
	 * Filter Phoenix Digi Viet Nam content width of the theme.
	 *
	 * @since Phoenix Digi Viet Nam 2.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'content_width', $content_width );
}
add_action( 'template_redirect', 'Phoenixdigi\content_width', 0 );

/**
 * Include Facebook App ID on footer.
 */
function include_facebook_app_id() {
	if ( ! pdvn_get_option( 'include_fb_sdk_js' ) ) {
		return;
	}
	?>
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId            : '<?php echo pdvn_get_option( 'facebook_app_id' ); ?>',
				autoLogAppEvents : true,
				xfbml            : true,
				version          : 'v2.11'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/<?php echo pdvn_get_option( 'fb_language' ); ?>/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
<?php
}
add_action( 'wp_footer', 'Phoenixdigi\include_facebook_app_id' );

if ( pdvn_get_option( 'header_script' ) && pdvn_get_option( 'header_script_on_off' ) ) {
	/**
	 * Adds script on wp_head.
	 *
	 * @return string //
	 */
	function header_script() {
		echo pdvn_get_option( 'header_script' );
	}
	add_action( 'wp_head', 'Phoenixdigi\header_script' );
}

if ( pdvn_get_option( 'footer_script' ) && pdvn_get_option( 'footer_script_on_off' ) ) {
	/**
	 * Adds script on wp_footer.
	 *
	 * @return string //
	 */
	function footer_script() {
		echo pdvn_get_option( 'footer_script' );
	}
	add_action( 'wp_footer', 'Phoenixdigi\footer_script' );
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Phoenix Digi Viet Nam 2.0.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'Phoenixdigi\widget_tag_cloud_args' );

/**
 * Flush out the transients used in pd-theme_categorized_blog.
 */
function category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'pdvn_categories' );
}
add_action( 'edit_category', 'Phoenixdigi\category_transient_flusher' );
add_action( 'save_post',     'Phoenixdigi\category_transient_flusher' );

/**
 * [post_view_ajax_script description]
 * @return [type] [description]
 */
function post_view_ajax_script() {
	if ( ! is_single() ) {
		return;
	}
	?>
	<script>
	(function($){
		$(document).ready( function() {
			$('.post-view').each( function(i) {
				var $id    = $(this).data('id');
				var $nonce = $(this).data('nonce');
				var t      = this;
				$.get('<?php echo admin_url( 'admin-ajax.php' ); ?>?action=post_view_number&nonce='+$nonce+'&p='+$id, function( html ) {
					$(t).html( '<i class="fa fa-eye"></i> ' + html );
				});
			});
		});
	})(jQuery);
	</script>
	<?php
}
add_action( 'wp_footer', 'Phoenixdigi\post_view_ajax_script', PHP_INT_MAX );

/**
 * Back to top.
 */
function back_to_top() {
	if ( ! pdvn_get_option( 'totop' ) ) {
		return;
	}
	echo '<div id="backtotop" title="' . esc_html__( 'Lên đầu trang', 'phoenixdigi' ) . '"><i class="fa fa-angle-up"></i></div>';
}
add_action( 'wp_footer', 'Phoenixdigi\back_to_top' );

/**
 * [custom_inline_js description]
 * @return [type] [description]
 */
function custom_inline_js() {
	// Print highlight mask if the page is previewed in customize screen.
	if ( is_customize_preview() ) {
		echo '<div id="pdvn_highlight_mask"><a id="pdvn_customize_link" href="#" data-title="' . esc_attr__( 'Cài đặt', 'phoenixdigi' ) . '"></a></div>';
	}
}
add_action( 'wp_footer', 'Phoenixdigi\custom_inline_js' );
