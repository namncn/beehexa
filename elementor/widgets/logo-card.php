<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Logo_Card Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Logo_Card extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Logo_Card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-card';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Logo_Card widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Logo Card', 'phoenixdigi' );
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
			'section_heading',
			[
				'label' => __( 'Heading', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Customer stories', 'phoenixdigi' ),
			]
		);

		$this->end_controls_section();

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

		$repeater->add_control(
			'title',
			[
				'label'   => __( 'Title', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'ADP', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'excerpt',
			[
				'label'   => '',
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'How did ADP modernize its applications and build a secure software supply chain to serve its nearly 40 million active users in 113 countries?', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'button',
			[
				'label'   => __( 'Button', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Learn more', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
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

		$heading = $settings['heading'];
		$items   = $settings['items'];
		?>
		<div class="sub-hero-section">
			<div class="container">
				<h2 class="text-center"><?php echo esc_html( $heading ); ?></h2>
				<div class="logo-cards-wrap">
					<div class="logo-cards-row flex-container">
						<?php foreach ( $items as $item ) : ?>
						<div class="logo-card-item">
							<div class="logo-card">
								<div class="card-front">
									<div class="image-wrap">
										<?php if ( $item['image']['url'] ) : ?>
										<a href="<?php echo $item['link']['url']; ?>"<?php echo $item['link']['is_external'] ? ' target="_blank"' : ''; echo $item['link']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
											<img class="role_icon" src="<?php echo $item['image']['url']; ?>">
										</a>
										<?php endif; ?>
									</div>
								</div>
								<div class="card-reveal">
									<div class="detail-wrap">
										<h4><?php echo esc_html( $item['title'] ); ?></h4>
										<hr>
										<?php echo wpautop( $item['excerpt'] ); ?>
										<div class="action-wrap">
											<a href="<?php echo $item['link']['url']; ?>" class="arrow-link"<?php echo $item['link']['is_external'] ? ' target="_blank"' : ''; echo $item['link']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
												<?php echo $item['button']; ?>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
