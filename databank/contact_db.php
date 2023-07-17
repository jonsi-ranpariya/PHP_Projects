<?php 
include('dbcon.php');
if(isset($_POST['srno'])){

	$srno = $_POST['srno'];
	$contact_prson = $_POST['contact_prson'];
	$Dept = $_POST['Dept'];
	$Designation = $_POST['Designation'];
	$Mobile = $_POST['Mobile'];
	$Email = $_POST['Email'];

	foreach ($contact_prson as $key => $value) {
		$sql = "INSERT INTO Contact (Contact_Person,Dept,Designation,Mobile,Email,vender_ragitr_id) VALUES ('".$value."','".$Dept[$key]."','".$Designation[$key]."','".$Mobile[$key]."','".$Email[$key]."','$srno')";
		$run = sqlsrv_query($con,$sql);
	}
	if($run){
		echo "Save Successfully";
	}else{
		print_r(sqlsrv_errors());
	}

}
?>