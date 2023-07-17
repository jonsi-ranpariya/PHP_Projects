<?php 
include('dbcon.php');
date_default_timezone_set('Asia/Kolkata');
$pdftime = date('dmYHi', time());

if(isset($_POST['submit'])){

	  $sqlx="SELECT MAX(Sr_no) as id FROM legaldata";
	  $runx=sqlsrv_query($con,$sqlx);
	  $rowx=sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC);
	  $vender_id = $rowx['id'] + 1;

	$Status = $_POST['Status'];
	$Follow_By = $_POST['Follow_By'];
	$Entry_Date = $_POST['Entry_Date'];
	$Date_Applied = $_POST['Date_Applied'];
	$Customer = $_POST['Customer'];
	$Place = $_POST['Place'];
	$Website_ragiter = $_POST['Website_ragiter'];
	$Certificate_No = $_POST['Certificate_No'];
	$Vendor_Code = $_POST['Vendor_Code'];
	$Validity_Date = $_POST['Validity_Date'];
	$Remarks = $_POST['Remarks'];

	  $img_sr= $vender_id;
    $img = $_FILES['file']['name'];//name is keyboard [form- encrypy add]
    $imgExt = substr($img, strripos($img, '.')); // get file extention
    $imgname = $img_sr.$pdftime.$imgExt;
    move_uploaded_file($_FILES["file"]["tmp_name"], "legal_document/" . $imgname);

	$sql = "INSERT INTO legaldata (Sr_no,Status,Follow_Up_By,Entry_Date,Date_Applied,Customer,Place,Website_Registration,Certificate_No,Vendor_Code,Validity_Date,Remarks) VALUES ('$vender_id','$Status','$Follow_By','$Entry_Date','$Date_Applied','$Customer','$Place','$Website_ragiter','$Certificate_No','$Vendor_Code','$Validity_Date','$Remarks') ";
	$run = sqlsrv_query($con,$sql);
    
    if($run){
      $sql1 = "INSERT INTO l_Upload_Docs(upload_docs,iid) VALUES ('$imgname','$vender_id')";
      $run1 = sqlsrv_query($con,$sql1);
		      if($run1){
		      	   ?>
		      	   <script type="text/javascript">
		      	   	alert("saved successfully");
		      	   	window.open('legal_document.php','_self');
		      	   </script>
		      	   <?php
		      }else{
		      			echo "Document not uploaded..";
				        print_r(sqlsrv_errors());
				    }

    }
   else{
        print_r(sqlsrv_errors());
    }
}
  
?>