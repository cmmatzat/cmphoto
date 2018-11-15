<?php
/* ----------------------------------- *
 * tpl_text_image_section.php
 * ----------------------------------- *
 * Create a page section that displays
 * both an image and text content.
 * On mobile, they are arranged
 * vertically. On desktop, they are
 * arranged horizontally.
 * ----------------------------------- *
 * Model: TextImageSection
 *	Requires: text_path, image_path
 *	Optional: id, class, img_pos
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['ti_sec'] );
?>

<section <?php if ( $sec_vars['id'] ) { echo 'id="' . $sec_vars['id'] . '"'; } ?> <?php if ( $sec_vars['class'] ) { echo 'class="' . $sec_vars['class'] . '"'; } ?>>
  <div class="ti-sec content-width <?php if ( array_key_exists( 'img_pos', $sec_vars ) ) { echo $sec_vars['img_pos']; } ?>">
    <img class="ti-sec-img framed" src="<?php echo $sec_vars['image_path']; ?>"/>
    <div class="ti-sec-txt">
      <?php include $sec_vars['text_path']; ?>
    </div>
  </div>
</section>
