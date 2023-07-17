<?php
include('dbcon.php');
$current_date =  date('d-M-Y');   /*current date*/ /*['userid'] userid:*/

if(isset($_POST['data'])){

	foreach($_POST['data'] as $jonsi){

	$sql = "INSERT INTO issue (emp_id,p_name,IP_Address,CUG_Number,U_name,password,dpnt,location,item_category,qnty,Make,Model,Serial_Number,Mac_Address,Screen_Size,RAM_1,RAM_2,HDD_1,HDD_2,HDD_3,OS,AntiVirus,Manf_Year,flag,status,issue_date,issue_to,issue_by,unit) VALUES ('".$jonsi['userid']."','".$jonsi['emp_name']."','".$jonsi['ipaddress']."','".$jonsi['phone']."','".$jonsi['Username']."','".$jonsi['pwd']."','".$jonsi['department']."','".$jonsi['location']."','".$jonsi['Sr_no']."','".$jonsi['qnty']."','".$jonsi['make']."','".$jonsi['modal1']."','".$jonsi['Sr_Number']."','".$jonsi['Mac_Add']."','".$jonsi['Scrn_Size']."','".$jonsi['ram_1']."','".$jonsi['ram_2']."','".$jonsi['hhd_1']."','".$jonsi['hhd_2']."','".$jonsi['hhd_3']."','".$jonsi['os']."','".$jonsi['AntiVirus']."','".$jonsi['myear']."',0,'use','$current_date','itope','Manish','Nos')";
		$run = sqlsrv_query($con,$sql);

	}	
	if($run){
		echo "saved sucessfully";
	}
	else{
		print_r(sqlsrv_errors());
	}
	
}
?>