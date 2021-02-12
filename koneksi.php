<?php
$host = "localhost";
$user = "root";
$password = "dicki";
$database = "lahan2";

$connect = mysqli_connect($host, $user, $password, $database);
if(! $connect){
	die("Acces denied.</br>");
}

$select_database = mysqli_select_db($connect, $database);
if (! $select_database) {
	die( "Tidak ada database.");
}


error_reporting(E_ALL);

?>
