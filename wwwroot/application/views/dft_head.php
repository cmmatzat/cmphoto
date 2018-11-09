<!DOCTYPE html>
<html>
  <head>
    <title>Corey Matzat Photography</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH . 'master.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH . 'nav.css'; ?>"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <?php
      foreach( $pg_css as $css_link )
      {
        echo $css_link . '
    ';
      }
    ?>
  </head>
  <body>