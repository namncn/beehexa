<?php
/**
 * Template for displaying search forms in PDVN Theme
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( site_url( '/' ) ); ?>">

	<label for="<?php echo esc_attr( $unique_id ); ?>">

		<span class="screen-reader-text"><?php echo _x( 'Tìm kiếm cho:', 'label', 'phoenixdigi' ); ?></span>

	</label>

	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Nhập từ khóa tìm kiếm...', 'phoenixdigi' ); ?>" />

	<button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Tìm kiếm', 'submit button', 'phoenixdigi' ); ?></span></button>

</form>

