<?php 

if(isset($_POST["id"]))
{ 
  include('dbcon.php');

  $sql = "SELECT * from item_master WHERE id = '".$_POST["id"]."'";
  $run = sqlsrv_query($con,$sql);
 	$row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

$output = '';     
$output .= '

<div class="d1">
<div class="row">
		   <label class="col-4">Item_Category</label>
			<input class="col-6" type="text" name="item" id="item" value="'.$row['item'].'">
			<input type="hidden" name="id" value="'.$row['id'].'">
	</div>
	</div>
  
    ';

echo $output;

}

 ?>