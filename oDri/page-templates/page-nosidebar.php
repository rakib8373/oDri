<?php
/**
 * Template name: Page With No Sidebar
 */

get_header(); ?>

		<!-- Maincontent -->
		<section class="maincontent_area internal_page">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
					
					<div id="primary" class="content-area single-page-content">
						<main id="main" class="site-main" role="main">


						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // End of the loop. ?>

						
						</main><!-- #main -->
					</div><!-- #primary -->
		
						
						<div class="clear"></div>
						<?php odri_paging_nav(); ?>

					</div>

					
				</div>
			</div>
		</section>
		<!-- End -->

<?php get_footer(); ?>