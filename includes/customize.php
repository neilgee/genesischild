<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package genesischild
 */
 /**
  * Set Up Default Colors - so if not changed in Customizer no CSS mark up is output
  */
 function  gc_link_color_default() {
 	return '#c3251d';
 }

 function  gc_link_hover_color_default() {
 	return '#c3251d';
 }

 function  gc_menu_color_default() {
	 return '#333333';
 }

 function  gc_menu_hover_color_default() {
 	return '#c3251d';
 }

 function  gc_button_color_default() {
	return '#333333';
 }

 function  gc_button_hover_color_default() {
	 return '#c3251d';
 }

 function  gc_footer_link_color_default() {
 	return '#999999';
 }

 function  gc_footer_link_hover_color_default() {
 	return '#ffffff';
 }

 function  gc_footerwidgets_background_color_default() {
   return '#333';
 }

add_action( 'customize_register', 'gc_register_theme_customizer', 20 );
/**
 * Register for the Customizer
 */
function gc_register_theme_customizer( $wp_customize ) {
	// Change label for logo text color
	 $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'genesischild');

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
			//'default'     => get_stylesheet_directory_uri() . '/images/hero-bg.jpg',
	) );

	// Add control.
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'hero_background_image', array(
			'label'      => __( 'Add Hero Background Here, the width should be approx 1400px', 'genesischild' ),
			'section'    => 'hero_background',
			'settings'   => 'hero_bg',
			)
	) );

	// Add Link Color
	// Add setting.
	$wp_customize->add_setting( 'gc_link_color', array(
			'default'           => gc_link_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_link_color', array(
        		'label'      => __( 'Link Color', 'genesischild' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'gc_link_color' //pick the setting it applies to
        		)
        ) );

	// Add link hover - focus color
	// Add setting.
	$wp_customize->add_setting( 'gc_link_hover_color', array(
			'default'           => gc_link_hover_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
	 $wp_customize, 'gc_link_hover_color', array(
			'label'      => __( 'Link Hover Color', 'genesischild' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'gc_link_hover_color' //pick the setting it applies to
			)
	) );

	// Add Link Color
	// Add setting.
	$wp_customize->add_setting( 'gc_menu_color', array(
			'default'           => gc_menu_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_menu_color', array(
        		'label'      => __( 'Menu Color', 'genesischild' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'gc_menu_color' //pick the setting it applies to
        		)
        ) );

	// Add link hover - focus  color
	// Add setting.
	$wp_customize->add_setting( 'gc_menu_hover_color', array(
		'default'           => gc_menu_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gc_menu_hover_color', array(
			'label'      => __( 'Menu Hover Color', 'genesischild' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'gc_menu_hover_color' //pick the setting it applies to
			)
	) );

	// Add buttons background color
	// Add setting.
	$wp_customize->add_setting( 'gc_button_color', array(
			'default' => gc_button_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_button_color', array(
        		'label'      => __( 'Button Color', 'genesischild' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'gc_button_color' //pick the setting it applies to
        		)
        ) );

	// Add buttons hover - focus background color
	// Add setting.
	$wp_customize->add_setting( 'gc_button_hover_color', array(
		'default' => gc_button_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_button_hover_color', array(
        		'label'      => __( 'Button Hover Color', 'genesischild' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'gc_button_hover_color' //pick the setting it applies to
        		)
        ) );

	// Add Footer Link Color
	// Add setting.
	$wp_customize->add_setting( 'gc_footer_link_color', array(
			'default'           => gc_footer_link_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_footer_link_color', array(
        		'label'      => __( 'Footer Widgets Link Color', 'genesischild' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'gc_footer_link_color' //pick the setting it applies to
        		)
        ) );

	// Add Footer link hover - focus color
	// Add setting.
	$wp_customize->add_setting( 'gc_footer_link_hover_color', array(
			'default'           => gc_footer_link_hover_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
	 $wp_customize, 'gc_footer_link_hover_color', array(
			'label'      => __( 'Footer Widgets Link Hover Color', 'genesischild' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'gc_footer_link_hover_color' //pick the setting it applies to
			)
	) );

        // Add Footer Widgets background color
        // Add setting.
        $wp_customize->add_setting( 'gc_footerwidgets_background_color', array(
                'default'           => gc_footerwidgets_background_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'gc_footerwidgets_background_color', array(
                'label'      => __( 'Footer Widgets Background  Color', 'genesischild' ), //set the label to appear in the Customizer
                'section'    => 'colors', //select the section for it to appear under
                'settings'   => 'gc_footerwidgets_background_color' //pick the setting it applies to
        )
        ) );

	// Remove default Genesis logo/title
	$wp_customize->remove_control('blog_title');


         // Add featured image section to the Customizer
         $wp_customize->add_section( 'gc_single_image_section', array(
                 'title'       => __( 'Post and Page Images', 'genesischild' ),
                 'description' => __( 'Choose if you would like to display the featured image above the content on single posts and pages.', 'genesischild' ),
                 'priority'    => 200, // puts the customizer section lower down
         ) );
         // Add featured image setting to the Customizer
         $wp_customize->add_setting( 'gc_single_image_setting', array(
                 'default'    => false, // set the option as enabled by default
                 'capability' => 'edit_theme_options',
         ) );
         $wp_customize->add_control( 'gc_single_image_setting', array(
                 'section'  => 'gc_single_image_section',
                 'settings' => 'gc_single_image_setting',
                 'label'    => __( 'Show featured image on posts and pages?', 'genesischild' ),
                 'type'     => 'checkbox'
         ));

}
