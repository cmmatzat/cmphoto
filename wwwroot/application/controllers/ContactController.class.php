<?php
/* ============ Contact Controller ============ */
/*  The Contact Controller launches presents a
    contact form and other contact information.       */

// Include needed Content Models
include_once( MODEL_PATH . 'StandardSection.class.php' );

class ContactController extends Controller
{
  // Instance variables

  /***************************************
    new ContactController()
  ----------------------------------------
    Call parent constructor to initialize.
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
    Welcome the visitor to the contact
    page and provide a contact form.
  ***************************************/
  public function index( $args = false )
  {
    // Page-unique CSS
    $this->page_model->addLocalCss( 'contact.css' );

    // Welcome Message
    $welcome = new StandardSection( 'cnt_contact_welcome.php' );
    $welcome->setClass( 'theme-dark-dark' );
    $this->page_model->addContent( $welcome );

    // Contact Form
    $form = new StandardSection( 'frm_contact.php' );
    $form->addLocalPhp( 'frm_contact_handler.php' );
    $form->addLocalJs( 'frm_contact_listener.js' );
    $form->setClass( 'theme-dark' );
    $this->page_model->addContent( $form );

    // Print Page
    $this->page_model->printPage();
  }
}

?>
