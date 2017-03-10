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
          <ul class="nav-user right">
            <ShoppingCart></ShoppingCart>
            <li v-on:click="connexionToggle">
              <router-link to="">Se connecter</router-link>
            </li>
            <li><router-link to="/inscription">Créer mon compte</router-link></li>
            <li>
              <form v-on:keydown.enter.prevent="goToRecherche()">
                <input type="text" v-model="rechercheString" placeholder="The doors, ACDC, ..." v-on:keyup="emitRechercheHeader()" />
                <a href="/"><img class="searchIcon" src="/src/assets/imgs/search.png"/></a>
              </form>
            </li>
          </ul>
          <div class="connexion" v-bind:class="{ connexionHidden: isActive }">
            <div class="container">
              <div class="col-md-offset-4 col-md-4 connexion-box">
                <button class="close" v-on:click.prevent="connexionToggle">CLOSE</button>
                <h2>Se connecter</h2>
                <form>
                    <input type="text" v-model="nomUser" placeholder="adresse e-mail" />
                    <input type="password" v-model="passwordUser" placeholder="mot de passe" />
                    <button @click.prevent="onSubmit()">CONNEXION</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <ul class="nav-content">
          <li><router-link to="/">Accueil</router-link> |</li>
          <li><router-link to="/store">Le Store</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/vinyles/tout/date-desc">Vinyles</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/platines/tout/date-desc">Platines</router-link> |</li>
          <li @click="emitTypeFromHeader()"><router-link to="/store/coffrets/tout/date-desc">Coffrets</router-link> |</li>
          <li><router-link to="/abonnement">Abonnement</router-link> |</li>
          <li><router-link to="/story/tout/date-desc">La Story</router-link></li>
        </ul>
      </div>
    </nav>
  </header>
</template>
<script >
import { Bus } from './bus.js';
import jsSHA from './sha256.js';
import ShoppingCart from './ShoppingCart.vue'

export default{
  components: {
    ShoppingCart
  },
  data () {
    return{
      rechercheString: "",
      isActive: true,
      users: [],
      nomUser:"",
      passwordUser:""
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
      console.log("list Bus.$on('recherche-genre', filtreGenre => " + filtreGenre)
      this.filtreGenre = filtreGenre;
    }),
    Bus.$on('recherche-string', rechercheString => {
      this.rechercheString = rechercheString;
    }),
    Bus.$on('type-produit', typeProduit => {
      this.typeProduit = typeProduit;
      console.log("this.typeProduit" + this.typeProduit)
    })
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

    onSubmit(){
      var userArray = this.users;

      var username = this.nomUser;
      var password = new jsSHA('SHA-256', 'TEXT');
      password.update(this.passwordUser);

      console.log('pwd' + password.getHash('HEX'))

      userArray = userArray.filter(function(item){
        if(item.name.toLowerCase().indexOf(username) !== -1 && item.password.toLowerCase().indexOf(password) !== -1){
          return item;
        }
      })


    }
  }
}
</script>
