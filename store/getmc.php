<?php
include('..\dbcon2.php');
if (isset($_POST['mc'])) {

    $query = " SELECT * FROM mc_master WHERE mc LIKE '%".$_POST["mc"]."%'";
    $result = sqlsrv_query($conn,$query);
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
        $pname = $row['superwizer'];
        $dpnt = $row['dpnt'];
      
        $response[] = array("label"=>$row['mc'],"pname1"=>$pname,"dname"=>$dpnt);
    }

    echo json_encode($response);

    }
exit;
?>


<!-- SELECT  a.mc,a.superwizer,a.dpnt,b.emp_id FROM mc_master a inner join [Emp_Data].[dbo].[Emp] b on a.plant=b.plot_no  -->