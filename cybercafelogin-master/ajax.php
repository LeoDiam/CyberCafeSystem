<?php 
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$left_time = $_POST['left_time'];
$name = $_POST['name'];
// die(print_r($name));
$_SESSION['left_time'] = $left_time;
$con->query('UPDATE users set left_time ='.$left_time.' where username ="'.$name.'"');
?>