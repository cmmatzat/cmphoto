<?php
/* ============ Controller ============ */
/*  A controller exists for each page
    type of the website. For example,
    website.com/about would call the
    AboutController.
    The controller calls a function to
    create a specific version of that
    page based on the passed URI args.  */

class Controller
{
  // Instance variables
  protected $page_model;
  protected $uri;

  protected $default_method = "index";
  protected $valid_page_calls = array(
      "index"
    );

  /***************************************
    new Controller()
  ----------------------------------------
    Initialize the controller instance,
    then determine and call the needed
    page creation function.
  ***************************************/
  public function __construct( $uri )
  {
    $this->page_model = new PageModel();
    $this->uri = $uri;

    $method = $this->getMethod();
    $this->$method();
  }


  //===========================================================================
  //  PAGE FUNCTIONS
  //===========================================================================

  /***************************************
    index()
  ----------------------------------------
    Based on the provided URI, return
    the name of the function to be used
    to construct the resulting page.
  ***************************************/
  protected function index( $args = false )
  {
    $this->page_model->printPage();
  }


  //===========================================================================
  //  HELPER FUNCTIONS
  //===========================================================================

  /***************************************
    getMethod()
  ----------------------------------------
    Based on the provided URI, return
    the name of the function to be used
    to construct the resulting page.
  ***************************************/
  protected function getMethod()
  {
    // Check for non-null URI argument,
    // then check against valid calls list
    if ( ( $this->uri != NULL ) && ( $this->uri[0] != NULL )
      && in_array( $this->uri[0], $this->valid_page_calls ) )
    {
      // Return valid function name
      // Shift function name out of URI array
      return strtolower( array_shift( $this->uri ) );
    }
    else
    {
      // Return default function name
      return $this->default_method;
    }
  }

}

?>
