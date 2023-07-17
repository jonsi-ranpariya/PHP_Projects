
<?php

//update.php

    $server = '192.168.1.242';
    $dbname = 'Calender';
    $user = 'sa';
    $pass = '12345';
    $connect = new PDO("sqlsrv:Server=$server;Database=$dbname", $user, $pass);

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>