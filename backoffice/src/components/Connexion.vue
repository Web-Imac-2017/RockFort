<template>
	<div id="connect">
		<div class="body col-md-4 col-md-offset-4" id="connectcontainer">

			<img class="logo" src="../assets/imgs/logo.png">

	        <h1 id="welcome">Connectez-vous pour accéder au backoffice</h1>

	        <form id="connectform">

		        <div class="form-group">
	                <input type="email" class="form-control" placeholder="Adresse e-mail">
	            </div>

	            <div class="form-group">
	                <input type="password" class="form-control" placeholder="Mot de passe">
	            </div>

		        <router-link to="/accueil"><button type="submit" class="btn btn-primary btnconnect">Connexion</button></router-link>

	        </form>

    	</div>

	</div>
</template>