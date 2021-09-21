/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// General Options: Colors and Fonts

	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#masthead' ).css( 'background-color', to );
		} );
	} );

	wp.customize('primary_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--primary-color', to);
			}
		);
	}
	);

	wp.customize('secondary_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--secondary-color', to);
			}
		);
	}
	);

	wp.customize('text_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--text-color', to);
			}
		);
	}
	);

	wp.customize('light_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--light-color', to);
			}
		);
	}
	);

	wp.customize('dark_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--dark-color', to);
			}
		);
	}
	);

	wp.customize('grey_color',function ( value ) {
		value.bind(function ( to ) {
				document.body.style.setProperty('--grey-color', to);
			}
		);
	}
	);

	wp.customize( 'site_color', function( value ) {
		value.bind( function( to ) {
			$( 'header .site-title a' ).css( 'color', to );
		} );
	} );

	
	wp.customize( 'font_family', function( value ) {
		value.bind( function( to ) {
			$("head").append("<link href='https://fonts.googleapis.com/css?family=" + to + ":200,300,400,500,600,700,800,900|' rel='stylesheet' type='text/css'>");
			$( 'body,p' ).css( 'font-family', to );
		} );
	} );


	wp.customize( 'font_size', function( value ) {
		value.bind( function( to ) {
			$( 'body,p' ).css( 'font-size', to );
		} );
	} );


	wp.customize( 'site_identity_font_family', function( value ) {
		value.bind( function( to ) {
			$("head").append("<link href='https://fonts.googleapis.com/css?family=" + to + ":200,300,400,500,600,700,800,900|' rel='stylesheet' type='text/css'>");
			$( 'header .site-title a' ).css( 'font-family', to );
		} );
	} );



	// General Options: Heading Optionn

	wp.customize( 'heading_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6, .speaker-title' ).css( 'font-weight', to );
		} );
	} );



	wp.customize( 'virtual_conference_heading_1_size', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'virtual_conference_heading_2_size', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'virtual_conference_heading_3_size', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'virtual_conference_heading_4_size', function( value ) {
		value.bind( function( to ) {
			$( 'h4,  .speaker-title' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'virtual_conference_heading_5_size', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'virtual_conference_heading_6_size', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-size', to + 'px' );
		} );
	} );


	wp.customize( 'blog_post_view', function( value ) {
		value.bind( function( to ) {
			$( '.blog-list-block' ).attr( 'class', 'blog-list-block' );
			$( '.blog-list-block' ).addClass( ' ' + to );
		} );
	} );

	wp.customize( 'event_title', function( value ) {
        value.bind( function( to ) {
            $( '.caption .title' ).text( to );
        } );
    } );

    wp.customize( 'event_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '#banner .caption .title' ).css( 'font-size', to + 'px' );
        } );
    } );

    wp.customize( 'event_description', function( value ) {
        value.bind( function( to ) {
            $( '.caption p' ).text( to );
        } );
    } );

    wp.customize( 'event_venue', function( value ) {
        value.bind( function( to ) {
            $( '.location' ).text( to );
        } );
    } );

    wp.customize( 'cta_1_button_label', function( value ) {
        value.bind( function( to ) {
            $( '.group-btn .cta-1' ).text( to );
        } );
    } );

    wp.customize( 'cta_2_button_label', function( value ) {
        value.bind( function( to ) {
            $( '.group-btn .cta-2' ).text( to );
        } );
    } );

} )( jQuery );
