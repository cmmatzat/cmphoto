<?php

// Handle the server post request
if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {

  $response = [
    'success' => true,
    'name_error' => false,
    'email_error' => false,
    'message_error' => false
  ];

  // Clean and validate the name
  if ( empty( $_POST['name'] ) ) {
    $response['name_error'] = "Name required";
  } else {
    $name = clean_input( $_POST['name'] );
  }

  // Clean and validate the email address
  if ( empty( $_POST['email'] ) ) {
    $response['email_error'] = "Email address required";
  } else {
    $email = clean_input( $_POST['email'] );
    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
      $response['email_error'] = "Invalid email address";
    }
  }

  // Clean the message
  if ( empty( $_POST['message'] ) ) {
    $response['message_error'] = "Message content required";
  } else {
    $message = clean_input( $_POST['message'] );
  }

  $response['success'] = !( $response['name_error'] || $response['email_error'] || $response['message_error'] );

  // Send the message
  if ( $response['success'] ) {
    $email_recipient = "corey@coreymatzat.photography";
    $email_subject   = "Inquiry from $name";
    $email_message   = "Name: $name\n";
    $email_message  .= "Email: $email\n";
    $email_message  .= "Message:\n$message";
    $email_header    = "From: webmaster@coreymatzat.photography";

    if ( !mail( $email_recipient, $email_subject, $email_message, $email_header ) ) {
      $response->success = false;
    }
  }

  $json_response = json_encode( $response, JSON_FORCE_OBJECT );
  echo $json_response;
}

function clean_input( $str ) {
  $clean_str = trim( $str );
  $clean_str = stripslashes( $clean_str );
  $clean_str = htmlspecialchars( $clean_str );
  return $clean_str;
}
?>