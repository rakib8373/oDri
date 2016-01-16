<?php
/**
 * The footer sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package odri
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<footer class="footer_top_area">
	<div class="container">
			<div class="row">
				<div class="sidebar-footer">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
	</div>
</div>