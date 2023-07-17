<?php
include('dbcon.php');
if(isset($_POST['id'])){

	$output ='';
	$output .='
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
	';
			$srno = 1;
			$sql = "SELECT b.cable_id,b.vender_id,a.Sr_no,a.Status,a.Follow_Up_By,format(a.Entry_Date, 'dd-MMM-y') as Entry_Date,format(a.Date_Applied, 'dd-MMM-y') as Date_Applied,a.Customer,a.Place,a.Website_Registration,a.Certificate_No,a.Vendor_Code,format(a.Validity_Date, 'dd-MMM-y') as Validity_Date1,a.Remarks FROM Data a inner join Data_Cable_Type b on a.Sr_no = b.vender_id WHERE cable_id = '".$_POST['id']."'";
				$run = sqlsrv_query($con,$sql);
			
				   while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){

       $output .='
		<tr>
			<td>'.$srno.'</td>
			<td>'. $row['Status'].'</td>
			<td>'. $row['Follow_Up_By'].'</td>
			<td data-bs-toggle="tooltip" data-bs-placement="right"  title="'. $row['Entry_Date'].'">'.substr($row['Entry_Date'], 0, 20).'</td>
			<td data-bs-toggle="tooltip" data-bs-placement="right"  title="'. $row['Date_Applied'].'">'.substr($row['Date_Applied'], 0, 20).'</td>
			<td data-bs-toggle="tooltip" data-bs-placement="right"  title="'. $row['Customer'].'">'.substr($row['Customer'], 0, 20).'</td>
			<td>'. $row['Place'].'</td>
			<td>'. $row['Website_Registration'].'</td>
			<td data-bs-toggle="tooltip" data-bs-placement="right" title="'. $row['Certificate_No'].'">'.substr($row['Certificate_No'], 0, 20).'</td>
			<td>'. $row['Vendor_Code'].'</td>
			<td>'. $row['Validity_Date1'].'</td>
			<td></td>
			<td>'. $row['Remarks'].'</td>
			<td></td>
     ';
     $srno++; }
	$output .= '
	     </tbody>
	  </table>
	';
	echo $output;
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




<?php
include('header.php');
include('dbcon.php');
include('dbcon4.php');
include('dbcon5.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Vendor Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!----------------------- jQuery UI --------------------------->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
		<!-- included css drop down Serching -->
		<link href='css/select2.min.css' rel='stylesheet' type='text/css'>
		<style type="text/css">
			.container-fluid{
				margin-top: 6%;
				padding: 0px !important;
			}
			.table{
				width: 100%;
				margin: 5px 2px;
					/*	border: 0.3px solid #8080805c;*/
			}
			.table th{
			text-align: center;
				white-space: nowrap;
				background-color: #d2e0ebd1;
				border: 1px solid #8080805c;
			}
			.table td{
				text-align: center;
				border: 0.3px solid #1f1e2014;
				background-color: #fffff;
			 /*	padding: 0px;*/
			}
			.table-bordered>:not(caption)>*>* {
			border-width: 0 1px;
			}
			.table input, table select{
				border: none;
				box-shadow: none;
				/*outline: none;*/
			}
			/*.table input[type='number']{
				width: 80px !important;
			}*/
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}
			.ADD{
			background-color: #84bfe0 !important;
			}
			.mod {
				width: 100%;
				max-width: none;
				margin: 0;
			}
			.mod1{
				height: 100%;
				border: 0;
				border-radius: 0;
			}
			.mod2 {
			overflow-y: auto;
			}
			#check{
				width: 20px;
				height: 10px;
			}
			
			#table2 #check {
				width: 22px;
				height: 20px;
				font-size: 15px;
				margin-right: 40px;
				/*margin-left: auto !important;*/
			}
			#selectAll {
			width: 22px;
			height: 20px;
			font-size: 15px;
			margin: auto !important;
			}
				/*	#cable1{
				background-color: black;
			}*/
			table.dataTable thead th,table.dataTable thead td{
			padding: 10px 5px;
			border-bottom: 1px solid #111;
			}
			.v_date{
				background-color: #df79a845 !important;
			}
			#editModal1{
			background-color: #97b2cf73;
			}
			/*ADD dropdown searching*/
			.select2-container--default .select2-results>.select2-results__options{
			background-color:white;
			}
			.select2-container--open .select2-dropdown--below{
			background-color:white;
			}
			.select2-container {
			max-width: 100%;
			}
			.select2-container .select2-selection--single{
			height:34px !important;
			width: 135px;
			}
			.select2-container--default .select2-selection--single{
			border: 1px solid #ccc !important;
			border-radius: 0px !important;
			}
		    /*.place{
				width: 4%;
			}*/
			/*row line*/
				/*table.dataTable{
				border-collapse: collapse ;
			}*/
		</style>
	</head>
