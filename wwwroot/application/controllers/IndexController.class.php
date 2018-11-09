<?php
/* ============ Index Controller ============ */
/*  The Index Controller launches the main
    homepage for the website.                 */

// Include needed Content Models
//include_once( MODEL_PATH . 'ImageLinkSection.class.php' );
//include_once( MODEL_PATH . 'TextImageTwoColSection.class.php' );

class IndexController extends Controller
{
  // Instance variables

  /***************************************
    new IndexController()
  ----------------------------------------
    Call parent constructor to initialize 
  ***************************************/
  public function __construct()
  {
    parent::__construct();
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

}

?>
