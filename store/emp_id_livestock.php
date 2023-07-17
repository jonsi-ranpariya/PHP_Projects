<?php
include('../dbcon3.php');
if (isset($_POST['e_id'])) {

    $query = " SELECT emp_id,emp_name FROM Emp WHERE emp_id LIKE '%".$_POST["e_id"]."%'";
    $result = sqlsrv_query($conn,$query);
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
        $pname = $row['emp_name'];
      
        $response[] = array("label"=>$row['emp_id'],"pname1"=>$pname);
    }

    echo json_encode($response);

    }
exit;
?>


<!-- SELECT  a.mc,a.superwizer,a.dpnt,b.emp_id FROM mc_master a inner join [Emp_Data].[dbo].[Emp] b on a.plant=b.plot_no  -->