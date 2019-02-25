<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

?>

<aside id="secondary-1" class="widget-area sidebar col-12 col-lg-3" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php endif; ?>

</aside>
