<?php
/**
 * GenesisChild Responsive Menu
 *
 * This file adds the Genesis default responsive menu to this starter theme.
 *
 * @package genesischild
 * @author  @_neilgee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com
 */


 /**
  * Responsive Menu Scripts and Styles Enqueued
  */
 function genesischild_responsive_menu() {
 	wp_enqueue_script( 'genesischild-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
 	$output = array(
 		'mainMenu' => __( 'Menu', 'genesischild' ),
 		'subMenu'  => __( 'Menu', 'genesischild' ),
 	);
 	wp_localize_script( 'genesischild-responsive-menu', 'genesisSampleL10n', $output );
 	wp_enqueue_style( 'genesischildcss' , get_stylesheet_directory_uri() . '/css/responsive-menu.css', array(), '2.4.2', 'all' );


 }
 add_action( 'wp_enqueue_scripts', 'genesischild_responsive_menu');
