<?php
include('dbcon.php');
if (isset($_POST['id'])) {
$id = $_POST['id'];

	 $sql = "SELECT a.date,a.qnty,b.item FROM inward a inner join [RM_software].[dbo].[rm_item] b on a.rm_icode = b.i_code where a.i_code='".$_POST['id']."' and a.status = 'stock' and isdelete != 'true'";
     $run = sqlsrv_query($con,$sql);    
             
$output ='';				
$output .= '
        <thead>
            <tr>
              <th>Date</th>
              <th>Item</th>
              <th>Qnty</th>  
              <th>Remark</th>      
            </tr>  
        </thead>
     <tbody>
     ';

     $qnty=0;
	 while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
$output .= '
            <tr>
                <td>'. $row['date']->format('d-M-y') .'</td>
                <td>'. $row['item'] .'</td>
                <td>'. $row['qnty'] .'</td>
                <td></td>
            </tr>    
    ';
    $qnty += $row['qnty'];
    }

$output .= '
            <tr style="background:lightgray;"> 
                <td align="right"><b>TOTAL Inward =></b></td>
                <td><b>'.$qnty.'</b></td>
                <td></td>
                <td></td>
            </tr>  
   ';

    $qnty1=0;
    $sql = "SELECT * FROM issue where item_category = '$id'";
    $run = sqlsrv_query($con,$sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

    if($row['Item_name'] == NULL){  
    $sql1 = "SELECT a.issue_date,a.qnty as qnt,b.Item as item1 FROM issue a inner join M_Item b on a.item_category = b.iid where a.item_category = '".$_POST['id']."' and a.status = 'use' and a.qnty > '0'";
    $run1 = sqlsrv_query($con,$sql1);
    }
else
    {
    $sql1 = "SELECT a.issue_date,a.qnty as qnt,b.item as item1 FROM issue a inner join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code where a.item_category = '".$_POST['id']."' and a.status = 'use' and a.qnty > '0'";
    $run1 = sqlsrv_query($con,$sql1);
    }
   /*  $sql1 = "SELECT a.issue_date,a.qnty as qnt,b.item as item1 FROM issue a inner join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code where a.item_category = '".$_POST['id']."' and a.status = 'use' ";
    $run1 = sqlsrv_query($con,$sql1);
*/

     while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){
$output .= '
            <tr>
                <td>'. $row1['issue_date']->format('d-M-y') .'</td>
                <td>'. $row1['item1'].'</td>
                <td>'. $row1['qnt'] .'</td>
                <td></td>
            </tr>    
    ';
    $qnty1 += $row1['qnt'];
    }

$output .= '
            <tr style="background:lightgray;"> 
                <td align="right"><b>TOTAL Issue =></b></td>
                <td><b>'.$qnty1.'</b></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    ';

    echo $output;
  }
?>
    
                                  
