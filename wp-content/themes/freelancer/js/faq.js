/* jQuery */
/**
 * faq.js.
 *
 */
( function( $ ) {
	$( '.faq__row' ).on( 'click', '.faq__header', function() {
	  const row = $( this ).parent();
	  if ( row.hasClass( 'active' ) ) {
			row.removeClass( 'active' );
		} else {
			row.addClass( 'active' );
			row.siblings().removeClass( 'active' );
		}
		return false;
	} );
}( jQuery ) );
