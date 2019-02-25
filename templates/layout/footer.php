<div class="container">

	<div class="row">

		<?php if ( is_active_sidebar( 'footer-column' ) ) : ?>

			<div class="footer-column-1 col-lg-3 col-12">

				<?php dynamic_sidebar( 'footer-column' ); ?>

			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>

			<div class="footer-column-2 col-lg-3 col-12">

				<?php dynamic_sidebar( 'footer-column-2' ); ?>

			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>

			<div class="footer-column-3 col-lg-3 col-12">

				<?php dynamic_sidebar( 'footer-column-3' ); ?>

			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>

			<div class="footer-column-4 col-lg-3 col-12">

				<?php dynamic_sidebar( 'footer-column-4' ); ?>

			</div>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- .container -->
