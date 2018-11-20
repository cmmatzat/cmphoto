window.addEventListener( "load", function() {
    var loadable_images = document.querySelectorAll( 'img[preload]' );
    for (var x = 0; x < loadable_images.length; x++ ) {
        if ( loadable_images[x].hasBeenLoaded !== true ) {
            preloadImage( loadable_images[x] );
            loadable_images[x].hasBeenLoaded = true;
        }
    }
});

function preloadImage( img ) {

    // Get desired image source
    var src = img.dataset.src;

    // Create temp Image
    var temp_img = new Image();
    temp_img.onload = function() {
        img.src = src;
    }

    // Load image
    temp_img.src = src;
}