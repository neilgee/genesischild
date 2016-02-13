<?php

//Load and order all scripts and styles in the head

//Remove the default Genesis main stylesheet to we can load it later
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );//Remove order of main style sheet
//Load Genesis main style sheet later so we beat out all the other guys
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 998 ); //Order main style sheet 2nd last


//Script-tac-ulous -> All the Scripts and Styles Enqueued, scripts first - then styles
function genesischild_scripts_styles() {
	wp_enqueue_script( 'svgeezy', get_stylesheet_directory_uri() . '/js/svgeezy.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'svgeezy-init', get_stylesheet_directory_uri() . '/js/svgeezy-init.js', array('svgeezy'), '1.0.0', true );
	wp_enqueue_script ( 'placeholder' , get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ), '1', true );
	wp_enqueue_style ( 'googlefonts' , '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800', array(), '2', 'all' );
	wp_enqueue_style ( 'fontawesome' , '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array() , '4.5.0', 'all' );
	//wp_enqueue_style( 'dashicons' ); //Uncomment if DashIcons required in front end
}
add_action( 'wp_enqueue_scripts', 'genesischild_scripts_styles', 997 ); //All the rest load before


//IE Conditional Styles - gotta load very last
function genesischild_ie_styles() {
	wp_register_style( 'ie8', get_stylesheet_directory_uri() . '/css/ie8.css' );//target IE8 and Lower
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 8' );
	wp_register_style( 'ieall', get_stylesheet_directory_uri() . '/css/ieall.css' );//target IE9 and lower
	$GLOBALS['wp_styles']->add_data( 'ieall', 'conditional', 'IE' );

	wp_enqueue_style( 'ie8' );
	wp_enqueue_style( 'ieall' );
}
//add_action( 'wp_enqueue_scripts', 'genesischild_ie_styles', 999 );	//IE conditional styles load last


//Backstretch for Custom Background Image
 function genesischild_backstretch_background_scripts() {
	//* Load scripts only if custom background is being used
	if ( ! get_background_image() )
		return;

	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/backstretch.min.js', array( 'jquery' ), '2.0.4', true );
	wp_enqueue_script( 'backstretch-image', get_stylesheet_directory_uri().'/js/backstretch-initialise.js' , array( 'jquery', 'backstretch' ), '1', true );
	wp_localize_script( 'backstretch-image', 'BackStretchImage', array( 'src' => get_background_image() ) );
}
//add_action( 'wp_enqueue_scripts', 'genesischild_backstretch_background_scripts' );
