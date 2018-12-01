<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once("connect.php");
	
	if($_SESSION['UPDATEuserid']>=0){
		$userID=$_SESSION['UPDATEuserid'];
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$tel=$_POST['telefon'];
		$email=$_POST['email'];
	}
	
	if($_SESSION['UPDATEuserid']>=0){
		echo "UPDATE user<br>";
		//UPDATE USER
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "UPDATE users SET imie='$imie', nazwisko='$nazwisko', tel='$tel', email='$email' WHERE id=$userID";
			if ($connect->query($sql) === TRUE) { 
				echo "USER updated successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
	}
	
	$_SESSION['UPDATEuserid']=(-1);
	header("Location: klienci.php");
?>