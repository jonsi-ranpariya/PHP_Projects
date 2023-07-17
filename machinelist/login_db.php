<?php
session_start(); 
date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i:s a', time());
include('dbcon.php');
if (isset($_POST['login_btn'])) {
	$employee_id = $_POST['employee_id'];
	$password = $_POST['password'];

	   
			$sql="SELECT * FROM [user] WHERE employee_id='$employee_id' AND password='$password'";
			$run = sqlsrv_query($con,$sql);
			$row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
			$params = array();
			$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
			$result=sqlsrv_query($con,$sql,$params,$options);
			$count=sqlsrv_num_rows($result);
				if($count<1)
				{
					?>
						<script>
							alert('Employee_Id and Password Not Match... Try Again!');
							window.open('login.php','_self');
						</script>
					<?php
				}
				else
				{
					$_SESSION['sslogin'] = $row['password'];
					$_SESSION['id'] = $row['employee_id'];
					$_SESSION['u_name'] = $row['user_name'];		
					?>
						<script>
							window.open('machine_list.php','_self');
						</script>
					<?php
				}
				
			}
			else{

			header("location:login.php");
			 
		
	}
?>