<?php
/**
 * *********************************************
 * Front Page Template
 *
 * @package genesischild
 * @author  NeilGee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com/
 ************************************************/

// Force full-width-content layout setting.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Add Hero Widget Just to Front Page.
add_action( 'genesis_after_header','genesischild_optin_widget' );
add_action( 'genesis_after_header','genesischild_hero_widget' );
add_action( 'genesis_after_header','genesischild_homecontent_widget' );


// Run Custom Genesis with no inner content.
/**
 * Remove Inner Home Page Content on a Genesis Theme
 *
 * @package   Genesis Custom Front Page - No Inner Content
 * @author    Neil Gee
 * @link      http://wpbeaches.com/
 * @copyright (c)2014, Neil Gee
 **/
function wpb_genesis_no_content() {
	wpb_genesis_header();
	wpb_genesis_footer();
}

/** Customised Genesis Header **/
function wpb_genesis_header() {
	do_action( 'genesis_doctype' );
	do_action( 'genesis_title' );
	do_action( 'genesis_meta' );

	wp_head(); // We need this for plugins.
	?>
	</head>
	<?php
	genesis_markup( array(
		'html5'   => '<body %s>',
		'xhtml'   => sprintf( '<body class="%s">', implode( ' ', get_body_class() ) ),
		'context' => 'body',
	) );
	do_action( 'genesis_before' );

	genesis_markup( array(
		'html5'   => '<div %s>',
		'xhtml'   => '<div id="wrap">',
		'context' => 'site-container',
	) );

	do_action( 'genesis_before_header' );
	do_action( 'genesis_header' );
	do_action( 'genesis_after_header' );

	// genesis_markup( array(
		// 'html5'   => '<div %s>',
		// 'xhtml'   => '<div id="inner">',
		// 'context' => 'site-inner',
	// ) );
	// genesis_structural_wrap( 'site-inner' );
}

/** Customised Genesis Footer **/
function wpb_genesis_footer() {
	// genesis_structural_wrap( 'site-inner', 'close' );
	// echo '</div>'; // end .site-inner or #inner
	do_action( 'genesis_before_footer' );
	do_action( 'genesis_footer' );
	do_action( 'genesis_after_footer' );

	echo '</div>'; // End .site-container or #wrap.

	do_action( 'genesis_after' );
	wp_footer(); // We need this for plugins.
	?>
	</body>
	</html>
<?php
}

// wpb_genesis_no_content();

genesis();
