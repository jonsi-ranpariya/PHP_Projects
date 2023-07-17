<?php

//delete.php

if(isset($_POST["id"]))
{
    $server = '192.168.1.242';
    $dbname = 'Calender';
    $user = 'sa';
    $pass = '12345';
    
    $connect = new PDO("sqlsrv:Server=$server;Database=$dbname", $user, $pass);

 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
