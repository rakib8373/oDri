<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package odri
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


    <?php wp_head(); ?>
	</head>
	<body  <?php body_class(); ?>>

		<!-- Header -->
		<header id="header" class="header_area">
			

   <div class="" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-align-justify"></i>
            </button>

    <?php if ( get_header_image() && ('blank' == get_header_textcolor() ) ) : ?>
        <div class="header_logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
            </a>
        </div>
    <?php endif; ?>

    
           
			<div class="logo">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span class="logo_border"></span>
			</div>
        </div>
        <div class="collapse navbar-collapse">
           
		 
            
        
        <div class="menu_content_alignment">
              <?php wp_nav_menu( array(
                'menu' => 'primary',
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => 'div',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker()
                ) 
            ); ?>
            
            <div class="search-toggle">
                <i class="fa fa-search"></i>
                <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'odri' ); ?></a>
            </div>
        </div>
         
            
            
        </div><!--/.nav-collapse -->

        

    </div>
            
    </div>

		</header>
		<!-- End -->

        <div class="drop_search_wraper">
            <div class="container">
                 <div id="search-container" class="search-box-wrapper clear">
                    <div class="search-box clear">
                        <?php get_search_form(); ?>
                    </div>
                </div> 
            </div>
        </div>