<template>
  <transition name="fade" appear>
    <div id="listProduct" >
      <div class="container-fluid storeList">
        <div id="lesDisques" class="row">
          <h1>Disques</h1>
        </div>
        <div class="row">
          <SearchBarComponent></SearchBarComponent>
        </div>
      </div>
      <div class="container listContainer">
        <h2>{{nombreResultats}} {{typeProduit}} {{recherchePrefixe}} {{rechercheString}}</h2>
        <hr />
        <div class="row">
          <product v-for="product in rechercheGeneral" :product="product"></product>
        </div>
        <div v-if="nombreResultats == 0" class="noresult col-md-offset-3 col-md-6">
          <h2>Désolé ! nous avons trouvé aucun résultat pour votre recherche !</h2>
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
      typeProduit: window.location.pathname.split("/").pop(),
      rechercheString: "",
      filtreGenre:"",
      triPar:"",
      recherchePrefixe:"",
      products: [],
      nombreResultats: 0
    }
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
      console.log("LAL" + typeProduit)
      this.typeProduit = typeProduit;
    })
  },
  mounted () {
    //this.$http.get('/api/articles').then((response) => {
    this.$http.get('/src/jsonTest.json').then((response) => {
      console.log("success", response)
      this.products = response.data
    }, (response) => {
      console.log("erreur", response)
    })
  },
  computed: {
            //SEARCH
            rechercheGeneral: function () {
                var resultatsArray = this.products
                var rechercheString = this.rechercheString
                var filtreGenre = this.filtreGenre
                var triPar = this.triPar


                console.log("this.typeProduit" + this.typeProduit)
                console.log("type fonction recherche:" + this.typeProduit)

                if(!rechercheString && !filtreGenre && !triPar && !this.typeProduit){
                    this.nombreResultats = resultatsArray.length;
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
                    return resultatsArray; 
                }

                rechercheString = rechercheString.trim().toLowerCase();
                var typeProduit = this.typeProduit.trim().toLowerCase();
                filtreGenre = filtreGenre.trim().toLowerCase();
                resultatsArray = resultatsArray.filter(function(item){
                    if(typeProduit == "" || item.type.toLowerCase().indexOf(typeProduit) !== -1) {
                      if(filtreGenre == "genre : tout" || item.genre.toLowerCase().indexOf(filtreGenre) !== -1){
                        if(rechercheString == "" || item.nom.toLowerCase().indexOf(rechercheString) !== -1){
                          return item;
                        }
                      }
                    }
                })
                
                //SORT
                if(triPar == "Prix ↑") {
                    resultatsArray.sort(function(a,b){
                        return a.prix - b.prix;
                    });
                }else if(triPar == "Prix ↓"){
                    resultatsArray.sort(function(a,b){
                        return b.prix - a.prix;
                    });
                }else if(triPar == "Date de sortie ↑"){
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
                }else if(triPar == "Date de sortie ↓"){
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
                }else if(triPar == "Ordre alphabétique ↑"){
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
                }else if(triPar == "Ordre alphabétique ↓"){
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
                
                if(rechercheString) {
                  this.recherchePrefixe = "pour votre recherche ";
                }else {
                  this.recherchePrefixe = "";
                }
                this.nombreResultats = resultatsArray.length;
                return resultatsArray;
            }
        }
}
</script>
