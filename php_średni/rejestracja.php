<?php

	session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
	}
	
	if (isset($_POST['email']))
	{
		$wszystko_ok=true;
		
		$login = $_POST['login'];
		
		if ((strlen($login)<3) || (strlen($login)>20))
		{
			$wszystko_ok=false;
			$_SESSION['e_login']="Login musi mieć od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($login)==false)
		{
			$wszystko_ok=false;
			$_SESSION['e_login']="Login może składać się tylko z cyfr i liter (bez polskich znaków)!";
		}
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_ok=false;
			$_SESSION['e_email']="Podaj poprawny e-mail!";
		}
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1 != $haslo2)
		{
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}
		
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		$sekret = "6Ld7hSQUAAAAAE4gXT-q-VDjdvA9Tojur6jLj_1U";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_ok=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_ok=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}
				
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_ok=false;
					$_SESSION['e_login']="Istnieje już konto o takim loginie!";
				}
				
				if($wszystko_ok == true)
				{
					if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			//echo '<br/> Inf dev: '.$e;
		}
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Programowanie w App Inventor 2</title>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
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
			<form method="post">
			
			Login:<br/> <input type="text" name="login" /><br/> 
			
			<?php
				if(isset($_SESSION['e_login']))
				{
					echo '<div class="error">'.$_SESSION['e_login'].'</div>';
					unset($_SESSION['e_login']);
				}
			?>
			
			E-mail:<br/> <input type="text" name="email" /><br/> 
			
			<?php
				if(isset($_SESSION['e_email']))
				{
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
			?>
			
			Hasło:<br/> <input type="password" name="haslo1" /><br/> 
			
			<?php
				if(isset($_SESSION['e_haslo']))
				{
					echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
					unset($_SESSION['e_haslo']);
				}
			?>
			
			Powtórz hasło:<br/> <input type="password" name="haslo2" /><br/> <br/> 
			<div class="recap">
			<div class="g-recaptcha" data-sitekey="6Ld7hSQUAAAAALIjDFfT_L9Sc6CjGxdY0a_UUAYJ"></div>
			</div>
			<?php
				if(isset($_SESSION['e_bot']))
				{
					echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
					unset($_SESSION['e_bot']);
				}
			?>
			<br/>
			
			<input type="submit" value="Zarejestruj się" />
			
			</form><br/> <br/> 
		</div>
		</div>
	</div>

</body>
</html>