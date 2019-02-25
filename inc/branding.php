<?php

namespace Phoenixdigi;

/**
 * Customize WordPress for Phoenix Digi Viet Nam Company.
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

/**
 * Set login logo url
 * @return string https://phoenixdigi.vn.
 */
function login_logo_url() {
	return 'https://phoenixdigi.vn';
}
add_filter( 'login_headerurl', 'Phoenixdigi\login_logo_url' );

/**
 * Set login logo url title
 * @return [type] [description]
 */
function login_logo_url_title() {
	return esc_html__( 'CÔNG TY TNHH CÔNG NGHỆ VÀ TRUYỀN THÔNG PHOENIXDIGI VIỆT NAM - PHOENIXDIGI.VN', 'phoenixdigi' );
}
add_filter( 'login_headertitle', 'Phoenixdigi\login_logo_url_title' );

/**
 * Set login logo
 */
function login_logo() { ?>
	<style type="text/css">
		body {
			color: #eb4a3a !important;
			background: url(<?php echo get_theme_file_uri( 'assets/images/login-bg.jpg' ); ?>) center center !important;
			background-color: rgba(0,0,0,.9) !important;
			background-blend-mode: overlay;
		}
		a {
			color: #f9a931 !important;
		}
		a:focus {
			color: #f9a931;
			-webkit-box-shadow: 0 0 0 1px #f9a931, 0 0 2px 1px #f9a931 !important;
			box-shadow: 0 0 0 1px #f9a931, 0 0 2px 1px #f9a931 !important;
		}
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_theme_file_uri( 'assets/images/login-logo.png' ); ?>);
			height: 200px;
			width: 200px;
			background-size: 200px 200px;
		}
		.login #backtoblog a, .login #nav a {
			color: #fdc70c !important;
		}
		.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
			color: #fed013 !important;
		}
		.wp-core-ui .button-primary {
			background: #fdc70c !important;
			border-color: #fdc70c !important;
			-webkit-box-shadow: 0 1px 0 #fdc70c !important;
			box-shadow: 0 1px 0 #fdc70c !important;
			text-shadow: none !important;
			border-radius: 0 !important;
		}
		input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
			border-color: #fdc70c !important;
			-webkit-box-shadow: 0 0 2px rgb(253, 199, 12) !important;
			box-shadow: 0 0 2px rgb(253, 199, 12) !important;
		}
		input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
			border-color: #fdc70c !important;
			-webkit-box-shadow: 0 0 2px rgb(253, 199, 12) !important;
			box-shadow: 0 0 2px rgb(253, 199, 12) !important;
		}
		input[type=checkbox]:checked:before {
			content: "\f147" !important;
			margin: -3px 0 0 -4px !important;
			color: #fdc70c !important;
		}
		#login {
			padding: 6% 0 0 !important;
		}Pgi
		@media screen and (max-height: 550px) {
			#login {
				padding: 20px 0 !important;
			}
		}
		@media (max-width: 413px) {
			#login h1 a, .login h1 a {
				height: 100px;
				width: 100px;
				background-size: 100px 100px;
			}
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'Phoenixdigi\login_logo' );

/**
* Disable Default Dashboard Widgets
* @link https://digwp.com/2014/02/disable-default-dashboard-widgets/
*/
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
}
add_action('wp_dashboard_setup', 'Phoenixdigi\disable_default_dashboard_widgets', 999);

// Remove Wordpress Welcome Panel
remove_action('welcome_panel', 'Phoenixdigi\wp_welcome_panel');

/**
 * Remove Wordpress Version
 * @return null
 */
function remove_version() {
	return;
}
add_filter('the_generator', 'Phoenixdigi\remove_version');

/**
 * Remove Footer Wordpress Version
 * @return [type] [description]
 */
function footer_wp_version() {
	remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'Phoenixdigi\footer_wp_version' );

/**
 * Filter Admin Wordpress Footer
 * @return string Description Admin Wordpress Footer
 */
function remove_footer_admin() {
	_e( 'Cảm ơn bạn đã sử dụng dịch vụ của <a href="https://phoenixdigi.vn">Phoenix Digi Việt Nam</a>.', 'phoenixdigi' );
}
add_filter( 'admin_footer_text', 'Phoenixdigi\remove_footer_admin' );
