<?php 

if(isset($_POST["id"]))
{ 
  include('dbcon.php');


  $sql = "SELECT a.sr_no,c.id,b.i_code,format(a.issue_date, 'dd-MMM-yyyy') as issue_date,a.issue_by,a.qnty,a.unit,a.stock,b.item as item1,c.item from issue a left outer join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code inner join item_master c on a.item_category = c.id WHERE a.sr_no = '".$_POST["id"]."' order by a.sr_no desc";

  $run = sqlsrv_query($con,$sql);
  $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
  $output = '';  
  $output .='

  <div class="d1">
   <div class="row">
            <label class="col-4">Date</label>
            <input class="col-6" type="text" name="issue_date"  id="issue_date" value="'.$row['issue_date'].'"><input type="hidden" name="iid" id="iid" value="'.$row['sr_no'].'">
        </div>
        

    <div class="row">
           <label class="col-4">issue_by</label>
           <input class="col-6" type="text"  name="issue_by" id="issue_by" value="'.$row['issue_by'].'">
    </div>

     <div class="row">
           <label class="col-4">Item_category</label>
           <input class="col-6" type="text" value="'.$row['item'].'"><input type="hidden" class="id" name="id" value="'.$row['id'].'"">
    </div>

    <div class="row">
           <label class="col-4">Item_name</label>
           <input class="col-6" type="text"  name="item1"  value="'.$row['item1'].'"><input type="hidden" class="i_code" name="i_code" value="'.$row['i_code'].'"">
    </div>

     <div class="row">
           <label class="col-4">Qnty</label>
           <input class="col-6" type="text"  name="qnty" id="qnty" value="'.$row['qnty'].'">
     </div>
    
     <div class="row">
           <label class="col-4">unit</label>
           <input class="col-6" type="text"  name="unit" id="unit" value="'.$row['unit'].'">
     </div>

     <div class="row">
           <label class="col-4">stock</label>
           <input class="col-6" type="text"  name="stock" id="stock" value="'.$row['stock'].'">
     </div>
    
</div>
 ';
echo $output;

}

 ?>
  