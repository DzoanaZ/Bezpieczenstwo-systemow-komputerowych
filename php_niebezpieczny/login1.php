<?php
require "db_connect.php";
error_reporting(0)
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SQL Injection demo">
    <meta name="author" content="Francesco Borzì">

    <title>SQL Injection Demo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
<br>
    <h1>Logowanie niebezpieczne</h1>
    <br>

    <?php
    if ($_GET['attempt'] != 1) {
        ?>

        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <form class="form-horizontal" role="form" action="login1.php?attempt=1" method="POST">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <input name="username" type="text" class="form-control" id="inputEmail3"
                                   placeholder="Login">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <input name="password" type="text" class="form-control" id="inputPassword3"
                                   placeholder="Hasło">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Zaloguj</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
            $username,
            $password);

        $result = mysqli_query($connection, $query);

        if ($result->num_rows > 0) {
            echo "<p class=\"text-center\">Zalogowany jako: <strong>" . $username . "</strong></p>";

        } else {
            echo "<p class=\"text-center\">Zła nazwa użytkownika/hasło</p>";
        }
        ?>

        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h4>Query Executed:</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="highlight">
                    <pre><?= $query ?></pre>
                </div>
            </div>
        </div>

    <?php } ?>

    <hr>
    <div class="row">
        <div class="col-sm-12">
            <h4>Kod php:</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="highlight">
            <pre>
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
            $username,
            $password);

        $result = mysqli_query($connection, $query);

        if ($result->num_rows > 0) {
            echo "<p class=\"text-center\">Zalogowany jako: <strong>" . $username . "</strong></p>";

        } else {
            echo "<p class=\"text-center\">Zła nazwa użytkownika/hasło</p>";
        }
            </pre>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-12">
            <h4>Narazony na:</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="highlight">
            <pre>
wpisz <strong>1' OR '1'='1</strong> jako haslo zeby sie zalogowac.
            </pre>
            </div>
        </div>
    </div>

    <br>

    <?php include("footer.php"); ?>

</div> <!-- /container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
