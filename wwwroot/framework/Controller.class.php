<?php
/* ============ Controller ============ */
/*  A controller exists for each page
    type of the website. For example,
    website.com/about would call the
    AboutController.
    Public functions will create
    subpages of this page.              */

class Controller
{
  // Instance variables
  protected $page_model;
  protected $default_method = "index";

  /***************************************
    new Controller()
  ----------------------------------------
    Initialize the controller instance,
    then determine and call the needed
    page creation function.
  ***************************************/
  public function __construct()
  {
    $this->page_model = new PageModel();
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
  public function index( $args = false )
  {
    $this->page_model->printPage();
  }


  //===========================================================================
  //  HELPER FUNCTIONS
  //===========================================================================

  /***************************************
    default()
  ----------------------------------------
    Call the default function for the
    Controller.
  ***************************************/
  public function default( $args = false )
  {
    $method = $this->default_method;
    $this->$method( $args );
  }

}

?>
