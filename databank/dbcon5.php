<?php 
$serverName = "192.168.0.245";
$connectionInfo = array("Database"=>"WorkBook","UID"=>"sa","PWD"=>"suyog@123","CharacterSet" => "UTF-8");
$connt =sqlsrv_connect($serverName,$connectionInfo);

if($connt) {
	/*echo "connection established.<br />";*/
}else{
	echo "connection could not be established.<br />";
	die(print_r( sqlsrv_errors(), true));	
}
?>