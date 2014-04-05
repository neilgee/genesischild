<?php
// Start the engine the other way around - set up child after parent - add in theme supports, actions and filters

add_action('genesis_setup','genesischild_theme_setup'); 
function genesischild_theme_setup() { 
	
	add_theme_support( 'html5' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widgets', 3 );
	add_theme_support( 'custom-background' );
	//add_theme_support( 'genesis-connect-woocommerce' );
	//add_action('genesis_before', 'likebox_facebook_script');
	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 998);
	add_action( 'wp_enqueue_scripts', 'genesischild_scripts_styles',999);	
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	add_action( 'widgets_init', 'genesischild_extra_widgets' );	
	add_action('genesis_footer','genesischild_footer_widget');	
	add_filter('widget_text', 'do_shortcode');	
	add_filter('widget_text','execute_php_widgets',10);	
	add_filter( 'excerpt_more', 'genesischild_read_more_link' );
}

//Child Theme Functions Go Here

//Script-Tac-ulous -> All the Scripts and Styles Registered and Enqueued, scripts first - then styles
function genesischild_scripts_styles(){
	//thescript
	wp_register_script ('placeholder', get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ),'1',true);
	wp_register_script ('responsive', get_stylesheet_directory_uri() . '/js/responsive.js', array( 'jquery' ),'1',true);
	wp_register_style ('googlefonts','http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic','', '2', 'all');
	wp_register_style ('fontawesome','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css','', '4.0.3', 'all');
	wp_register_style( 'ie8', get_stylesheet_directory_uri() . '/ie8.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', '/css/lte IE 8' );
	wp_register_style( 'ieall', get_stylesheet_directory_uri() . '/css/ieall.css'  );
	$GLOBALS['wp_styles']->add_data( 'ieall', 'conditional', 'IE' );

	wp_enqueue_script('responsive');
	wp_enqueue_script('placeholder');
	wp_enqueue_style('googlefonts');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('ie8');
	wp_enqueue_style('ieall');
	//wp_enqueue_style('dashicons');
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

//Allow PHP to run in Widgets
function execute_php_widgets($html){
   if(strpos($html,"<"."?php")!==false){
   ob_start();
   eval("?".">".$html);
   $html=ob_get_contents();
   ob_end_clean();
   }
return $html;
}

//Read More Button For Excerpt
function genesischild_read_more_link() {
	return '... <a href="' . get_permalink() . '"class="more-link" title="Read More">Read More</a>';
}

/*Function for Facebook HTML5 Script needs to go after body - escape all inner double quotes
function likebox_facebook_script () {
echo "";
}*/