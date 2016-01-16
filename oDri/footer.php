<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package odri
 */

?>
		<a href="#" class="scrollup">Scroll</a>
		<!-- Footer -->
			<?php get_sidebar('footer'); ?>
		<!-- End -->

		<!-- Copyright Text -->
		<div class="footer_bottom_area">
			<div class="container">
				<div class="row">
					<div class="bottom-footer-content-wraper">
						<div class="col-md-6">
							<div class="copyright_text">
								<p>Proudly powered by <a href="http://wordpress.org">WordPress</a> | Theme: odri by <a href="http://mrakib.me">Rakib</a> </p>
							</div>
						</div>

						<div class="col-md-6">
						<?php odri_social_menu(); ?>
				</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End -->



<?php wp_footer(); ?>
		
	</body>
</html>