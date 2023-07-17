<?php 

    $server = '192.168.1.242';
    $dbname = 'Data_Bank';
    $user = 'sa';
    $pass = '12345';
    $connect = new PDO("sqlsrv:Server=$server;Database=$dbname", $user, $pass);

 ?>