<?php
include('header.php');
include('dbcon.php');
?>
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
		
		<style type="text/css">
			.table{
				width: 100%;
			/*	margin: 5px 2px;*/
					/*	border: 0.3px solid #8080805c;*/
			}
			.table th{
			   text-align: left;
				white-space: nowrap;
				background-color: #d2e0ebd1;
				border: 1px solid #8080805c;
			}
			.table td{
				text-align: left;
				border: 0.3px solid #1f1e2014;
				background-color: #fffff;
			 /*	padding: 0px;*/
			}
				
		   .black{
               color: #ed19d3a6;
           }
           a {
			   color: #1c19c9;
			   text-decoration: underline;
		   }
		   .card-body {
	          flex: 1 1 auto;
	          padding: 1rem 1rem;
	     
       		}

	</style>
</head>
<body>
	<div class="container-fluid" id="order_table">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><strong>𝐌𝐚𝐜𝐡𝐢𝐧𝐞 𝐋𝐢𝐬𝐭</strong></h6>
			</div>
			<div class="card-body">
				<div class="">
			        <input type="text" id="searchable_val">
			        <a href="#" class="col-3 mx-2 px-2" id="filter"><i class="fa fa-search fa-lg"></i></a>
			        <a  href="machine.php"  class="col-3 mx-4"><button class="btn btn-success px-3 mb-2 "><i class="fa fa-plus-circle fa-lg"></i></button></a> 
			      <!--   <button class="btn btn-dark px-3 mb-2" id="panding">Pending List</button> -->
			         <button class="btn btn-dark px-3 mb-2" id="panding">pending List</button>
			          <a href="machine_pdf.php" class="btn btn-warning px-1 mb-2 float-end">Report 2205</a>
			       <a href="1701_pdf.php" class="btn btn-primary px-1 mb-2 mx-2 float-end">Report 1701</a>
			       <a href="696_pdf.php" class="btn btn-secondary px-1 mb-2 float-end">Report 696</a>
			        <form action="get_exceldata.php" method="POST">
			        	<button type="submit" class="btn btn-danger px-3 mb-2 float-end" name="export">Export</button>
			        </form>


			        <!-- <button type="button" class="btn btn-danger px-3 mb-2" id="exel">Export</button> -->
			        <!-- <a href="exceldata.php" class="btn btn-dark px-2">Export</a> -->
			      
		    	</div>
		    	
			    <div id="data">		
			    <table id="table" class="table">
						<?php
					        include('dbcon.php');
					        $dte = date("d-M-y", time());
					        $sql = "SELECT * FROM machine_list order by sr desc";/*TOP 3 */
					        $run = sqlsrv_query($con,$sql);
					        while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC))
					        {
					    ?>
				  		<tr>
				  			<th><?php echo $row['Machine_Tag']; ?></th>
				  			<th><span class="black"><?php echo $dte; ?></span><a class="float-end" href="mc_edit.php?id=<?php echo $row['sr']; ?>"><i class="fa fa-edit" style="font-size:24px"></i></a></th>
				  		</tr>	
					  	   <!--   <tr>
					            <td>Machine Tag</td>
					            <td><?php echo $row['Machine_Tag'];?></td>
					        </tr> -->
				  		<tr>
				  			<td>Location</td>
				  			<td><?php echo $row['Location'];?></td>
				  		</tr>
				  		<tr>
				  			<td>Mc no</td>
				  			<td><?php echo $row['Mc_no'];?></td>
				  		</tr>
				  		<tr>
				  			<td>Type Of Machine</td>
				  			<td><?php echo $row['Type_Of_Machine'];?></td>
				  		</tr>
				  		<tr>
				  			<td>Machine Type</td>
				  			<td><?php echo $row['Machine_Type'];?></td>
				  		</tr>
				  	 <?php } ?>
				  </table>
			    </div>
			</div>
		</div>
	</div>
	<!-- Excel cdn -->
	<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
	  $('#cutm').addClass('active');

	  $('#filter').click(function(){
         var val = $('#searchable_val').val();
         if(val != '')
         {
       	 $.ajax({
	        url:"search_viewmc.php",
	        method:"POST",
	        data:{val:val},
	        success:function(data)
	        {
	       	  $('#data').html(data);
	        }
         });
        }
         else
        {
        alert("Please Type atleast single character");
        }
        });



	  /* VIEW button click event*/
	$(document).on('click','#panding',function(){  
		
		$.ajax({
                url:"pendinglist.php",
                method:"POST",
                success:function(data)
                {
	                $('#data').html(data);
	              
                }
            });
	});

</script>
<?php
include('footer.php');
?>