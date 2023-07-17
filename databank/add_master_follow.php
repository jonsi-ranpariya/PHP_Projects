<?php
if(isset($_POST['submit'])){

include('dbcon5.php');

  $Person = $_POST['Person'];
  
  $query = "INSERT INTO  [user] (user_name) VALUES ('$Person')";
  $run = sqlsrv_query($connt,$query);
  if($run == true)
  {
    ?>
   <script>
          alert('Saved SuccessFully!!');
          window.open('Vender_Register.php','_self');
    </script>
    <?php
  }
  else{
      print_r(sqlsrv_errors());
    }

}


 ?>
}
