<?php
include('dbcon.php');
if(isset($_POST['save'])){

$data1 = $_POST['data1'];
$mster = explode("/",$_POST['master_add']);
$tblname = $mster[0];
$colname = $mster[1];

$sql = "INSERT INTO $tblname ($colname) VALUES ('$data1')";
$run = sqlsrv_query($con,$sql);
 
 if($run){
 	?>
 	<script type="text/javascript">
 		alert("saved successfully");
 		window.open('issue.php','_self');
 	</script>
<?php
 }else{
		print_r(sqlsrv_errors());
	}
	

}

?>