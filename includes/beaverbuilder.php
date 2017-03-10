<?php



add_action( 'wp_enqueue_scripts', 'beaverbuilder_css_styles', 899);
/**
 * BeaverBuilder CSS styles.
 */
function beaverbuilder_css_styles() {
        wp_enqueue_style( 'bbcss' , get_stylesheet_directory_uri() . '/css/beaver.css', array(), '1.0.0', 'all' );
}
