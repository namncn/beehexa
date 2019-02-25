<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
