<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package odri
 */

if ( ! function_exists( 'odri_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function odri_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		//esc_html_x( 'Posted on %s', 'post date', 'odri' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">  <i class="fa fa-clock-o"></i>' . $time_string . '</a>'
	);

	$byline = sprintf(
		//esc_html_x( 'by %s', 'post author', 'odri' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> <i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>&nbsp; | &nbsp;<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	echo "";

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( '<i class="fa fa-pencil-square-o"></i>&nbsp; Edit %s', 'odri' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'&nbsp; | &nbsp; <span class="edit-link">',
		'</span>'
	);

}
endif;

if ( ! function_exists( 'odri_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function odri_entry_footer() {
	

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( '<i class="fa fa-commenting"></i> Leave a comment', 'odri' ), esc_html__( '1 Comment', 'odri' ), esc_html__( '% Comments', 'odri' ) );
		echo '</span>';
	}

	
}
endif;

if ( ! function_exists('odri_categorie_list')) :
	function odri_categorie_list(){
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'odri' ) );
			if ( $categories_list && odri_categorized_blog() ) {
				printf( '<span class="cat-links">' . __( '<i class="fa fa-folder-open"></i>
 %1$s', 'odri' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

		}
	};
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function odri_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'odri_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'odri_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so odri_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so odri_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in odri_categorized_blog.
 */
function odri_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'odri_categories' );
}
add_action( 'edit_category', 'odri_category_transient_flusher' );
add_action( 'save_post',     'odri_category_transient_flusher' );


if ( ! function_exists( 'odri_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */


function odri_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'odri' ),
		'next_text' => __( 'Next &rarr;', 'odri' ),
        'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'odri' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}


endif;


if ( ! function_exists( 'odri_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function odri_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>

	<nav class="navigation post-navigation" role="navigation">
	    <div class="post-nav-box clear">
	        <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'odri' ); ?></h1>
	        <div class="nav-links">
	            <?php
	            previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'odri' ) . '</div><h1>%link</h1></div>', '%title' );
	            next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', 'odri' ) . '</div><h1>%link</h1></div>', '%title' );
	            ?>
	        </div><!-- .nav-links -->
	    </div><!-- .post-nav-box -->
	</nav><!-- .navigation -->

	<?php
}
endif;

function odri_social_menu() {
    if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id'    => 'social_area',
			'container_class' => 'social_area',
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'menu-items',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);
    }
}