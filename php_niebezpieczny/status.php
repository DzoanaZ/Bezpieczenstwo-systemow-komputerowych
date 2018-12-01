<?php
	session_start();

	if((!isset($_POST['kod'])) && (!isset($_COOKIE['kod'])) ){
		header('Location: index.php');
		exit();
	}
	$kodNaprawy=null;
	if(!isset($_COOKIE['kod'])){
			setcookie('kod', $_POST['kod'], time() + (1800), "/");
			
			$kodNaprawy = $_POST['kod'];
	}
	else{
		if(isset($_POST['kod']))
			$kodNaprawy = $_POST['kod'];
		else
			$kodNaprawy = $_COOKIE['kod'];
	}
	
	require_once("connect.php");
	
	$kodNaprawy = htmlentities($kodNaprawy, ENT_QUOTES, "UTF-8");

	$serwisId=$kodNaprawy;
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
	$data=null;
	
	
	
	$connect = new mysqli($host, $user, $password, $database);
	if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		if ($result = $connect->query("SELECT 
										serwisy.id as id,
										serwisy.urzadzenie_id as urzadzenieID,
										serwisy.user_id as userID,
										urzadzenia.producent as producent, 
										urzadzenia.model as model,
										urzadzenia.sn as sn, 
										users.imie as imie,
										users.nazwisko as nazwisko,
										users.tel as tel,
										users.email as email,
										serwisy.status as status,
										serwisy.cena as cena,
										serwisy.data as data,
										serwisy.opis as opis
									FROM serwisy, urzadzenia, users
									WHERE serwisy.urzadzenie_id = urzadzenia.id 
										AND serwisy.user_id = users.id
										AND serwisy.id='$serwisId'"))
		{
			$rows = $result->num_rows;
				if($rows>0)
				{
					while($wiersz = $result->fetch_assoc()){
						$serwisId = $wiersz['id'];
						$status=$wiersz['status'];
						$cena=$wiersz['cena'];
						$opis=$wiersz['opis'];
						
						$userID=$wiersz['userID'];
						$imie=$wiersz['imie'];
						$nazwisko=$wiersz['nazwisko'];
						$tel=$wiersz['tel'];
						$email=$wiersz['email'];
						
						$urzadzenieId=$wiersz['urzadzenieID'];
						$producent=$wiersz['producent'];
						$model=$wiersz['model'];
						$sn=$wiersz['sn'];
						$data=$wiersz['data'];
					}
						
				} 
			$result->close();
		}
		$connect->close();
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
                            <li class="active"><a href="index.php">Główna</a></li>
                            <li><a href="#status">Status</a></li>
                            <li><a href="#kontakt">Kontakt</a></li>  
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      
                    </nav>
                </div><!-- /col -->
            </div><!-- /row -->
        </header>
        
        <section class="container tresc">
        	<article class="row">
            	<?php  if($status!=null){?>
                    <div class="col-md-5 col-md-offset-2">
                        <h3>Status naprawy o numerze: <?php echo $kodNaprawy; ?>
                        <br><small>Przyjeto dnia <?php echo date('d-m-Y H:i',strtotime($data)); ?></small></h3>
                    </div>
                 
                    <div class="col-md-12">
                        <div id="status" class="col-md-6 col-md-offset-3">
                            <table class="table table-striped">
                                <tr> <th>Producent</th> <th>Model</th> <th>Status</th> <th>Opis usterki</th> <th>Szacowana cena</th> </tr>
                                <tr> <td><?php echo $producent; ?></td> 
                                        <td><?php echo $model; ?></td> 
                                        <td><?php echo $status; ?></td> 
                                        <td><?php echo $opis; ?></td> 
                                        <td><?php echo $cena ?></td> 
                                 </tr>
                            </table>
                        </div>
                    <?php }
					else{
					?>
                    	<div class="col-md-5 col-md-offset-2">
                        <h3>Brak naprawy o kodzie: <?php echo $kodNaprawy; ?></h3>
                    </div>
                   <?php
					}
				   ?>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
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