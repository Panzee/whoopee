( function( $ ) {
	wp.customize( 's-whoopee-layout-contents', function( value ) {
       value.bind( function( newval ) {
           // なんかする（newval 変数が新しい設定値を持っています)
    	   style = get_layout_main_css( newval );
    	   $( 'head' ).append( style );
       } );
	} );
	wp.customize( 's-whoopee-layout-header', function( value ) {
       value.bind( function( newval ) {
           // なんかする（newval 変数が新しい設定値を持っています)
    	   height = $('.p-header-area1').outerHeight();
    	   style = get_layout_header_css( newval, height );
    	   $( 'head' ).append( style );
       } );
	} );
	wp.customize( 's-whoopee-header-color', function( value ) {
       value.bind( function( newval ) {
    	   style = get_layout_header_color_css( newval );
    	   $( 'head' ).append( style );
       } );
	} );
	wp.customize( 's-whoopee-footer-color', function( value ) {
       value.bind( function( newval ) {
    	   style = get_layout_foooter_color_css( newval );
    	   $( 'head' ).append( style );
       } );
	} );
} )( jQuery );

function get_layout_header_color_css( newval ) {
	style = '<style>';
	style += '.p-header-area1{background-color:' + newval + ';}';
	style += '</style>';
	
	return style;
}
function get_layout_foooter_color_css( newval ) {
	style = '<style>';
	style += '#footer{background-color:' + newval + ';}';
	style += '</style>';
	
	return style;
}
function get_layout_main_css( newval ) {
	
	style = '<style>';
	switch ( newval ) {
	  case 'column-1':
		main_width = '100%';
		side_width = '100%';
	    break;
	  case 'column-2-left':
		flex_direction = 'row-reverse';
		main_width = '66.66667%';
		side_width = '33.33333%';
	    break;
	  case 'column-2-right':
		flex_direction = 'row';
		main_width = '66.66667%';
		side_width = '33.33333%';
	    break;
	  default:
		flex_direction = 'row';
		main_width = '66.66667%';
		side_width = '33.33333%';
	    break;
	}
	
	style += '.is-contents-layout{';
	style += '-webkit-flex-direction:' + flex_direction + ';';
	style += '-ms-flex-direction:' + flex_direction + ';';
	style += 'flex-direction:' + flex_direction + ';';
	style += '}';
	// row--md--3
	style += '@media (min-width: 40em){';
	style += '.is-main-row{';
	style += '-webkit-flex: 0 1 ' + main_width + ';';
	style += '-ms-flex: 0 1 ' + main_width + ';';
	style += 'flex: 0 1 ' + main_width + ';';
	style += '}';

	style += '.is-side-row{';
	style += '-webkit-flex: 0 1 ' + side_width + ';';
	style += '-ms-flex: 0 1 ' + side_width + ';';
	style += 'flex: 0 1 ' + side_width + ';';
	style += '}';
	style += '}';
	
	style += '</style>';
	
	return style;
}

function get_layout_header_css( newval, height ) {
	
	style = '<style>';
	switch ( newval ) {
		case 'default':
			position = 'absolute';
			height = '0';
			break;
		case 'hedaer-fixed':
			position = 'fixed';
			break;
		case 'no-radio-menu':
			break;
		default:
			position = 'absolute';
			break;
	}
	style += '.is-site-header{';
	style += 'position:' + position + ';';
	style += 'top:0;';
	style += 'left:0;';
	style += 'right:0;';
	style += 'box-shadow:0 .1rem .3rem .1rem #aaa;';
	style += '}';
	
	style += '</style>';
	
	return style;
}