<?php 
/*session_start();*/
include('session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desktop</title>
    <!-- Material Cdn -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <div class="main-body">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="images/sepl.jpeg">
                    <h2 class="fw-bold">SE<span class="danger">PL</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebarr">
                <a href="#">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
               <!--  <a href="Vender_Register.php" id="vragiser">
                    <ion-icon name="person"></ion-icon>
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Vendor Registration</h3>
                </a> -->
                <a href="index.php" id="calender111"><ion-icon name="calendar"></ion-icon>
                   <!--  <span class="material-icons-sharp">person_outline</span> -->
                    <h3>Compliance Calendar</h3>
                </a>
                <a href="l_index.php" id="calender222"><ion-icon name="calendar"></ion-icon>
                   <!--  <span class="material-icons-sharp">person_outline</span> -->
                    <h3>Legal Calendar</h3>
                </a>
                <a href="v_logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!--------- END Of Aside --------->
        <main>
            <div class="top fixed-top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <!-- <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div> -->
                <div class="profile">
                    <div class="info">
                        
                    </div>
                </div>
            </div>