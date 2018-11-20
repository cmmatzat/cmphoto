<?php
/* ============ Text/Image Section ============ */
/*  A Text/Image Section is a content template
    that puts the given php content into a
    standard content section, optionally
    restricted to the default content area.
   --------------------------------------------
    Required:
      'text_file' - Content to fill text area
      'image_file' - Image to display with text
   --------------------------------------------
    Optional:
      'id' - Id for content section
      'class' - Class for content section
      'img_pos' - Image relative position
      'img_path' - Alternate image path
      'text_path' - Alternate text path
      'alt' - Image alt text
                                              */

class TextImageSection extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'ti_sec';
  const DFLT_POS = array( 'v' => 'top', 'h' => 'left' );

  /***************************************
    new TextImageSection()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Text/Image Section.
  ***************************************/
  public function __construct(
      $text_file  = "cnt_not_found.php",
      $img_file   = "not_found.jpg",
      $img_pos    = TextImageSection::DFLT_POS,
      $text_path  = false,
      $img_path   = false
      )
  {
    parent::__construct();

    $this->setContent( 'tpl_text_image_section.php' );
    $this->addLocalCss( 'ti_sec.css' );

    $this->setText( $text_file, $text_path );
    $this->setImage( $img_file, $img_path, $img_pos );
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    setText()
  ----------------------------------------
    Set the path for the text content.
    Use the standard view path if the
    path is false, otherwise use
    that path.
  ***************************************/
  public function setText( $file, $path = false )
  {
    $this->setVarKeyValuePair( 'text_path', $path ? $path . $file : VIEW_PATH . $file );
  }

  /***************************************
    setImage()
  ----------------------------------------
    Set the path for the image content.
    Use the standard view path if the
    path is false, otherwise use
    that path.
    Also set the position of the image.
  ***************************************/
  public function setImage( $file, $path = false, $pos = TextImageSection::DFLT_POS )
  {
    $this->setVarKeyValuePair( 'image_path', $path ? $path . $file : IMG_PATH . $file );
    $this->setImagePos( $pos );
  }

  /***************************************
    setImagePos()
  ----------------------------------------
    Set the image position
  ***************************************/
  public function setImagePos( $pos = TextImageSection::DFLT_POS )
  {
    $pos_str = ( array_key_exists( 'v', $pos ) && $pos['v'] == 'bottom' ) ? 'img-bottom' : 'img-top';
    $pos_str .= ( array_key_exists( 'h', $pos ) && $pos['h'] == 'right' ) ? ' img-right' : ' img-left';
    $this->setVarKeyValuePair( 'img_pos', $pos_str );
  }

  /***************************************
    setImageAltText()
  ----------------------------------------
    Set the image alt text
  ***************************************/
  public function setImageAltText( $text )
  {
    $this->setVarKeyValuePair( 'alt', $text );
  }
}
?>
