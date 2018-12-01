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
			<p>App Inventor działa w przeglądarce internetowej pod adresem: <a href="http://ai2.appinventor.mit.edu.com">http://ai2.appinventor.mit.edu.com</a></p>
			
			<p>Do jego wykorzystania niezbędne jest zalogowanie poprzez konto Google.</p>
			
			<p>Podczas tworzenia gier warto testować poszczególne funkcje wprowadzane przez nas do projektu. Aby móc to zrobić, niezbędne jest nawiązanie połączenia pomiędzy
			App Inventorem a fizycznym urządzeniem z Androidem bądź emulatorem Androida. Opcje służące do połączenia uruchomimy z poziomu menu Connect.</p>
			
			<img class="center" src="img/connect.jpg" alt="Connect" />
			
			<p>Opcja USB pozwala na przetestowanie tworzonego przez nas projektu na podłączonym urządzeniu z Androidem, w którym włączono tryb debuggowania.</p>
			
			<p>Opcja Emulator pozwala na przetestowanie projektu za pomocą wirtualnego urządzenia. Niezbędna jest do tego instalacja odpowiedniego emulatora - aiStarter.</p>
			
			<p>Rekomendowanym przez twórców App Inventora rozwiązaniem jest jednak wykorzystanie opcji AI Companion. Po jej wybraniu wyświetlony zostanie kod QR, który możemy zeskanować poprzez aplikację MIT Ai2 Companion.</p>

			<img class="center" src="img/start1.png" alt="Aplikacja" />
			
			<p>Skaner uruchamiamy za pomocą przycisku scan QR code. Możemy również ręcznie wpisać wyświetlony pod kodem QR tekst w pole Six Character Code.
			Następnie poprzez przycisk connect with code łączymy się z naszym projektem. Co ważne - wprowadzane przez nas w projekcie zmiany będą od razu widoczne w testowanej aplikacji.</p>

			<img class="center" src="img/qr.jpg" alt="QR" /></br>
			
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