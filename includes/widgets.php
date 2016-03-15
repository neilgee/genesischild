<?php
/**
 * Register and unregister and position all the widgets.
 *
 * @package genesischild
 */

add_action( 'widgets_init', 'genesischild_extra_widgets' );
/**
 * Register new Widget areas and position them.
 */
function genesischild_extra_widgets() {
	genesis_register_sidebar( array(
		'id'            => 'preheaderleft',
		'name'          => __( 'PreHeaderLeft', 'genesischild' ),
		'description'   => __( 'This is the preheader left area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'preheaderright',
		'name'          => __( 'PreHeaderRight', 'genesischild' ),
		'description'   => __( 'This is the preheader right area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'hero',
		'name'          => __( 'Hero Home Page', 'genesischild' ),
		'description'   => __( 'This is the Hero Home Page area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'optin',
		'name'          => __( 'Optin', 'genesischild' ),
		'description'   => __( 'This is the optin area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-top',
		'name'          => __( 'Home Top', 'genesischild' ),
		'description'   => __( 'This is the home top area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-middle',
		'name'          => __( 'Home Middle', 'genesischild' ),
		'description'   => __( 'This is the home middle area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-bottom',
		'name'          => __( 'Home Bottom', 'genesischild' ),
		'description'   => __( 'This is the home bottom area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'before-entry',
		'name'          => __( 'Before Entry', 'genesischild' ),
		'description'   => __( 'This is the before content area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'footerwidgetheader',
		'name'          => __( 'Footer Widget Header', 'genesischild' ),
		'description'   => __( 'This is for the Footer Widget Headline', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'footercontent',
		'name'          => __( 'Footer', 'genesischild' ),
		'description'   => __( 'This is the general footer area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'postfooterleft',
		'name'          => __( 'Post Footer Left', 'genesischild' ),
		'description'   => __( 'This is the post footer left area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'postfooterright',
		'name'          => __( 'Post Footer Right', 'genesischild' ),
		'description'   => __( 'This is the post footer right area', 'genesischild' ),
	) );
}

/**
 * Position the PreHeader Area.
 */
function genesischild_preheader_widget() {
	if ( is_active_sidebar( 'preheaderleft' ) || is_active_sidebar( 'preheaderright' ) ) {
		echo '<section class="preheadercontainer"><div class="wrap">';
		genesis_widget_area( 'preheaderleft' , array(
			'before' => '<aside class="preheaderleft first one-half">',
			'after'  => '</aside>',
		) );
		genesis_widget_area( 'preheaderright' , array(
			'before' => '<aside class="preheaderright one-half">',
			'after'  => '</aside>',
		) );
		echo '</div></section>';
	}
}
add_action( 'genesis_before_header','genesischild_preheader_widget' );


/**
 * Position the Hero Area.
 * Hooked in front-page.php
 */
function genesischild_hero_widget() {
	genesis_widget_area( 'hero', array(
		'before' => '<section class="herocontainer"><div class="wrap hero">',
		'after'  => '</div></section>',
	));
}

/**
 * Position the Optin Area.
 * Hooked in front-page.php
 */
function genesischild_optin_widget() {
	genesis_widget_area( 'optin', array(
		'before' => '<aside class="optincontainer"><div class="wrap optin">',
		'after'  => '</div></aside>',
	));
}

/**
 * Position the Home Area.
 * Hooked in front-page.php
 */
function genesischild_homecontent_widget() {
	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top-container"><div class="wrap home-top">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'home-middle', array(
		'before' => '<div class="home-middle-container"><div class="wrap home-middle">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'home-bottom', array(
		'before' => '<div class="home-bottom-container"><div class="wrap home-bottom">',
		'after'  => '</div></div>',
	) );
}

/**
 * Position Footer Widget Header.
 */
function genesischild_footerwidgetheader() {
	if ( is_active_sidebar( 'footerwidgetheader' ) ) {
		echo '<div class="footerwidgetheader-container"><div class="wrap">';
		genesis_widget_area( 'footerwidgetheader' );
		echo '</div></div>';
	}
}
add_action( 'genesis_before_footer','genesischild_footerwidgetheader', 5 );

/**
 * Position the Footer Area.
 */
function genesischild_footer_widget() {
	genesis_widget_area( 'footercontent', array(
		'before' => '<div class="footercontent">',
		'after'  => '</div>',
	));
}
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer','genesischild_footer_widget' );

/**
 * Position the PostFooter Area.
 */
function genesischild_postfooter_widget() {
	if ( is_active_sidebar( 'postfooterleft' ) || is_active_sidebar( 'postfooterright' ) ) {
		echo '<div class="postfootercontainer"><div class="wrap">';
		genesis_widget_area( 'postfooterleft' , array(
			'before' => '<aside class="first one-half postfooterleft">',
			'after'  => '</aside>',
		));
		genesis_widget_area( 'postfooterright' , array(
			'before' => '<aside class="one-half postfooterright">',
			'after'  => '</aside>',
		));
		echo '</div></div>';
	}
}
add_action( 'genesis_after_footer','genesischild_postfooter_widget' );

/**
 * Position the Before Content Area.
 */
function genesischild_before_entry_widget() {
	if ( is_single() ) {
		genesis_widget_area( 'before-entry', array(
			'before' => '<div class="before-entry widget-area">',
			'after'  => '</div>',
		) );
	}
}
add_action( 'genesis_before_loop','genesischild_before_entry_widget' );


/**
 * Remove Unwanted Widgts.
 */
function genesischild_remove_some_widgets() {
	// Example below, to action these uncomment the add_action above.
	unregister_sidebar( 'sidebar-alt' );
}
// Uncomment action below.
// add_action( 'widgets_init', 'genesischild_remove_some_widgets' );
