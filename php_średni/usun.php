
<?php

	session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}

require_once "connect1.php";
	
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

$id = $_GET['id'];
 
$rezultat = mysqli_query($polaczenie, "DELETE FROM przyklady WHERE id=$id");
 
header("Location:baza.php");

?>