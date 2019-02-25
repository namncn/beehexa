<article class="post-item">

	<?php if ( has_post_thumbnail() ) : ?>

		<a href="<?php the_permalink(); ?>" class="post-thumbnail d-block">

			<?php the_post_thumbnail( 'full' ); ?>

		</a>

	<?php endif; ?>

	<?php the_title( '<h3 class="post-title"><a href="' . get_the_permalink() . '">', '</a></h3>' ); ?>

	<div class="post-meta">

		<span class="post-time"><i class="fa fa-clock-o"></i> <?php pdvn_time_link(); ?></span>

		<span class="post-author"><i class="fa fa-user-o"></i> <?php the_author(); ?></span>

		<?php echo pdvn_post_view_get( 0, false ); ?>

	</div>

	<div class="post-excerpt">

		<?php the_excerpt(); ?>

	</div>

</article>
