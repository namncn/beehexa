<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Savings Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Savings extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Savings widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-savings';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Savings widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Savings', 'phoenixdigi' );
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
			'section_content',
			[
				'label' => __( 'Content', 'phoenixdigi' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'   => __( 'Title', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Faster Time to Market', 'phoenixdigi' ),
				'placeholder' => __( 'Faster Time to Market', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'excerpt',
			[
				'label'   => __( 'Excerpt', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'New applications and services are what keep your competitive edge. With Docker, organizations are able to triple their speed to deliver new services with development and operational agility enabled by containerization.', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'offset',
			[
				'label'   => __( 'Stroke Dash Offset', 'elementor' ),
				'type'    => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'max'  => 100,
						'min'  => 1,
						'step' => 1,
					],
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'color',
			[
				'label'     => __( 'Color', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#2496ed',
				'scheme' => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$repeater->add_control(
			'percent',
			[
				'label'   => __( 'Percentage', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '60% +',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'items',
			[
				'label'   => __( 'Items', 'elementor' ),
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

		$items = $settings['items'];
		?>
		<div class="docker-savings-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="savings-row">
							<?php foreach ( $items as $index => $item ) : ?>
							<div class="savings-item">
								<div class="card">
									<div class="card-reveal">
										<h4><?php echo esc_html( $item['title'] ); ?></h4>
										<hr>
										<?php echo wpautop( $item['excerpt'] ); ?>
									</div>
									<div class="card-front">
										<div class="donut-chart-wrap">
											<svg class="donut-chart" viewBox="0 0 33.422538619 33.422538619" xmlns="http://www.w3.org/2000/svg">
												<circle class="donut-chart__background" stroke-width="3.183098916" fill="none" cx="16.7112693097" cy="16.7112693097" r="15.1197198516"></circle>
												<circle class="donut-chart__circle" stroke="<?php echo esc_attr( $item['color'] ); ?>" stroke-width="3.183098916" stroke-dasharray="100" stroke-linecap="butt" fill="none" cx="16.7112693097" cy="16.7112693097" r="15.1197198516" stroke-dashoffset="100" style="stroke-dashoffset: <?php echo esc_attr( $item['offset']['size'] ); ?>px;"></circle>
											</svg>
											<span class="number-wrap"><?php echo esc_html( $item['percent'] ); ?></span>
										</div>
										<div class="description-wrap">
											<h4><?php echo esc_html( $item['title'] ); ?></h4>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
