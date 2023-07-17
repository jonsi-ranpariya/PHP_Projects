<?php
session_start();
include('dbcon.php');
if(isset($_POST['save'])){

  $id = $_POST['id'];
  $item = $_POST['item'];
  
 $query = "UPDATE item_master SET item ='$item' where id = '$id'";
    $run = sqlsrv_query($con,$query);
  if($run == true)
  {
    ?>
   <script>
          alert('Update SuccessFully!!');
          window.open('master.php','_self');
    </script>
    <?php
  }
  else{
      print_r(sqlsrv_errors());
    }
}

?>
