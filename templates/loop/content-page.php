<article class="post-item">

	<?php if ( has_post_thumbnail() ) : ?>

		<a href="<?php the_permalink(); ?>" class="post-thumbnail d-block">

			<?php the_post_thumbnail( 'full' ); ?>

		</a>

	<?php endif; ?>

	<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

	<div class="post-content">

		<?php the_content(); ?>

	</div>

</article>
