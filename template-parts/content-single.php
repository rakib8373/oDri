<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package odri
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-content'); ?>>
	<?php
		if (has_post_thumbnail()) { 
			echo '<div class="featured-image">';
			echo '<div class="featured-image-wraper">';
			echo the_post_thumbnail('single-thumb');
			echo '</div>';
			echo '</div>';
		 }
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php odri_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'odri' ),
				'after'  => '</div>',
			) );
		?>
		
		

	</div><!-- .entry-content -->
	<div class="post-tag-area">
		<?php
	    	echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
		?>
	</div>
	
</article><!-- #post-## -->

