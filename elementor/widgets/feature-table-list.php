<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Feature_Table_List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Feature_Table_List extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Feature_Table_List widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-feature-table-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Feature_Table_List widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Feature Table List', 'phoenixdigi' );
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
		return 'eicon-bullet-list';
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
			'title',
			[
				'label'   => __( 'Title', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Docker Engine', 'phoenixdigi' ),
				'placeholder' => __( 'Docker Engine', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'badge',
			[
				'label'   => __( 'Badge', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Enterprise', 'phoenixdigi' ),
				'placeholder' => __( 'Enterprise', 'phoenixdigi' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button',
			[
				'label'   => __( 'Button', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Contact Sales', 'phoenixdigi' ),
				'placeholder' => __( 'Contact Sales', 'phoenixdigi' ),
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
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'secondary',
			[
				'label'     => __( 'Secondary?', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'phoenixdigi' ),
				'label_on'  => __( 'Yes', 'phoenixdigi' ),
				'default'   => 'no',
			]
		);

		$this->add_control(
			'color',
			[
				'label'   => __( 'Color', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::COLOR,
				'default' => '#2854a1',
				'scheme'  => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .feature-table-inner' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .product-badge'       => 'background-color: {{VALUE}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text',
			[
				'label'   => __( 'Text', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Simplest Path to Container-based Development', 'phoenixdigi' ),
				'placeholder' => __( 'Simplest Path to Container-based Development', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'items',
			[
				'label'   => __( 'Items', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'separator' => 'before',
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

		$title     = $settings['title'];
		$badge     = $settings['badge'];
		$button    = $settings['button'];
		$link      = $settings['link'];
		$secondary = $settings['secondary'];
		$items     = $settings['items'];
		?>
		<div class="interactive-graph-section">
			<div class="feature-table-wrap feature-table-list">
				<div class="feature-table">
					<div class="feature-table-inner">
						<h3><?php echo esc_html( $title ); ?> <span class="product-badge"><?php echo esc_html( $badge ); ?></span></h3>
						<ul>
							<?php foreach ( $items as $index => $item ) : ?>
							<li><?php echo esc_html( $item['text'] ); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php if ( $button ) : ?>
						<a class="btn d-block<?php echo ( 'yes' == $secondary ) ? ' btn-outline-secondary"' : ' btn-primary'; ?>" href="<?php echo $link['url']; ?>"<?php echo $link['is_external'] ? ' target="_blank"' : ''; echo $link['nofollow'] ? ' rel="nofollow"' : ''; ?>>
							<?php echo esc_html( $button ); ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
