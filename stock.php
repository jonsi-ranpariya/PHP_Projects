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
    <div class="container-fluid m-1 mt-3">
                    <?php if(isset($_SESSION['message'])): ?>
                      <div class="alert alert-danger font-weight-bold font-italic">
                    <?php echo $_SESSION['message']; ?>
                      </div>
                    <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
        <table id="table">
            <thead>
                <tr>
                    <th>Sr_no</th>
                    <th>Date</th>
                    <th>issue_to</th>
                    <th>item</th>
                    <th>Qnty</th>
                    <th>unit</th>
                    <th>mc_no</th>
                    <th>person</th>
                    <th>dept</th>
                    <th>issue_cat</th>
                    <th>old_part_received</th>
                    <th>remark</th>  
                </tr>
            </thead>
            <tbody > 
                <?php
                    include('dbcon.php');       /*icode[ To item]  */
                    $sql = "SELECT * from issue a left outer join [RM_software].[dbo].[rm_item] b on a.item_name = b.i_code order by sr_no desc";
                    $run = sqlsrv_query($con,$sql);
                    while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                    ?>    
                <tr>
                    <td><?php echo $row['sr_no'];?></td>
                    <td><?php echo $row['issue_date'] ->format('d-M-Y');?></td>
                    <td><?php echo $row['issue_to'];?></td>
                                                               <!-- icode[ To item] rm_item[column name] -->
                    <td data-toggle="tooltip" title="<?php echo $row['item'] ?>"><?php echo substr($row['item'], 0, 15)?></td>
                    <td><?php echo $row['qnty'];?></td>
                    <td><?php echo $row['unit'];?></td>
                    <td><?php echo $row['mcno'];?></td>
                 
                      <td data-toggle="tooltip" title="<?php echo $row['p_name'] ?>"><?php echo substr($row['p_name'], 0, 8)?></td>
                    <td><?php echo $row['dpnt'];?></td>

                    <td><?php echo $row['issue_cat'];?> </td>
                    <td><?php echo $row['old_part_received'];?> </td>
                    <td><?php echo $row['remarks'];?> </td>
                </tr>
             <?php } ?>
            </tbody>
        </table>
    </div>


<!-- pagination -->
<script type="text/javascript">
$('#pay').addClass('active');

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
    </script>
</body>
</html>

<?php
include('footer.php')
?>

