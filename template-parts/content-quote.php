<?php
/**
 * Template part for quote post format
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
									
		<div class="imge-hover-iffect">
			
			<div class="tuumb-image-wraper">  
                
				<div class="view view-tenth">
				     <?php
						if (has_post_thumbnail()) {
						    echo the_post_thumbnail('index-thumb'); 
						}
					?>
					<div class="mask">
				         <a href="<?php echo get_permalink(); ?>" class="info" title="Read More...">
				         	<i class="fa fa-leanpub"></i>
				         </a>
				    </div>
				</div>
			</div>
		</div>
		<div class="tile-content">
			<div class="post-format">
				<i class="fa fa-quote-right"></i> Quote
			</div>
			<div class="category_list">
				<?php odri_categorie_list(); ?>
			</div>
			<!-- <h2 class="post-title"><a href="">
			Player Embedding on Vimeo
			</a></h2> -->
			<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">
				<?php odri_posted_on(); ?>
			</div><!-- .entry-meta -->
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
					<i class="fa fa-commenting"></i>
					<?php odri_entry_footer(); ?>
				</a>
			</div>
		</div>
	</div>
</article>