<?php
include('dbcon2.php');
if (isset($_POST['item'])) {

    $query = "SELECT * FROM rm_item WHERE (m_code = '143' or (m_code = '138' AND s_code = '866') ) and item LIKE '%".$_POST["item"]."%'";  
    $result = sqlsrv_query($conn,$query);
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){

       $response[] = array("label"=>$row['item'],"id"=>$row['i_code']);
    }
    echo json_encode($response);

  }
