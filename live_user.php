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

    <style type="text/css">
        table{
              font-size: 100%!important;
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
              padding: 2px;
              height: 35px;  
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
        #table2 tr:nth-child(even) {
             background-color: #b5ced77a !important;
        }

        #a1{
            background-color: #bbc0c714;
        }
</style>
</head>
<body>
  <div class="container-fluid m-1 mt-4 ">
    <div class="container-fluid">
      <div class="p-0 bg-secondary text-center text-warning">
          <h2>Live User</h2>
      </div> 
    <div class="row m-1 mt-3">
    <table  id="table2">
        <thead>
          <tr>
            <th>Category</th>
            <th>issue</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
              <?php
              include('dbcon2.php');
              include('dbcon.php');
                /*flag use to transfer[a.sr_no]*/
                $query="SELECT * FROM item_master where isdelete = 0 order by item";
                $result = sqlsrv_query($con,$query);
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){

                  $sql2 = "SELECT SUM(qnty) as count FROM issue where item_category = '".$row['id']."' and status='use'";
                  $run = sqlsrv_query($con,$sql2);
                  $row2 =sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
              ?>
            <tr>
               <td class="item"><?php echo $row['item'];?></td>  <!-- modal heder item display[class="item"]-->
               <td><?php echo $row2['count'];?></td>
               <td class="sto">
                  <button type="button" class="btn btn-primary py-1 px-3 mx-1 view" id="<?php echo $row['id']; ?>">view</button></td>
            </tr>
               <?php } ?>   
        </tbody>
      </table>
    </div>
  </div>
  <!-----------------------------------------  live_stock Modal ----------------------------------------->
    <div class="modal fade " id="user_data" aria-labelledby="user_data" aria-hidden="true" tabindex="-1">
            
        <!----------------- Scrollable modal --------------------------->
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header font-weight-bold">
<!--view modal unique--> <h4><strong id="viewdata" class="mx-2 primary"></strong></h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"  id="a1">
                      <div>
                        <form>
                            <table id="user_table">
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

<!-----------------------------------------  Live_User Modal ----------------------------------------->
    <div class="modal fade-none " id="use_data" aria-labelledby="use_data" aria-hidden="true" tabindex="-1">
            
        <!----------------- Scrollable modal --------------------------->
        <div class="modal-dialog modal-none modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header font-weight-bold">
                   <h4></h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="a1" >
                    <div>
                        <form action="get_liveuser.php" method="POST" id="liveUserModal">
                          <table>
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>type</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="date" class="form-control" name="date" required> 
                                <td><select  name="stock" class="form-control type2" id="type2"  required>
                                          <option value="" disabled="true" selected="true">----Select----</option>
                                          <option value="stock">stock</option>
                                          <option value="scrap">scrap</option>
                                          <option value="transfer">Transfer</option>
                                    </select>
                                         <input type="hidden" name="srno" id="sr_no">
                                         <input type="hidden" name="emp_id" id="emp_id2">
                                         <input type="hidden" name="mtype" id="mtype2">
                                         <input type="hidden" name="mcno" id="mcno12">
                                         <input type="hidden" name="person" id="person2">
                                         <input type="hidden" name="dpnt" id="depart2">
                                         <input type="hidden" name="remark" id="remark2">
                                         <input type="hidden" name="cat" id="types2">
                                         <input type="hidden" name="old_part_received" id="slect2">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                              <input type="submit" name="submit" class="btn btn-primary px-4 m-2 float-end" value="Save">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>
        </div>
    </div>
      <!----------------------------------------- Live_User Modal -----------------------------------------> 
     <!----------------------------------------- UPDATE Modal ----------------------------------------->
    <div class="modal fade " id="u_data" aria-labelledby="u_data" aria-hidden="true" tabindex="-1" data-keyboard="false">
            
     <!----------------- Scrollable modal --------------------------->
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header font-weight-bold">
              <h4>user_data</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="a1">
            <div>
              <form id="data" method="POST">
                  <div class="row">
                      <div class="col-lg-5">
                          <label>Select Material Issue To..</label>
                          <select class="form-control  border-info mtype mtype1" id="mtype1" name="mtype" required>
                              <option value="itomc"> Issue to Machine </option>
                              <option value="itope"> Issue to Person </option>
                              <option value="itode"> Issue to Department </option>
                         </select>
                      </div>   
                  </div><br><br>
                  <div class="row">
                      <div class="col-sm-6 input-group mb-2 w-50 aaaa bbbb">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">MC_Number</label>
                            <input type="text" id="mcno1" onFocus="Searchmc(this)" class="form-control border-info mcno ">
                      </div>
                      <div class="input-group mb-2 w-50 aaaa">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Person_Name</label>
                            <input type="text"  id="person1" onFocus="Searchperson(this)"  class="form-control border-info person person1"><input type="hidden" name="emp_id[]"  id="emp_id" class="emp_id">
                      </div>
                      <div class="input-group mb-2 w-50">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">DepartMent</label>
                            <input type="text"  id="dpnt1"  onFocus="Searchdpmnt(this)" class="form-control border-info dpnt dpnt1" required>
                      </div>   
                      <div class="input-group mb-2 w-50">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Remark</label>
                            <input type="text" class="form-control border-info remark remark1" id="remark1">
                      </div>
                      <div class="input-group mb-2 w-50">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Issued Category Type</label>
                            <select class="form-control type border-info type3 type1" aria-label="Default select example" id="type1"  required>
                                    <option disabled="true" selected class="bg-primary text-white" >--Select Category--</option>
                                    <option class="bg-secondary text-white" value="new">NEW</option>
                                    <option class="bg-secondary text-white" value="replace">REPLACE</option>
                            </select>
                      </div>
                      <div class="input-group mb-2  w-50 oldps">
                            <label class="form-control bg-secondary text-white fw-bold text-center mx-2">Old Part Status</label>
                            <select  class="form-control border-info select_hide slect slect1" aria-label="Default select example" id="slect1">
                                    <option selected class="bg-primary text-white" disabled="true">--Select--</option>
                                    <option class="bg-secondary text-white hii">REPAIR</option>
                                    <option class="bg-secondary text-white hii">SCRAP</option>
                                    <option class="bg-secondary text-white hii"> STOCK </option>
                            </select>
                      </div>
                    </div>
                </form>
            </div>
        </div>
          <div class="modal-footer">
              <button type="button" name="submit"  class="btn btn-primary px-4 update">Update</button>
          </div>
        </div>
      </div>
    </div>
      <!----------------------------------------- END UPDATE Modal -----------------------------------------> 

