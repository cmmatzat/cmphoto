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
 *	Optional: id, class, img_pos, alt
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['ti_sec'] );
?>

<section <?php echo_id( $sec_vars ); echo_class( $sec_vars ); ?>>
  <div class="ti-sec content-width <?php echo_array_key( $sec_vars, 'img_pos' ); ?>">
    <img class="ti-sec-img framed" <?php echo_alt_text( $sec_vars, 'alt', 'image_path' ); echo_img_path( $sec_vars['image_path'] ); ?> preload/>
    <div class="ti-sec-txt">
      <?php include $sec_vars['text_path']; ?>
    </div>
  </div>
</section>
