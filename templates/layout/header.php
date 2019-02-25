<?php if ( is_active_sidebar( 'topbar' ) ) : ?>

	<div class="topbar">

		<div class="container">

			<div class="row">

				<div class="col-12">

					<?php dynamic_sidebar( 'topbar' ); ?>

				</div>

			</div>

		</div><!-- .row -->

	</div><!-- .topbar -->

<?php endif; ?>

<div class="site-branding" itemscope itemtype="http://schema.org/Brand">

	<div class="container">

		<div class="row align-items-center">

			<div class="col-4">

				<?php if ( has_custom_logo() ) : ?>

					<?php the_custom_logo(); ?>

				<?php else : ?>

					<?php if ( ! is_singular() || is_front_page() ) : ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div>

					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );

					if ( $description || is_customize_preview() ) : ?>

						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>

					<?php
					endif; ?>

				<?php endif; ?>

			</div><!-- .col-4 -->

			<div class="col-8 d-flex justify-content-end">

				<button class="hamburger">

					<i class="fa fa-bars"></i>

				</button>

			</div><!-- .col-8 -->

		</div><!-- .row	-->

	</div><!-- .container	-->

</div><!-- .site-branding	-->

<nav id="site-navigation" class="main-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="container position-relative">

		<?php
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'menu_id'         => 'primary-menu',
				'menu_class'      => 'menu',
				'container_class' => 'primary-menu-container',
				'fallback_cb'     => 'pdvn_primary_menu_fallback',
			));
		?>

		<div class="header-search-form">

			<?php get_search_form(); ?>

		</div>

	</div><!-- .container -->

</nav><!-- #site-navigation -->
