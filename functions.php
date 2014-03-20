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
	
}

//Functions Go Here

//Script-Tac-ulous -> All the Scripts Registered and Enqueued
function genesischild_scripts_styles(){
	//thescript
	wp_register_script ('placeholder', get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ),'1',true);
	wp_register_script ('responsive', get_stylesheet_directory_uri() . '/js/responsive.js', array( 'jquery' ),'1',true);
	wp_register_style ('googlefonts','http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300','', '2', 'all');
	wp_register_style ('fontawesome','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css','', '4.0.3', 'all');



	wp_enqueue_script('responsive');
	wp_enqueue_script('placeholder');
	wp_enqueue_style('googlefonts');
	wp_enqueue_style('fontawesome');
}

//Function for Facebook HTML5 Script needs to go after body - escape all inner double quotes
//function likebox_facebook_script () {
//	echo "";
//}
