<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Clients Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Clients extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Clients widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-clients';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Clients widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Clients', 'phoenixdigi' );
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
		return 'eicon-carousel';
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
			'section_content',
			[
				'label' => __( 'Content', 'phoenixdigi' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'   => __( 'Choose Image', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'   => __( 'Link', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'images',
			[
				'label'   => __( 'Social Icons', 'elementor' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
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

		$images = $settings['images'];
		?>
		<div class="clients-showcase-section">
			<div class="container">
				<div class="row">
					<?php foreach ( $images as $index => $item ) : ?>
					<div class="logo-wrap col-lg-2 col-4">
						<a href="<?php echo $item['link']['url']; ?>"<?php echo $item['link']['is_external'] ? ' target="_blank"' : ''; echo $item['link']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
							<img src="<?php echo $item['image']['url']; ?>" class="image" alt="">
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
