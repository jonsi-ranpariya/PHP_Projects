<?php 
include('dbcon.php');
if (isset($_POST['month'])) {
    $month = $_POST['month'] + 1;
    if($month == 2){
      $td = 28;
    }else if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
      $td = 31;
    }else{
      $td = 30;
    }
    $year = $_POST['year'];
    $date = (int)$year.'-'.(int)$month.'-'.'01';
    $date1 = (int)$year.'-'.(int)$month.'-'.(int)$td;

    ?>
      <table class="table table-bordered">
          <thead>
              <tr>
                <th>Files</th>
                <th>Action</th>
              </tr>
          </thead> 
          <tbody>
    <?php
    $sql = "SELECT b.file_source from legal a left outer join L_upload b on a.Sr_no = b.iid where a.Due_Date BETWEEN '$date' AND '$date1'";
    $run = sqlsrv_query($con,$sql);
    while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
      if($row['file_source'] == ''){
        continue;
      }
    ?>        
        <tr>
          <td><?php echo $row['file_source']; ?></td>
          <td><button type="button" class="btn btn- px-1" onclick="return popitup('legal_Doc/<?php echo $row['file_source'];?>')"><i class='fas fa-arrow-circle-down' style='font-size:26px'></i></button></td>
        </tr>    
      <?php   
      }
    ?>
    </tbody>
  </table>
    <?php
}
?> 
<script type="text/javascript">
  function popitup(url) {
      newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
      if (window.focus) {newwindow.focus()}
      return false;
    }
</script>      
                  