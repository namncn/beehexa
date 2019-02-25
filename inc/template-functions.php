<?php
/**
 * [pdvn_content_class description]
 * @param  string $classes [description]
 * @return [type]          [description]
 */
function pdvn_content_class( $classes = '' ) {
	if ( $classes ) {
		$classes = explode( ' ' , $classes );

		if ( is_single() || is_page() || is_category() || is_tag() || is_tax() ) {
			if ( is_single() || is_page() ) {
				$layout_type = pdvn_get_acf_option( 'layout_type' );
			} elseif ( is_category() || is_tag() || is_tax() ) {
				$layout_type = pdvn_get_acf_option( 'layout_type', get_queried_object() );
			}

			if ( empty( $layout_type ) || 'none' !== $layout_type ) {
				$classes[] = 'col-lg-9';
			} else {
				$classes[] = 'col-12';
			}
		} else {
			$classes[] = 'col-lg-9';
		}

		echo join( ' ', $classes );
	}
}

/**
 * [pdvn_row_class description]
 * @param  string $classes [description]
 * @return [type]          [description]
 */
function pdvn_row_class( $classes = '' ) {
	if ( $classes ) {
		$classes = explode( ' ' , $classes );

		if ( is_single() || is_page() || is_category() || is_tag() || is_tax() ) {
			if ( is_single() || is_page() ) {
				$layout_type = pdvn_get_acf_option( 'layout_type' );
			} elseif ( is_category() || is_tag() || is_tax() ) {
				$layout_type = pdvn_get_acf_option( 'layout_type', get_queried_object() );
			}

			if ( 'left' == $layout_type ) {
				$classes[] = 'flex-lg-row-reverse';
			}
		}

		echo join( ' ', $classes );
	}
}

