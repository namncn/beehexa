<article class="post-item">

	<?php the_title( '<h1 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h1>' ); ?>

	<div class="post-meta">

		<span class="post-time"><i class="fa fa-clock-o"></i> <?php pdvn_time_link(); ?></span>

		<span class="post-author"><i class="fa fa-user-o"></i> <?php the_author(); ?></span>

		<?php echo pdvn_post_view_get(); ?>

	</div>

	<div class="post-content">

		<?php the_content(); ?>

	</div>

</article>
