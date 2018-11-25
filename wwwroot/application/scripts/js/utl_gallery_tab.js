function activateGallery( gal_id ) {
    var active = document.querySelectorAll( '.active' );
    for ( var x = 0; x < active.length; x++ ) {
      active[x].classList.remove( 'active' );
    }
  
    document.getElementById( gal_id + '-btn' ).classList.add( 'active' );
    document.getElementById( gal_id + '-desc' ).classList.add( 'active' );
    document.getElementById( gal_id + '-gal' ).classList.add( 'active' );
}