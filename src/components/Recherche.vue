<template>
    <div id="Recherche" >
        <div class="container-fluid storeList">
            <div id="rechercheHeader" class="row">
                <h1>Recherche</h1>
            </div>
        </div>
        
            <SearchBarComponent></SearchBarComponent>
        
        <div class="container">
            <h2>{{nombreResultats}} résultats pour votre recherche {{rechercheString}}</h2>
            <hr />
            <div class="col-md-4" v-for="resultat in rechercheGeneral">
                <router-link link to="/vinyle/resultat.nom">
                <img :src="resultat.image" />
                <h2>{{resultat.nom}} - {{resultat.auteur}}</h2>
                <p>{{resultat.prix}}€</p>
                <p>{{resultat.date.substring(0,4)}}</p>
                </router-link>
            </div>
            <div v-if="nombreResultats == 0" class="noresult col-md-offset-3 col-md-6">
                <h2>Désolé ! nous avons trouvé aucun résultat pour votre recherche !</h2>
                <img src="https://media.giphy.com/media/ZJwrPJzxYjNks/giphy.gif" />
            </div>
        </div>        
    </div>
</template>

<script>
    import SearchBarComponent from './SearchBar.vue'
    import { Bus } from './bus.js'
    export default {
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
            //SEARCH
            rechercheGeneral: function () {
                var resultatsArray = this.resultats
                var rechercheString = this.rechercheString
                var filtreGenre = this.filtreGenre
                var triPar = this.triPar
                if(!rechercheString && !filtreGenre && !triPar){
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
                filtreGenre = filtreGenre.trim().toLowerCase();
                resultatsArray = resultatsArray.filter(function(item){
                    if(filtreGenre == "genre : tout" || item.genre.toLowerCase().indexOf(filtreGenre) !== -1){
                        if(rechercheString == "" || item.nom.toLowerCase().indexOf(rechercheString) !== -1){
                            return item;
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
                
                this.nombreResultats = resultatsArray.length;
                return resultatsArray;
            }
        }
    }
</script>