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
    <title>Aktualne zgłoszenia - SerwisIT</title>

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
                      <a href="klienci.php" class="list-group-item active">Klienci</a>
                      <a href="archiwalne.php" class="list-group-item">Archiwalne</a>
                    </div>
                </aside>
                
                <div class="col-md-9">
                	<h2>Klienci serwisu</h2>
                    <table class="table table-striped table-hover">
                    <thead>
                    	<tr> <th colspan="2">Imie</th> <th>Nazwisko</th> <th>Numer telefonu</th> <th>Adres e-mail</th> <tr>
                    </thead>
                    <tbody>
                    <?php
					$connect = new mysqli($host, $user, $password, $database);
					if ($connect->connect_errno!=0)
					{
						echo "Error: ".$connect->connect_errno;
					}
					else
					{
						if ($result = $connect->query("SELECT *
														FROM users
														ORDER BY nazwisko DESC"))
						{
							$rows = $result->num_rows;
								if($rows>0)
								{
									
									while($wiersz = $result->fetch_assoc()){
										echo "<tr>";
										$id = $wiersz['id'];
										$imie = $wiersz['imie'];
										$nazwisko = $wiersz['nazwisko'];
										$tel = $wiersz['tel'];
										$email = $wiersz['email'];
																				
										echo "<td><a href=\"osoba.php?id=$id\">
											  <span class=\"glyphicon glyphicon-pencil\"></span>
											</a></td>";
										echo "<td>$imie</td>";
										echo "<td>$nazwisko</td>";
										echo "<td>$tel</td>";
										echo "<td>$email</td>";	
										echo "</tr>";	
									}
										
								} 
							$result->close();
						}
						$connect->close();
					}		
					?>
                    </tbody>
                    </table>
                    
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