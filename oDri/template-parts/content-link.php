<?php
/**
 * Template part for link post format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package odri
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('active-masonry'); ?>>
	<div class="single_welcome_wid">
		
		
		<div class="tile-content link">
			<div class="post-format">
				<i class="fa fa-external-link"></i> Link
			</div>
			<div class="category_list">
				<?php odri_categorie_list(); ?>
			</div>
			
			<h2 class="post-title"><a href="<?php echo get_the_content(); ?>">
			<?php the_title(); ?>
			</a></h2>


			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">
				<?php odri_posted_on(); ?>
			</div><!-- .post-meta -->
			<?php endif; ?>

		</div>
									
</article>