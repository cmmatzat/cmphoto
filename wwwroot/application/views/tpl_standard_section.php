<?php
/* ----------------------------------- *
 * tpl_standard_section.php
 * ----------------------------------- *
 * Create a page section that displays
 * the given page content.
 * If restrict is given, limit to
 * default content width.
 * ----------------------------------- *
 * Model: StandardSection
 *	Requires: content_path, restrict
 *	Optional: id, class
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['std_sec'] );
?>

<section <?php echo_id( $sec_vars ); echo_class( $sec_vars ); ?>>
  <?php if ( $sec_vars['restrict'] ): ?><div class="content-width"><?php endif; ?>
    <?php include $sec_vars['content_path']; ?>
  <?php if ( $sec_vars['restrict'] ): ?></div><?php endif; ?>
</section>
