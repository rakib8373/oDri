<?php
/**
 * Template part for displaying posts.
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

		
			
		<?php if (has_post_thumbnail()) : ?>
		
			<div class="imge-hover-iffect">
				<div class="tuumb-image-wraper">      
					<div class="view view-tenth">
							<?php 	echo the_post_thumbnail('index-thumb'); ?>
						<div class="mask">
							 <a href="<?php echo get_permalink(); ?>" class="info" title="Read More...">
								<i class="fa fa-leanpub"></i>
							 </a>
						</div>
					</div>
				</div> 
			</div>

		<?php endif; ?>
			<div class="tile-content">
				<div class="category_list">
					<?php odri_categorie_list(); ?>
				</div>

				<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="post-meta">
					<?php odri_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>

			</div>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			
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