<?php 

require_once( "inc/func_utilities.php" );

// Verify User
// function db_verify( $tbl, $username, $password ) {


$verify = db_verify( 'admin', $_POST['username'], $_POST['password']);
if ( $verify != 1 ) {
  echo "<script type='text/javascript'>alert('Invalid User'); location='login';</script>";
} else {
  echo "<script type='text/javascript'>alert('Login Success'); location='home';</script>";

}

?>