<?php 
$serverName = "192.168.1.242";
$connectionInfo = array("Database"=>"inquiry","UID"=>"sa","PWD"=>"12345","CharacterSet" => "UTF-8");
$conn =sqlsrv_connect($serverName,$connectionInfo);

if($conn) {
	/*echo "connection established.<br />";*/
}else{
	echo "connection could not be established.<br />";
	die(print_r( sqlsrv_errors(), true));	
}
?>