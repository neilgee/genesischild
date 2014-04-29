<?php

/************************************************
* @package genesischild
* @author  NeilGee
* @license GPL-2.0+
* @link    http://coolestguidesontheplanet.com/
************************************************/

// Start the engine the other way around - set up child after parent - add in theme supports, actions and filters

add_action( 'genesis_setup', 'genesischild_theme_setup' );

function genesischild_theme_setup() { 
		
	add_theme_support( 'html5' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widgets', 3 );
	add_theme_support( 'custom-background' );
	//add_theme_support( 'genesis-connect-woocommerce' ); //Uncomment if using woocommerce
	
	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	remove_action( 'genesis_footer', 'genesis_do_footer' );
		
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 998 ) ;
	add_action( 'wp_enqueue_scripts', 'genesischild_scripts_styles', 999 ) ;
	add_action( 'widgets_init', 'genesischild_extra_widgets' );	
	add_action( 'genesis_before_loop','genesischild_beforecontent_widget' );
	add_action( 'genesis_after_loop','genesischild_aftercontent_widget' );
	add_action( 'genesis_before_footer','genesischild_footerwidgetheader', 5 );
	add_action( 'genesis_footer','genesischild_footer_widget' );
	add_action( 'genesis_footer','genesischild_postfooter_widget' );		
	add_action( 'genesis_before_header','genesischild_preheader_widget' );
	add_action( 'genesis_after_header','genesischild_optin_widget' );
	//add_action( 'genesis_before', 'likebox_facebook_script' ); //Uncomment if using facebook likebox function below
	
	add_filter( 'widget_text', 'do_shortcode' );	
	add_filter( 'widget_text','genesis_execute_php_widgets' );	
	add_filter( 'excerpt_more', 'genesischild_read_more_link' );
	add_filter( 'comment_form_defaults', 'genesischild_comment_form_defaults' );
	add_filter( 'comment_form_defaults', 'genesischild_remove_comment_form_allowed_tags' );
	add_filter( 'genesis_post_info', 'genesischild_post_info' );
	add_filter( 'theme_page_templates', 'genesis_remove_blog_archive' );	
}



//Child Theme Functions Go Here

//Script-tac-ulous -> All the Scripts and Styles Registered and Enqueued, scripts first - then styles
function genesischild_scripts_styles() {
	wp_register_script ( 'placeholder' , get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ), '1', true );
	wp_register_script ( 'responsive', get_stylesheet_directory_uri() . '/js/responsive.js', array( 'jquery' ), '1', true );
	wp_register_style ( 'googlefonts' , 'http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic', '', '2', 'all' );
	wp_register_style ( 'fontawesome' , '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', '' , '4.0.3', 'all' );
	wp_register_style( 'ie8', get_stylesheet_directory_uri() . '/css/ie8.css' );//target IE8 and Lower
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 8' );
	wp_register_style( 'ieall', get_stylesheet_directory_uri() . '/css/ieall.css' );//target IE9 and lower
	$GLOBALS['wp_styles']->add_data( 'ieall', 'conditional', 'IE' );

	wp_enqueue_script( 'responsive' );
	wp_enqueue_script( 'placeholder' );
	wp_enqueue_style( 'googlefonts' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'ie8' );
	wp_enqueue_style( 'ieall' );
	//wp_enqueue_style( 'dashicons' ); //Uncomment if DashIcons required in front end
}

