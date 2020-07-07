<?php 
  require('db_connect.php');

  // DB Checking Duplicate
  function db_check( $tbl, $name, $username ) {
    GLOBAL $connection;
    $query = "SELECT * "
          ."FROM`fyp1`.`$tbl` "
          ."WHERE  name='$name' "
          ."AND username='$name' "
          ."LIMIT 1";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    return $count;
  }

  // DB Insert
  function db_insert( $tbl, $headers, $fields ) {
    GLOBAL $connection;
  	$query = "INSERT INTO `fyp1`.`$tbl` (".implode(", ", $headers).") "
  	       . " VALUES (".implode(", ", $fields).")";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

  // User Verify
  function db_verify( $tbl, $username, $password ) {
    GLOBAL $connection;
    $query = "SELECT * "
          ."FROM`fyp1`.`$tbl` "
          ."WHERE username='$username' "
          ."AND password='$password' "
          ."LIMIT 1";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    return $count;
  }

  // User Verify
  function db_verify2( $tbl, $username, $password ) {
    GLOBAL $connection;
    $query = "SELECT * "
          ."FROM`fyp1`.`$tbl` "
          ."WHERE username='$username' "
          ."AND password='$password' "
          ."LIMIT 1";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

  // User Listing
  function db_listing( $tbl ) {
    GLOBAL $connection;
    $query = "SELECT * "
           ."FROM`fyp1`.`$tbl` ";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    // $result = mysqli_fetch_assoc($result);
    return $result;
  }

  // User Verify
  function update_guider_loc($tbl, $latitude, $longitude, $id, $username) {
    GLOBAL $connection;

    $query = "UPDATE `fyp1`.`$tbl` "
           . " SET "
           . " `latitude` = '$latitude' ,"
           . " `longitude` = '$longitude' "
           . "WHERE `id` = '$id' "
           . " AND `username` = '$username' ";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

  // Get Last Insert_ID
  function last_id() {
    GLOBAL $connection;
    $last_row = mysqli_insert_id($connection);

    return $last_row;
  }

  // Get Update with custom condition
  function update_with_condition($tbl, $header, $fields, $condition) {
    GLOBAL $connection;
    $query = "UPDATE `fyp1`.`$tbl` "
           . " SET "
           . " `".$header."` = '".$fields."'"
           . "WHERE `id` =".$condition;

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

  // Get Select with custom condition
  function select_with_custom_condition($tbl, $condition) {
    GLOBAL $connection;
    $query = "SELECT * "
            ."FROM `fyp1`.`$tbl` "
            ."WHERE  id=".$condition
            ." LIMIT 1";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

  // Get Select with custom condition
  function select_guider_lat_long($tbl, $condition) {
    GLOBAL $connection;
    $query = "SELECT longitude, latitude "
            ."FROM `fyp1`.`$tbl` "
            ."WHERE  id=".$condition
            ." LIMIT 1";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
  }

?>