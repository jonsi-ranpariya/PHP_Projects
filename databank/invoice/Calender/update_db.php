<?php
include('../dbcon.php');
if(isset($_POST['save'])){

// $img = json_encode($_FILES['doc']['name']);//name is keyboard
// //$imgName = substr($img, 0,strpos($img, '.')); // get file extention
// $abc = array("sumanTicket.pdf","bobMar-22.pdf")
// $sqlx = "SELECT count(*) as fileSource from upload where file_source in ($abc)";
// $runx = sqlsrv_query($con,$sqlx);
// $rowx = sqlsrv_fetch_array($runx,SQLSRV_FETCH_ASSOC);

  $sr_no = $_POST['iid'];
  $Compliance = $_POST['Compliance'];
  $Category = $_POST['Category'];	
  $Due_Date = $_POST['Due_Date'];	
  $c_date = $_POST['c_date'];	
  $Status = $_POST['Status'];		
  $f_date = $_POST['f_date'];	
  $prepardby = $_POST['prepardby'];	
  $reciveby = $_POST['reciveby'];

  	foreach($_FILES['doc']['name'] as $key=>$val){

  	$img = $_FILES['doc']['name'][$key];//name is keyboard
    $imgExt = substr($img, strripos($img, '.')); // get file extention
    $imgname = time().$val;
      if ($imgExt != '') {
      	move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../upload/'.$imgname);
				$sql1 = "INSERT INTO upload(file_source,iid) VALUES ('".$imgname."','$sr_no')";
				$run1 = sqlsrv_query($con,$sql1);
      }  

	}

  	 	$sql = "UPDATE Compliance SET Compliance = '$Compliance',Category ='$Category',Due_Date ='$Due_Date',Company_Due_Date ='$c_date',Status ='$Status',Filed_Date ='$f_date',Prepared_By ='$prepardby',Reviewed_By ='$reciveby' WHERE Sr_no = '$sr_no'";	
   		$run = sqlsrv_query($con,$sql);

   		if($run){
   			?>
   				<script>
		          alert('Update SuccessFully!!');
		          window.open('index.php','_self');
    			</script>
    		<?php
		}else{
			echo 'Something Wrong in Update';
			print_r(sqlsrv_errors());
		}
    
}
?>
