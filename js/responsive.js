( function( window, $, undefined ) {
	'use strict';

	$( '.nav-primary ' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
	$( '.nav-primary  .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus

	// Show/hide the .nav-primary igation
	$( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
		var $this = $( this );
		$this.attr( 'aria-pressed', function( index, value ) {
			return 'false' === value ? 'true' : 'false';
		});

		$this.toggleClass( 'activated' );
		$this.next( '.nav-primary , .sub-menu' ).slideToggle( 'fast' );

	});

})( this, jQuery );

/*this will work on the main primary navigation - to switch to all Navs search and replace .nav-primary for nav*/