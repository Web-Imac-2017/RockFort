<template>
	<div class="menu col-md-2">

      <router-link to="/accueil"><img class="logo" src="../assets/imgs/logo.png"></router-link>

      <h3 class="navtitle">Contenu</h3>
      <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav">
              <li><router-link to="/ajouter">Ajouter</router-link></li>
              <li><router-link to="/modifier">Modifier</router-link></li>
              <li><router-link to="/supprimer">Supprimer</router-link></li>
            </ul>
          </div>
        </div>
      </div>

      <h3 class="navtitle">Produits</h3>
      <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav">
              <li><router-link to="/accueil">Passer une commande</router-link></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
</template>