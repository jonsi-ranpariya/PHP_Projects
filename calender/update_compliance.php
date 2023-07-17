<?php 

if(isset($_POST["id"]))
{ 
  include('dbcon.php');

  $sql = "SELECT Sr_no,Compliance,Category,Department,Due_Date,Company_Due_Date,Status,format(Filed_Date, 'dd-MMM-y') as Filed_Date,Filed_Date as fdate,Prepared_By,Reviewed_By from Compliance WHERE Sr_no = '".$_POST["id"]."'";
  $run = sqlsrv_query($con,$sql);
 	$row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

$output = '';     //HTML CODE NO USED IN OUTPU ='';    /*EDIT TABLE*/

$output .= '
    <div class="d1">
      <div class="row">
          <label class="col-4">Compliance:</label>
          <input class="col-6" type="text" name="Compliance" value="'.$row['Compliance'].'" readonly><input type="hidden" name="iid"  value="'.$row['Sr_no'].'">
        </div>

     <div class="row">
         <label class="col-4">Category:</label>
         <input class="col-6" type="text" name="Category" value="'.$row['Category'].'" readonly>
    </div>
    <div class="row">
         <label class="col-4">Department:</label>
         <input class="col-6" type="text" name="depnt" value="'.$row['Department'].'" readonly="readonly">
    </div>

    <div class="row">
         <label class="col-4">Due Date:</label>
         <input class="col-6" type="date" name="Due_Date" value="'.$row['Due_Date']->format('Y-m-d').'" readonly>
    </div>

    <div class="row">
         <label class="col-4">Compny_DueDate:</label>
         <input class="col-8" type="date" name="c_date" value="'.$row['Company_Due_Date']->format('Y-m-d').'" readonly>
    </div>
    <div class="row">
         <label class="col-4">Status:</label>
          <select class="col-6" name="Status" value="'.$row['Status'].'" required>
              <option>Complete</option>
              <option>pending</option>
           </select>
      </div>
  ';
 $fdate = ($row['fdate'] == NULL) ? '' : $row['fdate']->format('Y-m-d');
   $output .= '
    
    <div class="row">
         <label class="col-4">Filed Date:</label>
         <input class="col-6" type="date" name="f_date"  value="'.$fdate.'" required>
  
    </div>
    <div class="row">
         <label class="col-4">Prepared By:</label>
         <input class="col-6" type="text" name="prepardby" value="'.$row['Prepared_By'].'" required>
    </div>

    <div class="row">
         <label class="col-4">Reviewed By:</label>
         <input class="col-6" type="text" name="reciveby" value="'.$row['Reviewed_By'].'" required
    </div>
     <div class="row">
         <label class="col-4">Upload File:</label>
         <input class="col-6" type="file" name="doc[]" multiple >
    </div>

  <table><tr><td>
    ';
    $sql1 = "SELECT file_source from upload where iid = '".$_POST["id"]."'";    /*view upload file*/
    $run1 = sqlsrv_query($con,$sql1);
    while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){

        $output .= '
         <button type="button" class="btn btn-primary btn-floating uploadImg" id="'.$row1['file_source'].'" style="margin: 5px"><i class="fa fa-eye" aria-hidden="true"></i></button></i>
      ';
    }
    $output .= '
  </td></tr></table></div>
   ';

echo $output;

}

?>