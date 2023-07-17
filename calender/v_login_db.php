<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/y h:i:s a',time());
include('dbcon3.php');

if(isset($_POST['login_btn'])){

	$u_name = $_POST['u_name'];
	$psw = $_POST['psw'];

	$sql = "SELECT * FROM [Emp] WHERE emp_id = '$u_name' AND passwd = '$psw'"; 
	$run = sqlsrv_query($conn,$sql);
	$row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$result=sqlsrv_query($conn,$sql,$params,$options);
	$count=sqlsrv_num_rows($result);
	if($count < 1){
		?>
			<script>
				 alert('Employee_Id and Password Not Match... Try Again!');
				 window.open('v_login.php','_self');
			</script>
		<?php
	  }
	  else
	   {
	  	   $_SESSION['slogin'] = $row['passwd'];
	  	   $_SESSION['id'] = $row['emp_id'];
	  	  ?>
	  	      <script>
	  	     	 window.open('index.php','_self');
	  	      </script>
	  	  <?php
	   }
     }
     else{
     	header("location:v_login.php");
    }
?>