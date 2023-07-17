<?php
include('dbcon.php');
if(isset($_POST['data1'])){

$data1 = $_POST['data1'];
$mster = explode("/",$_POST['master_add']);			/*explode [string to array covert] name="master_add" */
$tblname = $mster[0];
$colname = $mster[1];

$sql = "INSERT INTO $tblname ($colname) VALUES ('$data1')";
$run = sqlsrv_query($con,$sql);
 
 if($run){
 	  echo "saved sucessfully";
 }else{
		print_r(sqlsrv_errors());
	}
	

}

?>