<?php
session_start();
include('dbcon.php');
if(isset($_POST['id'])){
  $iid=$_POST['id'];

    $sql = "UPDATE item_master SET isdelete = 1 where id = '$iid'";
    $run = sqlsrv_query($con,$sql);
    if($run == true)
    {
         echo "Delete SuccessFully";
    
    }
    else{
        print_r(sqlsrv_errors());
    }
  }

?>