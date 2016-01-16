<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package odri
 */

get_header(); ?>

		<!-- Maincontent -->
		<section class="maincontent_area internal_page">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog_content single-page">
							<div id="fullwidth_blog">
					
								<div id="primary" class="content-area">
									<main id="" class="" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			
			<div class="single-page-navigation">
				<?php odri_post_nav(); ?>
			</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>
									

									</main><!-- #main -->
								</div><!-- #primary -->
		
							</div>
						</div>
						

					</div>

					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
		<!-- End -->

<?php get_footer(); ?>