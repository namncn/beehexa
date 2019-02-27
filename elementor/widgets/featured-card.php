<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Featured_Card Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Featured_Card extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Featured_Card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-featured-card';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Featured_Card widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Featured Card', 'phoenixdigi' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-align-left';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Slider Hero widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'phoenixdigi' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_editor',
			[
				'label' => __( 'Text Editor', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'editor',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'phoenixdigi' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$image  = $settings['image'];
		$editor = $settings['editor'];
		?>
		<div class="featured-card-section">
			<div class="container">
				<div class="card-wrap flex-container">
					<div class="card">
						<div class="image-wrap" style="background-image: url('<?php echo $image['url']; ?>')"></div>
						<div class="text-wrap">
							<?php echo wp_kses_post( $editor ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