<body>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><strong>Vendor Ragitration Details</strong></h6>
		</div>
		<div class="card-body" id="getdata">	
		    <div class="row">
				<div class="col-lg-1">  
				   <label class="form-label">
				     <button type="button" class=" btn btn-info px-4" id="Search"><i class="fa fa-search fa-lg"></i></button>
				  </label>
				</div>
				<div class="col-lg-3 d-flex">
				    <label class="form-label mx-2">CABLE:</label>
				    	<select name="cable" class="form-control mb-2" id="cablesearch">
						 <option></option>
						 <?php 
							$sqlb = "SELECT * from Cable_Type";
							$runb = sqlsrv_query($con,$sqlb);
							while($rowb = sqlsrv_fetch_array($runb, SQLSRV_FETCH_ASSOC)){
						 ?>
						 <option value="<?php echo $rowb['Sr_no'] ?>"><?php echo $rowb['Cable_Type'] ?></option>
					    <?php } ?>
					  </select>
				   
				 </div>		
			   <div class="col-lg-8"></div>		
			</div>
			<div id="addTable">
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
							$sql = "SELECT Sr_no,Status,Follow_Up_By,format(Entry_Date, 'dd-MMM-y') as Entry_Date,format(Date_Applied, 'dd-MMM-y') as Date_Applied,Customer,Place,Website_Registration,Certificate_No,Vendor_Code,format(Validity_Date, 'dd-MMM-y') as Validity_Date1,Remarks FROM Data";
							$run = sqlsrv_query($con,$sql);
							$srno = 1;
							while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
							/*VALID date null [permanent]show add modal data*/
						$vdt = ($row['Validity_Date1'] == '') ? 'Permanent': $row['Validity_Date1'];
	/*validity expire hightligt row*/
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
							<td data-bs-toggle="tooltip" data-bs-placement="right"  title="<?php echo $row['Entry_Date'];?>"><?php echo substr($row['Entry_Date'], 0, 8);?></td>
							<td data-bs-toggle="tooltip" data-bs-placement="right"  title="<?php echo $row['Date_Applied'];?>"><?php echo substr($row['Date_Applied'], 0, 8);?></td>
							<td data-bs-toggle="tooltip" data-bs-placement="right"  title="<?php echo $row['Customer'];?>"><?php echo substr($row['Customer'], 0, 7);?></td>
						    <td data-bs-toggle="tooltip" data-bs-placement="right"  title="<?php echo $row['Place'];?>"><?php echo substr($row['Place'], 0, 15);?></td>
							<!-- <td class="place"><?php echo $row['Place'];?></td> -->
							<td><?php echo $row['Website_Registration'];?></td>
							<td data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $row['Certificate_No'];?>"><?php echo substr($row['Certificate_No'], 0, 15);?></td>
							<td><?php echo $row['Vendor_Code'];?></td>
							<td><?php echo $vdt;?></td>
							<td class="d-flex">
