<?php 
// exit;
header('Content-Type: application/json');
require_once( "../inc/func_utilities.php" );

// Incoming
$id        = $_REQUEST['id'];         
$username  = $_REQUEST['username'];                 
$latitude  = $_REQUEST['latitude'];                 
$longitude = $_REQUEST['longitude'];                 

// Log Incoming
$logname = "/var/www/html/mockup/log/login_incoming_".date('Ymd').".log";
$tmpfp = fopen( $logname, "a+" );
$tmpfp_msg = "\n".print_r($_REQUEST,1);
fwrite($tmpfp, "Incoming from JSON: \n".date('Y-m-d H:i:s')."\tLine:".__LINE__."\t".$tmpfp_msg."\n===========\n" );
fclose($tmpfp);

// Update guider location
$queyResult = update_guider_loc( 'guider', $latitude, $longitude, $id, $username);
