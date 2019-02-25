<?php
/**
 * PDVN Theme Customizer.
 *
 * @package Phoenix_Digi
 * @subpackage Phoenix_Digi
 * @since 2.0.0
 * @version 2.0.0
 */

namespace Phoenixdigi;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'static_front_page' )->title    = esc_html__( 'Trang chủ', 'phoenixdigi' );
	$wp_customize->get_section( 'title_tagline' )->title        = esc_html__( 'Nhận dạng thương hiệu', 'phoenixdigi' );
	$wp_customize->get_section( 'title_tagline' )->panel        = 'header';
	$wp_customize->get_section( 'title_tagline' )->priority     = 10;

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'Phoenixdigi\customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'Phoenixdigi\customize_partial_blogdescription',
		) );
	}

	register_header( $wp_customize );
	register_footer( $wp_customize );
	register_facebook( $wp_customize );
}
add_action( 'customize_register', 'Phoenixdigi\customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 * @see Phoenixdigi\customize_register()
 *
 * @return void
 */
function customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 * @see Phoenixdigi\customize_register()
 *
 * @return void
 */
function customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Register Header setting for the Theme Customizer
 *
 * @param  $wp_customize Theme Customizer object.
 */
function register_header( $wp_customize ) {
	$wp_customize->add_panel( 'header', array(
		'title'    => esc_html__( 'Đầu trang', 'phoenixdigi' ),
		'priority' => 10,
	) );

	$wp_customize->add_section( 'header_template', array(
		'title'    => esc_html__( 'Mẫu giao diện', 'phoenixdigi' ),
		'panel'    => 'header',
	) );

	$wp_customize->add_setting( 'header_template' , array(
		'default'           => 0,
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$library_ids = get_posts( array(
		'post_type'      => 'elementor_library',
		'fields'         => 'ids',
		// 'meta_key'       => 'elementor_library_type',
		// 'meta_value'     => 'header',
		'posts_per_page' => -1
	));

	$templates = array(
		'0' => esc_html__( 'Không chọn', 'phoenixdigi' ),
	);

	if ( $library_ids ) {
		foreach ( $library_ids as $id ) {
			$templates[ $id ] = get_the_title( $id );
		}
	}

	$wp_customize->add_control( 'header_template', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Mẫu giao diện', 'phoenixdigi' ),
		'description' => esc_html__( 'Chọn mẫu giao diện cho Header.', 'phoenixdigi' ),
		'choices'     => $templates,
		'section'     => 'header_template',
	) );

	$wp_customize->add_section( 'header_script', array(
		'title'    => esc_html__( 'Nhúng mã Script', 'phoenixdigi' ),
		'panel'    => 'header',
	) );

	// Header script.
	$wp_customize->add_setting( 'header_script' , array(
		'default'           => pdvn_get_option_default( 'banner_right' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'header_script', array(
		'type'        => 'textarea',
		'label'       => esc_html__( 'Header script', 'phoenixdigi' ),
		'description' => esc_html__( 'Nhúng mã Script xuống sau thẻ <head> ví dụ mã Google Analytics.', 'phoenixdigi' ),
		'section'     => 'header_script',
	) );

	// Allow print header script.
	$wp_customize->add_setting( 'header_script_on_off' , array(
		'default'           => pdvn_get_option_default( 'header_script_on_off' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'header_script_on_off', array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Cho phép nhúng Header script', 'phoenixdigi' ),
		'section'     => 'header_script',
	) );
}

/**
 * Register site Footer setting for the Theme Customizer
 *
 * @param  $wp_customize Theme Customizer object.
 */
function register_footer( $wp_customize ) {
	$wp_customize->add_panel( 'footer', array(
		'title'    => esc_html__( 'Chân trang', 'phoenixdigi' ),
		'priority' => 500,
	) );

	$wp_customize->add_section( 'footer_template', array(
		'title'    => esc_html__( 'Mẫu giao diện', 'phoenixdigi' ),
		'panel'    => 'footer',
	) );

	$wp_customize->add_setting( 'footer_template' , array(
		'default'           => 0,
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$library_ids = get_posts( array(
		'post_type'      => 'elementor_library',
		'fields'         => 'ids',
		// 'meta_key'       => 'elementor_library_type',
		// 'meta_value'     => 'header',
		'posts_per_page' => -1
	));

	$templates = array(
		'0' => esc_html__( 'Không chọn', 'phoenixdigi' ),
	);

	if ( $library_ids ) {
		foreach ( $library_ids as $id ) {
			$templates[ $id ] = get_the_title( $id );
		}
	}

	$wp_customize->add_control( 'footer_template', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Mẫu giao diện', 'phoenixdigi' ),
		'description' => esc_html__( 'Chọn mẫu giao diện cho Footer.', 'phoenixdigi' ),
		'choices'     => $templates,
		'section'     => 'footer_template',
	) );

	$wp_customize->add_section( 'totop', array(
		'title'    => esc_html__( 'Lên đầu trang', 'phoenixdigi' ),
		'panel'    => 'footer',
	) );

	// Site Footer settings.
	$wp_customize->add_setting( 'totop' , array(
		'default'           => pdvn_get_option_default( 'totop' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'totop', array(
		'type'      => 'checkbox',
		'section'   => 'totop',
		'label'     => esc_html__( 'Bật/Tắt nút lên đầu trang?', 'phoenixdigi' ),
	) );

	$wp_customize->add_section( 'copyright', array(
		'title'    => esc_html__( 'Copyright', 'phoenixdigi' ),
		'panel'    => 'footer',
	) );

	// Footer copyright setting.
	$wp_customize->add_setting( 'copyright', array(
		'default'           => pdvn_get_option_default( 'copyright' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'copyright', array(
		'type'        => 'textarea',
		'section'     => 'copyright',
		'label'       => esc_html__( 'Copyright', 'phoenixdigi' ),
		'description' => esc_html__( 'Nội dung cuối cùng của trang web.', 'phoenixdigi' ),
	) );

	$wp_customize->add_section( 'footer_script', array(
		'title'    => esc_html__( 'Nhúng mã Script', 'phoenixdigi' ),
		'panel'    => 'footer',
	) );

	// Footer script.
	$wp_customize->add_setting( 'footer_script' , array(
		'default'           => pdvn_get_option_default( 'banner_right' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'footer_script', array(
		'type'        => 'textarea',
		'label'       => esc_html__( 'Footer script', 'phoenixdigi' ),
		'description' => esc_html__( 'Nhúng mã Script xuống trước thẻ </body> ví dụ mã Google Analytics.', 'phoenixdigi' ),
		'section'     => 'footer_script',
	) );

	// Allow print Footer script.
	$wp_customize->add_setting( 'footer_script_on_off' , array(
		'default'           => pdvn_get_option_default( 'footer_script_on_off' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'footer_script_on_off', array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Cho phép nhúng Footer script', 'phoenixdigi' ),
		'section'     => 'footer_script',
	) );
}

/**
 * Register Facebook setting for the Theme Customizer
 *
 * @param  $wp_customize Theme Customizer object.
 */
function register_facebook( $wp_customize ) {
	// Facebook section
	$wp_customize->add_section( 'facebook', array(
		'title'    => esc_html__( 'Facebook', 'phoenixdigi' ),
		'priority' => 600,
	) );

	// Facebook SDK JS.
	$wp_customize->add_setting( 'include_fb_sdk_js' , array(
		'default'           => pdvn_get_option_default( 'include_fb_sdk_js' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'include_fb_sdk_js', array(
		'type'      => 'checkbox',
		'section'   => 'facebook',
		'label'     => esc_html__( 'Nhúng Facebook SDK Js?', 'phoenixdigi' ),
	) );

	// Facebook App ID.
	$wp_customize->add_setting( 'facebook_app_id' , array(
		'default'           => pdvn_get_option_default( 'facebook_app_id' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'facebook_app_id', array(
		'type'      => 'text',
		'section'   => 'facebook',
		'label'     => esc_html__( 'Facebook App ID', 'phoenixdigi' ),
	) );

	// Facebook Language.
	$wp_customize->add_setting( 'fb_language', array(
		'default'           => pdvn_get_option_default( 'fb_language' ),
		'sanitize_callback' => 'Phoenixdigi\sanitize_value',
	) );

	$wp_customize->add_control( 'fb_language', array(
		'type'    => 'select',
		'section' => 'facebook',
		'label'   => esc_html__( 'Sử dụng ngôn ngữ Facebook', 'phoenixdigi' ),
		'choices' => array(
			'vi_VN'  => esc_html__( 'Tiếng Việt', 'phoenixdigi' ),
			'en_US'  => esc_html__( 'English', 'phoenixdigi' ),
		),
	) );
}

/**
 * Sanitize raw value.
 *
 * @param  mixed $value Raw string value.
 * @return string
 */
function sanitize_value( $value ) {
	return $value;
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function customize_preview_js() {
	wp_enqueue_script( 'pdvn-customize-actions', get_template_directory_uri() . '/assets/js/admin/actions.js', array( 'jquery' ), '1.0', true );
}
add_action( 'customize_preview_init', 'Phoenixdigi\customize_preview_js' );
