<?php
  /* ============ Main Index Page ============ */
  /*  This is the landing page for all traffic
      to the website. From here, the config
      file is included, and a new router is
      created to handle the incoming request.  */

  // Get the config file to set up the webpage
  require_once( $_SERVER["DOCUMENT_ROOT"] . '/config.php' );

  // Create a router to handle the traffic
  $router = new Router();
  $router->route( $_SERVER['REQUEST_URI'] );
?>