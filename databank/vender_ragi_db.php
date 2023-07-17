<?php 
include('dbcon.php');
date_default_timezone_set('Asia/Kolkata');
$pdftime = date('dmYHi', time());

if(isset($_POST['save'])){

$vender_id = $_POST['id'];
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
  $imgname = $img_sr.'_'.$pdftime.$imgExt;
  move_uploaded_file($_FILES["file"]["tmp_name"], "invoice/" . $imgname);

$sql = "UPDATE Data SET Status = '$Status',Follow_Up_By = '$Follow_By',Entry_Date = '$Entry_Date',Date_Applied = '$Date_Applied',Customer = '$Customer',Place = '$Place',Website_Registration = '$Website_ragiter',Certificate_No = '$Certificate_No',Vendor_Code = '$Vendor_Code',Validity_Date = '$Validity_Date',Remarks = '$Remarks' WHERE Sr_no = '$vender_id'";
	$run = sqlsrv_query($con,$sql);

	if($run){
    if ($img != '') {
      $sql1 = "INSERT INTO Upload_Docs(upload_docs,iid) VALUES ('$imgname','$vender_id')";
      $run1 = sqlsrv_query($con,$sql1);
    }else{
      $run1 = true;
      }
              if($run1){
                      ?>
                      <script type="text/javascript">
                        alert("saved successfully");
                        window.open('Vender_Register.php','_self');

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