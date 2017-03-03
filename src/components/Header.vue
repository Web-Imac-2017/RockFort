<template>
  <header class="border-bot">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <a href="/"><img class="logo" src="/src/assets/imgs/logo.png" /></a>
        <img src="" /> <!--Bandeau Orange à faire -->
        <ul class="nav-user right">
          <li><router-link to="/panier">Panier</router-link></li>
          <li><router-link to="/connexion">Déjà inscrit ?</router-link></li>
          <li><router-link to="/inscription">Créer mon compte</router-link></li>
          <li>
            <form class="right" action="/recherche">
              <input type="text" placeholder="rechercher un vinyle" />
            </form>
          </li>
        </ul>
        <ul class="nav-content">
          <li><router-link to="/">Accueil</router-link> |</li>
          <li><router-link to="/store">Le Store</router-link> |</li>
          <li><router-link to="/store/list">Vinyles</router-link> |</li>
          <li><router-link to="/store/list">Platines</router-link> |</li>
          <li><router-link to="/store/list">Coffrets</router-link> |</li>
          <li><router-link to="/abonnement">Abonnement</router-link> |</li>
          <li><router-link to="/offrir">Offrir</router-link> |</li>
          <li><router-link to="/story/list">La Story</router-link></li>
        </ul>
      </div>

    </nav>
  </header>
</template>

<!-- <template>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav nav-justified navbar-nav center-block">
            <div class="left border-bot col-xl-4 col-lg-4 col-lg-4">
              <li><a href="/store">Le store </a>|</li>
              <li><a href="/story">La story</a></li>
            </div>
            <div class="left col-xl-4 col-lg-4">
              <li id="site-logo" class="hidden-xs"><a href="/"><img id="logo-navbar-middle" src="src/assets/imgs/logo.png" width="200" alt="Logo Thing main logo"></a></li>
            </div>
            <div class="left border-bot col-xl-4 col-lg-4">
              <div class="right">
                <li><a href="/basket">Panier </a>|</li>
                <li><a href="/login">Connexion</a></li>
              </div>
            </div>
            <li class="hidden-xs" style="visibility: hidden;"><a href="#">Sixth Link</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template> -->
