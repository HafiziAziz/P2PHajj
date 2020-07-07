<?php 
header('Content-Type: application/json');
require_once( "inc/func_utilities.php" );

$listing = db_listing( "admin" );
$row = mysqli_fetch_assoc($listing);
echo json_encode($row,JSON_PRETTY_PRINT);