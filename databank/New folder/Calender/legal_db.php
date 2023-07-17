<?php
include('../dbcon.php');
if(isset($_POST['Compliance'])){

	$Compliance = $_POST['Compliance'];
	$Category = $_POST['Category'];
	$depart = $_POST['depart'];
	$duedate = $_POST['duedate'];
	$cdate = $_POST['cdate'];
	/*$status = $_POST['status'];*/
	$fileddate = $_POST['fileddate'];
	$prepadby = $_POST['prepadby'];
	$reciveby = $_POST['reciveby'];

	$sql = "INSERT INTO legal (Compliance,Category,Department,Due_Date,Company_Due_Date,Filed_Date,Prepared_By,Reviewed_By) VALUES ('$Compliance','$Category','$depart','$duedate','$cdate','$fileddate','$prepadby','$reciveby')";
	$run = sqlsrv_query($con,$sql);

	if($run){
		 echo "saved sucessfully.....";
	}else{
		print_r(sqlsrv_errors());
	}
}
?>
