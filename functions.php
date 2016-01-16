<?php
/**
 * odri functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package odri
 */

if ( ! function_exists( 'odri_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function odri_setup() {
	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:400,500';
	add_editor_style( array( 'css/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
	                
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on odri, use a find and replace
	 * to change 'odri' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'odri', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('index-thumb', 266, 165, true);
	add_image_size('single-thumb', 760, 200, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'odri' ),
		'social' => esc_html__( 'Social Menu', 'odri' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside', 
		'image', 
		'video', 
		'quote', 
		'link', 
		'gallery', 
		'status', 
		'audio', 
		'chat'
	) );

	
}
endif; // odri_setup
add_action( 'after_setup_theme', 'odri_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $/
 */
function odri_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'odri_content_width', 600 );
}
add_action( 'after_setup_theme', 'odri_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function odri_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'odri' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'odri' ),
		'id'            => 'sidebar-2',
		'description'   => 'Footer widgets area appears in the footer ',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'odri_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function odri_scripts() {

	/*Bootstrap*/
	wp_enqueue_style( 'odri-bootstrap' , get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'odri-bootstrap-theme' , get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	
	wp_enqueue_style( 'odri-style', get_stylesheet_uri() );

	/*Google Fonts*/

	wp_enqueue_style( 'odri-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:400,500' );


	/*FontAwesome*/
	wp_enqueue_style( 'odri-FontAwesome' , get_template_directory_uri() . '/css/font-awesome.min.css');

	/*Responsive Menu*/
	wp_enqueue_style( 'odri-responsive-css' , get_template_directory_uri() . '/css/responsive.css');





	wp_enqueue_script( 'jquery.js', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array(), '20120206', true );

	wp_enqueue_script( 'odri-modernizr-min.js', get_template_directory_uri() . '/js/modernizr-min.js', array(), '20120206', true );

	wp_enqueue_script( 'customizer.js', get_template_directory_uri() . '/js/customizer.js', array(), '20120206', true );
	
	wp_enqueue_script( 'odri-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140401', true );

	wp_enqueue_script( 'fitVid', get_template_directory_uri() . '/js/jquery.fitvids.js', array(), '20140401', true );

	wp_enqueue_script( 'odri-bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true );

	wp_enqueue_script( 'odri-superfish.js', get_template_directory_uri() . '/js/superfish.js', array(), '20120206', true );


	wp_enqueue_script( 'odri-main.js', get_template_directory_uri() . '/js/main.js', array(), '20120206', true );

	wp_enqueue_script( 'odri-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'odri_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load bootstrap nav walker.
 */
require_once('wp_bootstrap_navwalker.php');


