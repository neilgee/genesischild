<?php

// Declare WooCommerce support for your theme - install the plugin and below and uncomment the line below that.
// https://wordpress.org/plugins/genesis-connect-woocommerce/
add_theme_support( 'genesis-connect-woocommerce' );


// Full width pages
function gc_cpt_layout() {
    if( is_page ( array( 'cart', 'checkout' )) || is_shop() || 'product' == get_post_type() ) {
        return 'full-width-content';
    }
}
add_filter( 'genesis_site_layout', 'gc_cpt_layout' );


// Removes Order Notes Title - Additional Information
// add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

//remove display notice - Showing all x results
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

//remove default sorting drop-down from WooCommerce
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//Remove Order Notes Field
function gc_remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}
// add_filter( 'woocommerce_checkout_fields' , 'gc_remove_order_notes' );

// remove some fields from billing form
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
// add_filter('woocommerce_billing_fields','gc_custom_billing_fields');



add_filter( 'genesis_site_layout', 'sample_genesis_site_layout' );
/**
 * Callback for 'genesis_site_layout' filter.
 *
 * Force full width content on the single product page.
 *
 * @param $layout The layout slug.
 * @return string The layout slug.
 */
function sample_genesis_site_layout( $layout ) {
    //* if a singular product page, set the new layout
    if ( ! is_archive() && 'product' === get_post_type() ) {
        $layout = 'full-width-content';
    }
    return $layout;
}
