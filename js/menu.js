jQuery( function() {
	jQuery( '.is-click-hamburger' ).click( function() {
		jQuery( '.p-hamburger-nav' ).toggleClass( 'u-visible' );
	});
	
	height = jQuery( '.p-header-area1' ).outerHeight();
	jQuery( '.p-header-area2' ).css( 'margin-top', height + 'px' );
});