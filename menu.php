<?php 
session_start();
require_once "config.php";

error_reporting(0);

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./Signin Template · Bootstrap v5.1_files/signin.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
	<link rel="icon" type="image/png" href="./web_editor/watchimg/logo/x50icon.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style_main.css">
	
	<title>7onn</title>
</head>

<body>
	<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<div class="container container-my menu">

			<a class="navbar-brand logo" href="index.php">
			<img src="./web_editor/watchimg/logo/x50color-white.png" alt="" class="">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExample07">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" id="nav_s1" aria-current="page" href="index.php"><i class="fas fa-home"></i>Strona główna</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nav_s2" href="shop.php"><i class="fa fa-shopping-cart"></i>Sklep</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nav_s3" href="aboutus.php"><i class="fa fa-users"></i>O nas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nav_s4" href="contact.php"><i class="fa fa-envelope"></i>Kontakt</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nav_s5" href="editor_load.php"><i class="fa fa-cog"></i>Stwórz własny model</a>
					</li>
				</ul>
				<?php
				if (isset($_SESSION['username'])) {
					echo "<div class='btn-group p-3' role='group'>
  						<input type='radio' class='btn-check' id='btnradio1' autocomplete='off' checked>
  						<label class='btn btn1' for='btn1'>".$_SESSION['username']."</label>

						<input type='radio' class='btn-check' id='btnradio1' autocomplete='off'>
						<a class='btn btn2' href='./profile.php' role='button'>PROFIL</a>
						  
						<input type='radio' class='btn-check' id='btnradio1' autocomplete='off'>
						<a class='btn btn2' href='./logout.php' role='button'>Wyloguj</a>
						</div>";
				}
				else{?>
					<div class="log d-flex align-items-center">
						<button type="button" class="btn btn-dark btn-primary me-3 ">
							<a href="./login.php" id="nav_s6">LOGOWANIE</a>
						</button>
						<button type="button" class="btn btn-dark btn-primary">
							<a href="./register.php" id="nav_s7">REJESTRACJA</a>
						</button>
					</div>
				<?php } ?>
				<?php
				if(isset($_SESSION['koszyk'])){
					//licz ile w koszyku
					$count = count($_SESSION['koszyk']);
					echo "<button type='button' class='btn btn-light text-dark mx-3 position-relative'>
					<a href='./cart.php'><i class='btn-cart bi bi-cart'></i></a>
					<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'> $count </span>
					</button>";
				} else{
					echo "<button type='button' class='btn btn-light text-dark mx-3 position-relative'>
					<a href='./cart.php'><i class='btn-cart bi bi-cart'></i></a>
					<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'> 0 </span>
					</button>";
				}
				?>
				
				<form class="d-flex input-group w-auto" action="shop.php" method="get">
					<input class="form-control" type="text" placeholder="Szukaj..." name="szukaj" id="id_search">
					<button class="input-group-text border-0" type="submit" id="search-addon"><i class="bi bi-search"></i></button>
				</form>
				
			</div>
			
		</div>
	</nav>
