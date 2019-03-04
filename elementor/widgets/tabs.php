<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Tabs extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Tabs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-tabs';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Tabs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Tabs', 'phoenixdigi' );
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
		return 'eicon-tabs';
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
				'default'     => __( 'Developer', 'phoenixdigi' ),
				'placeholder' => __( 'Developer', 'phoenixdigi' ),
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
			'button_1',
			[
				'label'   => __( 'Button 1', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Download for Mac',
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'button_1_link',
			[
				'label' => __( 'Button 1 Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'button_2',
			[
				'label'   => __( 'Button 2', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Download for Mac',
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'button_2_link',
			[
				'label' => __( 'Button 2 Link', 'phoenixdigi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'phoenixdigi' ),
			]
		);

		$repeater->add_control(
			'button_3',
			[
				'label'   => __( 'Button 3', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Download for Mac',
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'button_3_link',
			[
				'label' => __( 'Button 3 Link', 'phoenixdigi' ),
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

		$items = $settings['items'];
		?>
		<div class="tabs-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="tabs-wrap">
							<nav>
								<div class="nav nav-tabs" role="tablist">
								<?php foreach ( $items as $i => $item ) : ?>
										<a class="nav-item nav-link<?php echo ( 0 == $i ) ? ' active' : ''; ?>" id="nav-<?php echo esc_attr( $i + 1 ); ?>-tab" data-toggle="tab" href="#nav-<?php echo esc_attr( $i + 1 ); ?>" role="tab" aria-controls="nav-<?php echo esc_attr( $i + 1 ); ?>" aria-selected="true">
											<?php echo esc_html( $item['title'] ); ?>
										</a>
								<?php endforeach; ?>
								</div>
							</nav>
							<div class="tab-content">
							<?php foreach ( $items as $i => $item ) : ?>
								<div class="tab-pane fade show<?php echo ( 0 == $i ) ? ' active' : ''; ?>" id="nav-<?php echo esc_attr( $i + 1 ); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr( $i + 1 ); ?>-tab">
									<div class="row">
	                  <div class="col-md-8 col-lg-9">
	                  	<?php if ( $item['excerpt'] ) : ?>
	                    <div class="text-wrap">
	                    	<?php echo wpautop( $item['excerpt'] ); ?>
	                    </div>
	                    <?php endif; ?>
	                  </div>
	                  <div class="col-md-4 col-lg-3 buttons-col">
	                  	<div class="buttons-wrap">
	                  		<?php if ( $item['button_1'] ) : ?>
	                  		<a href="<?php echo esc_attr( $item['button_1_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_1'] ); ?></a>
		                  	<?php endif; ?>
	                  		<?php if ( $item['button_2'] ) : ?>
	                  		<a href="<?php echo esc_attr( $item['button_2_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_2'] ); ?></a>
		                  	<?php endif; ?>
	                  		<?php if ( $item['button_3'] ) : ?>
	                  		<a href="<?php echo esc_attr( $item['button_3_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_3'] ); ?></a>
		                  	<?php endif; ?>
	                  	</div>
	                  </div>
	                </div>
								</div>
							<?php endforeach; ?>
							</div>
						</div>
						<div class="accordion-wrap">
							<div class="accordion" id="accordion0">
								<?php foreach ( $items as $i => $item ) : ?>
								<div class="card">
									<div class="card-header">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr( $i + 1 ); ?>" aria-expanded="false" aria-controls="collapse-<?php echo esc_attr( $i + 1 ); ?>"><?php echo esc_html( $item['title'] ); ?></button>
										</h5>
									</div>
									<div id="collapse-<?php echo esc_attr( $i + 1 ); ?>" class="collapse" aria-labelledby="heading-<?php echo esc_attr( $i + 1 ); ?>" data-parent="#accordion0" style="">
										<div class="card-body">
											<div class="row">
												<div class="col-md-8 col-lg-9">
													<?php if ( $item['excerpt'] ) : ?>
													<div class="text-wrap">
														<?php echo wpautop( $item['excerpt'] ); ?>
													</div>
													<?php endif; ?>
												</div>
												<div class="col-md-4 col-lg-3 buttons-col">
													<div class="buttons-wrap">
			                  		<?php if ( $item['button_1'] ) : ?>
			                  		<a href="<?php echo esc_attr( $item['button_1_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_1'] ); ?></a>
				                  	<?php endif; ?>
			                  		<?php if ( $item['button_2'] ) : ?>
			                  		<a href="<?php echo esc_attr( $item['button_2_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_2'] ); ?></a>
				                  	<?php endif; ?>
			                  		<?php if ( $item['button_3'] ) : ?>
			                  		<a href="<?php echo esc_attr( $item['button_3_link']['url'] ); ?>" class="btn btn-primary" target="_blank"><?php echo esc_attr( $item['button_3'] ); ?></a>
				                  	<?php endif; ?>
			                  	</div>
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
			</div>
		</div>
		<?php
	}
}
