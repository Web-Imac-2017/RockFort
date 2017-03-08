<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet Vinyle lalala</title>
</head>
<body>
<h1>BONJOUR, je suis le template default, le template de base quoi</h1>
<h2>Steack</h2>
<!--<a href="/">Retour index</a>-->
<!--<a href="../">Retour index</a> <!--celui là marche-->
<a href="<?= FULL_PATH ?>">Retour index</a><br>
<a href="<?= FULL_PATH ?>/test/retest">Aller à retest</a><br>

<?php echo $content; ?>


<?php echo ROOT; ?>

<h3>Fin du template default</h3>
</body>
</html>