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
			
			<?php
			
			echo"<p>Witaj ".$_SESSION['user']."!";
			
			?>
			
			<p>App Inventor jest narzędziem dostarczanym przez Google (obecnie Google przekazało pieczę
			nad projektem do MIT) służącym do tworzenia aplikacji na platformę Android. Narzędzie to wykorzystuje
			metody tzw. MDE (ang. Model Driven Engineering), czyli inżynierii sterowanej modelami, dlatego też do
			korzystania z App Inventor nie jest niezbędna specjalistyczna wiedza z dziedziny programowania w
			Androidzie. Developer zamiast pisać kod, buduje modele z gotowych elementów. </p>
			
			<p>Aplikacje powstałe przy użyciu App Inventor są tworzone przy pomocy przeglądarki internetowej
			i specjalnej aplikacji korzystającej ze środowiska Java. Wynikowe aplikacje mogą być uruchamiane na	
			fizycznych urządzeniach podłączonych do komputera lub na emulatorze. Podobnie jak w przypadku	
			Google Docs projekty aplikacji są przechowywane na zewnętrznych serwerach. </p>
			
			<p>Na kompletne środowisko developerskie, oprócz środowiska Java, składa się:<br>
			1. Android SDK – zestaw narzędzi do tworzenia oprogramowania na platformę Android zawierający
			emulator urządzenia.<br>
			2. App Inventor Designer – narzędzie dostępne w oknie przeglądarki internetowej służące do
			projektowania interfejsu użytkownika.<br>
			3. App Inventor Blocks Editor – narzędzie uruchamiane lokalnie na komputerze służące do
			projektowania zachowania (logiki) aplikacji.
			</p>
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