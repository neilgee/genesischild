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

	/* Our Customiser settings, stored as variables */
	$hero_bg_image = get_theme_mod( 'hero_bg' );
	$gc_link_color = get_theme_mod( 'gc_link_color' );
	$gc_link_hover_color = get_theme_mod( 'gc_link_hover_color' );
	$gc_menu_color = get_theme_mod( 'gc_menu_color' );
	$gc_menu_hover_color = get_theme_mod( 'gc_menu_hover_color' );
	$gc_button_color = get_theme_mod( 'gc_button_color' );
	$gc_button_hover_color = get_theme_mod( 'gc_button_hover_color' );

	//* Calculate Color Contrast
	function genesis_sample_color_contrast( $color ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

	}

	//* Calculate Color Brightness
	function genesis_sample_color_brightness( $color, $change ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#'.dechex( $red ).dechex( $green ).dechex( $blue );

	}

	//* Change Color Brightness
	function genesis_sample_change_brightness( $color ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? genesis_sample_color_brightness( '#333333', 20 ) : genesis_sample_color_brightness( '#ffffff', -50 );

	}
	/* Start off with •nuffink*/
	$css = '';


	$css = ( $hero_bg_image !== '') ? sprintf('
	.herocontainer {
		background: url(%s) no-repeat center;
		background-size: cover;
	}
	', $hero_bg_image ) : '';

	$css .= ( $gc_link_color !== '#c3251d' ) ? sprintf( '
		a {
			color: %1$s;
		}
		', $gc_link_color ) : '';

	$css .= ( $gc_link_hover_color !== '#c3251d' ) ? sprintf( '
	 	a:hover,
	 	a:focus,
		.entry-title a:hover,
		.entry-title a:focus,
		.site-footer a:hover,
		.site-footer a:focus,
		.archive-pagination li a:hover,
		.archive-pagination li a:focus,
		.archive-pagination .active a {
			color: %1$s;
		}
		', $gc_link_hover_color ) : '';

	$css .= ( $gc_menu_color !== '#333333' ) ? sprintf( '
		.genesis-nav-menu a {
			color: %1$s;
		}
		', $gc_menu_color ) : '';

	$css .= ( $gc_menu_hover_color !== '#c3251d' ) ? sprintf( '
		.genesis-nav-menu a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.js nav button:focus,
		.js .menu-toggle:focus  {
			color: %1$s;
		}
		', $gc_menu_hover_color ) : '';

	$css .= ( $gc_button_color !== '#333333' ) ? sprintf( '
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.button,
		.widget .button,
		.enews-widget input[type="submit"]  {
			background-color: %1$s;
			color: %2$s;
		}
		', $gc_button_color, genesis_sample_color_contrast( $gc_button_color ), genesis_sample_change_brightness( $gc_button_color ) ) : '';


	$css .= ( $gc_button_hover_color !== '#c3251d' ) ? sprintf( '
		button:hover,
		button:focus,
		input[type="button"]:hover,
		input[type="button"]:focus,
		input[type="reset"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="reset"]:focus,
		.button:hover,
		.button:focus,
		.widget .button:hover,
		.widget .button:focus,
		.enews-widget input[type="submit"]:hover,
		.enews-widget input[type="submit"]:focus  {
			background-color: %1$s;
			color: %2$s;
		}
		', $gc_button_hover_color, genesis_sample_color_contrast( $gc_button_hover_color ), genesis_sample_change_brightness( $gc_button_hover_color ) ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}