if ( ! function_exists( 'pdvn_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function pdvn_posted_on() {

		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__( 'đăng bởi %s', 'pd-theme' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . pdvn_time_link() . '</span><span class="byline"> <i class="fa fa-user-circle-o pr-1" aria-hidden="true"></i>' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;


if ( ! function_exists( 'pdvn_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function pdvn_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		echo $time_string;
	}
endif;


if ( ! function_exists( 'pdvn_post_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pdvn_post_meta() {

		/* translators: used between list items, there is a space after the comma */
		$separate_meta = __( ', ', 'pd-theme' );

		// Get Categories for posts.
		$categories_list = get_the_category_list( $separate_meta );

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', $separate_meta );

		// We don't want to output .post-meta if it will be empty, so make sure its not.
		if ( ( ( pdvn_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<div class="post-meta">';

			// if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && pdvn_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ( $categories_list && pdvn_categorized_blog() ) {
						echo '<span class="cat-links"><span class="screen-reader-text">' . esc_html__( 'Categories', 'pd-theme' ) . '</span>' . $categories_list . '</span>';// WPCS: XSS OK.
					}

					if ( $tags_list ) {
						echo '<span class="tags-links"><span class="screen-reader-text">' . esc_html__( 'Tags', 'pd-theme' ) . '</span>' . $tags_list . '</span>';// WPCS: XSS OK.
					}

					echo '</span>';
				}
			// }

			pdvn_edit_link();

			echo '</div>';
		}
	}
endif;


if ( ! function_exists( 'pdvn_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function pdvn_edit_link() {

		$link = edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'pd-theme' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

		return $link;
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pdvn_categorized_blog() {
	$category_count = get_transient( 'pdvn_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'pdvn_categories', $category_count );
	}

	return $category_count > 1;
}

/**
 * Output a comment in the HTML5 format.
 *
 * @param object $comment Comment to display.
 * @param array  $args    An array of arguments.
 * @param int    $depth   Depth of comment.
 */
function pdvn_html5_comment( $comment, $args, $depth ) {
	global $post;
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>

	<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'pdvn__comment_item' ); ?>>

	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<?php if ( 0 != $args['avatar_size'] ) : ?>
			<div class="pdvn-comment__left">
				<div class="pdvn-comment__thumb"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
			</div><!-- .pdvn-comments__left -->
		<?php endif ?>

		<div class="pdvn-comment__body">
			<?php if ( $comment->user_id === $post->post_author ) : ?>
				<span class="author-label"><?php esc_html_e( 'Tác giả', 'pd-theme' ); ?></span>
			<?php endif; ?>
			<div class="pdvn-comment__action">
				<?php comment_reply_link( array_merge( $args, array(
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'add_below' => 'div-comment',
				) ) ); ?>

				<?php edit_comment_link( esc_html__( 'Chỉnh sửa', 'pd-theme' ) ); ?>
			</div>

			<div class="comment-metadata pdvn-comments__meta">
				<span class="comment-author pdvn-comment__name h6">
					<?php echo get_comment_author_link(); ?>
				</span><!-- .comment-author -->

				<span class="pdvn-comment__time">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( esc_html__( '%1$s lúc %2$s', 'pd-theme' ), get_comment_date( '', $comment ), get_comment_time() ); ?>
						</time>
					</a>
				</span>

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Bình luận của bạn đang đợi duyệt.', 'pd-theme' ); ?></p>
				<?php endif; ?>
			</div><!-- .comment-metadata -->

			<div class="pdvn-comment__content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</div>

	</article><!-- .comment-body --><?php
	// Note: No close tag is here.
}

/**
 * [pdvn_post_view_get description]
 * @param  [type]  $post_id    [description]
 * @param  boolean $is_single [description]
 * @return [type]             [description]
 */
function pdvn_post_view_get( $post_id = 0, $is_single = true ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$count_key = 'post_view_number';
	$count     = get_post_meta( $post_id, $count_key, true );

	if ( ! $count ) {
		$count = '0';
	}

	if ( ! $is_single ) {
		return '<span class="post-view"><i class="fa fa-eye"></i> ' . $count . '</span>';
	}

	$nonce = wp_create_nonce( 'pdvn_count_post' );

	if ( '0' == $count ) {
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
		return '<span class="post-view" data-id="' . $post_id . '" data-nonce="' . $nonce . '"><i class="fa fa-eye"></i> 0</span>';
	}

	return '<span class="post-view" data-id="' . $post_id . '" data-nonce="' . $nonce . '"><i class="fa fa-eye"></i> ' . $count . '</span>';
}

/**
 * [pdvn_post_view_set description]
 * @param  [type] $post_id [description]
 * @return [type]         [description]
 */
function pdvn_post_view_set( $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$count_key = 'post_view_number';
	$count     = get_post_meta( $post_id, $count_key, true );
	if ( '0' == $count || empty( $count ) || ! isset( $count ) ) {
		add_post_meta( $post_id, $count_key, 1 );
		update_post_meta( $post_id, $count_key, 1 );
	} else {
		$count++;
		update_post_meta( $post_id, $count_key, $count );
	}
}

/**
 * Displays the pagination for the posts overview page (and search and archive)
 */
function pdvn_posts_pagination() {
	global $wp_query;
	$big = 999999999; // This needs to be an unlikely integer.
	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links.
	$paginate_links = paginate_links( array(
		'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'mid_size'  => 5,
		'prev_next' => true,
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'type'      => 'list',
	) );

	$paginate_links = str_replace( '<ul class=\'page-numbers\'>', '<ul class=\'pagination justify-content-center \'>', $paginate_links );
	$paginate_links = str_replace( '<li>', '<li class=\'page-item\'>', $paginate_links );
	$paginate_links = str_replace( '<li class=\'page-item\'><span aria-current=\'page\' class=\'page-numbers current\'>', '<li class=\'page-item active\'><a class=\'page-link\' href=\'#\'>', $paginate_links );
	$paginate_links = str_replace( '<a', '<a class=\'page-link\' ', $paginate_links );
	$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
	$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );

	// Display the pagination if more than one page is found.
	if ( $paginate_links ) {
		echo '<div class="col-12">' . $paginate_links . '</div>';
	}
}

/**
 * Breadcrumb.
 */
function pdvn_breadcrumb() {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<nav class="breadcrumbs">', '</nav>' );
	}
}

/**
 * Register custom fonts.
 */
function pdvn_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'phoenixdigi' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Dosis|Montserrat:300,400,500,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,vietnamese' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Primary menu fallback function.
 */
function pdvn_primary_menu_fallback() {
	$classes = pdvn_get_option( 'enable_header_search' ) ? 'primary-menu-container visible-lg col-lg-9' : 'primary-menu-container visible-lg col-lg-12';

	$fallback_menu = '<div class="' . $classes . '"><ul id="primary-menu" class="menu clearfix"><li><a href="%1$s" rel="home">%2$s</a></li></ul></div>';
	printf( $fallback_menu, esc_url( home_url( '/' ) ), esc_html__( 'Trang chủ', 'phoenixdigi' ) ); // WPCS: XSS OK.
}

/**
 * Mobile menu fallback function.
 */
function pdvn_mobile_menu_fallback() {
	$fallback_menu = '<ul id="mobile-menu" class="mobile-menu"><li><a href="%1$s" rel="home">%2$s</a></li></ul>';
	printf( $fallback_menu, esc_url( home_url( '/' ) ), esc_html__( 'Trang chủ', 'phoenixdigi' ) ); // WPCS: XSS OK.
}

/**
 * [pdvn_customizer_preview_class description]
 * @param  string $section [description]
 * @return [type]          [description]
 */
function pdvn_customizer_preview_class( $section = '' ) {
	$class = '';
	if ( is_customize_preview() ) {
		$class = 'customizable customize-section-' . $section;
	}

	return $class;
}
