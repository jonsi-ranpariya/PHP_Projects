<?php 
include('dbcon.php');
 ?>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
<style type="text/css">
	table{
		border: 1px solid #0000004a;
		width: 100% !important;
	}
	table th, table td{
	    text-align: center;
		border: 1px solid #0000002b;
		padding: 5px 3px !important;  
	}
	th{
		font-size: 1rem;
		background-color:#2f70cf;
		color: white;
	}
	td{
		background-color: #fffff;
		width: 90px !important;
	}
	#table tr:nth-child(even) {
            background-color: #b5ced77a !important;
        }
	thead input {
        width: 100%;
        padding: 2px;
        height: 30px;   
    }
</style>

	<div class="container-fluid">
	<div class="row m-1 mt-3">
		<table id="table">
			<thead>
				<tr>
					<th>Sr_no</th>
					<th>Work Name</th>
                    <th>Plateform</th>
                    <th>Assign Date</th>
                    <th>Estimated_days</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Remark</th>
                    <th>Given_By</th>
                    <th>Approx_Date</th>  
                    <th>Dev_By</th>
                    <th>Cnt_Fi_Date</th>
                    <th>Delay</th>
                    <th>Update</th>  
				</tr>
			</thead>
			<tbody >

				<tr>	<!-- CHECK BOX -->	
					<td>1</td>
					<td><input type="text" name="work_name" id="work_name" required></td>
					<td><select name="Plateform" id="Plateform" required >
                    	<option selected="true" disabled="true">SELECT</option>
	                         <?php
	                        include('dbcon.php');
	                        $sqlx="SELECT Distinct Plateform FROM M_Plateform where Plateform is not NULL order by Plateform asc";
	                        $runx=sqlsrv_query($con,$sqlx);
	                        while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {

	                        ?>
	                        <option value="<?php echo $rowx['Plateform'];  ?>"><?php echo $rowx['Plateform'];  ?></option>
	                        <?php
	                        }
	                        ?>
                   		</select> 
                   	</td>
					<td><input type="date" name="Assign_Date" id="Assign_Date" required></td>
					<td><input type="number" step="0.01" name="Estimated_days" id="Estimated_days" required></td>
					<td><select name="Status" id="Status" required >
                    	<option selected="true" disabled="true">SELECT</option>
	                         <?php
	                        include('dbcon.php');
	                        $sqlx="SELECT Distinct Status FROM M_Status where Status is not NULL order by Status asc";
	                        $runx=sqlsrv_query($con,$sqlx);
	                        while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {

	                        ?>
	                        <option value="<?php echo $rowx['Status'];  ?>"><?php echo $rowx['Status'];  ?></option>
	                        <?php
	                        }
	                        ?>
                   		</select> 
                   	</td>
					<td><select name="Location" id="Location" required >
                    	<option selected="true" disabled="true">SELECT</option>
	                         <?php
	                        include('dbcon.php');
	                        $sqlx="SELECT Distinct Location FROM M_Location where Location is not NULL order by Location asc";
	                        $runx=sqlsrv_query($con,$sqlx);
	                        while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {

	                        ?>
	                        <option value="<?php echo $rowx['Location'];  ?>"><?php echo $rowx['Location'];  ?></option>
	                        <?php
	                        }
	                        ?>
                   		</select> </td>
					<td><input name="Remark" id="Remark" required></td>
				    <td><select name="Given_By" id="Given_By" required >
                    	<option selected="true" disabled="true">SELECT</option>
	                         <?php
	                        include('dbcon3.php');
	                        $sqlx="SELECT Distinct emp_name FROM Emp where emp_name is not NULL order by emp_name asc";
	                        $runx=sqlsrv_query($conn,$sqlx);
	                        while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {

	                        ?>
	                        <option value="<?php echo $rowx['emp_name'];  ?>"><?php echo $rowx['emp_name'];  ?></option>
	                        <?php
	                        }
	                        ?>
                   		</select> </td>
				    <td><input type="date" name="Approx_Date" id="Approx_Date" required></td>
					<td><select name="Location" id="Location" required >
                    	<option disabled="true">SELECT</option>
                    	<option>SELECT</option>
                    	<option>Snehal</option>
                    	<option>Manish</option>
                    	<option>Rajnish</option>
                    	<option>Sangita</option>
                    	<option>Jonsi</option>      
                   		</select></td>
				<!-- 	<td><input type="date" name="Cnt_Fi_Date" id="Cnt_Fi_Date" required></td>
					<td><input type="number" step="0.01" name="Delay" id="Delay" required></td>
				    <td><input type="text" name="update" id="update" required></td> -->
					
				</tr>
		      <!-- php in html code -->
			</tbody>
		</table>
	</div>
</div>


<!-- pagination -->
<script type="text/javascript">	
	$(document).ready(function(){
		$('#table thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="p-1"  placeholder="'+title+'" />' );
    });
		      var table = $('#table').DataTable({
		    	"processing": true,
				 dom: 'Bfrtip',
				 ordering: false,
            
				 	lengthMenu: [
		            	[ 10, 25, 50, -1 ],
		            	[ '10 rows', '25 rows', '50 rows', 'Show all' ]
		        	],
				    buttons: [
				 		'pageLength', 'excel',
		            	
		        	],

            initComplete: function () {
                // Apply the search
            this.api().columns().every( function () {
            var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

          }

    	});
    	
 	 });
</script>

