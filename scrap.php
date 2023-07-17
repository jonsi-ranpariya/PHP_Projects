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
</style>
</head>
<body>
    <div class="container-fluid m-1 mt-4 ">
         <div class="container-fluid">
           <div class="p-0 bg-secondary text-center text-warning">
            <h2>Scrap</h2>
          </div> 
        <table id="table">
            <thead>
                <tr>
                 
                    <th>Category</th>
                    <th>Qnty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include('dbcon.php');

                $sql="SELECT * FROM item_master where isdelete = 0 order by item";
                $result = sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $sql2 = "SELECT SUM(qnty) as count FROM Inward where i_code = '".$row['id']."' and status='scrap'";
                    $run = sqlsrv_query($con,$sql2);    
                    $row2 =sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
                ?>
                <tr> 
                    <td><?php echo $row['item'];?></td>
                    <td><?php echo $row2['count'];?></td>
                    <td class="sto"><button type="button" class="btn btn-primary py-1 px-2 mx-3 action"  id="<?php echo $row['id']; ?>">View</button></td>   
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
     <!-----------------------------------------  live_stock Modal ----------------------------------------->
    <div class="modal fade " id="scrap_data" aria-labelledby="scrap_data" aria-hidden="true" tabindex="-1">
            
        <!----------------- Scrollable modal --------------------------->
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header font-weight-bold">
  <!--view modal unique--> <h4><strong id="view" class="mx-2 primary"></strong></h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                      <div>
                        <form>
                          <table id="scrap_table">
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



<!-- pagination -->
<script type="text/javascript">
$('#scrap').addClass('active');

    $(document).ready(function(){
        var table = $('#table').DataTable({
            "processing": true,
            dom: 'Bfrtip',
            ordering: false,
            
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
             buttons: [
                'pageLength', 'excel',,
                // Customize button datatable
            ]
        }); 

       }); 


    /*view live_stock modal*/
 
   $(document).on('click', '.action', function(){
        var id = $(this).attr("id");
        $('#sto').text($(this))

        $.ajax({
                url:"get_scrap_db.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                   $('#scrap_table').html(data);
                    $('#scrap_data').modal('show');
                }
          });
    });
</script>
</body>
</html>

<?php
include('footer.php')
?>

