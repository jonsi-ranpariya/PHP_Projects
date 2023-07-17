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
          width:90px !important;
        }
     
        thead input {
              width: 100%;
              padding: 5px;
              height: 35px;  
        }
        #table2 tr:nth-child(even) {
        background-color: #b5ced77a !important;
        }
        #view{
          color: darkslategray;
        }
        .t1{
          width: 100px !important;
        }
        .t2{
          width: 400px !important;
        }
        .ADD{
            background-color: #84bfe0 !important;
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
</style>
</head>
<body>
<div class="container-fluid m-1 mt-4 ">
    <div class="container-fluid">
          <div class="p-0 bg-secondary text-center text-warning">
           <h2>Master</h2>
          </div> 
    <div class="row m-1 mt-3">
    <table id="table2">
        <thead>
          <tr>
              <th class="t1">Sr</th>
              <th class="t2">Category</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include('dbcon.php');

          $query="SELECT * FROM item_master where isdelete = 0 order by item";
          $result = sqlsrv_query($con,$query);
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
          ?>
          <tr>
              <td><?php echo $row['id']; ?></td> 
              <td><?php echo $row['item'];?></td>
              <td>
                <button type="button" class="btn btn-primary  py-1 px-3  edit" id="<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger py-1 px-3 mx-2 delete" id="<?php echo $row["id"]; ?>"><i class="fa fa-trash"></i></button>
              </td>
          </tr>   
            <?php } ?>
        </tbody>
    </table>
  </div>
</div>

   <!-----------------------------------------   ADD Modal ----------------------------------------->
    <div class="modal fade-none" id="Add_data" aria-labelledby="Add_data" aria-hidden="true" tabindex="-1">
               
        <!----------------- Scrollable modal --------------------------->
        <div class="modal-dialog modal-none modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header font-weight-bold">
                   <h4>Add Payment</h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="add_modal">
                <div class="table-responsive">
                  <form action="master_add.php" method="POST" id="form">
                      <table>
                          <thead>
                              <tr> 
                                 <th>Item_Category</th>
                              </tr>
                              <tr>
                                 <td><input type="text" class="form-control" name="item" required></td>
                             </tr>
                          </thead>
                      </table>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                   <button id="submit" name="submit" class="btn btn-primary" form="form"><span>Sumbit</span></button>
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
                  <form action="master_edit_db.php" id="fetchonmodal" method="POST">
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


<script type="text/javascript">
  $('#master').addClass('active');

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
          ]
      }); 
   });

/* EDIT button click event*/

  $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");  

        $.ajax({
              url:"master_edit.php",
              method:"POST",
              data:{id:id},
              success:function(data)
              {
                  $('#fetchonmodal').html(data);
                  $('#edit_data').modal('show');
              }
         });
    });

   $(document).on('click', '.delete', function(){
          var id = $(this).attr("id");  
       
           $.ajax({
                url:"master_delete_db.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                   alert(data);
                },
                  complete:function(){
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


