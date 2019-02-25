<article class="post-item">

	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Trang không tồn tại', 'phoenixdigi' ); ?></h1>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
		?>

			<p><?php printf( __( 'Bạn đã sẵn sàng đăng bài? <a href="%1$s">Bắt đầu tại đây</a>.', 'phoenixdigi' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php _e( 'Không tìm thấy trang bạn muốn, hay thử tìm kiếm trang khác.', 'phoenixdigi' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
	</div><!-- .page-content -->

</article>
