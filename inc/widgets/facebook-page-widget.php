<?php

namespace Phoenixdigi\App\Widgets;

use \Phoenixdigi\App\Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Facebook Page Widget.
 *
 * Showing facebook page.
 *
 * @link https://github.com/namncn/ncn-fbpage-widget
 *
 * @author   NamNCN
 * @category Widgets
 * @package  PDCORE/Widgets
 * @version  1.0.0
 * @extends  PDFW\Widget
 */
class Facebook_Page extends Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'facebook_page';
		$this->widget_description = esc_html__( 'Hiển thị Trang Facebook.', 'phoenixdigi' );
		$this->widget_id          = 'facebook_page';
		$this->widget_name        = esc_html__( 'PDVN: Facebook Page', 'phoenixdigi' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tiêu đề', 'phoenixdigi' ),
				'std'   => esc_html__( 'Facebook', 'phoenixdigi' ),
			),
			'data_href'  => array(
				'type'   => 'text',
				'label'  => esc_html__( 'Đường dẫn đến facebook page của bạn', 'phoenixdigi' ),
				'std'    => 'http://facebook.com/FacebookVietnam',
			),
			'data_width' => array(
				'type'   => 'number',
				'min'    => 180,
				'max'    => 500,
				'std'    => 500,
				'step'   => 1,
				'label'  => esc_html__( 'Chiều rộng:', 'phoenixdigi' ),
				'desc'   => esc_html__( 'Chiều rộng pixel của widget. Tối thiểu là 180 và tối đa là 500. Có thể bỏ qua vì bạn có thể dùng chức năng hiển thị rộng bằng khung chưa phía dưới.', 'phoenixdigi' ),
			),
			'data_height' => array(
				'type'    => 'number',
				'min'     => 70,
				'max'     => 1000,
				'std'     => 300,
				'step'    => 1,
				'label'   => esc_html__( 'Chiều cao:', 'phoenixdigi' ),
				'desc'    => esc_html__( 'Chiều cao pixel của widget. Tối thiểu là 70.', 'phoenixdigi' ),
			),
			'data_tabs'  => array(
				'type'  => 'text',
				'std'   => 'timeline, events, messages',
				'label' => esc_html__( 'Tab hiển thị:', 'phoenixdigi' ),
				'desc'  => esc_html__( 'Các tab sẽ hiển thị, ví dụ : timeline, events, messages. Sử dụng danh sách được phân tách bằng dấu phẩy để thêm nhiều tab, ví dụ : timeline, events.', 'phoenixdigi' ),
			),
			'data_small_header' => array(
				'type'          => 'checkbox',
				'std'           => 0,
				'label'         => esc_html__( 'Hiển thị ảnh bìa nhỏ', 'phoenixdigi' ),
			),
			'data_hide_cover'   => array(
				'type'          => 'checkbox',
				'std'           => 0,
				'label'         => esc_html__( 'Ẩn ảnh bìa', 'phoenixdigi' ),
			),
			'data_container_width'   => array(
				'type'               => 'checkbox',
				'std'                => 1,
				'label'              => esc_html__( 'Hiển thị rộng bằng khung chứa', 'phoenixdigi' ),
			),
			'data_show_facepile'     => array(
				'type'               => 'checkbox',
				'std'                => 1,
				'label'              => esc_html__( 'Hiển thị ảnh đại diện bạn bè', 'phoenixdigi' ),
			),
			'data_hide_cta'          => array(
				'type'               => 'checkbox',
				'std'                => 0,
				'label'              => esc_html__( 'Ẩn nút kêu gọi hành động (nếu có)', 'phoenixdigi' ),
			),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		// extract( $instance ); Don't extract variable $args, $instance cuz its not work when selective refresh.
		$defaults = array(
			'data_href'            => 'http://facebook.com/FacebookVietnam',
			'data_width'           => 500,
			'data_height'          => 300,
			'data_tabs'            => 'timeline, events, messages',
			'data_small_header'    => 0,
			'data_hide_cover'      => 0,
			'data_container_width' => 1,
			'data_show_facepile'   => 1,
			'data_hide_cta'        => 0,
		);

		$instance = wp_parse_args( $instance, $defaults );

		if ( true == $instance['data_small_header'] ) {
			$data_small_header = 'true';
		} else {
			$data_small_header = 'false';
		}

		if ( true == $instance['data_hide_cover'] ) {
			$data_hide_cover = 'true';
		} else {
			$data_hide_cover = 'false';
		}

		if ( true == $instance['data_show_facepile'] ) {
			$data_show_facepile = 'true';
		} else {
			$data_show_facepile = 'false';
		}

		if ( true == $instance['data_container_width'] ) {
			$data_container_width = 'true';
			$instance['data_width'] = '';
		} else {
			$data_container_width = 'false';
		}

		if ( true == $instance['data_hide_cta'] ) {
			$data_hide_cta = 'true';
		} else {
			$data_hide_cta = 'false';
		}

		$this->widget_start( $args, $instance );

		if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

		<div class="fb-page" data-href="<?php echo esc_url( $instance['data_href'] ); ?>" data-tabs="<?php echo esc_attr( $instance['data_tabs'] ); ?>" data-small-header="<?php echo esc_attr( $data_small_header ); ?>" data-adapt-container-width="<?php echo esc_attr( $data_container_width ); ?>" data-hide-cover="<?php echo esc_attr( $data_hide_cover ); ?>" data-show-facepile="<?php echo esc_attr( $data_show_facepile ); ?>" data-hide-cta="<?php echo esc_attr( $data_hide_cta ); ?>" data-width="<?php echo esc_attr( $instance['data_width'] ); ?>" data-height="<?php echo esc_attr( $instance['data_height'] ); ?>">
		</div>

		<?php
		$this->widget_end( $args );
	}
}
