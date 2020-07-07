<?php
$connection = mysqli_connect('localhost', 'guest_1', 'fypproject1');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'fyp1');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
