<template>
			<div class="sortBar mb">
	          <div class="container">
	            <div class="row">
	              <div class="col-md-3">
	                <select v-model="triArticle" @click="emitRechercheSearchBar()">
	                	<option value="date-desc">Date de sortie &darr;</option>
	                	<option value="date-asc">Date de sortie &uarr;</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <select v-model="filtreTheme" @click="emitRechercheSearchBar()">
	                	<option value="tout">Theme : Tout</option>
	                  	<option value='test'>Test</option>
	                </select>
	              </div>
	              <div class="col-md-6">
	                <form class="right">
	                  <input type="text" v-model="stringRechercheArticle" placeholder="rechercher une story" @keyup="emitRechercheSearchBar()" />
	                </form>
	              </div>
	            </div>
	          </div>
	        </div>
</template>

<script>
	import { Bus } from './bus.js'
	export default{
		data () {
			return{
				triArticle: window.location.pathname.split("/").slice(3,4).pop(),
				filtreTheme: window.location.pathname.split("/").slice(2,3).pop(),
				stringRechercheArticle: ""
			}
		},
		created() {
            Bus.$on('recherche-string', stringRechercheArticle => {
                this.stringRechercheArticle = stringRechercheArticle;
            }),
            Bus.$on('recherche-theme', filtreTheme => {
                this.filtreTheme = filtreTheme;
            })
        },
		methods: {
			emitRechercheSearchBar(){
				var type = window.location.pathname.split('/');
				this.$router.push({ name: 'storylist', params: { theme: this.filtreTheme, sort: this.triArticle }})
				Bus.$emit('tri-article', this.triArticle);
				Bus.$emit('recherche-theme', this.filtreTheme);
				Bus.$emit('recherche-string', this.stringRechercheArticle);
			}
		}
	}
</script>
