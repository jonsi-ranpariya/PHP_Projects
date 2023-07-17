<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Legal Calender</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
      <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
    /* right:'month,agendaWeek,agendaDay'*/
     right:'today'
    },
    events: 'l_load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
        $("#duedate").val(start);
        lldate(start);
        $('#eModal').modal('show');

    },
    eventClick:function(event)
    {
    var id = event.id;
    $.ajax({
        url:"update_legal.php",
        type:"POST",
        data:{id:id},
      success:function(data)
      {
        $('#editform').html(data);
        $('#editM').modal('show');
      }
      });
      },
   });
  }); 
  /*legal reresh current page*/
      $(document).on('click','#legal',function(){
        $.ajax({
          url:"legal_db.php",
          method:"POST",
          data:$('#form2').serialize(),
          success:function(data){
          alert(data);
        },
          complete:function(){
          $('#eModal').modal('hide');
          calendar.fullCalendar('refetchEvents');
         }
        });
        });

/*legal upload docs*/
    $(document).on("click",".luploadImg",function(){
    let url = 'legal_Doc/'+$(this).attr("id");
    newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
    if (window.focus) {newwindow.focus()}
    return false;
    });

/*legal load duedate to compant_duedate*/
    $(document).on('change','#duedate',function(){
    var newdate = $(this).val();
    lldate(newdate);          /*function call*/
    });

    function lldate(newdate){    /*function call*/

    var dt = new Date(newdate);
    dt.setDate(dt.getDate() - 3);

    /*Display date format*/
    var dd = dt.getDate();
    var mm = dt.getMonth() +1;
    var y = dt.getFullYear();
    if(dd<10)
    {
    dd='0'+dd;
    }
    if(mm<10)
    {
    mm='0'+mm;
    }
    var someFormatteduedate =  y + '-' + mm + '-' + dd;
    $('#ccdate').val(someFormatteduedate);
    
   }

/*view upload file new window*/
        function popitup(url) {
          newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
          if (window.focus) {newwindow.focus()}
          return false;
        }

