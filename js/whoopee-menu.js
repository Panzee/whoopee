( function( $ ) {
	$( '.is-click-hamburger' ).click( function() {
		$( '.p-hamburger-nav' ).toggleClass( 'u-visible' );
	} );
	
	$( window ).on( 'load resize', function() {
		height = $( '.p-header-area1' ).outerHeight();
		$( '.p-header-area2' ).css( 'margin-top', height + 'px' );
	} );
} )( jQuery );