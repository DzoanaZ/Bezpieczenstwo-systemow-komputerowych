<?php

	session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
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

		<div class="nav">
			<ol>
				<li><a href="login.php">Zaloguj się</a></li>
				<li><a href="rejestracja.php">Zarejestruj się</a>
			</ol>
		</div>
		
		<div class="content">
		<div class="buttonHolder">
			<form action="zaloguj.php" method="post">
			Login: </br><input type="text" name="login"/><br/><br/>
			Hasło: </br><input type="password" name="haslo"/><br/><br/><br/>
			<input type="submit" value="Zaloguj się"/><br/><br/>
			
			<?php
			
			if(isset($_SESSION['blad'])) echo $_SESSION['blad'];

			?>
		
			</form><br/><br/>
		</div>
		</div>
	</div>

</body>
</html>