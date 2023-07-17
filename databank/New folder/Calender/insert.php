<?php

//insert.php

    $server = '192.168.1.242';
    $dbname = 'Calender';
    $user = 'sa';
    $pass = '12345';
    $connect = new PDO("sqlsrv:Server=$server;Database=$dbname", $user, $pass);

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>