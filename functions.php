<?php
/**
 * KDWolski functions and definitions
 *
 * @package KDWolski
 * @since KDWolski 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since KDWolski 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'KDWolski_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since KDWolski 1.0
 */
function KDWolski_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on KDWolski, use a find and replace
	 * to change 'KDWolski' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'KDWolski', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'KDWolski-featured-small', 220, 180, true ); //(cropped)
	add_image_size( 'KDWolski-featured', 320, 9999, false ); 
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'KDWolski' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // KDWolski_setup
add_action( 'after_setup_theme', 'KDWolski_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since KDWolski 1.0
 */
function KDWolski_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'KDWolski' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'KDWolski_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function KDWolski_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//content-sidebar containing theme mods
	wp_register_style( 'content-sidebar', get_stylesheet_directory_uri() . '/layouts/content-sidebar.css' );
	wp_enqueue_style( 'content-sidebar' );

	wp_register_style( 'google-font', 'http://fonts.googleapis.com/css?family=Lustria' );
	wp_enqueue_style( 'google-font' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'responsive-images', get_template_directory_uri() . '/js/responsive-images.js', array( 'jquery' ), '20120424' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'KDWolski_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

