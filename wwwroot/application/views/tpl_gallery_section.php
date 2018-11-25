<?php
/* ----------------------------------- *
 * tpl_gallery_section.php
 * ----------------------------------- *
 * Create a page section that displays
 * a gallery of images from the given
 * folder.
 * ----------------------------------- *
 * Model: GallerySection
 *	Requires: gal_path, active
 *	Optional: id, class
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['gal_sec'] );
?>

<section <?php echo_id( $sec_vars ); ?> class="gal-sec <?php echo_array_key( $sec_vars, 'class' ); if ( $sec_vars['active'] ) { echo ' active'; } ?>">

<?php
  $photo_index = 0;
  foreach( scandir( ROOT . $sec_vars['gal_path'] ) as $file )
  {
    if ( (pathinfo( $file ))['extension'] == "jpg" )
    {
      $photo_path = $sec_vars['gal_path'] . $file;
      $photo_name = ucwords( str_replace( '-', ' ', pathinfo( $file )['filename'] ) );
?>
  <div class="gal-img"><img class="framed" data-idx="<?php echo $photo_index; ?>" <?php echo_img_path( $photo_path ); ?> alt="<?php echo $photo_name; ?>" preload/></div>
<?php
      $photo_index++;
    }
  }
?>

</section>
