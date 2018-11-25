<?php
/* ============ Gallery Section ============ */
/*  A Gallery Section is a content template
    that generates an image gallery based
    on a given gallery folder.
   -----------------------------------------
    Required:
      'rel_path' - Local path to gallery
      'active' - Dictates if gallery shown
   -----------------------------------------
    Optional:
      'id' - Id for content section
      'class' - Class for content section
                                             */

class GallerySection extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'gal_sec';

  /***************************************
    new GallerySection()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Gallery Section.
  ***************************************/
  public function __construct( $rel_path  = "", $active = true )
  {
    parent::__construct();

    $this->setContent( 'tpl_gallery_section.php' );
    $this->addLocalCss( 'gal_sec.css' );

    $this->setGalleryPath( $rel_path );
    $this->setActive( $active );
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    setGalleryPath()
  ----------------------------------------
    Set the path for the gallery using
    the given path relative to the root
    gallery directory.
  ***************************************/
  public function setGalleryPath( $path = "" )
  {
    $this->setVarKeyValuePair( 'gal_path', GALLERY_PATH . $path );
  }

  /***************************************
    setActive()
  ----------------------------------------
    Designate the gallery as active or
    inactive. (Only needed for nested
    gallery pages)
  ***************************************/
  public function setActive( $active = false )
  {
    $this->setVarKeyValuePair( 'active', $active );
  }
}
?>
