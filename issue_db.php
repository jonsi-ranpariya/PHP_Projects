<?php
session_start();
if(isset($_POST['submit']))
{
	include('dbcon.php');

	$issue_date = $_POST['date'];
    $subgrade = $_POST['subgrade'];
	$item_name = $_POST['i_code'];
	$issue_to = $_POST['mtype'];
    $issue_by = $_POST['issue_by'];
    $mcno = $_POST['mcno'];
    $dpnt= $_POST['dpnt'];
    $qnty= $_POST['qty'];
	$unit= $_POST['unit'];
	$issue_cat= $_POST['cat']; 
    $stock= $_POST['stock'];
    $emp_id=$_POST['emp_id'];
    $p_name= $_POST['person'];
    $remarks= $_POST['remark'];
    $old_part_received= $_POST['old_part_received'];

  foreach ($item_name as $key => $value) {
         $query1 = "INSERT INTO issue(issue_date,item_category,item_name,issue_to,issue_by,mcno,dpnt,qnty,unit,issue_cat,stock,emp_id,p_name,remarks,old_part_received,status,flag) VALUES ('$issue_date','".$value."','".$subgrade[$key]."','$issue_to','".$issue_by[$key]."','$mcno','$dpnt','".$qnty[$key]."','".$unit[$key]."','$issue_cat','".$stock[$key]."','".$emp_id[$key]."','$p_name','$remarks','$old_part_received','use',2)";
          $run1 = sqlsrv_query($con,$query1);
          if($run1 == true)
          {       
              $_SESSION['message'] =' Data Inserted Successfully';
              header("location:issue.php");
          }
          else{
      		     print_r(sqlsrv_errors());
               echo "ERROR!!";
          }    
      }           
	}
?>