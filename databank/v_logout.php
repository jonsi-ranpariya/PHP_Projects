<?php
session_start();
session_destroy();
header('location:v_login.php');
?>