/*click pre & next to load month wise file*/
      $(document).ready(function(){
          $('.fc-button-group').click(function() {
            var date = $("#calendar").fullCalendar('getDate');
            var dt = new Date(date);
            var month = dt.getMonth();
            var year = dt.getFullYear();
        
            $.ajax({
              url: "l_getfile.php",
              type: 'post',
              data:{month:month,year:year},
              success: function (data) {
                  $('#Fileadd').html(data);

              }
            });
          });
      });

 function myFunction() {
     var date = $("#calendar").fullCalendar('getDate');
            var dt = new Date(date);
            var month = dt.getMonth();
            var year = dt.getFullYear();
            //alert(year);
            $.ajax({
              url: "l_getfile.php",
              type: 'post',
              data:{month:month,year:year},
              success: function (data) {
                  $('#Fileadd').html(data);
              }
            });
      }
  

  </script>
  <style type="text/css">
    .container{
      width: 1270px !important;
    }
    .hc{
    background-color: #5eef2252;
    }
    .tc{
    background-color: #988d9921;
    }
    #edit label{
    padding: 10px;
    font-size: 17px;
    font-family: sans-serif;
    }
    #edit input,#edit select{
    border: 1px solid black;
    padding: 4px;
    width: 60%;
    margin: 5px;
    border-radius: 3px;
    }
    #edit .d1{
    padding: 8px 20px 10px 20px;
    }
    #editModal1{
    background-color:#5eef221f; /*#5eef222e;*/
    }
    .cal{
    height: 38px;
    background-color: #c9f0ffa3;
    border-radius: 4px;
    }
    .fc-title {
        padding: 0 1px;
        white-space: normal;
        font-family: sans-serif;
    }
    .d1 label{
      white-space: nowrap;
    }
    input[type="radio"]{
      width: 1rem !important;
      height: 1rem;
    }
  </style>
 </head>
 <body onload="myFunction()">
  <br />
  <h2 align="center"><a href="#">Legal Calender</a></h2>
  <br/>
          <div class="container">
           <div class="row">
            <div class="col-3" id="Fileadd">
                 <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Files</th>
                        <th>Action</th>
                      </tr>
                    </thead>  
                      <?php 
                        $sqlc = "SELECT Distinct a.file_source FROM L_upload a inner join legal b on a.iid = b.Sr_no";
                        $runc = sqlsrv_query($con,$sqlc);
                        while($rowc = sqlsrv_fetch_array($runc,SQLSRV_FETCH_ASSOC)){
                      ?> 
                    <tbody>
                      <tr>
                        <td><?php echo $rowc['file_source'];?></td>
                        <td><button type="button" class="btn btn- px-1" onclick="return popitup('legal_Doc/<?php echo $rowc['file_source'];?>')"><i class='fas fa-arrow-circle-down' style='font-size:26px'></i></button></td>
                      </tr>
                    </tbody>
                  <?php } ?>
                 </table>
                 <!--  <button type="button" class="btn btn-info py-2 px-3 mx-5 m-2 ">Download</button> --> 
               </div>
           <div class="col-9">
             <div id="calendar"></div>
          </div>
        </div>
      </div>

 <!------------------------------------- [legal] ADD MODAL---------------------------- -->
    <!-- Modal -->
    <div class="modal fade" id="eModal" tabindex="-1" aria-labelledby="eModal" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header hc">
            <h5 class="modal-title" id="exampleModalLabel">Legal Add</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body color">
            <div id="edit">
              <form id="form2"><!-- action="legal_db.php" method="POST"  -->
                 <table class="table table-bordered tc edit">
                   <div class="d1">
                     <div class="row">
                          <label class="col-4">Compliance:</label>
                          <input class="col-6 form-control" type="text" name="Compliance" required>
                    </div>
                    <div class="row">
                          <label class="col-4">Category:</label>
                          <input class="col-6 form-control" type="text" name="Category" required>
                    </div>
                    <div class="row">
                          <label class="col-4">Department:</label>
                          <select name="depart" class="form-control " required>
                            <option selected="true" disabled="true" value="">SELECT</option>
                            <?php
                            $sqlp="SELECT Distinct department FROM Department where department is not NULL order by department asc";
                            $runp=sqlsrv_query($con,$sqlp);
                            while ($rowp = sqlsrv_fetch_array($runp, SQLSRV_FETCH_ASSOC)) { ?>
                            <option value="<?php echo $rowp['department']; ?>"><?php echo $rowp['department']; ?></option>
                            <?php } ?>
                          </select>
                    </div>
                    <div class="row">
                          <label class="col-4">Due Date:</label>
                          <input class="col-6 form-control" type="date" name="duedate" id="duedate" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="row">
                          <label class="col-4">Compny_DueDate:</label>
                          <input class="col-8 form-control" type="date" name="cdate" id="ccdate" value="<?php echo date('Y-m-d', strtotime('-3 day')); ?>" required>
                    </div>
                    <div class="row">
                          <label class="col-4">Status:</label>
                          <select class="col-6" name="status"  id="sta2">
                            <option >SELECT</option>
                            <option>Complete</option>
                            <option>pending</option>
                          </select>
                    </div>
                    <div class="row">
                          <label class="col-4">Filed Date:</label>    
                          <input class="col-6 form-control" type="date" name="fileddate" placeholder="DD-MM-YYYY" readonly>
                    </div>
                    <div class="row">
                          <label class="col-4">Prepared By:</label>
                          <input class="col-6 form-control" type="text" name="prepadby" readonly>
                    </div>
                    <div class="row">
                          <label class="col-4">Reviewed By:</label>
                          <input class="col-6 form-control" type="text" name="reciveby" readonly>
                    </div>
                  </div>
                </table>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" name="submit" class="btn btn-primary" id="legal">Save </button>
          </div>
        </div>
      </div>
    </div>
    <!-------------------------------------END [legal] ADD MODAL---------------------------- -->
    <!-----------------------------------[legal] edit Modal ------------------------------------>
    <div class="modal fade " id="editM" aria-labelledby="editM" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
       
          <div class="modal-header">
            <h5 class="modal-title">Legal Modify</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body" id="editModal1">
            <div id="edit">
              <form action="l_update_db.php" method="POST" id="editform" enctype="multipart/form-data">
            
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="save" form="editform" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
    <!-----------------------------------end [legal] edit Modal ------------------------------------>
<script type="text/javascript">
      $('#sta2').attr("disabled", true);
       $('#calender222').addClass('active');
</script>
</body>
</html>


<?php 
include('footer.php');
?>