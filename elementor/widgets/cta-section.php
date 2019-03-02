<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Cta_Section Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Cta_Section extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Cta_Section widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-cta-section';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Cta_Section widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Cta Section', 'phoenixdigi' );
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
			'section_content',
			[
				'label' => __( 'Content', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Get started with Docker today', 'phoenixdigi' ),
				'placeholder' => __( 'Get started with Docker today', 'phoenixdigi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button',
			[
				'label' => __( 'Button Text', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Get Started', 'phoenixdigi' ),
				'placeholder' => __( 'Get Started', 'phoenixdigi' ),
			]
		);

		$this->add_control(
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Background', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'background_1',
			[
				'label'   => __( 'Background Left', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'background_2',
			[
				'label'   => __( 'Background Right', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		$background_1 = $settings['background_1'];
		$background_2 = $settings['background_2'];
		$heading      = $settings['heading'];
		$button       = $settings['button'];
		$link         = $settings['link'];
		?>
		<div class="cta-section cubes-background">
			<div class="cubes-left" style="<?php echo 'background-image: url(' . $background_1['url'] . ');'; ?>"></div>
			<div class="cubes-right" style="<?php echo 'background-image: url(' . $background_2['url'] . ');'; ?>"></div>
			<div class="container">
				<div class="text-wrap">
					<h2 class="xl"><?php echo esc_html( $heading ); ?></h2>
					<a class="btn btn-primary" href="<?php echo $link['url']; ?>"<?php echo $link['is_external'] ? ' target="_blank"' : ''; echo $link['nofollow'] ? ' rel="nofollow"' : ''; ?>>
						<?php echo esc_html( $button ); ?>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}
