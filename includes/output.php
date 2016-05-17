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

add_action( 'wp_enqueue_scripts', 'genesischild_css', 999 );
/**
 * Checks the settings for the images and background colors for each image
 * If any of these value are set the appropriate CSS is output
 * Enqueued with a 999 priority as the main style sheet is at 998
 *
 * @since 1.0
 */
function genesischild_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
	$css = '';

	$hero_bg_image = get_theme_mod( 'hero_bg' ); // Assigning it to a variable to keep the markup clean.
	$gc_primary_color = get_theme_mod( 'gc_primary_color' );

	$css = ( $hero_bg_image !== '') ? sprintf('
	.herocontainer {
		background: url(%s) no-repeat center;
		background-size: cover;
	}
	', $hero_bg_image ) : '';

	$css .= ( $gc_primary_color !== '#e5554e' ) ? sprintf( '
		a,
		.entry-title a:hover,
		.entry-title a:focus,
		.site-footer a:hover,
		.site-footer a:focus {
			color: %1$s;
		}

		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.archive-pagination li a:hover,
		.archive-pagination li a:focus,
		.archive-pagination .active a,
		.button,
		.widget .button,
		.enews-widget input[type="submit"]  {
			background-color: %1$s;
			border-color: %1$s;
		}

		.genesis-nav-menu a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus {
			color: %1$s;
		}


		', $gc_primary_color ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle  , $css );
	}
}
