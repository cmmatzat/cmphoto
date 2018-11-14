<?php
/* ============ String Section ============ */
/*  A String Section is a content template
    that prints input text into a section.
   ----------------------------------------
    Required:
      'string' - Content to fill section
   ----------------------------------------
    Optional:
      'id' - Id for content section
      'class' - Class for content section
                                            */

class StringSection extends ContentModel
{
  // Instance variables
  protected $sec_id_str = 'str_sec';

  /***************************************
    new StringSection()
  ----------------------------------------
    Initializes the parent Content Model
    and modifies needed defaults for
    String Section.
  ***************************************/
  public function __construct( $str = "" )
  {
    parent::__construct();
    
    $this->setContent( 'tpl_string_section.php' );
    $this->setString( $str );
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    setString()
  ----------------------------------------
    Set the string for the section to the
    given string.
  ***************************************/
  public function setString( $str )
  {
    $this->setVarKeyValuePair( 'string', $str );
  }
}