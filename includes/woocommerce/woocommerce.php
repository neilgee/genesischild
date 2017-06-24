<?php

// Declare WooCommerce support for your theme - install the plugin and below and uncomment the line below that.
// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/includes/woocommerce/woocommerce-notice.php' );



add_action( 'wp_enqueue_scripts', 'woo_css_styles', 900 );
/**
 * WOO CSS styles.
 */
function woo_css_styles() {
wp_enqueue_style( 'woocss' , get_stylesheet_directory_uri() . '/includes/woocommerce/woo.css', array(), '2.0.0', 'all' );
}

// Customizer Options
include_once( get_stylesheet_directory() . '/includes/woocommerce/customize-woo.php' );

// Supports for zoom/slider/gallery
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );


add_filter( 'genesis_site_layout', 'gc_woo_layout' );
// Full width pages
function gc_woo_layout() {
        if( is_page ( array( 'cart', 'checkout' )) || is_shop() || 'product' == get_post_type() ) {
                return 'full-width-content';
        }
}

// How many products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


add_filter( 'woocommerce_pagination_args', 'gc_woocommerce_pagination' );
/**
 * Update the next and previous arrows to the default Genesis style.
 *
 * @since 2.3.0
 *
 * @return string New next and previous text string.
 */
function gc_woocommerce_pagination( $args ) {

	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'genesis-sample' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'genesis-sample' ) );

	return $args;

}


// Removes Order Notes Title - Additional Information
// add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );


// Remove display notice - Showing all x results
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


// Remove default sorting drop-down from WooCommerce
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// add_filter( 'woocommerce_checkout_fields' , 'gc_remove_order_notes' );
// Remove Order Notes Field
function gc_remove_order_notes( $fields ) {
        unset($fields['order']['order_comments']);
        return $fields;
}


// add_filter('woocommerce_billing_fields','gc_custom_billing_fields');
// Remove some fields from billing form
// ref - https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
function gc_custom_billing_fields( $fields = array() ) {
        unset($fields['billing_company']);
        unset($fields['billing_address_1']);
        unset($fields['billing_address_2']);
        unset($fields['billing_state']);
        unset($fields['billing_city']);
        unset($fields['billing_phone']);
        unset($fields['billing_postcode']);
        unset($fields['billing_country']);
        return $fields;
}
