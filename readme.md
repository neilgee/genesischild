This is a basic starter **Genesis Child Theme** to be used with the **Genesis Framework** on **WordPress**.

This Genesis child theme is declaring support for HTML5, it is responsive and has a number of widgets.

**Widgetised Areas**
- The theme contains the following widgets
* Pre-Header Left
* Pre-Header Right widgetised areas
* Header Right
* Hero - Home Page only *front-page.php*
* Optin
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

**Home Page**
The Home Page has been widgetised and the default Genesis loop has been removed, so any content entered in the visual editor for the home page will not be displayed.

To reverse this behaviour tweak the **front-page.php** file by commenting line 28:
```php
//cgp_genesis_no_content();
```

and uncommenting line 90:
```php
//genesis();
```

**Example**
For an online visual:
https://secure.autopilotyourbusiness.com/genesischild/

**Menus**
- Primary Menu is positioned in Header Right Widget Hook and set to Primary Location
- Secondary Menu remains in default area and is Secondary Location
- SlickNav responsive menu targetted for the Primary Navigation set to toggle at 600px wide - Commented in **functions.php** and **style.css** for adjustments

**Javascripts**
- FontAwesome is enabled.
- placeholder.js is enabled.

**CSS**
- Regular style.css with all Genesis Framework and placeholders to start new project
- 2 x IE styles in CSS directory, one targets IE8 and lower, the other IE9 and lower

**WooCommerce**
- WooCommerce style sheet set to load before main style sheet
- Some generic CSS styles declared in styles.css
- WooCommerce theme support declared as an action in functions.php but commented out

**Miscellaneous**
- PHP is enabled to execute in widget areas
- Shortcode enabled in widget areas
- 'Read More' link is enabled on post excerpts
- Comments header changed to 'Leave a Comment'
- HTML Tags and Attributes is removed from comments
- Facebook HTML5 function and action are declared in functions.php but commented out
- The font 'Open Sans' is enqueued from Google Fonts in functions.php
- Author name removed in Post Meta for posts

Download the zip rename the theme '**genesischild**' - place this theme in your WordPress installation **"/wp-content/themes/"** and activate in WordPress Dashboard

![Genesis Child Theme](http://coolestguidesontheplanet.com/wp-content/themes/gee/images/genesis-markedup1.png)

![Genesis Child Theme Widget Areas](http://coolestguidesontheplanet.com/wp-content/themes/gee/images/genesischild-widgets.png)


