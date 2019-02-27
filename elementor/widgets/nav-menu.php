<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Nav_Menu Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Nav_Menu extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Nav_Menu widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-nav-menu';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Nav_Menu widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Nav Menu', 'phoenixdigi' );
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
		return 'eicon-nav-menu';
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
			'section_logo',
			[
				'label' => __( 'Logo', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'logo',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_link',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
				'show_label' => false,
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

		$logo = $settings['logo'];
		$link = $settings['link'];
		?>
		<nav class="main-nav navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo['url']; ?>" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
	        <span></span>
	        <span></span>
	      </button>
	      <div id="navbar" class="collapse navbar-collapse">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => '',
							'menu_class'     => 'navbar-nav m-auto',
							'container'      => '',
						));
					?>
		      <div class="action-wrap my-2 my-md-0">
	          <a class="btn" href="<?php echo $link['url']; ?>"<?php echo $link['is_external'] ? ' target="_blank"' : ''; echo $link['nofollow'] ? ' rel="nofollow"' : ''; ?>>Get Started</a>
	        </div>
	      </div>
			</div>
		</nav>
		<?php
	}
}
