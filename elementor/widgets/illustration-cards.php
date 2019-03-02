<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Illustration_Cards Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Illustration_Cards extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Illustration_Cards widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-illustration-cards';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Illustration_Cards widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Illustration Cards', 'phoenixdigi' );
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

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Title', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'How Docker Works for You', 'phoenixdigi' ),
				'placeholder' => __( 'How Docker Works for You', 'phoenixdigi' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'   => __( 'Image', 'phoenixdigi' ),
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
			'title',
			[
				'label'   => __( 'Title', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Developers', 'phoenixdigi' ),
				'placeholder' => __( 'Developers', 'phoenixdigi' ),
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
				'default' => __( 'Tooling that is simple to use, yet powerful and delivers a great user experience so you can focus on what you love — writing great code.', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'button',
			[
				'label'   => __( 'Button Text', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Get Started', 'phoenixdigi' ),
				'placeholder' => __( 'Get Started', 'phoenixdigi' ),
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
			'items',
			[
				'label'  => __( 'Items', 'elementor' ),
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

		$section_title = $settings['section_title'];
		$items         = $settings['items'];
		?>
		<div class="illustration-cards">
			<div class="container">
				<?php if ( $section_title ) : ?>
				<h2><?php echo esc_html( $section_title ); ?></h2>
				<?php endif; ?>
				<div class="illustration-cards-row flex-container">
					<?php foreach ( $items as $index => $item ) : ?>
						<div class="illustrations-card-item">
							<div class="card">
								<div class="image-wrap">
									<img class="image" src="<?php echo $item['image']['url']; ?>">
								</div>
								<div class="text-wrap">
									<div class="inner">
										<h4><?php echo esc_html( $item['title'] ); ?></h4>
										<?php echo wpautop( $item['excerpt'] ); ?>
									</div>
								</div>
								<div class="links">
									<a class="arrow-link" href="<?php echo $item['link']['url']; ?>"<?php echo $item['link']['is_external'] ? ' target="_blank"' : ''; echo $item['link']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
										<?php echo esc_html( $item['button'] ); ?>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
