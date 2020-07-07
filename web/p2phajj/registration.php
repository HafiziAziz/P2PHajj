<?php 

require_once( "inc/func_utilities.php" );

// Checking Duplicate Entry
$checking = 0;
if ( !empty($_POST['role'])) {
    if ( !empty($_POST['name']) && !empty($_POST['username'])) {
        $checking = db_check($_POST['role'], $_POST['name'], $_POST['username']);
    }
}

if ( $checking == 1 ) {
    echo "<script type='text/javascript'>alert('Please Change Your Username'); location='index.php';</script>";
}

$_POST = array_filter($_POST);

if (!empty($_POST['depart'])) {
    $_POST['depart'] = date('Y-m-d', strtotime($_POST['depart']));
}
if ( !empty($_POST['arrival'])) {
    $_POST['arrival'] = date('Y-m-d', strtotime($_POST['arrival']));
}

foreach ($_POST as $k => $v) {
    $headers[] = $k;
}


foreach ($_POST as $v) {
    $fields[] = "'$v'";
}

unset($fields[0],$headers[0]);
$insert = db_insert($_POST['role'], $headers, $fields );

if ($insert) {
    if ($_POST['role'] == "guest") {
        // Get latest InsertID
        $last_row = last_id();

        // Assign Guider 
        $guider = db_listing( "guider" );
        while ($row = mysqli_fetch_assoc($guider)) {
            $list_guider[] = $row['id'];
        }
        shuffle($list_guider);
        update_with_condition($_POST['role'], "guider", $list_guider[0], $last_row );
    }

    echo "<script type='text/javascript'>alert('Record Saved'); location='home';</script>";
} else {
    echo "<script type='text/javascript'>alert('System Error'); location='home';</script>";
}
?>