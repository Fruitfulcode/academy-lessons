<?php
/**
 * MyFirstTheme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage MyFirstTheme
 * @since Twenty Fifteen 1.0
 */
 
if ( ! isset ( $content_width) )
	$content_width = 800;
 
if ( ! function_exists( 'myfirsttheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function myfirsttheme_setup() {
 
	/**
	 * Make theme available for translation.
	 * Translations can be placed in the /languages/ directory.
	 */
	load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
 
	/**
	 * Add default posts and comments RSS feed links to <head>.
	 */
	add_theme_support( 'automatic-feed-links' );
 
	/**
	 * Enable support for post thumbnails and featured images.
	 */
	add_theme_support( 'post-thumbnails' );
 
	/**
	 * Add support for two custom navigation menus.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
		'secondary' => __('Secondary Menu', 'myfirsttheme' )
	) );
 
	/**
	 * Enable support for the following post formats:
	 * aside, gallery, quote, image, and video
	 */
	add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'myfirsttheme_setup' );


function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');

	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );