<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Topbar Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Topbar extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Topbar widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'topbar';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Topbar widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Topbar', 'phoenixdigi' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Slider Hero widget icon.
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

	public function get_script_depends() {
		return [ 'phoenixdigi-elementor' ];
	}

	/**
	 * Register Slider Hero widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		// $this->start_controls_section(
		// 	'content_section',
		// 	[
		// 		'label' => __( 'Menu', 'phoenixdigi' ),
		// 		'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		// 	]
		// );

		// $navmenus = get_registered_nav_menus();

		// $menus = array(
		// 	'none' => esc_html__( '--Lựa chọn--', 'phoenixdigi' )
		// );

		// if ( $navmenus ) {
		// 	foreach ( $navmenus as $location => $title ) {
		// 		$menus[ $location ] = $title;
		// 	}
		// }

		// $this->add_control(
		// 	'slides',
		// 	[
		// 		'label'       => __( 'Select Menu', 'phoenixdigi' ),
		// 		'type'        => \Elementor\Controls_Manager::SELECT,
		// 		'options'     => $menus,
		// 		'label_block' => true,
		// 		'default'     => 'none',
		// 	]
		// );

		// $this->end_controls_section();

	}

	/**
	 * Render Slider Hero widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		?>

		<div class="utility-nav navbar navbar-expand-lg d-none d-lg-flex">
			<div class="container">
				<div class="utility-container ml-auto">
					<button class="search-toggle" id="searchToggle">
	          <svg class="search-icon">
	            <use xlink:href="#searchIcon"></use>
	          </svg>
	        </button>
	        <div class="header-search-form">
	          <form id="searchForm">
	            <input id="searchText" type="text">
	          </form>
	        </div>
	        <?php
						wp_nav_menu( array(
							'theme_location'  => 'topbar',
							'menu_id'         => 'topbar-menu',
							'menu_class'      => 'navbar-nav m-auto',
							'container_class' => 'secondary-nav',
						));
					?>
				</div>
			</div>
		</div>
		<?php
	}
}
