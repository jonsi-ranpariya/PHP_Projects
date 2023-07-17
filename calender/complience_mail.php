<?php

include('D:\xampp\htdocs\calender\dbcon.php');
include('D:\xampp\htdocs\calender\package\pdf.php');
require 'D:\xampp\htdocs\calender\package\phpmailer\class.phpmailer.php';

    $sql1 = "SELECT DISTINCT a.Department,b.email FROM Compliance a left outer join Department b on a.Department = b.department
							where Status <> 'Complete' and Company_Due_Date < GETDATE()";
		$run1 = sqlsrv_query($con,$sql1);
		while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC))
		{	
		$sql = "SELECT Compliance,Category,Department,FORMAT(Company_Due_Date,'dd-MMM-yy') as DueDate,Status FROM Compliance 
					where Status <> 'Complete' and Company_Due_Date < GETDATE() and Department = '".$row1['Department']."'";
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

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #324ccf;
  color: white;
}

</style>

<table style="width: 100%; padding:10px;">
<tr>
<th style="text-align:left;font-size:18px;">Compliance (Date Expired) </th>
<th style="text-align:right;font-size:18px;">'. date("d-M-y") .'</th>
</tr>

	<table id="customers">
		<tr>
  				<th style="width:150px;">Compliance</th>
          <th style="width:80px;">Category</th>
          <th style="width:60px;">Department</th>
          <th style="width:70px;">Due Date</th>
          <th style="width:60px;">Status</th>      
		</tr>
	';
	while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC))
	{
		$output .= '
			<tr>
				<td>'.$row["Compliance"].'</td>
				<td>'.$row["Category"].'</td>
				<td>'.$row["Department"].'</td>
				<td>'.$row["DueDate"].'</td>
				<td>'.$row["Status"].'</td>
			</tr>
		';
	}
	$output .= '
		</table>
	';

	// mail part
	
	$file_name = 'CompliancePendingList.pdf';
	$html_code = $output;
	$pdf = new Pdf();
	$pdf->set_paper('A4', 'landscape');
	// $pdf->set_paper('A4', 'portrait');
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
	$mail->FromName = 'Calender Update';			      //Sets the From name of the message
	$mail->AddAddress($row1['email']);  //Adds a "To" address
	$mail->WordWrap = 52;							  //Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							  //Sets message type to HTML
	$mail->CharSet = 'UTF-8';											
	$mail->AddAttachment($file_name);     			  //Adds an attachment from a path on the filesystem
	$mail->Subject = 'Compliance Pending Mail';			  //Sets the Subject of the message
	$mail->Body = 'Note : Compliance validity expired.';	//An HTML or plain text message body
	if($mail->Send())								 //Send an Email. Return true on success or false on error
	{
		echo '<label class="text-success">Compliance Details has been send successfully...</label>';
	}
	unlink($file_name);                              //Delete pdf file after send mail

}	

?>
