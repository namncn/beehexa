<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Image_Text Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Image_Text extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image_Text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-image-text';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image_Text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Text', 'phoenixdigi' );
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
		return 'eicon-image-box';
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

		$this->add_control(
			'editor',
			[
				'label'   => '',
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '<h2>Docker Simplifies the Developer Experience</h2>
								<p>Docker provides container software that is ideal for developers and teams looking to get started and experimenting with container-based applications. <a href="/products/docker-desktop">Docker Desktop</a> provides an integrated container-native development experience; it launches as an application from your Mac or Windows toolbar and provides access to the largest library of community and certified Linux and Windows Server content from <a href="/products/docker-hub">Docker Hub</a>.</p>

								<p>Still trying to learn more about containers and the difference between a container and a VM? Find out what\'s possible with <a href="/resources/what-container">Docker Containers</a>.</p>', 'phoenixdigi' ),
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

		$this->add_control(
			'reverse',
			[
				'label'     => __( 'Reverse', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'phoenixdigi' ),
				'label_on'  => __( 'Yes', 'phoenixdigi' ),
				'default'   => 'no',
			]
		);

		$this->add_control(
			'illustration',
			[
				'label'     => __( 'Illustration?', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'phoenixdigi' ),
				'label_on'  => __( 'Yes', 'phoenixdigi' ),
				'default'   => 'no',
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

		$image        = $settings['image'];
		$editor       = $settings['editor'];
		$button       = $settings['button'];
		$link         = $settings['link'];
		$reverse      = $settings['reverse'];
		$illustration = $settings['illustration'];
		?>
		<div class="image-text-section<?php echo ( 'yes' == $reverse ) ? ' image-right' : ' image-left'; ?><?php echo ( 'yes' == $illustration ) ? ' illustration' : ''; ?>">
			<div class="container m-auto">
				<div class="row">
					<div class="col-md-5 image-col<?php echo ( 'yes' == $reverse ) ? ' offset-md-1 order-md-2' : ''; ?>">
						<div class="image-wrap" style="background-image: <?php echo ( 'yes' == $illustration ) ? 'none' : 'url(' . $image['url'] . ')'; ?>">
							<?php if ( 'yes' == $illustration ) : ?>
							<img src="<?php echo $image['url']; ?>" alt="">
							<?php endif; ?>
						</div>
					</div>
					<div class="text-col col-md-5 offset-md-1<?php echo ( 'yes' == $reverse ) ? ' offset-md-1' : ''; ?>">
						<div class="text-container">
							<div class="text-wrap">
								<?php echo wpautop( $editor ); ?>
								<?php if ( $button ) : ?>
								<div class="action-wrap">
									<a class="btn btn-primary" href="<?php echo $link['url']; ?>"<?php echo $link['is_external'] ? ' target="_blank"' : ''; echo $link['nofollow'] ? ' rel="nofollow"' : ''; ?>>
										<?php echo esc_html( $button ); ?>
									</a>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
