<?php
/* ============ Portfolio Controller ============ */
/*  The Portfolio Controller launches image
    galleries based on the URI arguments.         */

// Include needed Content Models
include_once( MODEL_PATH . 'StandardSection.class.php' );
include_once( MODEL_PATH . 'StringSection.class.php' );
include_once( MODEL_PATH . 'ImageLinkSection.class.php' );
include_once( MODEL_PATH . 'TextImageSection.class.php' );
include_once( MODEL_PATH . 'GallerySection.class.php' );
include_once( MODEL_PATH . 'GalleryModalUtility.class.php' );
include_once( MODEL_PATH . 'GalleryTabUtility.class.php' );

class PortfolioController extends Controller
{
  // Instance variables

  /***************************************
    new PortfolioController()
  ----------------------------------------
    Call parent constructor to initialize
    and set new default method.
  ***************************************/
  public function __construct()
  {
    parent::__construct();
    $this->default_method = 'gallery';
  }


  //===========================================================================
  //  PAGE FUNCTIONS
  //===========================================================================

  /***************************************
    index()
  ----------------------------------------
    Welcome the visitor to the portfolio
    and provide a set of image links to
    send them to the main portfolio pages
  ***************************************/
  public function index( $args = false )
  {
    $welcome = new StandardSection( 'cnt_portfolio_welcome.php' );
    $welcome->setClass( 'theme-dark-dark' );
    $this->page_model->addContent( $welcome );

    $sports = new TextImageSection( 'cnt_portfolio_sports.php', 'kc-triathlon-swimmer.jpg', array( 'v' => 'top', 'h' => 'left' ) );
    $sports->setClass( 'theme-color' );
    $this->page_model->addContent( $sports );

    $portraits = new TextImageSection( 'cnt_portfolio_portraits.php', 'chisholm-family-portrait.jpg', array( 'v' => 'top', 'h' => 'right' ) );
    $portraits->setClass( 'theme-light-light' );
    $this->page_model->addContent( $portraits );

    $nature = new TextImageSection( 'cnt_portfolio_nature.php', 'saint-vrain-creek.jpg', array( 'v' => 'top', 'h' => 'left' ) );
    $nature->setClass( 'theme-dark' );
    $this->page_model->addContent( $nature );

    $galleries = new ImageLinkSection( array(
      array(
        'image' => 'kc-triathlon-swimmer.jpg',
        'url' => '/portfolio/sports',
        'label' => 'Sports'
      ),
      array(
        'image' => 'chisholm-family-portrait.jpg',
        'url' => '/portfolio/portraits',
        'label' => 'Portraits'
      ),
      array(
        'image' => 'saint-vrain-creek.jpg',
        'url' => '/portfolio/nature',
        'label' => 'Nature'
      )
    ));
    $galleries->setClass( 'theme-light' );
    $this->page_model->addContent( $galleries );

    $this->page_model->printPage();
  }

  /***************************************
    gallery()
  ----------------------------------------
    Create a gallery page for the given
    folder. It can either be a single
    gallery or a nested gallery.
  ***************************************/
  public function gallery( $args = false )
  {
    // If gallery is invalid, revert to portfolio index.
    if ( $args == false || !$this->galleryFolderExists( $args[0] ) )
    {
      $this->index( $args );
    }
    else
    {
      // Search for most specific gallery from URI
      $gallery_name = array_shift( $args );
      $gallery_rel_path = $gallery_name . DS;
      while ( count( $args ) && $this->galleryFolderExists( $gallery_root . $args[0] ) )
      {
        $gallery_name = array_shift( $args );
        $gallery_rel_path .= $gallery_name . DS;
      }

      // Call appropriate gallery method (nested/standard)
      if ( $this->galleryFileExists( $gallery_rel_path, 'manifest.php' ) )
      {
        // Nested Gallery
        $this->createNestedGallery( $gallery_rel_path, $gallery_name );
      }
      else
      {
        // Standalone Gallery
        $this->createGallery( $gallery_rel_path, $gallery_name );
      }
    }
  }

  
  //===========================================================================
  //  GALLERY FUNCTIONS
  //===========================================================================

