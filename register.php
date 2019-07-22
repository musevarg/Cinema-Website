<?php

      include('header.php');

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('scripts/connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'firstname' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $conn, trim( $_POST[ 'firstname' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'lastname' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $conn, trim( $_POST[ 'lastname' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $conn, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a phone number:
  if ( empty( $_POST[ 'phone' ] ) )
  { $errors[] = 'Enter your phone number'; }
  else
  { $p = mysqli_real_escape_string( $conn, trim( $_POST[ 'phone' ] ) ) ; }

  # Check for a postcode:
  if ( empty( $_POST[ 'postcode' ] ) )
  { $errors[] = 'Enter your postcode'; }
  else
  { $pc = mysqli_real_escape_string( $conn, trim( $_POST[ 'postcode' ] ) ) ; }

  # Check for address 1:
  if ( empty( $_POST[ 'address1' ] ) )
  { $errors[] = 'Enter your address'; }
  else
  { $a1 = mysqli_real_escape_string( $conn, trim( $_POST[ 'address1' ] ) ) ; }

  # Check for address 2:
	$a2 = mysqli_real_escape_string( $conn, trim( $_POST[ 'address2' ] ) ) ;

  # Check for city:
  if ( empty( $_POST[ 'city' ] ) )
  { $errors[] = 'Enter your city'; }
  else
  { $c = mysqli_real_escape_string( $conn, trim( $_POST[ 'city' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $pass = mysqli_real_escape_string( $conn, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }

    # Check if user agrees with the terms and conditions:
  if ( empty( $_POST[ 'terms' ] ) )
  { $errors[] = 'You must agree with the terms and conditions.'; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT userID FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $conn, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 )
    {
        $errors[] = 'Email address already registered.';
    }
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (firstname, lastname, email, phone, postcode, address1, address2, city, password, registerDate) VALUES ('$fn', '$ln', '$e', '$p', '$pc', '$a1', '$a2', '$c', SHA1('$pass'), NOW() )";
    $r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    { 
    	echo '<div id="logindiv" class="logindiv film-list"><h1>Successfully registered.</h1></div>';
    }
  
    # Close database connection.
    mysqli_close($conn); 

          include('footer.html');

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $conn );
  }  
}

?>