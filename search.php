<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
											<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'odri' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
										</header><!-- .page-header -->
									<main id="" class="" role="main">
										<?php /* Start the Loop */ ?>
										<?php while ( have_posts() ) : the_post(); ?>

											<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format(), 'search');
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