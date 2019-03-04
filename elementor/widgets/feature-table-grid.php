<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Feature_Table_Grid Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Feature_Table_Grid extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Feature_Table_Grid widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-feature-table-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Feature_Table_Grid widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Feature Table Grid', 'phoenixdigi' );
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
				'default'     => __( 'Which Docker Desktop is right for you?', 'phoenixdigi' ),
				'placeholder' => __( 'Which Docker Desktop is right for you?', 'phoenixdigi' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'title_1',
			[
				'label'   => __( 'Title 1', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Desktop Community', 'phoenixdigi' ),
				'placeholder' => __( 'Desktop Community', 'phoenixdigi' ),
			]
		);

		$this->add_control(
			'title_2',
			[
				'label'   => __( 'Title 2', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Desktop Enterprise', 'phoenixdigi' ),
				'placeholder' => __( 'Desktop Enterprise', 'phoenixdigi' ),
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

		$repeater->add_control(
			'strong',
			[
				'label'     => __( 'Text Strong', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'phoenixdigi' ),
				'label_on'  => __( 'Yes', 'phoenixdigi' ),
				'default'   => 'no',
			]
		);

		$repeater->add_control(
			'icon_1',
			[
				'label'     => __( 'Icon 1?', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'phoenixdigi' ),
				'label_on'  => __( 'Show', 'phoenixdigi' ),
				'default'   => 'yes',
			]
		);

		$repeater->add_control(
			'icon_2',
			[
				'label'     => __( 'Icon 2?', 'phoenixdigi' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'phoenixdigi' ),
				'label_on'  => __( 'Show', 'phoenixdigi' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'items',
			[
				'label'   => __( 'Items', 'phoenixdigi' ),
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

		$heading = $settings['heading'];
		$title_1 = $settings['title_1'];
		$title_2 = $settings['title_2'];
		$items   = $settings['items'];
		?>
		<div class="interactive-graph-section">
			<div class="container">
				<?php if ( $heading ) : ?>
				<div class="intro-wrap">
					<h2><?php echo esc_html( $heading ); ?></h2>
				</div>
				<?php endif; ?>
				<div class="row feature-table-wrap feature-table-grid">
					<div class="col-md-8 offset-md-2 feature-table">
						<div class="feature-table-inner">
							<table class="table table-bordered">
								<tbody>
									<tr class="theader">
										<td class="col-sm-33" data-mh="cols3" width="60%" style=""></td>
										<td class="col-sm-33" data-mh="cols3" width="20%" style=""><h4><?php echo esc_html( $title_1 ); ?></h4></td>
										<td class="col-sm-33" data-mh="cols3" width="20%" style=""><h4><?php echo esc_html( $title_2 ); ?></h4></td>
									</tr>
									<?php foreach ( $items as $index => $item ) : ?>
									<tr class="cat_row">
										<td class="col-sm-33"<?php echo ( 'yes' != $item['icon_1'] && 'yes' != $item['icon_2'] ) ? ' colspan="3"' : ''; ?> data-mh="cols3">
											<?php if ( 'yes' == $item['strong'] ) : ?>
											<strong>
											<?php endif; ?>
												<?php echo esc_html( $item['text'] ); ?>
											<?php if ( 'yes' == $item['strong'] ) : ?>
											</strong>
											<?php endif; ?>
										</td>
										<?php if ( 'yes' == $item['icon_1'] || 'yes' == $item['icon_2'] ) : ?>
										<td class="col-sm-33" data-mh="cols3" style="">
											<?php if ( 'yes' == $item['icon_1'] ) : ?>
											<i class="check"></i>
											<?php endif; ?>
										</td>
										<td class="col-sm-33" data-mh="cols3" style="">
											<?php if ( 'yes' == $item['icon_2'] ) : ?>
											<i class="check"></i>
											<?php endif; ?>
										</td>
										<?php endif; ?>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
