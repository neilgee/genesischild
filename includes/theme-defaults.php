<?php
/**
 * GenesisChild default set up.
 *
 * @package genesischild
 */

add_filter( 'genesis_theme_settings_defaults', 'gc_theme_defaults' );
/**
 * GenesisChild Theme Setting Defaults.
 *
 * @package genesischild
 * @param mixed $defaults Set the theme defaults.
 */
function gc_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 5;
	$defaults['content_archive']           = 'excerpts';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 1;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}


//add_action( 'after_switch_theme', 'gc_theme_setting_defaults' );
/**
 * GenesisChild Theme Setup After switching themes.
 *
 * @package genesischild
 */
function gc_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 5,
			// Causes issues with media uploader plugins //'content_archive'           => 'excerpts',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 1,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}
	update_option( 'posts_per_page', 5 );

}

add_filter( 'simple_social_default_styles', 'gc_social_default_styles' );
/**
 * Simple Social Icon Defaults.
 *
 * @package genesischild
 * @param array $defaults Set the icon defaults.
 */
function gc_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'aligncenter',
		'background_color'       => '#444',
		'background_color_hover' => '#222',
		'border_radius'          => 4,
		'icon_color'             => '#fff',
		'icon_color_hover'       => '#fff',
		'size'                   => 40,
		);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}

// Unregister Genesis page layouts

// genesis_unregister_layout( 'full-width-content' );
// genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );



add_filter( 'theme_page_templates', 'gc_remove_blog_archive' );
/**
 * Remove Genesis Blog & Archive.
 */
function gc_remove_blog_archive( $templates ) {
	unset( $templates['page_blog.php'] );
	unset( $templates['page_archive.php'] );
	return $templates;
}


add_action( 'genesis_theme_settings_metaboxes', 'gc_remove_metaboxes' );
/* Removing custom title/logo metabox from Genesis theme options page.
 * See http://www.billerickson.net/code/remove-metaboxes-from-genesis-theme-settings/
 * Updated to use $_genesis_admin_settings instead of legacy variable in Bill's example.
 */
function gc_remove_metaboxes( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-version', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-feeds', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-layout', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-comments', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-posts', $_genesis_admin_settings, 'main' );
	// remove_meta_box( 'genesis-theme-settings-scripts', $_genesis_admin_settings, 'main' );

}
