<?php 
include('dbcon.php');
if (isset($_POST['submit'])) {
	
	$work_name = $_POST['work_name'];
	$Plateform = $_POST['Plateform'];
	$asig_date = $_POST['asig_date'];
	$e_days = $_POST['e_days'];
	$Status = $_POST['Status'];
	$Location = $_POST['Location'];
	$Remark = $_POST['Remark'];
	$Given_By = $_POST['Given_By'];
	$apx_date = $_POST['apx_date'];
	$dname = $_POST['dname'];

	$Delay = $_POST['Delay'];

	

	  $sql = "INSERT INTO Data(Work_Name,Plateform,Assign_Date,estimated_days,Status,Location,Remark,Given_By,ApproxFinish_Date,Dev_By,Delay) VALUES('$work_name','$Plateform','$asig_date','$e_days','$Status','$Location','$Remark','$Given_By','$apx_date','$dname','$Delay')"; 
      $run = sqlsrv_query($con,$sql);
            
       
    if($run)
      {
        ?>
        <script type="text/javascript">
            alert('Save Successfully');
            window.open('index.php','_self');
        </script>
        <?php
      }
   else{
        print_r(sqlsrv_errors());
       }
  
}
?>
