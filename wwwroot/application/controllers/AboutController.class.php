<?php
/* ============ Index Controller ============ */
/*  The Index Controller launches the main
    homepage for the website.                 */

// Include needed Content Models
include_once( MODEL_PATH . 'TextImageSection.class.php' );

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
    $this->page_model->setPageHeader( 'hdr_home.php' );
    $this->page_model->addLocalCss( 'home.css' );
    $this->page_model->addLocalJs( 'hdr_home.js' );

    $welcome = new TextImageSection( 'cnt_about_cmp.php', 'corey-matzat.jpg', array( 'v' => 'bottom', 'h' => 'left' ) );
    $welcome->setClass( 'theme-light-light' );
    $this->page_model->addContent( $welcome );

    $welcome = new TextImageSection( 'cnt_about_background.php', 'corey-matzat.jpg', array( 'v' => 'bottom', 'h' => 'right' ) );
    $welcome->setClass( 'theme-light-light' );
    $this->page_model->addContent( $welcome );

    $welcome = new TextImageSection( 'cnt_about_corey.php', 'corey-matzat.jpg', array( 'v' => 'bottom', 'h' => 'left' ) );
    $welcome->setClass( 'theme-light-light' );
    $this->page_model->addContent( $welcome );

    $this->page_model->printPage();
  }

}

?>
