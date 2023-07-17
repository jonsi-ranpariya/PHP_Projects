<?php
include('dbcon.php');
if (isset($_POST['save'])) {
	
	$id = $_POST['id'];
	$w_name = $_POST['w_name'];
	$platform = $_POST['platform'];
	$a_date = $_POST['a_date'];
	$e_days = $_POST['e_days'];
	$status = $_POST['status'];
	$location = $_POST['location'];
	$remark = $_POST['remark'];
	$givenby = $_POST['givenby'];
	$ap_date = $_POST['ap_date'];
	$devby = $_POST['devby'];
	$cf_date = $_POST['cf_date'];
	$delay = $_POST['delay'];
	$sat = $_POST['sat'];

	$sql = "UPDATE Data SET Work_Name = '$w_name',Plateform = '$platform',Assign_Date = '$a_date',estimated_days = '$e_days',Status = '$status',Location = '$location',Remark = '$remark',Given_By = '$givenby',ApproxFinish_Date = '$ap_date',Dev_By = '$devby',Current_Finish = '$cf_date',Delay = '$delay',Satus = '$sat' WHERE Sr_no = '$id'";
	$run = sqlsrv_query($con,$sql);

	if($run)
	{
        ?>
        <script type="text/javascript">
            alert('Update Successfully');
            window.open('index.php','_self');
        </script>
        <?php
      }
   else{
        print_r(sqlsrv_errors());
       }
} 
?>