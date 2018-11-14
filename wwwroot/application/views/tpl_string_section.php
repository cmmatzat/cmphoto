<?php
/* ----------------------------------- *
 * tpl_string_section.php
 * ----------------------------------- *
 * Create a page section that displays
 * the given text string in a standard
 * content area.
 * ----------------------------------- *
 * Model: StringSection
 *	Requires:	string
 *	Optional:	id, class
 * ----------------------------------- */

// Get this section's variables
$sec_vars = array_shift( $pg_vars['str_sec'] );
?>

<section <?php if ( $sec_vars['id'] ) { echo 'id="' . $sec_vars['id'] . '"'; } ?> <?php if ( $sec_vars['class'] ) { echo "class='" . $sec_vars['class'] . "'"; } ?>>
  <div class="content-width">
    <?php echo $sec_vars['string']; ?>
  </div>
</section>
