<?php 

$hostname = "localhost";  
$username = "root"; 
$password = ""; 
$database = "goldencareer";

//connection to the database 
$con = mysqli_connect($hostname, $username, $password ,$database) 
or die("mysqli not connect");

// for view post

	$item_per_page = 4;
	

?>