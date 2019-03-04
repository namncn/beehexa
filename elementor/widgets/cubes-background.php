<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Cubes_Background Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Cubes_Background extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Cubes_Background widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-cubes-background';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Cubes_Background widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Cubes Background', 'phoenixdigi' );
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
			'heading_1',
			[
				'label' => __( 'Heading 1', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Docker Containerization Unlocks the Potential for Dev and Ops', 'phoenixdigi' ),
				'placeholder' => __( 'Docker Containerization Unlocks the Potential for Dev and Ops', 'phoenixdigi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_2',
			[
				'label' => __( 'Heading 2', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Freedom of choice, agile operations and integrated container security for legacy and cloud-native applications', 'phoenixdigi' ),
				'placeholder' => __( 'Freedom of choice, agile operations and integrated container security for legacy and cloud-native applications', 'phoenixdigi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_1',
			[
				'label' => __( 'Button 1', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'What is a Container', 'phoenixdigi' ),
				'placeholder' => __( 'What is a Container', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'link_1',
			[
				'label'   => __( 'Link 1', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'button_2',
			[
				'label' => __( 'Button 2', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Learn about Container Platforms', 'phoenixdigi' ),
				'placeholder' => __( 'Learn about Container Platforms', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'link_2',
			[
				'label'   => __( 'Link 2', 'phoenixdigi' ),
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

		$this->start_controls_section(
			'section_text_wrap_style',
			[
				'label' => __( 'Text Wrap', 'phoenixdigi' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_wrap_padding',
			[
				'label'      => __( 'Padding', 'phoenixdigi' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top'    => '20',
					'right'  => '0',
					'bottom' => '60',
					'left'   => '0',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .text-wrap' => 'margin: 0 auto;text-align: center;padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_wrap_max_width',
			[
				'label'   => __( 'Max Width', 'elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 930,
				'selectors'  => [
					'{{WRAPPER}} .text-wrap' => 'max-width: {{VALUE}}px;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_heading_2_style',
			[
				'label' => __( 'Heading 2', 'phoenixdigi' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'heading_2_max_width',
			[
				'label'     => __( 'Max Width', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => 736,
				'selectors' => [
					'{{WRAPPER}} .sub-h1' => 'margin-left: auto;margin-right: auto;max-width: {{VALUE}}px;',
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
		$heading_1    = $settings['heading_1'];
		$heading_2    = $settings['heading_2'];
		$button_1     = $settings['button_1'];
		$button_2     = $settings['button_2'];
		$link_1       = $settings['link_1'];
		$link_2       = $settings['link_2'];
		?>
		<div class="cubes-background">
			<div class="cubes-left" style="<?php echo 'background-image: url(' . $background_1['url'] . ');'; ?>"></div>
			<div class="cubes-right" style="<?php echo 'background-image: url(' . $background_2['url'] . ');'; ?>"></div>
			<div class="container">
				<div class="text-wrap">
					<h1 class="title"><?php echo esc_html( $heading_1 ); ?></h1>
					<h3 class="sub-h1"><?php echo esc_html( $heading_2 ); ?></h3>
					<?php if ( $button_1 || $button_2 ) : ?>
					<div class="action-wrap">
						<?php if ( $button_1 ) : ?>
						<a class="btn btn-primary" href="<?php echo $link_1['url']; ?>"<?php echo $link_1['is_external'] ? ' target="_blank"' : ''; echo $link_1['nofollow'] ? ' rel="nofollow"' : ''; ?>>
							<?php echo esc_html( $button_1 ); ?>
						</a>
						<?php endif; ?>
						<?php if ( $button_2 ) : ?>
						<a class="btn btn-primary" href="<?php echo $link_2['url']; ?>"<?php echo $link_2['is_external'] ? ' target="_blank"' : ''; echo $link_2['nofollow'] ? ' rel="nofollow"' : ''; ?>>
							<?php echo esc_html( $button_2 ); ?>
						</a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
