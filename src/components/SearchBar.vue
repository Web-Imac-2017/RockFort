<template>
			<div class="sortBar mb">
	          <div class="container">
	            <div class="row">
	              <div class="col-md-3">
	                <select v-model="triPar" @click="emitRechercheSearchBar()">
	                	<option>Prix &uarr;</option>
	                  	<option>Prix &darr;</option>
	                	<option>Date de sortie &uarr;</option>
	                	<option>Date de sortie &darr;</option>
	                  	<option>Ordre alphabétique &uarr;</option>
	                  	<option>Ordre alphabétique &darr;</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <select v-model="filtreGenre" @click="emitRechercheSearchBar()">
	                	<option>Genre : Tout</option>
	                  	<option>Rock</option>
	                 	<option>Rap</option>
	                  	<option>Electro</option>
	                  	<option>Classique</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <form class="right" action="/search">
	                  <input type="text" v-model="rechercheString" placeholder="rechercher un vinyle" @keydown.enter.prevent @keyup="emitRechercheSearchBar()" />
	                </form>
	              </div>
	              <div class="col-md-3">
	                <button class="random">random</button>
	              </div>
	            </div>
	          </div>
	        </div>
</template>

<script>
	import { Bus } from './bus.js';
	export default{
		data () {
			return{
				triPar: "Date de sortie ↓",
				filtreGenre: "Genre : Tout",
				rechercheString: "",
			}
		},
		created() {
            Bus.$on('recherche-string', rechercheString => {
                this.rechercheString = rechercheString;
            })
        },
		methods: {
			emitRechercheSearchBar(){
				Bus.$emit('tri-par', this.triPar);
				Bus.$emit('recherche-genre', this.filtreGenre);
				Bus.$emit('recherche-string', this.rechercheString);
			}
		}
	}
</script>