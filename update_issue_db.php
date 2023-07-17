<?php
include('dbcon.php'); 
date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i:s a', time());

if (isset($_POST['emp_id'])) {
   
   $emp_id = $_POST['emp_id'];
   $emp_name = $_POST['emp_name'];
   $ip_addrs = $_POST['ip_addrs'];
   $cug_number = $_POST['cug_number'];
   $u_name = $_POST['u_name'];
   $pwd = $_POST['pwd'];
   $department = $_POST['department'];
   $location = $_POST['location'];

   $srno = $_POST['srno'];
   $item = $_POST['item'];
   $itemId = $_POST['itemId'];
   $qnty = $_POST['qnty'];
   $make = $_POST['make'];
   $model = $_POST['model'];
   $Sr_Number = $_POST['Sr_Number'];
   $Mac_Add = $_POST['Mac_Add'];
   $Scrn_Size = $_POST['Scrn_Size'];
   $ram_1 = $_POST['ram_1'];
   $ram_2 = $_POST['ram_2'];
   $hhd_1 = $_POST['hhd_1'];
   $hhd_2 = $_POST['hhd_2'];
   $hhd_3 = $_POST['hhd_3'];
   $os = $_POST['os'];
   $AntiVirus = $_POST['AntiVirus'];
   $Manf_Year = $_POST['Manf_Year'];

   foreach ($itemId as $key => $value) {

     $sql = "UPDATE issue SET emp_id = '$emp_id',p_name = '$emp_name',IP_Address = '$ip_addrs',CUG_Number = '$cug_number',U_name = '$u_name',password = '$pwd',dpnt = '$department',location = '$location',item_category = '".$value."',qnty = '".$qnty[$key]."',Make = '".$make[$key]."',Model = '".$model[$key]."',Serial_Number = '".$Sr_Number[$key]."',Mac_Address = '".$Mac_Add[$key]."',Screen_Size = '".$Scrn_Size[$key]."',RAM_1 = '".$ram_1[$key]."',RAM_2 = '".$ram_2[$key]."',HDD_1 = '".$hhd_1[$key]."',HDD_2 = '".$hhd_2[$key]."',HDD_3 = '".$hhd_3[$key]."',OS = '".$os[$key]."',AntiVirus = '".$AntiVirus[$key]."',Manf_Year = '".$Manf_Year[$key]."' where sr_no = '".$srno[$key]."'";
     $run = sqlsrv_query($con,$sql);
   }
   if($run == true){
      echo "Updated sucessfully";
   }
   else{
      print_r(sqlsrv_errors());
   }
   
}

?>
