<?php 
include('dbcon.php');
if (isset($_POST['save'])) {
  
	$id = $_POST['id'];
	$cfdate = $_POST['cfdate'];
	$update = $_POST['update'];
	$status = $_POST['Status2'];
  $delay = $_POST['Delay1'];
	
	
	  $sql = " UPDATE Data SET Current_Finish = '$cfdate', Satus = '$update' , Status = '$status', Delay = '$delay' WHERE Sr_no = '$id'";
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
