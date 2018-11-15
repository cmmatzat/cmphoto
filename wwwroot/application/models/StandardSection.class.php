<?php
/* ============ Standard Section ============ */
/*  A Standard Section is a content template
    that puts the given php content into a
    standard content section, optionally
    restricted to the default content area.
   ------------------------------------------
    Required:
      'content' - Content to fill section
   ------------------------------------------
    Optional:
      'id' - Id for content section
      'class' - Class for content section
      'restrict' - Restrict to content area
                                              */

class StandardSection extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'std_sec';

  /***************************************
    new StandardSection()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    Standard Section.
  ***************************************/
  public function __construct( $inner_content = "cnt_not_found.php", $alt_path = false )
  {
    parent::__construct();
    
    $this->setContent( 'tpl_standard_section.php' );
    $this->setInnerContent( $inner_content, $alt_path );
    $this->restrictContentArea();
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    setInnerContent()
  ----------------------------------------
    Set the path for the inner content.
    Use the standard view path if the
    path is false, otherwise use
    that path.
  ***************************************/
  public function setInnerContent( $file, $path = false )
  {
    $this->setVarKeyValuePair( 'content_path', $path ? $path . $file : VIEW_PATH . $file );
  }

  /***************************************
    restrictContentArea()
  ----------------------------------------
    Set restrict to true.
  ***************************************/
  public function restrictContentArea()
  {
    $this->setVarKeyValuePair( 'restrict', true );
  }

  /***************************************
    relaxContentArea()
  ----------------------------------------
    Set restrict to false.
  ***************************************/
  public function relaxContentArea()
  {
    $this->setVarKeyValuePair( 'restrict', false );
  }
}
?>
