<?php

namespace Phoenixdigi;

/**
 * Registers the widget areas.
 *
 * @return void
 */
function register_widget_areas() {
	register_sidebar( array(
		'name'          => esc_html__( 'Thanh đầu trang', 'phoenixdigi' ),
		'id'            => 'topbar',
		'description'   => esc_html__( 'Thêm tiện ích vào đây để hiển thị nội dung đầu trang.', 'phoenixdigi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Cột bên', 'phoenixdigi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Thêm tiện ích vào đây để hiển thị cột bên cạnh nội dung.', 'phoenixdigi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Chân trang cột %s', 'phoenixdigi' ),
		'id'            => 'footer-column',
		'description'   => esc_html__( 'Thêm tiện ích vào đây để hiển thị các cột chân trang.', 'phoenixdigi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'Phoenixdigi\register_widget_areas' );
