<?php 

if(isset($_POST["id"]))
{ 
  include('dbcon.php');
  $id = $_POST['id'];

  $sql = "SELECT * FROM issue WHERE emp_id = '$id'";
  $run = sqlsrv_query($con,$sql);
  $row1 = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
  $output = '';         
  $output .='

    <div class="row">
       <div class="col-lg-9" >
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
                  <td><input type="text" name="emp_id" class="form-control border-info emp_id1" value="'.$row1['emp_id'].'" required> <input type="hidden" class="sr_no1" name="iid" id="iid" value="'.$row1['sr_no'].'"></td>
                  <td><input type="text" class="form-control emp_name1" name="emp_name" value="'.$row1['p_name'].'"  required></td>
                  <td><input type="text"  class="form-control td1 ipaddress1" name="ip_addrs" id="ip_addrs" value="'.$row1['IP_Address'].'"  placeholder="xxx.xxx.xxx.xxx"  required></td>
                  <td><input type="text" step="0.01" class="form-control td1 phone1" value="'.$row1['CUG_Number'].'"  name="cug_number" placeholder="(XXX) XXX-XXXX" required></td>
                  <td><input type="text" class="form-control td1 Username1" value="'.$row1['U_name'].'" name="u_name" required></td>
                  <td><input type="text" class="form-control td1 pwd1" name="pwd" value="'.$row1['password'].'"  required></td>
                  <td><select  name="department" class="form-control depart1">
                            <option value="'.$row1['dpnt'].'">'.$row1['dpnt'].'</option>
                       ';
                            include('dbcon4.php');
                            $sql11="SELECT Distinct department FROM [user] where department is not NULL  order by department asc";
                            $run11=sqlsrv_query($conn,$sql11);
                            while ($row11 = sqlsrv_fetch_array($run11, SQLSRV_FETCH_ASSOC)) {
                         $output .='
                           <option value="'.$row11['department'].'">'.$row11['department'].'</option>
                        ';
                      }
                        $output .='            
                        /select>
                      </td>
                      <td><select name="location" class="form-control location1"> 
                              <option value="'.$row1['location'].'">'.$row1['location'].'</option>
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
         
         </div><br>
         <div class="table-responsive">
          <table id="editdata">
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
            ';/*
                    $query="SELECT item FROM M_item";
                    $result = sqlsrv_query($con,$query);
                    while($row00 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){*/
            $sqlq = "SELECT b.Sr_no,b.iid,b.Item,a.sr_no,a.qnty,a.emp_id,a.p_name,a.IP_Address,a.CUG_Number,a.U_name,a.password,a.dpnt,a.location,a.Make,a.Model,a.Serial_Number,a.Mac_Address,a.Screen_Size,a.RAM_1,a.RAM_2,a.HDD_1,a.HDD_2,a.HDD_3,a.OS,a.AntiVirus,a.Manf_Year FROM issue a inner join M_Item b on a.item_category = b.iid  where a.emp_id = '$id'";
            $runq = sqlsrv_query($con,$sqlq);
            while($row = sqlsrv_fetch_array($runq, SQLSRV_FETCH_ASSOC)){
               $abc = $row['Sr_no'];
         $output .='
                    <tr>
                     <td style="width:8%"><input type="text" name="item[]" class="form-control item1" value="'.$row['Item'].'" readonly><input type="hidden" name="itemId[]" value="'.$row['iid'].'"><input type="hidden" name="srno[]" value="'.$row['sr_no'].'"</td>
                     <td style="width:4%"><input type="number" step="0.01" name="qnty[]" class="form-control qnty1" value="'.$row['qnty'].'" ></td>
                     <td><select  name="make[]" class="form-control make1" >
                                <option value="'.$row['Make'].'">'.$row['Make'].'</option>
                              ';
                                $sql0="SELECT Distinct Make FROM M_Make where Make is not NULL  order by Make asc";
                                $run0=sqlsrv_query($con,$sql0);
                                while ($row0 = sqlsrv_fetch_array($run0, SQLSRV_FETCH_ASSOC)) {
                               $output .='
                                <option value="'.$row0['Make'].'">'.$row0['Make'].'</option>
                              ';}
                              $output .='
                        </select>
                      </td>
                      <td style="width:10%"><input type="text" name="model[]" value="'.$row['Model'].'" class="form-control modal11" id="mod11'.$abc.'"></td>
                      <td style="width:9%"><input type="number" step="0.01"  name="Sr_Number[]" value="'.$row['Serial_Number'].'" class="form-control Sr_Number1"  id="srnumber1'.$abc.'" ></td>
                      <td><input type="text" name="Mac_Add[]" id="Mac_Add1'.$abc.'" class="form-control Mac_Add1" value="'.$row['Mac_Address'].'" placeholder="Enter ..." ></td>
                      <td style="width:5%"><select  name="Scrn_Size[]" class="form-control Scrn_Size1" id="sSize1'.$abc.'" >
                                <option value="'.$row['Screen_Size'].'">'.$row['Screen_Size'].'</option>
                               ';  
                                $sql1="SELECT Distinct Screen_Size FROM M_ScreenSize where Screen_Size is not NULL  order by Screen_Size asc";
                                $run1=sqlsrv_query($con,$sql1);
                                while ($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)) {
                                $output .='
                                <option value="'.$row1['Screen_Size'].'">'.$row1['Screen_Size'].'</option>
                               ';}
                              $output .='
                        </select>
                      </td>
                      <td style="width:6%"><select  name="ram_1[]" class="form-control ram-11" id="ram11'.$abc.'" >
                                <option value="'.$row['RAM_1'].'">'.$row['RAM_1'].'</option>
                                '; 
                                $sql2="SELECT Distinct RAM_1 FROM M_RAM where RAM_1 is not NULL  order by RAM_1 asc";
                                $run2=sqlsrv_query($con,$sql2);
                                while ($row2 = sqlsrv_fetch_array($run2, SQLSRV_FETCH_ASSOC)) {
                               $output .='
                                <option value="'.$row2['RAM_1'].'">'.$row2['RAM_1'].'</option>
                                ';}
                              $output .='
                        </select>
                      </td>
                      <td style="width:6%"><select  name="ram_2[]" class="form-control ram-21" id="ram21'.$abc.'" >
                                <option value="'.$row['RAM_2'].'">'.$row['RAM_2'].'</option>
                              '; 
                                $sql3="SELECT Distinct RAM_1 FROM M_RAM where RAM_1 is not NULL  order by RAM_1 asc";
                                $run3=sqlsrv_query($con,$sql3);
                                while ($row3 = sqlsrv_fetch_array($run3, SQLSRV_FETCH_ASSOC)) {
                              $output .='
                                <option value="'.$row3['RAM_1'].'">'.$row3['RAM_1'].'</option>
                               ';}
                              $output .='
                        </select>
                      </td>
                      <td>
                        <select  name="hhd_1[]" class="form-control hhd-11" id="hhd11'.$abc.'" >
                                <option value="'.$row['HDD_1'].'">'.$row['HDD_1'].'</option>
                                '; 
                                $sql4="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                                $run4=sqlsrv_query($con,$sql4);
                                while ($row4 = sqlsrv_fetch_array($run4, SQLSRV_FETCH_ASSOC)) {
                               $output .='
                                <option value="'.$row4['HDD_1'].'">'.$row4['HDD_1'].'</option>
                                 ';}
                              $output .='
                        </select>
                      </td>
                      <td style="width:6%"><select  name="hhd_2[]" class="form-control hhd-21" id="hhd21'.$abc.'" >
                                <option value="'.$row['HDD_2'].'">'.$row['HDD_2'].'</option>
                                  '; 
                                $sql5="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                                $run5=sqlsrv_query($con,$sql5);
                                while ($row5 = sqlsrv_fetch_array($run5, SQLSRV_FETCH_ASSOC)) {
                               $output .='
                                <option value="'.$row5['HDD_1'].'">'.$row5['HDD_1'].'</option>
                               ';}
                              $output .='
                        </select>
                      </td>
                      <td><select  name="hhd_3[]" class="form-control  hhd-31" id="hhd31'.$abc.'" >
                                <option value="'.$row['HDD_3'].'">'.$row['HDD_3'].'</option>
                              '; 
                                $sql6="SELECT Distinct HDD_1 FROM M_HDD where HDD_1 is not NULL  order by HDD_1 asc";
                                $run6=sqlsrv_query($con,$sql6);
                                while ($row6 = sqlsrv_fetch_array($run6, SQLSRV_FETCH_ASSOC)) {
                               $output .='
                                <option value="'.$row6['HDD_1'].'">'.$row6['HDD_1'].'</option>
                                 ';}
                              $output .='
                        </select>
                      </td>
                      <td>
                        <select name="os[]" class="form-control os1" id="operating1'.$abc.'" >
                          <option value="'.$row['OS'].'">'.$row['OS'].'</option>
                        '; 
                          $sql7="SELECT Distinct OS FROM M_OS where OS is not NULL  order by OS asc";
                          $run7=sqlsrv_query($con,$sql7);
                          while ($row7 = sqlsrv_fetch_array($run7, SQLSRV_FETCH_ASSOC)) {
                          $output .='
                          <option value="'.$row7['OS'].'">'.$row7['OS'].'</option>
                            '; }
                        $output .='
                        </select>
                      </td>
                      <td>
                        <select name="AntiVirus[]" class="form-control AntiVirus1" id="anti1'.$abc.'" >
                          <option value="'.$row['AntiVirus'].'">'.$row['AntiVirus'].'</option>
                          <option>YES</option>
                          <option>NO</option>
                        </select>
                      </td>
                      <td style="width:6%"><input type="text" name="Manf_Year[]"  value="'.$row['Manf_Year'].'" id="Manf_Year" maxlength="4" placeholder="YYYY" class="form-control myear1"></td>
                    </tr>
        ';
      }
         $output .=' 
                  </tbody>
                </table>
                </div>
 ';

echo $output;

}

 ?>

  <script type="text/javascript">

       /*------autocomplete textbox-----*/
    $( function() {
        // mc autocomplete box
        $( ".emp_id1" ).autocomplete({
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
            $('.emp_id1').val(ui.item.label);
            $('.emp_name1').val(ui.item.pname1);
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

//screenSize srnumber mcadd
    /* $('#mod19').prop('readonly',true);
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
*/


 </script>
  