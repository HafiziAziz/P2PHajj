<?php 
// exit;
header('Content-Type: application/json');
require_once( "../inc/func_utilities.php" );

// Incoming
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// Log Incoming
$logname = "/var/www/html/mockup/log/login_incoming_".date('Ymd').".log";
$tmpfp = fopen( $logname, "a+" );
$tmpfp_msg = "\n".print_r($_REQUEST,1);
fwrite($tmpfp, "Incoming from JSON: \n".date('Y-m-d H:i:s')."\tLine:".__LINE__."\t".$tmpfp_msg."\n===========\n" );
fclose($tmpfp);

// Verify User Query
$queyResult = db_verify2( 'guest', $username, $password);

$count = mysqli_num_rows($queyResult);
if ( $count == 0 ) {
	$queyResult = db_verify2( 'guider', $username, $password);
}

$result = array();
while ($fetchData = mysqli_fetch_assoc($queyResult)) {
    $result=$fetchData;
}

$result2 = array();
if ( $result['level'] == "guest" ) {
	$get_latlong = select_guider_lat_long("guider", $result['guider']);	
	$get_latlong = mysqli_fetch_assoc($get_latlong);
	$result2 = $get_latlong;
	$result = array_merge($result,$result2);
}

echo json_encode($result,1);
