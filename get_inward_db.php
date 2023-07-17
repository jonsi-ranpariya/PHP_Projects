 <?php

include('dbcon.php');            
    
    $id= $_POST['id'];
    $date= $_POST['date'];
    $item= $_POST['item'];
    $icode= $_POST['icode'];
    $p_name= $_POST['p_name'];
    $qnty= $_POST['qnty'];
    $rate= $_POST['rate'];
    $party= $_POST['party'];
  
     /*type="submit"*/
    if(isset($_POST['submit'])){
        $cancel = 0;
    }
    else{
        $cancel = 1;
    }

    foreach($id as $key => $value){
        /*item code black [check not select[continue..]]*/
        if ($item[$key] == ''){
             continue;
        }
        
        $sql = "INSERT INTO Inward(inw_id,date,rm_icode,i_code,party_name,qnty,rate,party,username,isdelete,status) VALUES('".$value."','".$date[$key]."','".$item[$key]."','".$icode[$key]."','".$p_name[$key]."','".$qnty[$key]."','".$rate[$key]."','".$party[$key]."','','$cancel','stock')"; 
                $run = sqlsrv_query($con,$sql);
            
         }  
   
    if($run)
      {
        /* echo "Save Successfully";*/
        ?>
        <script type="text/javascript">
            alert('Save Successfully');
            window.open('inward.php','_self');
        </script>
        <?php
      }
   else{
        print_r(sqlsrv_errors());
    }
  
?>