  /***************************************
    createGallery()
  ----------------------------------------
    Create a standalone gallery with
    optional description header. If no
    description provided, go straight
    to the gallery.
  ***************************************/
  private function createGallery( $gal_rel_path, $gal_id )
  {
    // Set default style
    $desc_theme = "theme-med";
    $gal_theme = "theme-dark";

    // Override default style if given
    if ( $this->galleryFileExists( $gal_rel_path, 'style.php' ) )
    {
      include ROOT . GALLERY_PATH . $gal_rel_path . 'style.php';
    }

    // Add description if given
    if ( $this->galleryFileExists( $gal_rel_path, 'description.php' ) )
    {
      $desc = new StandardSection( 'description.php', ROOT . GALLERY_PATH . $gal_rel_path );
      $desc->setClass( $desc_theme );
      $desc->setId( $gal_id . '-gallery-desc' );
      $this->page_model->addContent( $desc );
    }

    // Add photo gallery
    $gal = new GallerySection( $gal_rel_path );
    $gal->setClass( $gal_theme );
    $gal->setId( $gal_id . '-gallery' );
    $this->page_model->addContent( $gal );

    // Add photo modal
    $this->page_model->addContent( new GalleryModalUtility() );

    $this->page_model->printPage();
  }

  private function createNestedGallery( $root_rel_path, $root_id )
  {
    // Fetch the manifest to define $children
    include ROOT . GALLERY_PATH . $root_rel_path . 'manifest.php';

    // Set default style
    $desc_theme   = "theme-med";
    $child_theme  = "theme-light";
    $gal_theme    = "theme-dark";

    // Override default style if given
    if ( $this->galleryFileExists( $root_rel_path, 'style.php' ) )
    {
      include ROOT . GALLERY_PATH . $root_rel_path . 'style.php';
    }

    // Add description
    $root_desc = null;
    if ( $this->galleryFileExists( $root_rel_path, 'description.php' ) )
    {
      $root_desc = new StandardSection( 'description.php', ROOT . GALLERY_PATH . $root_rel_path );
    }
    else
    {
      $root_desc = new StringSection( $this->headerFromFolder( $root_id ) );
    }
    $root_desc->setClass( $desc_theme );
    $root_desc->setId( $root_id . '-gallery-desc' );
    $this->page_model->addContent( $root_desc );

    // Add nested gallery utility
    $this->page_model->addContent( new GalleryTabUtility( $desc_theme, $child_theme, $children ) );

    // Add child gallery descriptions
    foreach ( $children as $child )
    {
      // Add description
      $child_desc = null;
      if ( $this->galleryFileExists( $root_rel_path . $child['dir'] . DS, 'description.php' ) )
      {
        $child_desc = new StandardSection( 'description.php', ROOT . GALLERY_PATH . $root_rel_path . $child['dir'] . DS );
      }
      else
      {
        $child_desc = new StringSection( $this->headerFromFolder( $child['name'] ) );
      }
      $child_desc->setClass( $child_theme . ( array_key_exists( 'default', $child ) ? ' active ' : ' ' ) . 'nest-gal-desc' );
      $child_desc->setId( $child['dir'] . '-desc' );
      $this->page_model->addContent( $child_desc );
    }

    // Add child galleries
    foreach ( $children as $child )
    {
      $child_gal = new GallerySection( $root_rel_path . $child['dir'] . DS, array_key_exists( 'default', $child ) );
      $child_gal->setClass( $gal_theme . ' nest-gal' );
      $child_gal->setId( $child['dir'] . '-gal' );
      $this->page_model->addContent( $child_gal );
    }

    // Add modal utility
    $this->page_model->addContent( new GalleryModalUtility() );

    // Print the page
    $this->page_model->printPage();

  }
  
  //===========================================================================
  //  HELPER FUNCTIONS
  //===========================================================================
  
  /***************************************
    galleryFolderExists()
  ----------------------------------------
    Check if the given folder or folder
    path exists in the main gallery
    directory of the website.
  ***************************************/
  private function galleryFolderExists( $relative_gallery_path )
  {
    return file_exists( ROOT . GALLERY_PATH . $relative_gallery_path );
  }

  /***************************************
    galleryFileExists()
  ----------------------------------------
    Check if the given file exists in the 
    given gallery folder path.
  ***************************************/
  private function galleryFileExists( $relative_gallery_path, $filename )
  {
    return file_exists( ROOT . GALLERY_PATH . $relative_gallery_path . $filename );
  }

  /***************************************
    headerFromFolder()
  ----------------------------------------
    Wrap the given folder name in h2
    header tags.
  ***************************************/
  private function headerFromFolder( $folder )
  {
    return '<h2>' . ucwords( str_replace( '_', ' ', $folder ) ) . '</h2>';
  }

}

?>
