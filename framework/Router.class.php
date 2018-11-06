<?php
/* ============ Website Router ============ */
/*  The router takes the entered URI and
    calls the appropriate controller/method
    to produce the correct page.            */

class Router {

  public function __constuct()
  {

  }

  // Handle the given page request
  public function route( $request )
  {
    // Break the URI into parts
    $uri = trim( $request, '/' );
    $uri = explode( '/', $uri );

    // Select the appropriate controller
    $controllerClass = Router::getController( array_shift( $uri ) );

    // Create new controller
    $controller = new $controllerClass( $uri );
  }

  // Format a controller class name to get the class filepath
  private static function controllerPath( $controllerClassName )
  {
    return CONTROLLER_PATH . $controllerClassName . '.class.php';
  }

  // Determine the appropriate class given the argument
  private static function getController( $arg )
  {
    // Check if a class is given
    $controllerClass = ( $arg == NULL ) ? DEFAULT_CONTROLLER : ucfirst( strtolower( $arg ) ) . 'Controller';

    // Check controller directory for the class
    $controller_dir = scandir( CONTROLLER_PATH );
    if ( !in_array( $controllerClass . '.class.php', $controller_dir ) )
    {
      // Use the default controller if not found
      $controllerClass = DEFAULT_CONTROLLER;
    }

    // Import the class and return the chosen class name
    require_once( Router::controllerPath( $controllerClass ) );
    return $controllerClass;
  }

}
?>