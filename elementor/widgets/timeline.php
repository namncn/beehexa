<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Timeline Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Timeline extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Timeline widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-timeline';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Timeline widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Timeline', 'phoenixdigi' );
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
				'default'     => __( 'Milestones', 'phoenixdigi' ),
				'placeholder' => __( 'Milestones', 'phoenixdigi' ),
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
				'default'     => __( 'October 2018: Docker named a Leader in The Forrester New Wave™: Enterprise Container Platform Software Suites, Q4 2018 report', 'phoenixdigi' ),
				'placeholder' => __( 'October 2018: Docker named a Leader in The Forrester New Wave™: Enterprise Container Platform Software Suites, Q4 2018 report', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'acquisition',
			[
				'label'     => __( 'Acquisition', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'phoenixdigi' ),
				'label_on'  => __( 'Yes', 'phoenixdigi' ),
				'default'   => 'no',
			]
		);


		$this->add_control(
			'items',
			[
				'label'  => __( 'Items', 'phoenixdigi' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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

		$title = $settings['title'];
		$items = $settings['items'];
		?>
		<div class="timeline-section">
			<div class="container text-center">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<div class="timeline">
					<ul>
					<?php foreach ( $items as $index => $item ) : ?>
						<li<?php echo ( 'yes' == $item['acquisition'] ) ? ' class="featured acquisition"' : ''; ?>>
							<div>
								<h5><?php echo esc_html( $item['text'] ); ?></h5>
								<p></p>
							</div>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}
}
