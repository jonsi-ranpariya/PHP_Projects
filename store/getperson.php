<?php
include('..\dbcon3.php');
if (isset($_POST['person'])) {

    $query = "SELECT emp_name,sub_cat,emp_id FROM Emp WHERE emp_name LIKE '%".$_POST["person"]."%'";
    $result = sqlsrv_query($conn,$query);
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
        $sw = $row['emp_name'];
        $dpnt = $row['sub_cat'];
        $empid = $row['emp_id'];
       
        $response[] = array("label"=>$sw,"dname"=>$dpnt,"empid"=>$empid);
    }

    echo json_encode($response);

    }
exit;
?>