<template>
  <header class="border-bot">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="row">
          <ul class="nav-user left">
            <li>
              <a href="/"><img class="logo" src="/src/assets/imgs/logo.png" style="width:50%;"/></a>
            </li>
          </ul>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav-user">
            <li class='hidden-xs' v-on:click="connexionToggle" v-if="loggedIn">
              <router-link to="">Se déconnecter</router-link>
            </li>
            <li class='hidden-xs' v-on:click="connexionToggle" v-else>
              <router-link to="">Se connecter</router-link>
            </li>
            <li class='hidden-xs' v-on:click="registerToggle">
              <router-link to="">Créer mon compte</router-link>
            </li>
            <li>
              <form v-on:keydown.enter.prevent="goToRecherche()">
                <input type="text" v-model="rechercheString" placeholder="The doors, ACDC, ..." v-on:keyup="emitRechercheHeader()" />
                <a class="search" href="/"><img class="searchIcon" src="/src/assets/imgs/search.png"/></a>
              </form>
            </li>
            <span class="hidden-xs"><ShoppingCart></ShoppingCart></span>
          </ul>
          <div class="connexion" v-bind:class="{ connexionHidden: isActiveConnexion }">
            <div class="container">
              <div class="col-md-offset-4 col-md-4 connexion-box">
                <button class="closeformLoginButton" v-on:click.prevent="connexionToggle">X</button>
                <h2 class="top-title">Pas de compte ?</h2>
                <button class="formLoginButton" v-on:click="registerToggle">Je m'inscris !</button>
                <h2>Se connecter</h2>
                <form  v-on:submit.prevent="onSubmit()">
                  <input type="text" v-model="email" placeholder="adresse e-mail" />
                  <input type="password" v-model="password" placeholder="mot de passe" />
                  <button class="formLoginButton" value="submit" :disabled="loggingIn" >Je me connecte</button>
                </form>
              </div>
            </div>
          </div>
          <div class="register" v-bind:class="{ registerHidden: isActiveRegister }">
            <div class="container">
              <div class="col-md-offset-4 col-md-4 register-box">
                <button class="closeformLoginButton" v-on:click.prevent="registerToggle">X</button>
                <h2>Inscription</h2>
                <form  v-on:submit.prevent="onSubmit()">
                  <input type="text" v-model="email" placeholder="adresse e-mail" />
                  <input type="password" v-model="password" placeholder="mot de passe" />
                  <input type="password" v-model="passwordconf" placeholder="Confirmer mot de passe" />
                  <button class="formLoginButton" value="submit" :disabled="loggingIn">Je m'inscris !</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse nopadding">
          <ul class="nav-content nopadding">
            <li><router-link to="/">Accueil</router-link></li>
            <li><router-link to="/store">Le Store</router-link></li>
            <li @click="emitTypeFromHeader()"><router-link to="/store/vinyles/tout/date-desc">Vinyles</router-link></li>
            <li @click="emitTypeFromHeader()"><router-link to="/store/platines/tout/date-desc">Platines</router-link></li>
            <li @click="emitTypeFromHeader()"><router-link to="/store/coffrets/tout/date-desc">Coffrets</router-link></li>
            <li><router-link to="/abonnement">Abonnement</router-link></li>
            <li><router-link to="/story/tout/date-desc">La Story</router-link></li>
            <li class='hidden-md hidden-xl' v-on:click="connexionToggle" v-if="loggedIn"><router-link to="">Se déconnecter</router-link></li>
            <li class='hidden-md hidden-xl' v-on:click="connexionToggle" v-else><router-link to="">Se connecter</router-link></li>
            <li class='hidden-md hidden-xl' v-on:click="registerToggle"><router-link to="">Créer mon compte</router-link></li>
            <li><span class="hidden-md hidden-xl"><ShoppingCart></ShoppingCart></span></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>
<script >
import { Bus } from './bus.js';
import ShoppingCart from './ShoppingCart.vue'
import jsSHA from './sha256.js'

export default{
  components: {
    ShoppingCart
  },
  data () {
    return{
      rechercheString: "",
      isActiveConnexion: true,
      isActiveRegister: true,

      email: null,
      password: null,
      passwordconf: null,

      alerts: [],
      loggingIn: false
    }
  },
  mounted () {
    this.$http.get('/src/jsonTest.json').then((response) => {
      this.users = response.data
    }, (response) => {
      console.log("erreur", response)
    })
  },
  created() {
    Bus.$on('tri-par', triPar => {
      this.triPar = triPar;
    }),
    Bus.$on('recherche-genre', filtreGenre => {
      this.filtreGenre = filtreGenre;
    }),
    Bus.$on('recherche-string', rechercheString => {
      this.rechercheString = rechercheString;
    }),
    Bus.$on('type-produit', typeProduit => {
      this.typeProduit = typeProduit;
    })
  },
  computed:{
    loggedIn () {
      return this.$root.authenticated
    },
    isValid: function() {
      return (this.email.indexOf(' ') < 0) && (this.password.indexOf(' ') < 0);
    },
    isComplete: function() {
      return (this.email != '') && (this.password != '');
    },
    isSimilar: function() {
      return this.password === this.passwordconf;
    }
  },
  methods: {
    goToRecherche(){this.$router.push({ name: 'store', params: { type: 'recherche', genre: 'tout', sort: 'date-desc'  }})},

    emitRechercheHeader(){
      Bus.$emit('recherche-string', this.rechercheString)
      Bus.$emit('type-produit', window.location.pathname.split("/").slice(2,3).pop())
    },

    emitTypeFromHeader(){
      var type = window.location.pathname.split("/").slice(2,3).pop();
      Bus.$emit('type-produit', type);
    },

    connexionToggle() {
      this.isActiveConnexion = !this.isActiveConnexion;
      return this.isActiveConnexion;
    },

    registerToggle() {
      this.isActiveConnexion = true;
      this.isActiveRegister = !this.isActiveRegister;
      return this.isActiveRegister;
    },
    onSubmit() {
        console.log("lol");
        if(!this.isValid || !this.isComplete || !this.isSimilar) return;
        var shaObj = new jsSHA('SHA-256', 'TEXT');
        this.$http.post(ROUTE, {
          email: this.email,
          passwordHash: shaObj.getHash('HEX')
        }).then(function(res) {
          if(res.status == 200 && res.data.success) {
            console.log('Added.');
            isActiveRegister = true
          } else {
            console.log('Error.');
          }
        });
    }
  }
}
</script>
