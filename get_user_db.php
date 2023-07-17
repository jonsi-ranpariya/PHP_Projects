<?php
include('dbcon.php');
if (isset($_POST['id'])) {
$id = $_POST['id'];
    
    $sql = "SELECT * FROM issue where item_category = '$id'";
    $run = sqlsrv_query($con,$sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

    if($row['Item_name'] == NULL){                                  /* and a.qnty > '0' qnty 0 [not show live user]*/
        $sql1 = "SELECT a.sr_no,a.dpnt,CONCAT(a.p_name,'__(',a.mcno,')') as person,a.issue_date,b.Item as item1 FROM issue a inner join M_Item b on a.item_category = b.iid where a.item_category='".$_POST['id']."' and a.status = 'use' and a.qnty > '0'"; 
        $run1 = sqlsrv_query($con,$sql1);
    }else{
        $sql1 = "SELECT a.qnty,a.sr_no,a.dpnt,CONCAT(a.p_name,'__(',a.mcno,')') as person,a.issue_date,b.item as item1 FROM issue a inner join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code where a.item_category='".$_POST['id']."' and a.status = 'use' and a.qnty > '0'"; 
        $run1 = sqlsrv_query($con,$sql1);
    }
    	
             
$output ='';  
$output .= '
            <thead>
                <tr>
	               <th>Date</th>
	               <th>item</th>
	               <th>Dpnt</th>  
                   <th>Person</th>
                   <th>Action</th>      
                </tr>  
            </thead>
        <tbody>
     ';


	while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){
$output .= '
            <tr>
                <td>'. $row1['issue_date']->format('d-M-y') .'</td>
                <td>'. $row1['item1'].'</td>
                <td>'. $row1['dpnt'].'</td>
                <td>'. $row1['person'].'</td>
                <td><button type="button" id="'.$row1['sr_no'].'" class="btn btn-primary px-3 action">Action</td>
            </tr>    
    ';

    }

$output .= '
        </tbody>  
   ';
     echo $output;
    }
?>
    
                                  
