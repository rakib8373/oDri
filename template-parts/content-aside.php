<?php
/**
 * Template part for displaying aside posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package odri
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('active-masonry'); ?>>
	<div class="single_welcome_wid">

		<?php
		if (is_sticky()) {
			echo '<div style="border-left-color:#cc0000; border-right-color:#cc0000; border-top-color:#cc0000;" 		class="sticky-bookmark">
								<i class="fa fa-star sticky-star"></i>
				</div>';
		}
		?>
		<div class="tile-content">
			<div class="post-format">
				<i class="fa fa-dot-circle-o"></i> Aside
			</div>
			<div class="category_list">
				<?php odri_categorie_list(); ?>
			</div>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta aside_post_meta">
				<?php odri_posted_on(); ?>
			</div><!-- .post-meta -->
			<?php endif; ?>

		</div>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		<hr/>
		<div class="post-footer-content">
			<div class="col-md-6 col-sm-6 read-more-area">
				<?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'odri') . get_the_title() . '" rel="bookmark"><i class="fa fa-leanpub"></i>
					Read more...</a>'; ?>
			</div>
			<div class="col-md-6 col-sm-6 comment-area">
				<a href="">
					
					<?php odri_entry_footer(); ?>
				</a>
			</div>
		</div>			
	</div>
</article>