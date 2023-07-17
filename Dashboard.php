<?php include("header.php"); ?>
<style type="text/css">
	
</style>
	<!-- card -->
			<div class="cardBox ">
				<div class="carrd border border-primary">
					<div>
						<div class="numbers">1,504</div>
						<div class="cardName">Daily Visitor</div>
					</div>
					<div class="iconBx">
						<ion-icon name="eye-outline"></ion-icon>
					</div>
				</div>
				<div class="carrd border border-primary">
					<div>
						<div class="numbers">90</div>
						<div class="cardName">Sales</div>
					</div>
					<div class="iconBx">
						<ion-icon name="cart-outline"></ion-icon>
					</div>
				</div>
				<div class="carrd border border-primary">
					<div>
						<div class="numbers">245</div>
						<div class="cardName">Comments</div>
					</div>
					<div class="iconBx">
						<ion-icon name="chatbubble-outline"></ion-icon>
					</div>
				</div>
				<div class="carrd border border-primary	">
					<div>
						<div class="numbers">$5,504</div>
						<div class="cardName">Earning</div>
					</div>
					<div class="iconBx">
						<ion-icon name="cash-outline"></ion-icon>
					</div>
				</div>
			</div>
			<!-- Data list -->
			<div class="row">
				<div class="col-lg-6"> 
			<div class="details">
				<div class="order border border-primary">
					<div class="cardHeader ">
						<h2>Live Stock</h2>	
					</div>
					<table>
						<thead>
							<tr>
								<td><strong>Category</strong></td>
								<td><strong>Stock</strong></td>
							</tr>
						</thead>
						<tbody>
						 <?php
					        include('dbcon.php');

					        $query="SELECT * FROM item_master where isdelete = 0 order by item";
					        $result = sqlsrv_query($con,$query);

					        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
					            $query1="SELECT SUM(qnty) as qnty FROM inward where i_code = '".$row['id']."' and status = 'stock' and isdelete != 'true'" ;
					            $result1=sqlsrv_query($con,$query1);
					            $row1 =sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC);

					            $query2="SELECT SUM(qnty) as qnty FROM issue where item_category = '".$row['id']."' and status = 'use'";
					            $result2=sqlsrv_query($con,$query2);
					            $row2=sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
					            $stock = $row1['qnty'] - $row2['qnty'];
					            if($stock < 1){
					            	continue;
					            }
					          ?>
					          <tr>
					              <td><?php echo $row['item'];?></td> 
					              <td><?php echo $stock;?></td>
					          </tr>   
					        <?php } ?>
						</tbody>
					</table>
				</div>
</div></div>
				<!-- New Customer -->
			<div class="col-lg-6">
			  <div class="details">
				<div class="order border border-primary">
					<div class="cardHeader">
						<h2>Live User</h2>
					</div>
					<table>
						<thead>
							<tr>
								<td><strong>Category</strong></td>
								<td><strong>Issue</strong></td>
							</tr>
						</thead>
				         <tbody>
				          <?php
				          include('dbcon.php');
			
				               $query="SELECT * FROM item_master where isdelete = 0 order by item";
				               $result = sqlsrv_query($con,$query);
				                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){

				                   $sql2 = "SELECT SUM(qnty) as count FROM issue where item_category = '".$row['id']."' and status='use'";
				                    $run = sqlsrv_query($con,$sql2);
				                    $row2 =sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
				                    if($row2['count'] < 1){
					            	continue;
					            }
				          ?>
				          <tr>  
				              <td><?php echo $row['item'];?></td>
				              <td><?php echo $row2['count'];?></td>     
				         </tr>
				          <?php } ?>   
				        </tbody>
					</table>
				</div>
			  </div>
		    </div>
		</div>
<script type="text/javascript">
	$('#dash').addClass('active');    /*left menu click back white*/
</script>

<?php include("footer.php"); ?>