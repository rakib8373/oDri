<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package odri
 */


get_header(); ?>

		<!-- Maincontent -->
		<section class="maincontent_area internal_page">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog_content">
							<div id="fullwidth_blog">
					
								<div id="primary" class="content-area">
									

									<?php if ( have_posts() ) : ?>

										<header class="archive_header">
											<h1 class="page-title">
												
<?php
if ( is_category() ) :
    printf( __( 'Posts in the ', 'odri' ) );
    echo '<em>';
    single_cat_title();
    echo '</em> ' . __('category', 'odri') . ':';

elseif ( is_tag() ) :
    printf( __( 'Posts with the ', 'odri' ) );
    echo '<em>';
    single_tag_title();
    echo '</em> ' . __('tag', 'odri') . ':';

elseif ( is_author() ) :
    printf( __( 'Author: %s', 'odri' ), '<span class="vcard">' . get_the_author() . '</span>' );

elseif ( is_day() ) :
    printf( __( 'Posts from %s', 'odri' ), '<span>' . get_the_date() . '</span>' );

elseif ( is_month() ) :
    printf( __( 'Posts from %s', 'odri' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'odri' ) ) . '</span>' );

elseif ( is_year() ) :
    printf( __( 'Posts from %s', 'odri' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'odri' ) ) . '</span>' );

elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
    _e( 'Asides', 'odri' );

else :
    _e( 'Archives', 'odri' );

endif;
?>
                
											</h1>
										</header><!-- .page-header -->
									<main id="main" class="site-main row" role="main">
										<?php /* Start the Loop */ ?>
										<?php while ( have_posts() ) : the_post(); ?>

											<?php

												/*
												 * Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'template-parts/content', get_post_format() );
											?>

										<?php endwhile; ?>

										

									<?php else : ?>

										<?php get_template_part( 'template-parts/content', 'none' ); ?>

									<?php endif; ?>

									</main><!-- #main -->
								</div><!-- #primary -->
		
							</div>
						</div>
						
						<div class="clear"></div>
						<?php odri_paging_nav(); ?>

					</div>

					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
		<!-- End -->

<?php get_footer(); ?>