<?php
/* ============ Content Model ============ */
/*  The Content Model is a base class that
    serves as a template to hold
    information about a specific piece of
    content on the page. It is mostly used
    with various template views.           */

class ContentModel
{
  // Instance variables
  protected $sec_id_str = 'sec';
  protected $sec_el;

  /***************************************
    new ContentModel()
  ----------------------------------------
    Initializes the Content Model with
    default elements and empty arrays.
  ***************************************/
  public function __construct()
  {
    $this->sec_el = [];
    $this->sec_el['sec_css']      = [];
    $this->sec_el['sec_php']      = [];
    $this->sec_el['sec_vars']     = [];
    $this->sec_el['sec_content']  = VIEW_PATH . "not_found.php";
    $this->sec_el['sec_js']       = [];

    $this->sec_el['sec_vars'] = array(
      'id'            =>  false,
      'class'         =>  false
    );
  }


  //===========================================================================
  //  SET/ADD FUNCTIONS
  //===========================================================================

  /***************************************
    addCss()
  ----------------------------------------
    Create a CSS link for the given URL
    and append it to the CSS array.
  ***************************************/
  public function addCss( $css_url )
  {
    $css_str = '<link rel="stylesheet" type="text/css" href="' . $css_url . '"/>';
    array_push( $this->sec_el['sec_css'], $css_str );
  }

  /***************************************
    addLocalCss()
  ----------------------------------------
    Generate a full path for the given
    local CSS file and call addCss() to
    add it to the CSS array.
  ***************************************/
  public function addLocalCss( $css_file )
  {
    $css_url = CSS_PATH . $css_file;
    $this->addCss( $css_url );
  }

  /***************************************
    addPhp()
  ----------------------------------------
    Add the given path to a PHP file to
    the array of PHP scripts needed for
    the given content.
  ***************************************/
  public function addPhp( $php_url )
  {
    array_push( $this->sec_el['sec_php'], $php_url );
  }

  /***************************************
    addLocalPhp()
  ----------------------------------------
    Generate a full path for the given
    local PHP file and call addPhp() to
    add it to the PHP array.
  ***************************************/
  public function addLocalPhp( $php_file )
  {
    $php_url = PHP_PATH . $php_file;
    $this->addPhp( $php_url );
  }

  /***************************************
    setVarKeyValuePair()
  ----------------------------------------
    Set the variable with the given key
    to the given value. (Will add if key
    does not yet exist.)
  ***************************************/
  public function setVarKeyValuePair( $key, $value )
  {
    $this->sec_el['sec_vars'][$key] = $value;
  }

  /***************************************
    addVarArrayKeyElementPair()
  ----------------------------------------
    Add an element to a variable array
    of the given key.
  ***************************************/
  public function addVarArrayKeyElementPair( $key, $element )
  {
    // Create array if it doesn't exist
    if ( !array_key_exists( $key, $this->sec_el['sec_vars'] ) )
    {
      $this->sec_el['sec_vars'][$key] = [];
    }

    // Add element to array
    $this->sec_el['sec_vars'][$key][] = $element;
  }

  /***************************************
    addVars()
  ----------------------------------------
    Merge the given array of variables
    into the existing set of section
    variables.
  ***************************************/
  public function addVars( $vars )
  {
    $this->sec_el['sec_vars'] = array_merge( $this->sec_el['sec_vars'], $vars );
  }

  /***************************************
    setId()
  ----------------------------------------
    Set the Id for the given section
  ***************************************/
  public function setId( $sec_id )
  {
    $this->setVarKeyValuePair( 'id', $sec_id );
  }

  /***************************************
    setClass()
  ----------------------------------------
    Overwrite the class for the section
    with the given class.
  ***************************************/
  public function setClass( $sec_class )
  {
    $this->setVarKeyValuePair( 'class', $sec_class );
  }

  /***************************************
    addClass()
  ----------------------------------------
    Add the given class to the list of
    classes for the element.
  ***************************************/
  public function addClass( $sec_class )
  {
    if ( !$this->sec_el['sec_vars']['class'] )
    {
      $this->setClass( $sec_class );
    }
    else
    {
      $this->setClass( $this->sec_el['sec_vars']['class'] . ' ' . $sec_class );
    }
  }

  /***************************************
    setContent()
  ----------------------------------------
    Set the content to the given view.
  ***************************************/
  public function setContent( $pg_content )
  {
    $this->sec_el['sec_content'] = VIEW_PATH . $pg_content;
  }

  /***************************************
    addJs()
  ----------------------------------------
    Create a JS script element for the
    given JS URL and append it to the JS
    array.
  ***************************************/
  public function addJs( $js_url )
  {
    $js_str = '<script type="text/javascript" src="' . $js_url . '"></script>';
    array_push( $this->sec_el['sec_js'], $js_str );
  }

  /***************************************
    addLocalJs()
  ----------------------------------------
    Generate a full path for the given
    local JS file and call addJs() to
    add it to the JS array.
  ***************************************/
  public function addLocalJs( $js_file )
  {
    $js_url = JS_PATH . $js_file;
    $this->addJs( $js_url );
  }


  //===========================================================================
  //  GET FUNCTIONS
  //===========================================================================

  /***************************************
    getCss()
  ----------------------------------------
    Return the array of CSS.
  ***************************************/
  public function getCss()
  {
    return $this->sec_el['sec_css'];
  }

  /***************************************
    getPhp()
  ----------------------------------------
    Return the array of PHP.
  ***************************************/
  public function getPhp()
  {
    return $this->sec_el['sec_php'];
  }

  /***************************************
    getVars()
  ----------------------------------------
    Return the content variables.
  ***************************************/
  public function getVars()
  {
    return array( $this->sec_id_str => array( $this->sec_el['sec_vars'] ) );
  }

  /***************************************
    getContent()
  ----------------------------------------
    Return the content view path.
  ***************************************/
  public function getContent()
  {
    return $this->sec_el['sec_content'];
  }

  /***************************************
    getJs()
  ----------------------------------------
    Return the array of JS.
  ***************************************/
  public function getJs()
  {
    return $this->sec_el['sec_js'];
  }

}

?>