<?php 
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="content">
		<div class="navigation">
			<ul>
				<li>
					<a href="#" >
						<span class="icon"><ion-icon name="aperture-outline"></ion-icon></span>
						<span class="title">SEPL</span>
					</a>
				</li>
				<li>
					<a class="li1" id="dash">
						<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="machine_list.php" id="cutm">
						<span class="icon"><ion-icon name="person-outline"></ion-icon></span>
						<span class="title">Machine List</span>
					</a>
				</li>
				<!-- <li>
					<a href="#" id="pwd">
						<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
						<span class="title">Password</span>
					</a>
				</li> -->
			</ul>
		</div>
		<!-- Main -->
		<div class="main">
				<div class="topbar fixed-top">
					<div class="toggle">
						<ion-icon name="menu-outline"></ion-icon>
					</div>
					<div class="logout">
						<label  style="color:black;"> <i class="fa fa-user fa-1x px-1"></i> <?php echo $_SESSION['u_name']; ?></label>
						<a href="logout.php" class="btn btn-info">Logout</a>
					</div>
				</div><br><br><br>
				
		