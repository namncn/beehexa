<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Management Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Management extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Management widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-management';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Management widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Management', 'phoenixdigi' );
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
				'default'     => __( 'Management', 'phoenixdigi' ),
				'placeholder' => __( 'Management', 'phoenixdigi' ),
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
				'default'     => __( 'Steve Singh', 'phoenixdigi' ),
				'placeholder' => __( 'Steve Singh', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'excerpt',
			[
				'label'   => __( 'Excerpt', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Tooling that is simple to use, yet powerful and delivers a great user experience so you can focus on what you love — writing great code.', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'linkedin',
			[
				'label'       => __( 'Linked In Url', 'phoenixdigi' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'label_block' => true,
				'default'     => [
					'is_external' => 'true',
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'twitter',
			[
				'label'       => __( 'Twitter Url', 'phoenixdigi' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'label_block' => true,
				'default'     => [
					'is_external' => 'true',
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

		$section_title = $settings['section_title'];
		$items         = $settings['items'];
		?>
		<div class="management-section">
			<div class="container text-center">
				<?php if ( $section_title ) : ?>
				<h2><?php echo esc_html( $section_title ); ?></h2>
				<?php endif; ?>
				<div class="our-management illustration-cards-row flex-container">
					<?php foreach ( $items as $index => $item ) : ?>
						<div class="illustrations-card-item bio pop-under-source mb-5">
							<div class="card">
								<div class="image-wrap">
									<img class="image" src="<?php echo $item['image']['url']; ?>">
								</div>
								<div class="bio-content text-wrap">
									<div class="inner">
										<h3><?php echo esc_html( $item['title'] ); ?></h3>
										<h4><?php echo $item['excerpt']; ?></h4>
										<?php if ( $item['linkedin']['url'] || $item['twitter']['url'] ) : ?>
										<div class="social-icons">
											<?php if ( $item['linkedin']['url'] ) : ?>
											<a href="<?php echo $item['linkedin']['url']; ?>" class="linkedin"<?php echo $item['linkedin']['is_external'] ? ' target="_blank"' : ''; echo $item['linkedin']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
												<img src="<?php echo get_theme_file_uri( 'assets/images/linkedin-color-24.png' ); ?>" alt="Linkedin Logo">
											</a>
											<?php endif; ?>
											<?php if ( $item['twitter']['url'] ) : ?>
											<a href="<?php echo $item['twitter']['url']; ?>" class="twitter"<?php echo $item['twitter']['is_external'] ? ' target="_blank"' : ''; echo $item['twitter']['nofollow'] ? ' rel="nofollow"' : ''; ?>>
												<img src="<?php echo get_theme_file_uri( 'assets/images/Twitter_Logo_Blue.svg' ); ?>" alt="Twitter Logo">
											</a>
											<?php endif; ?>
										</div>
										<?php endif; ?>
									</div>
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
