<?php
  /* ============ Website Configutation ============ */
  /*  This is the main configuration page for the
      website. It includes path constants, defaults,
      and includes base framework classes.           */

  /* ~~~~~ PATH CONSTANTS ~~~~~ */ 
  // Root Paths
  define( "DS",             DIRECTORY_SEPARATOR );
  define( "ROOT",           $_SERVER["DOCUMENT_ROOT"] );  // No trailing DS
  define( "FRAMEWORK_PATH", ROOT . "framework" . DS );
  define( "APP_PATH",       DS . "application" . DS );

  // MVC Paths
  define( "CONTROLLER_PATH",  ROOT . APP_PATH . "controllers" . DS );
  define( "MODEL_PATH",       ROOT . APP_PATH . "models" . DS );
  define( "VIEW_PATH",        ROOT . APP_PATH . "views" . DS );

  // Image Paths
  define( "IMG_PATH",     APP_PATH . "images" . DS );
  define( "GALLERY_PATH", IMG_PATH . "galleries" . DS );
  define( "LOGO_PATH",    IMG_PATH . "logo" . DS );
  
  // Style Paths
  define( "STYLE_PATH", APP_PATH . "style" . DS );
  define( "CSS_PATH",   STYLE_PATH . "css" . DS );
  define( "SASS_PATH",  STYLE_PATH . "sass" . DS );

  // Script Paths
  define( "SCRIPT_PATH",  APP_PATH . "scripts" . DS );
  define( "PHP_PATH",     ROOT . SCRIPT_PATH . "php" . DS );
  define( "JS_PATH",      SCRIPT_PATH . "js" . DS );

  // Include important base classes
  include_once( FRAMEWORK_PATH . 'Router.class.php' );
  include_once( FRAMEWORK_PATH . 'Controller.class.php' );
  include_once( FRAMEWORK_PATH . 'PageModel.class.php' );
  include_once( FRAMEWORK_PATH . 'SectionModel.class.php' );

  // Define the default Controller
  defined( "DEFAULT_CONTROLLER" ) or define( "DEFAULT_CONTROLLER", "IndexController" );
?>