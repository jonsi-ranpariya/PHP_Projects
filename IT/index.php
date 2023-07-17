<?php 
include('dbcon.php');
include('dbcon3.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IT SOFTWARE</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!-- jQuery UI -->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

		<!-- jQuery Input mask -->
	    <!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script> -->
	    <!-- included css -->
        <link href='css/select2.min.css' rel='stylesheet' type='text/css'>

		<style type="text/css">
		.VIEW{
	         background-color: #84bfe0 !important;
	     }
	     #plat th{
	     	width: 40px !important;
	     }
	  
	    .mod {
		    width: 100%;
		    max-width: none;  
		    margin: 0;
		}

	    .mod1 {
		    height: 100%;
		    border: 0;
		    border-radius: 0;
		}

	    #editModal1{
		   background-color: #548f9d59;
	    }
	    #addmodal1{
		  background-color: #548f9d7a;
	    }

	    /*inward dropdown searching*/
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
		    width: 130px;
		}
		.select2-container--default .select2-selection--single{
		    border: 1px solid #ccc !important; 
		    border-radius: 0px !important; 
		}
		
		#text{
			text-align: center;
		}
		</style>
</head>
<body>
	<div class="container-fluid">
		<div class="content">
			<div class="mx-4 mt-3">
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Add Data</button>
				<!-- <button type="button" class="btn btn-info mx-2 view" id="view1"  >View All</button> -->
				 <button  type="button" class="btn btn-info mx-2 view" id="view">View All</button>
			</div>
			<div class="cardBox">
				<div class="cards" id="Completed">
					<h4>𝐂𝐨𝐦𝐩𝐥𝐞𝐭𝐞</h4>
					<?php
						$qry = "SELECT count(Status) as count FROM Data where Status = 'Completed'";
						$run = sqlsrv_query($con,$qry);
						$rowq = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
					 ?>
					<p><b><?php echo $rowq['count']; ?></b></p>
				</div>
				<div class="cards" id="Running" >
					<h4>𝐑𝐮𝐧𝐧𝐢𝐧𝐠 </h4>
					<?php
						$qry1 = "SELECT count(Status) as count FROM Data where Status = 'Running'";
						$run1 = sqlsrv_query($con,$qry1);
						$rowq1 = sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);
					 ?>
					<p><b><?php echo $rowq1['count']; ?></b></p>
				</div>
				<div class="cards" id="Not Start">
					<h4>𝐍𝐨 𝐒𝐭𝐚𝐫𝐭</h4>
					<?php
						$qry2 = "SELECT count(Status) as count FROM Data where Status = 'Not Start'";
						$run2 = sqlsrv_query($con,$qry2);
						$rowq2 = sqlsrv_fetch_array($run2,SQLSRV_FETCH_ASSOC);
					 ?>
					<p><b><?php echo $rowq2['count']; ?></b></p>
				</div>
				<div class="cards" id="HOLD">
					<h4>𝐇𝐨𝐥𝐝</h4>
					<?php
						$qry3 = "SELECT count(Status) as count FROM Data where Status = 'HOLD'";
						$run3 = sqlsrv_query($con,$qry3);
						$rowq3 = sqlsrv_fetch_array($run3,SQLSRV_FETCH_ASSOC);
					 ?>
					<p><b><?php echo $rowq3['count']; ?></b></p>
				</div>
			</div>
		</div><br>
		
		<div class="main main1 m-2" id="main">
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
						<th style="width:8%;">Given By</th>
						<th style="width:5%;">Apx.Date</th>
						<th style="width:9%;">Dev.By</th>
						<th style="width:5%;">Finl Date</th>
						<th style="width:3%;">Delay</th>
						<th style="width:10%;">Remark</th>
						<th style="width:8%;">Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
					<?php
						$sql = "SELECT Sr_no,Work_Name,Plateform,format(Assign_Date,'dd-MMM-y') as Assign_Date,estimated_days,Status,Location,Remark,Given_By,format(ApproxFinish_Date,'dd-MMM-y') as ApproxFinish_Date,Dev_By,
							format(Current_Finish,'dd-MMM-y') as Current_Finish,Delay,Satus FROM Data ORDER BY Dev_By ASC, Assign_Date DESC";
						$run = sqlsrv_query($con,$sql);
						$srno = 1;
						while($row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
					?>
					<tr>
						<td><?php echo $srno; ?></td>
						<td data-toggle="tooltip" title="<?php echo $row['Work_Name'];?>"><?php echo substr($row['Work_Name'], 0, 30);?></td>
						<td><?php echo $row['Plateform']; ?></td>
						<td><?php echo $row['Assign_Date']; ?></td>
						<td><?php echo $row['estimated_days']; ?></td>
						<td data-toggle="tooltip" title="<?php echo $row['Status'];?>"><?php echo substr($row['Status'], 0, 10);?></td>
						<td><?php echo $row['Location']; ?></td>
						<td data-toggle="tooltip" title="<?php echo $row['Remark'];?>"><?php echo substr($row['Remark'], 0, 12);?></td>
						<td data-toggle="tooltip" title="<?php echo $row['Given_By'];?>"><?php echo substr($row['Given_By'], 0, 17);?></td>
						<td class="apdate"><?php echo $row['ApproxFinish_Date']; ?></td>
						<td><?php echo $row['Dev_By']; ?></td>
						<td><?php echo $row['Current_Finish']; ?></td>
						<td><?php echo $row['Delay']; ?></td>
						<td data-toggle="tooltip" title="<?php echo $row['Satus'];?>"><?php echo substr($row['Satus'], 0, 10);?></td>
						<td class="d-flex"><button type="button" class="btn btn-secondary btn-sm edit" id="<?php echo $row['Sr_no']; ?>">Edit </button><button type="button" class="btn btn-primary btn-sm mx-2 add" id="<?php echo $row['Sr_no']; ?>">Add</button></td>
					</tr>
					<?php $srno++; } ?>
				</tbody>
			</table>
		</div>
	</div>
		<!------------------------------------ The add Modal ----------------------------------------->
		<div class="modal fade" id="myModal" aria-labelledby="myModal" a aria-hidden="true" aria-hidden="true" tabindex="-1">
			<div class="modal-dialog modal-xl mod">
				<div class="modal-content mod1">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Add_Software</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<!-- Modal body -->
					<div class="modal-body mod2" id="mymodal1">
						<form action="index_db.php" method="POST" id="form">
							<div class="main ">
								<table class="table table-bordered ">
									<thead>
										<tr id="text">
											<th>Sr</th>
											<th>Work Name</th>
											<th >Plateform</th>
											<th>Assign Date</th>
											<th>Esti.day</th>
											<th>Status</th>
											<th>Location</th>
											<th>Remark</th>
											<th>Given By</th>
											<th>Apx. Date</th>
											<th>Dev. By</th>
											<!-- <th>Crnt/Fi Date</th>
											<th>Update</th> -->
											<th>Delay</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td><input type="text" name="work_name" id="work_name" class="form-control" required ></td>
											<td style="width:20px;">
												<select name="Plateform" class="form-control Plateform" required>
													<option selected="true" disabled="true" value="">SELECT</option>
													<?php
													$sql="SELECT Distinct Plateform FROM M_Plateform where Plateform is not NULL order by Plateform asc";
													$run=sqlsrv_query($con,$sql);
													while ($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)) { ?>
													<option value="<?php echo $row['Plateform']; ?>"><?php echo $row['Plateform']; ?></option>
													<?php } ?>
												</select>
											</td>
											<td><input type="date" name="asig_date" id="asig_date" placeholder="DD-MM-YYYY" class="form-control" required></td>
											<td><input type="number" step="0.01" name="e_days" id="e_days" class="form-control" required>
												</td>
											<td>
												<select name="Status" class="Status form-control" required>
													<option selected="true" disabled="true" value="">SELECT</option>
													<?php
													$sql1="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
													$run1=sqlsrv_query($con,$sql1);
													while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) { ?>
													<option value="<?php echo $row1['Status'];  ?>"><?php echo $row1['Status'];  ?></option>
													<?php } ?>
												</select>
											</td>
											<td>
												<select name="Location" class="Location form-control" required>
													<option selected="true" disabled="true" value="">SELECT</option>
													<?php
													$sql2 = "SELECT Distinct Location FROM M_Location where Location is not NULL order by Location asc";
													$run2 = sqlsrv_query($con,$sql2);
													while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) { ?>
													<option value="<?php echo $row2['Location'];  ?>"><?php echo $row2['Location'];  ?></option>
													<?php } ?>
												</select>
											</td>
											<td><input type="text" name="Remark" class="Remark form-control" ></td>
											<td>
												<select name="Given_By" class="Given_By form-control" required>
													<option selected="true" disabled="true" value="">SELECT</option>
													<?php
													$sql3 = "SELECT Distinct emp_name FROM Emp where emp_name is not NULL order by emp_name asc";
													$run3 = sqlsrv_query($conn,$sql3);
													while ($row3 = sqlsrv_fetch_array($run3, SQLSRV_FETCH_ASSOC)) { ?>
													<option value="<?php echo $row3['emp_name'];  ?>"><?php echo $row3['emp_name'];  ?></option>
													<?php } ?>
												</select>
											</td>
											<td><input type="date" name="apx_date" id="apx_date" class="form-control" readonly> 
											</td>
										   <td>
												<select name="dname" class="dname form-control" required>
												<option selected="true" disabled="true" value="">SELECT</option>
												<?php
												$sql9 = "SELECT Distinct Dev_by FROM M_DevBy where Dev_by is not NULL order by Dev_by asc";
												$run9 = sqlsrv_query($con,$sql9);
												while ($row9 = sqlsrv_fetch_array($run9, SQLSRV_FETCH_ASSOC)) { ?>
												<option value="<?php echo $row9['Dev_by'];  ?>"><?php echo $row9['Dev_by'];  ?></option>
												<?php } ?>
											</select>
												<!-- <select type="text" name="dname" class="dname form-control" required>
													<option selected="true" disabled="true" value="">SELECT</option>
													<option>Snehal</option>
													<option>Manish</option>
													<option>Rajnish</option>
													<option>Sangita</option>
													<option>Jonsi</option>
													<option>Rahul</option>
													<option>Rajnish+Sangita</option>
													<option>Rajnish+Rahul</option>
													<option>Sangita+Jonsi</option>
												</select> -->
											</td>
											<!-- <td><input type="date" name="cfdate" id="cfdate" required></td>
											
											<td><input type="text" name="update" id="update" required></td> -->
										<td><input type="number" step="0.01" name="Delay" id="Delay" class="form-control" readonly></td>
									   </tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						<input type="submit" name="submit" form="form" class="btn btn-primary">
					</div>
				</div>
			</div>
		</div>
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
						<form action="index_edit_db.php" method="POST" id="edit_form">
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
		<!----------------------------------- The add Modal ------------------------------------>
		<div class="modal fade " id="addModal" aria-labelledby="addModal" aria-hidden="true" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Add_data</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body" id="addModal1">
						<form  action="indexadd1.php" method="POST"  id="add_form">
							<div class="main">
							  <table id="table2 table-bordered">
					            <thead>
					                <tr>
					                    <th>Final Date</th>
					                    <th>Delay</th>
										<th>Remark</th>
										<th>Status</th> 
					                </tr>
					            </thead>
					            <tbody> 
					            	<tr>
			            	            <td><input type="date" name="cfdate" class="form-control" id="cfdate" required>
			            	            	<input type="hidden" name="id" id="srno1"><input type="hidden" name="ap_date" id="ap_date"></td>
			            	            <td><input type="text"  class="form-control"  name="Delay1" id="Delay1" readonly></td>
										<td><input type="text"  class="form-control"  name="update" id="update"></td>
										<td>
											<select name="Status2" class="Status2 form-control">
											    <option  disabled="true" value="">SELECT</option>
													<?php
													$sql8="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
													$run8=sqlsrv_query($con,$sql8);
													while ($row8 = sqlsrv_fetch_array($run8, SQLSRV_FETCH_ASSOC)) { ?>
											    <option value="<?php echo $row8['Status'];  ?>"><?php echo $row8['Status'];  ?></option>
													<?php } ?>
											</select>
										</td>
									</tr>
								</tbody>
						    </table>
					    </div>
					</form>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						<input type="submit" name="save" form="add_form" class="btn btn-primary">
					</div>
				</div>
			</div>
		</div> 
	</body>
