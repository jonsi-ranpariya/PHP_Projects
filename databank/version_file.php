<?php
include('dbcon.php');
if (isset($_POST['id'])) {
$id = $_POST['id'];

$output = '';
    $sql = "SELECT upload_docs FROM Upload_Docs where iid = '$id' order by id desc";
    $run = sqlsrv_query($con,$sql);
$output .= '
		<table class="table table-bordered">				
		<thead>
			<tr>
				<th>Version</th>
				<th>view</th>
			</tr>
		</thead>
		 <tbody>
';
while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
	$file = 'invoice/'.$row['upload_docs'];
$output .= '  
			<tr>
				<td>'.$row['upload_docs'].'<input type="hidden"  </td>
				<td><button type="button" class="btn btn-primary px-2 mx-1 viewfile" onclick="return it('.$file.')">view</button></td>
			</tr>
';
}
   $output .= '  
		</tbody>
		</table>	
';

	echo $output;

}
?>