<!-- upload_docs '' blank[not open] -->
								<?php
									if ($rowx['upload_docs'] == '') {
								?>
								<button type="button" class="btn btn-warning py-1 px-2 mx-1 view"><ion-icon name="eye"></ion-icon></button>
								<?php
								}
								else{
								?>
								<button type="button" class="btn btn-warning py-1 px-2 mx-1 view" onclick="return popitup('invoice/<?php echo $rowx['upload_docs'];?>')"><ion-icon name="eye"></ion-icon></button>
								<?php }
								?>
								
								<!-- <button type="button" class="btn btn-info px-2 mx-1 version2" id=""><ion-icon name="document"></ion-icon></button> -->
<!-- Version upload_docs -->
								<div class="dropdown">
									<button type="button" class="btn btn-primary p-1 dropdown-toggle" data-bs-toggle="dropdown"><ion-icon name="document"></ion-icon></button>
									<ul class="dropdown-menu">
										<?php
											$sqla = "SELECT createdat,upload_docs FROM Upload_Docs where iid = '".$row["Sr_no"]."' order by id asc";
											$runa = sqlsrv_query($con,$sqla);
/*version increment <?php echo '1.'.$version; ?>*/  $version = 0;
											      while($rowa = sqlsrv_fetch_array($runa, SQLSRV_FETCH_ASSOC)){
								                 $version++;
										?>
										<li class="d-flex"><a class="dropdown-item w-50 py-0 px-1"><button type="button" class="btn btn-secondary px-2 mx-1 view" onclick="return popitup('invoice/<?php echo $rowa['upload_docs']; ?>')"><?php echo '1.'.$version; ?></button></a><h3 class="pt-2 fw-bold"><?php echo $rowa['createdat']->format('d-m-y'); ?></h3></li>
										<?php } ?>
									</ul>
								</div>
							</td>
							<td><?php echo $row['Remarks'];?></td>
							<td class="d-flex"><button type="button" class="btn btn-success py-1  px-1 mx-1 edit" id="<?php echo $row["Sr_no"]; ?>">Edit</button><button type="button" class="btn btn-primary px-1 mx-0 cable" id="<?php echo $row["Sr_no"]; ?>">Cable</button><button type="button" class="btn btn-secondary py-1 px-1 mx-1 contact" id="<?php echo $row["Sr_no"]; ?>">Contact</button><button type="button" class="btn btn-info py-1  px-1 follow" id="<?php echo $row["Sr_no"]; ?>">Follup</button></td>
						</tr>
						<?php $srno++; } ?>
					</tbody>
				</table>
			</div>
		</div></div></div>
<!-----------------------------------------   ADD Modal ----------------------------------------->
<div class="modal fade" id="Add_data" aria-labelledby="Add_data" aria-hidden="true" tabindex="-1">

