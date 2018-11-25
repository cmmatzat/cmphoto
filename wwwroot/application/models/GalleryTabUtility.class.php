<?php
/* ============ Gallery Tab Utility ============ */
/*  A Gallery Tab Utility is a utility that
    adds tabbed navigation to multiple galleries
    on a nested gallery page.
                                                 */

class GalleryTabUtility extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'gal_tab';

  /***************************************
    new GalleryTabUtility()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Gallery Tab Utility.
  ***************************************/
  public function __construct( $root_style, $child_style, $galleries )
  {
    parent::__construct();

    $this->setContent( 'utl_gallery_tab.php' );
    $this->addLocalCss( 'gal_tab.css' );
    $this->addLocalJs( 'utl_gallery_tab.js' );
    $this->setVarKeyValuePair( 'root_style', $root_style );
    $this->setVarKeyValuePair( 'child_style', $child_style );
    $this->setVarKeyValuePair( 'galleries', $galleries );
  }

}
?>
