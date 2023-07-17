<?php
include('dbcon.php');
include('dbcon4.php');
if (isset($_POST['id'])) {
 	$id = $_POST['id'];

 	$sql = "SELECT Sr_no,Status,Follow_Up_By,format(Entry_Date, 'dd-MMM-Y') as Entry_Date,format(Date_Applied, 'dd-MMM-y') as Date_Applied,Date_Applied as dtapp,Customer,Place,Website_Registration,Certificate_No,Vendor_Code,format(Validity_Date, 'dd-MMM-y') as Validity_Date,Validity_Date as valditydt,Remarks FROM legaldata where Sr_no = '$id'";
 /*;*/
	$run = sqlsrv_query($con,$sql);
	$row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
	$output = '';
	$output .= '
		<table class="table">
			<tr>
				<th>Status<input type="hidden" name="id" value="'.$id.'"></th>
				<td>
				     <select name="Status" class="form-control Status"  >
							<option  value="'.$row['Status'].'">'.$row['Status'].'</option>
						';

							$sql4="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
							$run4=sqlsrv_query($con,$sql4);
							while ($row4 = sqlsrv_fetch_array($run4, SQLSRV_FETCH_ASSOC)) { 
						$output .= '
							<option value="'.$row4['Status'].'">'.$row4['Status'].'</option>
							 '; 
					 } 
						$output .= '
						</select>
				</td>
				<th>Follow_By</th>
				<td>
				     <select name="Follow_By" class="form-control Follow_By" >
							<option  value="'.$row['Follow_Up_By'].'">'.$row['Follow_Up_By'].'</option>
						';

							$sql5="SELECT Distinct Follow_By FROM M_Customer where Follow_By is not NULL order by Follow_By asc";
							$run5=sqlsrv_query($con,$sql5);
							while ($row5 = sqlsrv_fetch_array($run5, SQLSRV_FETCH_ASSOC)) { 
						$output .= '
							<option value="'.$row5['Follow_By'].'">'.$row5['Follow_By'].'</option>
							 '; 
					 } 
/*Edit format date*/
 $dtapp = ($row['dtapp'] == NULL) ? '' : $row['dtapp']->format('Y-m-d');
 $valditydt = ($row['valditydt'] == NULL) ? '' : $row['valditydt']->format('Y-m-d');
						$output .= '
						</select>
				</td>
			</tr>
			<tr>
				<th>Entry Date</th>
				<td><input type="date" name="Entry_Date" id="current_date"  placeholder="DD-MM-YYYY" class="form-control" value="'.date("Y-m-d").'" ></td>

				<th>Date Applied </th>
				<td><input type="date" name="Date_Applied" placeholder="DD-MM-YYYY" class="form-control" value="'.$dtapp.'" ></td>
			</tr>
			<tr>
				<th>Customer</th>
				<td>
					<select  name="Customer" class="form-control Customer" >
								<option value="'.$row['Customer'].'">'.$row['Customer'].'</option>
							';
								$sql1="SELECT Distinct name FROM inquiry.customer where name is not NULL order by name asc";
								$run1=sqlsrv_query($conn,$sql1);
								while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) { 

							$output .= '
								<option value="'.$row1['name'].'">'.$row1['name'].'</option>
							 '; 
					        } 
						$output .= '
					</select>
				</td>
				<th>Place</th>
				<td>
				<input type="text" name="Place" class="form-control Place" value="'.$row['Place'].'" >
				</td>
				</tr>
				
			<tr>
			<th>Website Registration</th>
			  <td>
				<select name="Website_ragiter" class="form-control Website_ragiter" >
						<option value="'.$row['Website_Registration'].'">'.$row['Website_Registration'].'</option>
						';
						$sql2 = "SELECT Distinct Website_ragiter FROM M_Website where Website_ragiter is not NULL order by Website_ragiter asc";
						$run2 = sqlsrv_query($con,$sql2);
						while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) { 

					$output .= '
						<option value="'.$row2['Website_ragiter'].'">'.$row2['Website_ragiter'].'</option>
				    '; 
			          } 
					$output .= '
				</select>
			   </td>
				<th>Certificate No.</th>
				<td><input type="text" name="Certificate_No"  class="form-control Certificate_No" value="'.$row['Certificate_No'].'">
				</td>
			</tr>
			<tr>
				<th>Vendor Code</th>
				<td><input type="text" name="Vendor_Code" class="form-control Vendor_Code" value="'.$row['Vendor_Code'].'" ></td>
				<th>Validity Date</th>
				<td><input type="date" name="Validity_Date" class="form-control Validity_Date" value="'.$valditydt.'" ></td>
				
			</tr>
			<tr>
				<th>Upload Docs</th>
				<td><input type="file" name="file" class="form-control"></td>
				<th>Remarks</th>
				<td><input type="text" name="Remarks" class="form-control" value="'.$row['Remarks'].'"  ></td>
			</tr>
			
		</table>
		
	';
	echo $output;

} 
?>
