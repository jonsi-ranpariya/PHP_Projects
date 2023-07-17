<?php
include('dbcon.php');
if (isset($_POST['export'])) {
	$output = '';

	$output .='
		<table border="1">
		
			<thead>
				<tr>
					<th>Machine_Tag</th>
					<th>Location</th>
					<th>Mc_no</th>
					<th>Type_Of_Machine</th>
					<th>Machine_Type</th>
					<th>Year</th>
					<th>Make</th>
					<th>Model</th>
					<th>Capacity</th>
					<th>Capacity_Unit</th>
					<th>Pay_Off</th>
					<th>Take_Up</th>
					<th>Motor_Qty</th>
					<th>Panel_Board</th>
					<th style="width:130px;">Panel_Photo</th>
					<th>Online_Annealing</th>
					<th>Chemical_Tank</th>
					<th>Dies_Qty</th>
					<th>PVC_Hopper</th>
					<th>Extruder_Head</th>
					<th>Skin_Cross_Head</th>
					<th>Screw_Barrel</th>
					<th>Tank_with_Pump</th>
					<th>Meter_Gauge_Sensor</th>
					<th>Spark_Test</th>
					<th>QC_Instrument</th>
					<th>Transformer</th>
					<th>No_of_Spindal</th>
					<th>remark</th>
					<th style="width:130px;">image1</th>
					<th style="width:130px;">image2</th>
					<th style="width:130px;">image3</th>
					<th style="width:130px;">image4</th>
					<th style="width:130px;">image5</th>
				</tr>
			</thead>
			<tbody>
	';
	$sql = "SELECT * FROM machine_list";
	$run=sqlsrv_query($con,$sql); 
	while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
		$output .= '
			<tr style="height:130px;">
			
				<td>'.$row['Machine_Tag'].'</td>
				<td>'.$row['Location'].'</td>
				<td>'.$row['Mc_no'].'</td>
				<td>'.$row['Type_Of_Machine'].'</td>
				<td>'.$row['Machine_Type'].'</td>
				<td>'.$row['Year'].'</td>
				<td>'.$row['Make'].'</td>
				<td>'.$row['Model'].'</td>
				<td>'.$row['Capacity'].'</td>
				<td>'.$row['Capacity_Unit'].'</td>
				<td>'.$row['Pay_Off'].'</td>
				<td>'.$row['Take_Up'].'</td>
				<td>'.$row['Motor_Qty'].'</td>
				<td>'.$row['Panel_Board'].'</td>
				<td><img src="http://27.54.172.60:5545/machinelist/machine_photo/'.$row['Panel_Photo'].'" width="130" height="130"></td>
				<td>'.$row['Online_Annealing'].'</td>
				<td>'.$row['Chemical_Tank'].'</td>
				<td>'.$row['Dies_Qty'].'</td>
				<td>'.$row['PVC_Hopper'].'</td>
				<td>'.$row['Extruder_Head'].'</td>
				<td>'.$row['Skin_Cross_Head'].'</td>
				<td>'.$row['Screw_Barrel'].'</td>
				<td>'.$row['Tank_with_Pump'].'</td>
				<td>'.$row['Meter_Gauge_Sensor'].'</td>
				<td>'.$row['Spark_Test'].'</td>
				<td>'.$row['QC_Instrument'].'</td>
				<td>'.$row['Transformer'].'</td>
				<td>'.$row['No_of_Spindal'].'</td>
				<td>'.$row['remark'].'</td>
				';
					$sql1 = "SELECT * FROM Upload_Docs WHERE iid = '".$row['sr']."'";
					$run1=sqlsrv_query($con,$sql1);
					while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){ 
				$output .= '
				<td><img src="http://27.54.172.60:5545/machinelist/machine_photo/'.$row1['upload_docs'].'" width="130" height="130"></td>
				';
					}
				$output .= '
			</tr>
		';
	}
	$output .= '
		</tbody>
	</table>
	';

	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename=machine_list.xls');
	header('Content-Transfer-Encoding: Macro');

	echo $output;
}


/*27.54.172.60:5545*/







/*if(isset($_POST['data'])){

$sql = "SELECT Machine_Tag,Location,Mc_no,Type_Of_Machine,Machine_Type,Year,Make,Model,Capacity,Capacity_Unit,Pay_Off,Take_Up,Motor_Qty,Panel_Board,Panel_Photo,Online_Annealing,Chemical_Tank,Dies_Qty,PVC_Hopper,Extruder_Head,Skin_Cross_Head,Screw_Barrel,Tank_with_Pump,Meter_Gauge_Sensor,Spark_Test,QC_Instrument,Transformer,No_of_Spindal,remark FROM machine_list";
	$run=sqlsrv_query($con,$sql);
	$rows = array();
	while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC))
	{
	$rows[] = $row;
	}
		echo json_encode($rows);
	}*/
?>

