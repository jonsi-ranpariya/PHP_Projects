<?php
include('header.php');
include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
                width: 100% !important;
            }
            table th, table td{
                text-align: center;
                border: 1px solid #0000002b;
                padding: 5px 3px !important;
            }
            th{
                font-size: 1rem;
                background-color:#2f70cf;
                color: white;
            }
            td{
                background-color: #fff;
             /*   width: 90px !important;*/
            }
            thead input {
                width: 100%;
                padding: 5px;
                height: 35px;
            }
            #table tr:nth-child(even) {
                background-color: #b5ced77a !important;
            }
            #inward_table input{
                border: none;
                outline: none;
                box-shadow: none;
                width: 100% ;
            }
            .ADD{
                background-color: #84bfe0 !important;
            }
            #a1{
                background-color: #bbc0c766;
            }
            #inward_table{
                background-color: white;
                border: 1px solid black;
                width: 100%;
            }
           /* #th{
                width: 30% !important;
            }
            #th2{
                width: 15% !important;
            */}
            #form table{
                background-color: white;
                border: 1px solid white;
                width: 100%;
            }
            #form table input{
                border: none;
                outline: none;
                box-shadow: none;
                width: 100% !important;
            }
            #form table select{
                border: none;
                outline: none;
                box-shadow: none;
                width: 100% !important;
                padding: 10px 2px;
                float: center;
            }
            .check {
                width: 22px;
                height: 20px;
                font-size: 15px;
                margin: auto !important;
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
            .b1{
                background-color: #bbc0c766;
                padding: 20px;
                border-radius: 5px;
            }
            .b2{
                background-color: #bbc0c766;
                padding: 8px;
                border-radius: 3px;
            }
            #th{
                width: 30% !important;
            }
            #th2{
                width: 15% !important;
            }
                    /*inward dropdown searching*/
            .select2-container--default .select2-results>.select2-results__options{
                background-color:white;
            }
            .select2-container--open .select2-dropdown--below{
                background-color:white;
            }
            .select2-container {
                min-width: 100px;
            }
            .select2-container .select2-selection--single{
                height:34px !important;
            }
           .select2-container--default .select2-selection--single{
                border: 1px solid #ccc !important; 
                border-radius: 0px !important; 
           }

           #edit_modal{
                background-color: #2f70cf73;
            }
            #edit label{
                padding: 10px;
                font-size: 17px;
                font-family: sans-serif;
            }
            #edit input{
                border: 1px solid black;
                padding: 4px;
                width: 60%;
                margin: 5px;
                border-radius: 3px;
                font-size: 15px;  
                font-family: sans-serif;
            }
            #edit .d1{
                padding: 8px 20px 10px 20px;
            }
            #edit_modal{
                background-color: #2f70cf73;
            }
            #edit select{
                border: 1px solid black;
                padding: 4px;
                width: 60%;
                margin: 5px;
                border-radius: 3px;
                font-size: 15px;  
                font-family: sans-serif;
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
             .th2{
                  width: 15%;
              }
              .th3{
                  width: 15%;
              }
               .th4{
                  width: 10%;
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
            #add td{
              padding: 0 !important;
            }
      /*input spin remove*/
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
             margin: 0;
            }
            #fetchonmodal1 table td{
                    padding: 0 !important;
             }
       .modal-dialog-scrollable .modal-body {
            overflow-y: auto;
            background-color: #4584e359;
          }
        </style>
    </head>
    <body>
        <div class="container-fluid m-1 mt-4">
            <form action="issue_db.php" method="POST" id="issue">
                <div class="container-fluid">
                    <div class="p-0 bg-secondary text-center text-warning">
                        <h2>Material Issue</h2>
                    </div>
           <!-- message for submit form -->
                    <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-danger font-weight-bold font-italic">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                    <?php endif; ?> 

                    <div class="row b1 mt-4">
                        <div class="col-lg-2">
                            <label> Date </label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo date('d-M-y', time()); ?>" required>
                        </div>
                        
                        <div class="col-lg-2">
                            <label>Select Material Issue To..</label>
                            <select class="form-control mtype" id="mtype" name="mtype" required>
                                <option value="" disabled="true" selected="true">--Select Issue To--</option>
                                <option value="itomc"> Issue to Machine </option>
                                <option value="itope"> Issue to Person </option>
                                <option value="itode"> Issue to Department </option>
                            </select>
                        </div>
                        <div class="col-lg-2" >
                            <label>Issue By</label>
                            <select class="form-control issue_by" name="issue_by[]" required>
                                <option value="" disabled="true" selected="true">---select item---</option>
                                <option >Snehal</option>
                                <option >Manish</option>
                                <option >rajnish</option>
                            </select>
                        </div>
                        <div class="col-lg-1" >
                            <label></label>
                            <input type="button" class="btn btn-success form-control" value="Add Row" id="add_row">
                        </div>
                        <div class="col-lg-1">
                            <label></label>
                            <input type="submit" id="submit" name="submit" class="btn btn-primary form-control" value="Save">
                        </div>
                        <div class="col-lg-1">
                            <label></label>
                            <input type="button" class="btn btn-secondary form-control" id="issueButton" value="View">
                        </div>
                         <div class="col-lg-2">
                            <label></label>
                            <input type="button" class="btn btn-dark form-control master_add" value="Add Master">
                        </div>
                        <div class="col-lg-1">
                            <label></label>
                            <input type="button" class="btn btn-info form-control "  id="vmaster"  value="Edit">
                        </div>
                    </div><br><br>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width:80px">Sr</th>
                                    <th style="width:300px">Item category</th>
                                    <th style="width:250px">Item</th>
                                    <th style="width:150px">Qty</th>
                                    <th style="width:150px">Unit</th>
                                    <th style="width:150px">Stock</th>
                                    <th style="width:20px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>
                                    <td>1</td>
                                    <!--<td><input type="text" class="form-control item border-secondary" name="item[]" onFocus="SearchItem(this)" required><input type="hidden" class="i_code" name="i_code[]"></td> -->
                                    <td>
                                        <select  name="i_code[]" class="form-control item border-secondary i_code party_name" required>
                                            <option selected="true" disabled="true" value="">SELECT</option>
                                            <?php
                                            $sqlx="SELECT Distinct id,item FROM item_master where item is not NULL and isdelete = 0  order by item asc";
                                            $runx=sqlsrv_query($con,$sqlx);
                                            while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $rowx['id'];  ?>"><?php echo $rowx['item'];  ?></option>
                                            <?php }
                                            ?>
                                            </select><!-- <input type="hidden" class="i_code" name="i_code[]"> -->
                                        </td>
                                        <td>
                                            <select class="form-control subgrade border-secondary" name="subgrade[]">
                                                <option disabled="true">---select item---</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control qty border-secondary" name="qty[]" id="1qty" required>
                                        </td>
                                        <td>
                                            <select class="form-control unit border-secondary" style="height:39px" name="unit[]" required>
                                                <option>Nos</option>
                                                <option>Pair</option>
                                                <option>Pkt</option>
                                                <option>Roll</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control  border-secondary stock2" name="stock[]" id="stock" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><br>
                        <div class="row b2 shadow-lg rounded mt-4">
                            <div class="col-sm-6 input-group mb-3 w-50 aaaa bbbb mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">MC_Number</label>
                                <input type="text" name="mcno" id="mcno" class="form-control border-info mcno">
                            </div>
                            <div class="input-group mb-3 w-50 aaaa mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Person_Name</label>
                                <input type="text" name="person" id="person" class="form-control border-info person"><input type="hidden" name="emp_id[]" class="emp_id">
                            </div>
                            <div class="input-group mb-3 w-50 mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">DepartMent</label>
                                <input type="text" name="dpnt" id="dpnt" class="form-control border-info dpnt" required>
                            </div>
                            <div class="input-group mb-3 w-50 mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Remark</label>
                                <input type="text" name="remark" class="form-control border-info" id="remark">
                            </div>
                            <div class="input-group mb-3 w-50 mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Issued Category Type</label>
                                <select class="form-control type border-info" aria-label="Default select example" id="type" name="cat" required>
                                    <option value="" disabled="true" selected="true" class="bg-primary text-white" >--Select Category--</option>
                                    <option class="bg-secondary text-white">NEW</option>
                                    <option class="bg-secondary text-white">REPLACE</option>
                                </select>
                            </div>
                            <div class="input-group mb-3  w-50 oldps mt-2">
                                <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Old Part Status</label>
                                <select name="old_part_received" class="form-control border-info select_hide"aria-label="Default select example" >
                                    <option value="" disabled="true" selected="true" class="bg-primary text-white"  >--Select--</option>
                                    <option class="bg-secondary text-white hideit">REPAIR</option>
                                    <option class="bg-secondary text-white hideit">SCRAP</option>
                                    <option class="bg-secondary text-white hideit"> STOCK </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    
        <!----------------------------------------- view Modal ----------------------------------------->          
        <div class="modal fade" id="issueData" aria-labelledby="issueData" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header font-weight-bold">
                        <h4>View</h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="issueDataM">
                        <form id="formData">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sr_no</th>
                                        <th>Date</th>
                                        <th>Issue by</th>
                                        <th>Item category</th>
                                        <th>Item name</th>
                                        <th>Qnty</th>
                                        <th>Unit</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $qry = "SELECT a.sr_no,format(a.issue_date, 'dd-MMM-yyyy') as issue_date,a.issue_to,a.issue_by,a.qnty,a.unit,a.stock,b.item as item1,c.item from issue a left outer join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code inner join item_master c on a.item_category = c.id where flag = 2 order by a.sr_no desc";
                                        $runi = sqlsrv_query($con,$qry);
                                        while($rowi = sqlsrv_fetch_array($runi, SQLSRV_FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?php echo $rowi['sr_no']; ?></td>
                                        <td><?php echo $rowi['issue_date'];?></td>
                                        <td><?php echo $rowi['issue_by']; ?></td>
                                        <td><?php echo $rowi['item']; ?></td>
                                        <td><?php echo $rowi['item1']; ?></td>
                                        <td><?php echo $rowi['qnty']; ?></td>
                                        <td><?php echo $rowi['unit']; ?></td>
                                        <td><?php echo $rowi['stock']; ?></td>
                                        <td><button type="button" class="btn btn-primary py-1 px-1 edit_issue" id="<?php echo $rowi["sr_no"]; ?>">Edit</button></td>
                                    </tr>
                                    <?php } ?>
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

        <!-----------------------------------------   Edit Modal ----------------------------------------->
        <div class="modal fade" id="edit_data" aria-labelledby="edit_data" aria-hidden="true" tabindex="-1">
                
            <!----------------- Scrollable modal --------------------------->
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header font-weight-bold">
                        <h4>EDIT</h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="edit_modal">
                        <div id="edit">
                            <form action="update_issue_edit.php" id="fetchonmodal" method="POST" >
                                <table id="edit_table">
                                    
                                </table>
                                <!-- LOAD DATA FROM AJAX -->
                            </form>
                        </div>
                    </div>                                
                    <div class="modal-footer">
                        <button type="submit" name="save" class="btn btn-primary btn-md px-4" form="fetchonmodal">Save</button>
                    </div>
                </div>
            </div>
        </div>

     <!-----------------------------------------  ADD master Modal ----------------------------------------->
      <div class="modal fade " id="Add_master" aria-labelledby="Add_master" >
        <div class="modal-dialog modal-xl mod">
          <div class="modal-content mod1">
            <div class="modal-header font-weight-bold">
              <h4>ADD</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mod2" id="add">
              <div>
                <form id="form3" > 
                  <div class="row">
                    <div class="col-lg-9" >
                      <table >
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
                             <input type="text" name="emp_id" class="form-control border-info emp_id"  onFocus="getId2(this)" required>
                           
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
                              $query="SELECT iid,Sr_no,item FROM M_item";
                              $result = sqlsrv_query($con,$query);
                              while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                                 $abc = $row['Sr_no'];
                          ?>
                        <tr>
                          <td style="width:8%"><input type="text" class="form-control item" value="<?php echo $row['item'];?>" readonly><input type="hidden" name="Sr_no[]" class="Sr_no" value="<?php echo $row['iid'];?>"></td>
                          <td style="width:4%"><input type="number" step="0.01" name="qnty[]" class="form-control qnty" ></td>
                          <td>
                            <select  name="make[]" class="form-control make" >
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
                          <td style="width:9%"><input type="text" name="Sr_Number[]" class="form-control Sr_Number"  id="srnumber<?php echo $abc ?>" ></td>
                          <td style="width:10%"><input type="text" name="Mac_Add[]" id="Mac_Add<?php echo $abc ?>" class="form-control Mac_Add" placeholder="Enter ..." ></td>
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
                            <select name="AntiVirus[]" class="form-control AntiVirus" id="anti<?php echo $abc ?>" >
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
                <form action="issue_add_db.php" method="POST" id="addmaster">
                  <table >
                    <label>Master Type</label>
                        <td style="width:50%"><select name="master_add" id="master1" class="form-control master_add" >
                              <option selected="true" disabled="true" value="">SELECT</option>
                              <option value="M_Item/Item">M_Item</option>
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
                         </div>
                    </form>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" name="save" class="btn btn-primary px-4" form="addmaster">Save</button>
            </div>
          </div>
        </div>
      </div>
      <!----------------------------------------- END ADD add_master Modal ----------------------------------------->
      <!-----------------------------------------   view Modal ----------------------------------------->
<div class="modal fade" id="livedata" aria-labelledby="livedata" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-xl modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header font-weight-bold">
      <h4>View</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" id="livedata1">
      <form id="form_Data">
        <table>
          <thead>
            <tr>
              <th>SrNo</th>
              <th>UserID</th>
              <th>Username</th>
              <th>IP Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $srno = 1;
            $qry1 = "SELECT DISTINCT emp_id,p_name,IP_Address FROM issue where flag = 1";
            $run0 = sqlsrv_query($con,$qry1);
            while($row0 = sqlsrv_fetch_array($run0, SQLSRV_FETCH_ASSOC)){
            ?>
            <tr>
              <td><?php echo $srno ?></td>
              <td><input type="text" name="emp_id" class="form-control border-info emp_id" value="<?php echo $row0['emp_id']; ?>" required></td>
              <td><input type="text" value="<?php echo $row0['p_name']; ?>" class="form-control emp_name" name="emp_name" required></td>
              <td><input type="text" value="<?php echo $row0['IP_Address']; ?>"  class="form-control td1 ipaddress" name="ip_addrs" id="ip_add" placeholder="xxx.xxx.xxx.xxx" required></td>
              <td><button type="button" class="btn btn-primary py-1 px-1 edit_master"  id="<?php echo $row0["emp_id"]; ?>">Edit</button></td>
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
    <div class="modal-body mod2">
      
      <form id="fetchonmodal1" ><!--  method="POST" action="update_livestock_db.php"  -->
        
        <!-- LOAD DATA FROM AJAX -->
      </form>
    </div>
    
    <div class="modal-footer">
      <button type="button" name="save" class="btn btn-primary btn-md px-4" id="edit_save">Save</button>
    </div>
  </div>
</div>
</div>
     <!-----------------------------------------  ADD master Modal ----------------------------------------->
<!-- input mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://unpkg.com/imask"></script>

<script src='js/select2.min.js' type='text/javascript'></script>  
    <script type="text/javascript">
        $('#issue').addClass('active');

  // code for searchable dropdown
    $(document).ready(function() {
        $(".party_name").select2();
    });

   /*issue [MASTER ADD] event*/
   $(document).on('click', '.master_add', function(){
    $('#Add_master').modal('show');

   });

    /*IP adderess format*/
      $(document).ready(function(){
      $('#ip_addrs').inputmask({"mask": "999.999.999.999"});
      });
        
      $(document).ready(function(){
      $("#Manf_Year").mask("(9999)");
      });

       $(document).ready(function(){
      $('.Mac_Add').inputmask({"mask": '**:**:**:**:**:**'});
      });

     $(document).ready(function(){
     $('.phone').inputmask({"mask": "(999) 999-9999"});
     });


    $(document).ready(function(){
      $('#Add_master').modal({
          backdrop: 'static',
          keyboard: false  // to prevent closing with Esc button (if you want this too)
      })

         //screenSize srnumber mcadd
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
      $('#editmaster').modal({
          backdrop: 'static',
          keyboard: false  // to prevent closing with Esc button (if you want this too)
      })

         //blank column:::::
      /* $('#mod119').prop('readonly',true);
      $('#Mac_Add14,#Mac_Add16,#Mac_Add19').prop('readonly',true);
      $('#srnumber14,#srnumber16,#srnumber19').prop('readonly',true);
      $('#sSize11,#sSize13,#sSize14,#sSize15,#sSize19').html('');
      $('#ram113,#ram114,#ram115,#ram116,#ram119').html('');
      $('#ram213,#ram214,#ram215,#ram216,#ram219').html('');
      $('#hhd113,#hhd114,#hhd115,#hhd116,#hhd119').html('');
      $('#hhd213,#hhd214,#hhd215,#hhd216,#hhd219').html('');
      $('#hhd313,#hhd314,#hhd315,#hhd316,#hhd319').html('');
      $('#operating13,#operating14,#operating15,#operating16,#operating19').html('');
      $('#anti13,#anti14,#anti15,#anti16,#anti19').html('');*/
});


 $(document).on('click', '.edit_master', function(){
       var id = $(this).attr("id"); 
           $.ajax({
                url:"issue_master_edit.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    $('#fetchonmodal1').html(data);
                    $('#editmaster').modal('show');
                }
            });
   });

 $(document).on('click','#edit_save',function(){
        $.ajax({
          url: "update_issue_db.php",
          type: 'POST',
          data: $('#fetchonmodal1').serialize(),

          success: function( data ) {
            alert(data);
              //$('#Add_data').modal('hide');
          },
          complete: function () {
            location.reload();
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

        /*  $(document).on('click',"#submit",function(){
        alert();
        });*/
        // Start add row process
        var no = 1;
        $(document).on('click', '#add_row', function () {
        var x = $('#'+no+'qty').val();
            if (x == '') {
                alert('pls fill Current row');
            }
            else{
            no++;
            var rowLength = $('table').find('tbody tr').length;
            var rowHtml = '<tr row-id="' + (rowLength + 1) + '">';
                
                rowHtml += '<td>'+no+'</td>';
                /*rowHtml += '<td><input type="text" class="form-control item"  onFocus="SearchItem(this)"name="cat2[]"   placeholder="--category--"><input type="hidden" name="i_code[]" class="i_code"></td>';*/
                rowHtml += ' <td><select  name="i_code[]" class="form-control item border-secondary i_code party_name"  required><option selected="true" disabled="true" value="">SELECT</option><?php
                $sqlx="SELECT Distinct id,item FROM item_master where item is not NULL order by item asc";
                $runx=sqlsrv_query($con,$sqlx);
                while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $rowx['id'];  ?>"><?php echo $rowx['item'];  ?></option> <?php
                } ?>
                </select> </td>';
                rowHtml += '<td><select class="form-control subgrade" name="subgrade[]" required><option disabled="true">---select item---</option></select></td>';
                rowHtml += '<td><input type="text" class="form-control qty border-secondary" name="qty[]" id="'+no+'1qty" required></td>';
                rowHtml += '<td><select class="form-control unit border-secondary" name="unit[]" required ><option>Nos</option><option>Pair</option><option>Pkt </option><option>Roll </option></select></td>';
                rowHtml += '<td><input type="text" class="form-control  border-secondary stock2" name="stock[]" id="'+no+'stock"  readonly></td>';
                rowHtml += '<td align="center"><button type="button" name="delete" class="btn btn-danger btn-md mx-3 delete"><i class="fa fa-trash"></i> </button></td>';
            
                $('table').find('#tbody').append(rowHtml);
            }
        });


/* Add button click event*/
        $(document).on('click','.delete', function(){
            var i = $(this).attr("id");
             $(this).closest('tr').remove();
           $.ajax({
                url:"issue_add_delete.php",
                method:"POST",
                data:{i:i},
                success:function(data)
                {
                    alert(data);
                }
                });
          });


        /*issue Edit  button click event*/
     $(document).on('click', '.edit_issue', function(){

       var id = $(this).attr("id");  
           $.ajax({
                url:"issue_edit.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    $('#edit_table').html(data);
                    $('#edit_data').modal('show');
                }
            });
        });

        $(document).on('click','#issueButton',function(){
            $('#issueData').modal('show');
        });


        $(document).on('click','#vmaster',function(){
            $('#livedata').modal('show');
        });



       
            /*item issue auto completed*/
            function SearchItem(txtBoxRef) {
                console.log('function call');
                var f = true; //check if enter is detected
                $(txtBoxRef).keypress(function (e) {
                    if (e.keyCode == '13' || e.which == '13'){
                        f = false;
                    }
                });
                $(txtBoxRef).autocomplete({
                    source: function( request, response ) {
                        // Fetch data
                        $.ajax({
                            url: "store/getpoitem.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                            desc: request.term
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).closest('tr').find('.item').val(ui.item.label);
                        $(this).closest('tr').find('.i_code').val(ui.item.icode);
                        return false;
                    },
                    change: function (event, ui)  //if not selected from Suggestion
                    {
                        if (ui.item == null){
                            $(this).val('');
                            $(this).focus();
                        }
                    }
                });
            }
            /*qnty less then stock in issue */
            $("#1qty").focusout(function(){
                var x = $(this).val();
                var y = ($('#stock').val() == '') ? 0 : $('#stock').val();
                if(parseFloat(x) > parseFloat(y)){
                    alert("quntity not sufficiant..");
                    $(this).val('');
                    $(this).focus();
                }
            });

            /*hide and show */
            $(document).on('change','.type',function(){
                var a = $(this).val();
                if (a == 'NEW') {
                    $(".hideit").hide();
                }
                else {
                    $(".hideit").show();
                }
            });

            /*Select Material Issue To.. [select option] change filed*/
            $(document).on('change','.mtype',function(){
                var y=$(this).val();
                if (y=='itode') {
                    $(".aaaa").hide();
                    $("#mcno").prop('required',false);
                    $("#person").prop('required',false);
                }
                else if (y=='itope') {
                    $(".bbbb").hide();
                    $("#mcno").prop('required',false);
                    $("#person").prop('required',true);
                }
                else{
                    $(".aaaa").show();
                    $("#mcno").prop('required',true);
                }
            });

            /*------autocomplete textbox-----*/
            $( function() {
                // mc autocomplete box
                $( ".mcno" ).autocomplete({
                    source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url: "store/getmc.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            mc: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('.mcno').val(ui.item.label);
                    $('.person').val(ui.item.pname1);
                    $('.dpnt').val(ui.item.dname);
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

            // person autocomplete box
            $( ".person" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url: "store/getperson.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            person: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('.person').val(ui.item.label);
                    $('.dpnt').val(ui.item.dname);
                    $('.emp_id').val(ui.item.empid);
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

            // department autocomplete box
            $( ".dpnt" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url: "store/getdpnt.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            dpnt: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('.dpnt').val(ui.item.label);
                    $('.plant').val(ui.item.pname);
                    return false;
                },
                change: function (event, ui)  //if not selected from Suggestion
                {
                    if (ui.item == null){
                        $(this).val('');
                        $(this).focus();
                    }
                }
            });

/*issue item*/
            $(document).on('change','.item',function(){
                let $this=$(this);
                var x = $this.closest('tr').find('.i_code').val();
            
                $.ajax({
                    url: "store/getcategory.php",
                    type: 'post',
                    data: {cat:x},
                    success: function( data ) {
                        //console.log(data);
                        $this.closest('tr').find('.subgrade').html(data);
                    }
                });
            });
/*stock diaplay*/
            $(document).on('change','.subgrade',function(){
                let $this=$(this);
                var y = $(this).val();
                var x =$(this).closest('tr').find('.i_code').val();
            
                $.ajax({
                    url:"store/getstock.php",
                    type:'post',
                    data:{stock:y,cat:x},
                    success:function(data){
                        //console.log(data);
                        $this.closest('tr').find('.stock2').val(data);
                    }
                });
            
            });
        });

$(document).on('click', '#addSave', function(){
    let data = $('#addTable tr:gt(0)').map(function(){
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
              Sr_no: $(this).closest('tr').find('.Sr_no').val(),
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
                url: "issue_master_add.php",
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
   });
            
            </script>
        </body>
    </html>
    <?php
    include('footer.php')
    ?>