<?php
include('dbcon.php');
if (isset($_POST['itum'])) {
    $query = "SELECT * FROM item_master WHERE item LIKE '%".$_POST["itum"]."%'";
    $result = sqlsrv_query($con,$query);
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){ 
  
        $response[] = array("label"=>$row['item'],"id"=>$row['id']);
    }

    echo json_encode($response);

    }
?>