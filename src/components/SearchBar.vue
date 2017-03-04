<template>
			<div class="sortBar mb">
	          <div class="container">
	            <div class="row">
	              <div class="col-md-3">
	                <select v-model="triPar" @click="emitRechercheSearchBar()">
	                  <option>Trier par</option>
	                  <option>Date de sortie</option>
	                  <option>Prix</option>
	                  <option>Ordre alphabétique</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <select v-model="filtreGenre" @click="emitRechercheSearchBar()">
	                  <option>Genre</option>
	                  <option>Rock</option>
	                  <option>Prix</option>
	                  <option>Ordre alphabétique</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <form class="right" action="/search">
	                  <input type="text" v-model="rechercheString" placeholder="rechercher un vinyle" @keyup="emitRechercheSearchBar()" />
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
				triPar: "Ordre alphabétique",
				filtreGenre: "Genre",
				rechercheString: "",
			}
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