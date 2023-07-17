<?php 
include('dbcon.php');

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
	$sql1 = "SELECT Sr_no,Work_Name,Plateform,format(Assign_Date,'dd-MMM-y') as Assign_Date,estimated_days,Status,Location,Remark,Given_By,format(ApproxFinish_Date,'dd-MMM-y') as ApproxFinish_Date,Dev_By,format(Current_Finish,'dd-MMM-y') as Current_Finish,Delay,Satus FROM Data ORDER BY Dev_By ASC, Assign_Date DESC ";
	$run1 = sqlsrv_query($con,$sql1);
	while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){

		$output .= '
			<tr>
				<td>'.$srno.'</td>
				<td data-toggle="tooltip" title="'.$row1['Work_Name'].'">'.substr($row1['Work_Name'], 0, 30).'</td>
				<td>'.$row1['Plateform'].'</td>
				<td>'.$row1['Assign_Date'].'</td>
				<td>'.$row1['estimated_days'].'</td>
				<td data-toggle="tooltip" title="'.$row1['Status'].'">'.substr($row1['Status'], 0, 10).'</td>
				<td>'.$row1['Location'].'</td>
				<td data-toggle="tooltip" title="'.$row1['Remark'].'">'.substr($row1['Remark'], 0, 12).'</td>
				<td data-toggle="tooltip" title="'.$row1['Given_By'].'">'.substr($row1['Given_By'], 0, 15).'</td>
				<td>'.$row1['ApproxFinish_Date'].'</td>
				<td>'.$row1['Dev_By'].'</td>
				<td>'.$row1['Current_Finish'].'</td>
				<td>'.$row1['Delay'].'</td>
				<td data-toggle="tooltip" title="'.$row1['Satus'].'">'.substr($row1['Satus'], 0, 10).'</td>
				<td class="d-flex"><button type="button" class="btn btn-secondary btn-sm edit" id="'.$row1['Sr_no'].'">Edit </button><button type="button" class="btn btn-primary btn-sm mx-2 add" id="'.$row1['Sr_no'].'">Add</button></td>
			</tr>
		';
		$srno++;
	}
	$output .='
		</tbody>
	</table>
	';
	echo $output;

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