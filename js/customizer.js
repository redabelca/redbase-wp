( function( $ ) {
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newValue ) {
			$( '.header-nav-logo' ).text( newValue );
			$( '.header-center.txt_center h1' ).text( newValue );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newValue ) {
			$( '.header-center.txt_center h4' ).text( newValue );
		} );
	} );
} )( jQuery );
