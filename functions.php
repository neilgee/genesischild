<?php
/**
 * Genesischild Theme
 *
 * @package genesischild
 * @author  NeilGee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com/
 */

add_action( 'genesis_setup', 'gc_theme_setup', 15 );
/**
 * Genesischild theme set up
 *
 * Start the engine the other way around - set up child after parent - add in theme supports, actions and filters
 *
 * @since 1.0.0
 */
function gc_theme_setup() {
	// Child theme constant settings.
	 define( 'CHILD_THEME_NAME', 'genesischild' );
	 define( 'CHILD_THEME_URL', 'http://wpbeaches.com' );
	 define( 'CHILD_THEME_VERSION', '2.4.0' );

	// Load in optional files.

	// Setup Theme Defaults.
	include_once( get_stylesheet_directory() . '/includes/theme-defaults.php' );
	// All scripts and styles to be registered and enqueued.
	require_once( get_stylesheet_directory() . '/includes/scripts-styles.php' );
	// Widget areas registered and positioned.
	require_once( get_stylesheet_directory() . '/includes/widgets.php' );
	// Add in our Custom Post Type Featured Post Widget.
	include_once( get_stylesheet_directory() . '/includes/class-featured-custom-post-type-widget.php' );
	// Add in our Customizer options.
	require_once( get_stylesheet_directory() . '/includes/customize.php' );
	// Add in our CSS for our customizer options.
	require_once( get_stylesheet_directory() . '/includes/output.php' );

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
	// WooCommerce functions
		include_once( get_stylesheet_directory() . '/includes/woocommerce.php' );
	}
	// Genesis Default Responsive Menu
	//include_once( get_stylesheet_directory() . '/includes/responsive-menu.php' );
	// Get the plugins.
	//require_once  get_stylesheet_directory() . '/plugins.php';

	// Allow the theme to be translated.
	load_theme_textdomain( 'genesischild', get_stylesheet_directory_uri() . '/languages' );

	// Load in theme supports.

	// HTML5 goodness.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	// RWD viewport.
	add_theme_support( 'genesis-responsive-viewport' );
	// Footer Widgets - change number to suit.
	add_theme_support( 'genesis-footer-widgets', 3 );
	// Allow for a custom background.
	add_theme_support( 'custom-background' );
	// Add support for custom header change the dimensions to suit.

	//  add_theme_support( 'custom-header', array(
	// 	'flex-width'  => true,
	// 	'flex-height' => true,
	// 	'width'       => 400,
	// 	'height'      => 150,
	// 	'header-text' => false,
	// ));

	// Add support for custom logo change the dimensions to suit. Need WordPress 4.5 for this.
	add_theme_support( 'custom-logo', array(
		'height'      => 150, // set to your dimensions
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	));
	// Add Accessibility support.
	add_theme_support( 'genesis-accessibility', array( '404-page', 'headings', 'drop-down-menu', 'search-form', 'skip-links' ) );
	// Add widget area after posts.
	add_theme_support( 'genesis-after-entry-widget-area' );
	// Add structural wraps.
	add_theme_support( 'genesis-structural-wraps', array( 'site-inner', 'header', 'menu-secondary', 'footer-widgets', 'footer' ) );

	// Image sizes - add in required image sizes here.
	//
	add_image_size( 'blog-feature', 300, 200, true );

	// Re-arrange header nav.
	remove_action( 'genesis_after_header','genesis_do_nav' );
	add_action( 'genesis_header_right','genesis_do_nav' );

	add_filter( 'excerpt_more', 'gc_read_more_link' );
	/**
	 * Change Read More Button For Excerpt.
	 **/
	function gc_read_more_link() {
		return ' ...  <a href="' . get_permalink() . '" class="more-link" title="Read More">Read More</a>';
	}

	add_filter( 'get_the_content_limit', 'gc_content_limit_read_more_markup', 10, 3 );
	/**
	 * Customize the content limit more markup.
	 **/
	function gc_content_limit_read_more_markup( $output, $content, $link ) {

		$output = sprintf( '<p>%s &#x02026;</p><p class="more-link-wrap">%s</p>', $content, str_replace( '&#x02026;', '', $link ) );

		return $output;
	}

	add_filter( 'comment_form_defaults', 'gc_comment_form_defaults' );
	/**
	 * Change the comments reply text.
	 */
	function gc_comment_form_defaults( $defaults ) {
		$defaults['title_reply'] = __( 'Leave a Comment', 'genesischild' );
		$defaults['comment_notes_after'] = '';
		return $defaults;
	}

	add_filter( 'genesis_author_box_gravatar_size', 'gc_sample_author_box_gravatar' );
	/**
	 * Modify size of the Gravatar in the author box.
	 */
	function gc_sample_author_box_gravatar( $size ) {
		return 90;
	}

	add_filter( 'genesis_comment_list_args', 'gc_sample_comments_gravatar' );
	/**
	 * Modify size of the Gravatar in the entry comments.
	 */
	function gc_sample_comments_gravatar( $args ) {
		$args['avatar_size'] = 60;
		return $args;
	}

	add_filter( 'genesis_post_info', 'gc_post_info' );
	/**
	 * Remove Author Name on Post Meta.
	 */
	function gc_post_info( $post_info ) {
		if ( ! is_page() ) {
			$post_info = 'Posted on [post_date] [post_comments] [post_edit]';
			return $post_info;
		}
	}

	// Remove blog header from blog posts page.
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );


	add_filter( 'upload_mimes', 'gc_add_svg_images' );
	/**
	 * Allow SVG Images Via Media Uploader.
	 */
	function gc_add_svg_images( $mimetypes ) {
		$mimetypes['svg'] = 'image/svg+xml';
		return $mimetypes;
	}

	// Remove Genesis header style so we can use the customiser and header function gc_swap_header to add our header logo.
	// remove_action( 'wp_head', 'genesis_custom_header_style' );



	add_filter( 'genesis_seo_title','gc_custom_logo', 10, 3 );
	/**
	 * Add an image inline in the site title element for the main logo
	 *
	 * The custom logo is then added via the Customiser
	 *
	 * @param string $title All the mark up title.
	 * @param string $inside Mark up inside the title.
	 * @param string $wrap Mark up on the title.
	 * @author @_AlphaBlossom
	 * @author @_neilgee
	 */
	function gc_custom_logo( $title, $inside, $wrap ) {
		// Check to see if the Custom Logo function exists and set what goes inside the wrapping tags.
		if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
			$logo = the_custom_logo();
		else :
		 	$logo = get_bloginfo( 'name' );
		endif;
	 	 // Use this wrap if no custom logo - wrap around the site name
		 $inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
		 // Determine which wrapping tags to use - changed is_home to is_front_page to fix Genesis bug.
		 $wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
		 // A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug.
		 $wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
		 // And finally, $wrap in h1 if HTML5 & semantic headings enabled.
		 $wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
		 $title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
		 return $title;
	}

	add_filter( 'genesis_attr_site-description', 'gc_add_site_description_class' );
	/**
	 * Add class for screen readers to site description.
	 * This will keep the site description mark up but will not have any visual presence on the page
	 * This runs if their is a header image set in the Customiser.
	 *
	 * @param string $attributes Add screen reader class if custom logo is set.
	 *
	 * @author @_neilgee
	 */
	 function gc_add_site_description_class( $attributes ) {
		if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
			$attributes['class'] .= ' screen-reader-text';
			return $attributes;
		}
		else {
			return $attributes;
		}
	 }

	// Allow shortcode to run in widgets.
	add_filter( 'widget_text', 'do_shortcode' );


	add_filter( 'widget_text','gc_execute_php_widgets' );
	/**
	 * Allow PHP code to run in Widgets.
	 */
	function gc_execute_php_widgets( $html ) {
		 if ( strpos( $html, '<' . '?php' ) !== false ) {
			ob_start();
			eval( '?' . '>' . $html );
			$html = ob_get_contents();
			ob_end_clean();
		}
		return $html;
	}

} // <~Closing brace for genesis_setup function

// Mobile Menu - This is what I am using for my mobile menu - https://wordpress.org/plugins/slicknav-mobile-menu/ .
