<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: aktualne.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serwis komputerowy</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
	<script src="js/przewijanie.js"></script>
  </head>
  <body>
   
        <header class="container-fluid">
        	<div class="row textura">
        		<h1 class="col-md-3 col-md-offset-2">Serwis IT<small><br>przeskocz technologię</small></h1>
                <div class="col-md-6 col-md-offset-6">
                    <nav class="navbar">
                    	<!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
                        
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Rozwiń nawigację</span>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span>
                          </button>
                        </div>

                        <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
                        <div class="collapse navbar-collapse navbar-main" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Główna</a></li>
                            <li><a href="#status">Status</a></li>
                            <li><a href="#kontakt">Kontakt</a></li>  
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      
                    </nav>
                </div><!-- /col -->
            </div><!-- /row -->
            <div class="row">
            	<div class="col-md-6 col-md-offset-3 text-center">
                	<h1 class="margin200 green">Sprawdź status swojej naprawy!<br><br>
                	<a href="#status" class="btn btn-info btn-lg">
                      <span class="glyphicon glyphicon-wrench"></span> 
                    </a></h1>
                </div>
            </div> 
        </header>
        
        <section class="container tresc">
        	<article class="col-md-12">
            	<?php
                	if(isset($_SESSION['brak_id'])){
						if($_SESSION['brak_id']==true)	
							echo "<br><br><div class=\"alert alert-danger\"><p class=\"text-center\">Błędny kod naprawy. Spróbuj jescze raz!</p></div>";
					}
				?>
                <form role="form" method="post" action="status.php">
                	<br><br><br>
                	<div class="form-group col-md-4 col-md-offset-4 text-center">
                        <h4><label for="status">Wprowadź kod zgłoszenia: </label></h4>
                        <input type="text" class="form-control" id="status" name="kod" placeholder="Kod">
                        <br>
                        <button id="wyslij" type="submit" class="btn btn-success btn-lg">Sprawdź!</button>
                      </div>
                </form>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
            </article>
        </section>
   
   		<footer class="container-fluid textura">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-1">
                	<h3>Paweł Skocz<br>
                    <small>Uniwersytet Rzeszowski 2017/2018<br>III rok, studia zaoczne<br><span id="kontakt">skoczp@gmail.com</span></small>
                    </h3>
                </div>
                <div class="col-md-3 col-md-offset-2 text-right">
                <?php
					if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
				?>	
                	<h4>Zaloguj się</h4>
                	<form role="form" action="zaloguj.php" method="post">
                      <div class="form-group">
                        
                        <input type="email" class="form-control" name="login" id="exampleInputEmail1" placeholder="Podaj adres Email">
                      </div>
                      <div class="form-group">
                        
                        <input type="password" class="form-control" name="haslo" id="exampleInputPassword1" placeholder="Twoje hasło">
                      </div>
                      <button type="submit" class="btn btn-default btn-success">Zaloguj!</button>
                    </form> 
                </div>
            </div>
        </footer>
     <?php
     	$_SESSION['brak_id']=false;
	 ?>
    <script>
		var button = document.getElementById('wyslij');

		button.addEventListener('click', function(e) {
			var textBox = document.getElementById('status');
		
			if (textBox.value == '') {
				e.preventDefault();
				alert('Wypełnij pole formularza!');
			}
		});
	</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>