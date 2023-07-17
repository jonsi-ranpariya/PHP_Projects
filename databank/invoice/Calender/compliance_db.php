<?php
include('../dbcon.php');
if(isset($_POST['save'])){

	$Compliance = $_POST['Compliance'];
	$Category = $_POST['Category'];
	$duedate = $_POST['duedate'];
	$cdate = $_POST['cdate'];
	$status = $_POST['status'];
	$fileddate = $_POST['fileddate'];
	$prepadby = $_POST['prepadby'];
	$reciveby = $_POST['reciveby'];

	$sql = "INSERT INTO Compliance (Compliance,Category,Due_Date,Company_Due_Date,Status,Filed_Date,Prepared_By,Reviewed_By) VALUES ('$Compliance','$Category','$duedate','$cdate','$status','$fileddate','$prepadby','$reciveby')";
	$run = sqlsrv_query($con,$sql);

	if($run){
		?>
		<script type="text/javascript">
			alert("saved successfully");
			window.open('index.php','_self');
		</script>
		<?php
	}else{
		print_r(sqlsrv_errors());
	}
}
?>
