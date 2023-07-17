<?php
session_start();
if(isset($_POST['submit'])){
include('dbcon.php');

  $item = $_POST['item'];
  
  $query = "INSERT INTO item_master(item,isdelete) VALUES ('$item',0)";
  $run = sqlsrv_query($con,$query);
  if($run == true)
  {
    ?>
   <script>
          alert('Saved SuccessFully!!');
          window.open('master.php','_self');
    </script>
    <?php
  }
  else{
      print_r(sqlsrv_errors());
    }

}


 ?>
}