<!----------------- Scrollable modal --------------------------->
<div class="modal-dialog modal-xl mod">
	<div class="modal-content mod1">
		<div class="modal-header font-weight-bold">
			<h4><strong>Vender Ragitration</strong></h4>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body mod2" id="add_modal">
			<div class="row">
				<div class="col-2">
					<button type="button" class="btn btn-success px-3 mx-5 pt-2 add" >Add Follow</button>
				</div>
			</div>
			<br>						<!-- [Upload file]enctype="multipart/form-data" -->
			<form id="form" action="add_venderRagister.php" method="POST" enctype="multipart/form-data">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th>SrNo</th>
					<th style="width:5%;">Status</th>
					<th>Follow By</th>
					<th>Entry Date</th>
					<th>Date Applied </th>
					<th>Customer</th>
					<th>Place</th>
					<th>Website Registr</th>
					<th>Certificate No.</th>
					<th style="width:20%;">Vendor Code</th>
					<th>Validity</th>
					<th>Validity Date</th>
					<th>Upload Docs</th>
					<th>Remarks</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>
						<select name="Status" class="form-control Status" required>
							<option selected="true" disabled="true" value="">SELECT</option>
							<?php
							$sqlp="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
							$runp=sqlsrv_query($con,$sqlp);
							while ($rowp = sqlsrv_fetch_array($runp, SQLSRV_FETCH_ASSOC)) { ?>
							<option value="<?php echo $rowp['Status']; ?>"><?php echo $rowp['Status']; ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="Follow_By" class="form-control Follow_By"  required>
							<option selected="true" disabled="true" value="">SELECT</option>
							<?php
							$sql1="SELECT Distinct sortname FROM [user] where sortname is not NULL order by sortname asc";
							$run1=sqlsrv_query($connt,$sql1);
							while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) { ?>
							<option value="<?php echo $row1['sortname']; ?>"><?php echo $row1['sortname']; ?></option>
							<?php } ?>
						</select>
					</td>
					<td><input type="date" name="Entry_Date" id="current_date"  placeholder="DD-MM-YYYY" class="form-control" value="<?php echo date("Y-m-d"); ?>" required></td>
					<td><input type="date" name="Date_Applied" placeholder="DD-MM-YYYY" class="form-control" required></td>
					<td>
						<select name="Customer" class="form-control Customer" required>
							<option selected="true" disabled="true" value="">SELECT</option>
							<?php
							$sql2="SELECT Distinct name FROM inquiry.customer where name is not NULL order by name asc";
							$run2=sqlsrv_query($conn,$sql2);
							while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) { ?>
							<option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
							<?php } ?>
						</select>
					</td>
					<td><input type="text" name="Place" class="form-control Place" required></td>
					<td>
						<select name="Website_ragiter" class="form-control Website_ragiter" required>
							<option selected="true" disabled="true" value="">SELECT</option>
							<?php
							$sql3="SELECT Distinct Website_ragiter FROM M_Website where Website_ragiter is not NULL order by Website_ragiter asc";
							$run3=sqlsrv_query($con,$sql3);
							while ($row3 = sqlsrv_fetch_array($run3, SQLSRV_FETCH_ASSOC)) { ?>
							<option value="<?php echo $row3['Website_ragiter']; ?>"><?php echo $row3['Website_ragiter']; ?></option>
							<?php } ?>
						</select>
					</td>
					<td><input type="number" step="any" name="Certificate_No"  class="form-control Certificate_No" required ></td>
					<td><input type="text" name="Vendor_Code" class="form-control Vendor_Code" required></td>
					<td><select class="form-control validity" required>
						<option selected="true" disabled="true" value="">SELECT</option>
						<option value="YES">YES</option>
						<option value="NO">NO</option>
					</select></td>
					<td><input type="date" name="Validity_Date" class="form-control Validity_Date aaa" ></td>
					<td><input type="file" name="file" class="form-control" required></td>
					<td><input type="text" name="Remarks" class="form-control Remarks" ></td>
				</tr>
			</tbody>
		</table>
	</form>
			
</div>
<div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-primary"  form="form">Sumbit</button>
</div>
</div>
</div>
</div>
	<!-----------------------------------------   CABLE Modal ----------------------------------------->
	<div class="modal fade" id="cable_type" tabindex="-1" aria-labelledby="cable_type" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header" >
					<h5 class="modal-title" id="exampleModalLabel">New message</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="cable1">
					<form method="POST" >
						<table id="table2" class="table table-bordred">
							
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<button name="submit1" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="submit1">Save</button>
					<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
				</div>
			</div>
		</div>
	</div>
