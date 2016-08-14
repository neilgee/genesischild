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

add_action( 'wp_enqueue_scripts', 'gc_css', 999 );
/**
 * Checks the settings for the images and background colors for each image
 * If any of these value are set the appropriate CSS is output
 * Enqueued with a 999 priority as the main style sheet is at 998
 *
 * @since 1.0
 */
function gc_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	/* Our Customiser settings, stored as variables */
	$hero_bg_image                     = get_theme_mod( 'hero_bg');
	$gc_link_color                     = get_theme_mod( 'gc_link_color', gc_link_color_default() );
	$gc_link_hover_color               = get_theme_mod( 'gc_link_hover_color', gc_link_hover_color_default() );
	$gc_menu_color                     = get_theme_mod( 'gc_menu_color', gc_menu_color_default() );
	$gc_menu_hover_color               = get_theme_mod( 'gc_menu_hover_color', gc_menu_hover_color_default() );
	$gc_button_color                   = get_theme_mod( 'gc_button_color', gc_button_color_default() );
	$gc_button_hover_color             = get_theme_mod( 'gc_button_hover_color', gc_button_hover_color_default() );
	$gc_footer_link_color              = get_theme_mod( 'gc_footer_link_color', gc_footer_link_color_default() );
	$gc_footer_link_hover_color        = get_theme_mod( 'gc_footer_link_hover_color', gc_footer_link_hover_color_default() );
	$gc_footerwidgets_background_color = get_theme_mod( 'gc_footerwidgets_background_color', gc_footerwidgets_background_color_default() );


	//* Calculate Color Contrast
	function gc_color_contrast( $color ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

	}

	//* Calculate Color Brightness
	function gc_color_brightness( $color, $change ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#'.dechex( $red ).dechex( $green ).dechex( $blue );

	}

	/* Start off with •nuffink*/
	$css = '';


	$css .= ( !empty($hero_bg_image) ) ? sprintf('
	.herocontainer {
		background: url(%s) no-repeat center;
		background-size: cover;
	}
	', $hero_bg_image ) : '';

	$css .= ( gc_link_color_default() !== $gc_link_color ) ? sprintf( '
		a {
			color: %s;
		}
		', $gc_link_color ) : '';

	$css .= ( gc_link_hover_color_default() !== $gc_link_hover_color  ) ? sprintf( '
	 	a:hover,
	 	a:focus,
		.entry-title a:hover,
		.entry-title a:focus,
		.archive-pagination li a:hover,
		.archive-pagination li a:focus,
		.archive-pagination .active a {
			color: %s;
		}
		', $gc_link_hover_color ) : '';

	$css .= ( gc_menu_color_default() !== $gc_menu_color  ) ? sprintf( '
		.genesis-nav-menu a,
		.nav-primary .genesis-nav-menu .sub-menu a {
			color: %s;
		}
		', $gc_menu_color ) : '';

	$css .= ( gc_menu_hover_color_default() !== $gc_menu_hover_color ) ? sprintf( '
		.genesis-nav-menu a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.nav-primary .genesis-nav-menu .sub-menu a:hover,
		.nav-primary .genesis-nav-menu .sub-menu a:focus,
		.nav-primary .genesis-nav-menu .sub-menu .current-menu-item > a,
		.js nav button:focus,
		.js .menu-toggle:focus  {
			color: %s;
		}
		', $gc_menu_hover_color ) : '';

	$css .= ( gc_button_color_default() !== $gc_button_color ) ? sprintf( '
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.button,
		.widget .button,
		.enews-widget input[type="submit"],
  	.archive-pagination li a,
		a.more-link {
			background-color: %s;
			color: %s;
		}
		', $gc_button_color, gc_color_contrast( $gc_button_color ) ) : '';


	$css .= ( gc_button_hover_color_default() !== $gc_button_hover_color ) ? sprintf( '
		button:hover,
		button:focus,
		.button:hover,
		.button:focus,
		input[type="button"]:hover,
		input[type="button"]:focus,
		input[type="reset"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="reset"]:focus,
		input:hover[type="reset"],
		input:hover[type="submit"],
		input:focus[type="button"],
		input:focus[type="reset"],
		input:focus[type="submit"],
		.widget .button:hover,
		.widget .button:focus,
		.enews-widget input[type="submit"]:hover,
		.enews-widget input[type="submit"]:focus,
		.archive-pagination li a:hover,
		.archive-pagination li a:focus,
		.archive-pagination .active a,
		a.more-link:hover  {
			background-color: %s;
			color: %s;
		}
		', $gc_button_hover_color, gc_color_contrast( $gc_button_hover_color ) ) : '';



	$css .= ( gc_footer_link_color_default() !== $gc_footer_link_color ) ? sprintf( '
		.footer-widgets a {
			color: %s;
		}
		', $gc_footer_link_color ) : '';

	$css .= ( gc_footer_link_hover_color_default() !== $gc_footer_link_hover_color  ) ? sprintf( '
		.footer-widgets a:hover,
		.footer-widgets a:focus {
			color: %s;
		}
		', $gc_footer_link_hover_color ) : '';

		$css .= ( gc_footerwidgets_background_color_default() !== $gc_footerwidgets_background_color ) ? sprintf( '
			.footer-widgets {
				background-color: %s;
			}
			', $gc_footerwidgets_background_color ) : '';

		// WooCommerce
		if ( class_exists( 'WooCommerce' ) ) {

			$css .= ( gc_button_hover_color_default() !== $gc_button_hover_color ) ? sprintf( '
				.woocommerce #respond input#submit.alt:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce input.button.alt:hover  {
					background-color: %s;
					color: %s;
				}
				', $gc_button_hover_color, gc_color_contrast( $gc_button_hover_color ) ) : '';



			$css .= ( gc_button_color_default() !== $gc_button_color ) ? sprintf( '
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce span.onsale {
					background-color: %s;
					color: %s;
				}
				', $gc_button_color, gc_color_contrast( $gc_button_color ) ) : '';

			$css .= ( gc_menu_color_default() !== $gc_menu_color  ) ? sprintf( '
			.woocommerce-info {
					border-top-color: %s;
				}
				', $gc_menu_color ) : '';


			$css .= ( gc_menu_color_default() !== $gc_menu_color  ) ? sprintf( '
			.woocommerce-info:before {
				    color:%s;
				}
				', $gc_menu_color ) : '';



		}

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}
