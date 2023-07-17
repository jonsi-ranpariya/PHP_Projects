<?php 
include('dbcon.php');
if(isset($_POST['id'])){

	$output = '';
	$output .='
		<table class="table" id="table">
			<thead>
				<tr>
					<th style="width:3%;">Sr</th>
					<th style="width:16%;">Work Name</th>
					<th style="width:5%;">Plateform</th>
					<th style="width:5%;">Assign Date</th>
					<th style="width:3%;">E.days</th>
					<th style="width:5%;">Status</th>
					<th style="width:5%;">Location</th>
					<th style="width:10%;">Remark</th>
					<th style="width:7%;">Given By</th>
					<th style="width:5%;">Apx.Date</th>
					<th style="width:10%;">Dev.By</th>
					<th style="width:5%;">Finl Date</th>
					<th style="width:3%;">Delay</th>
					<th style="width:10%;">Remark</th>
					<th style="width:8%;">Action</th>
				</tr>
			</thead>
			<tbody id="tbody">
	';
	$srno = 1;
	$sql = "SELECT Sr_no,Work_Name,Plateform,format(Assign_Date,'dd-MMM-y') as Assign_Date,estimated_days,Status,Location,Remark,Given_By,format(ApproxFinish_Date,'dd-MMM-y') as ApproxFinish_Date,Dev_By,format(Current_Finish,'dd-MMM-y') as Current_Finish,Delay,Satus FROM Data where Status = '".$_POST['id']."' ORDER BY Dev_By ASC, Assign_Date DESC ";
	$run = sqlsrv_query($con,$sql);
	while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){

		$output .= '
			<tr>
				<td>'.$srno.'</td>
				 <td data-toggle="tooltip" title="'.$row['Work_Name'].'">'.substr($row['Work_Name'], 0, 30).'</td>
				
				<td>'.$row['Plateform'].'</td>
				<td>'.$row['Assign_Date'].'</td>
				<td>'.$row['estimated_days'].'</td>
				<td data-toggle="tooltip" title="'.$row['Status'].'">'.substr($row['Status'], 0, 10).'</td>
				<td>'.$row['Location'].'</td>
				<td data-toggle="tooltip" title="'.$row['Remark'].'">'.substr($row['Remark'], 0, 12).'</td>
				<td data-toggle="tooltip" title="'.$row['Given_By'].'">'.substr($row['Given_By'], 0, 15).'</td>
				<td class="apdate">'.$row['ApproxFinish_Date'].'</td>
				<td>'.$row['Dev_By'].'</td>
				<td>'.$row['Current_Finish'].'</td>
				<td>'.$row['Delay'].'</td>
				<td data-toggle="tooltip" title="'.$row['Satus'].'">'.substr($row['Satus'], 0, 10).'</td>
				<td class="d-flex"><button type="button" class="btn btn-secondary btn-sm edit" id="'.$row['Sr_no'].'">Edit </button><button type="button" class="btn btn-primary btn-sm mx-2 add" id="'.$row['Sr_no'].'">Add</button></td>
			</tr>
		';
		$srno++;
	}
	$output .='
		</tbody>
	</table>
	';
	echo $output;
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#table').DataTable({
			"processing": true,
				dom: 'Bfrtip',
				ordering: false,
				distroy: true,

			lengthMenu: [
		[ 5, 10, 25, 50, -1 ],
		[ '5 rows',  '10 rows', '25 rows', '50 rows', 'Show all' ]
		],
			buttons: [
				'pageLength','copy', 'excel',
				// Customize button datatable

		]
		});
	
	});
</script>