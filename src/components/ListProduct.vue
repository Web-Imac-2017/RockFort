<template>
  <transition name="fade" appear>
    <div id="listProduct" >
      <div class="container-fluid storeList">
        <div id="lesDisques" class="row">
          <h1 v-if="typeProduit == 'produits'">recherches</h1>
          <h1 v-else>{{typeProduit}}</h1>
        </div>
        <div class="row">
          <div class="col-md-12 nopadding">
            <SearchBarComponent></SearchBarComponent>
          </div>
        </div>
      </div>
      <div class="container listContainer">
        <h2>{{nombreResultats}} {{typeProduit}} {{recherchePrefixe}} {{rechercheString}}</h2>
        <hr />
        <div class="row">
          <product v-for="product in rechercheGeneral(limitProduit)" :product="product"></product>
        </div>
        <div v-if="nombreResultats == 0" class="noresult col-md-offset-3 col-md-6">
          <h2>Désolé ! Nous n'avons trouvé aucun résultat pour votre recherche !</h2>
          <img src="https://media.giphy.com/media/ZJwrPJzxYjNks/giphy.gif" />
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import { Bus } from './bus.js'
import SearchBarComponent from './SearchBar.vue'
import Product from './ProductsLoop.vue'

export default{
  components: {
    SearchBarComponent,
    Product
  },
  data () {
    return {
      typeProduit: window.location.pathname.split("/").slice(2,3).pop(),
      rechercheString: "",
      filtreGenre:"",
      triPar:"",
      recherchePrefixe:"",
      products: [],
      limitProduit: 12,
      nombreResultats: 0
    }
  },
  mounted () {
    this.$http.get("http://localhost:80/vinylestore/api/" + this.typeProduit).then((response) => {
      console.log("successRoute", response)
      this.products = response.data
    }, (response) => {
      console.log("erreur", response)
    })
  },
  created () {
    document.addEventListener('scroll', this.handleScroll);

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
  watch: {
    typeProduit: function () {
      this.$http.get("http://localhost:80/vinylestore/api/" + this.typeProduit).then((response) => {
        console.log("successRoute", response)
        this.products = response.data
      }, (response) => {
        console.log("erreur", response)
      })
    }
  },
  methods: {
    //SEARCH
    rechercheGeneral: function (limit) {
      var resultatsArray = this.products;
      var rechercheString = this.rechercheString;
      var filtreGenre = this.filtreGenre;
      var typeProduit = this.typeProduit;
      var triPar = this.triPar;
      var filtre = window.location.pathname.split("/");

      if(!rechercheString && !filtre[3] && !filtre[4]){

        resultatsArray = resultatsArray.filter(function(item){
          if(filtre[2] == "recherche" || item.type.toLowerCase().indexOf(filtre[2]) !== -1) {
            return item;
          }
        })

        this.nombreResultats = resultatsArray.length;

        resultatsArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
          if(myA < myB) {
            return 1;
          }
          if(myA > myB) {
            return -1;
          }
          return 0;
        });

        return resultatsArray;
      }

      rechercheString = rechercheString.trim().toLowerCase();
      resultatsArray = resultatsArray.filter(function(item){
        if(filtre[2] == "recherche" || item.type.toLowerCase().indexOf(filtre[2]) !== -1) {
          if(filtre[3] =='tout' || item.theme.toLowerCase().indexOf(filtre[3]) !== -1){
            if(rechercheString == "" || item.nom.toLowerCase().indexOf(rechercheString) !== -1){
              return item;
            }
          }
        }
      })

      //SORT
      if(filtre[4] == "prix-asc") {
        resultatsArray.sort(function(a,b){
          return a.prix - b.prix;
        });
      }else if(filtre[4]  == "prix-desc"){
        resultatsArray.sort(function(a,b){
          return b.prix - a.prix;
        });
      }else if(filtre[4] == "date-asc"){
        resultatsArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
          if(myA > myB) {
            return 1;
          }
          if(myA < myB) {
            return -1;
          }
          return 0;
        });
      }else if(filtre[4] == "date-desc"){
        resultatsArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
          if(myA < myB) {
            return 1;
          }
          if(myA > myB) {
            return -1;
          }
          return 0;
        });
      }else if(filtre[4] == "alphabet-asc"){
        resultatsArray.sort(function (a, b){
          var myA = a.nom;
          var myB = b.nom;
          if(myA > myB) {
            return 1;
          }
          if(myA < myB) {
            return -1;
          }
          return 0;
        });
      }else if(filtre[4] == "alphabet-desc"){
        resultatsArray.sort(function (a, b){
          var myA = a.nom;
          var myB = b.nom;
          if(myA < myB) {
            return 1;
          }
          if(myA > myB) {
            return -1;
          }
          return 0;
        });
      }

      if(window.location.pathname.split("/").slice(2,3).pop() == 'recherche') {
        this.typeProduit = "produits";
        this.recherchePrefixe = "pour votre recherche ";
      }else {
        this.recherchePrefixe = "";
      }

      this.nombreResultats = resultatsArray.length;
      return resultatsArray.slice(0, limit);
    },
    handleScroll(){
      var currentScrollPosition = window.scrollY;
      if(currentScrollPosition >= document.documentElement.scrollHeight - document.documentElement.clientHeight){
        this.limitProduit += 4
      }else if(!currentScrollPosition){
        this.limitProduit = 12
      }
    }
  }
}
</script>