<!----------------------------------------- END CABLE Modal ----------------------------------------->
<!-----------------------------------------   CONTACT DETAILS Modal ----------------------------------------->
	<div class="modal fade" id="contact_detail" tabindex="-1" aria-labelledby="contact_detail" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New message</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col-lg-1">
						<label></label>
						<input type="button" class="btn btn-success form-control" value="Add Contact" id="add_contact">
					</div>
					<br>
					<form id="form2">
						<table id="table3" class="table table-bordred">
							<thead>
								<th>Contact Person</th>
								<th>Dept</th>
								<th>Designation</th>
								<th>Mobile</th>
								<th>Email</th>
							</thead>
							<tbody id="tbody3">
								<tr>
									<td><input type="text" name="contact_prson[]" class="form-control Person" id="1person" required >
										<input type="hidden" name="srno" class="no"></td>
										<td><input type="text" name="Dept[]" class="form-control" required></td>
										<td><input type="text" name="Designation[]" class="form-control" required></td>
										<td><input type="text" name="Mobile[]"  class="form-control phone" placeholder="(XXX) XXX-XXXX" required></td>
										<td><input type="email" name="Email[]" class="form-control" required></td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" name="submit" class="btn btn-primary" id="cableSubmit">Sumbit</button>
						
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-----------------------------------------CONTACT DETAILS Modal ----------------------------------------->
		<!-----------------------------------------  FOLLOW UP Modal ----------------------------------------->
	<div class="modal fade" id="follow_up" tabindex="-1" aria-labelledby="follow_up" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New message</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col-lg-1">
						<label></label>
						<input type="button" class="btn btn-success form-control" value="Add Row" id="add_new">
					</div>
					<br>
					<form  id="form3">
						<table id="table3" class="table table-bordred">
							<thead>
								<th>Sr no</th>
								<th>Date</th>
								<th>Followup By</th>
								<th>NextFollowup Date</th>
								<th>Remark</th>
							</thead>
							<tbody id="tbody2">
								<tr>
									<td>1</td>
									<td><input type="date" name="date[]" class="form-control" required>
										<input type="hidden" name="sr_no" class="follow"></td>
										<td>
											<select name="Follow_By[]" class="form-control Follow" id="1Follow" required>
												<option selected="true" disabled="true" value="">SELECT</option>
												<?php
												$sql4="SELECT Distinct name FROM inquiry.inquiry_user where name is not NULL order by name asc";
												$run4=sqlsrv_query($conn,$sql4);
												while ($row4 = sqlsrv_fetch_array($run4, SQLSRV_FETCH_ASSOC)) { ?>
												<option value="<?php echo $row4['name']; ?>"><?php echo $row4['name']; ?></option>
												<?php } ?>
											</select>
										</td>
										<td><input type="date" name="next_date[]" class="form-control" required></td>
										<td><input type="text" name="Remark[]" class="form-control" ></td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" name="save" class="btn btn-primary" id="followsubmit">Save</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!----------------------------------------- FOLLOW UP Modal ----------------------------------------->
		<!-----------------------------------------   ADD Follow By Modal ----------------------------------------->
		<div class="modal fade-none" id="Add_follow" aria-labelledby="Add_follow" aria-hidden="true" tabindex="-1">
			
			<!----------------- Scrollable modal --------------------------->
			<div class="modal-dialog modal-none">
				<div class="modal-content">
					<div class="modal-header font-weight-bold">
						<h4>Follow Up By</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="add_master_follow.php" method="POST" id="form4">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Follow_Up_By</th>
									</tr>
									<tr>
										<td><input type="text" class="form-control" name="Person" required></td>
									</tr>
								</thead>
							</table>
						</form>
					</div>
					<div class="modal-footer">
						<button id="submit" name="submit" class="btn btn-primary" form="form4"><span>Sumbit</span></button>
					</div>
				</div>
			</div>
		</div>
	<!----------------------------------------- END ADD Follow By Modal ----------------------------------------->
