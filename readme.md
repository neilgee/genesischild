#GenesisChild

This is a basic starter **Genesis Child Theme** to be used with the **Genesis Framework** on **WordPress**.

There is a Mobile First version of this starter theme - https://github.com/neilgee/genesischild-mobile-first

This Genesis child theme is declaring support for HTML5, it is responsive and has a number of widgets areas.

###Widgetised Areas
- The theme contains the following widgets
* Pre-Header Left
* Pre-Header Right 
* Header Right
* Hero - Home Page only *front-page.php*
* Optin - Home Page only *front-page.php*
* Home Left - Home Page only *front-page.php*
* Home Middle - Home Page only *front-page.php*
* Home Right - Home Page only *front-page.php*
* Before Content *posts only*
* After Content *posts only*
* Footer Widget Header
* Footer Widgets 1, 2, 3
* Footer
* Post Footer Left
* Post Footer Right

###Home Page
The Home Page has been widgetised and the default Genesis loop can be removed.


To remove the Genesis home page loop tweak the **front-page.php** file by uncommenting line 90:
```php
wpb_genesis_no_content();
```

and commenting line 91:
```php
//genesis();
```

###Example
For an online visual:
http://themes.wpbeaches.com/genesischild/
Areas are highlighted to show boundaries and full width wraps these colors are commented out in the CSS.

###Menus
- Primary Menu is positioned in Header Right Widget Hook and set to Primary Location
- Secondary Menu remains in default area and is Secondary Location

###Custom Header
- Custom Header is supported via Appearance > Header, suggested size is 400x150px which you can change in the Custom Header Array in *functions.php*
- The header now uses the *genesis_seo_title* filter and uses an `<img>` element.

###Background Image
- Background Images is supported, a background image can be uploaded in the WP Dashboard via Appearance > Background, this will scale to fit any viewport via BackstrechJS.

###Javascripts
- FontAwesome is enabled.
- placeholder.js is enabled.
- backstretch.min.js is enabled (via CDN) if a custom background is used.
- SVGeezy is enabled for fallback SVG support

###CSS
- Regular style.css with all Genesis Framework and placeholders to start new project
- 2 x IE styles in CSS directory, one targets IE8 and lower, the other IE9 and lower
- Media Queries set at 767px and 1200px

###WooCommerce
- WooCommerce style sheet set to load before main style sheet
- Some generic CSS styles declared in styles.css
- WooCommerce theme support declared as an action in functions.php but commented out

###Miscellaneous
- PHP is enabled to execute in widget areas
- Shortcode enabled in widget areas
- 'Read More' link is enabled on post excerpts
- Comments header changed to 'Leave a Comment'
- HTML Tags and Attributes is removed from comments
- The font 'Open Sans' is enqueued from Google Fonts in functions.php
- Author name removed in Post Meta for posts
- SVG support for uploads and fallbacks can use PNG format fallback filed in same directory

Download the zip rename the theme '**genesischild**' - place this theme in your WordPress installation **"/wp-content/themes/"** and activate in WordPress Dashboard

![Genesis Child Theme](http://coolestguidesontheplanet.com/wp-content/themes/gee/images/genesis-markedup2.png)

![Genesis Child Theme Widget Areas](http://coolestguidesontheplanet.com/wp-content/themes/gee/images/genesischild-widgets1.png)


