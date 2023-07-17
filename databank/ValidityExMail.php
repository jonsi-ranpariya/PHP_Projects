<?php

include('D:\xampp\htdocs\databank\dbcon.php');
include('D:\xampp\htdocs\databank\package\pdf.php');
require 'D:\xampp\htdocs\databank\package\phpmailer\class.phpmailer.php';
	
	$sql = "SELECT Status,Follow_Up_By,format(Entry_Date, 'dd-MMM-y') as Entry_Date,format(Date_Applied, 'dd-MMM-y') as Date_Applied,Customer,Place,Website_Registration,Certificate_No,Vendor_Code,format(Validity_Date, 'dd-MMM-y') as Validity_Date1 FROM Data where Validity_Date < '2022-04-14'";

			$params = array();
			$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
			$result=sqlsrv_query($con,$sql,$params,$options);
			$count=sqlsrv_num_rows($result);
		if ($count > 0) {
  	$run = sqlsrv_query($con,$sql); 

$output = '
	<style>
	#customers {
	  font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	  padding:10px;
	  font-size:10px;	
	}
	#customers td, #customers th {
	  border: 2px solid #efc1c9;
	  padding: 6px;
	  text-align: center;
	  font-size:12px;
	}
	#customers tr:nth-child(even){background-color: #D6EEEE;}

	tr:hover {background-color: #04aaaa;}
	#customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: center;
	  background-color: #04aaaa;
	  color: white;
	}

	</style>
	<table style="width: 100%; padding:10px;">
	<tr>
		<th style="text-align:left;font-size:18px;">Vender Ragitration(Valdity DateExpired) </th>
		<th style="text-align:right;font-size:18px;">'. date("d-M-y") .'</th>
	</tr>
		<table id="customers">
			  <tr>		
				  <th>Sr.</th>				
		          <th style="width:20%;">Status</th>
		          <th style="width:20%;">Follow By</th>
		          <th style="width:30%;">Entry Date</th>
		          <th style="width:20%;">Date Aplied </th>
		          <th style="width:30%;">Customer</th>
		          <th style="width:20%;">Place</th>
		          <th style="width:20%;">Web Registr</th>
		          <th style="width:20%;">Certificate No.</th>
				  <th style="width:20%;">Vendor Code</th>
				  <th style="width:40%;">Valdity Date</th>
			 </tr>
	';
	$srno = 1;
	while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC))
	{
		$output .= '
			<tr>
				<td>'.$srno.'</td>
				<td>'.$row["Status"].'</td>
				<td>'.$row["Follow_Up_By"].'</td>
				<td>'.$row["Entry_Date"].'</td>
				<td>'.$row["Date_Applied"].'</td>
				<td>'.$row["Customer"].'</td>
				<td>'.$row["Place"].'</td>
				<td>'.$row["Website_Registration"].'</td>
				<td>'.$row["Certificate_No"].'</td>
				<td>'.$row["Vendor_Code"].'</td>
				<td>'.$row["Validity_Date1"].'</td>
				
			</tr>
		';
  $srno++;
  } 
	$output .= '
		</table>
	';

	// mail part
	
	$file_name = 'DateExpired.pdf';
	$html_code = $output;
	$pdf = new Pdf();
	$pdf->set_paper('A4', 'landscape');
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
		
	$mail = new PHPMailer;
	$mail->IsSMTP();								   //Sets Mailer to send message using SMTP
	$mail->Host = 'nifty.interactivedns.com';		               //Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = 465;							      //Sets the default SMTP server port
	$mail->SMTPAuth = true;						      //Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'rm.update@seplcables.com';      //Sets SMTP username
	$mail->Password = 'Jw[Aim8&c}6A';	              //Sets SMTP Password
	$mail->SMTPSecure = 'ssl';					      //Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'rm.update@seplcables.com';	      //Sets the From email address for the message
	$mail->FromName = 'Vendor Registr Update';			      //Sets the From name of the message
	$mail->AddAddress("viradiyajonsi0708@gmail.com");  //Adds a "To" address
	$mail->WordWrap = 52;							  //Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							  //Sets message type to HTML
	$mail->CharSet = 'UTF-8';											
	$mail->AddAttachment($file_name);     			  //Adds an attachment from a path on the filesystem
	$mail->Subject = 'TEST MAIL';			  //Sets the Subject of the message
	$mail->Body = 'Note : Vender_Ragister validity expired.';	//An HTML or plain text message body
	if($mail->Send())								 //Send an Email. Return true on success or false on error
	{
		echo '<label class="text-success">Valdity Details has been send successfully...</label>';
	}
	unlink($file_name);                              //Delete pdf file after send mail

}else{
	echo "No Expire Date......";
}
?>






