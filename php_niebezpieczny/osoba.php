<?php
	session_start();
	
	$_SESSION['UPDATEuserid'] = (-1);
	$_SESSION['UPDATEserwisid'] = (-1);
	$_SESSION['UPDATEurzadzenieid'] = (-1);
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if(!isset($_GET['id'])){
		header("Location:aktualne.php");
		exit();
	}
	require_once("connect.php");
	
	
	$userID=$_GET['id'];;
	$imie=null;
	$nazwisko=null;
	$tel=null;
	$email=null;
	
	
	
	
	$connect = new mysqli($host, $user, $password, $database);
	if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		if ($result = $connect->query("SELECT *
									FROM users
									WHERE id = '$userID'"))
		{
			$rows = $result->num_rows;
				if($rows>0)
				{
					
					while($wiersz = $result->fetch_assoc()){
						$imie=$wiersz['imie'];
						$nazwisko=$wiersz['nazwisko'];
						$tel=$wiersz['tel'];
						$email=$wiersz['email'];		
					}
						
				} 
			$result->close();
		}
		$connect->close();
	}
			
		$_SESSION['UPDATEuserid'] = $userID;

?>
<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edytuj zgłoszenie - SerwisIT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
   
        <header class="container-fluid">
        	<div class="row textura">
        		<h1 class="col-md-3 col-md-offset-2">Serwis IT<small><br>przeskocz technologię</small></h1>
               
                <div class="col-md-6 col-md-offset-6">
                    <nav class="navbar navbar-main textura">
                    	<div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Rozwiń nawigację</span>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span>
                          </button>
                        </div>
                        
                        <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><?php echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>'; ?></li>
                            
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      
                    </nav>
                </div><!-- /col -->
            </div><!-- /row -->
        </header>
        
        <section class="container-fluid">
            <class class="row">
            	<aside class="col-md-3">
                	<br><br><br><br>
                    <div class="list-group">
                      <a href="aktualne.php" class="list-group-item">Aktualne zgłoszenia</a>
                      <a href="nowe.php" class="list-group-item">Dodaj nowe</a>
                      <a href="klienci.php" class="list-group-item">Klienci</a>
                      <a href="archiwalne.php" class="list-group-item">Archiwalne</a>
                    </div>
                </aside>
                
                <div class="col-md-9">
                	<h2>Edycja danych klienta</h2>
                    
                    <form role="form" method="post" action="update-klient.php">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="imie">Imię</label>
                                <input type="text" class="form-control" name="imie" id="imie" <?php echo "value=\"$imie\" ";?> >  
                            </div>
                            <div class="form-group">
                                <label for="nazwisko">Nazwisko</label>
                                <input type="text" class="form-control" name="nazwisko" id="nazwisko" <?php echo "value=\"$nazwisko\" ";?> >  
                            </div>
                            <div class="form-group">
                                <label for="telefon">Numer telefonu</label>
                                <input type="text" class="form-control" name="telefon" id="telefon" <?php echo "value=\"$tel\" ";?> > 
                            </div>
                            <div class="form-group">
                                <label for="email">Adres email</label>
                                <input type="text" class="form-control" name="email" id="email" <?php echo "value=\"$email\" ";?> >  
                            </div>
                         </div>  
                         
                      </div>
                      
                     <br>
                     <div class="form-row">
                     	<div class="col-md-5 col-md-offset-6 text-right">
                        	<button type="submit" class="btn btn-primary btn-lg" id="dodaj">Aktualizuj dane</button>
                        </div>
                     </div>
                    </form>
                    
                    
                </div>
            </class>
        </section>
   
   		<footer class="container-fluid textura">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-3 text-center">
                	<h3>Paweł Skocz<br>
                    <small>Uniwersytet Rzeszowski 2017/2018<br>III rok, studia zaoczne<br><span id="kontakt">skoczp@gmail.com</span></small>
                    </h3>
                </div>
            </div>
        </footer>
        
   	<script>
		var button = document.getElementById('dodaj');

		button.addEventListener('click', function(e) {
			var textBox = document.getElementById('imie');
			var textBox1 = document.getElementById('nazwisko');
			var textBox2 = document.getElementById('telefon');
			var textBox3 = document.getElementById('email');
			var textBox4 = document.getElementById('producent');
			var textBox5 = document.getElementById('model');
		
			if (textBox.value == '' || textBox1.value == '' || textBox2.value == '' ||
			 textBox3.value == '' || textBox4.value == '' || textBox5.value == '') 
			 {
				e.preventDefault();
				alert('Wypełnij wymagane pola formularza!');
			}
		});
	</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>