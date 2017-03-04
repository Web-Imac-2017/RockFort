<?php

    $dbname = "mysql:host=localhost;dbname=vinylestore;";
    $dbuser = "root";
    $dbpswd = "";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            // Connexion à la base
	$bdd = new PDO($dbname, $dbuser, $dbpswd, $options);

	//$bdd->query();
	//$bdd->exec("INSERT INTO tag ('nom') VALUES('test')")

    if($bdd === null){ echo 'NO'; } else { echo 'YES'; }

?>