</html>

<script src='js/select2.min.js' type='text/javascript'></script>
<script type="text/javascript">
 
   $(document).ready(function() {
                $(".Plateform").select2({
                dropdownParent: $("#myModal")           
   			 });
                $(".Status").select2({
                dropdownParent: $("#myModal") 
             });
                $(".Location").select2({
                dropdownParent: $("#myModal") 
             });
                 $(".Given_By").select2({
                dropdownParent: $("#myModal") 
             });
                $(".dname").select2({
                dropdownParent: $("#myModal") 
            });
        });

	$(document).ready(function(){
		var table = $('#table').DataTable({
			"processing": true,
				dom: 'Bfrtip',
				ordering: false,

			lengthMenu: [
		[ 5, 10, 25, 50, -1 ],
		[ '5 rows',  '10 rows', '25 rows', '50 rows', 'Show all' ]
		],
			buttons: [
				'pageLength','copy', 'excel',
				// Customize button datatable
/*
				{
                        text: 'VIEW',"className": 'VIEW',
                        action: function () { 
                            $('#view_data').modal('show');
                        }
                    },*/
		]
		});
	
	});

	/* VIEW button click event*/

	$(document).on('click','#view',function(){  
		$.ajax({
                url:"view_index.php",
                method:"POST",
                
                success:function(data)
                {
	                $('#main').html(data);
                }
            });
	});

		/*issue Edit  button click event*/
		$(document).on('click', '.edit', function(){
			var id = $(this).attr("id");
				$.ajax({
					url:"index_edit.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
						$('#edit_form').html(data);
						$('#editModal').modal('show');
					}
			});
		});

		$(document).on('click','.cards',function(){
			var id = $(this).attr("id");
				$.ajax({
					url:"index_show.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
						$('#main').html(data);
					}
			});
		});

	
	
	/*ADD Edit[apx-final]  button click event*/
		$(document).on('click', '.add', function(){
		var id = $(this).attr("id");
		var date =$(this).closest('tr').find('.apdate').text();
		$('#srno1').val(id);
		$('#ap_date').val(date);
		$('#addModal').modal('show');
			
		});

	/*ADD DATE AND DELAY */
	  	$('#e_days,#asig_date').change(function() {
	  		var days = $('#e_days').val();
	  		var i_date = $('#asig_date').val();

	  		var x = new Date(i_date);
	  		
			x.setDate(x.getDate() + (+days));
			var dd = x.getDate();
			var mm = x.getMonth() +1;
			var y = x.getFullYear();
			
			if(dd<10) 
		    {
		        dd='0'+dd;
		    }
		    if(mm<10) 
		    {
		        mm='0'+mm;
		    }
		    var someFormattedDate = y + '-' + mm + '-' + dd;
		    $('#apx_date').val(someFormattedDate);
		    var dt = new Date(someFormattedDate);
	  		var d = new Date();
	   		
	   		var Dif_In_Time = d.getTime() - dt.getTime();
	   		var Dif_In_Days = Dif_In_Time / (1000 * 3600 * 24);
	   		 $('#Delay').val(Math.round(Dif_In_Days));
	    });


     /* $('#apx_date').change(function() {
  		var date = $(this).val();
  		
  		var dt = new Date(date);
  		var d = new Date();
   		
   		var Dif_In_Time = dt.getTime() - d.getTime();
   		var Dif_In_Days = Dif_In_Time / (1000 * 3600 * 24);
   		 $('#Delay').val(Math.round(Dif_In_Days));
		
	  	});*/

		$('#cfdate').change(function() {
	  		var date = $(this).val();
	  		var dat = $('#ap_date').val();
	  		
	  		var dt = new Date(date);
	  		var d = new Date(dat);
	   		
	   		var Dif_In_Time = dt.getTime() - d.getTime();
	   		var Dif_In_Days = Dif_In_Time / (1000 * 3600 * 24);
	   		/*alert(Dif_In_Days);*/
	   		 $('#Delay1').val(Math.round(Dif_In_Days));
		
	  	});


	  	/*EDIT DATE AND DELAY */
		$(document).on('change','#e_days1,#asig_date1',function(){
	  		var days = $('#e_days1').val();
	  		var i_date = $('#asig_date1').val();

	  		var x = new Date(i_date);
	  			
			x.setDate(x.getDate() + (+days));

			/*date format diaplay othr input*/
			var dd = x.getDate();
			var mm = x.getMonth() +1;
			var y = x.getFullYear();
			
			if(dd<10) 
		    {
		        dd='0'+dd;
		    }
		    if(mm<10) 
		    {
		        mm='0'+mm;
		    }
		    var someFormattedDate = y + '-' + mm + '-' + dd;
		    $('#apx_date1').val(someFormattedDate);
		    var dt = new Date(someFormattedDate);
	  		var d = new Date();
	   		
	   		var Dif_In_Time = d.getTime() - dt.getTime();
	   		var Dif_In_Days = Dif_In_Time / (1000 * 3600 * 24);
	   		 $('#Delay11').val(Math.round(Dif_In_Days));
	    });

	  	$(document).on('change','#cfdate1',function(){
	  		var date = $(this).val();
	  		var dat = $('#apx_date1').val();
	  	
	  		var dt = new Date(date);
	  		var d = new Date(dat);

	   		/*alert(d);*/
	   		var Dif_In_Time = dt.getTime() - d.getTime();
	   		var Dif_In_Days = Dif_In_Time / (1000 * 3600 * 24);
	   		$('#Delay11').val(Math.round(Dif_In_Days));
		
	  	});

	    /*Add year format*/
  	  /*  $('#asig_date').inputmask('datetime', {
							    mask: "1/2/y",
							    alias: "dd/mm/yyyy",
							    placeholder: "DD/MM/YYYY",
							    separator: '/'
							});
  	     $('#asig_date').datepicker({dateFormat: 'dd/mm/yy'});*/

</script>