//Add in new Widget areas
function genesischild_extra_widgets() {	
	genesis_register_sidebar( array(
	'id'          => 'preheaderleft',
	'name'        => __( 'PreHeaderLeft', 'genesischild' ),
	'description' => __( 'This is the preheader left area', 'genesischild' ),
	'before_widget' => '<div class="first one-half preheaderleft">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'preheaderright',
	'name'        => __( 'PreHeaderRight', 'genesischild' ),
	'description' => __( 'This is the preheader right area', 'genesischild' ),
	'before_widget' => '<div class="one-half preheaderright">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'hero',
	'name'        => __( 'Hero Home Page', 'genesischild' ),
	'description' => __( 'This is the Hero Home Page area', 'genesischild' ),
	'before_widget' => '<div class="wrap hero">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'optin',
	'name'        => __( 'Optin', 'genesischild' ),
	'description' => __( 'This is the optin area', 'genesischild' ),
	'before_widget' => '<div class="wrap optin">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'beforecontent',
	'name'        => __( 'Before Content', 'genesischild' ),
	'description' => __( 'This is the before content area', 'genesischild' ),
	'before_widget' => '<div class="beforecontent">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'aftercontent',
	'name'        => __( 'After Content', 'genesischild' ),
	'description' => __( 'This is the before content area', 'genesischild' ),
	'before_widget' => '<div class="aftercontent">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id' => 'footerwidgetheader',
	'name' => __( 'Footer Widget Header', 'genesischild' ),
	'description' => __( 'This is for the Footer Widget Headline', 'genesischild' ),
	'before_widget' => '<div class="footerwidgetheader">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'footercontent',
	'name'        => __( 'Footer', 'genesischild' ),
	'description' => __( 'This is the general footer area', 'genesischild' ),
	'before_widget' => '<div class="footercontent">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'postfooterleft',
	'name'        => __( 'Post Footer Left', 'genesischild' ),
	'description' => __( 'This is the post footer left area', 'genesischild' ),
	'before_widget' => '<div class="first one-half postfooterleft">',
	'after_widget' => '</div>',
	) );
	genesis_register_sidebar( array(
	'id'          => 'postfooterright',
	'name'        => __( 'Post Footer Right', 'genesischild' ),
	'description' => __( 'This is the post footer right area', 'genesischild' ),
	'before_widget' => '<div class="one-half postfooterright">',
	'after_widget' => '</div>',
	) );
}

//Position the PreHeader Area
function genesischild_preheader_widget() {
	echo '<section class="preheadercontainer"><div class="wrap">';
	genesis_widget_area ( 'preheaderleft' );
	genesis_widget_area ( 'preheaderright' );
	echo '</div></section>';
}
//Position the Hero Area
function genesischild_hero_widget() {
	genesis_widget_area ( 'hero', array(
	'before' => '<section class="herocontainer">',
	'after' => '</section>',));
}

//Position the Optin Area
function genesischild_optin_widget() {
	genesis_widget_area ( 'optin', array(
	'before' => '<aside class="optincontainer">',
	'after' => '</aside>',));
}
//Position Footer Widget Header
function genesischild_footerwidgetheader()  {
	echo '<div class="footerwidgetheader-container"><div class="wrap">';
	genesis_widget_area ( 'footerwidgetheader' );
	echo '</div></div>'; 
}
	
//Position the Footer Area
function genesischild_footer_widget() {
	genesis_widget_area ( 'footercontent', array(
	'before' => '<div class="footercontainer">',
	'after' => '</div>',));
}

//Position the PostFooter Area
function genesischild_postfooter_widget() {
	echo '<div class="postfootercontainer"><div class="wrap">';
	genesis_widget_area ( 'postfooterleft' );
	genesis_widget_area ( 'postfooterright' );
	echo '</div></div>';
}

//Position the Before Content Area
function genesischild_beforecontent_widget() {
	genesis_widget_area ( 'beforecontent' );
}

//Position the After Content Area
function genesischild_aftercontent_widget() {
	genesis_widget_area ( 'aftercontent' );
}

// Remove Genesis Blog & Archive
function genesis_remove_blog_archive( $templates ) {
	unset( $templates['page_blog.php'] );
	unset( $templates['page_archive.php'] );
	return $templates;
}

//Allow PHP to run in Widgets
function genesis_execute_php_widgets( $html ) {
	if ( strpos( $html, "<" . "?php" ) !==false ) {
	ob_start();
	eval( "?".">".$html );
	$html=ob_get_contents();
	ob_end_clean();
		}
	return $html;
}

//Read More Button For Excerpt
function genesischild_read_more_link() {
	return '... <a href="' . get_permalink() . '" class="more-link" title="Read More">Read More</a>';
}

//Remove Author Name on Post Meta
function genesischild_post_info( $post_info ) {
	if ( !is_page() ) {
	$post_info = 'Posted on [post_date] [post_comments] [post_edit]';
	return $post_info;
	}
}

//Change the comments header
function genesischild_comment_form_defaults( $defaults ) {
	$defaults['title_reply'] = __( 'Leave a Comment' );
	return $defaults;
}

//Remove comment form HTML tags and attributes
function genesischild_remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}

/*Function for Facebook HTML5 Script needs to go after body - escape all inner double quotes or use alternate single quotes
function likebox_facebook_script () {
echo "";
}*/