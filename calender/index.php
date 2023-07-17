<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title class="l_title">Compliance Calendar</title>
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
      <!-- icon -->
        <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
     
    <script>
    
$(document).ready(function() {
 /*compliance calender*/
    var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
    left:'prev,next',
    center:'title',
    //right:'month,agendaWeek,agendaDay'
    right:'today' 
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    // Add events
    //eventRender: function(event, element) {
    //console.log(event.title);
    //console.log(event.start._i);
    //console.log(event.color);
    // if(event.abc == "yes") {
    //     element.css({
    //       backgroundColor : "yellow",
    //       color: "red"
    //     });
    // }
    //},
    select: function(start, end, allDay)
    {
    /* jQuery("#your_selector").fullCalendar('getDate').month() */    
    var start = $.fullCalendar.formatDate(start, "Y-MM-DD"); /*re*/
    $("#ddate").val(start);
    ldate(start);
    $('#exampleModal').modal('show');
    
    // var title = prompt("Enter Event Title");
    // if(title)
    // {
    //  var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    //  var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    //  $.ajax({
    //   url:"insert.php",
    //   type:"POST",
    //   data:{title:title, start:start, end:end},
    //   success:function()
    //   {
    //    calendar.fullCalendar('refetchEvents');
    //    alert("Added Successfully");
    //   }
    //  })
    // }
    },
    eventClick:function(event)
    {
    var id = event.id;
    $.ajax({
    url:"update_compliance.php",
    type:"POST",
    data:{id:id},
    success:function(data)
    {
    $('#edit_form').html(data);
    $('#editModal').modal('show');
    }
    });
    },

     /*eventDrop:function(event) {
       var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
       var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
       var title = event.title;
       var id = event.id;
       $.ajax({
        url:"update.php",
        type:"POST",
        data:{title:title, start:start, end:end, id:id},
        success:function()
        {
         calendar.fullCalendar('refetchEvents');
         alert("Event Updated");
        }
       });
      },*/
    });

/*complilance reresh current page*/
      $(document).on('click','#comp',function(){
        $.ajax({
          url:"compliance_db.php",
          method:"POST",
          data:$('#form').serialize(),
          success:function(data){
          alert(data);
        },
          complete:function(){
          $('#exampleModal').modal('hide');
          calendar.fullCalendar('refetchEvents');
         }
        });
        });

/*legal reresh current page*/
     /* $(document).on('click','#legal',function(){
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
*/
/* $(document).on('click','#edit_m',function(){
        $.ajax({
          url: "update_db.php",
          type: 'POST',
          data: $('#edit_form').serialize(),

          success: function( data ) {
            alert(data);
              //$('#Add_data').modal('hide');
          },
          complete: function () {
            location.reload();
          }
        });
    });*/
 });

 
/*compliance upload docs*/   
    $(document).on("click",".uploadImg",function(){
    let url = 'upload/'+$(this).attr("id");
    newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
    if (window.focus) {newwindow.focus()}
    return false;
    });



/*compliance load duedate to compant_duedate*/
    $(document).on('change','#ddate',function(){
    var newdate = $(this).val();
      ldate(newdate);
    });
    function ldate(newdate){
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
          $('#cdate').val(someFormatteduedate);
    }

/*select date to month and year*/
  /* for (let i = ; i < ; i++) {
   
    var startDateTime = ''
    var nextMonthDate = moment(startDateTime, "DD/MM/YYYY")
                        .add(1, 'months')
                        .format('DD/MM/YYYY');

   } */
   /*dashboad active id*/
     $('#calender111').addClass('active');


   /*view upload file new window*/
        function popitup(url) {
          newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
          if (window.focus) {newwindow.focus()}
          return false;
        }

    function myFunction() {
     var date = $("#calendar").fullCalendar('getDate');
            var dt = new Date(date);
            var month = dt.getMonth();
            var year = dt.getFullYear();
            //alert(year);
            $.ajax({
              url: "getfile.php",
              type: 'post',
              data:{month:month,year:year},
              success: function (data) {
                  $('#addFile').html(data);
              }
            });
      }
