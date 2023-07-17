<?php
include('..\dbcon.php');
if (isset($_POST['stock'])) {

	    $query1= "SELECT SUM(qnty) as qnty FROM inward where rm_icode ='".$_POST['stock']."' and i_code='".$_POST['cat']."' and status='stock' and isdelete != 'true' ";
            $result1=sqlsrv_query($con,$query1);
            $row1 =sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC);

            $query2="SELECT SUM(qnty) as qnty FROM issue where Item_name='".$_POST['stock']."' and item_category='".$_POST['cat']."' and status = 'use'";
            $result2=sqlsrv_query($con,$query2);
            $row2=sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);

            $stock = $row1['qnty'] - $row2['qnty'];
 echo $stock;
}
?>
        