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
            <li class='hidden-xs'><router-link to="/inscription">Créer mon compte</router-link></li>
            <li>
              <form v-on:keydown.enter.prevent="goToRecherche()">
                <input type="text" v-model="rechercheString" placeholder="The doors, ACDC, ..." v-on:keyup="emitRechercheHeader()" />
                <a class="search" href="/"><img class="searchIcon" src="/src/assets/imgs/search.png"/></a>
              </form>
            </li>
            <span class="hidden-xs"><ShoppingCart></ShoppingCart></span>
          </ul>
          <div class="connexion" v-bind:class="{ connexionHidden: isActive }">
            <div class="container">
              <div class="col-md-offset-4 col-md-4 connexion-box">
                <button class="close" v-on:click.prevent="connexionToggle">CLOSE</button>
                <h2>Se connecter</h2>
                <form  v-on:submit.prevent="onSubmit()">
                  <input type="text" v-model="formUser.email" placeholder="adresse e-mail" />
                  <input type="password" v-model="formUser.password" placeholder="mot de passe" />
                  <button value="submit" :disabled="loggingIn" >CONNEXION</button>
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
            <span class="hidden-md hidden-xl"><ShoppingCart></ShoppingCart></span>
          </ul>
        </div>
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
      rechercheString: "",
      isActive: true,

      formUser: {
        email: null,
        password: null
      },
      alerts: [],
      loggingIn: false
    }
  },
  mounted () {
    this.$http.get('/src/jsonTest.json').then((response) => {
      console.log("success", response)
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
      Bus.$emit('type-produit', type)
    },

    connexionToggle() {
      console.log(!this.isActive)
      this.isActive = !this.isActive;
      return this.isActive;
    },

    onSubmit () {
      this.loggingIn = true
      this.$http.post('http://demo8495022.mockable.io/', this.formUser).then((response) => {
        localStorage.setItem('jwt-token', response.json()['token'])
        this.getUserData()
      }, (response) => {
        this.alerts = []
        if (response.status === 401) {
          this.alerts.push({
            type: 'danger',
            message: 'Sorry, you provided invalid credentials'
          })
        }
        this.loggingIn = false
      })
    },
    
    getUserData () {
      this.$http.get('/src/jsonTestUser.json').then((response) => {
        console.log("lol2");
        Bus.$emit('userLoggedIn', response.json()['data'])
        console.log("lol3");
        this.isActive = !this.isActive;
      }, (response) => {
        console.log(response)
      })
    }
  }
}
</script>
