<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
									<section class="error-404 not-found">
										<header class="page-header">
											<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'odri' ); ?></h1>
										</header><!-- .page-header -->

										<div class="page-content">
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'odri' ); ?></p>

											<?php get_search_form(); ?>

											<div class="row">
												<div class="col-md-4">
													<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
												</div>
												<div class="col-md-4">
													<?php if ( odri_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
													<div class="widget widget_categories">
														<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'odri' ); ?></h2>
														<ul>
														<?php
															wp_list_categories( array(
																'orderby'    => 'count',
																'order'      => 'DESC',
																'show_count' => 1,
																'title_li'   => '',
																'number'     => 10,
															) );
														?>
														</ul>
													</div><!-- .widget -->
											<?php endif; ?>
												</div>
												<div class="col-md-4">
													<?php
														/* translators: %1$s: smiley */
														$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'odri' ), convert_smilies( ':)' ) ) . '</p>';
														the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
													?>
												</div>
											</div>
										</div><!-- .page-content -->
									</section><!-- .error-404 -->													
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