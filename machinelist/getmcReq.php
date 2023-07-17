<?php 
include('dbcon.php');

$row = array();
$sql = "SELECT * from mcreqfield where Machine_tag = '".$_POST['tag']."'";
$run = sqlsrv_query($con,$sql);
$row[] = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

echo json_encode($row);


 ?>