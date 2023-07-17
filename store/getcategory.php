<?php 
include('..\dbcon.php');
if (isset($_POST['cat'])) {

$query = "SELECT distinct a.rm_icode ,b.item FROM INWARD a left outer join [RM_software].[dbo].[rm_item] b on a.rm_icode = b.i_code where a.i_code = '".$_POST["cat"]."'";
   
 $result = sqlsrv_query($con,$query);
 $output ='<option disabled="true" selected="true">--choose item--</option>';
    while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
 		$output .='
              <option value="'.$row['rm_icode'].'">'.$row['item'].'</option>

 		';

    }
    echo $output;
}
?>