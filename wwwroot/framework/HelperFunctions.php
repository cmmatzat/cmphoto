<?php

/***************************************
  echo_alt_text()
----------------------------------------
  Print alt text for an image
----------------------------------------
  vars: array of variables
  alt_key: array key that should point
      to alt text if it exists
  img_key: array key that points to
      image file path
***************************************/
function echo_alt_text( $vars, $alt_key, $img_key )
{
  if ( array_key_exists( $alt_key, $vars ) )
  {
    echo 'alt="' . $vars[$alt_key] . '"';
  }
  else
  {
    echo 'alt="' . pathinfo( $vars[$img_key] )['filename'] . '"';
  }
}

/***************************************
  echo_img_path()
----------------------------------------
  Print image path for preloaded image
----------------------------------------
  img_path: directory path to the root
      image to be displayed
***************************************/
function echo_img_path( $img_path )
{
  $path_info = pathinfo( $img_path );
  $name = $path_info['filename'];
  $dir = $path_info['dirname'];
  $ext = $path_info['extension'];

  // Print Preload Image
  if ( file_exists( ROOT . $dir . DS . $name . '.preload.' . $ext ) )
  {
    echo 'src="' . $dir . DS . $name . '.preload.' . $ext . '" ';
  }

  // Print Display Image
  echo 'data-src="' . $img_path . '" ';

  // Print Full Image
  if ( file_exists( ROOT . $dir . DS . $name . '.full.' . $ext ) )
  {
    echo 'data-full="' . $dir . DS . $name . '.full.' . $ext . '" ';
  }
}

/***************************************
  safe_echo_array_key()
----------------------------------------
  Print value of array key if key exists
----------------------------------------
  array: Array with potential value
      to print
  key: Array key that may hold value
***************************************/
function echo_array_key( $array, $key )
{
  if ( array_key_exists( $key, $array) )
  {
    echo $array[$key];
  }
}

/***************************************
  echo_class()
----------------------------------------
  Print the DOM class if it exists
----------------------------------------
  vars: Array that may contain a class
***************************************/
function echo_class( $vars )
{
  echo 'class="';
  echo_array_key( $vars, 'class' );
  echo '" ';
}

/***************************************
  echo_id()
----------------------------------------
  Print the DOM id if it exists
----------------------------------------
  vars: Array that may contain an id
***************************************/
function echo_id( $vars )
{
  echo 'id="';
  echo_array_key( $vars, 'id' );
  echo '" ';
}

?>