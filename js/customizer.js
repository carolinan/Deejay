/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a').css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Body background color.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			if ( '#0a0a0a' !== to ) {
				$( '.grid' ).css( { 
					'background': 'none', 
					'box-shadow': 'none' 
				} );
			} else {
				$( '.grid' ).css( { 
					'background': 'rgba(0,0,0,0.6)', 
					'box-shadow': '0px 1px 2px rgba(0,0,0,0.2)' 
				} );
			}
		} );
	} );


} )( jQuery );
