<?php
/**
 * GenesisChild Inline CSS
 *
 * This file adds the required CSS to the front end of GenesisChild theme.
 *
 * @package genesischild
 * @author  @_neilgee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com
 */

add_action( 'wp_enqueue_scripts', 'genesischild_css' );
/**
 * Checks the settings for the images and background colors for each image
 * If any of these value are set the appropriate CSS is output
 *
 * @since 1.0
 */
function genesischild_css() {
	wp_enqueue_style( 'genesischild', get_stylesheet_directory_uri() . '/style.css' );

	$handle = 'genesischild';

	$css = '';

	$hero_bg_image = get_theme_mod( 'hero_bg' ); // Assigning it to a variable to keep the markup clean.

	$css = ( $hero_bg_image !== '') ? sprintf('
	.herocontainer {
		background: url(%s) no-repeat center;
		background-size: cover;
	}
	', $hero_bg_image ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle  , $css );
	}
}
