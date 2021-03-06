<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package KDWolski
 * @since KDWolski 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since KDWolski 1.0
 */
function KDWolski_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'KDWolski_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since KDWolski 1.0
 */
function KDWolski_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'KDWolski_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since KDWolski 1.0
 */
function KDWolski_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'KDWolski_enhanced_image_navigation', 10, 2 );

/**
 * KDWolski Customizations
 */

/**
 * RESPONSIVE IMAGE FUNCTIONS
 * @author  David Smith <http://www.netmagazine.com/tutorials/getting-wordpress-play-nice-responsive-images>
 */
 
add_filter( 'post_thumbnail_html', 'KDWolski_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'KDWolski_remove_thumbnail_dimensions', 10 );
 
function KDWolski_remove_thumbnail_dimensions( $html ) {
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
        return $html;
}


