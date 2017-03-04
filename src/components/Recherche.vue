<template>
	<div id="Recherche" >
		<div class="container-fluid storeList">
     		<div id="rechercheHeader" class="row">
        		<h1>Recherche</h1>
      		</div>
      	</div>
      	
            <SearchBarComponent></SearchBarComponent>
        
      	<div class="container">
      		<h2>{{nombreResultats}} résultats pour votre recherche : {{rechercheString}}</h2>
      		<hr />
            <div class="col-md-4" v-for="resultat in rechercheGeneral">
                <router-link link to="/vinyle/resultat.nom">
                <img :src="resultat.image" />
                <h2>{{resultat.nom}} - {{resultat.auteur}}</h2>
                <p>{{resultat.prix}}€</p>
                </router-link>
            </div>
      	</div>        
    </div>
</template>

<script>
	import SearchBarComponent from './SearchBar.vue'
    import { Bus } from './bus.js'

	export default{
        components: {
            SearchBarComponent
        },
        data () {
            return {
                rechercheString: "",
                filtreGenre:"",
                triPar:"",
                resultats: [],
                nombreResultats: 0
            }
        },
        created() {
            Bus.$on('tri-par', triPar => {
                this.triPar = triPar;
                console.log("tri" + triPar)
            }),
            Bus.$on('recherche-genre', filtreGenre => {
                this.filtreGenre = filtreGenre;
            }),
            Bus.$on('recherche-string', rechercheString => {
                this.rechercheString = rechercheString;
            })
        },
        mounted () {
            this.$http.get('/src/jsonTest.json').then((response) => {
                console.log("success", response)
                this.resultats = response.data
            }, (response) => {
                console.log("erreur", response)
            })
        },
        computed: {
            rechercheGeneral: function () {
                var resultatsArray = this.resultats
                var rechercheString = this.rechercheString
                var filtreGenre = this.filtreGenre
                var triPar = this.triPar


                console.log(rechercheString)
                console.log(filtreGenre)

                if(!rechercheString && filtreGenre == "Genre" && triPar == "Ordre alphabétique"){
                    console.log("chouxbblanc")
                    this.nombreResultats = resultatsArray.length;                    
                    return resultatsArray;
                }

                rechercheString = rechercheString.trim().toLowerCase();
                filtreGenre = filtreGenre.trim().toLowerCase();

                resultatsArray = resultatsArray.filter(function(item){
                    if(filtreGenre == "genre" || item.genre.toLowerCase().indexOf(filtreGenre) !== -1){
                        if(rechercheString == "" || item.nom.toLowerCase().indexOf(rechercheString) !== -1){
                            return item;
                        }
                    }
                })

                if(triPar == "Ordre alphabétique") {
                    resultatsArray.sort(function(a,b){
                        var nom_a = a.nom.toUpperCase();
                        var nom_b = b.nom.toUpperCase();
                        if(nom_a < nom_b) {
                            return -1;
                        }
                        if(nom_a > nom_b) {
                            return 1;
                        }else {
                            return 0;
                        }
                    });
                }

                if(triPar == "Prix") {
                    resultatsArray.sort(function(a,b){
                        return a.prix - b.prix;
                    });
                }
                
                this.nombreResultats = resultatsArray.length;
                return resultatsArray;
            }
        }
	}
</script>