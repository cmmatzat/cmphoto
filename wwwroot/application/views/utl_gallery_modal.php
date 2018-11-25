<?php
/* ----------------------------------- *
 * utl_gallery_modal.php
 * ----------------------------------- *
 * Create a modal popup to zoom in on
 * an image and display at full res.
 * ----------------------------------- *
 * Model: GalleryModalUtility
 * ----------------------------------- */

// Get this section's variables
array_shift( $pg_vars['util'] );
?>

<div id="gallery-modal">
  <a onclick="modalClose()" href="javascript:void(0)" class="modal-icon" id="modal-close">
    <i class="fas fa-times"></i>
  </a>
  <a onclick="modalNextImage()" href="javascript:void(0)" class="modal-icon" id="modal-next">
    <i class="fas fa-chevron-circle-right"></i>
  </a>
  <a onclick="modalPrevImage()" href="javascript:void(0)" class="modal-icon" id="modal-prev">
    <i class="fas fa-chevron-circle-left"></i>
  </a>
  <div class="modal-img">
    <img data-idx class="framed"/>
  </div>
</div>