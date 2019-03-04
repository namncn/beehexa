<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 2.0.0
 * @version 2.0.0
 */

get_header(); ?>

	<div class="container">

		<div class="row">

			<div id="primary" class="content-area col-12">

				<main id="main" class="site-main" role="main">

					<?php the_content(); ?>

				</main>

			</div>

		</div><!-- .row -->

	</div><!-- .container -->

<?php
get_footer();
