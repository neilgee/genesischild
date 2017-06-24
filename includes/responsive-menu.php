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

add_action( 'wp_enqueue_scripts', 'gc_responsive_menu' );
 /**
  * Responsive Menu Scripts and Styles Enqueued
  */
  function gc_responsive_menu() {
  	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
  	wp_enqueue_script( 'genesischild-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
  	wp_localize_script(
  		'genesischild-responsive-menu',
  		'genesis_responsive_menu',
  		genesischild_responsive_menu_settings()
  	);
        wp_enqueue_style( 'genesischildcss' , get_stylesheet_directory_uri() . '/css/responsive-menu.css', array(), '2.4.2', 'all' );

  }
  // Define our responsive menu settings.
  function genesischild_responsive_menu_settings() {
  	$settings = array(
  		'mainMenu'         => __( 'Menu', 'genesischild' ),
  		'menuIconClass'    => 'dashicons-before dashicons-menu',
  		'subMenu'          => __( 'Submenu', 'genesischild' ),
  		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
  		'menuClasses'      => array(
  			'combine' => array(
  				'.nav-primary',
  				'.nav-header',
                                '.nav-secondary',
  			),
  			'others'  => array(),
  		),
  	);
  	return $settings;
 }
