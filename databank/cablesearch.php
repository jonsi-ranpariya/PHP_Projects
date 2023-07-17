<?php
include('dbcon.php');
if(isset($_POST['id'])){
?>
	<table id="tabledata" class="table">
		<thead>
			<tr>
				<th>SrNo.</th>
				<th>Status</th>
				<th>Follow By</th>
				<th>Entry Date</th>
				<th>Date Aplied </th>
				<th>Customer</th>
				<th>Place</th>
				<th>Web Registr</th>
				<th>Certificate No.</th>
				<th>Vendor Code</th>
				<th>Valdity Date</th>
				<th>Upload Docs</th>
				<th>Remarks</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT b.cable_id,b.vender_id,a.Sr_no,a.Status,a.Follow_Up_By,format(a.Entry_Date, 'dd-MMM-y') as Entry_Date,format(a.Date_Applied, 'dd-MMM-y') as Date_Applied,a.Customer,a.Place,a.Website_Registration,a.Certificate_No,a.Vendor_Code,format(a.Validity_Date, 'dd-MMM-y') as Validity_Date1,a.Remarks FROM Data a inner join Data_Cable_Type b on a.Sr_no = b.vender_id WHERE cable_id = '".$_POST['id']."'";
			$run = sqlsrv_query($con,$sql);
			$srno = 1;
			while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){

				$vdt = ($row['Validity_Date1'] == '') ? 'Permanent': $row['Validity_Date1'];
				$date1 = date('d-M-y');
				$date2 = $row['Validity_Date1'];
				if((strtotime($date1) > strtotime($date2)) && $vdt != 'Permanent'){
					$rowHighlight = 'v_date';
				}else{
					$rowHighlight = '';
				}

				$sqlx = "SELECT top 1 upload_docs FROM Upload_Docs WHERE iid = '".$row["Sr_no"]."' order by id desc";
				$runx = sqlsrv_query($con,$sqlx);
				$rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC);
			?>
			<tr class="<?php echo $rowHighlight; ?>">
				<td><?php echo $srno; ?></td>
				<td><?php echo $row['Status'];?></td>
				<td><?php echo $row['Follow_Up_By'];?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Entry_Date'];?>"><?php echo substr($row['Entry_Date'], 0, 8);?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Date_Applied'];?>"><?php echo substr($row['Date_Applied'], 0, 8);?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Customer'];?>"><?php echo substr($row['Customer'], 0, 7);?></td>
			    <td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Place'];?>"><?php echo substr($row['Place'], 0, 15);?></td>
				<td><?php echo $row['Website_Registration'];?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Certificate_No'];?>"><?php echo substr($row['Certificate_No'], 0, 15);?></td>
				<td><?php echo $row['Vendor_Code'];?></td>
				<td><?php echo $vdt;?></td>
				<td class="d-flex">
					<?php
						if ($rowx['upload_docs'] == '') {
					?>
					<button type="button" class="btn btn-warning py-1 px-2 mx-1 view"><ion-icon name="eye"></ion-icon></button>
					<?php
					}else{
					?>
					<button type="button" class="btn btn-warning py-1 px-2 mx-1 view" onclick="return popitup('invoice/<?php echo $rowx['upload_docs'];?>')"><ion-icon name="eye"></ion-icon></button>
					<?php } ?>
					<div class="dropdown">
						<button type="button" class="btn btn-primary p-1 dropdown-toggle" data-bs-toggle="dropdown"><ion-icon name="document"></ion-icon></button>
						<ul class="dropdown-menu">
							<?php
								$sqla = "SELECT createdat,upload_docs FROM Upload_Docs where iid = '".$row["Sr_no"]."' order by id asc";
								$runa = sqlsrv_query($con,$sqla);
								$version = 0;
								while($rowa = sqlsrv_fetch_array($runa, SQLSRV_FETCH_ASSOC)){
					            	$version++;
							?>
							<li class="d-flex"><a class="dropdown-item w-50 py-0 px-1"><button type="button" class="btn btn-secondary px-2 mx-1 view" onclick="return popitup('invoice/<?php echo $rowa['upload_docs']; ?>')"><?php echo '1.'.$version; ?></button></a><h3 class="pt-2 fw-bold"><?php echo $rowa['createdat']->format('d-m-y'); ?></h3></li>
							<?php } ?>
						</ul>
					</div>
				</td>
				<td><?php echo $row['Remarks'];?></td>
				<td class="d-flex">
					<button type="button" class="btn btn-success py-1  px-1 mx-1 edit" id="<?php echo $row["Sr_no"]; ?>">Edit</button>
					<button type="button" class="btn btn-primary px-1 mx-0 cable" id="<?php echo $row["Sr_no"]; ?>">Cable</button>
					<button type="button" class="btn btn-secondary py-1 px-1 mx-1 contact" id="<?php echo $row["Sr_no"]; ?>">Contact</button>
					<button type="button" class="btn btn-info py-1  px-1 follow" id="<?php echo $row["Sr_no"]; ?>">Follup</button></td>
			</tr>
			<?php $srno++; } ?>
		</tbody>
	</table>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#tabledata').DataTable({
			"processing": true,
				dom: 'Bfrtip',
				ordering: false,
			lengthMenu: [
			[ 8, 10, 25, 50, -1 ],
			[ '8 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
			],
				buttons: [
					'pageLength','copy', 'excel',
					// Customize button datatable
				{
					text: 'ADD',"className": 'ADD',
					action: function () {
						$('#Add_data').modal('show');
					}
				},
			]
		});			
	});

/*tooltip javascript*/
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  				return new bootstrap.Tooltip(tooltipTriggerEl)
			})
	
</script>