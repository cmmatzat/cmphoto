document.getElementById( "gallery-modal" ).addEventListener( "click", function( event ) {
    if ( event.target === this ) {
        modalClose();
    }
});
  
window.addEventListener( "resize", function( event ) {
    var wndw_wdth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (wndw_wdth < 600) {
        modalClose();
    }
});
  
window.addEventListener( "click", function( event ) {
    var imgs = document.querySelectorAll(".gal-img img");
    if (Array.from(imgs).includes(event.target)) {
        modalOpenImage(event.target.dataset.idx);
    }
});

function modalOpenImage( img_idx ) {
    var wndw_wdth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (wndw_wdth >= 600) {
        var modal = document.getElementById("gallery-modal");
        var modal_img = document.querySelector(".modal-img img");
    
        var source_string = '.active [data-idx="' + img_idx + '"]';
        var source_img = document.querySelectorAll(source_string)[0];
    
        modal_img.dataset.idx = img_idx;
        modal_img.src = source_img.dataset.full;
    
        modal.classList.add("show");
    }
}
  
function modalClose() {
    document.getElementById("gallery-modal").classList.remove("show");
}
  
function modalNextImage() {
    modalSwitchImage( 1 );
}
  
function modalPrevImage() {
    modalSwitchImage( -1 );
}
  
function modalSwitchImage( dir ) {
    var modal_img = document.querySelector(".modal-img img");
    var img_count = document.querySelectorAll('.active [data-idx]').length;
    var modal_idx = parseInt(modal_img.dataset.idx);
    var img_idx = ( modal_idx + img_count + dir ) % img_count;
    modalOpenImage( img_idx );
}