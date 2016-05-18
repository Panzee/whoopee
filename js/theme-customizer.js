( function( $ ) {
	wp.customize( 's-whoopee-layout-header', function( value ) {
       value.bind( function( newval ) {
           // なんかする（newval 変数が新しい設定値を持っています)
    	   //$( '#test' ).text( newval );
       } );
   } );
} )( jQuery );