<!----------------------------------- The edit Modal ------------------------------------>
		<div class="modal fade " id="editModal" aria-labelledby="editModal" aria-hidden="true" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Modal Heading</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body" id="editModal1">
						<form action="vender_ragi_db.php" method="POST" id="edit_form"  enctype="multipart/form-data">
						<table class="table table-bordered"></table>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					<input type="submit" name="save" form="edit_form" class="btn btn-primary">
				</div>
			</div>
		</div>
	</div>
	<!-----------------------------------end The edit Modal ------------------------------------>
		<!----------------------------------- The version Modal ------------------------------------>
					<div class="modal fade " id="versionmodal" aria-labelledby="versionmodal" aria-hidden="true" tabindex="-1">
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">File Version</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
								</div>
								<div class="modal-body">
									<form  method="POST" id="version1">
									</form>
								</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>
	<!-----------------------------------end The version Modal ------------------------------------>
			<!-- dropdown serching selected2 -->
			<script src='js/select2.min.js' type='text/javascript'></script>
			<!-- input mask -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
			<!-- <script src="https://unpkg.com/imask"></script> -->
			
			<script type="text/javascript">
				$('#vragiser').addClass('active');
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

		/*----------------------- Code for get data ------------------------*/
	$(document).on('click','#Search',function(){
		var id = $('#cablesearch').val();
		$.ajax({
			url: "cablesearch.php",
			type: 'post',
			data: {id:id},
			success: function( data ) {
				$('#addTable').html(data);
			}
		});
		
	});

/*tooltip javascript*/
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  				return new bootstrap.Tooltip(tooltipTriggerEl)
			})

			$(document).ready(function() {
			$(".Customer").select2({
			dropdownParent: $("#Add_data")
			});
			$(".Follow_By").select2({
			dropdownParent: $("#Add_data")
			});
			$(".Follow").select2({
			dropdownParent: $("#follow_up")
			});
			});

			/*Select master [select option] change filed*/
			$(document).on('change','.validity',function(){
			var y=$(this).val();
			if (y=='YES') {
			$(".aaa").show();
			}
			else{
			$(".aaa").hide();
			}
			});

			/*vender ragister Edit  button click event*/
			$(document).on('click', '.edit', function(){
				var id = $(this).attr("id");
					$.ajax({
						url:"vender_ragi_edit.php",
						method:"POST",
						data:{id:id},
						success:function(data)
						{
							$('#edit_form').html(data);
							$('#editModal').modal('show');
						}
				});
			});

			$(document).on('click','.version2',function(){
			var id = $(this).attr("id");
					$.ajax({
						url:"version_file.php",
						method:"POST",
						data:{id:id},
						success:function(data)
						{
							$('#version1').html(data);
							$('#versionmodal').modal('show');
						}
				});
			});

			$(document).ready(function(){
				$('#Add_data,#cable_type,#contact_detail,#follow_up,#editModal').modal({
				backdrop: 'static',
				keyboard: false  // to prevent closing with Esc button (if you want this too)
			})
			});
			/*current date*/
			/*$(document).on('focus', '#current_date', function() {
				$(this).datepicker();
				$(this).datepicker( "option", "dateFormat", "d-M-y" );
			});*/

/*mobile numer valid*/
			$(document).ready(function(){
				$('.phone').inputmask({"mask": "(999) 999-9999"});
			});
	
			$(document).on('click', '.add', function(){
				$('#Add_follow').modal('show');
			});
			
