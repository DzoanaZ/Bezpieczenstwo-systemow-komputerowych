<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if( !(isset($_POST['imie'])) || !(isset($_POST['nazwisko'])) || !(isset($_POST['telefon']))
		 || !(isset($_POST['email']))  || !(isset($_POST['producent'])) || !(isset($_POST['model']))  )
	{
		header("Location: aktualne.php");
		exit();
	}
	
	require_once("connect.php");
	$user_id=null;
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$email=$_POST['email'];
	$telefon=$_POST['telefon'];
	
	$urzadzenie_id=null;
	$producent=$_POST['producent'];
	$model=$_POST['model'];
	$sn=$_POST['sn'];
	
	$status=$_POST['status'];
	$cena=$_POST['cena'];
	$opis=$_POST['opis'];
	
	//SELECT USER
	$connect = new mysqli($host, $user, $password, $database);
	if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		
		if ($result = $connect->query("SELECT *
										FROM users
										WHERE imie = '$imie' 
											AND nazwisko = '$nazwisko'
											AND tel = $telefon
											AND email = '$email'
										"))
		{
			$rows = $result->num_rows;
				if($rows>0)
				{
					echo "Choose USER<br>"; 
					while($wiersz = $result->fetch_assoc()){
						$user_id = $wiersz['id'];
						
					}
				} 
			$result->close();
		}
		$connect->close();
	}
	//END SELECT USER
	
	if($user_id==null)
	{
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "INSERT INTO users VALUES (null, '$imie', '$nazwisko', $telefon, '$email')";
			if ($connect->query($sql) === TRUE) { 
				echo "New USER created successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
		//SELECT USER
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			if ($result = $connect->query("SELECT *
											FROM users
											WHERE imie = '$imie' 
												AND nazwisko = '$nazwisko'
												AND tel = $telefon
												AND email = '$email'
											"))
			{
				$rows = $result->num_rows;
					if($rows>0)
					{
						echo "Choose USER<br>"; 
						while($wiersz = $result->fetch_assoc()){
							$user_id = $wiersz['id'];
							
						}
					} 
				$result->close();
			}
			$connect->close();
		}
		//END SELECT USER
	}//END $user_id==null
	
	
	
	
	//SELECT URZADZENIE
	$connect = new mysqli($host, $user, $password, $database);
	if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		
		if ($result = $connect->query("SELECT *
										FROM urzadzenia
										WHERE producent = '$producent' 
											AND model = '$model'
											AND sn = '$sn'
										"))
		{
			$rows = $result->num_rows;
				if($rows>0)
				{
					echo "Choose DEVICE <br>";
					while($wiersz = $result->fetch_assoc()){
						$urzadzenie_id = $wiersz['id'];
						
					}
				} 
			$result->close();
		}
		$connect->close();
	}
	//END SELECT URZADZENIE
	
	if($urzadzenie_id==null)
	{
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "INSERT INTO urzadzenia VALUES (null, '$producent', '$model', '$sn')";
			if ($connect->query($sql) === TRUE) { 
				echo "New DEVICE created successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
		//SELECT URZADZENIE
		$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			if ($result = $connect->query("SELECT *
											FROM urzadzenia
											WHERE producent = '$producent' 
												AND model = '$model'
												AND sn = '$sn'
											"))
			{
				$rows = $result->num_rows;
					if($rows>0)
					{
						echo "Choose DEVICE <br>";
						while($wiersz = $result->fetch_assoc()){
							$urzadzenie_id = $wiersz['id'];
							
						}
					} 
				$result->close();
			}
			$connect->close();
		}
		//END SELECT URZADZENIE
	}//END if$urzadzenie_id==null
	
	
	$connect = new mysqli($host, $user, $password, $database);
		if ($connect->connect_errno!=0)
		{
			echo "Error: ".$connect->connect_errno;
		}
		else
		{
			
			$sql = "INSERT INTO serwisy VALUES (null, '$urzadzenie_id', '$user_id', '$status', '$cena', '$opis', default)";
			if ($connect->query($sql) === TRUE) { 
				echo "New SERVICE created successfully<br>"; 
			} 
			else { 
				echo "Error: " . $sql . "<br>" . $connect->error."<br>";
			 }
			$connect->close();
		}
	
	header("Location: aktualne.php");
?>