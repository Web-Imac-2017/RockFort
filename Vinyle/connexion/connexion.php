<?php

            // Connexion à la base
	$connexion = new PDO("mysql:host=localhost;dbname=vinylestore;","root","");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET CHARACTER SET utf8");

?>

