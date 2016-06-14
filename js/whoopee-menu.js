( function( $ ) {

	// open or close hamburger menu
	$( '.is-click-hamburger' ).click( function() {
		$( '.p-hamburger-nav' ).toggleClass( 'u-visible' );
	} );
	
	// header height fixed
	var height = jQuery( '.p-header-area1' ).outerHeight();
	jQuery( '#header' ).css( 'padding-top', height + 'px' );

} )( jQuery );