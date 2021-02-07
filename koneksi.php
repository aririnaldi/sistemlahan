<?php

$host="localhost";
$user="root";
$password="";
$database="lahan";


$connect=mysqli_connect($host,$user,$password,$database); 
if(!$connect)
{
	echo "acces denied";
}

mysqli_select_db($connect,"lahan")
or die( "Tidak ada database "); 

  
error_reporting();

?>