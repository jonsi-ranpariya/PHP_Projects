<?php 
include('dbcon.php');
if(isset($_POST["id"])){ 
$output = '';
    $sql = "SELECT * from Cable_Type ";
    $run = sqlsrv_query($con,$sql);
    $output .='
    <thead>
        <tr> 
   		    <th>Cable Type</th>
            <th><input type="checkbox" id="selectAll" ></th>
        </tr>
    </thead>
    <tbody id="t_body">
  ';
while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){

    $qry="SELECT * FROM Data_Cable_Type where vender_id = '".$_POST["id"]."' AND cable_id = '".$row["Sr_no"]."'";
    $run1 = sqlsrv_query($con,$qry);
    $row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC);
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result=sqlsrv_query($con,$qry,$params,$options);
    $count=sqlsrv_num_rows($result);

$output .= '                                                            
    <tr id="'.$row['Sr_no'].'">  
        <td>'.$row['Cable_Type'].'</td>
        ';
        if($count > 0){
            $output .='
            <td><input type="checkbox" id="check" value="'.$row["Sr_no"].'" class="check1 mx-5" checked><input type="hidden" id="Sr_no" value="'.$_POST["id"].'" ></td>
            ';
        }else{
            $output .='
            <td><input type="checkbox" id="check" value="'.$row["Sr_no"].'" class="check1 mx-5" ><input type="hidden" id="Sr_no" value="'.$_POST["id"].'" ></td>
            ';
        }
         $output .='
    </tr>
    ';
}
$output .='
</tbody>
';
echo $output;

}

?>
<script type="text/javascript">
   
    $('#selectAll').click(function(e){
    $(this).toggleClass('clicked');
    $(this).closest('table').find('input[type="checkbox"]').prop('checked', $(this).hasClass('clicked'))
});

</script>