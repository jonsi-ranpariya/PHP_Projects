<?php
include('header.php');
include('dbcon.php');
?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jQuery UI  autocomplte-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    		<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<style type="text/css">
	table{
	  	width: 100%;
	  }
		.col-lg-6{
			box-shadow: 0 7px 25px rgba(0, 0, 0, 0.2);
			padding: 15px;
			border-radius: 8px;
			background-color: #95b2dd99;
			width: 49%;
		}
		.col-lg-6{
			text-align: left;
		}
		input{
			width: 100%;
			border-radius: 3px;
		}
    .ui-autocomplete {
      font-family: serif !important;
      font-size: 15px !important;
      max-height: 150px;
      max-width: 280px;
      overflow-y: auto;*/
      /* prevent horizontal scrollbar */
      overflow-x: hidden;
      background-color: #66d9ff !important;
      border-radius: 10px;
      z-index: 21500 !important;
    }
    ::-webkit-textfield-decoration-container { }
    ::-webkit-inner-spin-button {
    -webkit-appearance: none;
    }
   @media (max-width: 768px){
   	.col-lg-6{
   		width: 100%;
   		margin-bottom: 12px;
   	}
		}
		
</style>

	<div class="container-fluid">
			<div class="row">
				<div>
				  <button type="submit" class="btn btn-info mx-2" name="submit" form="form">Save</button>
				  <a href="machine_list.php" class="btn btn-dark float-start">Back</a>
				</div>
	  </div>
	   <div class="card-body">
		<form action="machine_db.php" method="POST" id="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12  me-3 ms-1">
				<table>
					<tr>
						<td><label>Machine Tag * :</label></td>
						<td><input type="text" name="Machine_tag" id="macTag" class="removeReq form-control Machine_Tag" placeholder="--MachineTag--" required></td>
					</tr>
					<tr>
						<td><label>Location * :</label></td>
						<td><input type="text" name="Location" id="location" class="removeReq form-control Location" placeholder="--Location--"></td>
					</tr>
					<tr>
						<td><label>M/c No.* :</label></td>
						<td><input type="text" name="Mc_No" id="mc_no" class="removeReq form-control Mc_no" placeholder="--M/cNo--"></td>
					</tr>
					<tr>
						<td><label>Type Of Machine *:</label></td>
						<td><input type="text" name="Type_Machine" id="tmachine" class="removeReq form-control Type_Of_Machine" placeholder="--TypeMachine--"></td>
					</tr>
					<tr>
						<td><label>Machine Type * :</label></td>
						<td><input type="text" name="Machine_type" id="machinet" class="removeReq form-control Machine_Type" placeholder="--MachineType--"></td>
					</tr>
				
					<tr>
						<td><label>Machine Photo  :</label>
						
						</td>
			<!-- 			<td><input type="file" name="doc[]" class="removeReq form-control mcImg"  multiple></td> -->
						<td><input type="file" name="doc" class="removeReq form-control mcImg"></td>
					</tr>
					<tr>
						<td><label></label></td>
						<td><input type="file" name="doc1" class="removeReq form-control mcImg1"></td>
					</tr>
						<tr><td><label></label></td>
						<td><input type="file" name="doc2" class="removeReq form-control mcImg2"></td></tr>
						<tr><td><label></label></td>
							<td><input type="file" name="doc3" class="removeReq form-control mcImg3"></td></tr>
						<tr><td><label></label></td>
							<td><input type="file" name="doc4" class="removeReq form-control mcImg4"></td></tr>
					<tr>
						<td><label>M/C Purchase_Year  :</label></td>
						<td><input type="number" name="Year" class="removeReq form-control Year"></td>
					</tr>
					<tr>
						<td><label>M/C Make  :</label></td>
						<td><input type="text" name="Make" class="removeReq form-control Make"></td>
					</tr>
					<tr>
						<td><label>M/C Model  :</label></td>
						<td><input type="text" name="Model" class="removeReq form-control Model"></td>
					</tr>
					<tr>
						<td><label>Capacity  :</label></td>
						<td><input type="text" name="Capacity" class="removeReq form-control Capacity"></td>
					</tr>
					<tr>
						<td><label>Capacity Unit  :</label></td>
						<td><input type="text" name="Unit" class="removeReq form-control Capacity_Unit"></td>
					</tr>
				<!-- 	<tr>
						<td><label>Pay Off  :</label></td>
						<td><input type="text" name="Pay_Off" class="removeReq form-control Pay_Off"></td>
					</tr> -->
					<!-- <tr>
						<td><label>Take Up  :</label></td>
						<td><input type="text" name="Take_Up" class="removeReq form-control Take_Up"></td>
					</tr> -->
					<tr>
						<td><label>Motor ( Qty ) :</label></td>
						<td><input type="text" name="Qty" class="removeReq form-control Motor_Qty"></td>
					</tr>
				</table>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12">
				<table>
					<tr>
						<td><label>Panel Board :</label></td>
						<td><select name="Panel_Board" class="removeReq form-control Panel_Board"><option>YES</option><option>NO</option></select><!-- <input type="text" name="Panel_Board" class="removeReq form-control Panel_Board" > --></td>
					</tr>
					<tr>
						<td><label>Panel Photo :</label></td>
						<td><input type="file" name="file" class="removeReq form-control Panel_Photo"></td>
					</tr>
					<tr>
						<td><label>Online Annealing :</label></td>
						<td><select name="Online_Annealing" class="removeReq form-control Online_Annealing"><option>YES</option><option>NO</option></select><!-- <input type="text" name="Online_Annealing" class="removeReq form-control Online_Annealing"> --></td>
					</tr>
					<tr>
						<td><label>Chemical Tank :</label></td>
						<td><select name="Chemical_Tank" class="removeReq form-control Chemical_Tank"><option>YES</option><option>NO</option></select><!-- <input type="text" name="Chemical_Tank" class="removeReq form-control Chemical_Tank"> --></td>
					</tr>
					<tr>
						<td><label>Dies Qty :</label></td>
						<td><input type="number" name="Dies_Qty" class="removeReq form-control Dies_Qty"></td>
					</tr>
					<tr>
						<td><label>PVC Hopper(Capacity) :</label></td>
						<td><input type="text" name="PVC_Hopper" class="removeReq form-control PVC_Hopper"></td>
					</tr>
					<tr>
						<td><label>Extruder Head(Capacity)  :</label></td>
						<td><input type="text" name="Extruder_Head" class="removeReq form-control Extruder_Head"></td>
					</tr>
					<tr>
						<td><label>Skin Head / Cross Head(Capacity)  :</label></td>
						<td><input type="text" name="Head" class="removeReq form-control Skin_Cross_Head"></td>
					</tr>
					<tr>
						<td><label>Screw Barrel(Capacity)  :</label></td>
						<td><input type="text" name="Barrel" class="removeReq form-control Screw_Barrel"></td>
					</tr>
					<tr>
						<td><label>Tank with Pump  :</label></td>
						<td><select  name="Pump" class="removeReq form-control Tank_with_Pump"><option>YES</option><option>NO</option></select><!-- <input type="text" name="Pump" class="removeReq form-control Tank_with_Pump"> --></td>
					</tr>
					<tr>
						<td><label>Meter Gauge / Sensor  :</label></td>
						<td><input type="number" name="Sensor" class="removeReq form-control Meter_Gauge_Sensor"></td>
					</tr>
					<tr>
						<td><label>Spark Test   :</label></td>
						<td><select name="Spark" class="removeReq form-control Spark_Test"><option>YES</option><option>NO</option></select><!-- <input type="text" name="Spark" class="removeReq form-control Spark_Test"> --></td>
					</tr>
					<tr>
						<td><label>QC Instrument  :</label></td>
						<td><input type="text" name="QC" class="removeReq form-control QC_Instrument"></td>
					</tr>
					<tr>
						<td><label>Transformer(Capacity) :</label></td>
						<td><input type="text" name="Transformer" class="removeReq form-control Transformer"></td>
					</tr>
					<tr>
						<td><label>No of Spindal :</label></td>
						<td><input type="number" name="Spindal" class="removeReq form-control No_of_Spindal"></td>
					</tr>
					<tr>
						<td><label>Remark :</label></td>
						<td><input type="text" name="remark" class="removeReq form-control remark"></td>
					</tr>
				</table>
			</div>

		</div></form>
	</div>
	</div>

	<script type="text/javascript">

		 /*------machine autocomplete textbox-----*/
		$( function() {
	         $(".Machine_Tag").autocomplete({
	  				source: function( request, response ) {
		  				// Fetch data
		 				 $.ajax({
							url: "mauto.php",
							type: 'post',
							dataType: "json",
							data: {
							item: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
					},
				select: function (event, ui) {
					$('.Machine_Tag').val(ui.item.mctag);
					$('.Location').val(ui.item.location);
					$('.Mc_no').val(ui.item.mcno);
					$('.Type_Of_Machine').val(ui.item.tmc);
					$('.Machine_Type').val(ui.item.mct);

					
					return false;
				},
				change: function (event, ui){
					
					if (ui.item == null){
						$('.Location,.Mc_no,.Type_Of_Machine,.Machine_Type').prop("readonly",false);
						$('.Location,.Mc_no,.Type_Of_Machine,.Machine_Type').val('');
					}else{
						$('.Location,.Mc_no,.Type_Of_Machine,.Machine_Type').prop("readonly",true);
						$('.Location,.Mc_no,.Type_Of_Machine,.Machine_Type').css("background-color","rgb(222, 217, 217)");
					}
				}
			});

			$( ".Location" ).autocomplete({
  				source: function( request, response ) {
	  				// Fetch data
	 				 $.ajax({
						url: "mauto.php",
						type: 'post',
						dataType: "json",
						data: {
						location: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
				},
				select: function (event, ui) {
						$('Location').val(ui.item.label);
						// $('.Mc_no').val(ui.item.mcno);
						// $('.Type_Of_Machine').val(ui.item.tmc);
						// $('.Machine_Type').val(ui.item.mct);
					return false;
				},
				// change: function (event, ui){
				// 	if (ui.item == null){
				// 		$(this).val('');
				// 		$(this).focus();
				// 	}
				// }
			});

			$( ".Mc_no" ).autocomplete({
  				source: function( request, response ) {
	  				// Fetch data
	 				 $.ajax({
						url: "mauto.php",
						type: 'post',
						dataType: "json",
						data: {
						mc_no: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
				},
				select: function (event, ui) {
					$('.Mc_no').val(ui.item.label);
					// $('.Type_Of_Machine').val(ui.item.tmc);
					// $('.Machine_Type').val(ui.item.mct);
					return false;
				},
				// change: function (event, ui){
				// 	if (ui.item == null){
				// 		$(this).val('');
				// 		$(this).focus();
				// 	}
				// }
			});
			$( ".Type_Of_Machine" ).autocomplete({
  				source: function( request, response ) {
	  				// Fetch data
	 				 $.ajax({
						url: "mauto.php",
						type: 'post',
						dataType: "json",
						data: {
						tmc: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
				},
				select: function (event, ui) {
					$('.Type_Of_Machine').val(ui.item.label);
					// $('.Machine_Type').val(ui.item.mct);
					return false;
				},
				// change: function (event, ui){
				// 	if (ui.item == null){
				// 		$(this).val('');
				// 		$(this).focus();
				// 	}
				// }
			});
			$( ".Machine_Type" ).autocomplete({
  				source: function( request, response ) {
	  				// Fetch data
	 				 $.ajax({
						url: "mauto.php",
						type: 'post',
						dataType: "json",
						data: {
						mct: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
				},
				select: function (event, ui) {
						$('.Machine_Type').val(ui.item.label);
					return false;
				},
				// change: function (event, ui){
				// 	if (ui.item == null){
				// 		$(this).val('');
				// 		$(this).focus();
				// 	}
				// }
			});
     });

/*only one time add machine tag*/
		$(document).on('focusout','#macTag',function(){
			var mc = $(this).val();
			$.ajax({
					url:"suggetion.php",
					type:"POST",
					data:{mc:mc},
					success:function(data){
							if(data == 'yes'){
								alert('Machine Tag is already exist...');
							/*	$('#macTag').val('');
								$('#macTag').focus();*/
								location.reload();
							}else{
								return false;
							}
					}
			});
		});

/*machine tag add hide rows*/
		$(document).on("change","#macTag",function(){
			$(".removeReq").prop('required', false);
			$(".removeReq").prop('readonly', false);
			$(".removeReq").css('background-color', 'white');
			let tag = $(this).val();
			//console.log(tag);
			$.ajax({
				type:"POST",
				url: "getmcReq.php",
				data: {tag:tag},
				dataType: "json",
													/*blank row*/
				success:function(data){
						let arr = ['Location', 'Mc_no', 'Type_Of_Machine', 'Machine_Type', 'mcImg', 'Year', 'Make', 'Model', 'Capacity', 'Capacity_Unit', 'Pay_Off', 'Take_Up', 'Motor_Qty', 'Panel_Board', 'Panel_Photo', 'Online_Annealing', 'Chemical_Tank', 'Dies_Qty', 'PVC_Hopper', 'Extruder_Head', 'Skin_Cross_Head', 'Screw_Barrel', 'Tank_with_Pump', 'Meter_Gauge_Sensor', 'Spark_Test', 'QC_Instrument', 'Transformer', 'No_of_Spindal']; 

						// console.log(data[0][arr[0]]);
						// console.log(arr[0]);
						for (var i = 0; i < arr.length; i++) {
							if (data[0][arr[i]] == 'yes') {
							/*	$("."+arr[i]).prop('required', true);*/
							}else{
								$("."+arr[i]).prop('readonly', true);
								$("."+arr[i]).css('background-color', '#ded9d9');
							}
							
						}					
				}
			});
		});

		$(document).on('change', '.Location,.Mc_no,.Type_Of_Machine,.Machine_Type', function() {
			var x = $('.Machine_Tag').val();

			var y = $('.Location').val();
			var z = $('.Mc_no').val();
			var a = $('.Type_Of_Machine').val();
			var b = $('.Machine_Type').val();

			if (x == '' && (y != '' || z != '' || a != '' || b != '')) {
				$('.Machine_Tag').prop("readonly",true);
			}else{
				$('.Machine_Tag').prop("readonly",false);
			}
		});
	</script>


<?php
include('footer.php');
?>