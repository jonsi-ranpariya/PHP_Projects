<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>upload multiple file</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="doc[]" multiple><br><br>
		<input type="submit" name="submit" value="upload file">
	</form>
</body>
</html>

<?php 
include('dbcon.php');

 if(isset($_POST['submit'])){
 	/*echo "<pre>";
 	print_r($_FILES);*/
 	  
 	foreach($_FILES['doc']['name'] as $key=>$val)
{
	$random = rand('1111','99999');
	$file = $random.' '.$val;

           

	move_uploaded_file($_FILES['doc']['tmp_name'][$key],'upload/'.$val);

	$sql = "INSERT INTO upload(file_source) VALUES ('$file')";
	$run = sqlsrv_query($con,$sql);

	if($run){
		echo "file upload in database";
	}else{
		echo "failed";
	}
   }
 }
?>
