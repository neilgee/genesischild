<?php
// Start the engine the other way around - set up child after parent

add_action('genesis_setup','genesischild_theme_setup'); 
function genesischild_theme_setup() { 
	
	add_theme_support( 'html5' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widgets', 3 );
	add_theme_support( 'custom-background' );
	//add_theme_support( 'genesis-connect-woocommerce' );
	//add_action('genesis_before', 'likebox_facebook_script');
	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 999 );
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	add_action( 'widgets_init', 'genesischild_extra_widgets' );	
	add_action('genesis_footer','genesischild_footer_widget');			
}

//Functions Go Here

//Script-Tac-ulous -> All the Scripts Registered and Enqueued
function genesischild_scripts_styles(){
	//thescript
	wp_register_script ('placeholder', get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ),'1',true);
	wp_register_script ('responsive', get_stylesheet_directory_uri() . '/js/responsive.js', array( 'jquery' ),'1',true);
	wp_register_style ('googlefonts','http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic','', '2', 'all');
	wp_register_style ('fontawesome','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css','', '4.0.3', 'all');

	wp_enqueue_script('responsive');
	wp_enqueue_script('placeholder');
	wp_enqueue_style('googlefonts');
	wp_enqueue_style('fontawesome');
}

//Add in new Widget areas
function genesischild_extra_widgets() {	
	genesis_register_sidebar( array(
	'id'          => 'footercontent',
	'name'        => __( 'Footer', 'genesischild' ),
	'description' => __( 'This is the general footer area', 'genesischild' ),
	'before_widget' => '<div class="footercontent">',
    'after_widget' => '</div>',
	) );
}

	
//Position the Footer Area
function genesischild_footer_widget() {
    genesis_widget_area ('footercontent', array(
        'before' => '<div class="footercontainer">',
        'after' => '</div>',));
}


/*Function for Facebook HTML5 Script needs to go after body - escape all inner double quotes
function likebox_facebook_script () {
echo "";
}*/