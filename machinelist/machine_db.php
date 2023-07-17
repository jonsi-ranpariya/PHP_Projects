<?php
session_start();
 include('dbcon.php');
  
if(isset($_POST['submit'])){

	$sqlx="SELECT MAX(sr) as id FROM machine_list";
	  $runx=sqlsrv_query($con,$sqlx);
	  $rowx=sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC);
	  $m_id = $rowx['id'] + 1;

	$Machine_tag = $_POST['Machine_tag'];
	$Location = $_POST['Location'];
	$Mc_No = $_POST['Mc_No'];
	$Type_Machine = $_POST['Type_Machine'];
	$Machine_type = $_POST['Machine_type'];
	$Year = $_POST['Year'];
	$Make = $_POST['Make'];
	$Model = $_POST['Model'];
	$Capacity = $_POST['Capacity'];
	$Unit = $_POST['Unit'];
/*	$Pay_Off = $_POST['Pay_Off'];*/
	/*$Take_Up = $_POST['Take_Up'];*/
	$Qty = $_POST['Qty'];
	$Panel_Board = $_POST['Panel_Board'];
	$Online_Annealing = $_POST['Online_Annealing'];
	$Chemical_Tank = $_POST['Chemical_Tank'];
	$Dies_Qty = $_POST['Dies_Qty'];
	$PVC_Hopper = $_POST['PVC_Hopper'];
	$Extruder_Head = $_POST['Extruder_Head'];
	$Head = $_POST['Head'];
	$Barrel = $_POST['Barrel'];
	$Pump = $_POST['Pump'];
	$Sensor = $_POST['Sensor'];
	$Spark = $_POST['Spark'];
	$QC = $_POST['QC'];
	$Transformer = $_POST['Transformer'];
	$Spindal = $_POST['Spindal'];
	$remark = $_POST['remark'];

 	  $img = $_FILES['doc']['name'];
    $imgExt = substr($img, strripos($img, '.'));
    $imgname = 'M'.time().$imgExt;
      if ($imgExt == '') {
      	  $imgname = ''; 
      }
      move_uploaded_file($_FILES['doc']['tmp_name'],'machine_photo/'.$imgname); 
     	$sql1 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname','$m_id')";
			$run1 = sqlsrv_query($con,$sql1);

 	  $img2 = $_FILES['doc1']['name'];
    $imgExt2 = substr($img2, strripos($img2, '.'));
    $imgname2 = 'M1'.time().$imgExt2;
      if ($imgExt2 == '') {
      	  $imgname2 = '';
      }
         move_uploaded_file($_FILES['doc1']['tmp_name'],'machine_photo/'.$imgname2);
     	$sql2 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname2','$m_id')";
			$run2 = sqlsrv_query($con,$sql2);

    $img3 = $_FILES['doc2']['name'];
    $imgExt3 = substr($img3, strripos($img3, '.'));
    $imgname3 = 'M2'.time().$imgExt3;
      if ($imgExt3 == '') {
      	   $imgname3 = '';
	    }
	    move_uploaded_file($_FILES['doc2']['tmp_name'],'machine_photo/'.$imgname3); 
		  $sql3 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname3','$m_id')";
			$run3 = sqlsrv_query($con,$sql3);

    $img4 = $_FILES['doc3']['name'];
    $imgExt4 = substr($img4, strripos($img4, '.'));
    $imgname4 = 'M3'.time().$imgExt4;
      if ($imgExt4 == '') {
      	  $imgname4 = '';
      }
       move_uploaded_file($_FILES['doc3']['tmp_name'],'machine_photo/'.$imgname4); 
    	$sql4 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname4','$m_id')";
			$run4 = sqlsrv_query($con,$sql4);

    $img5 = $_FILES['doc4']['name'];
    $imgExt5 = substr($img5, strripos($img5, '.'));
    $imgname5 = 'M4'.time().$imgExt5;
      if ($imgExt5 == '') {
      	 $imgname5 = '';
	    }
	    move_uploaded_file($_FILES['doc4']['tmp_name'],'machine_photo/'.$imgname5); 
				$sql5 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname5','$m_id')";
				$run5 = sqlsrv_query($con,$sql5);

	 $img1 = $_FILES['file']['name'];//name is keyboard
    $imgExt1 = substr($img1, strripos($img1, '.')); // get file extention
    $imgname1 = 'P'.time().$imgExt1;
      if ($imgExt1 != '') {
      	   move_uploaded_file($_FILES['file']['tmp_name'],'machine_photo/'.$imgname1);
	/*		$sql6 = "INSERT INTO car_docs(upload_docs,iid) VALUES ('$imgname1','$m_id')";
			$run6 = sqlsrv_query($con,$sql6);*/
				
      }
		      $sql = "INSERT INTO machine_list(sr,Machine_Tag,Location,Mc_no,Type_Of_Machine,Machine_Type,Year,Make,Model,Capacity,Capacity_Unit,Motor_Qty,Panel_Board,Panel_Photo,Online_Annealing,Chemical_Tank,Dies_Qty,PVC_Hopper,Extruder_Head,Skin_Cross_Head,Screw_Barrel,Tank_with_Pump,Meter_Gauge_Sensor,Spark_Test,QC_Instrument,Transformer,No_of_Spindal,remark,Username) VALUES ('$m_id','$Machine_tag','$Location','$Mc_No','$Type_Machine','$Machine_type','$Year','$Make','$Model','$Capacity','$Unit','$Qty','$Panel_Board','$imgname1','$Online_Annealing','$Chemical_Tank','$Dies_Qty','$PVC_Hopper','$Extruder_Head','$Head','$Barrel','$Pump','$Sensor','$Spark','$QC','$Transformer','$Spindal','$remark','".$_SESSION['u_name']."')";
                $run = sqlsrv_query($con,$sql);

       	if($run){
   			?>
   				<script type="text/javascript">
		          alert('Saved SuccessFully!!');
		          window.open('machine.php','_self');
    			</script>
    		 <?php
		 }else{
							echo 'Something Wrong in insert';
							print_r(sqlsrv_errors());
			}
}
?>
			    