/*cable table load ajax*/
			$(document).on('click', '.cable', function(){
			var id = $(this).attr("id");
			$.ajax({
				url:"cable_type.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					$('#table2').html(data);
					$('#cable_type').modal('show');
				}
			});
			
			});

			
			// Start add row process  Inward
				var ab = 1;
				$(document).on('click', '#add_contact', function () {
					var y = $('#'+ab+'person').val();
					/*alert(y);*/
					if (y == '') {
					alert('pls fill Current row');
					}
					else{
					ab++;
				var rowLength = $('table').find('tbody3 tr').length;
				var rowHtml = '<tr row-id="' + (rowLength + 1) + '">';
							rowHtml += '<td><input type="text" name="contact_prson[]" class="form-control person"  id="'+ab+'person" required></td>';
							rowHtml += '<td><input type="text" name="Dept[]" class="form-control" required></td>';
							rowHtml += '<td><input type="text" name="Designation[]" class="form-control" required></td>';
						rowHtml += '<td><input type="text" name="Mobile[]"  class="form-control phone" placeholder="(XXX) XXX-XXXX" required></td>';
						
						rowHtml += '<td><input type="email" name="Email[]" class="form-control" required></td>';
						
						$('table').find('#tbody3').append(rowHtml);
					}

/*phone inputmask*/
					$('.phone').inputmask({"mask": "(999) 999-9999"});
						});

					// Start add row process  Inward
					var abc = 1;
					$(document).on('click', '#add_new', function () {
					var y = $('#'+abc+'Follow').val();
					if (y == null) {
					alert('pls fill Current row');
					}
					else{
					abc++;
					var rowLength = $('table').find('tbody2 tr').length;
					var rowHtml = '<tr row-id="' + (rowLength + 1) + '">';
								rowHtml += '<td>'+abc+'</td>';
								rowHtml += '<td><input type="date" name="date[]" class="form-control" required></td>';
					rowHtml += '<td><select name="Follow_By[]" class="form-control Follow1" id="'+abc+'Follow" required><option selected="true"  disabled="true" value="" >SELECT</option><?php
									$sql10="SELECT Distinct sortname FROM [user] where sortname is not NULL order by sortname asc";
									$run10=sqlsrv_query($connt,$sql10);
					while ($row10 = sqlsrv_fetch_array($run10, SQLSRV_FETCH_ASSOC)) { ?>
					<option value="<?php echo $row10['sortname']; ?>"><?php echo $row10['sortname']; ?></option><?php } ?>
					</select></td>';
					rowHtml += '<td><input type="date" name="next_date[]" class="form-control" required></td>';
				
					rowHtml += '<td><input type="text" name="Remark[]" class="form-control" required></td>';
				
					$('table').find('#tbody2').append(rowHtml);
					}
					});
				
				//--------------CHECK BOX--------------
				
				$('#submit1').click(function(){
					if(confirm("Are you sure you want to Save this?"))
				{
					var ab = $('#Sr_no').val();                          /*add variable*/
					var id = [];
					$('.check1:checked').each(function(i){              /*id chage 2 check box used */
					id[i] = $(this).val();
					
				});
					if(id.length === 0)                                /*tell you if the array is empty*/
				{
					alert("Please Check at least one checkbox");
				}
				else
				{
					$.ajax({
					url:'cable_type_db.php',
					method:'POST',
					data:{id:id,ab:ab},
					success:function(data)
				{
					alert(data);
				}/*,
				complete:function()  //load in current page[check box save load current page page]
				{
				location.reload();
				}*/
				});
				}
				}
				else
				{
					return false;
				}
				});

/*view upload file new window*/
				function popitup(url) {
					newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
					if (window.focus) {newwindow.focus()}
					return false;
				}

				$(document).on('click', '.contact', function(){
					var id = $(this).attr("id");
					$('.no').val(id);
					$('#contact_detail').modal('show');
				});

				$(document).on('click', '.follow', function(){
					var id = $(this).attr("id");
					$('.follow').val(id);
					$('#follow_up').modal('show');
				});


/*cable submit current page*/
				$(document).on('click','#cableSubmit',function(){
				$.ajax({
					url:"contact_db.php",
					method:"POST",
					data:$('#form2').serialize(),
					success:function(data){
					alert(data);
				},
					complete:function(){
					$('#contact_detail').modal('hide');
				}
				});
				});

/*fllow submit current page*/
				$(document).on('click','#followsubmit',function(){
				$.ajax({
					url:"Followup_db.php",
					method:"POST",
					data:$('#form3').serialize(),
					success:function(data){
					alert(data);
				},
					complete:function(){
					$('#follow_up').modal('hide');
				}
				});
				});

				/* $(document).on('click','#addform',function(){
				$.ajax({
				url:"add_venderRagister.php",
				method:"POST",
				data:$('#form').serialize(),
				success:function(data){
				alert(data);
				},
				complete:function(){
				$('#Add_data').modal('hide');
				}
				});
				});*/
</script>
<?php
include('footer.php');
?>
 </body>
</html>
