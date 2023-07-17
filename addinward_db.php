 <?php
 include('dbcon.php'); 
 session_start();
if(isset($_POST['submit'])){

    $date= $_POST['date'];
    $icode= $_POST['code'];
    $item= $_POST['r_icode'];
    $qnty= $_POST['qnty'];
    $rate= $_POST['Rate'];
    $stock = $_POST['stock'];
    $issue_to= $_POST['mtype'];
    $mcno= $_POST['mcno'];
    $dpnt= $_POST['dpnt'];
    $remarks= $_POST['remark'];
    $p_name= $_POST['person'];
    $issue_cat= $_POST['cat'];
    $old_part_received= $_POST['old_part_received'];

    foreach($item as $key => $value){
        if ($stock[$key] == 'use'){
            $sql = "INSERT INTO issue(issue_date,item_category,item_name,qnty,issue_to,mcno,dpnt,remarks,p_name,issue_cat,old_part_received,status) VALUES('".$date[$key]."','".$icode[$key]."','".$value."','".$qnty[$key]."','".$issue_to[$key]."','".$mcno[$key]."','".$dpnt[$key]."','".$remarks[$key]."','".$p_name[$key]."','".$issue_cat[$key]."','".$old_part_received[$key]."','use')"; 
        }
        else{
            $sql = "INSERT INTO Inward(date,rm_icode,i_code,qnty,rate,issue_to,mcno,dpnt,remarks,p_name,issue_cat,old_part_received,status,inw_id,isdelete) VALUES('".$date[$key]."','".$value."','".$icode[$key]."','".$qnty[$key]."','".$rate[$key]."','".$issue_to[$key]."','".$mcno[$key]."','".$dpnt[$key]."','".$remarks[$key]."','".$p_name[$key]."','".$issue_cat[$key]."','".$old_part_received[$key]."','".$stock[$key]."','111',0)"; 
        }
        $run = sqlsrv_query($con,$sql);
    }
    if($run){
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
}
  
?>