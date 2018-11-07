<?php
/* ============ Website Router ============ */
/*  The router takes the entered URI and
    calls the appropriate controller/method
    to produce the correct page.            */

class Router {

  /***************************************
    new Router()
  ----------------------------------------
    Constructor, currently does nothing.
  ***************************************/
  public function __constuct()
  {

  }

  /***************************************
    route()
  ----------------------------------------
    Trigger the routing of the URI to
    the appropriate controller/method.
  ***************************************/
  public function route( $request )
  {
    // Break the URI into parts
    $uri = trim( $request, '/' );
    $uri = array_diff( explode( '/', $uri ), [NULL] );

    // Select and create the appropriate controller
    $uri = Router::verifyUriController( $uri );
    $controller_class = array_shift( $uri );
    Router::includeController( $controller_class );
    $controller = new $controller_class();

    // Select and call the appropriate method
    $uri = Router::verifyUriMethod( $controller, $uri );
    $method = array_shift( $uri );
    $controller->$method( $uri );
  }

  /***************************************
    verifyUriController()
  ----------------------------------------
    Ensure that the first value in the
    passed URI is the name of the
    controller class.
  ***************************************/
  private static function verifyUriController( $uri )
  {
    $controller_dir = scandir( CONTROLLER_PATH );

    // Check for empty argument
    if ( count( $uri ) == 0 )
    {
      return array( 'IndexController' );
    }
    else if ( in_array( ucfirst( strtolower( $uri[0] ) ) . 'Controller.class.php', $controller_dir ) )
    {
      $uri[0] = ucfirst( strtolower( $uri[0] ) ) . 'Controller';
      return $uri;
    }
    else
    {
      return array_merge( array( DEFAULT_CONTROLLER ), $uri );
    }
  }

  /***************************************
    verifyUriMethod()
  ----------------------------------------
    Ensure that the first value in the
    passed URI is the function to call
  ***************************************/
  private static function verifyUriMethod( $controller, $uri )
  {
    // Check for no argument
    // This should point to root controller page, i.e. index
    if ( count( $uri ) == 0 )
    {
      return array( 'index' );
    }
    else if ( is_callable( array( $controller, $uri[0] ) ) )
    {
      return $uri;
    }
    else
    {
      return array_merge( array( 'default' ), $uri );
    } 
  }

  /***************************************
    includeController()
  ----------------------------------------
    Include the given controller once.
  ***************************************/
  private static function includeController( $controllerClassName )
  {
    include_once CONTROLLER_PATH . $controllerClassName . '.class.php';
  }

}
?>