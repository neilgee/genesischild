<?php

// Declare WooCommerce support for your theme - install the plugin and below and uncomment the line below that.
// https://wordpress.org/plugins/genesis-connect-woocommerce/
add_theme_support( 'genesis-connect-woocommerce' );


add_action( 'wp_enqueue_scripts', 'woo_css_styles', 900 );
/**
 * WOO CSS styles.
 */
function woo_css_styles() {
wp_enqueue_style( 'woocss' , get_stylesheet_directory_uri() . '/css/woo.css', array(), '2.0.0', 'all' );
}

// Customizer Options
include_once( get_stylesheet_directory() . '/includes/customize-woo.php' );


add_filter( 'genesis_site_layout', 'gc_woo_layout' );
// Full width pages
function gc_woo_layout() {
        if( is_page ( array( 'cart', 'checkout' )) || is_shop() || 'product' == get_post_type() ) {
                return 'full-width-content';
        }
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
