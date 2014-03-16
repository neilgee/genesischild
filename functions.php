<?php
// Start the engine the other way around - set up child after parent

add_action('genesis_setup','genesischild_theme_setup'); 
function genesischild_theme_setup() { 
	
	add_theme_support( 'html5' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widgets', 3 );
	
}

//Functions Go Here

//Script-Tac-ulous -> All the Scripts Registered and Enqueued