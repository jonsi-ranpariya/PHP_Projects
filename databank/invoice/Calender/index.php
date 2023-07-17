<?php
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {
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
  });

  });
   
 $(document).on("click",".uploadImg",function(){
    let url = '../upload/'+$(this).attr("id");
    newwindow=window.open(url,'_blank','height=500,width=500,left=300,top=50');
    if (window.focus) {newwindow.focus()}
     return false;

 }); 

  </script>
  <style type="text/css">
      .container {
          width: 950px;
          max-width: 100%;
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
          background-color: #5eef222e;
        }
       
</style>
 </head>
 <body>
  <div class="col-lg-3 text-left">
          <a href="../Vender_Register.php" class="btn btn-warning btn-sm font-weight-bold py-2 mx-4 px-3 m-2">Back</a>
  </div>
  <h2 align="center"><a href="#">Compliance Calendar</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>

<!-- ADD modal here -->
<!------------------------------------- FULL CALENDER ADD MODAL---------------------------- -->
<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header hc">
        <h5 class="modal-title" id="exampleModalLabel">Compliance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body color">
        <form action="compliance_db.php" method="POST" id="form">

          <!-- <div class="d1">
             <div class="row">
                <label class="col-4">Compliance:</label>
                <input class="col-6" type="text" name="Compliance" value="" readonly>
             </div>
         </div> -->


          <table class="table table-bordered tc edit">
            <thead>
               <tr>
                 <th>Compliance</th>
                 <th>Category</th>
                 <th>Due Date</th>
                 <th>Company DueDate</th>
                 <th>Status</th>
                 <th>Filed Date</th>
                 <th>PreparedBy</th>
                 <th>ReviewedBy</th>
              </tr>
              </thead>
             <tbody>
               <tr>
                 <td><input type="text" name="Compliance" class="form-control form-control-sm" required></td>
                 <td><input type="text" name="Category" class="form-control form-control-sm" required></td>
                 <td><input type="date" name="duedate" class="form-control form-control-sm" required></td>
                 <td><input type="date" name="cdate" class="form-control form-control-sm" required></td>
                 <td>
                    <select  name="status" class="form-control form-control-sm">
                      <option>Complete</option>
                      <option>pending</option>
                    </select>
                 </td>
                 <td><input type="date" name="fileddate" class="form-control form-control-sm"></td>
                 <td><input type="text" name="prepadby" class="form-control form-control-sm"></td>
                 <td><input type="text" name="reciveby" class="form-control form-control-sm"></td>
               </tr>
             </tbody>
           </table>
          </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save" class="btn btn-primary" form="form">Save </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-------------------------------------END FULL CALENDER ADD MODAL---------------------------- -->
<!----------------------------------- The edit Modal ------------------------------------>
    <div class="modal fade " id="editModal" aria-labelledby="editModal" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body" id="editModal1">
                  <div id="edit">

                <form action="update_db.php" method="POST" id="edit_form" enctype="multipart/form-data">
                  <!-- load daynamicallyy............... -->
              </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="save" form="edit_form" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>
  <!-----------------------------------end The edit Modal ------------------------------------>
 </body>
</html>
