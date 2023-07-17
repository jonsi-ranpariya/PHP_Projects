<?php
session_start();

if(!isset($_SESSION['slogin'])){
       ?> 
		<script type="text/javascript">
			alert("plese login first.....");
			window.open('v_login.php','_self');
              </script>
	<?php
}
?>