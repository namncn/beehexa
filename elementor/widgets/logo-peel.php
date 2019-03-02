<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Logo_Peel Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Logo_Peel extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Logo_Peel widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-logo-peel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Logo_Peel widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Logo Peel', 'phoenixdigi' );
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
		return 'eicon-gallery-grid';
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
			'section_editor_1',
			[
				'label' => __( 'Box 1', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'editor_1',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'image_1',
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

		$this->add_control(
			'color_1',
			[
				'label' => __( 'Color', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card-front-1' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'link_1',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_editor_2',
			[
				'label' => __( 'Box 2', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'editor_2',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'image_2',
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

		$this->add_control(
			'color_2',
			[
				'label' => __( 'Color', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card-front-2' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'link_2',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_editor_3',
			[
				'label' => __( 'Box 3', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'editor_3',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'image_3',
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

		$this->add_control(
			'color_3',
			[
				'label' => __( 'Color', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card-front-3' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'link_3',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
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

		$image_1 = $settings['image_1'];
		$image_2 = $settings['image_2'];
		$image_3 = $settings['image_3'];

		$link_1 = $settings['link_1'];
		$link_2 = $settings['link_2'];
		$link_3 = $settings['link_3'];

		$editor_1 = $settings['editor_1'];
		$editor_2 = $settings['editor_2'];
		$editor_3 = $settings['editor_3'];
		?>
		<div class="logo-peel-cards-section">
			<div class="logo-peel-cards-row flex-container">
				<div class="customer-item">
					<a href="<?php echo $link_1['url']; ?>"<?php echo $link_1['is_external'] ? ' target="_blank"' : ''; echo $link_1['nofollow'] ? ' rel="nofollow"' : ''; ?>>
						<div class="card revealed">
							<div class="card-front card-front-1">
								<div class="logo-wrap">
									<img class="image" src="<?php echo $image_1['url']; ?>" alt="">
								</div>
							</div>
							<div class="card-peel"></div>
							<div class="card-back">
								<div class="text-wrap">
									<?php echo wp_kses_post( $editor_1 ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="customer-item">
					<a href="<?php echo $link_2['url']; ?>"<?php echo $link_2['is_external'] ? ' target="_blank"' : ''; echo $link_2['nofollow'] ? ' rel="nofollow"' : ''; ?>>
						<div class="card revealed">
							<div class="card-front card-front-2">
								<div class="logo-wrap">
									<img class="image" src="<?php echo $image_2['url']; ?>" alt="">
								</div>
							</div>
							<div class="card-peel"></div>
							<div class="card-back">
								<div class="text-wrap">
									<?php echo wp_kses_post( $editor_2 ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="customer-item">
					<a href="<?php echo $link_3['url']; ?>"<?php echo $link_3['is_external'] ? ' target="_blank"' : ''; echo $link_3['nofollow'] ? ' rel="nofollow"' : ''; ?>>
						<div class="card revealed">
							<div class="card-front card-front-3">
								<div class="logo-wrap">
									<img class="image" src="<?php echo $image_3['url']; ?>" alt="">
								</div>
							</div>
							<div class="card-peel"></div>
							<div class="card-back">
								<div class="text-wrap">
									<?php echo wp_kses_post( $editor_3 ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}
