<?php
include('dbcon.php');
if(isset($_POST['sr_no'])){

	$sr_no = $_POST['sr_no'];
	$date = $_POST['date'];
	$Follow_By = $_POST['Follow_By'];
	$next_date = $_POST['next_date'];
	$Remark = $_POST['Remark'];

 foreach ($Follow_By as $key => $value) {
	$sql = "INSERT INTO Followup (Date,Followup_By,Followup_Date,Remark,vender_ragitr_id) VALUES ('".$date[$key]."','".$value."','".$next_date[$key]."','".$Remark[$key]."','$sr_no')";
	$run = sqlsrv_query($con,$sql);

}

	if($run){
		
	 echo "Save Successfully";
			
	}else{
		print_r(sqlsrv_errors());
	}
}
?>