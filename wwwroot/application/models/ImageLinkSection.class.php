<?php
/* ============ Image Link Section ============ */
/*  An Image Link Section is a set of images
    that serve as links.
    There is an optional text header above the
    set of images.
   --------------------------------------------
    Required:
      'images' - Array of images
        ->'image' - The image file
        ->'url' - The link destination
        ->'label' - The link text
   --------------------------------------------
    Optional:
      'id' - Id for content section
      'class' - Class for content section
      'header' - Optional text header
                                              */

class ImageLinkSection extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'il_sec';

  /***************************************
    new ImageLinkSection()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Image Link section.
  ***************************************/
  public function __construct( $images = array(), $image_path = false, $header = false, $header_path = false )
  {
    parent::__construct();
    
    $this->setContent( 'tpl_image_link_section.php' );
    $this->addLocalCss( 'il_sec.css' );
    
    $this->addImageLinks( $images, $image_path );
    
    $this->setTextHeader( $header, $header_path );
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    addImageLinks()
  ----------------------------------------
    Add an array of image links
  ***************************************/
  public function addImageLinks( $images, $path = false )
  {
    foreach ( $images as $image )
    {
        $this->addImageLink( $image, $path );
    }
  }

  /***************************************
    addImageLink()
  ----------------------------------------
    Add a single image link.
    Use the alternate path if image not
    in default image folder.
  ***************************************/
  public function addImageLink( $image, $path = false )
  {
    $image['image'] = ( $path ) ? $path . $image['image'] : IMG_PATH . $image['image'];
    $this->addVarArrayKeyElementPair( 'image_links', $image );
  }

  /***************************************
    setTextHeader()
  ----------------------------------------
    Set the section text header if valid
  ***************************************/
  public function setTextHeader( $header = false, $path = false )
  {
    if ( $header && $path )
    {
      $this->setVarKeyValuePair( 'text_header', $path . $header );
    }
    else if ( $header && !$path )
    {
      $this->setVarKeyValuePair( 'text_header', VIEW_PATH . $header );
    }
    else
    {
      $this->setVarKeyValuePair( 'text_header', false );
    }
  }
}
?>
