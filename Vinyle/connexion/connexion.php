<?php

            // Connexion à la base
	$pdo = new PDO("mysql:host=localhost;dbname=vinylestore.sql;","root","");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET CHARACTER SET utf8");

?>

