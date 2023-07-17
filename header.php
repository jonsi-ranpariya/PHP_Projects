<?php
session_start();
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
						<a href="Dashboard.php" class="li1" id="dash">
							<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
							<span class="title">Dashboard</span>
						</a>
					</li>
					<!-- 	<li>
							<a href="stock.php" id="pay">
									<span class="icon"><ion-icon name="archive-outline"></ion-icon></span>
									<span class="title">IT Stock</span>
							</a>
					</li> -->
					<li>
						<a href="inward.php" id="inward">
							<span class="icon"><ion-icon name="archive-outline"></ion-icon></span>
							<span class="title">Inward</span>
						</a>
					</li>
					<li>
						<a href="issue.php" id="issue">
							<span class="icon"><ion-icon name="share-outline"></ion-icon></ion-icon></span>
							<span class="title">Issue</span>
						</a>
					</li>
					<li>
						<a href="livestock.php" id="assign">
							<span class="icon"><ion-icon name="list"></ion-icon></ion-icon></span>
							<span class="title">live Stock</span>
						</a>
					</li>
					<li>
						<a href="live_user.php" id="user">
							<span class="icon"><ion-icon name="person-outline"></ion-icon></span>
							<span class="title">Live user</span>
						</a>
					</li>
					<li>
						<a href="scrap.php" id="scrap">
							<span class="icon"><ion-icon name="trash-bin-outline"></ion-icon></ion-icon></span>
							<span class="title">Scrap</span><!-- <ion-icon name="trash"></ion-icon> -->
						</a>
					</li>
					<li>
						<a class="sub-btn" id="mesge">
							<span class="icon"><ion-icon name="journal"></ion-icon></span>
							<span class="title">Master <ion-icon name="caret-down-outline"></ion-icon></span>
						</a>
						<ul class="drop" id="mesge" >
							<li><a href="master.php" id="master">-<span class="stitle">Category</span></a></li>
							<!-- <li><a href="#"><span class="stitle">Second</span></a></li>
							<li><a href="#"><span class="stitle">Third</span></a></li> -->
						</ul>
						<!-- <a href="master.php" id="master">
								<span class="icon"><ion-icon name="journal"></ion-icon></ion-icon></span>
								<span class="title">Master</span>
						</a> -->
					</li>
				</ul>
			</div>
			
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
				
				<!-- <ion-icon name="person" class="fa-1x px-1"></ion-icon>-->