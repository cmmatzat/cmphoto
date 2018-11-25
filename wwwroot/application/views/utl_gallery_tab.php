<?php
/* ----------------------------------- *
 * utl_gallery_tab.php
 * ----------------------------------- *
 * Create a set of tabs to toggle
 * between a set of nested galleries.
 * ----------------------------------- *
 * Model: GalleryTabUtility
 * ----------------------------------- */

$sec_vars = array_shift( $pg_vars['gal_tab'] );
?>

 <div class="gal-tabs <?php echo $sec_vars['root_style']; ?>">
<?php foreach ( $sec_vars['galleries'] as $gal ): ?>
    <a href="javascript:void(0);" onclick='activateGallery("<?php echo $gal['dir']; ?>")' id="<?php echo $gal['dir'] . '-btn'; ?>" class="<?php echo $sec_vars['child_style']; ?> gal-tab <?php if ( array_key_exists( 'default', $gal ) ) { echo 'active'; }  ?>">
      <?php echo $gal['name']; ?>
    </a>
<?php endforeach; ?>
 </div>