<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>live_Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!----------------------- jQuery UI --------------------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery UI  autocomplte-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- included css -->
    <link href='css/select2.min.css' rel='stylesheet' type='text/css'>

    <style type="text/css">
      table{
        border: 1px solid #0000004a;
        width: 100%;
      }
      table th, table td{
        text-align: center;
        border: 1px solid #0000002b;
        padding: 6px 4px !important;
      }
      th{
        font-size: 1rem;
        background-color:#2f70cf;
        color: white;
      }
      td{
        background-color: #fffff;
      }
        
      thead input {
        width: 100%;
        padding: 5px;
        height: 35px;
      }
      #table2 tr:nth-child(even) {
        background-color: #b5ced77a !important;
      }
     /* #viewdata{
        color: darkslategray;
      }*/
      .ADD{
        background-color: #84bfe0 !important;
      }
      .mod {
        width: 100%;
        max-width: none;
        /*height: 80%;*/
        margin: 0;
      }
      .mod1 {
        height: 100%;
        border: 0;
        border-radius: 0;
      }
      .mod2 {
        overflow-y: auto;
        background-color: #e6ecf5;
      }
      #text{
        text-align: center;
      }
      /*input spin remove*/
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      .th2{
          width: 15%;
      }
      .th3{
          width: 15%;
      }
       .th4{
          width: 10%;
      }
      #add td{
        padding: 0 !important;
      }
      /*  autocomplete */
      .ui-autocomplete {
        font-family: serif !important;
        font-size: 15px !important;
        max-height: 150px;
        max-width: 280px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        background-color: #66d9ff !important;
        border-radius: 10px;
        z-index: 21500 !important;
      }
      .modal-dialog-scrollable .modal-body {
        overflow-y: auto;
        background-color: #4584e359;
        
      }
      #fetchonmodal table td{
        padding: 0 !important;
      }
    </style>
  
  </head>
  <body>
    <div class="container-fluid m-1 mt-4 ">
      <div class="container-fluid">
        <div class="p-0 bg-secondary text-center text-warning">
          <h2>Live Stock</h2>
        </div>
      <div class="row m-1 mt-3">
        <table  id="table2">
          <thead>
            <tr>
              <th>Category</th>
              
              <th>Inward</th>
              <th>issue</th>
              <th>live_Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('dbcon2.php');
            include('dbcon.php');
            $query="SELECT * FROM item_master where isdelete = 0 order by item";
            $result = sqlsrv_query($con,$query);
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){

            $query1="SELECT SUM(qnty) as qnty FROM inward where i_code = '".$row['id']."' and status = 'stock' and isdelete != 'true'" ;
            $result1=sqlsrv_query($con,$query1);
            $row1 =sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC);

            $query2="SELECT SUM(qnty) as qnty FROM issue where item_category = '".$row['id']."' and status = 'use'";
            $result2=sqlsrv_query($con,$query2);
            $row2=sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
            $stock = $row1['qnty'] - $row2['qnty'];
            ?>
            <tr>
              <td class="item"><?php echo $row['item'];?></td>
              <td><?php echo $row1['qnty'];?></td>
              <td><?php echo $row2['qnty'];?></td>
              <td><?php echo $stock;?></td>
              <td class="sto"><button type="button" class="btn btn-primary py-1 px-2 mx-3 action" id="<?php echo $row['id']; ?>">View</button></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-----------------------------------------  live_stock Modal ----------------------------------------->
    <div class="modal fade " id="live_data" aria-labelledby="live_data" aria-hidden="true" tabindex="-1">
      
      <!----------------- Scrollable modal --------------------------->
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header font-weight-bold">
            <!--view modal unique--> <h4><strong id="viewdata" class="mx-2 primary"></strong></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <form>
                <table id="live_table">
                  <!--   loding data on runtime -->
                </table>
              </form>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <!----------------------------------------- END live_stock Modal ----------------------------------------->
    <!-----------------------------------------  ADD Master Stock Modal ----------------------------------------->
    <div class="modal fade " id="Add_data" aria-labelledby="Add_data" >
      <div class="modal-dialog modal-xl mod">
        <div class="modal-content mod1">
          <div class="modal-header font-weight-bold">
            <h4>ADD</h4>
            <button type="button" onclick="javascript:window.location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body mod2" id="add">
            <div>
              <form id="form2" >
                <div class="row">
                  <div class="col-lg-9">
                    <table>
                      <thead>
                        <tr>
                          <th class="th2">UserID</th>
                          <th class="th3">Username</th>
                          <th class="th3">IP Address</th>
                          <th class="th3">CUG Number</th>
                          <th class="th3">user name</th>
                          <th class="th3">password</th>
                          <th class="th3">Department</th>
                          <th class="th3">Location</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><!-- <input type="text" class="form-control td1" name="uid"  requ> required-->
                          <input type="text" name="emp_id" class="form-control border-info emp_id"   required>
                        </select>
                      </td>
                      <td><input type="text" class="form-control emp_name" name="emp_name" required>
                      </td>
                      <td><input type="text"  class="form-control td1 ipaddress" name="ip_addrs" id="ip_addrs" placeholder="xxx.xxx.xxx.xxx"  required></td>
                      <td><input type="text" step="0.01" class="form-control td1 phone" name="cug_number" placeholder="(XXX) XXX-XXXX" required></td>
                      <td><input type="text" class="form-control td1 Username" name="u_name" required></td>
                      <td><input type="text" class="form-control td1 pwd" name="pwd" required></td>
                      <td><select  name="department" class="form-control depart">
                            <option selected="true" disabled="true" value="">Select</option>
                            <?php
                            include('dbcon4.php');
                            $sql11="SELECT Distinct department FROM [user] where department is not NULL  order by department asc";
                            $run11=sqlsrv_query($conn,$sql11);
                            while ($row11 = sqlsrv_fetch_array($run11, SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <option value="<?php echo $row11['department'];  ?>"><?php echo $row11['department'];?></option>
                            <?php } ?>
                          </select>
                      </td>
                      <td><select name="location" class="form-control location"> 
                              <option selected="true" disabled="true" value="">Select</option>
                              <option>Baroda</option>
                              <option>2205</option>
                              <option>696</option>
                              <option>1701</option>
                          </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-1" >
                <label></label>
                <input type="button" class="btn btn-success form-control master" value="Add Master">
              </div>
            </div>
            <br>
            <div class="table-responsive">
              <table  id="addTable">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Serial No.</th>
                    <th>Mac Address</th>
                    <th>ScreenSize</th>
                    <th>RAM-1</th>
                    <th>RAM-2</th>
                    <th>HDD-1</th>
                    <th>HDD-2</th>
                    <th>HDD-3</th>
                    <th>OS</th>
                    <th>AntiVirus</th>
                    <th>Manf.Year</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include('dbcon.php');
                  $query="SELECT iid,Sr_no,item FROM M_item";
                  $result = sqlsrv_query($con,$query);
                  while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $abc = $row['Sr_no'];
                  ?>
                  <tr>
                    <td style="width:8%"><input type="text" class="form-control item" value="<?php echo $row['item'];?>" readonly><input type="hidden" name="Sr_no[]" class="Sr_no" value="<?php echo $row['iid'];?>"></td>
                    <td style="width:4%"><input type="number" step="0.01" name="qnty[]" class="form-control qnty" ></td>
                    <td>
                      <select  name="make[]" class="form-control make">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql="SELECT Distinct Make FROM M_Make where Make is not NULL  order by Make asc";
                        $run=sqlsrv_query($con,$sql);
                        while ($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row['Make'];  ?>"><?php echo $row['Make'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td style="width:10%"><input type="text" name="model[]" class="form-control modal1" id="mod<?php echo $abc ?>" ></td>
                    <td style="width:10%"><input type="text" name="Sr_Number[]" class="form-control Sr_Number" id="srnumber<?php echo $abc ?>" ></td>
                    <td><input type="text" name="Mac_Add[]" id="Mac_Add<?php echo $abc ?>" class="form-control Mac_Add" placeholder="Enter ..."></td>
                    <td style="width:5%">
                      <select  name="Scrn_Size[]" class="form-control Scrn_Size" id="sSize<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql1="SELECT Distinct Screen_Size FROM M_ScreenSize where Screen_Size is not NULL  order by Screen_Size asc";
                        $run1=sqlsrv_query($con,$sql1);
                        while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row1['Screen_Size'];  ?>"><?php echo $row1['Screen_Size'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td style="width:6%">
                      <select  name="ram_1[]" class="form-control ram-1"  id="ram1<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql2="SELECT Distinct RAM_1 FROM M_RAM where RAM_1 is not NULL  order by RAM_1 asc";
                        $run2=sqlsrv_query($con,$sql2);
                        while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row2['RAM_1'];  ?>"><?php echo $row2['RAM_1'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td style="width:6%">
                      <select  name="ram_2[]" class="form-control ram-2" id="ram2<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql3="SELECT Distinct RAM_1 FROM M_RAM where RAM_1 is not NULL  order by RAM_1 asc";
                        $run3=sqlsrv_query($con,$sql3);
                        while ($row3 = sqlsrv_fetch_array($run3, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row3['RAM_1'];  ?>"><?php echo $row3['RAM_1'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td>
                      <select  name="hhd_1[]" class="form-control hhd-1" id="hhd1<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql4="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                        $run4=sqlsrv_query($con,$sql4);
                        while ($row4 = sqlsrv_fetch_array($run4, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row4['HDD_1'];  ?>"><?php echo $row4['HDD_1'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td style="width:6%">
                      <select  name="hhd_2[]" class="form-control hhd-2" id="hhd2<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql5="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                        $run5=sqlsrv_query($con,$sql5);
                        while ($row5 = sqlsrv_fetch_array($run5, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row5['HDD_1'];  ?>"><?php echo $row5['HDD_1'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td>
                      <select  name="hhd_3[]" class="form-control hhd-3" id="hhd3<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql6="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                        $run6=sqlsrv_query($con,$sql6);
                        while ($row6 = sqlsrv_fetch_array($run6, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row6['HDD_1'];  ?>"><?php echo $row6['HDD_1'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td>
                      <select name="os[]" class="form-control os" id="operating<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <?php
                        $sql7="SELECT Distinct OS FROM M_OS where OS is not NULL  order by OS asc";
                        $run7=sqlsrv_query($con,$sql7);
                        while ($row7 = sqlsrv_fetch_array($run7, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $row7['OS'];  ?>"><?php echo $row7['OS'];?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <td>
                      <select name="AntiVirus[]" class="form-control AntiVirus" id="anti<?php echo $abc ?>">
                        <option selected="true" disabled="true" value="">Select</option>
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                    </td>
                    <td style="width:6%"><input type="text" name="Manf_Year[]" id="Manf_Year" maxlength="4" placeholder="YYYY" class="form-control myear"></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="submit" class="btn btn-primary px-4" id="addSave">Save</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------- END ADD Modal ----------------------------------------->
<!-----------------------------------------  ADD add_master Modal ----------------------------------------->
<div class="modal fade " id="add_master" aria-labelledby="add_master" aria-hidden="true" tabindex="-1">
  
  <!----------------- Scrollable modal --------------------------->
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header font-weight-bold">
        <!--view modal unique--> <h4>Add Master</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <form  id="addmaster_data">
            <table >
              <label>Master Type</label>
              <td style="width:50%"><select name="master_add" id="master1" class="form-control master_add" >
                <option selected="true" disabled="true" value="">SELECT</option>
                <option value="M_Item/Item">M_Item</option>        <!--value="M_Item/Item" [db column Item] -->
                <option value="M_Make/Make">M_Make</option>
                <option value="M_ScreenSize/Screen_Size">M_ScreenSize</option>
                <option value="M_RAM/RAM_1">M_RAM</option>
                <option value="M_HDD/HDD_1">M_HDD</option>
                <option value="M_OS/OS">M_OS</option>
              </select>
            </td>
          </table><br>
          <div class="row rounded ">
            <div class="col mb-3 w-50  mt-2">
              <input type="text" name="data1" class="form-control adddata px-2">
            </div>
            <!--    <div class="col  mb-3 w-50 dddd  aaaa mt-2">
              <input type="text" name="data2" class="form-control adddata px-2">
            </div>
            <div class="col mb-3 w-50 aaaa mt-2">
              <input type="text" name="data3" class="form-control adddata px-2">
            </div> -->
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" name="save" class="btn btn-primary px-4" id="addmaster">Save</button>
    </div>
  </div>
</div>
</div>
<!----------------------------------------- END ADD add_master Modal ----------------------------------------->
<!-----------------------------------------   View Modal ----------------------------------------->
<div class="modal fade" id="livedata" aria-labelledby="livedata" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-xl modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header font-weight-bold">
      <h4>View</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" id="livedata1">
      <form id="formData">
        <table>
          <thead>
            <tr>
              <th>SrNo</th>
              <th class="th2">UserID</th>
              <th>Username</th>
              <th>IP Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $srno = 1;
            $qry = "SELECT DISTINCT emp_id,p_name,IP_Address FROM issue where flag = 0";
            $runi = sqlsrv_query($con,$qry);
            while($rowi = sqlsrv_fetch_array($runi, SQLSRV_FETCH_ASSOC)){
            ?>
            <tr>
              <td><?php echo $srno ?></td>
              <td><input type="text" name="emp_id" class="form-control border-info emp_id" value="<?php echo $rowi['emp_id']; ?>" required></td>
              <td><input type="text" value="<?php echo $rowi['p_name']; ?>" class="form-control emp_name" name="emp_name" required></td>
              <td><input type="text" value="<?php echo $rowi['IP_Address']; ?>"  class="form-control td1 ipaddress" name="ip_addrs" id="ip_add" placeholder="xxx.xxx.xxx.xxx" required></td>
              <td><button type="button" class="btn btn-primary py-1 px-1 edit_master"  id="<?php echo $rowi["emp_id"]; ?>">Edit</button></td>
            </tr>
            <?php $srno++; } ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" name="save" class="btn btn-primary btn-md px-4">Save</button>
    </div>
  </div>
</div>
</div>
<!-----------------------------------------   view Modal ----------------------------------------->
<!-----------------------------------------   Edit Modal ----------------------------------------->
<div class="modal fade" id="editmaster" aria-labelledby="editmaster" aria-hidden="true" tabindex="-1">

<!----------------- Scrollable modal --------------------------->
<div class="modal-dialog modal-xl modal-dialog-scrollable mod">
  <div class="modal-content mod1">
    <div class="modal-header font-weight-bold">
      <h4>EDIT</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body mod2" id="edit_modal">
      
      <form id="fetchonmodal" ><!--  method="POST" action="update_livestock_db.php"  -->
        
        <!-- LOAD DATA FROM AJAX -->
      </form>
    </div>
    
    <div class="modal-footer">
      <button type="button" name="save" class="btn btn-primary btn-md px-4" id="editsave">Save</button>
    </div>
  </div>
</div>
</div>
     <!-----------------------------------------  ADD master Modal ----------------------------------------->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
   
      <script type="text/javascript">
      $('#assign').addClass('active');

  /*IP adderess format*/
      $(document).ready(function(){
      $('#ip_addrs').inputmask({"mask": "999.999.999.999"});
      });

       $(document).ready(function(){
      $('#ip_add').inputmask({"mask": "999.999.999.999"});
      });

        
      $(document).ready(function(){
      $("#Manf_Year").mask("(9999)");
      });

       $(document).ready(function(){
      $('.Mac_Add').inputmask({"mask": '**:**:**:**:**:**'});
      });

  /*Mask adderess format  [script]*/
/*  $(document).ready(function(){ 
      const dynamicMask = new IMask(document.querySelectorAll('.Mac_Add'), {
      mask: [{
        mask: '**:**:**:**:**:**'
      },
       ]
      })
      });*/

 $(document).ready(function(){
      $('#Add_data').modal({
          backdrop: 'static',
          keyboard: false  // to prevent closing with Esc button (if you want this too)
      });
      
      /*Add livestock [blanck column[DB item id=4,5,9]]*/
       $('#mod9').prop('readonly',true);
      $('#Mac_Add4,#Mac_Add6,#Mac_Add9').prop('readonly',true);
      $('#srnumber4,#srnumber6,#srnumber9').prop('readonly',true);
      $('#sSize1,#sSize3,#sSize4,#sSize5,#sSize9').html('');
      $('#ram13,#ram14,#ram15,#ram16,#ram19').html('');
      $('#ram23,#ram24,#ram25,#ram26,#ram29').html('');
      $('#hhd13,#hhd14,#hhd15,#hhd16,#hhd19').html('');
      $('#hhd23,#hhd24,#hhd25,#hhd26,#hhd29').html('');
      $('#hhd33,#hhd34,#hhd35,#hhd36,#hhd39').html('');
      $('#operating3,#operating4,#operating5,#operating6,#operating9').html('');
      $('#anti3,#anti4,#anti5,#anti6,#anti9').html('');
});

      $(document).ready(function(){
      var table = $('#table2').DataTable({
      "processing": true,
      dom: 'Bfrtip',
      ordering: false,
      
      lengthMenu: [
      [ 10, 25, 50, -1 ],
      [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
      buttons: [
      'pageLength','copy', 'excel',
      // Customize button datatable
      {
      text: 'ADD',"className": 'ADD',
      action: function () {
      $('#Add_data').modal('show');

      }
      },
      {
        text: 'VIEW', "className": 'VIEW',
        action: function () {
           $('#livedata').modal('show');
        }
      },
      ]
      });
      });
      /*view live_stock modal*/

      $(document).ready(function(){
       $('.phone').inputmask({"mask": "(999) 999-9999"});
      });

     
     /*Select master [select option] change filed*/
     /* $(document).on('change','.master_add',function(){
          var y=$(this).val();
          if (y=='hdd') {
              $(".aaaa").show(); 
          }
          else if (y=='ram') {
              $(".bbbb").show();  
          }
          else{
              $(".dddd").hide();
              
          }
      });*/

                                                  
      $(document).on('click', '.action', function(){
      var id = $(this).attr("id");
      $('#viewdata').text($(this).closest('tr').find('.item').text()); /*view unique[selected item view]in modal */
      $('#sto').text($(this))
      $.ajax({
      url:"get_livestock.php",
      method:"POST",
      data:{id:id},
      success:function(data)
      {
        $('#live_table').html(data);
        $('#live_data').modal('show');
      }
      });
      });


      /*------autocomplete textbox-----*/
    $( function() {
        // mc autocomplete box
        $( ".emp_id" ).autocomplete({
            source: function( request, response ) {
            // Fetch data
            $.ajax({
                url: "store/emp_id_livestock.php",
                type: 'post',
                dataType: "json",
                data: {
                    e_id: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('.emp_id').val(ui.item.label);
            $('.emp_name').val(ui.item.pname1);
            return false;
        },
        change: function (event, ui)  //if not selected from Suggestion
        {
            if (ui.item == null){
                $(this).val('');
                $(this).focus();
            }
            else{
    
            }
        }
    });
 });


   $(document).on('click', '.master', function(){
    $('#add_master').modal('show');

   });

    $(document).on('click', '.edit_master', function(){
       var id = $(this).attr("id");  
           $.ajax({
                url:"live_master_edit.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    $('#fetchonmodal').html(data);
                    $('#editmaster').modal('show');
                }
            });
   });
/*
    $('#edit_master').on('hidden.bs.modal', function () {
 location.reload();
})*/

/*live stock Add [submit data]*/
  $(document).on('click', '#addSave', function(){             /*save button id*/
    let data = $('#addTable tr:gt(0)').map(function(){        /*table name*/
    let qty =  $(this).closest('tr').find('.qnty').val();
    if(true){
         return {

              userid: $('.emp_id').val(),
              emp_name: $('.emp_name').val(),
              ipaddress: $('.ipaddress').val(),
              phone: $('.phone').val(),
              Username: $('.Username').val(),
              pwd: $('.pwd').val(),
              department: $('.depart').val(),
              location: $('.location').val(),
              Sr_no: $(this).closest('tr').find('.Sr_no').val(),   /*hidden class code for item*/
              qnty:qty,
              make: $(this).closest('tr').find('.make').val(),
              modal1: $(this).closest('tr').find('.modal1').val(),
              Sr_Number: $(this).closest('tr').find('.Sr_Number').val(),
              Mac_Add: $(this).closest('tr').find('.Mac_Add').val(),
              Scrn_Size: $(this).closest('tr').find('.Scrn_Size').val(),
              ram_1: $(this).closest('tr').find('.ram-1').val(),
              ram_2: $(this).closest('tr').find('.ram-2').val(),
              hhd_1: $(this).closest('tr').find('.hhd-1').val(),
              hhd_2: $(this).closest('tr').find('.hhd-2').val(),
              hhd_3: $(this).closest('tr').find('.hhd-3').val(),
              os: $(this).closest('tr').find('.os').val(),
              AntiVirus: $(this).closest('tr').find('.AntiVirus').val(),
              myear: $(this).closest('tr').find('.myear').val(),
          };
    }
    }).get();
            $.ajax({
                url: "livestock_add_db.php",
                type: 'post',
                data: {data:data},
                success: function( data ) {
                   alert(data);
                },
                complete: function () {
                  location.reload();
                }
            });
      });

    $(document).on('click','#editsave',function(){
        $.ajax({
          url: "update_livestock_db.php",
          type: 'post',
          data: $('#fetchonmodal').serialize(),
          success: function( data ) {
             alert(data);
              //$('#Add_data').modal('hide');
          },
          complete: function () {
            location.reload();
          }
        });
    });
  /* $(document).on('click','#editsave', function(){
    let data = $('#editdata tr:gt(0)').map(function(){
    let qty =   $(this).find('td:eq(1) input[type="number"]').val();
    if(true){
         return {
              sr_no: $('.sr_no1').val(),
              userid: $('.emp_id1').val(),
              emp_name: $('.emp_name1').val(),
              ipaddress: $('.ipaddress1').val(),
              phone: $('.phone1').val(),
              Username: $('.Username1').val(),
              pwd: $('.pwd1').val(),
              department: $('.depart1').val(),
              location: $('.location1').val(),

              item:  $(this).find('td:eq(0) input[type="text"]').val(),
              qnty:qty,
              make: $(this).find('td:eq(2) input[type="text"]').val(),
              modal1: $(this).find('td:eq(3) input[type="text"]').val(),
              Sr_Number: $(this).find('td:eq(4) input[type="number"]').val(),
              Mac_Add: $(this).find('td:eq(5) input[type="text"]').val(),
              Scrn_Size: $(this).find('td:eq(6) input[type="text"]').val(),
              ram_1: $(this).find('td:eq(7) input[type="text"]').val(),
              ram_2: $(this).find('td:eq(8) input[type="text"]').val(),
              hhd_1: $(this).find('td:eq(9) input[type="text"]').val(),
              hhd_2: $(this).find('td:eq(10) input[type="text"]').val(),
              hhd_3: $(this).find('td:eq(11) input[type="text"]').val(),
              os: $(this).find('td:eq(12) input[type="text"]').val(),
              AntiVirus:  $(this).find('td:eq(13) input[type="text"]').val(),
              myear: $(this).find('td:eq(14) input[type="text"]').val(),
          };
    }
    }).get();
    console.log(data);
            $.ajax({
                url: "update_livestock_db.php",
                type: 'post',
                data: {
                   data:data
                },
                success: function( data ) {
                   alert(data);
                    //$('#Add_data').modal('hide');

                },

                complete: function () {
                  location.reload();
                }
            });
   });*/

    /*ADD Master db */
        $(document).on('click','#addmaster',function(){
          $.ajax({
            url:"add_stock_master.php",
            method:"POST",
            data:$('#addmaster_data').serialize(),
            success:function(data){
              alert(data);
            },
            complete:function(){
              $('#add_master').modal('hide');
            },
          });
        });


      </script>
     </body>
   </html>
  <?php
  include('footer.php')
  ?>