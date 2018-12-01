<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	
	$serwisId=null;
	$status=null;
	$cena=null;
	$opis=null;
	$userID=null;
	$imie=null;
	$nazwisko=null;
	$tel=null;
	$email=null;
	$urzadzenieId=null;
	$producent=null;
	$model=null;
	$sn=null;
	
	require_once("connect.php");
	if($_SESSION['UPDATEserwisid']>=0){
		$serwisId=$_SESSION['UPDATEserwisid'];
		$status=$_POST['status'];
		$cena=$_POST['cena'];
		$opis=$_POST['opis'];
	}
	
	if($_SESSION['UPDATEuserid']>=0){
		$userID=$_SESSION['UPDATEuserid'];
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$tel=$_POST['telefon'];
		$email=$_POST['email'];
	}
	if($_SESSION['UPDATEurzadzenieid']>=0){
		$urzadzenieId=$_SESSION['UPDATEurzadzenieid'];
		$producent=$_POST['producent'];
		$model=$_POST['model'];
		$sn=$_POST['sn'];
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
	
	
	
	if($_SESSION['UPDATEurzadzenieid']>=0){
		echo "UPDATE urzadzenie<br>";
		//UPDATE URZADZENIE
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "UPDATE urzadzenia SET producent='$producent', model='$model', sn='$sn' WHERE id=$urzadzenieId";
			if ($connect->query($sql) === TRUE) { 
				echo "DEVICE updated successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
	}
	
	
	
	if($_SESSION['UPDATEserwisid']>=0){
		echo "UPDATE serwis<br>";
		//UPDATE SERWIS
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "UPDATE serwisy SET urzadzenie_id='$urzadzenieId', user_id='$userID', status='$status', cena='$cena', opis='$opis' WHERE id=$serwisId";
			if ($connect->query($sql) === TRUE) { 
				echo "SERWIS updated successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
	}
	
	
	
	$_SESSION['UPDATEurzadzenieid']=(-1);
	$_SESSION['UPDATEuserid']=(-1);
	$_SESSION['UPDATEserwisid']=(-1);
	header("Location: aktualne.php");
?>