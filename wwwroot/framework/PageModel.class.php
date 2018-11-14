<?php
/* ============ Page Model ============ */
/*  The Page Model is used to hold the
    pieces of information used to build
    the eventual webpage, and eventually
    generate the page based on those
    pieces.                             */

class PageModel
{
  // Instance variables
  private $page_el;

  /***************************************
    new PageModel()
  ----------------------------------------
    Initializes the Page Model with
    default elements and empty arrays.
  ***************************************/
  public function __construct()
  {
    $this->page_el = [];
    $this->page_el['pg_head']     = VIEW_PATH . "dft_head.php";
    $this->page_el['pg_css']      = [];
    $this->page_el['pg_nav']      = VIEW_PATH . "dft_nav.php";
    $this->page_el['pg_header']   = false;
    $this->page_el['pg_php']      = [];
    $this->page_el['pg_vars']     = [];
    $this->page_el['pg_content']  = [];
    $this->page_el['pg_footer']   = VIEW_PATH . "dft_footer.php";
    $this->page_el['pg_js']       = [];
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
    array_push( $this->page_el['pg_css'], $css_str ) ;
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
    setPageHeader()
  ----------------------------------------
    Use the given header view as the
    page header.
  ***************************************/
  public function setPageHeader( $pg_header )
  {
    $this->page_el['pg_header'] = VIEW_PATH . $pg_header;
  }

  /***************************************
    addPhp()
  ----------------------------------------
    Add the given path to a PHP file to
    the array of PHP scripts needed for
    the page.
  ***************************************/
  public function addPhp( $php_url )
  {
    array_push( $this->page_el['pg_php'], $php_url ) ;
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
    addVarKeyValuePair()
  ----------------------------------------
    Add a variable to the page variables
    to be accessed with the given key.
  ***************************************/
  public function addVarKeyValuePair( $key, $value )
  {
    $this->page_el['pg_vars'][$key] = $value;
  }

  /***************************************
    addVars()
  ----------------------------------------
    Merge the given array of variables
    into the existing set of page
    variables.
  ***************************************/
  public function addVars( $vars )
  {
    $this->page_el['pg_vars'] = array_merge( $this->page_el['pg_vars'], $vars );
  }

  /***************************************
    addView()
  ----------------------------------------
    Add the given view to the array of
    page contents.
  ***************************************/
  public function addView( $view )
  {
    $path = VIEW_PATH . $view;
    array_push( $this->page_el['pg_content'], $path );
  }

  /***************************************
    addContent()
  ----------------------------------------
    Add the given page content and
    related elements to the page.
  ***************************************/
  public function addContent( $section ) {
    array_push( $this->page_el['pg_content'], $section->getContent() );
    $this->page_el['pg_css'] = array_merge( $this->page_el['pg_css'], $section->getCss() );
    $this->page_el['pg_php'] = array_merge( $this->page_el['pg_php'], $section->getPhp() );
    $this->page_el['pg_js'] = array_merge( $this->page_el['pg_js'], $section->getJs() );
    $this->page_el['pg_vars'] = array_merge_recursive( $this->page_el['pg_vars'], $section->getVars() );
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
    array_push( $this->page_el['pg_js'], $js_str ) ;
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
  //  HELPER FUNCTIONS
  //===========================================================================
  public function printPage()
  {
    // TODO: Add 'page not found' if no content
    if ( count( $this->page_el['pg_content'] ) == 0 )
    {
      //$this->addView();
    }

    // Create local vars to be used by page elements
    $pg_css = $this->page_el['pg_css'];
    $pg_js = $this->page_el['pg_js'];
    $pg_vars = $this->page_el['pg_vars'];

    // Print the page head, adding in css as needed
    include $this->page_el['pg_head'];

    // Include page php
    foreach( $this->page_el['pg_php'] as $php_path )
    {
      include $php_path;
    }

    // Print the page navigation
    include $this->page_el['pg_nav'];

    // Print the header if one is provided
    if ( false != $this->page_el['pg_header'] )
    {
      include $this->page_el['pg_header'];
    }

    // Print page contents
    foreach( $this->page_el['pg_content'] as $pg_content )
    {
        include $pg_content;
    }

    // Print the page footer, adding in js as needed
    include $this->page_el['pg_footer'];
  }

}

?>