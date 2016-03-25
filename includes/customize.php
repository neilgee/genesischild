<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package genesischild
 */

add_action( 'customize_register', 'genesischild_register_theme_customizer' );
/**
 * Register for the Customizer
 */
function genesischild_register_theme_customizer( $wp_customize ) {

	// Customize Background Settings
	// Change heading.
	$wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'genesischild' );
	// Move background image to background styles.
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	// Create custom panel.
	$wp_customize->add_panel( 'featured_images', array(
		'priority'       => 70,
		'theme_supports' => '',
		'title'          => __( 'Featured Images', 'genesischild' ),
		'description'    => __( 'Set background images for certain widgets.', 'genesischild' ),
	) );

	// Add Featured Image for Hero Widget
	// Add section.
	$wp_customize->add_section( 'hero_background' , array(
		'title'      => __( 'Hero Background','genesischild' ),
		'panel'      => 'featured_images',
		'priority'   => 20,
	) );

	// Add setting.
	$wp_customize->add_setting( 'hero_bg', array(
		'default'     => get_stylesheet_directory_uri() . '/images/hero-bg.jpg',
	) );

	// Add control.
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'hero_background_image', array(
			  'label'      => __( 'Add Hero Background Here, the width should be approx 1400px', 'genesischild' ),
			  'section'    => 'hero_background',
			  'settings'   => 'hero_bg',
			  )
	) );
}
