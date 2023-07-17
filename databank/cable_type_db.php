 <?php
include('dbcon.php');            

if(isset($_POST["id"])){          
    $id = $_POST['id'];
    $ab = $_POST['ab'];

    foreach($id as $key){
        $sql = "INSERT INTO Data_Cable_Type(cable_id,vender_id) VALUES('".$key."','$ab')"; 
        $run = sqlsrv_query($con,$sql);
    }  
    if($run)
      {
         echo "Save Successfully";
      }
   else{
        print_r(sqlsrv_errors());
     }
  }
?>