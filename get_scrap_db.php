<?php
include('dbcon.php');
if (isset($_POST['id'])) {
$id = $_POST['id'];

	    $sql = "SELECT a.date,a.qnty,b.item,a.dpnt,CONCAT(a.p_name,'__(',a.mcno,')') as person FROM inward a inner join [RM_software].[dbo].[rm_item] b on a.rm_icode = b.i_code where a.i_code = '".$_POST['id']."' and a.status = 'scrap'";
        $run = sqlsrv_query($con,$sql);
             
$output ='';  
$output .= '
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Item</th>
                    <th>Qnty</th>  
                    <th>Dpnt</th>
                    <th>Person</th>
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
                <td>'. $row['item'].'</td>
                <td>'. $row['qnty'] .'</td>
                <td>'. $row['dpnt'] .'</td>
                <td>'. $row['person'] .'</td>
                <td></td>
            </tr>    
    ';
    $qnty += $row['qnty'];
    }

$output .= '
            <tr style="background:lightgray;"> 
                <td align="right"><b>TOTAL Inward =></b></td>
                <td></td>
                <td><b>'.$qnty.'</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>  
   ';
    echo $output;
    }
?>
    
                                  
