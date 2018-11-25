<?php
/* ============ Gallery Modal Utility ============ */
/*  A Gallery Modal Utility is a utility that
    launches a modal image viewer.
                                                   */

class GalleryModalUtility extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'util';

  /***************************************
    new GalleryModalUtility()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Gallery Modal Utility.
  ***************************************/
  public function __construct()
  {
    parent::__construct();

    $this->setContent( 'utl_gallery_modal.php' );
    $this->addLocalCss( 'gal_modal.css' );
    $this->addLocalJs( 'utl_gallery_modal.js' );
  }

}
?>
