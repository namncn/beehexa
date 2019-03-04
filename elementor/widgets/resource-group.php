<?php
namespace Phoenixdigi\Elementor\Widget;

/**
 * Resource Group Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Resource_Group extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Resource Group widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'phoenixdigi-resource-group';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Resource Group widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Resource Group', 'phoenixdigi' );
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

		$all_fields = acf_get_field_groups();
		$resources  = array();
		foreach ( $all_fields as $value ) {
			$resources[$value['ID']] = $value['title'];
		}

		$this->add_control(
			'resources',
			[
				'label'   => __( 'Choose Resource Listings', 'phoenixdigi' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $resources,
				'dynamic' => [
					'active' => true,
				],
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

		$id = $settings['resources'];
		?>
		<div class="resource-listings">
			<div class="container">
				<div class="image-cards-row flex-container search_container mb-5 pb-5">
					<div class="card-item">
						<div>
							<input id="searchResource" class="search-input form-control" name="search-resource-content" type="text" placeholder="Search Resources">
						</div>
					</div>
					<div class="card-item">
						<div>
							<select id="searchProduct" class="search-select form-control" name="search-product">
								<option value="" selected="">Products</option>
							</select>
						</div>
					</div>
					<div class="card-item">
						<div>
							<select id="searchType" class="search-select form-control" name="search-type">
								<option value="" selected="">Resource Type</option>
								<?php
								if ( ! empty( $id ) ) :
									$fields = acf_get_fields( $id );
									if ( ! empty( $fields[0]['name'] ) ) :
										$resources = pdvn_get_acf_option( $fields[0]['name'], 'option' );
										foreach ( $resources as $resource ) : ?>
										<option value="<?php echo esc_attr( $resource['resources_id'] ); ?>"><?php echo esc_attr( $resource['resources_heading'] ); ?></option>
										<?php
										endforeach;
									endif;
								endif;
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="search-target">
				<?php
				if ( ! empty( $id ) ) :
					$fields = acf_get_fields( $id );
					if ( ! empty( $fields[0]['name'] ) ) :
						$resources = pdvn_get_acf_option( $fields[0]['name'], 'option' );
						foreach ( $resources as $resource ) : ?>
						<div class="search-group resources-group">
							<h2 class="group-title text-center">
								<?php echo esc_html( $resource['resources_heading'] ); ?>
							</h2>
							<?php if ( ! empty( $resources_item = $resource['resources_item'] ) ) : ?>
							<div class="resources-row flex-container">
								<?php foreach ( $resources_item as $index => $item ) : ?>
								<div class="card-item search-item">
									<div class="inner-wrap">
										<a href="<?php echo $item['resources_item_link']; ?>" target="_blank">
											<div class="image-wrap"<?php echo ( $item['resources_item_image']['url'] ) ? ' style="background-image: url(' . $item['resources_item_image']['url'] . ');"' : ''; ?>>
												<?php if ( $item['resources_item_image']['url'] ) : ?>
												<img src="<?php echo $item['resources_item_image']['url']; ?>" alt="">
												<?php endif; ?>
											</div>
										</a>
										<div class="text-wrap resource-content">
											<?php if ( $item['resources_item_title'] ) : ?>
											<h6><?php echo $item['resources_item_title']; ?></h6>
											<?php endif; ?>
											<?php echo wpautop( $item['resources_item_excerpt'] ); ?>
											<a class="arrow-link" href="<?php echo $item['resources_item_link']; ?>" target="_blank">
												<?php echo esc_html( $item['resources_item_button'] ); ?>
											</a>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
							<div class="group-type d-none"><?php echo esc_html( $resource['resources_id'] ); ?></div>
						</div>
						<?php
						endforeach;
					endif;
				endif;
				?>
				</div>
			</div>
		</div>
		<script src="<?php echo get_theme_file_uri( '/assets/js/item-search.js' ); ?>"></script>
		<?php
	}
}
