<?php
include('..\dbcon2.php');
if (isset($_POST['dpnt'])) {

    $query = "SELECT DISTINCT dpnt FROM mc_master WHERE dpnt LIKE '%".$_POST["dpnt"]."%'";
    $result = sqlsrv_query($conn,$query);
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
        $sw = $row['dpnt'];
                    $sql1 = "SELECT plant FROM mc_master WHERE dpnt='$sw'";
                    $run1 = sqlsrv_query($conn,$sql1);
                    $row1=sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC);
        $plant = $row1['plant'];
        $response[] = array("label"=>$sw,"pname"=>$plant);
    }

    echo json_encode($response);

    }
exit;
?>