<script type="text/javascript">
  $('#user').addClass('active');

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
          ]
      });
      
   });

  $(document).on('click', '.view', function(){
        var id = $(this).attr("id");
        $('#sto').text($(this))
         $('#viewdata').text($(this).closest('tr').find('.item').text());
          $.ajax({
                  url:"get_user_db.php",
                  method:"POST",
                  data:{id:id},
                  success:function(data)
                  {
                      $('#user_table').html(data);
                      $('#user_data').modal('show');
                  }
            });
   });

/*mc1 option select compalsary*/
  $('#liveUserModal').submit(function(){
        var type = $('#type2').val();
        var ito = $('#mtype2').val(); 
        var mc = $('#mcno12').val();
        var per = $('#person2').val();
        var dpnt = $('#depart2').val();

    if(type == 'transfer'){
    if((ito == 'itomc' || ito == '') && mc == ''){
      alert('Machine is Missing');
         $('#u_data').modal('show');
      return false;

    }else if(ito == 'itope' && per == ''){
      alert('Person is Missing');
         $('#u_data').modal('show');
      return false;

    }else if(ito == 'itode' && dpnt == ''){
      alert('Department is Missing');
         $('#u_data').modal('show');
      return false;
     }
    }
  });


  /*view live_user modal*/
  $(document).on('click', '.action', function(){     /*get_user_db.php [class]*/
      $('#sr_no').val($(this).attr('id'));
      $('#use_data').modal('show');
  });
 
 
  $(document).on('change','.type2',function(){
      var y=$(this).val();
      var id=$(this).attr('id');

      if (y =='transfer') {
          $('#hello').val(id);
          $('#u_data').modal('show');
      }
  });

  $(document).on('change','.type2',function(){
      var y=$(this).val();
      var id=$(this).attr('id');

      if (y =='scrap') {
         $('#hello').val(id);
         $('#u_data').modal('show');
    }
  });

  //UPDATE
  $(document).on('click','.update',function(){
        var q = $("#emp_id").val();
        var a = $("#mtype1").val();
        var b = $("#mcno1").val();
        var c = $("#person1").val()
        var x = $("#dpnt1").val();
        var y = $("#remark1").val();
        var z = $("#type1").val();
        var p = $("#slect1").val();

        $("#emp_id2").val(q);
        $("#mtype2").val(a);
        $("#mcno12").val(b);
        $("#person2").val(c);
        $("#depart2").val(x);
        $("#remark2").val(y);
        $("#types2").val(z);
        $("#slect2").val(p);
        $('#u_data').modal('hide');
        });

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
  $(document).on('change','#mtype1',function(){
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

  /*------[MC]  autocomplete textbox-----*/
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
        if (ui.item == null)
           {
              $(this).val('');
              $(this).focus();
           }
          else{      
          }    
      }
    });
  }


/*------ [PERSON] autocomplete textbox-----*/
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
           $('.emp_id').val(ui.item.empid);
           return false;
      },
      change: function (event, ui)  //if not selected from Suggestion
      {
        if (ui.item == null)
         {
             $(this).val('');
             $(this).focus();
         }
         else{
             
         }
      }
    });
  }

 /*------[DEPARMENT] autocomplete textbox-----*/
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
          if (ui.item == null)
          {
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
