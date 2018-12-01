<?php

	session_start();

	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: login.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
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
				<li><a href="login.php">Zaloguj się</a></li>
				<li><a href="rejestracja.php">Zarejestruj się</a>
			</ol>
		</div>
		
		<div class="content">
		<div class="buttonHolder">
		<p>Dziękujemy za rejestracje w serwisie! Możesz już zalogować się na swoje konto!</p></br>
		</div>
		</div>
		<div class="footer">Programowanie w App Inventor 2</div>
	</div>

</body>
</html>