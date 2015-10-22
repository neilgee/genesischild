<?php
/**
 * WooCommerce Template
 * 
 * Template used for all WooCommerce views in order to avoid using Genesis Connect
 * Save this into `themename/woocommerce.php`
 *
 */
 
//* Add WooCommerce content output
if ( function_exists( 'woocommerce_content' ) ) {
    // Remove standard post content output
    remove_action( 'genesis_loop', 'genesis_do_loop');
    
    // Replace the default Genesis loop with WooCommerce's
    add_action( 'genesis_loop', 'woocommerce_content' );
}
 
genesis();