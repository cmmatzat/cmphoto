<?php
/* ----------------------------------- *
 * tpl_image_link_section.php
 * ----------------------------------- *
 * Create a page section that displays
 * a list of images that are links,
 * as well as an optional text header.
 * ----------------------------------- *
 * Model: ImageLinkSection
 *	Requires: image_links, text_header
 *	Optional: id, class
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['il_sec'] );
?>

<section <?php if ( $sec_vars['id'] ) { echo 'id="' . $sec_vars['id'] . '"'; } ?> <?php if ( $sec_vars['class'] ) { echo 'class="' . $sec_vars['class'] . '"'; } ?>>
  <div class="il-sec content-width">
<?php /* ===== Optional Text Header ===== */ ?>
<?php if ( $sec_vars['text_header'] ): ?>
    <div class="il-header">
      <?php include $sec_vars['text_header']; ?>
    </div>
<?php endif; ?>
<?php /* ===== Include Each Image Link ===== */ ?>
<?php foreach ( $sec_vars['image_links'] as $link ): ?>
    <a class="il-link" href="<?php echo $link['url']; ?>">
      <img class="il-image framed" src="<?php echo $link['image']; ?>"/>
      <span class="il-label"><?php echo $link['label']; ?></span>
    </a>
<?php endforeach; ?>
  </div>
</section>
