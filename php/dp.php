<?php

$servername = "localhost";
$username = "dhalusek";
$password = "j2o3k4e52018";
$database = "productdbphp";
$errors=array();

$con = mysqli_connect($servername, $username, $password);
mysqli_select_db($con, $database);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

try{
		$dbPDO = new PDO("mysql:host={$servername};dbname={$database}",$username,$password);
		$dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
		echo $e->getMessage();
}