<template>
  <header class="border-bot">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <img src="" /> <!--Bandeau Orange à faire -->
        <div class="row">
          <ul class="nav-user left">
            <li>
              <a href="/"><img class="logo" src="/src/assets/imgs/logo.png" style="width:50%;"/></a>
            </li>
          </ul>
          <ul class="nav-user right">
            <ShoppingCart></ShoppingCart>
            <li><router-link to="/panier">Panier</router-link></li>
            <li><router-link to="/connexion">Déjà inscrit ?</router-link></li>
            <li><router-link to="/inscription">Créer mon compte</router-link></li>
            <li>
              <form v-on:keydown.enter.prevent="goToRecherche()">
                <input type="text" v-model="rechercheString" placeholder="The doors, ACDC, ..." v-on:keyup="emitRechercheHeader()" />
                <a href="/"><img class="searchIcon" src="/src/assets/imgs/search.png"/></a>
              </form>
            </li>
          </ul>
        </div>
        <ul class="nav-content">
          <li><router-link to="/">Accueil</router-link> |</li>
          <li><router-link to="/store">Le Store</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/vinyles">Vinyles</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/platines">Platines</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/coffrets">Coffrets</router-link> |</li>
          <li><router-link to="/abonnement">Abonnement</router-link> |</li>
          <li><router-link to="/offrir">Offrir</router-link> |</li>
          <li><router-link to="/story/list">La Story</router-link></li>
        </ul>
      </div>
    </nav>
  </header>
</template>
<script >
import { Bus } from './bus.js';
import ShoppingCart from './ShoppingCart.vue'

export default{
  components: {
    ShoppingCart
  },
  data () {
    return{
      rechercheString: ""
    }
  },
  created() {
    Bus.$on('recherche-string', rechercheString => {
      this.rechercheString = rechercheString;
    })
  },
  methods: {
    goToRecherche(){this.$router.push('/recherche')},

    emitRechercheHeader(){
      Bus.$emit('recherche-string', this.rechercheString)
    },

    emitTypeFromHeader(){
      console.log("LOL" + window.location.pathname.split("/").pop())
      Bus.$emit('type-produit', window.location.pathname.split("/").pop())
    },
  }
}
</script>
