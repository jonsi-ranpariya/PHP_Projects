<?php
session_start();
if(isset($_POST['submit']))
{
include('dbcon.php');

  
    $date= $_POST['date'];
    $srno= $_POST['srno']; 
    $stock= $_POST['stock'];
    $issue_to= $_POST['mtype'];
    $mcno= $_POST['mcno'];
    $p_name= $_POST['person'];
    $dpnt= $_POST['dpnt'];
    $remarks= $_POST['remark'];
    $issue_cat= $_POST['cat'];
    $old_part_received= $_POST['old_part_received'];
    $emp_id = $_POST['emp_id'];

    $sqlx = "SELECT item_category,Item_name,issue_by,qnty FROM issue where sr_no = '$srno'";  
    $runx = sqlsrv_query($con,$sqlx);
    $rowx = sqlsrv_fetch_array($runx,SQLSRV_FETCH_ASSOC);

    $item_category = $rowx['item_category'];
    $Item_name = $rowx['Item_name'];
    $issue_by = $rowx['issue_by'];
    $qnty = $rowx['qnty'];

  
   /*tranfer select issue transfer flag / stock select issue delete flag */
    if ($stock == 'transfer'){
         $query = "UPDATE issue SET status = 'transfer' where sr_no = '$srno'";  /*update query*/
         $run1 = sqlsrv_query($con,$query);
      if ($run1) {
             $sql = "INSERT INTO issue(issue_date,item_category,Item_name,issue_by,qnty,emp_id,issue_to,mcno,dpnt,remarks,p_name,issue_cat,old_part_received,status) VALUES('$date','$item_category','$Item_name','$issue_by','$qnty','$emp_id','$issue_to','$mcno','$dpnt','$remarks','$p_name','$issue_cat','$old_part_received','use')";
             $run = sqlsrv_query($con,$sql);
         }
    }
    else{
        $query = "UPDATE issue SET status = 'delete' where sr_no = '$srno'";
        $run1 = sqlsrv_query($con,$query);
      if ($run1) {
            $sql = "INSERT INTO Inward(date,rm_icode,i_code,qnty,issue_to,mcno,dpnt,remarks,p_name,issue_cat,old_part_received,status,inw_id) VALUES('$date','$Item_name','$item_category','$qnty','$issue_to','$mcno','$dpnt','$remarks','$p_name','$issue_cat','$old_part_received','$stock','111')"; 
            $run = sqlsrv_query($con,$sql);
            }
            } 
        if($run){
            ?>
            <script type="text/javascript">
                alert('Save Successfully');
                window.open('live_user.php','_self');
            </script>
            <?php
        }
        else{
        print_r(sqlsrv_errors());
       }
    } 
?>