/*click pre & next to load month wise file*/
      $(document).ready(function(){
          $('.fc-button-group').click(function() {
            var date = $("#calendar").fullCalendar('getDate');
            var dt = new Date(date);
            var month = dt.getMonth();
            var year = dt.getFullYear();
            //alert(year);
            $.ajax({
              url: "getfile.php",
              type: 'post',
              data:{month:month,year:year},
              success: function (data) {
                  $('#addFile').html(data);
              }
            });
        });
      });
  
  
      
  

  </script>
  <style type="text/css">
    .container {
          width: 1270px;  /* width: 1200px;*/
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
   
/*    .nav-link {
        display: block;
        padding: 0.5rem 1rem;
        color: #495057;
        text-decoration: none;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
    }*/
    .d1 label{
      white-space: nowrap;
    }
    input[type="radio"]{
      width: 1rem !important;
      height: 1rem;
    }

   /* #nav-collapse li a:hover { 
        color: blue; 
    }
    #nav-collapse a:hover { 

      background-color: #f0a8e1 ; 
    }
*/
 /*    #nav-collapse  li.active { 
        color: blue !important;
        background-color: yellow; 
    }
    #nav-collapse  li.active a {
        color: red;
    }*/
    </style>
</head>
<body onload="myFunction()">
<br />
  <h2 align="center"><a href="#">Compilance Calender</a></h2>
  <br/>
          <div class="container">
            <div class="row">
               <div class="col-3" id="addFile">
                <!--  <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th>Files</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>  
                      <?php 
                        $sql = "SELECT Distinct a.file_source FROM upload a inner join Compliance b on a.iid = b.Sr_no";
                        $run = sqlsrv_query($con,$sql);
                        while($row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
                      ?> 
                        <tr>
                          <td><?php echo $row['file_source'];?></td>
                          <td><button type="button" class="btn btn-danger mx-2" onclick="return popitup('upload/<?php echo $row['file_source'];?>')"><ion-icon name="eye"></ion-icon></button></td>
                        </tr>
                  <?php } ?>
                    </tbody>
                 </table> -->
                 <!--  <button type="button" class="btn btn-info py-2 px-3 mx-5 m-2 ">Download</button> --> 
               </div>
               <div class="col-9">
                   <div id="calendar"></div>
               </div>
            </div>  
          </div>
      </div>
  </div> 

 <!-------------------------------------[compliance] ADD MODAL---------------------------- -->
    <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header hc">
           <h5 class="modal-title" id="exampleModalLabel">Compliance Add</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body color">
          <div id="edit">
            <form  id="form"><!-- action="compliance_db.php" method="POST" -->
              <table class="table table-bordered tc edit">
                <div class="d1">
                  <!--  <div class="row">
                      <div class="col-1"><input type="radio" name="opt" id="dte" value="month" checked></div>
                      <div class="col-5">
                         <label class="p-1">For This Moth Only</label> 
                      </div>
                      <div class="col-1"><input type="radio" name="opt" id="dte1" value="Year"></div>
                      <div class="col-5">
                          <label class="p-1">For This Year</label>
                      </div>
                  </div><br> -->
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
                      <input class="col-6 form-control" type="date" name="duedate" id="ddate"   required>
                  </div>
                  <div class="row">
                      <label class="col-4">Compny_DueDate:</label>
                      <input class="col-8 form-control" type="date" name="cdate" id="cdate"  required>
    <!-- value="<?php echo date('Y-m-d', strtotime("-3 day")); ?>" -->
                  </div>
                  <div class="row">
                      <label class="col-4">Status:</label>
                      <select class="col-6" name="status" id="sta">
                         <option>SELECT</option>
                        <option>Complete</option>
                        <option>pending</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="col-4">Filed Date:</label>      <!--  class="form-control form-control-sm"  -->
                      <input class="col-6 form-control" type="date" name="fileduedate" placeholder="DD-MM-YYYY" readonly>
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
          <button type="button" name="save" class="btn btn-primary" id="comp">Save </button>
        </div>
      </div>
    </div>
    </div>
    <!-------------------------------------END [compliance] ADD MODAL---------------------------- -->

    <!----------------------------------- [compliance]edit Modal ------------------------------------>
    <div class="modal fade " id="editModal" aria-labelledby="editModal" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h5 class="modal-title">Compliance Modify</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body" id="editModal1">
                <div id="edit">
                  <form action="update_db.php" method="POST" id="edit_form" enctype="multipart/form-data"><!-- action="update_db.php" method="POST"  -->
                              <!-- load daynamicallyy............... -->
                  </form>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="save" form="edit_form" class="btn btn-primary" value="Update">
          </div>
        </div>
      </div>
    </div>
    <!-----------------------------------end [compliance] edit Modal  ---------------------->
   
    <script type="text/javascript">
         $('#sta').attr("disabled", true);
          $('#sta2').attr("disabled", true);


    </script>
  </body>
</html>
<?php
include('footer.php');
?>