<?php

	session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Programowanie w App Inventor 2</title>
	
	<meta name="description" content="Programowanie w App Inventor 2 - baza przykładów" />
	<meta name="keywords" content="app inventor, appinventor" />
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<link href="css/fontello.css" rel="stylesheet" type="text/css" />
	
</head>

<body>

	<div class="wrapper">
		<div class="header">
		
			<div class="logo">
				<img src="logo.png" style="float: left;"/>
				Programowanie w App Inventor 2
				<div style="clear:both;"></div>
			</div>
		</div>
		
		<div class="nav">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="#">Wprowadzenie</a>
					<ul>
						<li><a href="start.php">Start</a></li>
						<li><a href="interfejs.php">Interfejs</a></li>
						<li><a href="budowanie.php">Budowanie</a></li>
					</ul>
				</li>
				<li><a href="#">Baza przykładów</a>
					<ul>
						<li><a href="baza.php">Zobacz przykłady</a></li>
						<li><a href="dodaj.php">Dodaj przykład</a></li>
					</ul>
				</li>
				<li><a href="logout.php">Wyloguj się</a></li>
			</ol>
		
		</div>
		
		<div class="content">
		
		<img class="center" src="img/designtab.jpg" alt="Design" /></br>
		
		<img class="center" src="img/blockstab.png" alt="Bloki" /></br>
		
		</div>

		<div class="footer">Programowanie w App Inventor 2</div>
	</div>
	
	<script src="jquery-1.11.3.min.js"></script>
	
	<script>

	$(document).ready(function() {
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>
	
</body>
</html>