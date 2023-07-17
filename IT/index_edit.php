<?php
include('dbcon.php');
include('dbcon2.php');
include('dbcon3.php');
if (isset($_POST['id'])) {
 	$id = $_POST['id'];

 	$sql = "SELECT Sr_no,Work_Name,Plateform,Assign_Date,estimated_days,Status,Location,Remark,Given_By,ApproxFinish_Date,Dev_By,
	format(Current_Finish,'dd-MMM-y') as Current_Finish,Delay,Satus FROM Data where Sr_no = '$id'";
	$run = sqlsrv_query($con,$sql);
	$row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
	$output = '';
	$output .= '
		<table class="table">
			<tr>
				<th>Work Name<input type="hidden" name="id" value="'.$id.'"></th>
				<td><input type="text" name="w_name" class="form-control" value="'.$row['Work_Name'].'"></td>
				<th>Plateform</th>
				<td>
				     <select name="platform"  class="form-control" required>
							<option  value="'.$row['Plateform'].'">'.$row['Plateform'].'</option>
						';

							$sql4="SELECT Distinct Plateform FROM M_Plateform where Plateform is not NULL order by Plateform asc";
							$run4=sqlsrv_query($con,$sql4);
							while ($row4 = sqlsrv_fetch_array($run4, SQLSRV_FETCH_ASSOC)) { 
						$output .= '
							<option value="'.$row4['Plateform'].'">'.$row4['Plateform'].'</option>
							 '; 
					 } 
						$output .= '
						</select>
				</td>
			</tr>
			<tr>
				<th>Assign Date</th>
				<td><input type="date" name="a_date" id="asig_date1" class="form-control" value="'.$row['Assign_Date']->format('Y-m-d').'"></td>
				<th>Esti. days</th>
				<td><input type="text" name="e_days"  id="e_days1" class="form-control" value="'.$row['estimated_days'].'"></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<select  name="status" class="form-control" required>
								<option value="'.$row['Status'].'">'.$row['Status'].'</option>
							';
								$sql1="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
								$run1=sqlsrv_query($con,$sql1);
								while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) { 

							$output .= '
								<option value="'.$row1['Status'].'">'.$row1['Status'].'</option>
							 '; 
					        } 
						$output .= '
							</select>
				</td>
				<th>Location</th>
				<td>
					<select name="location" class="form-control" required>
								<option value="'.$row['Location'].'">'.$row['Location'].'</option>
								';
								$sql2 = "SELECT Distinct Location FROM M_Location where Location is not NULL order by Location asc";
								$run2 = sqlsrv_query($con,$sql2);
								while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) { 

							$output .= '
								<option value="'.$row2['Location'].'">'.$row2['Location'].'</option>
						    '; 
					          } 
						$output .= '
							</select>
				</td>
			</tr>
			<tr>
				<th>Remark</th>
				<td><input type="text" name="remark" class="form-control" value="'.$row['Remark'].'"></td>
				<th>Given By</th>
				<td>
						<select name="givenby" class="form-control" required>
								<option value="'.$row['Given_By'].'">'.$row['Given_By'].'</option>
							';
								$sql3 = "SELECT Distinct emp_name FROM Emp where emp_name is not NULL order by emp_name asc";
								$run3 = sqlsrv_query($conn,$sql3);
								while ($row3 = sqlsrv_fetch_array($run3, SQLSRV_FETCH_ASSOC)) { 
						$output .= '
								<option value="'.$row3['emp_name'].'">'.$row3['emp_name'].'</option>
							 '; 
					          } 
						$output .= '	
							</select>
				</td>
			</tr>
			<tr>
				<th>Apx. Date</th>
				<td><input type="date" name="ap_date" id="apx_date1" class="form-control" value="'.$row['ApproxFinish_Date']->format('Y-m-d').'"></td>
				<th>Dev. By</th>
				<td>
				   <select name="devby" class="devby form-control" required>
						<option value="'.$row['Dev_By'].'">'.$row['Dev_By'].'</option>
					';
						
						$sql9 = "SELECT Distinct Dev_by FROM M_DevBy where Dev_by is not NULL order by Dev_by asc";
						$run9 = sqlsrv_query($con,$sql9);
						while ($row9 = sqlsrv_fetch_array($run9, SQLSRV_FETCH_ASSOC)) { 
					$output .= '
						<option value="'.$row9['Dev_by'].'">'.$row9['Dev_by'].'</option>
						 '; 
					          } 
						$output .= '
					</select>
				</td>
			</tr>
			<tr>
				<th>Crnt/Fi Date</th>
				<td><input type="text" name="cf_date" id="cfdate1"  class="form-control" value="'.$row['Current_Finish'].'"></td>
				<th>Delay</th>
				<td><input type="text" name="delay" id="Delay11" class="form-control" value="'.$row['Delay'].'"></td>
			</tr>
			<tr>
				<th>Remark</th>
				<td><input type="text" name="sat" class="form-control" value="'.$row['Satus'].'"></td>
			</tr>
		</table>
		
	';
	echo $output;

} 
?>
