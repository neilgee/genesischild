<?php
/**
 * Genesischild default set up.
 *
 * @package genesischild
 */

add_filter( 'genesis_theme_settings_defaults', 'genesischild_theme_defaults' );
/**
 * Genesischild Theme Setting Defaults.
 *
 * @package genesischild
 * @param mixed $defaults Set the theme defaults.
 */
function genesischild_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 5;
	$defaults['content_archive']           = 'excerpts';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 1;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}


add_action( 'after_switch_theme', 'genesischild_theme_setting_defaults' );
/**
 * Genesischild Theme Setup After swicthing themes.
 *
 * @package genesischild
 */
function genesischild_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 5,
			'content_archive'           => 'excerpts',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 1,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}
	update_option( 'posts_per_page', 5 );

}

add_filter( 'simple_social_default_styles', 'genesischild_social_default_styles' );
/**
 * Simple Social Icon Defaults.
 *
 * @package genesischild
 * @param array $defaults Set the icon defaults.
 */
function genesischild_social_default_styles( $defaults ) {

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
