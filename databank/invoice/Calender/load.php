<?php

//load.php
require "pdodb.php";
$data = array();
$query = "SELECT * FROM Compliance ORDER BY Sr_no";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
    $due = $row["Due_Date"];
    $filled = $row["Filed_Date"];
    $Status = $row["Status"];
   /* $cdue = $row["Company_Due_Date"];
    $cdate = date('d-M-y');*/


    if ($Status == "Complete" && $filled < $due) {         /*status compare to color*/
        $color = "green";
    }elseif ($Status == "Complete" && $filled > $due){
        $color = "orange";
    }elseif ($Status != "Complete"){
        $color = "red";
        // $color = "#4287f5";
    }else{
        $color = "";
    }
    
   /* $query = "SELECT * FROM Department ORDER BY Sr_no";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

         if($Status != "Complete" && $cdate > $cdue){
            
         }*/

 $data[] = array(
  'id'   => $row["Sr_no"],
  'title'   => $row["Compliance"],
  'start'   => $row["Due_Date"],
  'color' => $color            /*color*/
 );
}

echo json_encode($data);

?>