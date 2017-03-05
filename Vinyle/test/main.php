<h2>Connexion</h2>

<center>
<form action="#"  method="post">
	<p> Login : </p> <input type="text" name="identifiant"/> <br/>
	<p> Mot de passe : </p> <input type="password" name="mdp"/> <br/>
	<input type="submit"/>
</form>
</center>


<?php

    include '../connexion/connexion.php';
    include '../class/client.php';
    

    $client = new Client("mat", "mat", "kimoko", "mathieu", "mat", "mat");

    if(isset($_POST['identifiant'])){
	    $identifiant = htmlspecialchars($_POST['identifiant']);
	    $mdp = htmlspecialchars($_POST['mdp']);
	    $id = connexion($identifiant, $mdp);
    }
?>