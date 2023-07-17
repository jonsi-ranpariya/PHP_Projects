<?php
ini_set('memory_limit', '-1');
// Include the PDF class
require_once "TCPDF-main/tcpdf.php";
						
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $this->SetFont('times', 'B', 18);
        $this->Cell(0,10,'Machine Data',0,0,'C');
        $this->SetFont('times', 'B', 16);
        $this->SetY(4);
        $this->SetX(2);
        $this->Cell(0, 18, '_________________________________________________________________________'); 	
    }
    // Page footer
    public function Footer() {
        
        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica','b', 8);
        $this->SetTextColor(153, 0, 0);  
        // Page number
        $this->Cell(0, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');   
    }
}

// create new PDF document
$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Machine_Pdf');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

$pdf->SetMargins(5, 20, 1);
$pdf->SetHeaderMargin(2);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->AddPage();



        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-M-Y', time());
        include('dbcon.php');
        $sql = "SELECT * FROM machine_list where (Location = '2205' OR Location = '2205-1' OR Location = '2205-2') order by Machine_Tag Asc";
        $run = sqlsrv_query($con,$sql);
         $output =''; 
          while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){   

        $output .='<table  style="width:98%; border: 0.2px solid gray; padding-top: 4rem;">';

            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Machine Tag :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Machine_Tag'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Panel Board :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Panel_Board'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Location :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Location'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Dies Qty :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Dies_Qty'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>M/c No. :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Mc_no'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>PVC Hopper(Capacity) :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['PVC_Hopper'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Type Of Machine :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Type_Of_Machine'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Extruder Head(Capacity) :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Extruder_Head'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Machine Type :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Machine_Type'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Skin/Cross Head(Capacity):</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Skin_Cross_Head'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>M/C Purchase_Year :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Year'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Screw Barrel(Capacity) :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Screw_Barrel'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>M/C Make :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Make'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Tank with Pump :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Tank_with_Pump'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>M/C Model :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Model'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Meter Gauge / Sensor :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Meter_Gauge_Sensor'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Capacity :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Capacity'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Spark Test  :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Spark_Test'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Capacity Unit :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Capacity_Unit'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>QC Instrument :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['QC_Instrument'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Motor ( Qty ) :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Motor_Qty'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Transformer(Capacity)  :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['Transformer'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Online Annealing :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Online_Annealing'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>No of Spindal :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['No_of_Spindal'].'</td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Chemical Tank :</b></td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;">'.$row['Chemical_Tank'].'</td>';
                $output .= '<td style="border-right:0.2px solid gray; border-top:0.2px solid gray; height:19px;"><b>Remark  :</b></td>';
                $output .= '<td style="border-top:0.2px solid gray; height:19px;">'.$row['remark'].'</td>';
            $output .= '</tr>';

            $output .= '<tr>';
                $output .= '<td style="border-top:0.2px solid gray; height:15px; width:100%;"></td>';
            $output .= '</tr>';
            $output .= '<tr>';
                $output .= '<td style="border-right:0.2px solid gray; height:19px;">';
                    $sql1 = "SELECT * from Upload_Docs WHERE iid  = '".$row['sr']."'";
                    $run1 = sqlsrv_query($con,$sql1);
                    while($row1 = sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC)){
               
                $output .= '<img src="machine_photo/'.$row1['upload_docs'].'" alt="'.$row1['upload_docs'].'" width="260" height="120">&nbsp;';
                        }
                $output .= '<img src="machine_photo/'.$row['Panel_Photo'].'" alt="'.$row['Panel_Photo'].'" width="260" height="120"></td>';
                $output .= '</tr>';
         
            $output .= '</table><br><br><br pagebreak="true"/>';
          }
            $pdf->SetFont("times", "A", 11);                        
            $pdf->SetY(20);
            $pdf->SetX(7);
            $pdf->writeHTML($output, true, 0, true, 0, 'L');
          
/*}
else{
    $output = 'ERROR FOUND!!';
}
}*/

// Clean any content of the output buffer
ob_end_clean();

//Close and output PDF document
$pdf->Output('machine-2205.pdf', 'I');

?>