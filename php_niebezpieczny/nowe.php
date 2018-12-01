<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dodaj zgłoszenie - SerwisIT</title>

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
                    	<!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Rozwiń nawigację</span>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span><br>
                            <span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-minus"></span>
                          </button>
                        </div>
                        
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
                      <a href="nowe.php" class="list-group-item active">Dodaj nowe</a>
                      <a href="klienci.php" class="list-group-item">Klienci</a>
                      <a href="archiwalne.php" class="list-group-item">Archiwalne</a>
                    </div>
                </aside>
                
                <div class="col-md-9">
                	<h2>Dodaj nowe zgłoszenie</h2>
                    
                    <form role="form" method="post" action="dodaj.php">
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Dane klienta</h3>
                            <div class="form-group">
                                <label for="imie">Imię</label>
                                <input type="text" class="form-control" name="imie" id="imie">  
                            </div>
                            <div class="form-group">
                                <label for="nazwisko">Nazwisko</label>
                                <input type="text" class="form-control" name="nazwisko" id="nazwisko">  
                            </div>
                            <div class="form-group">
                                <label for="telefon">Numer telefonu</label>
                                <input type="text" class="form-control" name="telefon" id="telefon">  
                            </div>
                            <div class="form-group">
                                <label for="email">Adres email</label>
                                <input type="text" class="form-control" name="email" id="email">  
                            </div>
                         </div>  
                         <div class="col-md-5 col-md-offset-1">   
                            <h3>Urządzenie</h3>
                            <div class="form-group">
                                <label for="producent">Producent</label>
                                <input type="text" class="form-control" name="producent" id="producent">  
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" name="model" id="model">  
                            </div>
                            <div class="form-group">
                                <label for="sn">*Numer seryjny</label>
                                <input type="text" class="form-control" name="sn" id="sn">  
                            </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-6 col-md-offset-2">
                            <h3 class="text-center">Usterka</h3>
                                                 
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                  <option>nowe</option>
                                  <option>reklamacja</option>
                                  <option>gwarancja</option>
                                  <option>inne</option>
                                  <option>archiwalne</option>
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="cena">*Cena</label>
                                <input type="text" class="form-control" name="cena" id="cena">  
                            </div>
                            <div class="form-group">
                                <label for="opis">*Opis</label>
                                <textarea class="form-control" id="opis" name="opis" rows="5"></textarea> 
                            </div>
                         </div> 
                     </div>
                     <div class="form-row">
                     	<div class="col-md-5 col-md-offset-6 text-right">
                        	<p>* - opcjonalne</p>
                        </div>
                     </div>
                     <div class="form-row">
                     	<div class="col-md-5 col-md-offset-6 text-right">
                        	<button type="submit" class="btn btn-primary btn-lg" id="dodaj">Dodaj zgłoszenie</button>
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