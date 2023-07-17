<?php
include('dbcon.php');                  /*EDIT BUTTTON*/

date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i:s a', time());

if (isset($_POST['save'])){
  $sr_no = $_POST['iid'];
  $issue_date = $_POST['issue_date'];
  $issue_by = $_POST['issue_by'];
  $item = $_POST['id'];
  $item1 = $_POST['i_code'];
  $qnty = $_POST['qnty'];
  $unit = $_POST['unit'];
  $stock= $_POST['stock'];
 

 $query = "UPDATE issue SET  issue_date ='$issue_date', issue_by ='$issue_by', item_category ='$item', item_name = '$item1', qnty ='$qnty', unit = '$unit',stock= '$stock' where sr_no = '$sr_no'";
    $run = sqlsrv_query($con,$query);
  if($run == true)
  {
    ?>
   <script>
          alert('Update SuccessFully!!');
          window.open('issue.php','_self');
    </script>
    <?php
  }
  else{
          print_r(sqlsrv_errors());
          }


        }

 ?>
