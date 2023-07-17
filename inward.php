<?php
include('header.php');
include("dbcon.php");
include('dbcon2.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
        background-color: #fffff;
        width: 90px !important;
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
        #th{
        width: 20% !important;
        }
        #th1{
        width: 18% !important;
        }
        #th2{
        width: 15% !important;
        }
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
        .check_box11 {
        width: 12px;
        height: 210px;
        margin: auto !important;
        }
        /*  autocomplete */
        .ui-autocomplete {
        font-family: serif !important;
        font-size: 15px !important;
        max-height: 150px;
        max-width: 280px;
        overflow-y: auto;*/
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        background-color: #66d9ff !important;
        border-radius: 10px;
        z-index: 21500 !important;
        }
        .ADD{
        background-color: #84bfe0 !important;
        }
        #inward_table{
        background-color: white;
        border: 1px solid black;
        width: 100%;
        }
        /*inward dropdown searching*/
        .select2-container--default .select2-results>.select2-results__options{
        background-color:white;
        }
        .select2-container--open .select2-dropdown--below{
        background-color:white;
        }
        .select2-container {
        min-width: 100%;
        }
        .select2-container .select2-selection--single{
        height:34px !important;
        }
        .select2-container--default .select2-selection--single{
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
        }
        .color{
        background-color: #dac3de !important;
        }
        .color input{
        background-color: transparent;
        }
        ::-webkit-textfield-decoration-container { }
        ::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }
        
        </style>
    </head>
    <body>
        <div class="container-fluid m-1 mt-3">
            <div class="p-0 bg-secondary text-center text-warning">
                <h2>Inward</h2>
            </div>
            <form action="get_inward_db.php" id="form" method="POST">
                <div>
                    <button type="submit" name="cancle" class="btn btn-danger float-end m-1 cancle"  id="cancel">Remove</button>
                    <button type="submit" name="submit" class="btn btn-primary px-4 float-end m-1" id="save">Save</button>
                </div>
                <!------------------ main page table ------------->
                <table id="inward_table" >
                    <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Date</th>
                            <th id="th2">Categary</th>
                            <th id="th1">Party_Name</th>
                            <th id="th">Item</th>
                            <th>Qnty</th>
                            <th>Rate</th>
                            <th id="th2">Sub Grade</th>
                            <th id="check1"><input type="checkbox" id="selectAll" class="check"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT Distinct b.receive_date,b.mat_from_party,a.id,a.p_item,a.rec_qnty,a.pur_rate,c.i_code,c.item,d.sub_grade,e.party_name,e.pid from inward_ind a inner join inward_com b on a.sr_no = b.sr_no inner join rm_item c on a.p_item = c.i_code inner join rm_s_grade d on d.s_code = c.s_code inner join rm_party_master e on  b.mat_from_party = e.pid  where (c.m_code = '143' or (c.m_code = '138' AND c.s_code = '866') ) and a.id not in(SELECT inw_id from [IT_Stock].[dbo].[Inward]) order by b.receive_date desc";                        /*and b.receive_date >= '2021-07-01' */
                        /* SELECT b.receive_date,b.mat_from_party,a.id,a.p_item,a.rec_qnty,a.pur_rate,c.item,d.sub_grade from inward_ind a inner join inward_com b on a.sr_no = b.sr_no inner join rm_item c on a.p_item = c.i_code inner join rm_s_grade d on d.s_code = c.s_code where c.m_code = '143' and b.receive_date >= '2021-08-01' and a.id not in(SELECT inw_id from [IT_Stock].[dbo].[Inward]) ";*/
                        $run = sqlsrv_query($conn,$sql);
                        while($row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
                        ?>
                        <tr id="<?php echo $row['p_item'] ?>">
                            <td><input type="text" name="id[]" value="<?php echo $row['id'] ?>" readonly></td>
                            <td><input type="text" name="date[]" value="<?php echo $row['receive_date']->format("d-M-y") ?>" readonly></td>
                            <!--  <td><input type="text" name="cat[]" class="cat" onFocus="SearchID(this)" placeholder="--category--"><input type="hidden" name="icode[]" class="icode"></td> -->
                            <td><select  class="cat party_name">
                                <option selected="true" disabled="true" value=".">SELECT</option> <!-- value="." -->
                                <?php
                                $sqlx="SELECT Distinct id,item FROM item_master where item is not NULL and isdelete = 0 order by item asc";
                                $runx=sqlsrv_query($con,$sqlx);
                                while ($rowx = sqlsrv_fetch_array($runx, SQLSRV_FETCH_ASSOC)) { ?>
                                <option value="<?php echo $rowx['id'];  ?>"><?php echo $rowx['item'];  ?></option>
                                <?php } ?>
                                </select><input type="hidden" name="icode[]" class="icode">
                            </td>
                            <td data-search="<?php echo $row['party_name'] ?>"><input type="text" value="<?php echo $row['party_name'] ?>" readonly><input type="hidden" name="p_name[]"  value="<?php echo $row['pid'] ?>"></td>
                            <td data-search="<?php echo $row['item'] ?>"><input type="text" value="<?php echo $row['item'] ?>" class="item" ><input type="hidden" name="item[]" class="rm_icode" value="<?php echo $row['i_code'] ?>"></td>
                            <td><input type="text" name="qnty[]" value="<?php echo $row['rec_qnty'] ?>" readonly></td>
                            <td><input type="text" name="rate[]" value="<?php echo $row['pur_rate'] ?>" readonly></td>
                            <td data-search="<?php echo $row['sub_grade'] ?>"><input type="text" value="<?php echo $row['sub_grade'] ?>" readonly><input type="hidden" name="party[]" value="<?php echo $row['mat_from_party'] ?>"></td>
                            <td ><input type="checkbox" name="check_box[]" value="<?php echo $row['p_item'] ?>" class="check_box check"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <!-----------------------------------------  ADD inward Modal ----------------------------------------->
        <div class="modal fade " id="Add_data" aria-labelledby="Add_data" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header font-weight-bold">
                        <h4>ADD</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="a1"  >
                        <div>
                            <form action="addinward_db.php" id="form2"   method="POST" enctype="multipart/form-data">
                                <div class="container-fluid">
                                    <div class="col-lg-2" >
                                        <label></label>
                                        <input type="button" class="btn btn-success form-control" value="Add Row" id="add_new">
                                    </div>
                                </div><br>
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width:150px">Date</th>
                                                <th style="width:250px">Categary</th>
                                                <th style="width:300px">Item</th>
                                                <th style="width:150px">Qnty</th>
                                                <th style="width:150px">Rate</th>
                                                <th style="width:150px">Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody2">
                                            <tr>
                                                <td><input type="date" class="form-control" name="date[]"  required></td>
                                                <!--  <td><input type="text" class="form-control cat2" onFocus="getId(this)" name="cat2[]" placeholder="--category--" required><input type="hidden" name="code[]" class="code"></td> -->
                                                <td>
                                                    <select  name="code[]" class="partyname" required>
                                                        <option selected="true" disabled="true" value="">SELECT</option>
                                                        <?php
                                                        $sql1="SELECT Distinct id,item FROM item_master where item is not NULL and isdelete = 0 order by item asc";
                                                        $run1=sqlsrv_query($con,$sql1);
                                                        while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $row1['id'];  ?>"><?php echo $row1['item'];  ?></option>
                                                        <?php } ?>
                                                        </select><!-- <input type="hidden" name="code[]" class="code"> -->
                                                    </td>
                                                    <td><input type="text" class="form-control item2"  name="item2[]" onFocus="getId2(this)" placeholder="--item--" required><input type="hidden" class="r_icode" name="r_icode[]"></td>
                                                    
                                                    <td><input type="number" class="form-control qnty " name="qnty[]" id=1qnty required></td>
                                                    <td><input type="text" class="form-control " name="Rate[]"></td>
                                                    <td>
                                                        <select name="stock[]" class="form-control type2" id="1" required>
                                                            <option value="stock">stock</option>
                                                            <option value="scrap">scrap</option>
                                                            <option value="use">use</option>
                                                        </select>
                                                <!-- value current page store -->
                                                        <input type="hidden" name="mtype[]" id="1mtype2">
                                                        <input type="hidden" name="mcno[]" id="1mcno2">
                                                        <input type="hidden" name="person[]" id="1person2">
                                                        <input type="hidden" name="dpnt[]" id="1depart2">
                                                        <input type="hidden" name="remark[]" id="1remark2">
                                                        <input type="hidden" name="cat[]" id="1types2">
                                                        <input type="hidden" name="old_part_received[]" id="1slect2">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary px-4" form="form2">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------------- END ADD Modal ----------------------------------------->
            <!----------------------------------------- UPDATE inward Modal ----------------------------------------->
            <div class="modal fade " id="Add_stock" aria-labelledby="Add_stock" aria-hidden="true" tabindex="-1" data-keyboard="false">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header font-weight-bold">
                            <h4>ADD</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body childmodal child" id="a1" >
                            <!--  load daynamacally -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="submit" id="" class="btn btn-primary px-4 update" form="form3">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------------- END UPDATE Modal ----------------------------------------->
            <script src='js/select2.min.js' type='text/javascript'></script>
            <script type="text/javascript">
            $('#inward').addClass('active');
            // code for searchable dropdown
            $(document).ready(function() {
            $(".party_name").select2();
            });
            $(document).ready(function() {
            $(".party").select2({
            dropdownParent: $("#Add_data")
            });
            });
            $(document).ready(function() {
            $(".partyname").select2({
            dropdownParent: $("#Add_data")
            });
            });
            
            // Code for Pagination
            $(document).ready(function(){
            var table = $('#inward_table').DataTable({
            "processing": true,
            dom: 'Bfrtip',
            ordering: false,
            destroy:true,
            
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
            ]
            });
            
            });

            $(document).on('change','.party_name',function(){
            $(this).closest('tr').addClass('color');
            });

            /*inward checkbox select all row*/
            $('#selectAll').click(function(e){
            $(this).toggleClass('clicked');
            $(this).closest('table').find('input[type="checkbox"]').prop('checked', $(this).hasClass('clicked'))
            });
            
            /*category select mendatory*/
            $(document).on('click','.check_box',function(){
            if (this.checked) {
            $(this).closest('tr').find('.cat').prop('required',true);
            }
            else{
            $(this).closest('tr').find('.cat').prop('required',false);
            }
            });

            /* select checkbox [get hidden item icode] */
            $(document).on('click','.check_box',function(){
            var x = $(this).val();
            if($(this).prop("checked")){
            $(this).closest('tr').find('.rm_icode').val(x);
            //$(this).closest('tr').find('.upload').attr('required',true);
            }
            else{
            $(this).closest('tr').find('.rm_icode').val('');
            }
            });
            
            /* code for delete and save the main page table  */
            $('#save,#cancel').click(function(){
            if(confirm("Are you sure you want to Save this?")){
            var id = [];
            $('.check_box:checked').each(function(i){
            id[i] = $(this).val();
            });
            if(id.length === 0){
            alert("Please Check at least one checkbox");
            return false;
            }
            }
            else{
            return false;
            }
            });

            /*inward i_code */
        /*    $(document).on('change','.cat',function(){
            $(this).closest('tr').find('.icode').val($(this).val());
            });*/

            // Start add row process  Inward
            var abc = 1;
            $(document).on('click', '#add_new', function () {
            var y = $('#'+abc+'qnty').val();
            if (y == '') {
            alert('pls fill Current row');
            }
            else{
            abc++;
            var rowLength = $('table').find('tbody2 tr').length;
            var rowHtml = '<tr row-id="' + (rowLength + 1) + '">';
                rowHtml += '<td><input type="date" class="form-control" name="date[]" required></td>';
                /*   rowHtml += '<td><input type="text" class="form-control cat2" onFocus="getId(this)" name="cat2[]"   placeholder="--category--"><input type="hidden" name="code[]" class="code"></td>';*/
                rowHtml += '<td><select  name="code[]" class="form-control party_name" required> <option selected="true" disabled="true" value="">SELECT</option><?php
                $sql1="SELECT Distinct id,item FROM item_master where item is not NULL order by item asc";
                $run1=sqlsrv_query($con,$sql1);
                while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row1['id'];  ?>"><?php echo $row1['item'];  ?></option> <?php
                } ?>
            </select> </td>';
            rowHtml += '<td><input type="text" class="form-control item2"  name="item2[]" onFocus="getId2(this)" placeholder="--item--"><input type="hidden" class="r_icode" name="r_icode[]"></td>';
            
            rowHtml += '<td><input type="text" class="form-control qnty" name="qnty[]" id="'+abc+'qnty" required></td>';
            rowHtml += '<td><input type="text" class="form-control " name="Rate[]" ></td>';
            rowHtml += '<td><select name="stock[]" class="form-control type2" id="'+abc+'" required><option value="stock">stock</option><option value="scrap">scrap</option><option  value="use">use</option></select> <input type="hidden" name="mtype[]" id="'+abc+'mtype2"><input type="hidden" name="mcno[]" id="'+abc+'mcno2"><input type="hidden" name="person[]" id="'+abc+'person2"><input type="hidden" name="dpnt[]" id="'+abc+'depart2"><input type="hidden" name="remark[]" id="'+abc+'remark2"><input type="hidden" name="cat[]" id="'+abc+'types2"><input type="hidden" name="old_part_received[]" id="'+abc+'slect2"></td>';
            $('table').find('#tbody2').append(rowHtml);
            }
            });
            
            /*ADD modal select use*/
            $(document).on('change','.type2',function(){
            var y=$(this).val();
            var id=$(this).attr('id');
            var pqr=' <div><form action="addinward_db.php"  method="POST" id="form3"><div class="row"><div class="col-lg-5"><input type="hidden" value="" id="hello"><label>Select Material Issue To..</label><select class="form-control border-info mtype mtype1" id="mtype1"  required><option disabled="true">--Select Issue To--</option><option value="itomc"> Issue to Machine </option><option value="itope"> Issue to Person </option><option value="itode" > Issue to Department </option></select></div></div><br><br><div class="row"><div class="col-sm-6 input-group mb-2 w-50 aaaa bbbb">';
            pqr += '<label class="form-control bg-secondary text-white fw-bold text-center mx-2">MC_Number</label><input type="text" onFocus="Searchmc(this)" id="mcno1"  class="form-control border-info mcno mcno1"></div><div class="input-group mb-2 w-50 aaaa">';
            pqr += '<label class="form-control bg-secondary text-white fw-bold text-center mx-2">Person_Name</label><input type="text" onFocus="Searchperson(this)"  id="person1" class="form-control border-info person person1"></div><div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">DepartMent</label><input type="text"  onFocus="Searchdpmnt(this)" id="dpnt1" class="form-control border-info dpnt dpnt1"> </div><div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Remark</label><input type="text" class="form-control border-info remark remark1" id="remark1"></div>';
            pqr += '<div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Issued Category Type</label><select class="form-control type border-info type3" aria-label="Default select example" id="type3" required><option disabled="true" selected class="bg-primary text-white" >--Select Category--</option><option class="bg-secondary text-white" value="new">NEW</option><option class="bg-secondary text-white" value="replace">REPLACE</option></select></div><div class="input-group mb-2  w-50 oldps"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Old Part Status</label><select  class="form-control border-info select_hide slect slect1" aria-label="Default select example" id="slect1" ><option selected class="bg-primary text-white" disabled="true">--Select--</option><option class="bg-secondary text-white hii">REPAIR</option><option class="bg-secondary text-white hii">SCRAP</option><option class="bg-secondary text-white hii">STOCK</option></select></div></div></form></div>';
            if (y =='use') {
            $('.childmodal').html(pqr);
            $('#hello').val(id);
            $('#Add_stock').modal('show');
            }
            });

            /*Inward Add [select  scrap] modal open */
            $(document).on('change','.type2',function(){
            var y=$(this).val();
            var id=$(this).attr('id');
            
            var pqr=' <div><form action="addinward_db.php"  method="POST" id="form3"><div class="row"><div class="col-lg-5"><input type="hidden" value="" id="hello"><label>Select Material Issue To..</label><select class="form-control border-info mtype mtype1" id="mtype1"  required><option disabled="true">--Select Issue To--</option><option value="itomc"> Issue to Machine </option><option value="itope"> Issue to Person </option><option value="itode" > Issue to Department </option></select></div></div><br><br><div class="row"><div class="col-sm-6 input-group mb-2 w-50 aaaa bbbb">';
            pqr += '<label class="form-control bg-secondary text-white fw-bold text-center mx-2">MC_Number</label><input type="text" onFocus="Searchmc(this)" id="mcno1"  class="form-control border-info mcno mcno1"></div><div class="input-group mb-2 w-50 aaaa">';
            pqr += '<label class="form-control bg-secondary text-white fw-bold text-center mx-2">Person_Name</label><input type="text" onFocus="Searchperson(this)"  id="person1" class="form-control border-info person person1"></div><div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">DepartMent</label><input type="text"  onFocus="Searchdpmnt(this)" id="dpnt1" class="form-control border-info dpnt dpnt1"> </div><div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Remark</label><input type="text" class="form-control border-info remark remark1" id="remark1"></div>';
            pqr += '<div class="input-group mb-2 w-50"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Issued Category Type</label><select class="form-control type border-info type3" aria-label="Default select example" id="type3" required><option disabled="true" selected class="bg-primary text-white" >--Select Category--</option><option class="bg-secondary text-white" value="new">NEW</option><option class="bg-secondary text-white" value="replace">REPLACE</option></select></div><div class="input-group mb-2  w-50 oldps"><label class="form-control bg-secondary text-white fw-bold text-center mx-2">Old Part Status</label><select  class="form-control border-info select_hide slect slect1" aria-label="Default select example" id="slect1" ><option selected class="bg-primary text-white" disabled="true">--Select--</option><option class="bg-secondary text-white hii">REPAIR</option><option class="bg-secondary text-white hii">SCRAP</option><option class="bg-secondary text-white hii">STOCK</option></select></div></div></form></div>';
            if (y =='scrap') {
            $('.childmodal').html(pqr);
            $('#hello').val(id);
            $('#Add_stock').modal('show');
            }
            });

            /*ADD modal hide and show */
            $(document).on('change','.type3',function(){
            var a = $(this).val();
            if (a == 'new') {
            $(".hii").hide();
            }
            else {
            $(".hii").show();
            }
            });

            /*Select Material Issue To.. [select option] change filed*/
            $(document).on('change','.mtype',function(){
            var y=$(this).val();
            if (y=='itode') {
            $(".aaaa").hide();
            }
            else if (y=='itope') {
            $(".bbbb").hide();
            }
            else{
            $(".aaaa").show();
            }
            });

            //UPDATE
            $(document).on('click','.update',function(){
            var s = $("#hello").val();
            var a = $("#mtype1").val();
            var b = $("#mcno1").val();
            var c = $("#person1").val()
            var x = $("#dpnt1").val();
            var y = $("#remark1").val();
            var z = $("#type3").val();
            var p = $("#slect1").val();
            $("#"+s+"mtype2").val(a);
            $("#"+s+"mcno2").val(b);
            $("#"+s+"person2").val(c);
            $("#"+s+"depart2").val(x);
            $("#"+s+"remark2").val(y);
            $("#"+s+"types2").val(z);
            $("#"+s+"slect2").val(p);
            $('#Add_stock').modal('hide');
            });

            /*ADD modal hide and show */
            $(document).on('change','.type3',function(){
            var a = $(this).val();
            if (a == 'new') {
            $(".hii").hide();
            }
            else {
            $(".hii").show();
            }
            });

            /*Select Material Issue To.. [select option] change filed*/
            $(document).on('change','.mtype',function(){
            var y=$(this).val();
            if (y=='itode') {
            $(".aaaa").hide();
            }
            else if (y=='itope') {
            $(".bbbb").hide();
            }
            else{
            $(".aaaa").show();
            }
            });

            //UPDATE
            $(document).on('click','.update',function(){
            var s = $("#hello").val();
            var a = $("#mtype1").val();
            var b = $("#mcno1").val();
            var c = $("#person1").val()
            var x = $("#dpnt1").val();
            var y = $("#remark1").val();
            var z = $("#type3").val();
            var p = $("#slect1").val();
            
            $("#"+s+"mtype2").val(a);
            $("#"+s+"mcno2").val(b);
            $("#"+s+"person2").val(c);
            $("#"+s+"depart2").val(x);
            $("#"+s+"remark2").val(y);
            $("#"+s+"types2").val(z);
            $("#"+s+"slect2").val(p);
            $('#Add_stock').modal('hide');
            });

            /*------ ADD222 INWARD autocomplete textbox-----*/
            function getId2(txtBoxRef) {
            //console.log('function call');
            var f = true; //check if enter is detected
            $(txtBoxRef).keypress(function (e) {
            if (e.keyCode == '13' || e.which == '13')
            {
            f = false;
            }
            });
            $(txtBoxRef).autocomplete({
            source: function( request, response ) {
            // Fetch data
            $.ajax({
            url: "add2item.php",
            type: 'post',
            dataType: "json",
            data: {
            item: request.term
            },
            success: function( data ) {
            response( data );
            console.log(data);
            }
            });
            },
            select: function (event, ui) {
            $(this).closest('tr').find('.item2').val(ui.item.label);
            $(this).closest('tr').find('.r_icode').val(ui.item.id);
            return false;
            },
            change: function (event, ui)  //if not selected from Suggestion
            {
            if (f){
            if (ui.item == null){
            $(this).val('');
            $(this).focus();
            }
            
            }
            }
            });
            }

            /*------[MC] ADD INWARD autocomplete textbox-----*/
            function Searchmc(txtBoxRef) {
            //console.log('function call');
            var f = true; //check if enter is detected
            $(txtBoxRef).keypress(function (e) {
            if (e.keyCode == '13' || e.which == '13')
            {
            f = false;
            }
            });
            $(txtBoxRef).autocomplete({
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
            }
            
            /*------ [PERSON]ADD INWARD autocomplete textbox-----*/
            function Searchperson(txtBoxRef) {
            //console.log('function call');
            var f = true; //check if enter is detected
            $(txtBoxRef).keypress(function (e) {
            if (e.keyCode == '13' || e.which == '13')
            {
            f = false;
            }
            });
            $(txtBoxRef).autocomplete({
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
            }
            
            /*------[DEPARMENT] ADD INWARD autocomplete textbox-----*/
            function Searchdpmnt(txtBoxRef) {
            //console.log('function call');
            var f = true; //check if enter is detected
            $(txtBoxRef).keypress(function (e) {
            if (e.keyCode == '13' || e.which == '13')
            {
            f = false;
            }
            });
            $(txtBoxRef).autocomplete({
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
            }
            </script>
        </body>
    </html>
    <?php
    include('footer.php')
    ?>